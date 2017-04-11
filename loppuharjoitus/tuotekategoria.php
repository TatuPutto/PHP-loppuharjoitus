<?php
// Ladataan Savant3-luokan koodi
require_once("Savant3.php");
require_once("tuote.php");
// Luodaan uusi Savant3-olio
$savant = new Savant3();
$t = new tuote;
 
$kategoria = $_GET["kategoria"];
 
if (isset($_GET["sivu"])) { 
	$sivu  = $_GET["sivu"]; 
} 
else { 
	$sivu=1;
}

//Asetetaan arvo, josta tuotteiden hakeminen aloitetaan 
$aloitus_id = ($sivu-1) * 10; 
$tuotteet = $t->haeTuotteetKategoria($kategoria, $aloitus_id);
$tuotteiden_maara = $t->haeTuotteidenMaaraKategoria($kategoria);
 
//Määritellään sivujen määrä
$sivumaara = ceil($tuotteiden_maara / 10); 
 
$savant->assign("kategoria", $kategoria);
$savant->assign("sivumaara", $sivumaara);
$savant->assign("tuotteet", $tuotteet);
// Näytetään template-sivu
$savant->display("tuotekategoria.tpl.php");
?>