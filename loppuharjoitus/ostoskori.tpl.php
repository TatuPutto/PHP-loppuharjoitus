<div id="main">  
<h3>Ostoskorin sisältö<h3>  <?php 
	if(isset($_SESSION['ostoskori'])) : ?>
		<div class="etusivu"> 
			<table>
				<tr>
					<td> <?php
						$kokonaisHinta = 0;
						foreach ($this->tuotteet as $alkio): ?>
							<div id="ostoskori_box">  
								<div id="ostoskori_kuva_box"> <?php
									$kuva_src = $alkio['kuva_src'];
									//Jos kuvalle ei ole annettu polkua, asetetaan oletus kuva
									if($kuva_src == "images/imageNotFound.jpg"){
										echo "<img src='images/imageNotFound.jpg' style='width:80px;height:80px'>";
									}
									else{
										echo "<img src='$kuva_src' style='width:80px;height:80px'>"; 
									} ?>	   
								</div>
								<div id="ostoskori_text_box"> <?php 
									$tuote_id = $alkio["tuote_id"];
									$nimi = $alkio["nimi"];  
									$valmistaja = $alkio["valmistaja"];									
									echo "<a href='?page=tuotetiedot&tuote_id=$tuote_id'>$valmistaja $nimi</a><br><br>";
									echo $alkio["hinta"] . "€<br>";
									$kokonaisHinta += $alkio["hinta"]; ?>
								</div> 
								<div id="poista_ostoskorista"> <?php 
									echo "<a href='?page=poista_ostoskorista&tuote_id=$tuote_id'>Poista</a><br><br>"; ?>
								</div> 
							</div> <?php
						endforeach; 
						echo "<br><b>Yhteensä: " . $kokonaisHinta . "€</b>";  ?> <br>
						
						<div id="lisaa_ostoskoriin"> <?php
							if(isset($_SESSION['logged_in'])){ ?>
								<a href="<?php $this->eprint($this->tilaatuotteet_linkki)?>">Tilaa</a></li> <?php 
							}
							else{
								$error = "Kirjaudu sisään tilataksesi ostoskorin sisätämät tuotteet!";
								echo "<script type='text/javascript'>alert(\"$error\");</script>";
								echo "Tilaa";
							} ?>			   
						</div>
						<div id="lisaa_ostoskoriin"> 
							<a href="<?php $this->eprint($this->tyhjennaostoskori_linkki)?>">Tyhjennä ostoskori</a></li>	
						</div>	
				</td>
			</tr>
		</table>
	    
</div> <?php 
	else:
		echo "Ostoskori on tyhjä.";
endif  ?>
   
</div>
