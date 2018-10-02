<?php
	/**
	 * Created by PhpStorm.
	 * User: famiglia
	 * Date: 03/06/2018
	 * Time: 20:12
	 */
	$id_regione_nascita_contraente = $row['id_regione_nascita_contraente'];
	$id_provincia_nascita_contraente = $row['id_provincia_nascita_contraente'];
	$id_comune_nascita_contraente = $row['id_comune_nascita_contraente'];
	$data_nascita_contraente = format_data($row['data_nascita_contraente']);

	$nome_regione_nascita_contraente = "";
	$nome_provincia_nascita_contraente = "";
	$nome_comune_nascita_contraente = "";

	if ($id_regione_nascita_contraente <> "0") {
		$regionenascita_sql = " SELECT regioni.* FROM regioni ";
		$regionenascita_sql .= " WHERE regioni.id_regione = ".$id_regione_nascita_contraente;
	}
	$dbh->query($regionenascita_sql);
	$dbh->execute();
	$rowsregionenascita = $dbh->resultset();
	foreach ($rowsregionenascita as $rowregionenascita) {
		$nome_regione_nascita_contraente = $rowregionenascita['nome_regione'];
	}

	if ($id_provincia_nascita_contraente <> "0") {
		$provincianascita_sql = " SELECT province.* FROM province ";
		$provincianascita_sql .= " WHERE province.id_provincia = ".$id_provincia_nascita_contraente;
	}
	$dbh->query($provincianascita_sql);
	$dbh->execute();
	$rowsprovincianascita = $dbh->resultset();
	foreach ($rowsprovincianascita as $rowprovincianascita) {
		$nome_provincia_nascita_contraente = $rowprovincianascita['nome_provincia'];
	}

	if ($id_comune_nascita_contraente <> "0") {
		$comunenascita_sql = " SELECT comuni.* FROM comuni ";
		$comunenascita_sql .= " WHERE comune.id_comune = ".$id_comune_nascita_contraente;
	}
	$dbh->query($comunenascita_sql);
	$dbh->execute();
	$rowscomunenascita = $dbh->resultset();
	foreach ($rowscomunenascita as $rowcomunenascita) {
		$nome_comune_nascita_contraente = $rowcomunenascita['nome_comune'];
	}


// ora estraggo i dati della residenza

	$id_regione_residenza_contraente = $row['id_regione_residenza_contraente'];
	$id_provincia_residenza_contraente = $row['id_provincia_residenza_contraente'];
	$id_comune_residenza_contraente = $row['id_comune_residenza_contraente'];
	$cap_residenza_contraente = $row['cap_residenza_contraente'];
	$indirizzo_residenza_contraente = $row['indirizzo_residenza_contraente'];

	$nome_regione_residenza_contraente = "";
	$nome_provincia_residenza_contraente = "";
	$nome_comune_residenza_contraente = "";

	if ($id_regione_residenza_contraente <> "0") {
		$regioneresidenza_sql = " SELECT regioni.* FROM regioni ";
		$regioneresidenza_sql .= " WHERE regioni.id_regione = ".$id_regione_residenza_contraente;
	}
	$dbh->query($regioneresidenza_sql);
	$dbh->execute();
	$rowsregioneresidenza = $dbh->resultset();
	foreach ($rowsregioneresidenza as $rowregioneresidenza) {
		$nome_regione_residenza_contraente = $rowregioneresidenza['nome_regione'];
	}

	if ($id_provincia_residenza_contraente <> "0") {
		$provinciaresidenza_sql = " SELECT province.* FROM province ";
		$provinciaresidenza_sql .= " WHERE province.id_provincia = ".$id_provincia_residenza_contraente;
	}
	$dbh->query($provinciaresidenza_sql);
	$dbh->execute();
	$rowsprovinciaresidenza = $dbh->resultset();
	foreach ($rowsprovinciaresidenza as $rowprovinciaresidenza) {
		$nome_provincia_residenza_contraente = $rowprovinciaresidenza['nome_provincia'];
	}

	if ($id_comune_residenza_contraente <> "0") {
		$comuneresidenza_sql = " SELECT comuni.* FROM comuni ";
		$comuneresidenza_sql .= " WHERE comune.id_comune = ".$id_comune_residenza_contraente;
	}
	$dbh->query($comuneresidenza_sql);
	$dbh->execute();
	$rowscomuneresidenza = $dbh->resultset();
	foreach ($rowscomuneresidenza as $rowcomuneresidenza) {
		$nome_comune_residenza_contraente = $rowcomuneresidenza['nome_comune'];
	}

// ora estraggo i dati della corrispondenza

	$id_regione_corrispondenza_contraente = $row['id_regione_corrispondenza_contraente'];
	$id_provincia_corrispondenza_contraente = $row['id_provincia_corrispondenza_contraente'];
	$id_comune_corrispondenza_contraente = $row['id_comune_corrispondenza_contraente'];
	$cap_corrispondenza_contraente = $row['cap_corrispondenza_contraente'];
	$indirizzo_corrispondenza_contraente = $row['indirizzo_corrispondenza_contraente'];

	$nome_regione_corrispondenza_contraente = "";
	$nome_provincia_corrispondenza_contraente = "";
	$nome_comune_corrispondenza_contraente = "";

	if ($id_regione_corrispondenza_contraente <> "0") {
		$regionecorrispondenza_sql = " SELECT regioni.* FROM regioni ";
		$regionecorrispondenza_sql .= " WHERE regioni.id_regione = ".$id_regione_corrispondenza_contraente;
	}
	$dbh->query($regionecorrispondenza_sql);
	$dbh->execute();
	$rowsregionecorrispondenza = $dbh->resultset();
	foreach ($rowsregionecorrispondenza as $rowregionecorrispondenza) {
		$nome_regione_corrispondenza_contraente = $rowregionecorrispondenza['nome_regione'];
	}

	if ($id_provincia_corrispondenza_contraente <> "0") {
		$provinciacorrispondenza_sql = " SELECT province.* FROM province ";
		$provinciacorrispondenza_sql .= " WHERE province.id_provincia = ".$id_provincia_corrispondenza_contraente;
	}
	$dbh->query($provinciacorrispondenza_sql);
	$dbh->execute();
	$rowsprovinciacorrispondenza = $dbh->resultset();
	foreach ($rowsprovinciacorrispondenza as $rowprovinciacorrispondenza) {
		$nome_provincia_corrispondenza_contraente = $rowprovinciacorrispondenza['nome_provincia'];
	}

	if ($id_comune_corrispondenza_contraente <> "0") {
		$comunecorrispondenza_sql = " SELECT comuni.* FROM comuni ";
		$comunecorrispondenza_sql .= " WHERE comune.id_comune = ".$id_comune_corrispondenza_contraente;
	}
	$dbh->query($comunecorrispondenza_sql);
	$dbh->execute();
	$rowscomunecorrispondenza = $dbh->resultset();
	foreach ($rowscomunecorrispondenza as $rowcomunecorrispondenza) {
		$nome_comune_corrispondenza_contraente = $rowcomunecorrispondenza['nome_comune'];
	}
