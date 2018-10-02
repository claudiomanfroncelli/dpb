<?php

	include_once 'class/SelectCompagnieAgenzieContraenti.class.php';
	$comp = new SelectCompagnieAgenzieContraenti();

	if (isset($_POST['id_compagnia'])) {
		echo $comp->ShowAgenzie();
		die;
	}

	if (isset($_POST['id_agenzia'])) {
		echo $comp->ShowContraenti();
		die;
	}

	if (isset($_POST['id_contraente'])) {
		die;
	}

?>