	
</head>
<?php

	$companies = $database->select("companies", "*");

	$i=0;
	$stop = count($companies);
	
	while ($i <= $stop) {
	
		$curl = curl_init();
			// Set some options - we are passing in a useragent too here
			curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => 'http://127.0.0.1/rosin-screener/import_quotes.php?company_id='.$i,
			CURLOPT_USERAGENT => 'Codular Sample cURL Request'
		));

		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		
		#echo "<pre>";
		#print_r($resp);
		#echo "</pre>";
		
		// Close request to clear up some resources
		curl_close($curl);
		
		$i++;
		#sleep(1);
	}
	
?>