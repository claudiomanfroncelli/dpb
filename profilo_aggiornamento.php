<?php
	include_once "inc/Update.class.php";
	$opt = new Update();
	$opt->AggiornaUtente();
//echo $opt->InserisciCompagnia();
	echo "<script type='text/javascript'>";
	echo " alert('profilo Utente aggiornato'); ";

// controlli------------------------------------
// ToDo

	echo " location.href='profilo.php';";
	echo "</script>";
