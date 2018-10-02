<?php

	include_once 'class/Database.class.php';
	$prov = new Database();

	if (isset($_POST['id_regione'])) {
		echo $prov->ShowProvince();
		die;
	}

	if (isset($_POST['id_provincia'])) {
		echo $prov->ShowComuni();
		die;
	}

	if (isset($_POST['id_comune'])) {
		die;
	}

?>