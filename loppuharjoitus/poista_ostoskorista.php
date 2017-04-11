<?php
//Poistetaan valittu tuote ostoskorista
$tuote_id = $_GET['tuote_id'];

$key = array_search($_GET['tuote_id'],$_SESSION['ostoskori']);
unset($_SESSION['ostoskori'][$key]);
$_SESSION["ostoskori"] = array_values($_SESSION["ostoskori"]);
//Jos tuotteen poistamisen jälkeen ostoskori on tyhjä, lähetetään käyttäjä takaisin etusivulle
if($_SESSION['ostoskori'] == null){
	unset($_SESSION['ostoskori']); 
	header( 'Location: index.php?page=ostoskori' ) ;
}
else{
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>