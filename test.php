<?php
// This is a test change
	include 'app/header.php';
	
	$user="root";
	$password="";
	$database="aktiedatabas";
	
	mysql_connect("localhost",$user,$password);
	@mysql_select_db($database) or die( "Unable to select database");
	#$query = 'SELECT id, yahoo_symbol FROM `companies` WHERE id IN (5, 7, 8, 9, 11, 12, 13, 14, 15, 16, 17, 18, 19, 21, 23, 24, 29, 32, 33, 37, 38, 41, 44, 45, 46, 48, 49, 50, 53, 54, 55, 57, 58, 61, 63, 66, 67, 68, 69, 70, 71, 73, 74, 75, 76, 78, 79, 80, 81, 82, 83, 84, 86, 87, 90, 92, 95, 97, 98, 100, 101, 104, 105, 106, 109, 110, 112, 113, 114, 115, 117, 118, 119, 123, 128, 129, 130, 134, 136, 137, 141, 143, 145, 146, 147, 150, 152, 154, 155, 156, 157, 159, 160, 162, 163, 165, 168, 169, 170, 171, 172, 173, 175, 177, 178, 182, 183, 184, 185, 187, 188, 189, 194, 196, 202, 203, 206, 207, 208, 209, 210, 211, 212, 213, 215, 216, 217, 219, 220, 221, 223, 224, 225, 227, 228, 231, 234, 235, 236, 237, 242, 244, 245, 246, 250, 251, 252, 253, 254, 255, 258, 260, 263, 264, 265, 267, 282, 284, 285, 288, 291, 295, 300, 301, 302, 306, 307, 308, 309, 310)';
	$q = 'SELECT id, yahoo_symbol FROM `companies` WHERE id IN (67, 97, 109, 115, 118, 136, 137, 143, 154, 159, 160, 165, 185, 194, 203, 209, 253, 258, 267, 295, 308)';

	$result = mysql_query($q);
	$num=mysql_numrows($result);
	
	$i=0;
	while ($i < $num) {

		$first=mysql_result($result,$i,"id");
		$last=mysql_result($result,$i,"yahoo_symbol");
		
		$import_start_date = '2017-01-01';
		$import_end_date = '2017-01-10';
		
		#echo "<pre>";
		#var_dump($query);
		#echo "</pre>";
		
		$data = $query->yql()->historicalQuote($last, $import_start_date, $import_end_date);
		
		if(count($data->get() > 0)){
			#echo "<a target='_blank' href='http://query.yahooapis.com/v1/public/yql?q=select+%2A+from+yahoo.finance.historicaldata+where+symbol+%3D+%22".$last."%22+and+startDate%3D%222001-01-02%22+and+endDate%3D%222001-01-10%22&format=json&env=http://datatables.org/alltables.env&callback='>".$last."</a><br>";
			echo "<pre>";
			print_r($data->get());
			echo "</pre>";
		
			echo $first." ".$last."<br>";
		}
		#echo "<a target='_blank' href='http://query.yahooapis.com/v1/public/yql?q=select+%2A+from+yahoo.finance.historicaldata+where+symbol+%3D+%22".$last."%22+and+startDate%3D%222002-01-02%22+and+endDate%3D%222002-01-10%22&format=json&env=http://datatables.org/alltables.env&callback='>".$last."</a><br>";
		#echo "<a target='_blank' href='http://query.yahooapis.com/v1/public/yql?q=select+%2A+from+yahoo.finance.historicaldata+where+symbol+%3D+%22".$last."%22+and+startDate%3D%222003-01-02%22+and+endDate%3D%222003-01-10%22&format=json&env=http://datatables.org/alltables.env&callback='>".$last."</a><br>";
		#echo "<a target='_blank' href='http://query.yahooapis.com/v1/public/yql?q=select+%2A+from+yahoo.finance.historicaldata+where+symbol+%3D+%22".$last."%22+and+startDate%3D%222004-01-02%22+and+endDate%3D%222004-01-10%22&format=json&env=http://datatables.org/alltables.env&callback='>".$last."</a><br>";
		#echo "<a target='_blank' href='http://query.yahooapis.com/v1/public/yql?q=select+%2A+from+yahoo.finance.historicaldata+where+symbol+%3D+%22".$last."%22+and+startDate%3D%222005-01-02%22+and+endDate%3D%222005-01-10%22&format=json&env=http://datatables.org/alltables.env&callback='>".$last."</a><br>";
		#echo "<a target='_blank' href='http://query.yahooapis.com/v1/public/yql?q=select+%2A+from+yahoo.finance.historicaldata+where+symbol+%3D+%22".$last."%22+and+startDate%3D%222006-01-02%22+and+endDate%3D%222006-01-10%22&format=json&env=http://datatables.org/alltables.env&callback='>".$last."</a><br>";
		#echo "<a target='_blank' href='http://query.yahooapis.com/v1/public/yql?q=select+%2A+from+yahoo.finance.historicaldata+where+symbol+%3D+%22".$last."%22+and+startDate%3D%222007-01-02%22+and+endDate%3D%222007-01-10%22&format=json&env=http://datatables.org/alltables.env&callback='>".$last."</a><br>";
		#echo "<a target='_blank' href='http://query.yahooapis.com/v1/public/yql?q=select+%2A+from+yahoo.finance.historicaldata+where+symbol+%3D+%22".$last."%22+and+startDate%3D%222008-01-02%22+and+endDate%3D%222008-01-10%22&format=json&env=http://datatables.org/alltables.env&callback='>".$last."</a><br>";
		#echo "<a target='_blank' href='http://query.yahooapis.com/v1/public/yql?q=select+%2A+from+yahoo.finance.historicaldata+where+symbol+%3D+%22".$last."%22+and+startDate%3D%222009-01-02%22+and+endDate%3D%222009-01-10%22&format=json&env=http://datatables.org/alltables.env&callback='>".$last."</a><br>";
		#echo "<a target='_blank' href='http://query.yahooapis.com/v1/public/yql?q=select+%2A+from+yahoo.finance.historicaldata+where+symbol+%3D+%22".$last."%22+and+startDate%3D%222010-01-02%22+and+endDate%3D%222010-01-10%22&format=json&env=http://datatables.org/alltables.env&callback='>".$last."</a><br>";
		#echo "<a target='_blank' href='http://query.yahooapis.com/v1/public/yql?q=select+%2A+from+yahoo.finance.historicaldata+where+symbol+%3D+%22".$last."%22+and+startDate%3D%222011-01-02%22+and+endDate%3D%222011-01-10%22&format=json&env=http://datatables.org/alltables.env&callback='>".$last."</a><br>";
		#echo "<a target='_blank' href='http://query.yahooapis.com/v1/public/yql?q=select+%2A+from+yahoo.finance.historicaldata+where+symbol+%3D+%22".$last."%22+and+startDate%3D%222012-01-02%22+and+endDate%3D%222012-01-10%22&format=json&env=http://datatables.org/alltables.env&callback='>".$last."</a><br>";
		#echo "<a target='_blank' href='http://query.yahooapis.com/v1/public/yql?q=select+%2A+from+yahoo.finance.historicaldata+where+symbol+%3D+%22".$last."%22+and+startDate%3D%222013-01-02%22+and+endDate%3D%222013-01-10%22&format=json&env=http://datatables.org/alltables.env&callback='>".$last."</a><br><br>";
		$i++;
	}
	
?>
</head>
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 300px;"></div>
  </body>
</html>