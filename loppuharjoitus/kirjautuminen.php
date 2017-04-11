<?php
session_start();

require_once("db_connection.php");
require_once("asiakas.php");  

$kayttajatunnus = $_POST['kayttajatunnus'];
$pw = $_POST['pw'];

	 
//Tarkistetaan löytyykö käyttäjätunnus tietokannasta
$asiakas = new asiakas();
$tarkista_kayttaja = $asiakas->haeKayttajatunnus($kayttajatunnus);
	 
	//Jos käyttätunnus löytyi tietokannasta, tarkistetaan onko salasana oikein
	if($tarkista_kayttaja){	 
		$tarkista_salasana = $asiakas->tarkistaSalasana($kayttajatunnus, $pw);
	   
		//Jos käyttätunnus ja salasana täsmää, tarkistetaan onko käyttäjä ylläpitäjä vai asiakas
	    if($tarkista_salasana){
	        $tarkista_kayttajaluokka = $asiakas->tarkistaLuokka($kayttajatunnus, $pw);

		    if($tarkista_kayttajaluokka["luokka"] == "admin"){
				$_SESSION['yllapitaja']=1;
                $_SESSION['logged_in']=1;
	            $_SESSION['user']=$kayttajatunnus;
			    $_SESSION['user_id']=$tarkista_salasana["asiakas_id"];
				
			    header( 'Location: '. $_SERVER['HTTP_REFERER']) ;
			 }
			 else{
				$_SESSION['logged_in']=1;
	            $_SESSION['user']=$kayttajatunnus;
			    $_SESSION['user_id']=$tarkista_salasana["asiakas_id"];
				
			    header( 'Location: '. $_SERVER['HTTP_REFERER']) ;
			 }
		 }	 
         //Jos käyttätunnus löytyi tietokannasta, mutta salasana ei ollut oikein
		 else {	
			echo "V&#228;&#228;r&#228; salasana";
			 header( 'refresh:2;url=index.php?page=etusivu' ) ;	
		 }	 
	  }
	  //Jos käyttäjätunnusta ei löydy tietokannasta
	  else{ 
          echo "K&#228;ytt&#228;j&#228;tunnusta ei l&#246;ytynyt";
		  header( 'refresh:2;url=index.php?page=etusivu' ) ;	
	  }
	   
?>
