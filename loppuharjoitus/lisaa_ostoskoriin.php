<?php
//Lisätään valittu tuote ostoskoriin ja palautetaan käyttäjä etusivulle
$tuote = $_GET['tuote_id'];

$_SESSION['ostoskori'][] = $tuote;

header( 'Location: index.php?page=etusivu' ) ;
?>