<?php
//include_once "../inc/Insert.class.php";//serve per la funzione inserisciPolizza
//include_once "Database.class.php";
	include_once "inc/inc.utils.php"; //serve per la formattazione della data
	$date = date('d-m-Y');
	$tabella = "mandati";
	if (!isset($_POST['identificativo_mandato'])) {
		echo "identificativo mandato non inserito!";
		die();
	} else {
		$identificativo_mandato = addslashes(filter_var($_POST['identificativo_mandato'], FILTER_SANITIZE_STRING));
	}
	if (!isset($_POST['id_compagnia_mandato'])) {
		echo "compagnia non inserita!";
		die();
	} else {
		$id_compagnia_mandato = addslashes(filter_var($_POST['id_compagnia_mandato'], FILTER_SANITIZE_STRING));
	}
	if (!isset($_POST['id_agenzia_mandato'])) {
		echo "agenzia non inserita!";
		die();
	} else {
		$id_agenzia_mandato = addslashes(filter_var($_POST['id_agenzia_mandato'], FILTER_SANITIZE_STRING));
	}
	if (!isset($_POST['inizio_mandato'])) {
		echo "inizio_mandato non inserito!";
		die();
	} else {
		$inizio_mandato = format_data($_POST['inizio_mandato']);
	}
	if (!isset($_POST['fine_mandato'])) {
		echo "fine_mandato non inserita!";
		die();
	} else {
		$fine_mandato = format_data($_POST['fine_mandato']);
	}
	if (isset($_POST['provvallrisks_mandato'])) {
		$provvallrisks_mandato = addslashes(filter_var($_POST['provvallrisks_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvallrisks_mandato = "";
	}
	if (isset($_POST['provvcar_mandato'])) {
		$provvcar_mandato = addslashes(filter_var($_POST['provvcar_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvcar_mandato = "";
	}
	if (isset($_POST['provvcauz_mandato'])) {
		$provvcauz_mandato = addslashes(filter_var($_POST['provvcauz_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvcauz_mandato = "";
	}
	if (isset($_POST['provvfro_mandato'])) {
		$provvfro_mandato = addslashes(filter_var($_POST['provvfro_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvfro_mandato = "";
	}
	if (isset($_POST['provvfineart_mandato'])) {
		$provvfineart_mandato = addslashes(filter_var($_POST['provvfineart_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvfineart_mandato = "";
	}
	if (isset($_POST['provvkasko_mandato'])) {
		$provvkasko_mandato = addslashes(filter_var($_POST['provvkasko_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvkasko_mandato = "";
	}
	if (isset($_POST['provvgfabbricati_mandato'])) {
		$provvgfabbricati_mandato = addslashes(filter_var($_POST['provvgfabbricati_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvgfabbricati_mandato = "";
	}
	if (isset($_POST['provvgcomm_mandato'])) {
		$provvgcomm_mandato = addslashes(filter_var($_POST['provvgcomm_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvgcomm_mandato = "";
	}
	if (isset($_POST['provvgabitazione_mandato'])) {
		$provvgabitazione_mandato = addslashes(filter_var($_POST['provvgabitazione_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvgabitazione_mandato = "";
	}
	if (isset($_POST['provvincord_mandato'])) {
		$provvincord_mandato = addslashes(filter_var($_POST['provvincord_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvincord_mandato = "";
	}
	if (isset($_POST['provvincind_mandato'])) {
		$provvincind_mandato = addslashes(filter_var($_POST['provvincind_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvincind_mandato = "";
	}
	if (isset($_POST['provvtutlegale_mandato'])) {
		$provvtutlegale_mandato = addslashes(filter_var($_POST['provvtutlegale_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvtutlegale_mandato = "";
	}
	if (isset($_POST['provvnoinabiltemp_mandato'])) {
		$provvnoinabiltemp_mandato = addslashes(filter_var($_POST['provvnoinabiltemp_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvnoinabiltemp_mandato = "";
	}
	if (isset($_POST['provvinabiltemp_mandato'])) {
		$provvinabiltemp_mandato = addslashes(filter_var($_POST['provvinabiltemp_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvinabiltemp_mandato = "";
	}
	if (isset($_POST['provvrcinquinamento_mandato'])) {
		$provvrcinquinamento_mandato = addslashes(filter_var($_POST['provvrcinquinamento_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvrcinquinamento_mandato = "";
	}
	if (isset($_POST['provvrccapofam_mandato'])) {
		$provvrccapofam_mandato = addslashes(filter_var($_POST['provvrccapofam_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvrccapofam_mandato = "";
	}
	if (isset($_POST['provvrcauto_mandato'])) {
		$provvrcauto_mandato = addslashes(filter_var($_POST['provvrcauto_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvrcauto_mandato = "";
	}
	if (isset($_POST['provvrcalibmat_mandato'])) {
		$provvrcalibmat_mandato = addslashes(filter_var($_POST['provvrcalibmat_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvrcalibmat_mandato = "";
	}
	if (isset($_POST['provvrcrord_mandato'])) {
		$provvrcrord_mandato = addslashes(filter_var($_POST['provvrcrord_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvrcrord_mandato = "";
	}
	if (isset($_POST['provvrcprof_mandato'])) {
		$provvrcprof_mandato = addslashes(filter_var($_POST['provvrcprof_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvrcprof_mandato = "";
	}
	if (isset($_POST['provvrcpatgrave_mandato'])) {
		$provvrcpatgrave_mandato = addslashes(filter_var($_POST['provvrcpatgrave_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvrcpatgrave_mandato = "";
	}
	if (isset($_POST['provvrcpatlieve_mandato'])) {
		$provvrcpatlieve_mandato = addslashes(filter_var($_POST['provvrcpatlieve_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvrcpatlieve_mandato = "";
	}
	if (isset($_POST['id_copertura_mandato'])) {
		$id_copertura_mandato = addslashes(filter_var($_POST['id_copertura_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$id_copertura_mandato = "";
	}
	if (isset($_POST['fax_copertura_mandato'])) {
		$fax_copertura_mandato = addslashes(filter_var($_POST['fax_copertura_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$fax_copertura_mandato = "";
	}
	if (isset($_POST['email_copertura_mandato'])) {
		$email_copertura_mandato = addslashes(filter_var($_POST['email_copertura_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$email_copertura_mandato = "";
	}
	if (isset($_POST['id_rimessa_premi_mandato'])) {
		$id_rimessa_premi_mandato = addslashes(filter_var($_POST['id_rimessa_premi_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$id_rimessa_premi_mandato = "";
	}
	if (isset($_POST['provvigioni_incasso_mandato'])) {
		$provvigioni_incasso_mandato = addslashes(filter_var($_POST['provvigioni_incasso_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvigioni_incasso_mandato = "";
	}
	if (isset($_POST['conto1_mandato'])) {
		$conto1_mandato = addslashes(filter_var($_POST['conto1_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$conto1_mandato = "";
	}
	if (isset($_POST['ibanconto1_mandato'])) {
		$ibanconto1_mandato = addslashes(filter_var($_POST['ibanconto1_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$ibanconto1_mandato = "";
	}
	if (isset($_POST['conto2_mandato'])) {
		$conto2_mandato = addslashes(filter_var($_POST['conto2_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$conto2_mandato = "";
	}
	if (isset($_POST['ibanconto2_mandato'])) {
		$ibanconto2_mandato = addslashes(filter_var($_POST['ibanconto2_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$ibanconto2_mandato = "";
	}
	if (isset($_POST['conto3_mandato'])) {
		$conto3_mandato = addslashes(filter_var($_POST['conto3_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$conto3_mandato = "";
	}
	if (isset($_POST['ibanconto3_mandato'])) {
		$ibanconto3_mandato = addslashes(filter_var($_POST['ibanconto3_mandato'], FILTER_SANITIZE_STRING));
	} else {
		$ibanconto3_mandato = "";
	}


	$campi = " id_compagnia_mandato, id_agenzia_mandato, identificativo_mandato, inizio_mandato, fine_mandato, ";
	$campi .= " provvallrisks_mandato, provvcar_mandato, provvcauz_mandato, ";
	$campi .= " provvfro_mandato, provvfineart_mandato, provvkasko_mandato, provvgfabbricati_mandato, provvgcomm_mandato, ";
	$campi .= " provvgabitazione_mandato, provvincord_mandato, provvincind_mandato, ";
	$campi .= " provvtutlegale_mandato, provvnoinabiltemp_mandato, provvinabiltemp_mandato, ";
	$campi .= " provvrcinquinamento_mandato, provvrccapofam_mandato, provvrcauto_mandato, ";
	$campi .= " provvrcalibmat_mandato, provvrcrord_mandato, ";
	$campi .= " provvrcprof_mandato, provvrcpatgrave_mandato, provvrcpatlieve_mandato, ";
	$campi .= " id_copertura_mandato,  fax_copertura_mandato, email_copertura_mandato, ";
	$campi .= " id_rimessa_premi_mandato, provvigioni_incasso_mandato, ";
	$campi .= " conto1_mandato, ibanconto1_mandato, conto2_mandato, ibanconto2_mandato, ";
	$campi .= " conto3_mandato, ibanconto3_mandato ";

	$valori = array($id_compagnia_mandato, $id_agenzia_mandato, $identificativo_mandato, $inizio_mandato,
		$fine_mandato, $provvallrisks_mandato, $provvcar_mandato, $provvcauz_mandato, $provvfro_mandato,
		$provvfineart_mandato, $provvkasko_mandato, $provvgfabbricati_mandato, $provvgcomm_mandato,
		$provvgabitazione_mandato, $provvincord_mandato, $provvincind_mandato,
		$provvtutlegale_mandato, $provvnoinabiltemp_mandato, $provvinabiltemp_mandato,
		$provvrcinquinamento_mandato, $provvrccapofam_mandato, $provvrcauto_mandato,
		$provvrcalibmat_mandato, $provvrcrord_mandato,
		$provvrcprof_mandato, $provvrcpatgrave_mandato, $provvrcpatlieve_mandato,
		$id_copertura_mandato, $fax_copertura_mandato, $email_copertura_mandato,
		$id_rimessa_premi_mandato, $provvigioni_incasso_mandato,
		$conto1_mandato, $ibanconto1_mandato, $conto2_mandato, $ibanconto2_mandato,
		$conto3_mandato, $ibanconto3_mandato);

	include_once "class/Database.class.php";
	$pdo = new Database();
//Creo il record della tabella
	$pdo->inserisci($tabella, $campi, $valori);
	$pdo->execute();
//estraggo l'ultimo codice inserito; servirà per persona_dett e situazione'
//$ultimoCodiceInserito = $pdo->lastInsertId();
	$ultimoCodiceInserito = $identificativo_mandato;
	echo "<script type='text/javascript'>";
	echo " alert('nuovo Mandato inserito, numero: $ultimoCodiceInserito '); ";
	echo " location.href='mandati.php';";
	echo "</script>";
