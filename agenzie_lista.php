<?php
	/**
	 * Created by PhpStorm.
	 * User: famiglia
	 * Date: 02/12/2016
	 * Time: 16:00
	 */

	$dati = $_REQUEST; // quindi $dati è un array che contiene i dati provenienti da compagnia_esistente.php o agenzie.php

	if (!isset($dati['compagnia'])) {
		$dati['compagnia'] = 0;
	}
	if (!isset($dati['testodacercare'])) {
		$dati['testodacercare'] = "";
	}
	if (!isset($dati['agenzia'])) {
		$dati['agenzia'] = 0;
	}
	if (!isset($dati['idcom'])) {
		$dati['idcom'] = 0;
	}
	$id_compagnia_agenzia = $dati['idcom'];
?>

<!-- Righe di dettaglio -->
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th><h4>Agenzia<br>Compagnia</h4></th>
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

			$testodacercare = str_replace("'", "\'", $dati['testodacercare']);
			// faccio vedere tutte le compagnie
			$conf_STR_sql = " SELECT agenzie.*, compagnie.ragione_sociale_compagnia, comuni.nome_comune, province.sigla_provincia ";
			$conf_STR_sql .= " FROM agenzie ";
			$conf_STR_sql .= " LEFT JOIN compagnie ON id_compagnia_agenzia = compagnie.id_compagnia ";
			$conf_STR_sql .= " LEFT JOIN province ON agenzie.id_provincia_agenzia = province.id_provincia ";
			$conf_STR_sql .= " LEFT JOIN comuni ON agenzie.id_comune_agenzia = comuni.id_comune ";
			$conf_STR_sql .= " WHERE 1=1 ";

			if ($dati['compagnia'] > "0") {
				$conf_STR_sql .= " AND id_compagnia_agenzia = '".$dati['compagnia']."' ";
			}
			if ($dati['agenzia'] > "0") {
				$conf_STR_sql .= " AND id_agenzia = '".$dati['agenzia']."' ";
			}
			if ($dati['testodacercare'] != "") {
				$conf_STR_sql .= " AND ((ragione_sociale_agenzia LIKE '%".$dati['testodacercare']."%')) ";
			}
			if ($id_compagnia_agenzia != "") {
				$conf_STR_sql .= " AND ((id_compagnia_agenzia = ".$id_compagnia_agenzia.")) ";
			}

			$conf_STR_sql .= " ORDER BY ragione_sociale_agenzia ASC ";

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
				$ragione_sociale_compagnia = $row['ragione_sociale_compagnia'];
				$id_agenzia = $row['id_agenzia'];
				$ragione_sociale_agenzia = $row['ragione_sociale_agenzia'];
				$email_agenzia = $row['email_agenzia'];
				$pec_agenzia = $row['pec_agenzia'];
				$telefono_fisso_agenzia = $row['telefono_fisso_agenzia'];
				$mobile_agenzia = $row['mobile_agenzia'];
				$fax_agenzia = $row['fax_agenzia'];
				$partita_iva_agenzia = $row['partita_iva_agenzia'];
				$codice_fiscale_agenzia = $row['codice_fiscale_agenzia'];
				$indirizzo_agenzia = $row['indirizzo_agenzia'];
				$sigla_provincia_agenzia = $row['sigla_provincia'];
				$nome_comune_agenzia = $row['nome_comune'];

				?>

                <TR>

                    <TD><?php echo "".$ragione_sociale_agenzia." "; ?>
                        <br><?php echo "(".$ragione_sociale_compagnia.")"; ?></TD>
                    <td><?php echo "".$email_agenzia." "; ?><br><?php echo " ".$pec_agenzia." "; ?></td>
                    <td><?php echo "".$telefono_fisso_agenzia." "; ?><br><?php echo " ".$fax_agenzia." "; ?>
                    </td>
                    <TD><?php echo "".$indirizzo_agenzia." "; ?>
                        <br><?php echo " ".$nome_comune_agenzia."(".$sigla_provincia_agenzia.")"; ?></TD>
                    <td><?php echo "".$partita_iva_agenzia." "; ?>
                        <br><?php echo " ".$codice_fiscale_agenzia." "; ?></td>
                    <td>
                        <div><a href="agenzia_esistente.php?idage=<?php echo "{$id_agenzia}"; ?>"
                                class="btn btn-info btn-sm" data-toggle="tooltip" title="Vedi Agenzia"
                                role="button" target="_blank">V</a>
                            <a href="agenzia_esistente_modifica.php?idage=<?php echo "{$id_agenzia}"; ?>"
                               class="btn btn-warning btn-sm" data-toggle="tooltip" title="Modifica Agenzia"
                               role="button" target="_blank">M</a></div>
                    </td>
                </TR>
			<?php }

			$dbh = null;


		?>

        </tbody>
    </TABLE>
</div>
