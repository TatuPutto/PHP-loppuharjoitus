<?php

require_once("tuote.php");

$tuote = new tuote();

$nimi = $_POST['nimi'];
$varastosaldo = $_POST['varastosaldo'];
$kategoria = $_POST['kategoria'];
$valmistaja = $_POST['valmistaja'];
$hinta = $_POST['hinta'];
$kuvaus = $_POST['kuvaus'];
$lyhyt_kuvaus = $_POST['lyhyt_kuvaus'];

//Tarkistetaan onko tuote jo olemassa 
$nimi_tulos = $tuote->onkoTuoteOlemassa($nimi);


//Jos tuotetta ei löytynyt ja pakolliset kentät on täytetty, lisätään tuote tietokantaan
if($nimi_tulos != $nimi){
	if($nimi != NULL && $varastosaldo != NULL && $kategoria != NULL && $valmistaja != NULL && $hinta != NULL && $kuvaus != NULL && $lyhyt_kuvaus != NULL){

		//Käsitellään kuvan lisääminen
		$kohdeKansio = "images/";
		$kohdeTiedosto = $kohdeKansio . basename($_FILES["lataaKuva"]["name"]);
		$lataaminenOk = 1;
		$kuvaTiedostoTyyppi = pathinfo($kohdeTiedosto,PATHINFO_EXTENSION);
	
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["lataaKuva"]["tmp_name"]);
			if($check !== false) {
				$lataaminenOk = 1;
			}
			else {
				$lataaminenOk = 0;
			}
		}
		//Tarkistetaan, ettei vastaavaa kuvaa löydy jo kansiosta
		if(file_exists($kohdeTiedosto)) {
			$lataaminenOk = 0;
		}
		//Tarkistetaan, että kuva ei ole liian iso
		if($_FILES["lataaKuva"]["size"] > 500000) {
			$lataaminenOk = 0;
			echo "Kuvan lataaminen ei onnistunut, tiedosto on liian iso<br><br>";
		}
		//Hyväksytään vain .jpg, .png ja .jpeg formatin tiedostot
		if($kuvaTiedostoTyyppi != "jpg" && $kuvaTiedostoTyyppi != "png" && $kuvaTiedostoTyyppi != "jpeg"
		&& $kuvaTiedostoTyyppi != "gif" ) {
			$lataaminenOk = 0;
			echo "Kuvan lataaminen ei onnistunut, kuvan t&#228;ytyy olla .jpg, .png tai .jpeg formaatissa!<br><br>";
		}
		//Joku ylläolevista ehdoista ei täyttynyt
		if($lataaminenOk == 0) {
		}
		else {
			if(move_uploaded_file($_FILES["lataaKuva"]["tmp_name"], $kohdeTiedosto)) {
				$kuva_src = "images/" . $_FILES["lataaKuva"]["name"];		
			}
		}

		if(isset($kuva_src)){
		}
		else {
			$kuva_src = "images/imageNotFound.jpg";
		}
		
		
		$tuote->lisaaTuote($nimi, $varastosaldo, $kategoria, $valmistaja, $kuva_src, $hinta, $kuvaus, $lyhyt_kuvaus);
				
		echo "Tuotteen lis&#228;&#228;minen onnistui!";
		header( 'refresh:2;url=index.php?page=etusivu' ) ;		

	}
	else{
		echo "Tuoteen lis&#228&#228minen ep&#228onnistui.";
	}
}
else {
	echo "Tuote l&#246;ytyy jo tietokannasta.";
	header( 'refresh:1;url=index.php?page=etusivu' ) ;	
}

?>