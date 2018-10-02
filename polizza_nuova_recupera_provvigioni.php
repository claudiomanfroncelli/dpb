<?php
	/**
	 * Created by PhpStorm.
	 * User: famiglia
	 * Date: 03/07/2018
	 * Time: 09:06
	 */ ?>
<?php

	$id_mandato = $_POST['id_mandato_polizza'];
	$id_tiporischio = $_POST['id_tiporischio_polizza'];

	require_once "class/Database.class.php";
	$dbprovv = new Database();

	$sql_provv = " SELECT * FROM mandati ";
	$sql_provv .= " WHERE id_mandato = ".$id_mandato;

	//echo "sql_provv è: " . $sql_provv."<br>";


	$dbprovv->query($sql_provv);
	$dbprovv->execute();
	$rows = $dbprovv->resultset();
	$recordsprovv = $dbprovv->rowCount();

	if ($recordsprovv > 0) {

		foreach ($rows as $row) {

			switch ($id_tiporischio) {
				case "AllRis":
					$provvigioni_broker = $row['provvallrisks_mandato'];
					break;
				case "CAR":
					$provvigioni_broker = $row['provvcar_mandato'];
					break;
				case "Cauzio":
					$provvigioni_broker = $row['provvcauz_mandato'];
					break;
				case "FRO":
					$provvigioni_broker = $row['provvfro_mandato'];
					break;
				case "FineAr":
					$provvigioni_broker = $row['provvfineart_mandato'];
					break;
				case "Kasko":
					$provvigioni_broker = $row['provvkasko_mandato'];
					break;
				case "GFabbr":
					$provvigioni_broker = $row['provvgfabbricati_mandato'];
					break;
				case "GComme":
					$provvigioni_broker = $row['provvgcomm_mandato'];
					break;
				case "GAbita":
					$provvigioni_broker = $row['provvgabitazione_mandato'];
					break;
				case "IncOrd":
					$provvigioni_broker = $row['provvincord_mandato'];
					break;
				case "IncInd":
					$provvigioni_broker = $row['provvincind_mandato'];
					break;
				case "Tutela":
					$provvigioni_broker = $row['provvtutlegale_mandato'];
					break;
				case "InfNoT":
					$provvigioni_broker = $row['provvnoinabiltemp_mandato'];
					break;
				case "InfIna":
					$provvigioni_broker = $row['provvinabiltemp_mandato'];
					break;
				case "RCInqu":
					$provvigioni_broker = $row['provvrcinquinamento_mandato'];
					break;
				case "RCCapo":
					$provvigioni_broker = $row['provvrccapofam_mandato'];
					break;
				case "RCAuto":
					$provvigioni_broker = $row['provvrcauto_mandato'];
					break;
				case "RCLibM":
					$provvigioni_broker = $row['provvrcalibmat_mandato'];
					break;
				case "RCROrd":
					$provvigioni_broker = $row['provvrcrord_mandato'];
					break;
				case "RCProf":
					$provvigioni_broker = $row['provvrcprof_mandato'];
					break;
				case "RCPaGr":
					$provvigioni_broker = $row['provvrcpatgrave_mandato'];
					break;
				case "RCPaLi":
					$provvigioni_broker = $row['provvrcpatlieve_mandato'];
					break;
			}
			$provvigioni_broker = $provvigioni_broker + $row['provvigioni_incasso_mandato'];
			echo trim($provvigioni_broker);
		}
	} else {
		echo "'nze po' fà";
	}
