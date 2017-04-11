<div id="main">
	<h3><b>Tilaukset</b></h3>
	<table>
		<tr>
			<td> <?php
				foreach($this->poista_duplikaatit as $alkio) : ?>
					<div id="tilaukset_box"> <?php
						$asiakas_id = $alkio['asiakas_id'];
						$tilausaika = $alkio['tilausaika'];
						echo "<a href='?page=nayta_tilaus&asiakas_id=$asiakas_id&tilausaika=$tilausaika'>$tilausaika</a>" . "<br>"; ?>
					</div> <?php					
                endforeach; ?>
			</td>
		</tr>
	</table>
</div>
