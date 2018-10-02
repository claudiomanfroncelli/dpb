<?php
	/**
	 * Created by PhpStorm.
	 * User: famiglia
	 * Date: 02/12/2016
	 * Time: 16:00
	 */

	$dati = $_REQUEST;
	if (!isset($dati['compagnia'])) {
		$dati['compagnia'] = 0;
	}
	if (!isset($dati['agenzia'])) {
		$dati['agenzia'] = 0;
	}
	if (!isset($dati['contraente'])) {
		$dati['contraente'] = 0;
	}
	if (!isset($dati['testodacercare'])) {
		$dati['testodacercare'] = "";
	}

	// quindi $dati è un array che contiene i dati provenienti dalla pagina php precedente
	$idcompagniapolizza = $dati['compagnia'];
	$idagenziapolizza = $dati['agenzia'];
	$idcontraentepolizza = $dati['contraente'];
	$testodacercare = $dati['testodacercare'];
?>

<!-- Righe di dettaglio -->
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th><h4>Nr. Polizza<br>Rata Premio</h4></th>

            <th><h4>Scadenza Premio<br>Data Incasso</h4></th>

            <th><h4>Importo Lordo<br>Importo Netto</h4></th>

            <th><h4>Pagato il<br>Tramite</h4></th>

        </tr>
        </thead>
        <tbody>

		<?php

			// query per l'estrazione dei record

			$testodacercare = str_replace("'", "\'", $dati['testodacercare']);
			// faccio vedere tutte le compagnie
			$conf_STR_sql = " SELECT numero_polizza, id_compagnia_polizza, id_agenzia_polizza, id_contraente_polizza, ";
			$conf_STR_sql .= " descrizione_tipopagamento, premi.* FROM premi ";
			$conf_STR_sql .= " JOIN polizze ON id_polizza_premio = polizze.id_polizza ";
			$conf_STR_sql .= " LEFT JOIN tipopagamento ON id_tipopagamento_premio = tipopagamento.id_tipopagamento ";
			$conf_STR_sql .= " WHERE 1=1 ";

			if ($idcompagniapolizza <> "") {
				$conf_STR_sql .= " AND id_compagnia_polizza = {$idcompagniapolizza} ";
			}
			if ($idagenziapolizza <> "") {
				$conf_STR_sql .= " AND id_agenzia_polizza = {$idagenziapolizza} ";
			}
			if ($idcontraentepolizza <> "") {
				$conf_STR_sql .= " AND id_contraente_polizza = {$idcontraentepolizza} ";
			}
			if ($dati['compagnia'] > "0") {
				$conf_STR_sql .= " AND id_compagnia_polizza = '".$dati['compagnia']."' ";
			}
			if ($dati['agenzia'] > "0") {
				$conf_STR_sql .= " AND id_agenzia_polizza = '".$dati['agenzia']."' ";
			}
			if ($dati['contraente'] > "0") {
				$conf_STR_sql .= " AND id_contraente_polizza = '".$dati['contraente']."' ";
			}
			if ($dati['testodacercare'] != "") {
				$conf_STR_sql .= " AND ((contraente_polizza LIKE '%".$dati['testodacercare']."%')) ";
			}

			$conf_STR_sql .= " ORDER BY numero_polizza, rata_premio ASC ";

			//            echo $conf_STR_sql;

			include_once "class/Database.class.php";
			$dbh = new Database();

			$dbh->query($conf_STR_sql);
			$dbh->execute();
			$rows = $dbh->resultset();
			$num = 0;
			foreach ($rows as $row) {

				// loop sui records presenti in tabella
				// estrazione dei records tramite ciclo while

				$id_premio = $row['id_premio'];
				$id_polizza_premio = $row['id_polizza_premio'];
				$numero_polizza = $row['numero_polizza'];
				$rata_premio = $row['rata_premio'];
				$scadenza_premio = format_data($row['scadenza_premio']);
				$data_incasso_premio = format_data($row['data_incasso_premio']);
				$importo_lordo_premio = formato_italiano($row['importo_lordo_premio']);
				$importo_netto_premio = formato_italiano($row['importo_netto_premio']);
				$pagato_il_premio = format_data($row['pagato_il_premio']);
				$id_tipopagamento_premio = $row['id_tipopagamento_premio'];
				$descrizione_pagamento_premio = $row['descrizione_tipopagamento'];

				// composizione campi su due righe per visualizzazione lista
				$dati_premio = $numero_polizza."<br>".$rata_premio;
				$date_premio = $scadenza_premio."<br>".$data_incasso_premio;
				$importi_premio = $importo_lordo_premio."<br>".$importo_netto_premio;
				$pagamenti_premio = $pagato_il_premio."<br>".$descrizione_pagamento_premio;


				?>

                <TR>

                    <TD><?php echo "".$dati_premio." "; ?></TD>
                    <td><?php echo "".$date_premio." "; ?></td>
                    <td><?php echo "".$importi_premio." "; ?></td>
                    <td><?php echo "".$pagamenti_premio." "; ?></td>
                    <td>
                        <div>
                            <a href="premio_esistente.php?idpol=<?php echo "{$id_polizza_premio}"; ?>&idprem=<?php echo "{$id_premio}"; ?>"
                               class="btn btn-info btn-sm" data-toggle="tooltip" title="Vedi Premio"
                               role="button" target="_blank">V</a>
                            <a href="premio_esistente_modifica.php?idpol=<?php echo "{$id_polizza_premio}"; ?>&idprem=<?php echo "{$id_premio}"; ?>"
                               class="btn btn-warning btn-sm" data-toggle="tooltip" title="Modifica Premio"
                               role="button" target="_blank">M</a></div>
                    </td>
                </TR>
			<?php }

			$dbh = null;


		?>

        </tbody>
    </TABLE>
</div>
