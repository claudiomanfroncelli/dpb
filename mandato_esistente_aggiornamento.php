<?php
//include_once "../inc/Insert.class.php";//serve per la funzione inserisciPolizza
//include_once "Database.class.php";
	include_once "inc/inc.utils.php"; //serve per la formattazione della data
	$date = date('d-m-Y');
	$tabella = "mandati";
	if (!isset($_POST['identificativomandato'])) {
		echo "identificativo mandato non inserito!";
		die();
	} else {
		$identificativo_mandato = addslashes(filter_var($_POST['identificativomandato'], FILTER_SANITIZE_STRING));
	}
	/*if (!isset($_POST['compagniamandato'])) {
		echo "compagnia non inserita!";
		die();
	} else {
		$id_compagnia_mandato = addslashes(filter_var($_POST['compagniamandato'], FILTER_SANITIZE_STRING));
	}
	if (!isset($_POST['agenziamandato'])) {
		echo "agenzia non inserita!";
		die();
	} else {
		$id_agenzia_mandato = addslashes(filter_var($_POST['agenziamandato'], FILTER_SANITIZE_STRING));
	}*/
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
	if (isset($_POST['provvallrisks'])) {
		$provvallrisks_mandato = addslashes(filter_var($_POST['provvallrisks'], FILTER_SANITIZE_STRING));
	} else {
		$provvallrisks_mandato = "";
	}
	if (isset($_POST['provvcar'])) {
		$provvcar_mandato = addslashes(filter_var($_POST['provvcar'], FILTER_SANITIZE_STRING));
	} else {
		$provvcar_mandato = "";
	}
	if (isset($_POST['provvcauz'])) {
		$provvcauz_mandato = addslashes(filter_var($_POST['provvcauz'], FILTER_SANITIZE_STRING));
	} else {
		$provvcauz_mandato = "";
	}
	if (isset($_POST['provvfro'])) {
		$provvfro_mandato = addslashes(filter_var($_POST['provvfro'], FILTER_SANITIZE_STRING));
	} else {
		$provvfro_mandato = "";
	}
	if (isset($_POST['provvfineart'])) {
		$provvfineart_mandato = addslashes(filter_var($_POST['provvfineart'], FILTER_SANITIZE_STRING));
	} else {
		$provvfineart_mandato = "";
	}
	if (isset($_POST['provvkasko'])) {
		$provvkasko_mandato = addslashes(filter_var($_POST['provvkasko'], FILTER_SANITIZE_STRING));
	} else {
		$provvkasko_mandato = "";
	}
	if (isset($_POST['provvgfabbricati'])) {
		$provvgfabbricati_mandato = addslashes(filter_var($_POST['provvgfabbricati'], FILTER_SANITIZE_STRING));
	} else {
		$provvgfabbricati_mandato = "";
	}
	if (isset($_POST['provvgcomm'])) {
		$provvgcomm_mandato = addslashes(filter_var($_POST['provvgcomm'], FILTER_SANITIZE_STRING));
	} else {
		$provvgcomm_mandato = "";
	}
	if (isset($_POST['provvgabitazione'])) {
		$provvgabitazione_mandato = addslashes(filter_var($_POST['provvgabitazione'], FILTER_SANITIZE_STRING));
	} else {
		$provvgabitazione_mandato = "";
	}
	if (isset($_POST['provvincord'])) {
		$provvincord_mandato = addslashes(filter_var($_POST['provvincord'], FILTER_SANITIZE_STRING));
	} else {
		$provvincord_mandato = "";
	}
	if (isset($_POST['provvincind'])) {
		$provvincind_mandato = addslashes(filter_var($_POST['provvincind'], FILTER_SANITIZE_STRING));
	} else {
		$provvincind_mandato = "";
	}
	if (isset($_POST['provvtutlegale'])) {
		$provvtutlegale_mandato = addslashes(filter_var($_POST['provvtutlegale'], FILTER_SANITIZE_STRING));
	} else {
		$provvtutlegale_mandato = "";
	}
	if (isset($_POST['provvnoinabiltemp'])) {
		$provvnoinabiltemp_mandato = addslashes(filter_var($_POST['provvnoinabiltemp'], FILTER_SANITIZE_STRING));
	} else {
		$provvnoinabiltemp_mandato = "";
	}
	if (isset($_POST['provvinabiltemp'])) {
		$provvinabiltemp_mandato = addslashes(filter_var($_POST['provvinabiltemp'], FILTER_SANITIZE_STRING));
	} else {
		$provvinabiltemp_mandato = "";
	}
	if (isset($_POST['provvrcinquinamento'])) {
		$provvrcinquinamento_mandato = addslashes(filter_var($_POST['provvrcinquinamento'], FILTER_SANITIZE_STRING));
	} else {
		$provvrcinquinamento_mandato = "";
	}
	if (isset($_POST['provvrccapofam'])) {
		$provvrccapofam_mandato = addslashes(filter_var($_POST['provvrccapofam'], FILTER_SANITIZE_STRING));
	} else {
		$provvrccapofam_mandato = "";
	}
	if (isset($_POST['provvrcauto'])) {
		$provvrcauto_mandato = addslashes(filter_var($_POST['provvrcauto'], FILTER_SANITIZE_STRING));
	} else {
		$provvrcauto_mandato = "";
	}
	if (isset($_POST['provvrcalibmat'])) {
		$provvrcalibmat_mandato = addslashes(filter_var($_POST['provvrcalibmat'], FILTER_SANITIZE_STRING));
	} else {
		$provvrcalibmat_mandato = "";
	}
	if (isset($_POST['provvrcrord'])) {
		$provvrcrord_mandato = addslashes(filter_var($_POST['provvrcrord'], FILTER_SANITIZE_STRING));
	} else {
		$provvrcrord_mandato = "";
	}
	if (isset($_POST['provvrcprof'])) {
		$provvrcprof_mandato = addslashes(filter_var($_POST['provvrcprof'], FILTER_SANITIZE_STRING));
	} else {
		$provvrcprof_mandato = "";
	}
	if (isset($_POST['provvrcpatgrave'])) {
		$provvrcpatgrave_mandato = addslashes(filter_var($_POST['provvrcpatgrave'], FILTER_SANITIZE_STRING));
	} else {
		$provvrcpatgrave_mandato = "";
	}
	if (isset($_POST['provvrcpatlieve'])) {
		$provvrcpatlieve_mandato = addslashes(filter_var($_POST['provvrcpatlieve'], FILTER_SANITIZE_STRING));
	} else {
		$provvrcpatlieve_mandato = "";
	}
	if (isset($_POST['orariocoperturamandato'])) {
		$id_copertura_mandato = addslashes(filter_var($_POST['orariocoperturamandato'], FILTER_SANITIZE_STRING));
	} else {
		$id_copertura_mandato = "";
	}
	if (isset($_POST['faxcoperturamandato'])) {
		$fax_copertura_mandato = addslashes(filter_var($_POST['faxcoperturamandato'], FILTER_SANITIZE_STRING));
	} else {
		$fax_copertura_mandato = "";
	}
	if (isset($_POST['emailcoperturamandato'])) {
		$email_copertura_mandato = addslashes(filter_var($_POST['emailcoperturamandato'], FILTER_SANITIZE_STRING));
	} else {
		$email_copertura_mandato = "";
	}
	if (isset($_POST['rimessapremimandato'])) {
		$id_rimessa_premi_mandato = addslashes(filter_var($_POST['rimessapremimandato'], FILTER_SANITIZE_STRING));
	} else {
		$id_rimessa_premi_mandato = "";
	}
	if (isset($_POST['provvigioniincassomandato'])) {
		$provvigioni_incasso_mandato = addslashes(filter_var($_POST['provvigioniincassomandato'], FILTER_SANITIZE_STRING));
	} else {
		$provvigioni_incasso_mandato = "";
	}
	if (isset($_POST['conto1mandato'])) {
		$conto1_mandato = addslashes(filter_var($_POST['conto1mandato'], FILTER_SANITIZE_STRING));
	} else {
		$conto1_mandato = "";
	}
	if (isset($_POST['ibanconto1mandato'])) {
		$ibanconto1_mandato = addslashes(filter_var($_POST['ibanconto1mandato'], FILTER_SANITIZE_STRING));
	} else {
		$ibanconto1_mandato = "";
	}
	if (isset($_POST['conto2mandato'])) {
		$conto2_mandato = addslashes(filter_var($_POST['conto2mandato'], FILTER_SANITIZE_STRING));
	} else {
		$conto2_mandato = "";
	}
	if (isset($_POST['ibanconto2mandato'])) {
		$ibanconto2_mandato = addslashes(filter_var($_POST['ibanconto2mandato'], FILTER_SANITIZE_STRING));
	} else {
		$ibanconto2_mandato = "";
	}
	if (isset($_POST['conto3mandato'])) {
		$conto3_mandato = addslashes(filter_var($_POST['conto3mandato'], FILTER_SANITIZE_STRING));
	} else {
		$conto3_mandato = "";
	}
	if (isset($_POST['ibanconto3mandato'])) {
		$ibanconto3_mandato = addslashes(filter_var($_POST['ibanconto3mandato'], FILTER_SANITIZE_STRING));
	} else {
		$ibanconto3_mandato = "";
	}

	$campi = array("identificativo_mandato", "inizio_mandato", "fine_mandato",
		"provvallrisks_mandato", "provvcar_mandato", "provvcauz_mandato", "provvfro_mandato",
		"provvfineart_mandato", "provvkasko_mandato", "provvgfabbricati_mandato", "provvgcomm_mandato",
		"provvgabitazione_mandato", "provvincord_mandato", "provvincind_mandato",
		"provvtutlegale_mandato", "provvnoinabiltemp_mandato", "provvinabiltemp_mandato",
		"provvrcinquinamento_mandato", "provvrccapofam_mandato", "provvrcauto_mandato",
		"provvrcalibmat_mandato", "provvrcrord_mandato", "provvrcprof_mandato", "provvrcpatgrave_mandato", "provvrcpatlieve_mandato",
		"id_copertura_mandato", "fax_copertura_mandato", "email_copertura_mandato",
		"id_rimessa_premi_mandato", "provvigioni_incasso_mandato",
		"conto1_mandato", "ibanconto1_mandato", "conto2_mandato", "ibanconto2_mandato",
		"conto3_mandato", "ibanconto3_mandato");

	$valori = array($identificativo_mandato, $inizio_mandato, $fine_mandato,
		$provvallrisks_mandato, $provvcar_mandato, $provvcauz_mandato, $provvfro_mandato,
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

	$condizioni = "id_mandato = ".$_POST['id_mandato'];

	include_once "class/Database.class.php";
	$pdo = new Database();

//Aggiorno il record della tabella
	$pdo->aggiorna($tabella, $campi, $valori, $condizioni);
	$pdo->execute();
	$ultimoCodiceAggiornato = $_POST['id_mandato'];

	echo "<script type='text/javascript'>";
	echo " alert('dati Mandato aggiornati, codice: $ultimoCodiceAggiornato '); ";
	echo " location.href='mandato_esistente.php?idmand= $ultimoCodiceAggiornato';";
	echo "</script>";
