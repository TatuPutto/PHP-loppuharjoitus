<?php

class tilaukset{
	
//Lisätään tilaus tietokantaan
function tilaaTuote($asiakas_id, $tuote_id){
	include 'db_connection.php';
	
    $lause = $kanta->prepare("INSERT INTO tilaukset (asiakas_id, tuote_id) VALUES (:asiakas_id, :tuote_id)");
    $lause->bindParam(":asiakas_id", $asiakas_id);
    $lause->bindParam(":tuote_id", $tuote_id);
    $lause->execute();
}


//Vahvistetaan tilaus
function vahvistaTilaus($asiakas_id, $tuote_id){
	include 'db_connection.php';
	
    $lause = $kanta->prepare("INSERT INTO vahvistetut_tilaukset (asiakas_id, tuote_id) VALUES (:asiakas_id, :tuote_id)");
    $lause->bindParam(":asiakas_id", $asiakas_id);
    $lause->bindParam(":tuote_id", $tuote_id);
    $lause->execute();
}

//Poistetaan tilaus
function poistaTilaus($asiakas_id, $tilausaika){
	include 'db_connection.php';
	
    $lause = $kanta->prepare("DELETE FROM tilaukset WHERE asiakas_id = :asiakas_id AND tilausaika = :tilausaika");
    $lause->bindParam(":asiakas_id", $asiakas_id);
    $lause->bindParam(":tilausaika", $tilausaika);
    $lause->execute();
}


//Haetaan asiakkaan tekemä tilaus
function haeAsiakkaanTilaus($asiakas_id, $tilausaika){
	include 'db_connection.php';

	$lause = $kanta->prepare("SELECT * FROM tilaukset WHERE asiakas_id = :asiakas_id AND tilausaika = :tilausaika");
	$lause->bindParam(":asiakas_id", $asiakas_id);
	$lause->bindParam(":tilausaika", $tilausaika);
	$lause->execute();
	$tilaukset = $lause->fetchAll(PDO::FETCH_ASSOC);	 
	
	return $tilaukset;
}


//Haetaan asiakkaan tekemät tilaukset
function haeAsiakkaanKaikkiTilaukset($asiakas_id){
	include 'db_connection.php';

	$lause = $kanta->prepare("SELECT asiakas_id, tilausaika FROM tilaukset WHERE asiakas_id = :asiakas_id");
	$lause->bindParam(":asiakas_id", $asiakas_id);
	$lause->execute();
	$tilaukset = $lause->fetchAll(PDO::FETCH_ASSOC);	 
	
	return $tilaukset;
}



//Haetaan kaikki tilaukset
function haeTilaukset(){
	include 'db_connection.php';

	$lause = $kanta->prepare("SELECT asiakas_id, tilausaika FROM tilaukset");
	$lause->execute();
	$tulokset = $lause->fetchAll();
	
	return $tulokset;
}
}