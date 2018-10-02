<?php
//include_once "../inc/Insert.class.php";//serve per la funzione inserisciPolizza
//include_once "../inc/database.class.php";
	include_once "inc/inc.utils.php"; //serve per la formattazione della data

	$date = date('d-m-Y');

	$tabella = "contraenti";


	if (isset($_POST['qualifica_contraente'])) {
		$qualifica_contraente = addslashes(filter_var($_POST['qualifica_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$qualifica_contraente = "";
	}
	if (!isset($_POST['cognome_contraente'])) {
		echo "ragione sociale o cognome non inserito!";
		die();
	}
	$cognome_contraente = addslashes(filter_var($_POST['cognome_contraente'], FILTER_SANITIZE_STRING));

	if (!isset($_POST['nome_contraente'])) {
		echo "nome non inserito!";
		die();
	}
	$nome_contraente = addslashes(filter_var($_POST['nome_contraente'], FILTER_SANITIZE_STRING));

	if (isset($_POST['personafisica_contraente'])) {
		$personafisica_contraente = addslashes(filter_var($_POST['personafisica_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$personafisica_contraente = "";
	}
	if (isset($_POST['privacy_contraente'])) {
		$privacy_contraente = addslashes(filter_var($_POST['privacy_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$privacy_contraente = "";
	}
	if (isset($_POST['id_regione_nascita_contraente'])) {
		$id_regione_nascita_contraente = addslashes(filter_var($_POST['id_regione_nascita_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$id_regione_nascita_contraente = "0";
	}
	if (isset($_POST['id_provincia_nascita_contraente'])) {
		$id_provincia_nascita_contraente = addslashes(filter_var($_POST['id_provincia_nascita_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$id_provincia_nascita_contraente = "0";
	}
	if (isset($_POST['id_comune_nascita_contraente'])) {
		$id_comune_nascita_contraente = addslashes(filter_var($_POST['id_comune_nascita_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$id_comune_nascita_contraente = "0";
	}
	if (isset($_POST['data_nascita_contraente'])) {
		$data_nascita_contraente = format_data($_POST['data_nascita_contraente']);
	} else {
		$data_nascita_contraente = "0000-00-00";
	}
	if (isset($_POST['id_tipodocumento_contraente'])) {
		$id_tipo_documento_contraente = addslashes(filter_var($_POST['id_tipodocumento_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$id_tipo_documento_contraente = "";
	}
	if (isset($_POST['numero_documento_contraente'])) {
		$numero_documento_contraente = addslashes(filter_var($_POST['numero_documento_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$numero_documento_contraente = "";
	}
	if (isset($_POST['id_regione_residenza_contraente'])) {
		$id_regione_residenza_contraente = addslashes(filter_var($_POST['id_regione_residenza_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$id_regione_residenza_contraente = "0";
	}
	if (isset($_POST['id_provincia_residenza_contraente'])) {
		$id_provincia_residenza_contraente = addslashes(filter_var($_POST['id_provincia_residenza_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$id_provincia_residenza_contraente = "0";
	}
	if (isset($_POST['id_comune_residenza_contraente'])) {
		$id_comune_residenza_contraente = addslashes(filter_var($_POST['id_comune_residenza_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$id_comune_residenza_contraente = "0";
	}
	if (isset($_POST['indirizzo_residenza_contraente'])) {
		$indirizzo_residenza_contraente = addslashes(filter_var($_POST['indirizzo_residenza_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$indirizzo_residenza_contraente = "";
	}
	if (isset($_POST['cap_residenza_contraente'])) {
		$cap_residenza_contraente = addslashes(filter_var($_POST['cap_residenza_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$cap_residenza_contraente = "";
	}
	if (isset($_POST['id_regione_corrispondenza_contraente'])) {
		$id_regione_corrispondenza_contraente = addslashes(filter_var($_POST['id_regione_corrispondenza_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$id_regione_corrispondenza_contraente = "0";
	}
	if (isset($_POST['id_provincia_corrispondenza_contraente'])) {
		$id_provincia_corrispondenza_contraente = addslashes(filter_var($_POST['id_provincia_corrispondenza_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$id_provincia_corrispondenza_contraente = "0";
	}
	if (isset($_POST['id_comune_corrispondenza_contraente'])) {
		$id_comune_corrispondenza_contraente = addslashes(filter_var($_POST['id_comune_corrispondenza_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$id_comune_corrispondenza_contraente = "0";
	}
	if (isset($_POST['indirizzo_corrispondenza_contraente'])) {
		$indirizzo_corrispondenza_contraente = addslashes(filter_var($_POST['indirizzo_corrispondenza_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$indirizzo_corrispondenza_contraente = "";
	}
	if (isset($_POST['cap_corrispondenza_contraente'])) {
		$cap_corrispondenza_contraente = addslashes(filter_var($_POST['cap_corrispondenza_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$cap_corrispondenza_contraente = "";
	}
	if (isset($_POST['email_contraente'])) {
		$email_contraente = addslashes(filter_var($_POST['email_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$email_contraente = "";
	}

	if (isset($_POST['pec_contraente'])) {
		$pec_contraente = addslashes(filter_var($_POST['pec_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$pec_contraente = "";
	}

	if (isset($_POST['telefono_fisso_contraente'])) {
		$telefono_fisso_contraente = addslashes(filter_var($_POST['telefono_fisso_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$telefono_fisso_contraente = "";
	}

	if (isset($_POST['mobile_contraente'])) {
		$mobile_contraente = addslashes(filter_var($_POST['mobile_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$mobile_contraente = "";
	}

	if (isset($_POST['fax_contraente'])) {
		$fax_contraente = addslashes(filter_var($_POST['fax_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$fax_contraente = "";
	}
	if (isset($_POST['partita_iva_contraente'])) {
		$partita_iva_contraente = addslashes(filter_var($_POST['partita_iva_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$partita_iva_contraente = "";
	}

	if (isset($_POST['codice_fiscale_contraente'])) {
		$codice_fiscale_contraente = addslashes(filter_var($_POST['codice_fiscale_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$codice_fiscale_contraente = "";
	}

	if (isset($_POST['professione_contraente'])) {
		$professione_contraente = addslashes(filter_var($_POST['professione_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$professione_contraente = "";
	}

	if (isset($_POST['sito_contraente'])) {
		$sito_contraente = addslashes(filter_var($_POST['sito_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$sito_contraente = "";
	}

	if (isset($_POST['modulo_7a7b_contraente'])) {
		$modulo_7a7b_contraente = addslashes(filter_var($_POST['modulo_7a7b_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$modulo_7a7b_contraente = "";
	}
	if (isset($_POST['id_tipodocumento_contraente'])) {
		$id_tipodocumento_contraente = addslashes(filter_var($_POST['id_tipodocumento_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$id_tipodocumento_contraente = "";
	}
	if (isset($_POST['numero_documento_contraente'])) {
		$numero_documento_contraente = addslashes(filter_var($_POST['numero_documento_contraente'], FILTER_SANITIZE_STRING));
	} else {
		$numero_documento_contraente = "";
	}


	$campi = " qualifica_contraente, cognome_contraente, nome_contraente, personafisica_contraente, privacy_contraente, partita_iva_contraente, codice_fiscale_contraente, ";
	$campi .= " id_regione_nascita_contraente, id_provincia_nascita_contraente, id_comune_nascita_contraente, data_nascita_contraente,";
	$campi .= " id_regione_residenza_contraente, id_provincia_residenza_contraente, id_comune_residenza_contraente, cap_residenza_contraente, indirizzo_residenza_contraente, ";
	$campi .= " id_regione_corrispondenza_contraente, id_provincia_corrispondenza_contraente, id_comune_corrispondenza_contraente, cap_corrispondenza_contraente, indirizzo_corrispondenza_contraente, ";
	$campi .= " email_contraente, pec_contraente, telefono_fisso_contraente, mobile_contraente, fax_contraente, ";
	$campi .= " professione_contraente, sito_contraente, modulo_7a7b_contraente, id_tipodocumento_contraente, numero_documento_contraente ";


	$valori = array($qualifica_contraente,
		$cognome_contraente,
		$nome_contraente,
		$personafisica_contraente,
		$privacy_contraente,
		$partita_iva_contraente,
		$codice_fiscale_contraente,
		$id_regione_nascita_contraente,
		$id_provincia_nascita_contraente,
		$id_comune_nascita_contraente,
		$data_nascita_contraente,
		$id_regione_residenza_contraente,
		$id_provincia_residenza_contraente,
		$id_comune_residenza_contraente,
		$cap_residenza_contraente,
		$indirizzo_residenza_contraente,
		$id_regione_corrispondenza_contraente,
		$id_provincia_corrispondenza_contraente,
		$id_comune_corrispondenza_contraente,
		$cap_corrispondenza_contraente,
		$indirizzo_corrispondenza_contraente,
		$email_contraente,
		$pec_contraente,
		$telefono_fisso_contraente,
		$mobile_contraente,
		$fax_contraente,
		$professione_contraente,
		$sito_contraente,
		$modulo_7a7b_contraente,
		$id_tipodocumento_contraente,
		$numero_documento_contraente);

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
	echo " alert('nuovo Contraente inserito: $ultimoCodiceInserito '); ";
//echo "  location.href='assistito_esistente.php?id_persona=$ultimoCodiceInserito'";
//echo "</script>";

	echo " location.href='contraenti.php';";
	echo "</script>";
