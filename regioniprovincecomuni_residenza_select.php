<?php

	include_once 'class/Database.class.php';
	$res = new Database();

	if (isset($_POST['id_regione'])) {
		echo $res->ShowProvinceResidenza();
		die;
	}

	if (isset($_POST['id_provincia'])) {
		echo $res->ShowComuniResidenza();
		die;
	}

	if (isset($_POST['id_comune'])) {
		die;
	}

?>