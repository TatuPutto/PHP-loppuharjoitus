<?php
$kirjaudu_ulos = $_GET['kirjaudu_ulos'];

//Tuhotaan sessiot ja lähetetään käyttäjä takaisin edelliselle sivulle
if($kirjaudu_ulos == 1){
	unset($_SESSION['yllapitaja']);
	unset($_SESSION['logged_in']);
	unset($_SESSION['ostoskori']);
	unset($_SESSION['user']);
	unset($_SESSION['user_id']);
	session_destroy();
		
	header( 'Location: index.php?page=etusivu' ) ;
}	 
?>