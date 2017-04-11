<?php
require_once("tilaukset.php");

$tilaukset = new tilaukset();
$ostoskori = $_SESSION['ostoskori'];   
$tulos = count($ostoskori);

//Sijoitetaan ostoskorin sisältö tietokantaan
for($i=0; $i<$tulos; $i++){
	$asiakas_id = $_SESSION['user_id'];
    $tuote_id = $ostoskori[$i];
	  
    $tilaukset->tilaaTuote($asiakas_id, $tuote_id);
}

unset($_SESSION['ostoskori']);
header( 'Location: index.php?page=etusivu' ) ;
?>