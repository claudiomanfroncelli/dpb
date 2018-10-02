<?php

	include_once 'class/SelectCompagnieAgenzieMandati.class.php';
	$comp = new SelectCompagnieAgenzieMandati();

	if (isset($_POST['id_compagnia'])) {
		echo $comp->ShowAgenzie();
	}

	if (isset($_POST['id_agenzia'])) {
		echo $comp->ShowMandati();
	}

	if (isset($_POST['id_mandato'])) {
		die();
	}

?>