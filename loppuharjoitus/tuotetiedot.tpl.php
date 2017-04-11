<div id="tuotetiedot_main">  
	<div class="tuotenimi">
		<?php $this->eprint($this->valmistaja) ?> <?php $this->eprint($this->nimi) ?> <br>  
	</div>	
		 	 
	<div class="kuva">
		<img src=<?php $this->eprint($this->kuva) ?>>	
	</div>		 
		 
	<div class="tuotetiedot">
		Tuote id: <?php $this->eprint($this->tuote_id) ?> <br>
		Valmistaja: <?php $this->eprint($this->valmistaja) ?> <br>
		Hinta: <?php $this->eprint($this->hinta) ?> € <br><br>
			
		<div id="lisaa_ostoskoriin">
			<a href="<?php $this->eprint($this->lisaa_ostoskoriin) ?>">Lisää ostoskoriin</a> <br>				 	 
		</div>  <?php
		
		if(isset($_SESSION["yllapitaja"])): ?>
			<div id="lisaa_ostoskoriin">
				<a href="<?php $this->eprint($this->poista_tuote) ?>">Poista tuote</a> <br> 
		</div> <?php
		endif; ?>	  
	</div>
	 
	</div>
	<div class="varastosaldo">   
		Varastossa: <?php $this->eprint($this->varastosaldo) ?> <br>
	</div>
		 
	<div class="tuotekuvaus">
		<?php $this->eprint($this->kuvaus) ?>
	</div>
	</div>
</div>
