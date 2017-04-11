<?php
//Dynaaminen sivurakenne
if(!isset($_GET["page"])) { 
	$sivu = "etusivu.php";
}
else { 
	$sivu = $_GET["page"]. ".php"; 
	$sivu = basename($sivu);
}
//Siisällytetään headeri
include('header.php');
//Sisällytetään haluttu sivu
include($sivu);?>


