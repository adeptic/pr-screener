<?php
	include '/src/PHPExcel-develop/Classes/PHPExcel.php';
	include '/src/PHPExcel-develop/Classes/PHPExcel/Calculation.php';
	include '/src/PHPExcel-develop/Classes/PHPExcel/Cell.php';
	
	#$objReader = PHPExcel_IOFactory::createReaderForFile("05featuredemo.xlsx");
	#$objReader->setReadDataOnly(true);
	
	#echo "<pre>";
	#var_dump($objReader);
	#echo "</pre>";
	
	#$objReader->load("05featuredemo.xlsx");
	#https://github.com/PHPOffice/PHPExcel/wiki/User%20Documentation%20Overview%20and%20Quickstart%20Guide
	
	$objReader = new PHPExcel_Reader_Excel2007();
	$objReader->setLoadSheetsOnly( array("Year", "Quarter") );
	$objPHPExcel = $objReader->load("AAK.xls");
	$myWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'My Data');
	#$objPHPExcel->getSheetByName('Year');
	
	
	#echo "<pre>";	
	#echo $objReader->readCell(1, 1, 'Year');
	#echo "</pre>";
	
	#echo "<pre>";
	#echo $objReader->listWorksheetNames("AAK.xlsx");
	#echo "</pre>";

	echo "<pre>";	
	echo $objPHPExcel->getSheetCount();
	echo "</pre>";
	
	#echo "<pre>";
	#echo $cellValue = $objPHPExcel->getActiveSheet()->getCell('A1')->getValue();
	#echo "</pre>";
	
	
	#$myXLS = PHPExcel::load('AAK.XlsX');
	#echo $myXLS->toHTML(); 

?>

<form name="import" method="post" enctype="multipart/form-data">
     <input type="file" name="file" /><br />
        <input type="submit" name="submit" value="Submit" />
</form>

<?php

	if(isset($_POST["submit"]))
	{
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");
		$c = 0;
		
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			$name = $filesop[0];
			$email = $filesop[1];
		
			echo $name."<br>".$email;
		
		}
	 
		
	}
	

?>
