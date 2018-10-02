<?php
//include_once "../inc/Insert.class.php";//serve per la funzione inserisciPolizza
//include_once "Database.class.php";
	include_once "inc/inc.utils.php"; //serve per la formattazione della data

	$date = date('d-m-Y');

	$tabella = "agenzie";

	if (!isset($_POST['id_compagnia_agenzia'])) {
		echo "ragione sociale compagnia non inserita!";
		die();
	} else {
		$id_compagnia_agenzia = addslashes(filter_var($_POST['id_compagnia_agenzia'], FILTER_SANITIZE_STRING));
	}

	if (!isset($_POST['ragione_sociale_agenzia'])) {
		echo "ragione sociale agenzia non inserita!";
		die();
	} else {
		$ragione_sociale_agenzia = addslashes(filter_var($_POST['ragione_sociale_agenzia'], FILTER_SANITIZE_STRING));
	}

	if (isset($_POST['partita_iva_agenzia'])) {
		$partita_iva_agenzia = addslashes(filter_var($_POST['partita_iva_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$partita_iva_agenzia = "";
	}
	if (isset($_POST['codice_fiscale_agenzia'])) {
		$codice_fiscale_agenzia = addslashes(filter_var($_POST['codice_fiscale_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$codice_fiscale_agenzia = "";
	}
	if (isset($_POST['rui_agenzia'])) {
		$rui_agenzia = addslashes(filter_var($_POST['rui_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$rui_agenzia = "";
	}
	if (isset($_POST['email_agenzia'])) {
		$email_agenzia = addslashes(filter_var($_POST['email_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$email_agenzia = "";
	}
	if (isset($_POST['email_sinistri_agenzia'])) {
		$email_sinistri_agenzia = addslashes(filter_var($_POST['email_sinistri_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$email_sinistri_agenzia = "";
	}

	if (isset($_POST['pec_agenzia'])) {
		$pec_agenzia = addslashes(filter_var($_POST['pec_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$pec_agenzia = "";
	}

	if (isset($_POST['telefono_fisso_agenzia'])) {
		$telefono_fisso_agenzia = addslashes(filter_var($_POST['telefono_fisso_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$telefono_fisso_agenzia = "";
	}

	if (isset($_POST['mobile_agenzia'])) {
		$mobile_agenzia = addslashes(filter_var($_POST['mobile_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$mobile_agenzia = "";
	}
	if (isset($_POST['fax_agenzia'])) {
		$fax_agenzia = addslashes(filter_var($_POST['fax_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$fax_agenzia = "";
	}
	if (isset($_POST['id_regione_agenzia'])) {
		$id_regione_agenzia = addslashes(filter_var($_POST['id_regione_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$id_regione_agenzia = "";
	}
	if (isset($_POST['id_provincia_agenzia'])) {
		$id_provincia_agenzia = addslashes(filter_var($_POST['id_provincia_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$id_provincia_agenzia = "";
	}
	if (isset($_POST['id_comune_agenzia'])) {
		$id_comune_agenzia = addslashes(filter_var($_POST['id_comune_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$id_comune_agenzia = "";
	}
	if (isset($_POST['cap_agenzia'])) {
		$cap_agenzia = addslashes(filter_var($_POST['cap_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$cap_agenzia = "";
	}
	if (isset($_POST['indirizzo_agenzia'])) {
		$indirizzo_agenzia = addslashes(filter_var($_POST['indirizzo_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$indirizzo_agenzia = "";
	}
	if (isset($_POST['personariferimento_agenzia'])) {
		$personariferimento_agenzia = addslashes(filter_var($_POST['personariferimento_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$personariferimento_agenzia = "";
	}

	$campi = " id_compagnia_agenzia, ragione_sociale_agenzia, partita_iva_agenzia, codice_fiscale_agenzia, ";
	$campi .= " rui_agenzia, email_agenzia, email_sinistri_agenzia, pec_agenzia, telefono_fisso_agenzia, ";
	$campi .= " mobile_agenzia, fax_agenzia, id_regione_agenzia, id_provincia_agenzia, id_comune_agenzia, ";
	$campi .= " cap_agenzia, indirizzo_agenzia, personariferimento_agenzia";

	$valori = array($id_compagnia_agenzia,
		$ragione_sociale_agenzia,
		$partita_iva_agenzia,
		$codice_fiscale_agenzia,
		$rui_agenzia,
		$email_agenzia,
		$email_sinistri_agenzia,
		$pec_agenzia,
		$telefono_fisso_agenzia,
		$mobile_agenzia,
		$fax_agenzia,
		$id_regione_agenzia,
		$id_provincia_agenzia,
		$id_comune_agenzia,
		$cap_agenzia,
		$indirizzo_agenzia,
		$personariferimento_agenzia);

	include_once "class/Database.class.php";
	$pdo = new Database();

//Creo il record della tabella
	$pdo->inserisci($tabella, $campi, $valori);
	$pdo->execute();
//estraggo l'ultimo codice inserito; servirà per persona_dett e situazione'
	$ultimoCodiceInserito = $pdo->lastInsertId();
//$ultimoCodiceInserito = $id_compagnia;

//visualizzo la conferma dell'inserimento a video
	echo "<script type='text/javascript'>";
	echo " alert('nuova Agenzia inserita, numero: $ultimoCodiceInserito '); ";
	echo " location.href='agenzie.php';";
	echo "</script>";
