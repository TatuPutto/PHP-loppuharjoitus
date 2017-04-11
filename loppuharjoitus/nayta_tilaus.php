<?php
require_once("Savant3.php");
require_once("tuote.php");
require_once("asiakas.php");
require_once("tilaukset.php");

$savant = new Savant3();
$tuote = new tuote();
$asiakas = new asiakas();
$tilaukset = new tilaukset();

$asiakas_id = $_GET['asiakas_id'];
$tilausaika = $_GET['tilausaika'];

//Haetaan valitun tilauksen tuote_id:t
$tilaus = $tilaukset->haeAsiakkaanTilaus($asiakas_id, $tilausaika);

//Haetaan tilauksen sisätämät tuotteet tuote_id:n perusteella
foreach($tilaus as $alkio){
	$tuote_id = $alkio['tuote_id'];
	$tuotteet[] = $tuote->haeTuote($tuote_id);
}

$_SESSION['tilaus'] = $tuotteet;

$asiakas = $asiakas->haeAsiakas($asiakas_id);
	    
$savant->assign("tilausaika", $tilausaika);
$savant->assign("asiakas", $asiakas);
$savant->assign("tuotteet", $tuotteet);
$savant->display("nayta_tilaus.tpl.php");
?>