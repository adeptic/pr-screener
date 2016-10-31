	<script type="text/javascript">
		$(document).ready( function () {
			 $('#detailTable').DataTable( {
				"pageLength": 350
			} );
			  
		});
	</script>
</head>
<?php

	$companies = $database->select("companies", "*");

	#Get all companies stockquotes in an array
	$i=200;
	$stop = count($companies);
	
	while ($i < $stop) {
		$companies[$i]["stockquotes"] = $database->select("stockquotes", "*",[
			"fk_companies_id" => $companies[$i]["id"],
			"LIMIT" => [0, 1],
			"ORDER" => [
				"datum" => "DESC"
			]
		]);
		$i++;
	}

?>
<body>
	<div>
		<h2>Importera aktiekurser</h2>
		<hr />
		<div>
			<table cellpadding="1" cellspacing="1" id="detailTable">
				<thead>
					<tr>
						<th>Företagsnamn</th><th>Yahoo symbol</th><th>Start import datum</th><th>Senaste import datum</th><th>Importera mer data</th>
					</tr>
				</thead>
				<tbody>

<?php

				#echo "<pre>";
				#	print_r($companies);
				#	echo "</pre>";
		
				foreach ($companies as $companies_arrEntry) {
					$lastdate = $companies_arrEntry['start_date_quotes'];
					
					if(count($companies_arrEntry["stockquotes"]) != 0) {
						$lastdate = $companies_arrEntry['stockquotes'][0]['datum'];
					}
					echo "<tr><td>".$companies_arrEntry["name"]."</td>";
					echo "<td><a target='_blank' href='http://finance.yahoo.com/quote/".$companies_arrEntry['yahoo_symbol']."'>".$companies_arrEntry['yahoo_symbol']."</a></td>";
					echo "<td>".$companies_arrEntry['start_date_quotes']."</td>";
					echo "<td>".$lastdate."</td>";
					echo "<td><button type='button' class='btn btn-default btn-sm'>";
					echo "<a target='_blank' href='http://127.0.0.1/rosin-screener/import_quotes.php?company_id=".$companies_arrEntry['id']."'>Importera</a></button></td></tr>";
				}
?>
			</tbody>
		</table>
		</div>
	</div>
</body>
</html>
