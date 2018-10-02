<?php
//include_once "../inc/Insert.class.php";//serve per la funzione inserisciPolizza
//include_once "Database.class.php";
	include_once "inc/inc.utils.php"; //serve per la formattazione della data

	$date = date('d-m-Y');

	$tabella = "compagnie";

	if (!isset($_POST['ragione_sociale_compagnia'])) {
		echo "ragione sociale compagnia non inserita!";
		die();
	} else {
		$ragionesocialecompagnia = addslashes(filter_var($_POST['ragione_sociale_compagnia'], FILTER_SANITIZE_STRING));
	}

	if (isset($_POST['partita_iva_compagnia'])) {
		$partita_iva_compagnia = addslashes(filter_var($_POST['partita_iva_compagnia'], FILTER_SANITIZE_STRING));
	} else {
		$partita_iva_compagnia = "";
	}
	if (isset($_POST['codice_fiscale_compagnia'])) {
		$codice_fiscale_compagnia = addslashes(filter_var($_POST['codice_fiscale_compagnia'], FILTER_SANITIZE_STRING));
	} else {
		$codice_fiscale_compagnia = "";
	}

	if (isset($_POST['email_compagnia'])) {
		$email_compagnia = addslashes(filter_var($_POST['email_compagnia'], FILTER_SANITIZE_STRING));
	} else {
		$email_compagnia = "";
	}

	if (isset($_POST['pec_compagnia'])) {
		$pec_compagnia = addslashes(filter_var($_POST['pec_compagnia'], FILTER_SANITIZE_STRING));
	} else {
		$pec_compagnia = "";
	}

	if (isset($_POST['telefono_fisso_compagnia'])) {
		$telefono_fisso_compagnia = addslashes(filter_var($_POST['telefono_fisso_compagnia'], FILTER_SANITIZE_STRING));
	} else {
		$telefono_fisso_compagnia = "";
	}

	if (isset($_POST['mobile_compagnia'])) {
		$mobile_compagnia = addslashes(filter_var($_POST['mobile_compagnia'], FILTER_SANITIZE_STRING));
	} else {
		$mobile_compagnia = "";
	}

	if (isset($_POST['fax_compagnia'])) {
		$fax_compagnia = addslashes(filter_var($_POST['fax_compagnia'], FILTER_SANITIZE_STRING));
	} else {
		$fax_compagnia = "";
	}

	if (isset($_POST['id_regione_compagnia'])) {
		$id_regione_compagnia = addslashes(filter_var($_POST['id_regione_compagnia'], FILTER_SANITIZE_STRING));
	} else {
		$id_regione_compagnia = "";
	}
	if (isset($_POST['id_provincia_compagnia'])) {
		$id_provincia_compagnia = addslashes(filter_var($_POST['id_provincia_compagnia'], FILTER_SANITIZE_STRING));
	} else {
		$id_provincia_compagnia = "";
	}
	if (isset($_POST['id_comune_compagnia'])) {
		$id_comune_compagnia = addslashes(filter_var($_POST['id_comune_compagnia'], FILTER_SANITIZE_STRING));
	} else {
		$id_comune_compagnia = "";
	}
	if (isset($_POST['cap_compagnia'])) {
		$cap_compagnia = addslashes(filter_var($_POST['cap_compagnia'], FILTER_SANITIZE_STRING));
	} else {
		$cap_compagnia = "";
	}
	if (isset($_POST['indirizzo_compagnia'])) {
		$indirizzo_compagnia = addslashes(filter_var($_POST['indirizzo_compagnia'], FILTER_SANITIZE_STRING));
	} else {
		$indirizzo_compagnia = "";
	}
	if (isset($_POST['personariferimento_compagnia'])) {
		$personariferimento_compagnia = addslashes(filter_var($_POST['personariferimento_compagnia'], FILTER_SANITIZE_STRING));
	} else {
		$personariferimento_compagnia = "";
	}

	$campi = " ragione_sociale_compagnia, partita_iva_compagnia, codice_fiscale_compagnia, email_compagnia, pec_compagnia, ";
	$campi .= " telefono_fisso_compagnia, mobile_compagnia, fax_compagnia, id_regione_compagnia, ";
	$campi .= " id_provincia_compagnia, id_comune_compagnia, cap_compagnia, indirizzo_compagnia, ";
	$campi .= " personariferimento_compagnia";

	$valori = array($ragionesocialecompagnia, $partita_iva_compagnia, $codice_fiscale_compagnia, $email_compagnia, $pec_compagnia,
		$telefono_fisso_compagnia, $mobile_compagnia, $fax_compagnia, $id_regione_compagnia,
		$id_provincia_compagnia, $id_comune_compagnia, $cap_compagnia, $indirizzo_compagnia,
		$personariferimento_compagnia);

	include_once "class/Database.class.php";
	$pdo = new Database();

//Creo il record della tabella
	$pdo->inserisci($tabella, $campi, $valori);
	$pdo->execute();
//estraggo l'ultimo codice inserito; servirà per persona_dett e situazione'
	$ultimoCodiceInserito = $pdo->lastInsertId();
//$ultimoCodiceInserito = $id_compagnia;

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
	echo " alert('nuova Compagnia inserita, numero: $ultimoCodiceInserito '); ";
//echo "  location.href='assistito_esistente.php?id_persona=$ultimoCodiceInserito'";
//echo "</script>";

//$opt = new Insert();
//$opt->InserisciPolizza();
//echo $opt->InserisciCompagnia();
//echo "<script type='text/javascript'>";
//echo " alert('nuova Polizza inserita'); ";
	echo " location.href='compagnie.php';";
	echo "</script>";
