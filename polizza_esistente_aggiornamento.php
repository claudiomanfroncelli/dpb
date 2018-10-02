<?php
//include_once "../inc/Insert.class.php";//serve per la funzione inserisciPolizza
//include_once "../inc/database.class.php";
	include_once "inc/inc.utils.php"; //serve per la formattazione della data
	$date = date('d-m-Y');
	$tabella = "polizze";
	if (!isset($_POST['compagnia_polizza'])) {
		echo "compagnia non inserita!";
		die();
	} else {
		$id_compagnia_polizza = addslashes(filter_var($_POST['compagnia_polizza'], FILTER_SANITIZE_STRING));
	}
	if (!isset($_POST['agenzia_polizza'])) {
		echo "agenzia non inserita!";
		die();
	} else {
		$id_agenzia_polizza = addslashes(filter_var($_POST['agenzia_polizza'], FILTER_SANITIZE_STRING));
	}
	if (!isset($_POST['id_mandato_polizza'])) {
		echo "mandato non inserito!";
		die();
	} else {
		$id_mandato_polizza = addslashes(filter_var($_POST['id_mandato_polizza'], FILTER_SANITIZE_STRING));
	}
	if (!isset($_POST['contraente_polizza'])) {
		echo "contraente non inserito!";
		die();
	} else {
		$id_contraente_polizza = addslashes(filter_var($_POST['contraente_polizza'], FILTER_SANITIZE_STRING));
	}
	if (!isset($_POST['numero_polizza'])) {
		echo "numero polizza non inserito!";
		die();
	} else {
		$numero_polizza = addslashes(filter_var($_POST['numero_polizza'], FILTER_SANITIZE_STRING));
	}
	if (!isset($_POST['decorrenza_polizza'])) {
		echo "decorrenza polizza non inserita!";
		die();
	} else {
		$decorrenza_polizza = format_data($_POST['decorrenza_polizza']);
	}
	if (!isset($_POST['scadenza_polizza'])) {
		echo "scadenza polizza non inserita!";
		die();
	} else {
		$scadenza_polizza = format_data($_POST['scadenza_polizza']);
	}
	if (isset($_POST['stato_polizza'])) {
		$stato_polizza = addslashes(filter_var($_POST['stato_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$stato_polizza = "";
	}
	if (isset($_POST['inizio_copertura_polizza'])) {
		$inizio_copertura_polizza = format_data($_POST['inizio_copertura_polizza']);
	} else {
		$inizio_copertura_polizza = "";
	}
	if (isset($_POST['fine_copertura_polizza'])) {
		$fine_copertura_polizza = format_data($_POST['fine_copertura_polizza']);
	} else {
		$fine_copertura_polizza = "";
	}
	if (isset($_POST['ramo_agenzia_polizza'])) {
		$ramo_agenzia_polizza = addslashes(filter_var($_POST['ramo_agenzia_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$ramo_agenzia_polizza = "";
	}
	if (isset($_POST['id_tiporischio_polizza'])) {
		$id_tiporischio_polizza = addslashes(filter_var($_POST['id_tiporischio_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$id_tiporischio_polizza = "";
	}
	if (isset($_POST['id_frazionamento_polizza'])) {
		$id_frazionamento_polizza = addslashes(filter_var($_POST['id_frazionamento_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$id_frazionamento_polizza = "";
	}
	if (isset($_POST['numero_sostituita_polizza'])) {
		$numero_sostituita_polizza = addslashes(filter_var($_POST['numero_sostituita_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$numero_sostituita_polizza = "";
	}
	if (isset($_POST['data_sostituzione_polizza'])) {
		$data_sostituzione_polizza = format_data($_POST['data_sostituzione_polizza']);
	} else {
		$data_sostituzione_polizza = "";
	}
	if (isset($_POST['termine_primo_premio_polizza'])) {
		$termine_primo_premio_polizza = format_data($_POST['termine_primo_premio_polizza']);
	} else {
		$termine_primo_premio_polizza = "";
	}
	if (isset($_POST['accordo_collaborazione_polizza'])) {
		$accordo_collaborazione_polizza = addslashes(filter_var($_POST['accordo_collaborazione_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$accordo_collaborazione_polizza = "";
	}
	if (isset($_POST['capitolato_polizza'])) {
		$capitolato_polizza = addslashes(filter_var($_POST['capitolato_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$capitolato_polizza = "...";
	}
	if (isset($_POST['massimale_annuo_polizza'])) {
		$massimale_annuo_polizza = ($_POST['massimale_annuo_polizza']);
	} else {
		$massimale_annuo_polizza = "0";
	}
	if (isset($_POST['tacito_rinnovo_polizza'])) {
		$tacito_rinnovo_polizza = addslashes(filter_var($_POST['tacito_rinnovo_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$tacito_rinnovo_polizza = "";
	}
	if (isset($_POST['proroga_servizio_polizza'])) {
		$proroga_servizio_polizza = addslashes(filter_var($_POST['proroga_servizio_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$proroga_servizio_polizza = "";
	}
	if (isset($_POST['mora_altre_scadenze_polizza'])) {
		$mora_altre_scadenze_polizza = addslashes(filter_var($_POST['mora_altre_scadenze_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$mora_altre_scadenze_polizza = "";
	}
	if (isset($_POST['provvigioni_broker_polizza'])) {
		$provvigioni_broker_polizza = ($_POST['provvigioni_broker_polizza']);
	} else {
		$provvigioni_broker_polizza = "0";
	}
	if (isset($_POST['maxrcsinistro_polizza'])) {
		$maxrcsinistro_polizza = ($_POST['maxrcsinistro_polizza']);
	} else {
		$maxrcsinistro_polizza = "0";
	}
	if (isset($_POST['maxrcpersona_polizza'])) {
		$maxrcpersona_polizza = ($_POST['maxrcpersona_polizza']);
	} else {
		$maxrcpersona_polizza = "0";
	}
	if (isset($_POST['maxrccoseanimali_polizza'])) {
		$maxrccoseanimali_polizza = ($_POST['maxrccoseanimali_polizza']);
	} else {
		$maxrccoseanimali_polizza = "0";
	}

	if (isset($_POST['regolazione_premio_polizza'])) {
		$regolazione_premio_polizza = addslashes(filter_var($_POST['regolazione_premio_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$regolazione_premio_polizza = "";
	}
	if (isset($_POST['giorni_denuncia_sinistro_polizza'])) {
		$giorni_denuncia_sinistro_polizza = addslashes(filter_var($_POST['giorni_denuncia_sinistro_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$giorni_denuncia_sinistro_polizza = "";
	}
	if (isset($_POST['franchigia_polizza'])) {
		$franchigia_polizza = addslashes(filter_var($_POST['franchigia_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$franchigia_polizza = "";
	}
	if (isset($_POST['scoperto_polizza'])) {
		$scoperto_polizza = addslashes(filter_var($_POST['scoperto_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$scoperto_polizza = "";
	}
	if (isset($_POST['retroattiva_polizza'])) {
		$retroattiva_polizza = addslashes(filter_var($_POST['retroattiva_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$retroattiva_polizza = "";
	}
	if (isset($_POST['postuma_polizza'])) {
		$postuma_polizza = addslashes(filter_var($_POST['postuma_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$postuma_polizza = "";
	}
	if (isset($_POST['premio_netto_polizza'])) {
		$premio_netto_polizza = ($_POST['premio_netto_polizza']);
	} else {
		$premio_netto_polizza = "0";
	}
	if (isset($_POST['accessori_polizza'])) {
		$accessori_polizza = ($_POST['accessori_polizza']);
	} else {
		$accessori_polizza = "0";
	}
	if (isset($_POST['imposte_polizza'])) {
		$imposte_polizza = ($_POST['imposte_polizza']);
	} else {
		$imposte_polizza = "0";
	}
	if (isset($_POST['ssn_polizza'])) {
		$ssn_polizza = ($_POST['ssn_polizza']);
	} else {
		$ssn_polizza = "0";
	}
	if (isset($_POST['totale_lordo_polizza'])) {
		$totale_lordo_polizza = ($_POST['totale_lordo_polizza']);
	} else {
		$totale_lordo_polizza = "0";
	}
	if (isset($_POST['totale_imponibile_polizza'])) {
		$totale_imponibile_polizza = ($_POST['totale_imponibile_polizza']);
	} else {
		$totale_imponibile_polizza = "0";
	}
	if (isset($_POST['cig_polizza'])) {
		$cig_polizza = addslashes(filter_var($_POST['cig_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$cig_polizza = "";
	}
	if (isset($_POST['appendice_polizza'])) {
		$appendice_polizza = addslashes(filter_var($_POST['appendice_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$appendice_polizza = "";
	}
	if (isset($_POST['id_tipoappendice_polizza'])) {
		$id_tipoappendice_polizza = addslashes(filter_var($_POST['id_tipoappendice_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$id_tipoappendice_polizza = "";
	}
	if (isset($_POST['targa_auto_polizza'])) {
		$targa_auto_polizza = addslashes(filter_var($_POST['targa_auto_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$targa_auto_polizza = "";
	}
	if (isset($_POST['incendio_furto_polizza'])) {
		$incendio_furto_polizza = addslashes(filter_var($_POST['incendio_furto_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$incendio_furto_polizza = "";
	}

	$campi = array(
		"id_frazionamento_polizza",
		"decorrenza_polizza",
		"scadenza_polizza",
		"inizio_copertura_polizza",
		"fine_copertura_polizza",
		"numero_sostituita_polizza",
		"data_sostituzione_polizza",
		"ramo_agenzia_polizza",
		"id_tiporischio_polizza",
		"stato_polizza",
		"accordo_collaborazione_polizza",
		"capitolato_polizza",
		"regolazione_premio_polizza",
		"giorni_denuncia_sinistro_polizza",
		"tacito_rinnovo_polizza",
		"proroga_servizio_polizza",
		"mora_altre_scadenze_polizza",
		"termine_primo_premio_polizza",
		"provvigioni_broker_polizza",
		"maxrcsinistro_polizza",
		"maxrcpersona_polizza",
		"maxrccoseanimali_polizza",
		"massimale_annuo_polizza",
		"premio_netto_polizza",
		"accessori_polizza",
		"imposte_polizza",
		"ssn_polizza",
		"totale_lordo_polizza",
		"totale_imponibile_polizza",
		"cig_polizza",
		"appendice_polizza",
		"id_tipoappendice_polizza",
		"franchigia_polizza",
		"scoperto_polizza",
		"retroattiva_polizza",
		"postuma_polizza",
		"targa_auto_polizza",
		"incendio_furto_polizza"
	);


	$valori = array(
		$id_frazionamento_polizza,
		$decorrenza_polizza,
		$scadenza_polizza,
		$inizio_copertura_polizza,
		$fine_copertura_polizza,
		$numero_sostituita_polizza,
		$data_sostituzione_polizza,
		$ramo_agenzia_polizza,
		$id_tiporischio_polizza,
		$stato_polizza,
		$accordo_collaborazione_polizza,
		$capitolato_polizza,
		$regolazione_premio_polizza,
		$giorni_denuncia_sinistro_polizza,
		$tacito_rinnovo_polizza,
		$proroga_servizio_polizza,
		$mora_altre_scadenze_polizza,
		$termine_primo_premio_polizza,
		$provvigioni_broker_polizza,
		$maxrcsinistro_polizza,
		$maxrcpersona_polizza,
		$maxrccoseanimali_polizza,
		$massimale_annuo_polizza,
		$premio_netto_polizza,
		$accessori_polizza,
		$imposte_polizza,
		$ssn_polizza,
		$totale_lordo_polizza,
		$totale_imponibile_polizza,
		$cig_polizza,
		$appendice_polizza,
		$id_tipoappendice_polizza,
		$franchigia_polizza,
		$scoperto_polizza,
		$retroattiva_polizza,
		$postuma_polizza,
		$targa_auto_polizza,
		$incendio_furto_polizza
	);

	$condizioni = "id_polizza = $_POST[id_polizza]";

	include_once "class/Database.class.php";
	$pdo = new Database();

//Creo il record della tabella
	$pdo->aggiorna($tabella, $campi, $valori, $condizioni);
	$pdo->execute();
	$ultimoCodiceAggiornato = $_POST['numero_polizza'];

//visualizzo la conferma dell'inserimento a video
	echo "<script type='text/javascript'>";
	echo " alert('Polizza aggiornata, codice: $ultimoCodiceAggiornato '); ";
//echo "  location.href='assistito_esistente.php?id_persona=$ultimoCodiceInserito'";
//echo "</script>";

	echo " location.href='polizza_esistente_modifica.php?idpol=$_POST[id_polizza]';";
	echo "</script>";
