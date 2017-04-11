<?php
// Ladataan Savant3-luokan koodi
require_once("Savant3.php");
require_once("tuote.php");
// Luodaan uusi Savant3-olio
$savant = new Savant3();
$tuote = new tuote;

//jos ostoskori sessio on olemassa, laitetaan session sisältö tuotteet taulukkoon
if(isset($_SESSION['ostoskori'])){
	foreach($_SESSION['ostoskori'] as $alkio){
		$tuotteet[] = $tuote->haeTuote($alkio);
	}
	$savant->assign("tuotteet", $tuotteet);
}
else{
}

$tilaatuotteet_linkki = "?page=tilaa_tuotteet";
$tyhjennaostoskori_linkki = "?page=tyhjenna_ostoskori";
// Näytetään template-sivu
$savant->assign("tilaatuotteet_linkki", $tilaatuotteet_linkki);
$savant->assign("tyhjennaostoskori_linkki", $tyhjennaostoskori_linkki);
$savant->display("ostoskori.tpl.php");
?>

