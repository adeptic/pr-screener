<!DOCTYPE html>

<?php

	require './vendor/autoload.php';
	require './src/YahooFinanceQuery.php';
	
	use DirkOlbrich\YahooFinanceQuery\YahooFinanceQuery;
	$query = new YahooFinanceQuery;

	# https://github.com/katzgrau/KLogger
	$logger = new Katzgrau\KLogger\Logger('./log/', Psr\Log\LogLevel::INFO);
	
	include 'app/db.php';
	$database = new medoo([
	
		# required
		'database_type' => 'mysql',
		'database_name' => 'aktiedatabas',
		'server' => 'localhost',
		'username' => 'root',
		'password' => '',
		'charset' => 'utf8',

	]);	

?>

<html>
	<head>
		
		<!--link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/-->
		<link href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>		
