<?php include "header.php" ?>
<?php include "inc/inc.utils.php" ?>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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

    <!-- Main jumbotron for a primary marketing message or call to action -->
<?php
// se non arriva l'id_agenzia vuol dire che l'utente ha digitato
//l'indirizzo direttamente sulla barra, e quindi va fermato

	if (isset($id_contraente)) {

		// accedo al db, prelevo i dati della agenzia e creo la maschera
		// per il singolo contraente

		$conf_STR_sql = " SELECT * FROM contraenti ";
		$conf_STR_sql .= " WHERE id_contraente = ".$id_contraente;

		include_once "class/Database.class.php";
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
				$id_tipodocumento_contraente = $row['id_tipodocumento_contraente'];
				$numero_documento_contraente = $row['numero_documento_contraente'];

// ora estraggo i dati della nascita

				$id_regione_nascita_contraente = $row['id_regione_nascita_contraente'];
				$id_provincia_nascita_contraente = $row['id_provincia_nascita_contraente'];
				$id_comune_nascita_contraente = $row['id_comune_nascita_contraente'];
				$data_nascita_contraente = format_data($row['data_nascita_contraente']);

				$nome_regione_nascita_contraente = "";
				$nome_provincia_nascita_contraente = "";
				$nome_comune_nascita_contraente = "";

				if ($id_regione_nascita_contraente <> "0" && $id_regione_nascita_contraente <> "") {
					$nascita_sql = " SELECT * FROM regioni ";
					$nascita_sql .= " WHERE regioni.id_regione = ".$id_regione_nascita_contraente;

					$dbh->query($nascita_sql);
					$dbh->execute();
					$rowsnascita = $dbh->resultset();

					foreach ($rowsnascita as $rownascita) {
						$nome_regione_nascita_contraente = utf8_encode($rownascita['nome_regione']);
					}
				}

				if ($id_provincia_nascita_contraente <> "0" && $id_provincia_nascita_contraente <> "") {
					$nascita_sql = " SELECT * FROM province ";
					$nascita_sql .= " WHERE province.id_provincia = ".$id_provincia_nascita_contraente;

					$dbh->query($nascita_sql);
					$dbh->execute();
					$rowsnascita = $dbh->resultset();

					foreach ($rowsnascita as $rownascita) {
						$nome_provincia_nascita_contraente = utf8_encode($rownascita['nome_provincia']);
					}
				}

				if ($id_comune_nascita_contraente <> "0" && $id_comune_nascita_contraente <> "") {
					$nascita_sql = " SELECT * FROM comuni ";
					$nascita_sql .= " WHERE comuni.id_comune = ".$id_comune_nascita_contraente;

					$dbh->query($nascita_sql);
					$dbh->execute();
					$rowsnascita = $dbh->resultset();

					foreach ($rowsnascita as $rownascita) {
						$nome_comune_nascita_contraente = utf8_encode($rownascita['nome_comune']);
					}
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

				if ($id_regione_residenza_contraente <> "0" && $id_regione_residenza_contraente <> "") {
					$residenza_sql = " SELECT * FROM regioni ";
					$residenza_sql .= " WHERE regioni.id_regione = ".$id_regione_residenza_contraente;

					$dbh->query($residenza_sql);
					$dbh->execute();
					$rowsresidenza = $dbh->resultset();

					foreach ($rowsresidenza as $rowresidenza) {
						$nome_regione_residenza_contraente = utf8_encode($rowresidenza['nome_regione']);
					}
				}

				if ($id_provincia_residenza_contraente <> "0" && $id_provincia_residenza_contraente <> "") {
					$residenza_sql = " SELECT * FROM province ";
					$residenza_sql .= " WHERE province.id_provincia = ".$id_provincia_residenza_contraente;

					$dbh->query($residenza_sql);
					$dbh->execute();
					$rowsresidenza = $dbh->resultset();

					foreach ($rowsresidenza as $rowresidenza) {
						$nome_provincia_residenza_contraente = utf8_encode($rowresidenza['nome_provincia']);
					}
				}

				if ($id_comune_residenza_contraente <> "0" && $id_comune_residenza_contraente <> "") {
					$residenza_sql = " SELECT * FROM comuni ";
					$residenza_sql .= " WHERE comuni.id_comune = ".$id_comune_residenza_contraente;

					$dbh->query($residenza_sql);
					$dbh->execute();
					$rowsresidenza = $dbh->resultset();

					foreach ($rowsresidenza as $rowresidenza) {
						$nome_comune_residenza_contraente = utf8_encode($rowresidenza['nome_comune']);
					}
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

				if ($id_regione_corrispondenza_contraente <> "0" && $id_regione_corrispondenza_contraente <> "") {
					$corrispondenza_sql = " SELECT * FROM regioni ";
					$corrispondenza_sql .= " WHERE regioni.id_regione = ".$id_regione_corrispondenza_contraente;

					$dbh->query($corrispondenza_sql);
					$dbh->execute();
					$rowscorrispondenza = $dbh->resultset();

					foreach ($rowscorrispondenza as $rowcorrispondenza) {
						$nome_regione_corrispondenza_contraente = utf8_encode($rowcorrispondenza['nome_regione']);
					}
				}

				if ($id_provincia_corrispondenza_contraente <> "0" && $id_provincia_corrispondenza_contraente <> "") {
					$corrispondenza_sql = " SELECT * FROM province ";
					$corrispondenza_sql .= " WHERE province.id_provincia = ".$id_provincia_corrispondenza_contraente;

					$dbh->query($corrispondenza_sql);
					$dbh->execute();
					$rowscorrispondenza = $dbh->resultset();

					foreach ($rowscorrispondenza as $rowcorrispondenza) {
						$nome_provincia_corrispondenza_contraente = utf8_encode($rowcorrispondenza['nome_provincia']);
					}
				}

				if ($id_comune_corrispondenza_contraente <> "0" && $id_comune_corrispondenza_contraente <> "") {
					$corrispondenza_sql = " SELECT * FROM comuni ";
					$corrispondenza_sql .= " WHERE comuni.id_comune = ".$id_comune_corrispondenza_contraente;

					$dbh->query($corrispondenza_sql);
					$dbh->execute();
					$rowscorrispondenza = $dbh->resultset();

					foreach ($rowscorrispondenza as $rowcorrispondenza) {
						$nome_comune_corrispondenza_contraente = utf8_encode($rowcorrispondenza['nome_comune']);
					}
				}
				?>

                <div class="jumbotron">
                    <div class="container">
                        <h2><?php echo "Contraente: {$cognome_contraente}  {$nome_contraente}"; ?></h2>
                        <!-- Righe di dettaglio -->
                        <!-- inizio prima riga -->
                        <form id="vedidati" method="post" action="#" data-toggle="validator">
                            <div class="row">
                                <div class="form-group col-md-2 has-feedback">
                                    <label for="qualifica_contraente" class="control-label">Qualifica</label>
                                    <input type="text" class="form-control input-sm"
                                           id="qualifica_contraente" name="qualifica_contraente"
                                           placeholder="Qual."
                                           data-minlength="2"
                                           value="<?php echo "{$qualifica_contraente}"; ?>"
                                           readonly
                                    >

                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-5 has-feedback">
                                    <label for="cognome_contraente" class="control-label">Ragione sociale
                                        contraente</label>
                                    <input type="text" class="form-control input-sm"
                                           id="cognome_contraente" name="cognome_contraente"
                                           placeholder="Cognome o Ragione Sociale Contraente"
                                           value="<?php echo "{$cognome_contraente}"; ?>"
                                           data-minlength="3"
                                           readonly>

                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-5 has-feedback">
                                    <label for="nome_contraente" class="control-label">Nome
                                        contraente</label>
                                    <input type="text" class="form-control input-sm"
                                           id="nome_contraente" name="nome_contraente"
                                           placeholder="Nome del Contraente"
                                           value="<?php echo "{$nome_contraente}"; ?>"

                                           data-minlength="3"
                                           readonly>

                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-1 has-feedback">
                                    <label for="personafisica_contraente" class="control-label">P.fis.</label>
                                    <input type="hidden" name="personafisica_contraente" value="0">
                                    <input type="checkbox" class="form-control input-sm"
                                           id="personafisica_contraente"
                                           name="personafisica_contraente"
                                           value="1"
										<?php if ($personafisica_contraente == "1") {
											echo "checked";
										} ?>
                                           readonly>
                                </div>
                                <div class="form-group col-md-1 has-feedback">
                                    <label for="privacy_contraente" class="control-label">Privacy</label>
                                    <input type="hidden" name="privacy_contraente" value="0">
                                    <input type="checkbox" class="form-control input-sm"
                                           id="privacy_contraente"
                                           name="privacy_contraente"
                                           value="1"
										<?php if ($privacy_contraente == "1") {
											echo "checked";
										} ?>
                                           readonly>
                                </div>
                                <div class="form-group col-md-3 has-feedback">
                                    <label for="partita_iva_contraente" class="control-label">P.Iva</label>
                                    <input type="text" class="form-control input-sm"
                                           id="partita_iva_contraente" name="partita_iva_contraente"
                                           placeholder="P.Iva"
                                           value="<?php echo "{$partita_iva_contraente}"; ?>"
                                           maxlength="11"
                                           data-minlength="11"
                                           readonly>

                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-4 has-feedback">
                                    <label for="codice_fiscale_contraente" class="control-label">Codice Fiscale</label>
                                    <input type="text" class="form-control input-sm"
                                           id="codice_fiscale_contraente" name="codice_fiscale_contraente"
                                           placeholder="Codice Fiscale"
                                           value="<?php echo "{$codice_fiscale_contraente}"; ?>"

                                           maxlength="16"
                                           data-minlength="16"
                                           readonly>

                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="giallino col-md-23">

                                    <div class="form-group col-md-3"><br>Nascita</div>
                                    <div class="form-group col-md-4 has-feedback">
                                        <label for="regioni" class="control-label">Regione</label>
                                        <input class="form-control input-sm" id="regioni"
                                               name="id_regione_nascita_contraente"
                                               value="<?php echo "{$nome_regione_nascita_contraente}"; ?>"
                                               readonly>
                                    </div>
                                    <div class="form-group col-md-4 has-feedback">
                                        <label for="province" class="control-label">Provincia</label>
                                        <input class="form-control input-sm" id="province"
                                               name="id_provincia_nascita_contraente"
                                               value="<?php echo "{$nome_provincia_nascita_contraente}"; ?>"
                                               readonly>
                                    </div>
                                    <div class="form-group col-md-5 has-feedback">
                                        <label for="comuni" class="control-label">Comune</label>
                                        <input class="form-control input-sm" id="comuni"
                                               name="id_comune_nascita_contraente"
                                               value="<?php echo "{$nome_comune_nascita_contraente}"; ?>"
                                               readonly>
                                    </div>

                                    <div class="form-group col-md-3 has-feedback">
                                        <label for="data_nascita_contraente" class="control-label">Data di Nascita
                                            :</label>
                                        <input type="text" class="form-control input-sm"
                                               id="data_nascita_contraente" name="data_nascita_contraente"
                                               placeholder="Data di Nascita"
                                               value="<?php echo "{$data_nascita_contraente}"; ?>"
                                               readonly>
                                        <span class="glyphicon form-control-feedback"
                                              aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-2 has-feedback">
                                        <label for="id_tipodocumento_contraente" class="control-label">Tipo Doc.</label>
                                        <select class="form-control input-sm"
                                                id="id_tipodocumento_contraente"
                                                name="id_tipodocumento_contraente"
                                                readonly>
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
                                               readonly>

                                        <div class="help-block with-errors"></div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="verdino col-md-23">

                                    <div class="form-group col-md-3 margintop15">Residenza /<br>Sede Legale</div>
                                    <div class="form-group col-md-4 has-feedback">
                                        <label for="regioni" class="control-label">Regione</label>
                                        <input class="form-control input-sm" id="regioni"
                                               name="id_regione_residenza_contraente"
                                               value="<?php echo "{$nome_regione_residenza_contraente}"; ?>"
                                               readonly>
                                    </div>
                                    <div class="form-group col-md-4 has-feedback">
                                        <label for="province" class="control-label">Provincia</label>
                                        <input class="form-control input-sm" id="province"
                                               name="id_provincia_residenza_contraente"
                                               value="<?php echo "{$nome_provincia_residenza_contraente}"; ?>"
                                               readonly>
                                    </div>
                                    <div class="form-group col-md-5 has-feedback">
                                        <label for="comuni" class="control-label">Comune</label>
                                        <input class="form-control input-sm" id="comuni"
                                               name="id_comune_residenza_contraente"
                                               value="<?php echo "{$nome_comune_residenza_contraente}"; ?>"
                                               readonly>
                                    </div>

                                    <div class="form-group col-md-2 has-feedback">
                                        <label for="capresidenza" class="control-label">Cap</label>
                                        <input type="text" class="form-control input-sm"
                                               id="capresidenza" placeholder="CAP"
                                               name="cap_residenza_contraente"
                                               value="<?php echo "{$cap_residenza_contraente}"; ?>"
                                               readonly>

                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-6 has-feedback">
                                        <label for="indirizzoresidenza" class="control-label">Indirizzo</label>
                                        <input type="text" class="form-control input-sm"
                                               id="indirizzoresidenza" placeholder="Indirizzo"
                                               name="indirizzo_residenza_contraente"
                                               value="<?php echo "{$indirizzo_residenza_contraente}"; ?>"
                                               readonly>

                                        <div class="help-block with-errors"></div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="marroncino col-md-23">

                                    <div class="form-group col-md-3 margintop15">Corrispondenza /<br>Sede Operativa
                                    </div>
                                    <div class="form-group col-md-4 has-feedback">
                                        <label for="regioni" class="control-label">Regione</label>
                                        <input class="form-control input-sm" id="regioni"
                                               name="id_regione_corrispondenza_contraente"
                                               value="<?php echo "{$nome_regione_corrispondenza_contraente}"; ?>"
                                               readonly>
                                    </div>
                                    <div class="form-group col-md-4 has-feedback">
                                        <label for="province"
                                               class="control-label">Provincia</label>
                                        <input class="form-control input-sm" id="province"
                                               name="id_provincia_corrispondenza_contraente"
                                               value="<?php echo "{$nome_provincia_corrispondenza_contraente}"; ?>"
                                               readonly>
                                    </div>
                                    <div class="form-group col-md-5 has-feedback">
                                        <label for="comuni" class="control-label">Comune</label>
                                        <input class="form-control input-sm" id="comuni"
                                               name="id_comune_corrispondenza_contraente"
                                               value="<?php echo "{$nome_comune_corrispondenza_contraente}"; ?>"
                                               readonly>
                                    </div>

                                    <div class="form-group col-md-2 has-feedback">
                                        <label for="capresidenza" class="control-label">Cap</label>
                                        <input type="text" class="form-control input-sm"
                                               id="capresidenza" placeholder="CAP"
                                               name="cap_corrispondenza_contraente"
                                               value="<?php echo "{$cap_corrispondenza_contraente}"; ?>"
                                               readonly>

                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-6 has-feedback">
                                        <label for="indirizzoresidenza" class="control-label">Indirizzo</label>
                                        <input type="text" class="form-control input-sm"
                                               id="Indirizzoresidenza" placeholder="Indirizzo"
                                               name="indirizzo_corrispondenza_contraente"
                                               value="<?php echo "{$indirizzo_corrispondenza_contraente}"; ?>"
                                               readonly>

                                        <div class="help-block with-errors"></div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 has-feedback">
                                    <label for="email" class="control-label">Email</label>
                                    <input type="email" class="form-control input-sm"
                                           id="email" name="email_contraente"
                                           placeholder="Email"
                                           value="<?php echo "{$email_contraente}"; ?>"

                                           readonly>
                                    <span class="glyphicon form-control-feedback"
                                          aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-6 has-feedback">
                                    <label for="pec" class="control-label">PEC</label>
                                    <input type="email" class="form-control input-sm"
                                           id="pec" name="pec_contraente"
                                           placeholder="PEC"
                                           value="<?php echo "{$pec_contraente}"; ?>"

                                           readonly>
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
                                           readonly>
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
                                           readonly>
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
                                           readonly>
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

                                           readonly>
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

                                           readonly>
                                    <span class="glyphicon form-control-feedback"
                                          aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-1 has-feedback">
                                    <label for="modulo7a7b" class="control-label">7a7b</label>
                                    <input type="hidden" name="modulo7a7b" value="0">
                                    <input type="checkbox" class="form-control input-sm"
                                           id="modulo7a7b"
                                           name="modulo7a7b_contraente"
                                           value="1"
										<?php if ($modulo_7a7b_contraente == "1") {
											echo "checked";
										} ?>
                                           readonly>
                                </div>
                                <div class="form-group btn-group col-md-4 btn-block center">
                                    <label for="azioni">Azioni</label>
                                    <!-- un pulsante per chiudere la finestra -->
                                    <div id="azioni" align="right">
                                        <input type="button" onclick="window.close();"
                                               value="chiudi" data-toggle="tooltip"
                                               title="Chiudi la finestra"
                                               class="btn btn-sm btn-success">

                                        <a href="contraente_esistente_modifica.php?idcont=<?php echo "{$id_contraente}" ?>"
                                           class="btn btn-warning btn-sm" data-toggle="tooltip"
                                           title="Modifica Contraente"
                                           role="button" target="_blank">M</a>
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

<?php include 'footer.php' ?>