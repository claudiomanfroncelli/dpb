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
            <th><h4>Compagnia<br>Nr. Polizza</th>
            </h4>
            <th><h4>Contraente</th>
            </h4>
            <th><h4>Inizio Copertura<br>Fine Copertura</th>
            </h4>
            <th><h4>tipologia</th>
            </h4>
            <th><h4>Ramo</th>
            </h4>
            <th><h4>Stato</th>
            </h4>
            <th><h4>Azioni</th>
            </h4>
        </tr>
        </thead>
        <tbody>

		<?php

			// query per l'estrazione dei record

			$testodacercare = str_replace("'", "\'", $dati['testodacercare']);
			// faccio vedere tutte le compagnie
			$conf_STR_sql = " SELECT contraenti.cognome_contraente, contraenti.nome_contraente, ";
			$conf_STR_sql .= " compagnie.ragione_sociale_compagnia, ragione_sociale_agenzia, polizze.* ";
			$conf_STR_sql .= " FROM polizze ";
			$conf_STR_sql .= " INNER JOIN compagnie ON id_compagnia_polizza = compagnie.id_compagnia ";
			$conf_STR_sql .= " INNER JOIN agenzie ON id_agenzia_polizza = agenzie.id_agenzia ";
			$conf_STR_sql .= " INNER JOIN contraenti ON id_contraente_polizza = contraenti.id_contraente ";
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

			$conf_STR_sql .= " ORDER BY numero_polizza ASC ";

			//            echo $conf_STR_sql;

			include_once "Database.class.php";

			try {
				$dbh = new PDO('mysql:host='.$host.';dbname='.$db, $user, $password);
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}

			$q = $dbh->prepare($conf_STR_sql);
			$q->execute();

			$q->setFetchMode(PDO::FETCH_ASSOC);

			$num = 0;

			while ($row = $q->fetch()) {

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
				$inizio_copertura_polizza = $row['inizio_copertura_polizza'];
				$fine_copertura_polizza = $row['fine_copertura_polizza'];
				$tipologia_polizza = $row['tipologia_polizza'];
				$ramo_polizza = $row['ramo_polizza'];
				$stato_polizza = $row['stato_polizza'];

				// composizione campi su due righe
				$ragione_sociale_contraente = $cognome_contraente." ".$nome_contraente;
				$compagnia_numeropolizza = $ragione_sociale_compagnia."<br>".$numero_polizza;
				$copertura_polizza = $inizio_copertura_polizza."<br>".$fine_copertura_polizza;


				?>

                <TR>

                    <TD><?php echo "".$compagnia_numeropolizza." "; ?></TD>
                    <td><?php echo "".$ragione_sociale_contraente." "; ?></td>
                    <td><?php echo "".$copertura_polizza." "; ?></td>
                    <td><?php echo "".$tipologia_polizza." "; ?></td>
                    <td><?php echo "".$ramo_polizza." "; ?></td>
                    <td><?php echo "".$stato_polizza." "; ?></td>
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
