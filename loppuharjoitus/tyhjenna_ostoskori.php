<?php
session_start();
unset($_SESSION['ostoskori']);
header( 'Location: index.php?page=etusivu' );
?>