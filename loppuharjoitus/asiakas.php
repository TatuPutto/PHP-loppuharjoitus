<?php

class asiakas{

//Haetaan asiakas id:n perusteella
function haeAsiakas($asiakas_id){
	include 'db_connection.php';
 
	$hae_kayttaja = $kanta->prepare("SELECT * FROM asiakas WHERE asiakas_id = :asiakas_id");
	$hae_kayttaja->bindParam(":asiakas_id", $asiakas_id);
	$hae_kayttaja->execute(); 
	$kayttaja = $hae_kayttaja->fetch(PDO::FETCH_ASSOC);
	
	return $kayttaja;
} 


//Tarkistetaan löytyykö tietokannasta vastaavaa käyttäjätunnusta
function haeKayttajatunnus($kayttajatunnus){
	include 'db_connection.php';
	
	$lause = $kanta->prepare("SELECT kayttajatunnus FROM asiakas WHERE kayttajatunnus = :kayttajatunnus");
	$lause->bindParam(":kayttajatunnus", $kayttajatunnus);
	$lause->execute();
	$kayttajatunnus_tulos = $lause->fetch(PDO::FETCH_ASSOC);

	return $kayttajatunnus_tulos;
}


//Tarkistetaan löytyykö tietokannasta vastaavaa sähköpostiosoitetta 
function haeEmail($email){
	include 'db_connection.php';
	
	$lause = $kanta->prepare("SELECT email FROM asiakas WHERE email = :email");
	$lause->bindParam(":email", $email);
	$lause->execute();
	$email_tulos = $lause->fetch(PDO::FETCH_ASSOC);
	
	return $email_tulos;
}


//Lisätään asiakas tietokantaan
function lisaaAsiakas($kayttajatunnus, $pw, $etunimi, $sukunimi, $email, $kayttajaluokka){
	include 'db_connection.php';
	
	$lause = $kanta->prepare("INSERT INTO asiakas (kayttajatunnus, etunimi, sukunimi, email, luokka, pw)
							  VALUES (:kayttajatunnus, :etunimi, :sukunimi, :email, :kayttajaluokka, :pw)");

	$lause->bindParam(":kayttajatunnus", $kayttajatunnus);
	$lause->bindParam(":etunimi", $etunimi);
	$lause->bindParam(":sukunimi", $sukunimi);
	$lause->bindParam(":email", $email);
	$lause->bindParam(":kayttajaluokka", $kayttajaluokka);
	$lause->bindParam(":pw", $pw);
	$lause->execute();
}

//Tarkista löytyykö tietokannasta kyseinen käyttäjätunnus/salasana yhdistelmä
function tarkistaSalasana($kayttajatunnus, $pw){
    include 'db_connection.php';
	
	$hae_salasana = $kanta->prepare("SELECT pw, asiakas_id FROM asiakas WHERE kayttajatunnus = :kayttajatunnus AND pw = :pw");
	$hae_salasana->bindParam(":kayttajatunnus", $kayttajatunnus);
	$hae_salasana->bindParam(":pw", $pw);
    $hae_salasana->execute(); 
	$tarkista_salasana = $hae_salasana->fetch(PDO::FETCH_ASSOC);

	return $tarkista_salasana;
}

//Tarkistetaan käyttäjän käyttäjäluokka
function tarkistaLuokka($kayttajatunnus, $pw){
	include 'db_connection.php';
	
	$hae_kayttajaluokka = $kanta->prepare("SELECT luokka FROM asiakas WHERE kayttajatunnus = :kayttajatunnus AND pw = :pw");
    $hae_kayttajaluokka->bindParam(":kayttajatunnus", $kayttajatunnus);
	$hae_kayttajaluokka->bindParam(":pw", $pw);
    $hae_kayttajaluokka->execute(); 
	$tarkista_kayttajaluokka = $hae_kayttajaluokka->fetch(PDO::FETCH_ASSOC);

	return $tarkista_kayttajaluokka;
}


//Päivitetään käyttäjän tiedot
function paivitaTiedot($kayttajatunnus, $pw, $email, $asiakas_id){
	include 'db_connection.php';
	
	$lause = $kanta->prepare("UPDATE asiakas SET kayttajatunnus = :kayttajatunnus, pw = :pw, email = :email WHERE asiakas_id = :asiakas_id");
	$lause->bindParam(":kayttajatunnus", $kayttajatunnus);
	$lause->bindParam(":pw", $pw);
	$lause->bindParam(":email", $email);
	$lause->bindParam(":asiakas_id", $asiakas_id);
    $lause->execute(); 
	
}
}
?>