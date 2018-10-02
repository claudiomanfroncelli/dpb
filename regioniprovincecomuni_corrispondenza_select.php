<?php

	include_once 'class/Database.class.php';
	$cor = new Database();

	if (isset($_POST['id_regione'])) {
		echo $cor->ShowProvinceCorrispondenza();
		die;
	}

	if (isset($_POST['id_provincia'])) {
		echo $cor->ShowComuniCorrispondenza();
		die;
	}

	if (isset($_POST['id_comune'])) {
		die;
	}

?>