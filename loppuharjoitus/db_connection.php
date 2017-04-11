<?php
	//Tietokanta-asetukset
	$tunnus = "root";
	$salasana = "";
	
	try 
	{
	    //Muodostetaan yhteys tietokantaan
		$kanta = new PDO("mysql:host=localhost;dbname=loppuharjoitus", $tunnus, $salasana);
		$kanta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$kanta->exec("SET NAMES utf8");
	} 
	catch (PDOException $e) 
	{
		echo 'TIETOKANTAVIRHE: '. $e->getMessage();
	}
	
?>
