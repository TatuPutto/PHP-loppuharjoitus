<div id="main">
	<h3>Tilauksen sisältö</h3> 
	
	<table>
		<tr>
			<td> <?php
			    foreach($this->tuotteet as $alkio): ?>
					<div id="tilaukset_box"> <?php
						$tuote_id = $alkio["tuote_id"];
						$nimi = $alkio["nimi"];  			
						$valmistaja = $alkio["valmistaja"];
						echo "<a href='?page=tuotetiedot&tuote_id=$tuote_id'>$valmistaja $nimi</a><br>"; ?>
					</div> <?php
				endforeach; ?>
			</td>
		</tr>
	</table><?php
 
	if(isset($_SESSION['yllapitaja'])):
		$asiakas_id = $this->asiakas['asiakas_id'];
		$tilausaika = $this->tilausaika;
	
		echo "<br><br><b>Tilaaja:</b><br>";
		echo "<br>Käyttäjä id: "; $this->eprint($this->asiakas['asiakas_id']);
		echo "<br>Käyttäjätunnus: "; $this->eprint($this->asiakas['kayttajatunnus']);
		echo "<br>Nimi: ";  $this->eprint($this->asiakas['etunimi']);
		echo " "; $this->eprint($this->asiakas['sukunimi']);
		echo "<br>Email: ";  $this->eprint($this->asiakas['email']); ?>
	
		<br><br>
		<div id="lisaa_ostoskoriin"> <?php
			echo "<a href='?page=vahvista_tilaus&asiakas_id=$asiakas_id&tilausaika=$tilausaika'>Vahvista tilaus</a>" . "<br>"; ?>
		</div> <?php
	endif; ?>
</div>





	
						
						