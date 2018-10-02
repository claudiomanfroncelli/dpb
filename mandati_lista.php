<?php
	/**
	 * Created by PhpStorm.
	 * User: famiglia
	 * Date: 02/12/2016
	 * Time: 16:00
	 */
	$idcompagniamandato = "";
	$idagenziamandato = "";
	$identificativomandato = "";
	$testodacercare = "";
	$dati = $_REQUEST;

	if (isset($dati['compagnia'])) {
		$idcompagniamandato = $dati['compagnia'];
	}
	if (isset($dati['agenzia'])) {
		$idagenziamandato = $dati['agenzia'];
	}
	if (isset($dati['mandato'])) {
		$identificativomandato = $dati['mandato'];
	}
	if (isset($dati['testodacercare'])) {
		$testodacercare = $dati['testodacercare'];
	}
	if (isset($dati['idcom'])) {
		$idcompagniamandato = $dati['idcom'];
	}
	if (isset($dati['idage'])) {
		$idagenziamandato = $dati['idage'];
	}
?>

<!-- Righe di dettaglio -->
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th><h4>Identificativo<br>Mandato</h4></th>
            <th><h4>Compagnia<br>Agenzia</h4></th>
            <th><h4>Inizio Mandato<br>Fine Mandato</h4></th>
            <th><h4>Rimessa Premi</h4></th>
            <th><h4>Orario Copertura</h4></th>
            <th><h4>Azioni</h4></th>
        </tr>
        </thead>
        <tbody>

		<?php
			// query per l'estrazione dei record
			$testodacercare = str_replace("'", "\'", $testodacercare);
			// faccio vedere tutte le compagnie
			$conf_STR_sql = " SELECT mandati.*, compagnie.ragione_sociale_compagnia, ";
			$conf_STR_sql .= " agenzie.ragione_sociale_agenzia, coperture.orario_copertura, rimessapremi.descrizione_rimessapremio ";
			$conf_STR_sql .= " FROM mandati ";
			$conf_STR_sql .= " JOIN compagnie ON mandati.id_compagnia_mandato = compagnie.id_compagnia ";
			$conf_STR_sql .= " JOIN agenzie ON mandati.id_agenzia_mandato = agenzie.id_agenzia ";
			$conf_STR_sql .= " LEFT JOIN coperture ON mandati.id_copertura_mandato = coperture.id_copertura ";
			$conf_STR_sql .= " LEFT JOIN rimessapremi ON mandati.id_rimessa_premi_mandato = rimessapremi.id_rimessapremio ";
			$conf_STR_sql .= " WHERE 1=1 ";
			if ($idcompagniamandato > 0) {
				$conf_STR_sql .= " AND id_compagnia_mandato = {$idcompagniamandato} ";
			}
			if ($idagenziamandato > 0) {
				$conf_STR_sql .= " AND id_agenzia_mandato = {$idagenziamandato} ";
			}
			if ($identificativomandato > 0) {
				$conf_STR_sql .= " AND id_mandato = {$identificativomandato} ";
			}
			$conf_STR_sql .= " ORDER BY identificativo_mandato ASC ";
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
				$id_mandato = $row['id_mandato'];
				$identificativo_mandato = $row['identificativo_mandato'];
				$id_compagnia_mandato = $row['id_compagnia_mandato'];
				$ragione_sociale_compagnia_mandato = $row['ragione_sociale_compagnia'];
				$id_agenzia_mandato = $row['id_agenzia_mandato'];
				$ragione_sociale_agenzia_mandato = $row['ragione_sociale_agenzia'];
				$id_accordo_collaborazione_mandato = $row['id_accordo_collaborazione_mandato'];
				$rimessa_premi_mandato = $row['descrizione_rimessapremio'];
				$orario_copertura_mandato = $row['orario_copertura'];

				//---------------------------------------------------  campi?????????? -----------------------
				$inizio_mandato = $row['inizio_mandato'];
				$fine_mandato = $row['fine_mandato'];
				//--------------------------------------------------------------------------------------------

				?>

                <TR>

                    <TD><?php echo "".$identificativo_mandato." "; ?></TD>
                    <td><?php echo "".$ragione_sociale_compagnia_mandato." "; ?>
                        <br><?php echo "".$ragione_sociale_agenzia_mandato." "; ?></td>
                    <td><?php echo "".$inizio_mandato." "; ?><br><?php echo "".$fine_mandato." "; ?></td>
                    <td><?php echo "".$rimessa_premi_mandato." "; ?></td>
                    <td><?php echo "".$orario_copertura_mandato." "; ?></td>
                    <td>
                        <div><a href="mandato_esistente.php?idmand=<?php echo "{$id_mandato}"; ?>"
                                class="btn btn-info btn-sm" data-toggle="tooltip" title="Vedi mandato"
                                role="button" target="_blank">V</a>
                            <a href="mandato_esistente_modifica.php?idmand=<?php echo "{$id_mandato}"; ?>"
                               class="btn btn-warning btn-sm" data-toggle="tooltip" title="Modifica mandato"
                               role="button" target="_blank">M</a></div>
                    </td>
                </TR>
			<?php }
			$dbh = null;
		?>

        </tbody>
    </TABLE>
</div>
