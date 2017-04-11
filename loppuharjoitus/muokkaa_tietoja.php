<?php
require_once("Savant3.php");
require_once("asiakas.php");

$savant = new Savant3();
$asiakas = new asiakas();

$asiakas_id = $_SESSION["user_id"];


$kayttaja[] = $asiakas->haeAsiakas($asiakas_id);

foreach ($kayttaja as $alkio){
	$kayttajatunnus = $alkio['kayttajatunnus'];
	$email = $alkio['email'];
	$pw = $alkio['pw'];
}
 

$savant->assign("kayttajatunnus", $kayttajatunnus);
$savant->assign("email", $email);
$savant->assign("pw", $pw);

$savant->display("muokkaa_tietoja.tpl.php");
?>