<?php
// Ladataan Savant3-luokan koodi
require_once("Savant3.php");
require_once("tuote.php");
// Luodaan uusi Savant3-olio
$savant = new Savant3();
$t = new tuote;

$tuote_id = $_GET["tuote_id"];

$tuotteet = $t->haeTuotetiedot($tuote_id);

$lisaa_ostoskoriin = "?page=lisaa_ostoskoriin&tuote_id=$tuote_id";
$poista_tuote = "?page=poista_tuote&tuote_id=$tuote_id";
 
foreach ($tuotteet as $alkio){
	$nimi = $alkio['nimi'];
	$valmistaja = $alkio['valmistaja'];
	$hinta = $alkio['hinta'];
	$varastosaldo = $alkio['varastosaldo'];
	$kuva_src = $alkio['kuva_src'];
	$kuvaus = $alkio['kuvaus'];
}
 
if($kuva_src == "images/imageNotFound.jpg"){
	$kuva = "'images/imageNotFound.jpg' style='width:250px;height:188px'>";
   }
else{
	$kuva = "'$kuva_src' style='width:250px;height:188px'>"; 
}  	   
 
$savant->assign("tuotteet", $tuotteet);
$savant->assign("lisaa_ostoskoriin", $lisaa_ostoskoriin);
$savant->assign("poista_tuote", $poista_tuote);
$savant->assign("tuote_id", $tuote_id);
$savant->assign("valmistaja", $valmistaja);
$savant->assign("hinta", $hinta);
$savant->assign("varastosaldo", $varastosaldo);
$savant->assign("nimi", $nimi);
$savant->assign("kuva", $kuva);
$savant->assign("kuvaus", $kuvaus);


$savant->display("tuotetiedot.tpl.php");
?>