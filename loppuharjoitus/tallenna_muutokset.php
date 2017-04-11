<?php
session_start();
require_once("asiakas.php");

$asiakas = new asiakas();

$kayttajatunnus = $_POST['kayttajatunnus'];
$pw = $_POST['pw'];
$email = $_POST['email'];

$asiakas_id = $_SESSION['user_id'];

//Päivitetään asiakkaan tekemät muutokset
$asiakas->paivitaTiedot($kayttajatunnus, $pw, $email, $asiakas_id);

header('Location: index.php?page=kirjaudu_ulos&kirjaudu_ulos=1');
?>