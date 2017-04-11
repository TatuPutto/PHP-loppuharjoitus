<?php
session_start();

// Ladataan Savant3-luokan koodi
require_once("Savant3.php");
// Luodaan uusi Savant3-olio
$savant = new Savant3();


$rekisteroidy_linkki = "?page=rekisteroidy_lomake";
$muokkaa_tietoja_linkki = "?page=muokkaa_tietoja";
$tietokoneet_linkki = "?page=tuotekategoria&kategoria=tietokoneet";
$oheislaitteet_linkki ="?page=tuotekategoria&kategoria=oheislaitteet";
$puhelimet_linkki ="?page=tuotekategoria&kategoria=puhelimet";
$ostoskori_linkki = "?page=ostoskori";
$kirjaudu_ulos_linkki = "?page=kirjaudu_ulos&kirjaudu_ulos=1";
$tilaustenkasittely_linkki = "?page=tilaustenkasittely";
$tuotteenlisaaminen_linkki = "?page=lisaa_tuote_lomake";
$etusivulle_linkki = "?page=etusivu";

$savant->assign("rekisteroidy_linkki", $rekisteroidy_linkki);
$savant->assign("muokkaa_tietoja_linkki", $muokkaa_tietoja_linkki);
$savant->assign("tietokoneet_linkki", $tietokoneet_linkki);
$savant->assign("oheislaitteet_linkki", $oheislaitteet_linkki);
$savant->assign("puhelimet_linkki", $puhelimet_linkki);
$savant->assign("ostoskori_linkki", $ostoskori_linkki);
$savant->assign("kirjaudu_ulos_linkki", $kirjaudu_ulos_linkki);
$savant->assign("tilaustenkasittely_linkki", $tilaustenkasittely_linkki);
$savant->assign("tuotteenlisaaminen_linkki", $tuotteenlisaaminen_linkki);
$savant->assign("etusivulle_linkki", $etusivulle_linkki);
// Näytetään template-sivu
$savant->display("header.tpl.php");
?>