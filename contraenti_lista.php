<?php
	/**
	 * Created by PhpStorm.
	 * User: famiglia
	 * Date: 02/12/2016
	 * Time: 16:00
	 */
	$dati = $_REQUEST; // quindi $dati è un array che contiene i dati provenienti da contraenti.php
	if (isset($dati['contraente'])) {
		$contraente = $dati['contraente'];
	} else {
		$contraente = "";
	}
	if (isset($dati['testodacercare'])) {
		$testodacercare = $dati['testodacercare'];
	} else {
		$testodacercare = "";
	}
	//$id_contraente = $_REQUEST['id'];
	include_once "inc/inc.utils.php";
?>

<!-- Righe di dettaglio -->
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th><h4>Cognome<br>Nome</h4></th>
            <th><h4>Email<br>PEC</h4></th>
            <th><h4>Telefono<br>Fax</h4></th>
            <th><h4>Indirizzo</h4></th>
            <th><h4>P.Iva<br>Codice Fiscale</h4></th>
            <th><h4>Azioni</h4></th>
        </tr>
        </thead>
        <tbody>

		<?php
			// query per l'estrazione dei record
			$testodacercare = str_replace("'", "\'", $testodacercare);
			// faccio vedere tutte le compagnie
			$conf_STR_sql = " SELECT contraenti.*, comuni.nome_comune, province.sigla_provincia ";
			$conf_STR_sql .= " FROM contraenti ";
			$conf_STR_sql .= " LEFT JOIN province ON contraenti.id_provincia_residenza_contraente = province.id_provincia ";
			$conf_STR_sql .= " LEFT JOIN comuni ON contraenti.id_comune_residenza_contraente = comuni.id_comune ";
			$conf_STR_sql .= " WHERE 1=1 ";

			if ($contraente != "") {
				$conf_STR_sql .= " AND id_contraente = '".$contraente."' ";
			}
			if ($testodacercare != "") {
				$conf_STR_sql .= " AND ((cognome_contraente LIKE '%".$testodacercare."%') OR (nome_contraente LIKE '%".$testodacercare."%')) ";
			}
			$conf_STR_sql .= " ORDER BY cognome_contraente, nome_contraente ASC ";
			//            echo $conf_STR_sql;

			include_once "class/Database.class.php";
			$dbh = new Database();

			$dbh->query($conf_STR_sql);
			$dbh->execute();
			$rows = $dbh->resultset();
			$num = 0;
			foreach ($rows as $row) {
				// loop sui record presenti in tabella
				// estrazione dei record tramite ciclo while
				$num++;
				$id_contraente = $row['id_contraente'];
				$cognome_contraente = $row['cognome_contraente'];
				$nome_contraente = $row['nome_contraente'];
				$email_contraente = $row['email_contraente'];
				$telefono_fisso_contraente = $row['telefono_fisso_contraente'];
				$fax_contraente = $row['fax_contraente'];
				$data_nascita_contraente = format_data($row['data_nascita_contraente']);
				$pec_contraente = $row['pec_contraente'];
				$codice_fiscale_contraente = $row['codice_fiscale_contraente'];
				$partita_iva_contraente = $row['partita_iva_contraente'];
				$indirizzo_contraente = $row['indirizzo_residenza_contraente'];
				$sigla_provincia_contraente = $row['sigla_provincia'];
				$nome_comune_contraente = $row['nome_comune'];

				?>

                <TR>

                    <TD><?php echo "".$cognome_contraente." "; ?><br><?php echo "".$nome_contraente." "; ?></td>
                    <td><?php echo "".$email_contraente." "; ?><br><?php echo "".$pec_contraente." "; ?></td>
                    <td><?php echo "".$telefono_fisso_contraente." "; ?><br><?php echo "".$fax_contraente." "; ?></td>
                    <TD><?php echo "".$indirizzo_contraente." "; ?>
                        <br><?php echo " ".$nome_comune_contraente."(".$sigla_provincia_contraente.")"; ?></TD>
                    <td><?php echo "".$partita_iva_contraente." "; ?>
                        <br><?php echo " ".$codice_fiscale_contraente." "; ?></td>
                    <td>
                        <div><a href="contraente_esistente.php?idcont=<?php echo "{$id_contraente}" ?>"
                                class="btn btn-info btn-sm" data-toggle="tooltip" title="Vedi Contraente"
                                role="button" target="_blank">V</a>
                            <a href="contraente_esistente_modifica.php?idcont=<?php echo "{$id_contraente}" ?>"
                               class="btn btn-warning btn-sm" data-toggle="tooltip" title="Modifica Contraente"
                               role="button" target="_blank">M</a></div>
                    </td>
                </TR>
			<?php }
			$dbh = null;
		?>

        </tbody>
    </TABLE>
</div>
