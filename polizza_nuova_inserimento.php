<?php
//include_once "../inc/Insert.class.php";//serve per la funzione inserisciPolizza
//include_once "Database.class.php";
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
		$capitolato_polizza = "";
	}
	if (isset($_POST['massimale_annuo_polizza'])) {
		$massimale_annuo_polizza = addslashes(filter_var($_POST['massimale_annuo_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$massimale_annuo_polizza = "";
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
		$provvigioni_broker_polizza = addslashes(filter_var($_POST['provvigioni_broker_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$provvigioni_broker_polizza = "";
	}
	if (isset($_POST['maxrcsinistro_polizza'])) {
		$maxrcsinistro_polizza = addslashes(filter_var($_POST['maxrcsinistro_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$maxrcsinistro_polizza = "";
	}
	if (isset($_POST['maxrcpersona_polizza'])) {
		$maxrcpersona_polizza = addslashes(filter_var($_POST['maxrcpersona_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$maxrcpersona_polizza = "";
	}
	if (isset($_POST['maxrccoseanimali_polizza'])) {
		$maxrccoseanimali_polizza = addslashes(filter_var($_POST['maxrccoseanimali_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$maxrccoseanimali_polizza = "";
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
		$premio_netto_polizza = addslashes(filter_var($_POST['premio_netto_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$premio_netto_polizza = "";
	}
	if (isset($_POST['accessori_polizza'])) {
		$accessori_polizza = addslashes(filter_var($_POST['accessori_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$accessori_polizza = "";
	}
	if (isset($_POST['imposte_polizza'])) {
		$imposte_polizza = addslashes(filter_var($_POST['imposte_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$imposte_polizza = "";
	}
	if (isset($_POST['ssn_polizza'])) {
		$ssn_polizza = addslashes(filter_var($_POST['ssn_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$ssn_polizza = "";
	}
	if (isset($_POST['totale_lordo_polizza'])) {
		$totale_lordo_polizza = addslashes(filter_var($_POST['totale_lordo_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$totale_lordo_polizza = "";
	}
	if (isset($_POST['totale_imponibile_polizza'])) {
		$totale_imponibile_polizza = addslashes(filter_var($_POST['totale_imponibile_polizza'], FILTER_SANITIZE_STRING));
	} else {
		$totale_imponibile_polizza = "";
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
	$campi = " id_compagnia_polizza, id_agenzia_polizza, id_mandato_polizza, id_contraente_polizza, ";
	$campi .= " id_frazionamento_polizza, numero_polizza, decorrenza_polizza, scadenza_polizza, ";
	$campi .= " inizio_copertura_polizza, fine_copertura_polizza, numero_sostituita_polizza, ";
	$campi .= " data_sostituzione_polizza, ramo_agenzia_polizza, id_tiporischio_polizza, stato_polizza, ";
	$campi .= " accordo_collaborazione_polizza, capitolato_polizza, regolazione_premio_polizza, ";
	$campi .= " giorni_denuncia_sinistro_polizza, tacito_rinnovo_polizza, proroga_servizio_polizza, ";
	$campi .= " mora_altre_scadenze_polizza, termine_primo_premio_polizza, provvigioni_broker_polizza, ";
	$campi .= " maxrcsinistro_polizza, maxrcpersona_polizza, maxrccoseanimali_polizza, massimale_annuo_polizza, ";
	$campi .= " premio_netto_polizza, accessori_polizza, imposte_polizza, ssn_polizza, totale_lordo_polizza, ";
	$campi .= " totale_imponibile_polizza, cig_polizza, appendice_polizza, id_tipoappendice_polizza, ";
	$campi .= " franchigia_polizza, scoperto_polizza, retroattiva_polizza, postuma_polizza, ";
	$campi .= " targa_auto_polizza, incendio_furto_polizza ";

	$valori = array(
		$id_compagnia_polizza,
		$id_agenzia_polizza,
		$id_mandato_polizza,
		$id_contraente_polizza,
		$id_frazionamento_polizza,
		$numero_polizza,
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

	include_once 'class/Database.class.php';
	$pdo = new Database();
//Creo il record della tabella polizze
	$pdo->inserisci($tabella, $campi, $valori);
	$pdo->execute();

//estraggo l'ultimo codice inserito; servirà per persona_dett e situazione'
	$ultimaPolizzaInserita = $pdo->lastInsertId();
	$ultimoCodiceInserito = $numero_polizza;
//visualizzo la conferma dell'inserimento a video
	$pdo->chiudiPdo();

	//------  al momento disattivo la creazione premi ---------------------------------------------------
//ora devo creare i records della tabella premi, tanti quanti previsto dal frazionamento della polizza
// prima prendo il frazionamento della polizza e ne faccio l'indice
	$sql_fraz = " SELECT * from frazionamenti ";
	$sql_fraz .= " WHERE id_frazionamento = ".$id_frazionamento_polizza;

	include_once 'class/Database.class.php';
	$dbh = new Database();

	$dbh->query($sql_fraz);
	$dbh->execute();
	$rows = $dbh->resultset();
	$rata_premio = 0;

	foreach ($rows as $row) {

		// loop sui records presenti in tabella
		// estrazione dei records tramite ciclo while

		$rate_premio_totali = $row['periodi_frazionamento'];
		$descrizione_frazionamento = $row['descrizione_frazionamento'];

		$tabellapremi = "premi";

		$id_polizza_premio = $ultimaPolizzaInserita;

		if ($totale_lordo_polizza > 0) {
			$importo_lordo_premio = $totale_lordo_polizza / $rate_premio_totali;
		} else {
			$importo_lordo_premio = 0;
		}

		if ($totale_imponibile_polizza > 0) {
			$importo_netto_premio = $totale_imponibile_polizza / $rate_premio_totali;
		} else {
			$importo_netto_premio = 0;
		}
		$id_tipopagamento_premio = '';
		$provv_da_liquidare_premio = $importo_netto_premio * $provvigioni_broker_polizza / 100;
		$pagato_il_premio = '';
		$data_incasso_premio = '';
		$provv_liquidata_premio = '0';
		$data_liquidata_premio = '';
		$noonline_premio = '0';
		//$termine_primo_premio_polizza = '';
		$offset = 12 / $rate_premio_totali;

		// ora entro nel loop di creazione dei records

		for ($rata_premio = 1; $rata_premio <= $rate_premio_totali; $rata_premio++) {

			if ($rata_premio == 1) {
				$scadenza_premio = $termine_primo_premio_polizza;
			} else {
				$scadenza_premio = date('Y-m-d', strtotime("+$offset months", strtotime($scadenza_premio)));
			}

			$valoripremi = array(
				$id_polizza_premio,
				$scadenza_premio,
				$importo_lordo_premio,
				$importo_netto_premio,
				$id_tipopagamento_premio,
				$rata_premio,
				$pagato_il_premio,
				$data_incasso_premio,
				$provv_liquidata_premio,
				$provv_da_liquidare_premio,
				$data_liquidata_premio,
				$noonline_premio
			);

			$campipremi = " id_polizza_premio, scadenza_premio, importo_lordo_premio, importo_netto_premio, ";
			$campipremi .= " id_tipopagamento_premio, rata_premio, pagato_il_premio, data_incasso_premio, ";
			$campipremi .= " provv_liquidata_premio, provv_da_liquidare_premio, data_liquidata_premio, noonline_premio ";

			$dbh->inserisci($tabellapremi, $campipremi, $valoripremi);
			$dbh->execute();

		}
	}
	echo "<script type='text/javascript'>";
	echo " alert('nuova Polizza inserita, numero: $ultimoCodiceInserito '); ";
	//echo " alert('generati $rate_premio_totali premi')";
	echo " location.href='polizze.php';";
	echo "</script>";
