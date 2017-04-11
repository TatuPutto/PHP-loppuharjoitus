<?php
require_once("tilaukset.php");
require_once("tuote.php");

$tilaukset = new tilaukset();
$tuote = new tuote();

$asiakas_id = $_GET['asiakas_id'];
$tilausaika = $_GET['tilausaika'];
	
//Vahvistetaan tilaus
//Siirretään tilaus tilaukset taulusta vahvistetut_tilaukset tauluun

$tuotteet = $_SESSION['tilaus'];

foreach($tuotteet as $alkio){
	$tuote_id = $alkio['tuote_id'];
	$tilaukset->vahvistaTilaus($asiakas_id, $tuote_id);
	
	//Päivitetään tilauksen sisältämien tuotteiden varastosaldoja
	$tuote->paivitaVarastosaldo($tuote_id);
}
//Poistetaan tilaus tilaukset taulusta
$tilaukset->poistaTilaus($asiakas_id, $tilausaika);
	  

header( 'Location: index.php?page=etusivu');

?>