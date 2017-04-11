<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/tyylitiedosto.css">
</head>
<body>
<div id="main_wrapper">
<div id="header">
	<h1>EiVerkkokauppa.com</h1> 

	<!--Jos käyttäjä on kirjautunut sisään, piilotetaan sisäänkirjautumiseen liittyvät elementit--><?php 
	if(isset($_SESSION['logged_in']) == 1) : ?>
		<div id="login"> <?php 
			echo $_SESSION['user']; ?> <br>
			<a href='<?php $this->eprint($this->kirjaudu_ulos_linkki) ?>'>Kirjaudu ulos</a>
		</div> <?php 
	else : ?>
		<div id="login">
			<a href="<?php $this->eprint($this->rekisteroidy_linkki) ?>">Rekisteröidy</a><br>

			<form action="kirjautuminen.php" method="post">
				Käyttäjätunnus: <input type="text" name="kayttajatunnus"><br>
				Salasana: <input type="password" name="pw"><br>
				<input type="submit">
			</form> 
		</div> <?php 
	endif; ?>
</div>

<div id="navigaatio">
	<ul> 
		<li><a href="<?php $this->eprint($this->etusivulle_linkki) ?>">Etusivulle</a></li>
		<li><a href="<?php $this->eprint($this->ostoskori_linkki) ?>">Ostoskori</a></li> 
		
		<!--Jos käyttäjä on yllapitäjä, näytetään navigaatio elementissä linkki käsittelemättömiin tilauksiin--> <?php 
		if(isset($_SESSION['yllapitaja'])) :   ?>
			<li><a href="<?php $this->eprint($this->tilaustenkasittely_linkki) ?>">Käsittelemättömät tilaukset</a></li> 
			<li><a href="<?php $this->eprint($this->tuotteenlisaaminen_linkki) ?>">Lisää tuote</a></li>  
			<li><a href="<?php $this->eprint($this->muokkaa_tietoja_linkki) ?>">Muokkaa tietojasi</a></li> <?php
		elseif(isset($_SESSION['user_id'])): ?>
			<li><a href="<?php $this->eprint($this->tilaustenkasittely_linkki) ?>">Tilaushistoria</a></li> 
			<li><a href="<?php $this->eprint($this->muokkaa_tietoja_linkki) ?>">Muokkaa tietojasi</a></li> <?php
		endif; ?>
		
    </ul>   
</div>


<div id="kategoriat">
	<h2>Tuotekategoriat</h2>
   
	<a href="<?php $this->eprint($this->oheislaitteet_linkki) ?>">Oheislaitteet</a><br>
	<a href="<?php $this->eprint($this->puhelimet_linkki) ?>">Puhelimet</a><br>
	<a href="<?php $this->eprint($this->tietokoneet_linkki) ?>">Tietokoneet</a><br><br>
</div>
</body>
</html>