<?php

	include 'app/header.php';
	include 'app/companies.php';
	
	foreach ($companies_arr as $companies_arrEntry) {
		
		echo "<a target='_blank' href='https://borsdata.se/".$companies_arrEntry[3]."/analys'>".$companies_arrEntry[3]."</a><br>";
		
		#echo "<pre>";
		#print_r($companies_arrEntry);
		#echo "</pre>";
	}

?>
</head>
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 300px;"></div>
  </body>
</html>