<?php

class tuote{

//Haetaan 10 tuotetta, nousevassa järjestyksessä id:n mukaan, aloitus_id:stä lähtien
function haeTuotteet($aloitus_id){
	include 'db_connection.php';
 
	$lause = $kanta->prepare("SELECT * FROM tuotteet ORDER BY tuote_id ASC LIMIT $aloitus_id, 10");
	$lause->execute();
	$tulokset = $lause->fetchAll(PDO::FETCH_ASSOC);	 
   
	return $tulokset;
} 

//Haetaan 10 tuotetta, jotka kuuluvat valittuun kategoriaan, nousevassa järjestyksessä id:n mukaan, aloitus_id:stä lähtien
function haeTuotteetkategoria($kategoria, $aloitus_id){
	include 'db_connection.php';
   
	$lause = $kanta->prepare("SELECT * FROM tuotteet WHERE kategoria = :kategoria ORDER BY tuote_id ASC LIMIT $aloitus_id, 10");
	$lause->bindParam(":kategoria", $kategoria);
	$lause->execute();
	$tulokset = $lause->fetchAll(PDO::FETCH_ASSOC);	 
   
	return $tulokset;
}

//Haetaan tuote id:n perusteella
function haeTuotetiedot($tuote_id){
    include 'db_connection.php';
    $lause = $kanta->prepare("SELECT * FROM tuotteet WHERE tuote_id = :tuote_id");
	$lause->bindParam(":tuote_id", $tuote_id);
	$lause->execute();
    $tulokset[] = $lause->fetch(PDO::FETCH_ASSOC);
	
	return $tulokset;
}

//Haetaan tuote id:n perusteella
function haeTuote($tuote_id){
    include 'db_connection.php';
	
    $lause = $kanta->prepare("SELECT tuote_id, nimi, valmistaja, hinta, kuva_src FROM tuotteet WHERE tuote_id = :tuote_id");
	$lause->bindParam(":tuote_id", $tuote_id);
	$lause->execute();
    $tulokset = $lause->fetch(PDO::FETCH_ASSOC);
	
	return $tulokset;
}

//Haetaan tuotteiden määrä
function haeTuotteidenMaara() {
	include 'db_connection.php';
   
	$lause = $kanta->prepare("SELECT COUNT(*) from tuotteet");
	$lause->execute();
	$tulos = $lause->fetchColumn();
   
	return $tulos;
}

//Haetaan valittuun kategoriaan kuuluvien tuotteiden määrä
function haeTuotteidenMaaraKategoria($kategoria){
   include 'db_connection.php';
   
   $lause = $kanta->prepare("SELECT COUNT(*) from tuotteet WHERE kategoria =:kategoria");
   
   $lause->bindParam(":kategoria", $kategoria);
   $lause->execute();
   $tulos = $lause->fetchColumn();
   
   return $tulos;
}


//Tarkistetaan löytyykö saman niminen tuote jo tietokannasta
function onkoTuoteOlemassa($nimi){
	include 'db_connection.php';
	
	$lause = $kanta->prepare("SELECT * FROM tuotteet WHERE nimi = :nimi");
	$lause->bindParam(":nimi", $nimi);
	$lause->execute();
	$nimi_tulos = $lause->fetch(PDO::FETCH_ASSOC);
	
	return $nimi_tulos;
}

//Lisätään tuote tietokantaan
function lisaaTuote($nimi, $varastosaldo, $kategoria, $valmistaja, $kuva_src, $hinta, $kuvaus, $lyhyt_kuvaus){
	include 'db_connection.php';
	
	$lause = $kanta->prepare("INSERT INTO tuotteet (nimi, varastosaldo, kategoria, valmistaja, kuva_src, hinta, kuvaus, lyhyt_kuvaus)
					          VALUES (:nimi, :varastosaldo, :kategoria, :valmistaja, :kuva_src, :hinta, :kuvaus, :lyhyt_kuvaus)");

	$lause->bindParam(":nimi", $nimi);
	$lause->bindParam(":varastosaldo", $varastosaldo);
	$lause->bindParam(":kategoria", $kategoria);
	$lause->bindParam(":valmistaja", $valmistaja);
	$lause->bindParam(":kuva_src", $kuva_src);
	$lause->bindParam(":hinta", $hinta);
	$lause->bindParam(":kuvaus", $kuvaus);
	$lause->bindParam(":lyhyt_kuvaus", $lyhyt_kuvaus);
	$lause->execute();
}

//Poistetaan tuote tietokannasta
function poistaTuote($tuote_id){
	include 'db_connection.php';
	
	$lause = $kanta->prepare("DELETE FROM tuotteet WHERE tuote_id = :tuote_id");

	$lause->bindParam(":tuote_id", $tuote_id);
	$lause->execute();
}



//Päivitetään valittujen tuotteiden varastosaldoja
function paivitaVarastosaldo($tuote_id){
	include 'db_connection.php';
	
	$lause = $kanta->prepare("UPDATE tuotteet SET varastosaldo = varastosaldo - 1 WHERE tuote_id = :tuote_id");
	$lause->bindParam(":tuote_id", $tuote_id);
	$lause->execute();
}



}
?>