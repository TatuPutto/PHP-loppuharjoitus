<div id="main">  
<form name="lisaaTuote" action="lisaa_tuote.php" method="post" enctype="multipart/form-data">
	Tuote*<br><input type="text" name="nimi"><br><br>
	Valmistaja*<br><input type="text" name="valmistaja"><br><br>
	Hinta*<br><input type="text" name="hinta"><br><br>
	Varastosaldo*<br><input type="text" name="varastosaldo"><br><br>
	Kuva<br><input type="file" name="lataaKuva" id="lataaKuva"><br><br>
	Kategoria*<br>
	<select name="kategoria">
		<option value="oheislaitteet" selected>Oheislaitteet</option>
		<option value="tietokoneet">Tietokoneet</option>
		<option value="puhelimet">Puhelimet</option>
	</select><br><br>
	
	Tuotteesta etusivulla näkyvä lyhyt kuvaus(max 150 merkkiä)*<br><textarea rows="2" cols="100" maxlength="150" name="lyhyt_kuvaus"></textarea><br><br>
	Kuvaus*<br><textarea rows="8" cols="100" name="kuvaus"></textarea><br><br>
	<input type="Submit"><br><br><br>
	<b>Tähdellä merkityt kentät ovat pakollisia.</b>
</form>
</div>
