<?php
	/**
	 * Created by PhpStorm.
	 * User: famiglia
	 * Date: 02/12/2016
	 * Time: 16:00
	 */

	$dati = $_REQUEST;
	// quindi $dati è un array che contiene i dati provenienti dal form precedente

	if (!isset($dati['compagnia'])) {
		$compagnia = 0;
	} else {
		$compagnia = $dati['compagnia'];
	}
	if (!isset($dati['testodacercare'])) {
		$testodacercare = "";
	} else {
		$testodacercare = $dati['testodacercare'];
	}

?>

<div class="container">
    <!-- Righe di dettaglio -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><h4>Compagnia</th>
                </h4>
                <th><h4>Email<br>PEC</th>
                </h4>
                <th><h4>Telefono<br>Fax</th>
                </h4>
                <th><h4>Indirizzo</th>
                </h4>
                <th><h4>P.Iva<br>Codice Fiscale</th>
                </h4>
                <th><h4>Azioni</th>
                </h4>
            </tr>
            </thead>
            <tbody>

			<?php

				// query per l'estrazione dei record
				$testodacercare = str_replace("'", "\'", $testodacercare);
				// faccio vedere tutte le compagnie
				$conf_STR_sql = " SELECT compagnie.*, comuni.nome_comune, province.sigla_provincia ";
				$conf_STR_sql .= " FROM compagnie ";
				$conf_STR_sql .= " LEFT JOIN province ON compagnie.id_provincia_compagnia = province.id_provincia ";
				$conf_STR_sql .= " LEFT JOIN comuni ON compagnie.id_comune_compagnia = comuni.id_comune ";
				$conf_STR_sql .= " WHERE 1=1 ";

				if ($compagnia <> "0") {
					$conf_STR_sql .= " AND id_compagnia = '".$compagnia."' ";
				}
				/*                     if ($dati['agenzia'] > "0") {
										 $conf_STR_sql .= " AND id_agenzia = '" . $dati['agenzia'] . "' ";
									 }*/
				if ($testodacercare != "") {
					$conf_STR_sql .= " AND ((ragione_sociale_compagnia LIKE '%".$testodacercare."%')) ";
				}
				$conf_STR_sql .= " ORDER BY ragione_sociale_compagnia ASC ";

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
					$id_compagnia = $row['id_compagnia'];
					$ragione_sociale_compagnia = $row['ragione_sociale_compagnia'];
					$email_compagnia = $row['email_compagnia'];
					$pec_compagnia = $row['pec_compagnia'];
					$telefono_fisso_compagnia = $row['telefono_fisso_compagnia'];
					$mobile_compagnia = $row['mobile_compagnia'];
					$fax_compagnia = $row['fax_compagnia'];
					$partita_iva_compagnia = $row['partita_iva_compagnia'];
					$codice_fiscale_compagnia = $row['codice_fiscale_compagnia'];
					$indirizzo_compagnia = $row['indirizzo_compagnia'];
					$sigla_provincia_compagnia = $row['sigla_provincia'];
					$nome_comune_compagnia = $row['nome_comune'];

					?>

                    <TR>

                        <TD><?php echo "".$ragione_sociale_compagnia." "; ?></TD>
                        <td><?php echo "".$email_compagnia." "; ?><br><?php echo " ".$pec_compagnia." "; ?></td>
                        <td><?php echo "".$telefono_fisso_compagnia." "; ?>
                            <br><?php echo " ".$fax_compagnia." "; ?>
                        </td>
                        <TD><?php echo "".$indirizzo_compagnia." "; ?>
                            <br><?php echo " ".$nome_comune_compagnia."(".$sigla_provincia_compagnia.")"; ?>
                        </TD>
                        <td><?php echo "".$partita_iva_compagnia." "; ?>
                            <br><?php echo " ".$codice_fiscale_compagnia." "; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="compagnia_esistente.php?idcom=<?php echo "{$id_compagnia}"; ?>"
                                   class="btn btn-info btn-sm" data-toggle="tooltip" title="Vedi Compagnia"
                                   role="button" target="_blank">V</a>
                                <a href="compagnia_esistente_modifica.php?idcom=<?php echo "{$id_compagnia}" ?>"
                                   class="btn btn-warning btn-sm" data-toggle="tooltip" title="Modifica Compagnia"
                                   role="button" target="_blank">M</a></div>
                        </td>
                    </TR>
				<?php }

				$dbh = null;


			?>

            </tbody>
        </TABLE>
    </div>
