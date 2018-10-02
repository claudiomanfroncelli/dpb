<?php
	/**
	 * Created by PhpStorm.
	 * User: famiglia
	 * Date: 02/12/2016
	 * Time: 16:00
	 */
	include_once "inc/inc.utils.php";//serve per la formattazione della data

	$idcompagniapolizza = 0;
	$idagenziapolizza = 0;
	$idcontraentepolizza = 0;
	$idmandatopolizza = 0;
	$testodacercare = "";
	$dati = $_REQUEST;
	if (isset($dati['compagnia'])) {
		$idcompagniapolizza = $dati['compagnia'];
	}
	if (isset($dati['agenzia'])) {
		$idagenziapolizza = $dati['agenzia'];
	}
	if (isset($dati['mandato'])) {
		$idmandatopolizza = $dati['mandato'];
	}
	if (isset($dati['contraente'])) {
		$idcontraentepolizza = $dati['contraente'];
	}
	if (isset($dati['testodacercare'])) {
		$testodacercare = $dati['testodacercare'];
	}
	if (isset($dati['idcom'])) {
		$idcompagniapolizza = $dati['idcom'];
	}
	if (isset($dati['idage'])) {
		$idagenziapolizza = $dati['idage'];
	}
	if (isset($dati['idcont'])) {
		$idcontraentepolizza = $dati['idcont'];
	}
	if (isset($dati['idmand'])) {
		$idmandatopolizza = $dati['idmand'];
	}
?>

<!-- Righe di dettaglio -->
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th><h4>Compagnia<br>Nr. Polizza</h4></th>

            <th><h4>Contraente<br>Nr. Appendice</h4></th>

            <th><h4>Decorrenza<br>Scadenza</h4></th>

            <th><h4>Rischio</h4></th>

            <th><h4>Frazionamento</h4></th>

            <th><h4>Lordo</h4></th>

            <th><h4>Azioni</h4></th>

        </tr>
        </thead>
        <tbody>

		<?php
			// query per l'estrazione dei record
			$testodacercare = str_replace("'", "\'", $testodacercare);
			// faccio vedere tutte le compagnie
			$conf_STR_sql = " SELECT compagnie.id_compagnia, compagnie.ragione_sociale_compagnia, agenzie.id_agenzia, ";
			$conf_STR_sql .= "  agenzie.ragione_sociale_agenzia, contraenti.id_contraente, contraenti.cognome_contraente, ";
			$conf_STR_sql .= "  contraenti.nome_contraente, descrizione_frazionamento, descrizione_tiporischio, ";
			$conf_STR_sql .= "  polizze.* FROM polizze ";
			$conf_STR_sql .= "  LEFT JOIN compagnie ON polizze.id_compagnia_polizza = compagnie.id_compagnia ";
			$conf_STR_sql .= "  LEFT JOIN agenzie ON polizze.id_agenzia_polizza = agenzie.id_agenzia ";
			$conf_STR_sql .= "  LEFT JOIN contraenti ON polizze.id_contraente_polizza = contraenti.id_contraente ";
			$conf_STR_sql .= "  LEFT JOIN frazionamenti ON polizze.id_frazionamento_polizza = frazionamenti.id_frazionamento ";
			$conf_STR_sql .= "  LEFT JOIN tiporischio ON polizze.id_tiporischio_polizza = tiporischio.id_tiporischio ";
			$conf_STR_sql .= " WHERE 1=1 ";
			if ($idcompagniapolizza > 0) {
				$conf_STR_sql .= " AND id_compagnia_polizza = {$idcompagniapolizza} ";
			}
			if ($idagenziapolizza > 0) {
				$conf_STR_sql .= " AND id_agenzia_polizza = {$idagenziapolizza} ";
			}
			if ($idcontraentepolizza > 0) {
				$conf_STR_sql .= " AND id_contraente_polizza = {$idcontraentepolizza} ";
			}
			if ($idmandatopolizza > 0) {
				$conf_STR_sql .= " AND id_mandato_polizza = {$idmandatopolizza} ";
			}
			$conf_STR_sql .= " ORDER BY numero_polizza ASC ";
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
				$num++;
				$id_polizza = $row['id_polizza'];
				$id_contraente_polizza = $row['id_contraente_polizza'];
				$cognome_contraente = $row ['cognome_contraente'];
				$nome_contraente = $row ['nome_contraente'];
				$id_compagnia_polizza = $row['id_compagnia_polizza'];
				$ragione_sociale_compagnia = $row['ragione_sociale_compagnia'];
				$id_agenzia_polizza = $row['id_agenzia_polizza'];
				$ragione_sociale_agenzia = $row['ragione_sociale_agenzia'];
				$numero_polizza = $row['numero_polizza'];
				$decorrenza_polizza = format_data($row['decorrenza_polizza']);
				$scadenza_polizza = format_data($row['scadenza_polizza']);
				$appendice_polizza = $row['appendice_polizza'];
				$descrizione_tiporischio_polizza = $row['descrizione_tiporischio'];
				$id_frazionamento_polizza = $row['id_frazionamento_polizza'];
				$descrizione_tiporischio_polizza = $row['descrizione_tiporischio'];
				$descrizione_frazionamento_polizza = $row['descrizione_frazionamento'];
				$totale_lordo_polizza = formato_italiano($row['totale_lordo_polizza']);
				$stato_polizza = $row['stato_polizza'];
				// composizione campi su due righe
				$ragione_sociale_contraente = $cognome_contraente." ".$nome_contraente."<br>".$appendice_polizza;
				$compagnia_numeropolizza = $ragione_sociale_compagnia."<br>".$numero_polizza;
				$copertura_polizza = $decorrenza_polizza."<br>".$scadenza_polizza;
				?>

                <TR>

                    <TD><?php echo "".$compagnia_numeropolizza." "; ?></TD>
                    <td><?php echo "".$ragione_sociale_contraente." "; ?></td>
                    <td><?php echo "".$copertura_polizza." "; ?></td>
                    <td><?php echo "".$descrizione_tiporischio_polizza." "; ?></td>
                    <td><?php echo "".$descrizione_frazionamento_polizza." "; ?></td>
                    <td align="right"><?php echo "".$totale_lordo_polizza."&nbsp;&nbsp;"; ?></td>
                    <td>
                        <div><a href="polizza_esistente.php?idpol=<?php echo "{$id_polizza}" ?>"
                                class="btn btn-info btn-sm" data-toggle="tooltip" title="Vedi Polizza"
                                role="button" target="_blank">V</a>
                            <a href="polizza_esistente_modifica.php?idpol=<?php echo "{$id_polizza}" ?>"
                               class="btn btn-warning btn-sm" data-toggle="tooltip" title="Modifica Polizza"
                               role="button" target="_blank">M</a></div>
                    </td>
                </TR>
			<?php }
			$dbh = null;
		?>

        </tbody>
    </TABLE>
</div>
