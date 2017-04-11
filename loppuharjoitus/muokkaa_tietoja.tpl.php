<div id="main">  
<form name="rekisteroidy" action="tallenna_muutokset.php" method="post">
	Käyttajätunnus <br><input type="text" name="kayttajatunnus" value="<?php $this->eprint($this->kayttajatunnus) ?>"><br><br>
	Salasana <br><input type="text" name="pw" value="<?php $this->eprint($this->pw)?>"><br><br>
	Sähköpostiosoite <br><input type="text" name="email" value="<?php $this->eprint($this->email)?>"><br><br>
	<input type="Submit" name="submit"><br><br><br>
</form>
</div>
