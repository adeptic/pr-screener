<!DOCTYPE html>
<html>
<head>
    <title>Insert companies into database</title>
</head>
<body>
<?php

	
	$datas = $database->select("companies", "*");

	#echo "<pre>";
	#print_r($datas);
	#echo "</pre>";
	
	#echo "<pre>";
	#print_r($companies_arr);
	#echo "</pre>";
	
	foreach ($companies_arr as $companies_arrEntry) {
	
			echo "<pre>";
			print_r($companies_arrEntry);
			echo "</pre>";
		
		
		$last_company_id = $database->insert("companies", array(
			'name' => $companies_arrEntry[0],
			'google_ticker' => $companies_arrEntry[1],
			'yahoo_symbol' => $companies_arrEntry[2],
			'borsdata_ticker' => $companies_arrEntry[3],
			'start_date_quotes' => $companies_arrEntry[4]
			)
		);
		echo "<pre>";
		var_dump($database->error());
		echo "</pre>";
		
		# echo $companies_arrEntry[0];
		
		# $data = $query->symbolSuggest($companies_arrEntry[2]);
		# $data = $query->yql()->historicalQuote($companies_arrEntry[2], '2001-10-21', '2001-10-23', 'w')->get();
		
		# echo "<pre>";
		# print_r($data);
		# echo "</pre>";
	}

/*
?>

<h2>Insert companies into database</h2>
<hr />

<!-- symbolSuggest($string); -->
<div>
 
 		<table>
			<thead>
				<th>Symbol</th>
				
 
<?php

		# echo "<pre>";
		# print_r($companies_arr);
		# echo "</pre>";

		foreach ($companies_arr as $companies_arrEntry) {

			echo "<pre>";
			print_r($companies_arrEntry);
			echo "</pre>";

			#$data = $query->symbolSuggest($companies_arrEntry[2]);
			#$data = $query->yql()->historicalQuote($companies_arrEntry[2], '2001-10-21', '2001-10-23', 'w')->get();
			
			echo "<pre>";
			print_r($data);
			echo "</pre>";
/*

			<th>Exchange Display</th>
			<th>Type</th>
			<th>Type Display</th>

?>
			</thead>
        <tbody>
		
        <?php foreach ($data->get() as $dataEntry) 
			  { 
				if(strpos($dataEntry['symbol'], '.ST') !== false){
		?>
            <tr>
                <td><?php echo $dataEntry['symbol']; ?></td>
            </tr>
        <?php }}
	
		?>
        </tbody>
    </table>
    <?php } 
	
	*/
	
?>

</div>
<hr />


</body>
</html>
