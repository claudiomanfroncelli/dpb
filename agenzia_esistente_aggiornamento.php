<?php
//include_once "../inc/Insert.class.php";//serve per la funzione inserisciPolizza
//include_once "Database.class.php";
	include_once "inc/inc.utils.php"; //serve per la formattazione della data

	$date = date('d-m-Y');

	$tabella = "agenzie";

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
	if (isset($_POST['rui_agenzia'])) {
		$rui_agenzia = addslashes(filter_var($_POST['rui_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$rui_agenzia = "";
	}
	if (isset($_POST['telefono_fisso_agenzia'])) {
		$telefono_fisso_agenzia = addslashes(filter_var($_POST['telefono_fisso_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$telefono_fisso_agenzia = "";
	}

	if (isset($_POST['pec_agenzia'])) {
		$pec_agenzia = addslashes(filter_var($_POST['pec_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$pec_agenzia = "";
	}

	if (isset($_POST['telefono_fisso_agenzia'])) {
		$telfisso_agenzia = addslashes(filter_var($_POST['telefono_fisso_agenzia'], FILTER_SANITIZE_STRING));
	} else {
		$telfisso_agenzia = "";
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

	/*if (!isset($_POST['regione'])) {
		echo "regione non inserita!";
		die();
	} else {
		$id_regione_agenzia = addslashes(filter_var($_POST['regione'], FILTER_SANITIZE_STRING));
	}
	if (!isset($_POST['provincia'])) {
		echo "provincia non inserita!";
		die();
	} else {
		$id_provincia_agenzia = addslashes(filter_var($_POST['provincia'], FILTER_SANITIZE_STRING));
	}
	if (!isset($_POST['comune'])) {
		echo "comune non inserito!";
		die();
	} else {
		$id_comune_agenzia = addslashes(filter_var($_POST['comune'], FILTER_SANITIZE_STRING));
	}*/
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

	$campi = array("ragione_sociale_agenzia",
		"partita_iva_agenzia",
		"codice_fiscale_agenzia",
		"rui_agenzia",
		"email_agenzia",
		"email_sinistri_agenzia",
		"pec_agenzia",
		"telefono_fisso_agenzia",
		"mobile_agenzia",
		"fax_agenzia",
		"cap_agenzia",
		"indirizzo_agenzia",
		"personariferimento_agenzia");

	$valori = array($ragione_sociale_agenzia,
		$partita_iva_agenzia,
		$codice_fiscale_agenzia,
		$rui_agenzia,
		$email_agenzia,
		$email_sinistri_agenzia,
		$pec_agenzia,
		$telefono_fisso_agenzia,
		$mobile_agenzia,
		$fax_agenzia,
		$cap_agenzia,
		$indirizzo_agenzia,
		$personariferimento_agenzia);

	$condizioni = "id_agenzia = $_POST[id_agenzia]";


	include_once "class/Database.class.php";
	$pdo = new Database();

//Creo il record della tabella
	$pdo->aggiorna($tabella, $campi, $valori, $condizioni);
	$pdo->execute();
//estraggo l'ultimo codice inserito; servirà per persona_dett e situazione'
//$ultimoCodiceInserito = $pdo->lastInsertId();
	$ultimoCodiceAggiornato = $_POST['id_agenzia'];

	/*// ora preparo il record vuoto, correlato alla persona, nella tabella "persona_dett"
	$tabella = "persona_dett";
	$campi = "id_persona, note_persona_dett";
	$valori = array($ultimoCodiceInserito, "inserito il " . $date);

	//Creo il record della tabella "persona_dett"
	$opt->inserisci($tabella, $campi, $valori);
	$opt->execute();


	// ora preparo il record vuoto, correlato alla persona, nella tabella "situazione"
	$tabella = "situazione";
	$campi = "id_persona, note_situazione";
	$valori = array($ultimoCodiceInserito, "inserito il " . $date);


	//Creo il record della tabella "situazione"
	$opt->inserisci($tabella, $campi, $valori);
	$opt->execute();*/

//visualizzo la conferma dell'inserimento a video
	echo "<script type='text/javascript'>";
	echo " alert('dati agenzia aggiornati, codice: $ultimoCodiceAggiornato '); ";
//echo "  location.href='assistito_esistente.php?id_persona=$ultimoCodiceInserito'";
//echo "</script>";

//$opt = new Insert();
//$opt->InserisciPolizza();
//echo $opt->Inserisciagenzia();
//echo "<script type='text/javascript'>";
//echo " alert('nuova Polizza inserita'); ";
	echo " location.href='agenzia_esistente.php?idage=$_POST[id_agenzia]';";
	echo "</script>";
