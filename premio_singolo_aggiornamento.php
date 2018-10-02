<?php
//include_once "../inc/Insert.class.php";//serve per la funzione inserisciPolizza
//include_once "../inc/database.class.php";
	include_once "inc/inc.utils.php"; //serve per la formattazione della data
	$date = date('d-m-Y');
	$tabella = "premi";

	if (!isset($_POST['rata_premio'])) {
		echo "impossibile procedere: numero rata non specificato!";
		die();
	} else {
		$rata_premio = addslashes(filter_var($_POST['rata_premio'], FILTER_SANITIZE_STRING));
	}
	if (!isset($_POST['id_premio'])) {
		echo "impossibile procedere: premio non specificato!";
		die();
	} else {
		$id_premio = addslashes(filter_var($_POST['id_premio'], FILTER_SANITIZE_STRING));
	}
	if (!isset($_POST['id_polizza_premio'])) {
		echo "impossibile procedere: polizza non specificata!";
		die();
	} else {
		$id_polizza_premio = addslashes(filter_var($_POST['id_polizza_premio'], FILTER_SANITIZE_STRING));
	}
	if (!isset($_POST['scadenza_premio'])) {
		echo "impossibile procedere: scadenza non specificata!";
		die();
	} else {
		$scadenza_premio = format_data($_POST['scadenza_premio']);
	}
	if (!isset($_POST['importo_lordo_premio'])) {
		echo "impossibile procedere: lordo non specificato!";
		die();
	} else {
		$importo_lordo_premio = addslashes(filter_var($_POST['importo_lordo_premio']));
	}
	if (!isset($_POST['importo_netto_premio'])) {
		echo "impossibile procedere: netto non specificato!";
		die();
	} else {
		$importo_netto_premio = addslashes(filter_var($_POST['importo_netto_premio']));
	}
	if (isset($_POST['id_tipopagamento_premio'])) {
		$id_tipopagamento_premio = addslashes(filter_var($_POST['id_tipopagamento_premio'], FILTER_SANITIZE_STRING));
	} else {
		$id_tipopagamento_premio = "";
	}
	if (isset($_POST['pagato_il_premio'])) {
		$pagato_il_premio = format_data($_POST['pagato_il_premio']);
	} else {
		$pagato_il_premio = "";
	}
	if (isset($_POST['data_incasso_premio'])) {
		$data_incasso_premio = format_data($_POST['data_incasso_premio']);
	} else {
		$data_incasso_premio = "";
	}
	if (isset($_POST['provv_liquidata_premio'])) {
		$provv_liquidata_premio = addslashes(filter_var($_POST['provv_liquidata_premio'], FILTER_SANITIZE_STRING));
	} else {
		$provv_liquidata_premio = "";
	}
	if (isset($_POST['provv_da_liquidare_premio'])) {
		$provv_da_liquidare_premio = addslashes(filter_var($_POST['provv_da_liquidare_premio'], FILTER_SANITIZE_STRING));
	} else {
		$provv_da_liquidare_premio = "";
	}
	if (isset($_POST['data_liquidata_premio'])) {
		$data_liquidata_premio = format_data($_POST['data_liquidata_premio']);
	} else {
		$data_liquidata_premio = "";
	}

	$campi = array(
		"rata_premio",
		"id_premio",
		"id_polizza_premio",
		"scadenza_premio",
		"importo_lordo_premio",
		"importo_netto_premio",
		"id_tipopagamento_premio",
		"pagato_il_premio",
		"data_incasso_premio",
		"provv_da_liquidare_premio",
		"provv_liquidata_premio",
		"data_liquidata_premio"
	);


	$valori = array(
		$rata_premio,
		$id_premio,
		$id_polizza_premio,
		$scadenza_premio,
		$importo_lordo_premio,
		$importo_netto_premio,
		$id_tipopagamento_premio,
		$pagato_il_premio,
		$data_incasso_premio,
		$provv_da_liquidare_premio,
		$provv_liquidata_premio,
		$data_liquidata_premio
	);

	$condizioni = "id_premio = $_POST[id_premio]";

	include_once "class/Database.class.php";
	$pdo = new Database();

//Creo il record della tabella
	$pdo->aggiorna($tabella, $campi, $valori, $condizioni);
	$pdo->execute();
	$ultimoCodiceAggiornato = $_POST['rata_premio'];

//visualizzo la conferma dell'inserimento a video
	echo "<script type='text/javascript'>";
	echo " alert('Premio aggiornato, numero rata: $ultimoCodiceAggiornato '); ";
//echo "  location.href='assistito_esistente.php?id_persona=$ultimoCodiceInserito'";
//echo "</script>";

	echo " location.href='premio_esistente_modifica.php?idpol=$_POST[id_polizza_premio]&idprem=$_POST[id_premio]';";
	echo "</script>";
