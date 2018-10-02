<?php include_once "header.php" ?>
<?php include_once "inc/inc.utils.php";//serve per la formattazione della data e dei numeri?>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script type="text/javascript" src="js/compagnie_agenzie_mandati.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="js/jquery-ui.min.js"></script>

    <script src="js/validator.js"></script>

<?php
	$id_polizza = $_REQUEST['idpol'];
	$id_premio = $_REQUEST['idprem'] ?>

    <script type="text/javascript">
		$(document).ready(function () {
			$("#myTab a").click(function (e) {
				e.preventDefault();
				$(this).tab('show');
			});
		});
    </script>

    <!-- Main jumbotron for a primary marketing message or call to action -->
<?php
// se non arriva l'id_agenzia vuol dire che l'utente ha digitato
//l'indirizzo direttamente sulla barra, e quindi va fermato
	if (isset($id_premio)) {
		// accedo al db, prelevo i dati della agenzia e creo la maschera
		// per la singola agenzia
		$conf_STR_sql = " SELECT compagnie.id_compagnia, compagnie.ragione_sociale_compagnia, agenzie.id_agenzia, ";
		$conf_STR_sql .= "  agenzie.ragione_sociale_agenzia, contraenti.id_contraente, contraenti.cognome_contraente, ";
		$conf_STR_sql .= "  contraenti.nome_contraente, descrizione_tipoappendice, descrizione_frazionamento, ";
		$conf_STR_sql .= "  polizze.* FROM polizze ";
		$conf_STR_sql .= "  LEFT JOIN compagnie ON polizze.id_compagnia_polizza = compagnie.id_compagnia ";
		$conf_STR_sql .= "  LEFT JOIN agenzie ON polizze.id_agenzia_polizza = agenzie.id_agenzia ";
		$conf_STR_sql .= "  LEFT JOIN contraenti ON polizze.id_contraente_polizza = contraenti.id_contraente ";
		$conf_STR_sql .= "  LEFT JOIN tipoappendice ON polizze.id_tipoappendice_polizza = tipoappendice.id_tipoappendice ";
		$conf_STR_sql .= "  LEFT JOIN frazionamenti ON polizze.id_frazionamento_polizza = frazionamenti.id_frazionamento ";
		$conf_STR_sql .= " WHERE polizze.id_polizza = ".$id_polizza;

		include_once "class/Database.class.php";
		$dbh = new Database();

		$dbh->query($conf_STR_sql);
		$dbh->execute();
		$rows = $dbh->resultset();
		foreach ($rows as $row) {
			// loop sui record presenti in tabella
			// estrazione dei record tramite ciclo while
			$id_contraente = $row['id_contraente'];
			$cognome_contraente = $row['cognome_contraente'];
			$nome_contraente = $row['nome_contraente'];
			$id_compagnia = $row['id_compagnia'];
			$ragione_sociale_compagnia = $row['ragione_sociale_compagnia'];
			$id_agenzia = $row['id_agenzia'];
			$ragione_sociale_agenzia = $row['ragione_sociale_agenzia'];
			$numero_polizza = $row['numero_polizza'];
			$decorrenza_polizza = format_data($row['decorrenza_polizza']);
			$scadenza_polizza = format_data($row['scadenza_polizza']);
			$inizio_copertura_polizza = format_data($row['inizio_copertura_polizza']);
			$fine_copertura_polizza = format_data($row['fine_copertura_polizza']);
			$numero_sostituita_polizza = $row['numero_sostituita_polizza'];
			$data_sostituzione_polizza = format_data($row['data_sostituzione_polizza']);
			$ramo_agenzia_polizza = $row['ramo_agenzia_polizza'];
			$id_tiporischio_polizza = $row['id_tiporischio_polizza'];
			$id_frazionamento_polizza = $row['id_frazionamento_polizza'];
			$descrizione_frazionamento_polizza = $row['descrizione_frazionamento'];
			$capitolato_polizza = $row['capitolato_polizza'];
			$massimale_annuo_polizza = formato_italiano($row['massimale_annuo_polizza']);
			$tacito_rinnovo_polizza = $row['tacito_rinnovo_polizza'];
			$proroga_servizio_polizza = $row['proroga_servizio_polizza'];
			$termine_primo_premio_polizza = format_data($row['termine_primo_premio_polizza']);
			$mora_altre_scadenze_polizza = $row['mora_altre_scadenze_polizza'];
			$provvigioni_broker_polizza = formato_italiano($row['provvigioni_broker_polizza']);
			$regolazione_premio_polizza = $row['regolazione_premio_polizza'];
			$giorni_denuncia_sinistro_polizza = $row['giorni_denuncia_sinistro_polizza'];
			$stato_polizza = $row['stato_polizza'];
			$id_mandato_polizza = $row['id_mandato_polizza'];
			$accordo_collaborazione_polizza = $row['accordo_collaborazione_polizza'];
			$totale_imponibile_polizza = formato_italiano($row['totale_imponibile_polizza']);
			$totale_lordo_polizza = formato_italiano($row['totale_lordo_polizza']);
			$ssn_polizza = formato_italiano($row['ssn_polizza']);
			$imposte_polizza = formato_italiano($row['imposte_polizza']);
			$premio_netto_polizza = formato_italiano($row['premio_netto_polizza']);
			$accessori_polizza = formato_italiano($row['accessori_polizza']);
			$cig_polizza = $row['cig_polizza'];
			$maxrcsinistro_polizza = formato_italiano($row['maxrcsinistro_polizza']);
			$maxrcpersona_polizza = formato_italiano($row['maxrcpersona_polizza']);
			$maxrccoseanimali_polizza = formato_italiano($row['maxrccoseanimali_polizza']);
			$appendice_polizza = $row['appendice_polizza'];//manca nella maschera
			$id_tipoappendice_polizza = $row['id_tipoappendice_polizza'];//manca nella maschera
			$descrizione_tipoappendice_polizza = $row['descrizione_tipoappendice'];//manca nella maschera
			$franchigia_polizza = $row['franchigia_polizza'];//manca nella maschera
			$scoperto_polizza = $row['scoperto_polizza'];//manca nella maschera
			$retroattiva_polizza = $row['retroattiva_polizza'];//manca nella maschera
			$postuma_polizza = $row['postuma_polizza'];//manca nella maschera
			$targa_auto_polizza = $row['targa_auto_polizza'];
			$incendio_furto_polizza = $row['incendio_furto_polizza'];
			?>

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
                <div class="container">
                    <!-- Righe di dettaglio -->
                    <!-- inizio prima riga -->
                    <form id="vedipolizza"
                          method="post"
                          action="#"
                          data-toggle="validator">
						<?php echo " <input type=\"hidden\" name=\"id_polizza\" value={$id_polizza}>"; ?>
						<?php echo " <input type=\"hidden\" name=\"numeropolizza\" value={$numero_polizza}>"; ?>

                        <div class="row">
                            <h1 class="col-md-10">Polizza Numero</h1>
                            <div class="margintop30 col-md-3 has-feedback">
                                <label for="numero_polizza"
                                       class="control-label">Numero</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="numero_polizza"
                                       name="numero_polizza"
                                       maxlength="30"
                                       value="<?php echo "{$numero_polizza}"; ?>"
                                       readonly>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="margintop30 col-md-2 has-feedback">
                                <label for="appendice_polizza"
                                       class="control-label">Appendice</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="appendice_polizza"
                                       name="appendice_polizza"
                                       placeholder="Numero Appendice"
                                       maxlength="20"
                                       value="<?php echo "{$appendice_polizza}"; ?>"
                                       readonly>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="margintop30 form-group col-md-2 has-feedback grassetto">
                                <label for="id_tipoappendice_polizza"
                                       class="control-label">Tipo</label>
                                <select class="form-control input-sm" id="tipoappendice_polizza"
                                        name="id_tipoappendice_polizza" readonly>
									<?php
										$sql_tipoappendice = "SELECT * from tipoappendice";

										$dbh->query($sql_tipoappendice);
										$rowstipoappendice = $dbh->resultset();

										$recordstipoappendice = $dbh->rowCount();
										if ($recordstipoappendice > 0) {

											foreach ($rowstipoappendice as $rowtipoappendice) {
												$id_tipoappendice = $rowtipoappendice['id_tipoappendice'];
												$descrizione_tipoappendice = $rowtipoappendice['descrizione_tipoappendice'];
												?>
                                                <option
                                                        value="<?php echo $id_tipoappendice_polizza ?>"
													<?php if ($id_tipoappendice == $id_tipoappendice_polizza) {
														echo " SELECTED ";
													} ?>
                                                ><?php echo $descrizione_tipoappendice ?></option>
											<?php } ?>
										<?php } ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-3 margintop30 has-feedback">
                                <label for="numero_sostituita_polizza"
                                       class="control-label">Polizza
                                    sostituita</label>
                                <div class="input-group">

                                    <input type="text"
                                           class="form-control input-sm"
                                           id="numero_sostituita_polizza"
                                           name="numero_sostituita_polizza"
                                           placeholder="Numero Polizza sostituita"
                                           value="<?php echo "{$numero_sostituita_polizza}"; ?>"
                                           readonly>
                                    <span class="glyphicon form-control-feedback"
                                          aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-4 margintop30 has-feedback">
                                <label for="data_sostituzione_polizza"
                                       class="control-label">Data sostituzione</label>

                                <div class="input-group">
                                    <span class="input-group-addon">Il</span>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="data_sostituzione_polizza"
                                           name="data_sostituzione_polizza"
                                           placeholder="Data di sostituzione"
                                           value="<?php echo "{$data_sostituzione_polizza}"; ?>"
                                           readonly>
                                </div>
                                <div class="help-block with-errors"></div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 has-feedback grassetto">
                                <label for="compagnie"
                                       class="control-label">Compagnia</label>
                                <input class="form-control"
                                       id="compagnie"
                                       name="compagnia_polizza"
                                       value="<?php echo "{$ragione_sociale_compagnia}"; ?>"
                                       readonly>

                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-4 has-feedback grassetto">
                                <label for="agenzie"
                                       class="control-label">Agenzia</label>
                                <input class="form-control"
                                       id="agenzie"
                                       name="agenzia_polizza"
                                       value="<?php echo "{$ragione_sociale_agenzia}"; ?>"
                                       readonly>

                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-md-4 has-feedback">
                                <label for="id_mandato_polizza"
                                       class="control-label">Mandato</label>
                                <select class="form-control input-sm"
                                        id="id_mandato_polizza"
                                        name="id_mandato_polizza"
                                        readonly>
									<?php
										$sql_mandato = "SELECT * from mandati";

										$dbh->query($sql_mandato);
										$rowsmandato = $dbh->resultset();

										$recordsmandato = $dbh->rowCount();
										if ($recordsmandato > 0) {

											foreach ($rowsmandato as $rowmandato) {
												$id_mandato = $rowmandato['id_mandato'];
												$identificativo_mandato = $rowmandato['identificativo_mandato'];
												?>
                                                <option
                                                        value="<?php echo $id_mandato ?>"
													<?php if ($id_mandato == $id_mandato_polizza) {
														echo " SELECTED ";
													} ?>
                                                ><?php echo $identificativo_mandato ?></option>
											<?php } ?>
										<?php } ?>
                                </select>

                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group col-md-4 has-feedback">
                                <label for="id_tiporischio_polizza"
                                       class="control-label">Tipologia Rischio</label>
                                <select class="form-control input-sm" id="id_tiporischio_polizza"
                                        name="id_tiporischio_polizza"
                                        readonly>
									<?php
										$sql_tiporischio = "SELECT * from tiporischio";

										$dbh->query($sql_tiporischio);
										$rowstiporischio = $dbh->resultset();

										$recordstiporischio = $dbh->rowCount();
										if ($recordstiporischio > 0) {

											foreach ($rowstiporischio as $rowtiporischio) {
												$id_tiporischio = $rowtiporischio['id_tiporischio'];
												$descrizione_tiporischio = $rowtiporischio['descrizione_tiporischio'];
												?>
                                                <option
                                                        value="<?php echo $id_tiporischio ?>"
													<?php if ($id_tiporischio == $id_tiporischio_polizza) {
														echo " SELECTED ";
													} ?>
                                                ><?php echo $descrizione_tiporischio ?></option>
											<?php } ?>
										<?php } ?>
                                </select>
                                <span class="glyphicon form-control-feedback"
                                      aria-hidden="true"
                                ></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-5 has-feedback grassetto">
                                <label for="contraenti"
                                       class="control-label">Contraente</label>
                                <input class="form-control"
                                       id="contraenti"
                                       name="contraente_polizza"
                                       value="<?php echo "{$cognome_contraente} {$nome_contraente}"; ?>"
                                       readonly>

                                <div class="help-block with-errors"></div>
                            </div>

                        </div><!-- fine prima riga -->

                        <div class="row">
                            <div class="col-md-3 has-feedback">
                                <label for="decorrenza_polizza">Decorrenza</label>

                                <div class="input-group">
                                    <span class="input-group-addon">Il</span>


                                    <input type="text"
                                           id="decorrenza_polizza"
                                           name="decorrenza_polizza"
                                           class="form-control input-sm"
                                           aria-label="ds"
                                           placeholder="Giorno/Ora"
                                           value="<?php echo "{$decorrenza_polizza}"; ?>"
                                           readonly>

                                </div>
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="col-md-3 has-feedback">
                                <label for="scadenza_polizza">Scadenza</label>

                                <div class="input-group">
                                    <span class="input-group-addon">Il</span>


                                    <input type="text"
                                           id="scadenza_polizza"
                                           name="scadenza_polizza"
                                           class="form-control input-sm"
                                           aria-label="ds"
                                           placeholder="Giorno/Ora"
                                           value="<?php echo "{$scadenza_polizza}"; ?>"
                                           readonly>

                                </div>
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="col-md-3 has-feedback">
                                <label for="inizio_copertura_polizza"
                                       class="control-label">Inizio Copertura</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Il</span>

                                    <input type="text"
                                           class="form-control input-sm"
                                           id="inizio_copertura_polizza"
                                           name="inizio_copertura_polizza"
                                           placeholder="Giorno/Ora"
                                           value="<?php echo "{$inizio_copertura_polizza}"; ?>"
                                           readonly>

                                </div>
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="col-md-3 has-feedback">
                                <label for="fine_copertura_polizza"
                                       class="control-label">Fine Copertura</label>

                                <div class="input-group">
                                    <span class="input-group-addon">Il</span>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="fine_copertura_polizza"
                                           name="fine_copertura_polizza"
                                           placeholder="Giorno/Ora"
                                           value="<?php echo "{$fine_copertura_polizza}"; ?>"
                                           readonly>

                                </div>
                                <div class="help-block with-errors"></div>

                            </div>

                            <div class="form-group col-md-4 has-feedback">
                                <label for="id_frazionamento_polizza"
                                       class="control-label">Frazionamento</label>
                                <select class="form-control input-sm"
                                        id="frazionamenti"
                                        name="id_frazionamento_polizza"
                                        readonly>
									<?php
										$sql_frazionamento = "SELECT * from frazionamenti";

										$dbh->query($sql_frazionamento);
										$rowsfrazionamento = $dbh->resultset();

										$recordsfrazionamento = $dbh->rowCount();
										if ($recordsfrazionamento > 0) {

											foreach ($rowsfrazionamento as $rowfrazionamento) {
												$id_frazionamento = $rowfrazionamento['id_frazionamento'];
												$descrizione_frazionamento = $rowfrazionamento['descrizione_frazionamento'];
												?>
                                                <option
                                                        value="<?php echo $id_frazionamento ?>"
													<?php if ($id_frazionamento == $id_frazionamento_polizza) {
														echo " SELECTED ";
													} ?>
                                                ><?php echo $descrizione_frazionamento ?></option>
											<?php } ?>
										<?php } ?>
                                </select>
                                <span class="glyphicon form-control-feedback"
                                      aria-hidden="true"
                                ></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-3 has-feedback">
                                <label for="targa_auto_polizza"
                                       class="control-label">Targa Auto</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="targa_auto_polizza"
                                       placeholder="Targa"
                                       name="targa_auto_polizza"
                                       value="<?php echo "{$targa_auto_polizza}"; ?>"
                                >
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-md-2 has-feedback">
                                <label for="incendio_furto_polizza"
                                       class="control-label">Inc./furto</label>
                                <input type="hidden"
                                       name="incendio_furto_polizza"
                                       value="0">
                                <input type="checkbox"
                                       class="form-control input-sm"
                                       id="incendio_furto_polizza"
                                       name="incendio_furto_polizza"
                                       value="1"
                                       value="<?php echo "{$incendio_furto_polizza}"; ?>"
									<?php if ($incendio_furto_polizza == "1") {
										echo "checked";
									} ?>
                                       readonly>
                            </div>

                            <div class="form-group col-md-2 has-feedback">
                                <label for="proroga_servizio"
                                       class="control-label">Proroga
                                </label>
                                <input type="hidden"
                                       name="proroga_servizio"
                                       value="0">
                                <input type="checkbox"
                                       class="form-control input-sm"
                                       id="proroga_servizio"
                                       name="proroga_servizio_polizza"
                                       value="1"
                                       value="<?php echo "{$proroga_servizio_polizza}"; ?>"
									<?php if ($proroga_servizio_polizza == "1") {
										echo "checked";
									} ?>
                                       readonly>
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group col-md-1 has-feedback">
                                <label for="tacitorinnovo"
                                       class="control-label">Rinnovo</label>
                                <input type="hidden"
                                       name="tacito_rinnovo"
                                       value="0">
                                <input type="checkbox"
                                       class="form-control input-sm"
                                       id="tacito_rinnovo"
                                       name="tacito_rinnovo_polizza"
                                       value="1"
                                       value="<?php echo "{$tacito_rinnovo_polizza}"; ?>"
									<?php if ($tacito_rinnovo_polizza == "1") {
										echo "checked";
									} ?>
                                       readonly>
                                <div class="help-block with-errors"></div>

                            </div>

                        </div>


                        <div class="row">
                            <div class="form-group col-md-3 has-feedback">
                                <label for="ramo_agenzia_polizza"
                                       class="control-label">Ramo</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="ramo_agenzia_polizza"
                                       placeholder="Ramo"
                                       name="ramo_agenzia_polizza"
                                       value="<?php echo "{$ramo_agenzia_polizza}"; ?>"
                                       readonly>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-3 has-feedback">
                                <label for="stato_polizza"
                                       class="control-label">Stato Polizza</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="stato_polizza"
                                       name="stato_polizza"
                                       placeholder="stato Polizza"
                                       maxlength="30"
                                       value="<?php echo "{$stato_polizza}"; ?>"
                                       readonly>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-md-3 has-feedback">
                                <label for="accordo_collaborazione_polizza"
                                       class="control-label">Accordo Coll.ne</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="accordo_collaborazione_polizza"
                                       placeholder="accordo di coll."
                                       name="accordo_collaborazione_polizza"
                                       maxlength="10"
                                       value="<?php echo "{$accordo_collaborazione_polizza}"; ?>"
                                       readonly>
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group col-md-2 has-feedback">

                                <label for="capitolato_polizza"
                                       class="control-label">Capitolato</label>
                                <select class="form-control input-sm"
                                        id="capitolato_polizza"
                                        name="capitolato_polizza"
                                        readonly>
                                    <option value="..." <?php if ($capitolato_polizza == "...") echo "selected"; ?> >
                                        ...
                                    </option>
                                    <option value="si" <?php if ($capitolato_polizza == "si") echo "selected"; ?> >Si
                                    </option>
                                    <option value="no" <?php if ($capitolato_polizza == "no") echo "selected"; ?> >No
                                    </option>
                                </select>
                                <div class="help-block with-errors"></div>

                            </div>

                            <div class="form-group col-md-3 has-feedback">

                                <label for="cig_polizza"
                                       class="control-label">C.I.G.</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="cig_polizza"
                                       placeholder="cig"
                                       name="cig_polizza"
                                       maxlength="10"
                                       value="<?php echo "{$cig_polizza}"; ?>"
                                       readonly>
                                <div class="help-block with-errors"></div>

                            </div>

                            <div class="form-group col-md-2 has-feedback">
                                <label for="regolazione_premio_polizza"
                                       class="control-label">Reg.premio</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="regolazione_premio_polizza"
                                       placeholder="Regolazione premio"
                                       name="regolazione_premio_polizza"
                                       value="<?php echo "{$regolazione_premio_polizza}"; ?>"

                                       readonly>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-2 has-feedback">
                                <label for="giorni_denuncia_sinistro_polizza"
                                       class="control-label">Gg.sinistro</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="giorni_denuncia_sinistro_polizza"
                                       placeholder="Giorni denuncia sinistro"
                                       name="giorni_denuncia_sinistro_polizza"
                                       value="<?php echo "{$giorni_denuncia_sinistro_polizza}"; ?>"

                                       readonly>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-2 has-feedback">
                                <label for="franchigia_polizza"
                                       class="control-label">Franchigia(€)</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="franchigia_polizza"
                                       placeholder="Franchigia"
                                       name="franchigia_polizza"
                                       value="<?php echo "{$franchigia_polizza}"; ?>"
                                >
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-2 has-feedback">
                                <label for="scoperto_polizza"
                                       class="control-label">Scoperto(%)</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="scoperto_polizza"
                                       placeholder="Scoperto"
                                       name="scoperto_polizza"
                                       value="<?php echo "{$scoperto_polizza}"; ?>"
                                >
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-1 has-feedback">
                                <label for="mora_altre_scadenze_polizza"
                                       class="control-label">Mora</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="mora_altre_scadenze_polizza"
                                       placeholder="Mora scadenze"
                                       name="mora_altre_scadenze_polizza"
                                       value="<?php echo "{$mora_altre_scadenze_polizza}"; ?>"
                                       readonly>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="col-lg-4 has-feedback">
                                <label for="termine_primo_premio_polizza"
                                       class="control-label">Termine pag. primo
                                    premio</label>

                                <div class="input-group">
                                    <span class="input-group-addon">Il</span>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="termine_primo_premio_polizza"
                                           name="termine_primo_premio_polizza"
                                           placeholder="Giorno/Ora"
                                           value="<?php echo "{$termine_primo_premio_polizza}"; ?>"
                                           readonly>

                                </div>
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group col-md-2 has-feedback">
                                <label for="provvigioni_broker_polizza"
                                       class="control-label">Provv.broker</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="provvigioni_broker_polizza"
                                       placeholder="Provvigioni broker"
                                       name="provvigioni_broker_polizza"
                                       value="<?php echo "{$provvigioni_broker_polizza}"; ?>"

                                       readonly>
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group col-md-3 has-feedback">
                                <label for="maxrcsinistro_polizza"
                                       class="control-label">Max RC Sin</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="maxrcsinistro_polizza"
                                       placeholder="Max RC Sinistro"
                                       name="maxrcsinistro_polizza"
                                       value="<?php echo "{$maxrcsinistro_polizza}"; ?>"
                                       readonly>
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group col-md-3 has-feedback">
                                <label for="maxrcpersona_polizza"
                                       class="control-label">Max RC Pers</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="maxrcpersona_polizza"
                                       placeholder="Max RC Pers"
                                       name="maxrcpersona_polizza"
                                       value="<?php echo "{$maxrcpersona_polizza}"; ?>"
                                       readonly>
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group col-md-3 has-feedback">
                                <label for="maxrccoseanimali_polizza"
                                       class="control-label">Max RC cose/animali</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="maxrccoseanimali_polizza"
                                       placeholder="Max RC cose/animali"
                                       name="maxrccoseanimali_polizza"
                                       value="<?php echo "{$maxrccoseanimali_polizza}"; ?>"
                                       readonly>
                                <div class="help-block with-errors"></div>

                            </div>

                            <div class="form-group col-md-3 has-feedback">
                                <label for="massimale_annuo_polizza"
                                       class="control-label">Max Tot.Annuo</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="massimale_annuo_polizza"
                                       placeholder="Massimale Annuo"
                                       name="massimale_annuo_polizza"
                                       maxlength="15"
                                       value="<?php echo "{$massimale_annuo_polizza}"; ?>"
                                       readonly>
                                <div class="help-block with-errors"></div>

                            </div>
                        </div><!-- fine riga -->

                        <!-- nuova riga per i campi aggiunti ---------------------------->

                        <div class="row">
                            <div class="form-group col-md-3 has-feedback">
                                <label for="premio_netto_polizza"
                                       class="control-label">Premio Netto</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="premio_netto_polizza"
                                       placeholder="Premio netto"
                                       name="premio_netto_polizza"
                                       maxlength="10"
                                       value="<?php echo "{$premio_netto_polizza}"; ?>"
                                       readonly>
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group col-md-2 has-feedback">
                                <label for="accessori_polizza"
                                       class="control-label">Accessori</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="accessori_polizza"
                                       placeholder="accessori"
                                       name="accessori_polizza"
                                       maxlength="10"
                                       value="<?php echo "{$accessori_polizza}"; ?>"
                                       readonly>
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group col-md-2 has-feedback">

                                <label for="imposte_polizza"
                                       class="control-label">Imposte</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="imposte_polizza"
                                       placeholder="Imposte"
                                       name="imposte_polizza"
                                       maxlength="10"
                                       value="<?php echo "{$imposte_polizza}"; ?>"
                                       readonly>
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group col-md-2 has-feedback">
                                <label for="ssn_polizza"
                                       class="control-label">SSN</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="ssn_polizza"
                                       placeholder="SSN"
                                       name="ssn_polizza"
                                       maxlength="15"
                                       value="<?php echo "{$ssn_polizza}"; ?>"
                                       readonly>
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group col-md-3 has-feedback">
                                <label for="totale_imponibile_polizza"
                                       class="control-label">Totale Imponibile</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="totale_imponibile_polizza"
                                       placeholder="Totale Imponibile"
                                       name="totale_imponibile_polizza"
                                       maxlength="15"
                                       value="<?php echo "{$totale_imponibile_polizza}"; ?>"
                                       readonly>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-md-3 has-feedback">
                                <label for="totale_lordo_polizza"
                                       class="control-label">Totale Lordo</label>
                                <input type="text"
                                       class="form-control input-sm"
                                       id="totale_lordo_polizza"
                                       placeholder="Totale Lordo"
                                       name="totale_lordo_polizza"
                                       maxlength="15"
                                       value="<?php echo "{$totale_lordo_polizza}"; ?>"
                                       readonly>
                                <div class="help-block with-errors"></div>


                            </div>
                            <div class="form-group col-md-2 has-feedback">
                                <label for="retroattiva_polizza"
                                       class="control-label">Retroattiva</label>
                                <select class="form-control input-sm"
                                        id="retroattiva"
                                        name="retroattiva_polizza">
									<?php
										$sql_retroattiva = "SELECT descrizione_retroattiva from retroattiva";

										$dbh->query($sql_retroattiva);
										$rowsretroattiva = $dbh->resultset();

										$recordsretroattiva = $dbh->rowCount();
										if ($recordsretroattiva > 0) {

											foreach ($rowsretroattiva as $rowretroattiva) {
												$descrizione_retroattiva = $rowretroattiva['descrizione_retroattiva'];
												?>
                                                <option
                                                        value="<?php echo $descrizione_retroattiva ?>"
													<?php if ($descrizione_retroattiva == $retroattiva_polizza) {
														echo " SELECTED ";
													} ?>
                                                ><?php echo $descrizione_retroattiva ?></option>
											<?php } ?>
										<?php } ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-2 has-feedback">
                                <label for="postuma_polizza"
                                       class="control-label">Postuma</label>
                                <select class="form-control input-sm"
                                        id="postuma"
                                        name="postuma_polizza">
									<?php
										$sql_postuma = "SELECT descrizione_postuma from postuma";

										$dbh->query($sql_postuma);
										$rowspostuma = $dbh->resultset();

										$recordspostuma = $dbh->rowCount();
										if ($recordspostuma > 0) {

											foreach ($rowspostuma as $rowpostuma) {
												$descrizione_postuma = $rowpostuma['descrizione_postuma'];
												?>
                                                <option
                                                        value="<?php echo $descrizione_postuma ?>"
													<?php if ($descrizione_postuma == $postuma_polizza) {
														echo " SELECTED ";
													} ?>
                                                ><?php echo $descrizione_postuma ?></option>
											<?php } ?>
										<?php } ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <label for="azioni">Azioni</label>
                            <div class="form-group btn-group col-md-5" id="azioni">
                                <!-- un pulsante per aggiornare i dati della compagnia -->
                                <input type="button" onclick="window.close();"
                                       value="chiudi" data-toggle="tooltip" title="Chiudi la finestra"
                                       class="btn btn-sm btn-success">
                                <a href="polizza_esistente_modifica.php?idpol=<?php echo "{$id_polizza}" ?>"
                                   class="btn btn-warning btn-sm" data-toggle="tooltip"
                                   title="Modifica Polizza"
                                   role="button" target="_blank">M</a>
                            </div>
                        </div><!-- fine prima riga -->
                    </form><!-- fine form -->
                </div><!-- fine container -->
            </div><!-- fine jumbotron -->
            <div class="container">

                <ul class="nav nav-pills" id="myTab">
                    <li class="active"><a href="#tab1" data-toggle="pill">Dati Singolo Premio</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane  active" id="tab1">
						<?php include("premio_singolo_modifica.php") ?>
                    </div>
                </div>
            </div>

			<?php
		}
		$dbh = null;
	} else {
		header('Location: operazione_non_consentita.php');
		die();

	} ?>
    <!--================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<?php include "footer.php" ?>