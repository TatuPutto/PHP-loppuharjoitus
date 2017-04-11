<?php
require_once("Savant3.php");
require_once("tilaukset.php");

$savant = new Savant3();
$tilaukset = new tilaukset();


//Jos käyttäjä on ylläpitäjä
if(isset($_SESSION['yllapitaja'])){
	$tulokset = $tilaukset->haeTilaukset();
	//Poistetaan tuloksista duplikaatit
	$poista_duplikaatit = array_unique($tulokset, SORT_REGULAR);
	
	$savant->assign("poista_duplikaatit", $poista_duplikaatit);
}
else{
	$asiakas_id = $_SESSION["user_id"];
	$tulokset = $tilaukset->haeAsiakkaanKaikkiTilaukset($asiakas_id);
	$poista_duplikaatit = array_unique($tulokset, SORT_REGULAR);
	
	$savant->assign("poista_duplikaatit", $poista_duplikaatit);
}

$savant->display("tilaustenkasittely.tpl.php");
?>