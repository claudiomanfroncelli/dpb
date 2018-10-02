<?php include "header.php" ?>
<?php include "inc/inc.utils.php" ?>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!--script type="text/javascript" src="regioni_province_comuni.js"></script-->
<?php
	include_once 'class/Database.class.php';
	$nas = new Database();
?>

    <script type="text/javascript" src="js/regioniprovincecomuni_nascita.js"></script>
    <script type="text/javascript" src="js/regioniprovincecomuni_residenza.js"></script>
    <script type="text/javascript" src="js/regioniprovincecomuni_corrispondenza.js"></script>
    <script type="text/javascript" src="js/compagnie_agenzie_contraenti.js"></script>

    <script src="js/validator.js"></script>
    <style>
        .marroncino {
            background-color: #e6c393;
        }

        .giallino {
            background-color: rgba(251, 250, 21, 0.41);
        }

        .verdino {
            background-color: rgba(157, 251, 117, 0.25);
        }
    </style>


<?php $id_contraente = $_REQUEST['idcont'] ?>
    <script type="text/javascript">
		$(document).ready(function () {
			$("#myTab a").click(function (e) {
				e.preventDefault();
				$(this).tab('show');
			});
		});
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css"
          rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.it.min.js"></script>

    <script>
		$(document).ready(function () {
			$.fn.datepicker.defaults.language = 'it';

			$('.datepicker').datepicker({
				format: "dd-mm-yyyy",
				weekStart: 1,
				maxViewMode: 2,
				todayBtn: "linked",
				clearBtn: true,
				//language: "it",
				daysOfWeekHighlighted: "0,6",
				//calendarWeeks: true,
				todayHighlight: true
			});
		});
    </script>


    <!-- Main jumbotron for a primary marketing message or call to action -->
<?php
// se non arriva l'id_agenzia vuol dire che l'utente ha digitato
//l'indirizzo direttamente sulla barra, e quindi va fermato

	if (isset($id_contraente)) {

		// accedo al db, prelevo i dati della agenzia e creo la maschera
		// per il singolo contraente

		$conf_STR_sql = " SELECT * FROM contraenti ";
		$conf_STR_sql .= " WHERE id_contraente = ".$id_contraente;

		$dbh = new Database();

		$dbh->query($conf_STR_sql);
		$dbh->execute();
		$rows = $dbh->resultset();
		$records = $dbh->rowCount();

		if ($records > 0) {
			foreach ($rows as $row) {

				// estrazione dei dati del contraente da visualizzare

				$id_contraente = $row['id_contraente'];
				$personafisica_contraente = $row['personafisica_contraente'];
				$qualifica_contraente = $row['qualifica_contraente'];
				$cognome_contraente = $row['cognome_contraente'];
				$nome_contraente = $row['nome_contraente'];
				$id_regione_nascita_contraente = $row['id_regione_nascita_contraente'];
				$id_provincia_nascita_contraente = $row['id_provincia_nascita_contraente'];
				$id_comune_nascita_contraente = $row['id_comune_nascita_contraente'];
				$data_nascita_contraente = format_data($row['data_nascita_contraente']);
				$id_tipodocumento_contraente = $row['id_tipodocumento_contraente'];
				$numero_documento_contraente = $row['numero_documento_contraente'];
				$id_regione_residenza_contraente = $row['id_regione_residenza_contraente'];
				$id_provincia_residenza_contraente = $row['id_provincia_residenza_contraente'];
				$id_comune_residenza_contraente = $row['id_comune_residenza_contraente'];
				$cap_residenza_contraente = $row['cap_residenza_contraente'];
				$indirizzo_residenza_contraente = $row['indirizzo_residenza_contraente'];
				$id_regione_corrispondenza_contraente = $row['id_regione_corrispondenza_contraente'];
				$id_provincia_corrispondenza_contraente = $row['id_provincia_corrispondenza_contraente'];
				$id_comune_corrispondenza_contraente = $row['id_comune_corrispondenza_contraente'];
				$cap_corrispondenza_contraente = $row['cap_corrispondenza_contraente'];
				$indirizzo_corrispondenza_contraente = $row['indirizzo_corrispondenza_contraente'];
				$email_contraente = $row['email_contraente'];
				$pec_contraente = $row['pec_contraente'];
				$telefono_fisso_contraente = $row['telefono_fisso_contraente'];
				$mobile_contraente = $row['mobile_contraente'];
				$fax_contraente = $row['fax_contraente'];
				$partita_iva_contraente = $row['partita_iva_contraente'];
				$codice_fiscale_contraente = $row['codice_fiscale_contraente'];
				$privacy_contraente = $row['privacy_contraente'];
				$professione_contraente = $row['professione_contraente'];
				$sito_contraente = $row['sito_contraente'];
				$modulo_7a7b_contraente = $row['modulo_7a7b_contraente'];
				?>

                <div class="jumbotron">
                    <div class="container">
                        <h2><?php echo "Contraente: {$cognome_contraente}  {$nome_contraente}"; ?></h2>
                        <!-- Righe di dettaglio -->
                        <!-- inizio prima riga -->
                        <form id="vedidati" method="post" action="contraente_esistente_aggiornamento.php"
                              data-toggle="validator">
							<?php echo " <input type=\"hidden\" name=\"id_contraente\" value=\"{$id_contraente}\">"; ?>

                            <div class="row">
                                <div class="form-group col-md-2 has-feedback">
                                    <label for="qualificacontraente" class="control-label">Qualifica</label>
                                    <input type="text" class="form-control input-sm"
                                           id="qualificacontraente" name="qualifica_contraente"
                                           placeholder="Qual."
                                           data-minlength="2"
                                           value="<?php echo "{$qualifica_contraente}"; ?>"

                                    >

                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-5 has-feedback">
                                    <label for="cognomecontraente" class="control-label">Ragione sociale
                                        contraente</label>
                                    <input type="text" class="form-control input-sm"
                                           id="cognomecontraente" name="cognome_contraente"
                                           placeholder="Cognome o Ragione Sociale Contraente"
                                           value="<?php echo "{$cognome_contraente}"; ?>"
                                           data-minlength="3"
                                           readonly>

                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-5 has-feedback">
                                    <label for="nomecontraente" class="control-label">Nome
                                        contraente</label>
                                    <input type="text" class="form-control input-sm"
                                           id="nomecontraente" name="nome_contraente"
                                           placeholder="Nome del Contraente"
                                           value="<?php echo "{$nome_contraente}"; ?>"

                                           data-minlength="3"
                                           readonly>

                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-1 has-feedback">
                                    <label for="personafisica" class="control-label">P.fis.</label>
                                    <input type="hidden" name="personafisica_contraente" value="0">
                                    <input type="checkbox" class="form-control input-sm"
                                           id="personafisica"
                                           name="personafisica_contraente"
                                           value="1"
										<?php if ($personafisica_contraente == "1") {
											echo "checked";
										} ?>
                                           readonly>
                                </div>
                                <div class="form-group col-md-1 has-feedback">
                                    <label for="privacy" class="control-label">Privacy</label>
                                    <input type="hidden" name="privacy_contraente" value="0">
                                    <input type="checkbox" class="form-control input-sm"
                                           id="privacy"
                                           name="privacy_contraente"
                                           value="1"
										<?php if ($privacy_contraente == "1") {
											echo "checked";
										} ?>
                                    >
                                </div>
                                <div class="form-group col-md-3 has-feedback">
                                    <label for="piva" class="control-label">P.Iva</label>
                                    <input type="text" class="form-control input-sm"
                                           id="piva" name="partita_iva_contraente"
                                           placeholder="P.Iva"
                                           value="<?php echo "{$partita_iva_contraente}"; ?>"
                                           maxlength="11"
                                           data-minlength="11"
                                    >

                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-4 has-feedback">
                                    <label for="codicefiscale" class="control-label">Codice Fiscale</label>
                                    <input type="text" class="form-control input-sm"
                                           id="codicefiscale" name="codice_fiscale_contraente"
                                           placeholder="Codice Fiscale"
                                           value="<?php echo "{$codice_fiscale_contraente}"; ?>"
                                           maxlength="16"
                                           data-minlength="11"
                                    >

                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="row"> <!-- inizio riga dati nascita ---------------------------------->
                                <div class="giallino col-md-23">
                                    <div class="form-group col-md-3"><br>Nascita</div>
                                    <div class="form-group col-md-4 has-feedback">
                                        <label for="regioninascita" class="control-label">Regione</label>
                                        <select class="form-control input-sm input-sm-small" id="regioninascita"
                                                name="id_regione_nascita_contraente">
											<?php if (isset($id_regione_nascita_contraente) && $id_regione_nascita_contraente <> "0") { ?>
                                                <option value="0">scegli la regione...</option>
												<?php
												$sql_regione = "SELECT * from regioni ORDER BY nome_regione";

												$dbh->query($sql_regione);
												$rowsnascita = $dbh->resultset();

												$recordsregione = $dbh->rowCount();
												if ($recordsregione > 0) {

													foreach ($rowsnascita as $rownascita) {
														$id_regione = $rownascita['id_regione'];
														$nome_regione = utf8_encode($rownascita['nome_regione']);
														?>
                                                        <option
                                                                value="<?php echo $id_regione ?>"
															<?php if ($id_regione_nascita_contraente == $id_regione) {
																echo " SELECTED ";
															} ?>
                                                        ><?php echo $nome_regione ?></option>
													<?php } ?>
												<?php } ?>
											<?php } else {
												echo $dbh->ShowRegioniNascita();
											} ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 has-feedback">
                                        <label for="provincenascita" class="control-label">Provincia</label>
                                        <select class="form-control input-sm input-sm-small" id="provincenascita"
                                                name="id_provincia_nascita_contraente">
											<?php if (isset($id_provincia_nascita_contraente) && $id_provincia_nascita_contraente <> "0") { ?>
                                                <option value="0">scegli la provincia...</option>
												<?php
												$sql_provincianascita = "SELECT * from province WHERE id_regione_provincia = $id_regione_nascita_contraente ORDER BY nome_provincia";

												$dbh->query($sql_provincianascita);
												$rowsnascita = $dbh->resultset();

												$recordsprovincia = $dbh->rowCount();
												if ($recordsprovincia > 0) {

													foreach ($rowsnascita as $rownascita) {
														$id_provincia = $rownascita['id_provincia'];
														$nome_provincia = utf8_encode($rownascita['nome_provincia']);
														?>
                                                        <option
                                                                value="<?php echo $id_provincia ?>"
															<?php if ($id_provincia_nascita_contraente == $id_provincia) {
																echo " SELECTED ";
															} ?>
                                                        ><?php echo $nome_provincia ?></option>
													<?php } ?>
												<?php } ?>
											<?php } else {
												echo "";
											} ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 has-feedback">

                                        <label for="comuninascita" class="control-label">Comune</label>
                                        <select class="form-control input-sm input-sm-small" id="comuninascita"
                                                name="id_comune_nascita_contraente">
											<?php if (isset($id_comune_nascita_contraente) && $id_comune_nascita_contraente <> "0") { ?>
                                                <option value="0">scegli il comune...</option>
												<?php
												$sql_comunenascita = "SELECT * from comuni WHERE id_provincia_comune = $id_provincia_nascita_contraente ORDER BY nome_comune";

												$dbh->query($sql_comunenascita);
												$rowsnascita = $dbh->resultset();

												$records = $dbh->rowCount();
												if ($records > 0) {

													foreach ($rowsnascita as $rownascita) {
														$id_comune = $rownascita['id_comune'];
														$nome_comune = utf8_encode($rownascita['nome_comune']);
														?>
                                                        <option
                                                                value="<?php echo $id_comune ?>"
															<?php if ($id_comune_nascita_contraente == $id_comune) {
																echo " SELECTED ";
															} ?>
                                                        ><?php echo $nome_comune ?></option>
													<?php } ?>
												<?php } ?>
											<?php } else {
												echo "";
											} ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3 has-feedback">
                                        <label for="data_nascita_contraente" class="control-label">Data di
                                            Nascita</label>
                                        <input type="text" class="form-control input-sm datepicker"
                                               id="data_nascita_contraente" name="data_nascita_contraente"
                                               placeholder="Data di Nascita"
                                               value="<?php echo "{$data_nascita_contraente}"; ?>"
                                        >
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-2 has-feedback">
                                        <label for="id_tipodocumento_contraente" class="control-label">Tipo Doc.</label>
                                        <select class="form-control input-sm"
                                                id="id_tipodocumento_contraente"
                                                name="id_tipodocumento_contraente"
                                        >
											<?php
												$sql_tipodoc = "SELECT * from tipodocumento";

												$dbh->query($sql_tipodoc);
												$rowstipodoc = $dbh->resultset();

												$recordstipodoc = $dbh->rowCount();
												if ($recordstipodoc > 0) {

													foreach ($rowstipodoc as $rowtipodoc) {
														$id_tipodocumento = $rowtipodoc['id_tipodocumento'];
														$descrizione_tipodocumento = $rowtipodoc['descrizione_tipodocumento'];
														?>
                                                        <option
                                                                value="<?php echo $id_tipodocumento ?>"
															<?php if ($id_tipodocumento == $id_tipodocumento_contraente) {
																echo " SELECTED ";
															} ?>
                                                        ><?php echo $descrizione_tipodocumento ?></option>
													<?php } ?>
												<?php } ?>
                                        </select>


                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-3 has-feedback">
                                        <label for="numero_documento_contraente" class="control-label">Numero</label>
                                        <input type="text" class="form-control input-sm"
                                               id="numero_documento_contraente" name="numero_documento_contraente"
                                               placeholder="Num.Doc."
                                               value="<?php echo "{$numero_documento_contraente}"; ?>"
                                        >

                                        <div class="help-block with-errors"></div>
                                    </div>

                                </div>
                            </div> <!-- fine riga dati nascita ---------------------------------->

                            <div class="row"> <!-- inizio riga dati residenza ---------------------------------->
                                <div class="verdino col-md-23">

                                    <div class="form-group col-md-3 margintop15">Residenza /<br>Sede Legale</div>
                                    <div class="form-group col-md-4 has-feedback">
                                        <label for="regioniresidenza" class="control-label">Regione</label>
                                        <select class="form-control input-sm input-sm-small" id="regioniresidenza"
                                                name="id_regione_residenza_contraente">
											<?php if (isset($id_regione_residenza_contraente) && $id_regione_residenza_contraente <> "0") { ?>
                                                <option value="0">scegli la regione...</option>
												<?php
												$sql_regione = "SELECT * from regioni ORDER BY nome_regione";

												$dbh->query($sql_regione);
												$rowsresidenza = $dbh->resultset();

												$recordsregione = $dbh->rowCount();
												if ($recordsregione > 0) {

													foreach ($rowsresidenza as $rowresidenza) {
														$id_regione = $rowresidenza['id_regione'];
														$nome_regione = utf8_encode($rowresidenza['nome_regione']);
														?>
                                                        <option
                                                                value="<?php echo $id_regione ?>"
															<?php if ($id_regione_residenza_contraente == $id_regione) {
																echo " SELECTED ";
															} ?>
                                                        ><?php echo $nome_regione ?></option>
													<?php } ?>
												<?php } ?>
											<?php } else {
												echo $dbh->ShowRegioniResidenza();
											} ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 has-feedback">
                                        <label for="provinceresidenza" class="control-label">Provincia</label>
                                        <select class="form-control input-sm input-sm-small" id="provinceresidenza"
                                                name="id_provincia_residenza_contraente">
											<?php if (isset($id_provincia_residenza_contraente) && $id_provincia_residenza_contraente <> "0") { ?>
                                                <option value="0">scegli la provincia...</option>
												<?php
												$sql_provinciaresidenza = "SELECT * from province WHERE id_regione_provincia = $id_regione_residenza_contraente ORDER BY nome_provincia";

												$dbh->query($sql_provinciaresidenza);
												$rowsresidenza = $dbh->resultset();

												$recordsprovincia = $dbh->rowCount();
												if ($recordsprovincia > 0) {

													foreach ($rowsresidenza as $rowresidenza) {
														$id_provincia = $rowresidenza['id_provincia'];
														$nome_provincia = utf8_encode($rowresidenza['nome_provincia']);
														?>
                                                        <option
                                                                value="<?php echo $id_provincia ?>"
															<?php if ($id_provincia_residenza_contraente == $id_provincia) {
																echo " SELECTED ";
															} ?>
                                                        ><?php echo $nome_provincia ?></option>
													<?php } ?>
												<?php } ?>
											<?php } else {
												echo "";
											} ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 has-feedback">

                                        <label for="comuniresidenza" class="control-label">Comune</label>
                                        <select class="form-control input-sm input-sm-small" id="comuniresidenza"
                                                name="id_comune_residenza_contraente">
											<?php if (isset($id_comune_residenza_contraente) && $id_comune_residenza_contraente <> "0") { ?>
                                                <option value="0">scegli il comune...</option>
												<?php
												$sql_comuneresidenza = "SELECT * from comuni WHERE id_provincia_comune = $id_provincia_residenza_contraente ORDER BY nome_comune";

												$dbh->query($sql_comuneresidenza);
												$rowsresidenza = $dbh->resultset();

												$records = $dbh->rowCount();
												if ($records > 0) {

													foreach ($rowsresidenza as $rowresidenza) {
														$id_comune = $rowresidenza['id_comune'];
														$nome_comune = utf8_encode($rowresidenza['nome_comune']);
														?>
                                                        <option
                                                                value="<?php echo $id_comune ?>"
															<?php if ($id_comune_residenza_contraente == $id_comune) {
																echo " SELECTED ";
															} ?>
                                                        ><?php echo $nome_comune ?></option>
													<?php } ?>
												<?php } ?>
											<?php } else {
												echo "";
											} ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2 has-feedback">
                                        <label for="capresidenza" class="control-label">Cap</label>
                                        <input type="text" class="form-control input-sm"
                                               id="capresidenza" placeholder="CAP"
                                               name="cap_residenza_contraente"
                                               value="<?php echo "{$cap_residenza_contraente}"; ?>"
                                        >

                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-6 has-feedback">
                                        <label for="indirizzoresidenza" class="control-label">Indirizzo</label>
                                        <input type="text" class="form-control input-sm"
                                               id="indirizzoresidenza" placeholder="Indirizzo"
                                               name="indirizzo_residenza_contraente"
                                               value="<?php echo "{$indirizzo_residenza_contraente}"; ?>"
                                        >

                                        <div class="help-block with-errors"></div>

                                    </div>
                                </div>
                            </div><!-- fine riga dati residenza ---------------------------------->

                            <div class="row"><!-- inizio riga dati corrispondenza ---------------------------------->
                                <div class="marroncino col-md-23">

                                    <div class="form-group col-md-3 margintop15">Corrispondenza /<br>Sede Operativa
                                    </div>
                                    <div class="form-group col-md-4 has-feedback">
                                        <label for="regionicorrispondenza" class="control-label">Regione</label>
                                        <select class="form-control input-sm input-sm-small" id="regionicorrispondenza"
                                                name="id_regione_corrispondenza_contraente">
											<?php if (isset($id_regione_corrispondenza_contraente) && $id_regione_corrispondenza_contraente <> "0") { ?>
                                                <option value="0">scegli la regione...</option>
												<?php
												$sql_regione = "SELECT * from regioni ORDER BY nome_regione";

												$dbh->query($sql_regione);
												$rowscorrispondenza = $dbh->resultset();

												$recordsregione = $dbh->rowCount();
												if ($recordsregione > 0) {

													foreach ($rowscorrispondenza as $rowcorrispondenza) {
														$id_regione = $rowcorrispondenza['id_regione'];
														$nome_regione = utf8_encode($rowcorrispondenza['nome_regione']);
														?>
                                                        <option
                                                                value="<?php echo $id_regione ?>"
															<?php if ($id_regione_corrispondenza_contraente == $id_regione) {
																echo " SELECTED ";
															} ?>
                                                        ><?php echo $nome_regione ?></option>
													<?php } ?>
												<?php } ?>
											<?php } else {
												echo $dbh->ShowRegioniCorrispondenza();
											} ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 has-feedback">
                                        <label for="provincecorrispondenza" class="control-label">Provincia</label>
                                        <select class="form-control input-sm input-sm-small" id="provincecorrispondenza"
                                                name="id_provincia_corrispondenza_contraente">
											<?php if (isset($id_provincia_corrispondenza_contraente) && $id_provincia_corrispondenza_contraente <> "0") { ?>
                                                <option value="0">scegli la provincia...</option>
												<?php
												$sql_provinciacorrispondenza = "SELECT * from province WHERE id_regione_provincia = $id_regione_corrispondenza_contraente ORDER BY nome_provincia";

												$dbh->query($sql_provinciacorrispondenza);
												$rowscorrispondenza = $dbh->resultset();

												$recordsprovincia = $dbh->rowCount();
												if ($recordsprovincia > 0) {

													foreach ($rowscorrispondenza as $rowcorrispondenza) {
														$id_provincia = $rowcorrispondenza['id_provincia'];
														$nome_provincia = utf8_encode($rowcorrispondenza['nome_provincia']);
														?>
                                                        <option
                                                                value="<?php echo $id_provincia ?>"
															<?php if ($id_provincia_corrispondenza_contraente == $id_provincia) {
																echo " SELECTED ";
															} ?>
                                                        ><?php echo $nome_provincia ?></option>
													<?php } ?>
												<?php } ?>
											<?php } else {
												echo "";
											} ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 has-feedback">

                                        <label for="comunicorrispondenza" class="control-label">Comune</label>
                                        <select class="form-control input-sm input-sm-small" id="comunicorrispondenza"
                                                name="id_comune_corrispondenza_contraente">
											<?php if (isset($id_comune_corrispondenza_contraente) && $id_comune_corrispondenza_contraente <> "0") { ?>
                                                <option value="0">scegli il comune...</option>
												<?php
												$sql_comunecorrispondenza = "SELECT * from comuni WHERE id_provincia_comune = $id_provincia_corrispondenza_contraente ORDER BY nome_comune";

												$dbh->query($sql_comunecorrispondenza);
												$rowscorrispondenza = $dbh->resultset();

												$records = $dbh->rowCount();
												if ($records > 0) {

													foreach ($rowscorrispondenza as $rowcorrispondenza) {
														$id_comune = $rowcorrispondenza['id_comune'];
														$nome_comune = utf8_encode($rowcorrispondenza['nome_comune']);
														?>
                                                        <option
                                                                value="<?php echo $id_comune ?>"
															<?php if ($id_comune_corrispondenza_contraente == $id_comune) {
																echo " SELECTED ";
															} ?>
                                                        ><?php echo $nome_comune ?></option>
													<?php } ?>
												<?php } ?>
											<?php } else {
												echo '';
											} ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 has-feedback">
                                        <label for="capresidenza" class="control-label">Cap</label>
                                        <input type="text" class="form-control input-sm"
                                               id="capcorrispondenza" placeholder="CAP"
                                               name="cap_corrispondenza_contraente"
                                               value="<?php echo "{$cap_corrispondenza_contraente}"; ?>"
                                        >

                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-6 has-feedback">
                                        <label for="indirizzoresidenza" class="control-label">Indirizzo</label>
                                        <input type="text" class="form-control input-sm"
                                               id="indirizzocorrispondenza" placeholder="Indirizzo"
                                               name="indirizzo_corrispondenza_contraente"
                                               value="<?php echo "{$indirizzo_corrispondenza_contraente}"; ?>"
                                        >

                                        <div class="help-block with-errors"></div>

                                    </div>
                                </div>
                            </div><!-- fine riga dati corrispondenza ---------------------------------->

                            <div class="row">
                                <div class="form-group col-md-6 has-feedback">
                                    <label for="email" class="control-label">Email</label>
                                    <input type="email" class="form-control input-sm"
                                           id="email"
                                           name="email_contraente"
                                           placeholder="Email"
                                           value="<?php echo "{$email_contraente}"; ?>"

                                    >
                                    <span class="glyphicon form-control-feedback"
                                          aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-6 has-feedback">
                                    <label for="pec" class="control-label">PEC</label>
                                    <input type="email" class="form-control input-sm"
                                           id="pec"
                                           name="pec_contraente"
                                           placeholder="PEC"
                                           value="<?php echo "{$pec_contraente}"; ?>"

                                    >
                                    <span class="glyphicon form-control-feedback"
                                          aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-3 has-feedback">
                                    <label for="telefono" class="control-label">Telefono
                                        Principale</label>
                                    <input type="tel" class="form-control input-sm"
                                           id="telefono"
                                           placeholder="Telefono"
                                           value="<?php echo "{$telefono_fisso_contraente}"; ?>"
                                           name="telefono_fisso_contraente"
                                           data-minlength="8"
                                    >
                                    <span class="glyphicon form-control-feedback"
                                          aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                                <div class="form-group col-md-3 has-feedback">
                                    <label for="mobile" class="control-label">Mobile
                                        Principale</label>
                                    <input type="tel" class="form-control input-sm"
                                           id="mobile" placeholder="Mobile"
                                           value="<?php echo "{$mobile_contraente}"; ?>"
                                           name="mobile_contraente"
                                           data-minlength="8"
                                    >
                                    <span class="glyphicon form-control-feedback"
                                          aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-3 has-feedback">
                                    <label for="fax" class="control-label">Fax
                                        Principale</label>
                                    <input type="tel" class="form-control input-sm"
                                           id="fax" placeholder="Fax"
                                           value="<?php echo "{$fax_contraente}"; ?>"
                                           name="fax_contraente"
                                           data-minlength="8"
                                    >
                                    <span class="glyphicon form-control-feedback"
                                          aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div><!-- fine seconda riga -->

                            <div class=row>
                                <div class="form-group col-md-5 has-feedback">
                                    <label for="professione"
                                           class="control-label">Professione</label>
                                    <input type="text" class="form-control input-sm"
                                           id="professione" name="professione_contraente"
                                           placeholder="Professione"
                                           value="<?php echo "{$professione_contraente}"; ?>"

                                    >
                                    <span class="glyphicon form-control-feedback"
                                          aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-6 has-feedback">
                                    <label for="sito" class="control-label">Sito</label>
                                    <input type="text" class="form-control input-sm"
                                           id="sito" name="sito_contraente"
                                           placeholder="Sito"
                                           value="<?php echo "{$sito_contraente}"; ?>"

                                    >
                                    <span class="glyphicon form-control-feedback"
                                          aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-1 has-feedback">
                                    <label for="modulo7a7b" class="control-label">7a7b</label>
                                    <input type="hidden" name="modulo_7a7b_contraente" value="0">
                                    <input type="checkbox" class="form-control input-sm"
                                           id="modulo7a7b"
                                           name="modulo_7a7b_contraente"
                                           value="1"
										<?php if ($modulo_7a7b_contraente == "1") {
											echo "checked";
										} ?>
                                    >
                                </div>
                                <div class="col-md-5"></div>
                                <div class="form-group col-md-5">
                                    <label for="azioni">Azioni</label>
                                    <div class="form-group btn-group btn-block" id="azioni">
                                        <!-- un pulsante per chiudere la finestra -->
                                        <button
                                                class="btn btn-danger btn-sm" type="submit"
                                        >Aggiorna
                                        </button>
                                        <button type="reset"
                                                class="btn btn-default btn-sm"
                                                id="reset"
                                        >Reset
                                        </button>
                                        <input type="button" onclick="window.close();"
                                               value="chiudi" data-toggle="tooltip" title="Chiudi la finestra"
                                               class="btn btn-sm btn-success">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!-- fine prima riga -->
                </div>

			<?php } ?>

		<?php } else {
			echo "Non trovo il contraente cercato";
			die();
		} ?>

        <!-- finita la testata della agenzia, comincia la sezione TAB -->

        <div class="container">

            <ul class="nav nav-pills" id="myTab">
                <li class="active"><a href="#tab1" data-toggle="pill">Polizze</a></li>
                <li><a href="#tab2" data-toggle="pill">Premi</a></li>
                <li><a href="#tab3" data-toggle="pill">Sinistri</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
					<?php include "polizze_lista.php" ?>
                </div>
                <div class="tab-pane" id="tab2">
					<?php include("premi_lista.php"); ?>
                </div>
                <div class="tab-pane" id="tab3">
					<?php include("sinistri_lista.php"); ?>
                </div>
            </div>
        </div>
		<?php
		$dbh = null;
	} else {
		header('Location: operazione_non_consentita.php');
		die();

	} ?>
    <!--================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/validator.js"></script>

<?php include "footer.php" ?>