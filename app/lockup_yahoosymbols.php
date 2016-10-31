<!DOCTYPE html>
<html>
<head>
    <title>Lockup Yahoo Company Symbols</title>
</head>
<body>
<?php

	include './app/companies.php';
	require './src/YahooFinanceQuery.php';

	use DirkOlbrich\YahooFinanceQuery\YahooFinanceQuery;

	$query = new YahooFinanceQuery;

?>

<h2>YahooFinanceQuery Example</h2>
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

			$data = $query->yql()->historicalQuote($companies_arrEntry[2], '2001-10-21', '2001-10-23', 'w')->get();
			
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
	*/
		?>
        </tbody>
    </table>
    <?php } ?>
</div>
<hr />


</body>
</html>
