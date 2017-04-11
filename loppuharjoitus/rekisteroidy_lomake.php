<div id="main">  
<form name="rekisteroidy" action="rekisteroidy.php" method="post">
	Käyttajätunnus* <br><input type="text" name="kayttajatunnus"><br><br>
	Salasana* <br><input type="text" name="pw"><br><br>
	Etunimi* <br><input type="text" name="etunimi"><br><br>
	Sukunimi*<br><input type="text" name="sukunimi"><br><br>
	Sähköpostiosoite* <br><input type="text" name="email"><br><br>
	Käyttäjäluokka*<br>
	<select name="kayttajaluokka">
		<option value="user" selected>Peruskäyttäjä</option>
		<option value="admin">Ylläpitäjä</option>
	</select><br><br>
	<input type="Submit" name="submit"><br><br><br>

	<b>Tähdellä merkityt kentät ovat pakollisia.</b>
</form>
</div>
