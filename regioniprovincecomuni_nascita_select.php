<?php

	include_once 'class/Database.class.php';
	$nas = new Database();

	if (isset($_POST['id_regione'])) {
		echo $nas->ShowProvinceNascita();
		die;
	}

	if (isset($_POST['id_provincia'])) {
		echo $nas->ShowComuniNascita();
		die;
	}

	if (isset($_POST['id_comune'])) {
		die;
	}

?>