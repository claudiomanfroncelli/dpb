<?php
//include_once "../inc/Insert.class.php";//serve per la funzione inserisciPolizza
//include_once "Database.class.php";
	include_once "inc/inc.utils.php"; //serve per la formattazione della data

	//------  al momento disattivo la creazione premi ---------------------------------------------------
//ora devo creare i records della tabella premi, tanti quanti previsto dal frazionamento della polizza
// prima prendo il frazionamento della polizza e ne faccio l'indice


	$tabellapremi = "premi";

	$importo_lordo_premio =

	$importo_netto_premio =
	$modalita_pagamento_premio = '';
	$provv_da_liquidare_premio = $importo_netto_premio * $provvigioni_broker_polizza / 100;
	$pagato_il_premio = '';
	$data_incasso_premio = '';
	$provv_liquidata_premio = '0';
	$data_liquidata_premio = '';
	$noonline_premio = '0';
	$termine_pagamento_premio_polizza = '';
	//$offset                           = 12 / $rate_premio_totali;

	// ora entro nel loop di creazione dei records

	$scadenza_premio =

	$valoripremi = array(
		$id_polizza_premio,
		$scadenza_premio,
		$importo_lordo_premio,
		$importo_netto_premio,
		$modalita_pagamento_premio,
		$rata_premio,
		$pagato_il_premio,
		$data_incasso_premio,
		$provv_liquidata_premio,
		$provv_da_liquidare_premio,
		$data_liquidata_premio,
		$noonline_premio
	);

	$campipremi = " id_polizza_premio, scadenza_premio, importo_lordo_premio, importo_netto_premio, ";
	$campipremi .= " modalita_pagamento_premio, rata_premio, pagato_il_premio, data_incasso_premio, ";
	$campipremi .= " provv_liquidata_premio, provv_da_liquidare_premio, data_liquidata_premio, noonline_premio ";

	include_once 'class/Database.class.php';
	$dbh = new Database();
	$dbh->inserisci($tabellapremi, $campipremi, $valoripremi);
	$dbh->execute();

	}
	}
	echo "<script type='text/javascript'>";
	echo " alert('nuova Polizza inserita, numero: $ultimoCodiceInserito '); ";
	//echo " alert('generati $rate_premio_totali premi')";
	echo " location.href='polizze.php';";
	echo "</script>";
