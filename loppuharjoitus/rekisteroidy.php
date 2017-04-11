<?php
require_once("asiakas.php");

$asiakas = new asiakas();

$kayttajatunnus = $_POST['kayttajatunnus'];
$pw = $_POST['pw'];
$etunimi = $_POST['etunimi'];
$sukunimi = $_POST['sukunimi'];
$email = $_POST['email'];
$kayttajaluokka = $_POST['kayttajaluokka'];

//tarkistetaan onko käyttäjätunnus tai email jo olemassa
$kayttajatunnus_tulos = $asiakas->haeKayttajatunnus($kayttajatunnus);
$email_tulos = $asiakas->haeEmail($email);

//tarkistetaan, että sähköpostiosoitteesta löytyy ät-merkki
$etsi = "@";
$miukuMauku = strpos($email, $etsi);

//tarkistetaan, että salasana on tarpeeksi pitkä
//$salasanaPituus = strlen($salasana);

if($kayttajatunnus != NULL  && $etunimi != NULL && $sukunimi != NULL && $email != NULL && $miukuMauku){
	//Jos käyttäjätunnusta ei löydy tietokannassa
	if(!$kayttajatunnus_tulos){
		if(!$email_tulos){
			$asiakas->lisaaAsiakas($kayttajatunnus, $pw, $etunimi, $sukunimi, $email, $kayttajaluokka);
		
			echo "Rekister&#246;ityminen onnistui!";
			header( 'refresh:2;url=index.php?page=etusivu' ) ;		
			}
		else{
			echo "Email on jo k&#228;yt&#246;ss&#228;.";
			header( 'refresh:2;url=index.php?page=rekisteroidy_lomake' ) ;
		}
	}
	else{
		echo "K&#228;ytt&#228;j&#228;tunnus on jo olemassa.";
		header( 'refresh:2;url=index.php?page=rekisteroidy_lomake' ) ;
	}
}
else{
	echo "Rekister&#246;ityminen ep&#228;onnistui, t&#228;yt&#228; pakolliset kent&#228;t!";
	header( 'refresh:2;url=index.php?page=rekisteroidy_lomake' ) ;
}
?>