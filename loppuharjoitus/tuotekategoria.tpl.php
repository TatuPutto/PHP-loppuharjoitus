<div id="main"> 
	<h3>Tuotteet</h3>
	
	<div id="sivunumero"> <?php 
		//Tulostetaan sivunumerot klikattavina linkkeinä
		$kategoria = $this->kategoria;
		for ($i = 1; $i <= $this->sivumaara; $i++) { 
			echo "<a href='?page=tuotekategoria&kategoria=$kategoria&sivu=".$i."'>".$i."</a> "; 	
		} ?>
	</div>
	
    <!--Luodaan taulu, jonkasisällöksi tulostetaan tuotteet taulukon 5 ensimmäistä arvoa-->
	<table tbody="">
		<tr>
			<td> <?php 
				$i = 0;
				//Käydään tuotteet taulukko läpi
				foreach ($this->tuotteet as $alkio): 
					//kun $i:n arvo kasvaa viiteen lopetetaan taulukon läpikäyminen
					if($i == 5) break; ?>
				
					<div id="etusivu_box"> <?php 
						$tuote_id = $alkio["tuote_id"];
						$nimi = $alkio["nimi"];  
						$valmistaja = $alkio["valmistaja"]; ?>
	  
						<div id="kuva_box"> <?php 
							$kuva_src = $alkio['kuva_src'];
			  
			                //Jos kuvalle ei ole annettu polkua, asetetaan oletus kuva
							if($kuva_src == "images/imageNotFound.jpg"){
								echo "<img src='images/imageNotFound.jpg' style='width:160px;height:145px'>";
							}
							else{
								echo "<img src='$kuva_src' style='width:160px;height:145px'>"; 
							} ?>	   
						</div>
	  
						<div id="text_box"> <?php  
							echo "<a href='?page=tuotetiedot&tuote_id=$tuote_id'>$valmistaja $nimi</a><br>";
							echo $alkio["hinta"] . " €"; ?>
							
							<div id="kuvaus_box"> <?php
								echo $alkio["lyhyt_kuvaus"]?>
							</div>
						</div>
					</div>  <?php
					$i++;
				endforeach; ?>
			</td>
	
    <!--Toisen palstan sisällöksi tulostetaan tuotteet taulukon 5 viimeistä arvoa-->
			<td valign="top"> <?php
				foreach (array_slice($this->tuotteet, 5) as $alkio): ?>
					<div id="etusivu_box"> <?php
						$tuote_id = $alkio["tuote_id"];
						$nimi = $alkio["nimi"];
						$valmistaja = $alkio["valmistaja"]; ?>
						
						<div id="kuva_box"> <?php 
							$kuva_src = $alkio['kuva_src'];
			  
							if($kuva_src == "images/imageNotFound.jpg") {
								echo "<img src='images/imageNotFound.jpg' style='width:160px;height:145px'>";
							}
							else{
								echo "<img src='$kuva_src' style='width:160px;height:145px'>"; 
							} ?>	   
						</div>
	  
						<div id="text_box"> <?php  
							echo "<a href='?page=tuotetiedot&tuote_id=$tuote_id'>$valmistaja $nimi</a><br>";
							echo $alkio["hinta"] . " €";?>
							
							<div id="kuvaus_box"> <?php
								echo $alkio["lyhyt_kuvaus"]; ?>
							</div>
						</div>
					</div> <?php
				endforeach; ?>
			</td>
		</tr>
	</table>
</div>
