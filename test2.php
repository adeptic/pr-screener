<?php

	include 'app/header.php';
	include 'app/companies.php';
	
	foreach ($companies_arr as $companies_arrEntry) {
		
		echo $companies_arrEntry[0]." ".$companies_arrEntry[4]."<br>";
		
		$database->update("companies", array(
			"start_date_quotes" => $companies_arrEntry[4]
			), array(
				"name" => $companies_arrEntry[0]
		));
	}
?>
</head>
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 300px;"></div>
  </body>
</html>