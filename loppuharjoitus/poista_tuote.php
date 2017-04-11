<?php
require_once("tuote.php");
$tuote = new tuote();

$tuote_id = $_GET['tuote_id'];

//Kutsutaan tuotteen poiston suorittavaa metodia
$tuote->poistaTuote($tuote_id);

header( 'Location: index.php?page=etusivu');
