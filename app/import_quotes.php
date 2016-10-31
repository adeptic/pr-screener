	
</head>
<?php

	$company_id = $_REQUEST["company_id"];
	
	#Get company details
	$company = $database->select("companies", "*",[
		"id" => $company_id
	]);
	
	#echo "<pre>";
	#print_r($company);
	#echo "</pre>";

	#Get last companies stockquotes in an array

	$company_last_stockquote = $database->select("stockquotes", "*",[
		"fk_companies_id" => $company_id,
		"LIMIT" => [0, 1],
		"ORDER" => [
			"datum" => "DESC"
		]
	]);

	echo "<pre>";
	print_r($company_last_stockquote);
	echo "</pre>";

	if(empty($company_last_stockquote)){

		$company_last_import_date = $company[0]["start_date_quotes"];

	} else {

		$company_last_import_date = $company_last_stockquote[0]["datum"];
	}

	echo $company_last_import_date."<br>";
	echo date("Y-m-d");
	$import_start_date = date ("Y-m-d", strtotime ($company_last_import_date ."+1 days"));
	$import_end_date = date ("Y-m-d", strtotime ($company_last_import_date ."+365 days"));

	
	if(date("Y-m-d") > $import_start_date)
	{
		$data = $query->yql()->historicalQuote($company[0]['yahoo_symbol'], $import_start_date, $import_end_date);
		echo '<p>Query via YQL console. Datasets: <b>' . count($data) . '</b></p>';

		echo "<pre>";
		print_r($data);
		echo "</pre>";
		
		# echo $company_id."<br>";
		
		if(count($data->get() > 0))
		{
			$logger->info('STOCKQUOT IMPORT (data): company_id='.$company_id);
			foreach ($data->get() as $stockquote) {
			
				#echo "<pre>".date('D', strtotime($stockquote['Date']));
				#print_r($stockquote);
				#echo "</pre>";
				
				$last_company_id = $database->insert("stockquotes", array(
					'fk_companies_id' => $company_id,
					'close' => $stockquote['Close'],
					'weekday' => date('D', strtotime($stockquote['Date'])),
					'datum' => $stockquote['Date'],
					'volume' => $stockquote['Volume'],
					'high' => $stockquote['High'],
					'low' => $stockquote['Low'],
					'open' => $stockquote['Open']
					)
				);
				#echo "<pre>";
				#var_dump($database->error());
				#echo "</pre>";
				
			}
		} else {
			$logger->info('STOCKQUOT IMPORT (no data): company_id='.$company_id);
		}
	} else {
		$logger->info('STOCKQUOT IMPORT (already imported): company_id='.$company_id);
	}
	
	echo "success";
	
?>