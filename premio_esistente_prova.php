<?php include_once "header.php" ?>
<?php include_once "inc/inc.utils.php";//serve per la formattazione della data e dei numeri?>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script type="text/javascript" src="js/compagnie_agenzie_mandati.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="js/jquery-ui.min.js"></script>

    <script src="js/validator.js"></script>

<?php $id_premio = $_REQUEST['idprem'] ?>


    <!-- Main jumbotron for a primary marketing message or call to action -->
<?php
// se non arriva l'id_agenzia vuol dire che l'utente ha digitato
//l'indirizzo direttamente sulla barra, e quindi va fermato
	if (isset($id_premio)) {
		// accedo al db, prelevo i dati della agenzia e creo la maschera
		// per la singola agenzia
		$conf_STR_sql = " SELECT premi.* FROM premi ";
		$conf_STR_sql .= " WHERE id_premio = ".$id_premio;

		include_once "class/Database.class.php";
		$dbh = new Database();

		$dbh->query($conf_STR_sql);
		$dbh->execute();
		$rows = $dbh->resultset();
		foreach ($rows as $row) {
			// loop sui record presenti in tabella
			// estrazione dei record tramite ciclo while
			//$id_contraente                     = $row['id_contraente'];
			$id_polizza_premio = $row['id_polizza_premio'];
			$scadenza_premio = format_data($row['scadenza_premio']);
			$importo_lordo_premio = formato_italiano($row['importo_lordo_premio']);
			$importo_netto_premio = formato_italiano($row['importo_netto_premio']);
			$modalita_pagamento_premio = $row['modalita_pagamento_premio'];
			$rata_premio = $row['rata_premio'];
			$pagato_il_premio = format_data($row['pagato_il_premio']);
			$data_incasso_premio = format_data($row['data_incasso_premio']);
			$provv_liquidata_premio = formato_italiano($row['provv_liquidata_premio']);
			$provv_da_liquidare_premio = formato_italiano($row['provv_da_liquidare_premio']);
			$data_liquidata_premio = format_data($row['data_liquidata_premio']);
			?>

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
                <div class="container">
                    <!-- Righe di dettaglio -->
                    <!-- inizio prima riga -->
                    <form id="vedipremio"
                          method="post"
                          action="#"
                          data-toggle="validator">
						<?php echo " <input type=\"hidden\" name=\"id_premio\" value={$id_premio}>"; ?>

                        <div class="row">
                            <h1 class="col-md-10">Dati Singolo Premio</h1>
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
                    <li class="active"><a href="#tab1" data-toggle="pill">Premi</a></li>
                    <li><a href="#tab2" data-toggle="pill">Sinistri</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane  active" id="tab1">
						<?php include("premi_lista.php") ?>
                    </div>
                    <div class="tab-pane" id="tab2">
						<?php include("sinistri_lista.php"); ?>
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