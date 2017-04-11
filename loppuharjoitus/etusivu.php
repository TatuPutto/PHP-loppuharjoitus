<?php
// Ladataan Savant3-luokan koodi
require_once("Savant3.php");
require_once("tuote.php");

// Luodaan oliot
$savant = new Savant3();
$t = new tuote;
 
//Määritetään mikä sivu näytetään
if (isset($_GET["sivu"])) { 
	$sivu  = $_GET["sivu"]; 
} 
else { 
	$sivu=1;
}

//Asetetaan arvo, josta tuotteiden hakeminen aloitetaan
$aloitus_id = ($sivu-1) * 10;

//Haetaan tuotteet $aloitus_id:stä lähtien
$tuotteet = $t->haeTuotteet($aloitus_id);
$tuotteiden_maara = $t->haeTuotteidenMaara();
 
//Määritellään sivujen määrä
$sivumaara = ceil($tuotteiden_maara / 10); 
 
// Liitetään muuttujien arvot Savant-olioon
$savant->assign("tuotteet", $tuotteet);
$savant->assign("sivumaara", $sivumaara);
// Näytetään template-sivu
$savant->display("etusivu.tpl.php");
?>