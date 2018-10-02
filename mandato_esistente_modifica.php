<?php include_once "header.php" ?>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript"
            src="js/compagnie_agenzie_mandati.js"></script>
    <link rel="stylesheet"
          href="css/jquery-ui.css">
    <script src="js/jquery-ui.min.js"></script>
    <!-- seguono le risorse per la gestione dei campi data e ora -->
    <script src="js/validator.js"></script>

<?php include_once "inc/inc.utils.php";//serve per la formattazione della data?>

<?php $id_mandato = $_REQUEST['idmand'] ?>

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


    <style>
        .marroncino {
            background-color: #e6c393;
        }

        .giallino {
            background-color: #e6e483;
        }

        .verdino {
            background-color: #bce6b0;
        }

        .celestino {
            background-color: #8fe0e6;
        }

        .rossetto {
            background-color: #ff9c94;
        }

        .grigino {
            background-color: #bfbfbf;
        }
    </style>

    <!--todo    gestione delle date: da add_assistiti.php visualizza come dd-mm-yyyy, -->
    <!--todo	ma registra come yyyy-mm-dd, secondo quanto richiesto da mysql-->
<?php
// se non arriva l'id_agenzia vuol dire che l'utente ha digitato
//l'indirizzo direttamente sulla barra, e quindi va fermato
	if (isset($id_mandato)) {
		// accedo al db, prelevo i dati della agenzia e creo la maschera
		// per la singola agenzia
		$conf_STR_sql = " SELECT mandati.*, compagnie.ragione_sociale_compagnia, ";
		$conf_STR_sql .= " agenzie.ragione_sociale_agenzia, coperture.orario_copertura, rimessapremi.descrizione_rimessapremio ";
		$conf_STR_sql .= " FROM mandati ";
		$conf_STR_sql .= " JOIN compagnie ON mandati.id_compagnia_mandato = compagnie.id_compagnia ";
		$conf_STR_sql .= " JOIN agenzie ON mandati.id_agenzia_mandato = agenzie.id_agenzia ";
		$conf_STR_sql .= " LEFT JOIN coperture ON mandati.id_copertura_mandato = coperture.id_copertura ";
		$conf_STR_sql .= " LEFT JOIN rimessapremi ON mandati.id_rimessa_premi_mandato = rimessapremi.id_rimessapremio ";
		$conf_STR_sql .= " WHERE id_mandato = {$id_mandato}";

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
			$id_mandato = $row['id_mandato'];
			$id_compagnia_mandato = $row['id_compagnia_mandato'];
			$ragione_sociale_compagnia = $row['ragione_sociale_compagnia'];
			$id_agenzia_mandato = $row['id_agenzia_mandato'];
			$ragione_sociale_agenzia = $row['ragione_sociale_agenzia'];
			$identificativo_mandato = $row['identificativo_mandato'];
			$inizio_mandato = format_data($row['inizio_mandato']);
			$fine_mandato = format_data($row['fine_mandato']);

			$provvallrisks_mandato = $row['provvallrisks_mandato'];
			$provvcar_mandato = $row['provvcar_mandato'];
			$provvcauz_mandato = $row['provvcauz_mandato'];
			$provvfro_mandato = $row['provvfro_mandato'];
			$provvfineart_mandato = $row['provvfineart_mandato'];
			$provvkasko_mandato = $row['provvkasko_mandato'];
			$provvgfabbricati_mandato = $row['provvgfabbricati_mandato'];
			$provvgabitazione_mandato = $row['provvgabitazione_mandato'];
			$provvgcomm_mandato = $row['provvgcomm_mandato'];
			$provvincord_mandato = $row['provvincord_mandato'];
			$provvincind_mandato = $row['provvincind_mandato'];
			$provvtutlegale_mandato = $row['provvtutlegale_mandato'];
			$provvnoinabiltemp_mandato = $row['provvnoinabiltemp_mandato'];
			$provvinabiltemp_mandato = $row['provvinabiltemp_mandato'];
			$provvrcinquinamento_mandato = $row['provvrcinquinamento_mandato'];
			$provvrccapofam_mandato = $row['provvrccapofam_mandato'];
			$provvrcauto_mandato = $row['provvrcauto_mandato'];
			$provvrcalibmat_mandato = $row['provvrcalibmat_mandato'];
			$provvrcrord_mandato = $row['provvrcrord_mandato'];
			$provvrcprof_mandato = $row['provvrcprof_mandato'];
			$provvrcpatgrave_mandato = $row['provvrcpatgrave_mandato'];
			$provvrcpatlieve_mandato = $row['provvrcpatlieve_mandato'];
			$id_copertura_mandato = $row['id_copertura_mandato'];
			$orario_copertura_mandato = $row['orario_copertura'];
			$fax_copertura_mandato = $row['fax_copertura_mandato'];
			$email_copertura_mandato = $row['email_copertura_mandato'];
			$id_rimessa_premi_mandato = $row['id_rimessa_premi_mandato'];
			$rimessa_premi_mandato = $row['descrizione_rimessapremio'];
			$provvigioni_incasso_mandato = $row['provvigioni_incasso_mandato'];
			$conto1_mandato = $row['conto1_mandato'];
			$ibanconto1_mandato = $row['ibanconto1_mandato'];
			$conto2_mandato = $row['conto2_mandato'];
			$ibanconto2_mandato = $row['ibanconto2_mandato'];
			$conto3_mandato = $row['conto3_mandato'];
			$ibanconto3_mandato = $row['ibanconto3_mandato'];;


			?>

			<?php
			include_once 'class/SelectCompagnieAgenzieMandati.class.php';
			$comp = new SelectCompagnieAgenzieMandati();
			?>

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
                <fieldset class="container">
                    <h2><?php echo "Mandato: {$identificativo_mandato}"; ?></h2>
                    <!-- Righe di dettaglio -->
                    <!-- inizio prima riga -->
                    <form id="mandatoesistente"
                          method="post"
                          action="mandato_esistente_aggiornamento.php"
                          data-toggle="validator">
						<?php echo " <input type=\"hidden\" name=\"id_mandato\" value=\"{$id_mandato}\">"; ?>
						<?php echo " <input type=\"hidden\" name=\"identificativomandato\" value=\"{$identificativo_mandato}\">"; ?>

                        <div class="row marginbottom15">
                            <div class="form-group col-md-6 has-feedback grassetto">
                                <label for="identificativomandato"
                                       class="control-label">Identificativo</label>
                                <input class="form-control"
                                       id="identificativomandato"
                                       name="identificativomandato"
                                       value="<?php echo "{$identificativo_mandato}"; ?>"
                                >
                            </div>
                            <div class="form-group col-md-6 has-feedback grassetto">
                                <label for="compagnie"
                                       class="control-label">Compagnia</label>
                                <input class="form-control"
                                       id="compagnie"
                                       name="compagniamandato"
                                       value="<?php echo "{$ragione_sociale_compagnia}"; ?>"
                                       readonly>
                            </div>
                            <div class="form-group col-md-4 has-feedback grassetto">
                                <label for="agenzie"
                                       class="control-label"> Agenzia</label>
                                <input class="form-control"
                                       id="agenzie"
                                       name="agenziamandato"
                                       value="<?php echo "{$ragione_sociale_agenzia}"; ?>"
                                       readonly>
                            </div>
                            <div class="col-md-4 has-feedback">
                                <label for="inizio_mandato">Inizio Mandato</label>

                                <div class="input-group">
                                    <span class="input-group-addon">Il</span>


                                    <input type="text"
                                           id="inizio_mandato"
                                           name="inizio_mandato"
                                           class="form-control input-sm datepicker"
                                           aria-label="ds"
                                           placeholder="Inizia il"
                                           value="<?php echo "{$inizio_mandato}"; ?>">
                                </div>

                            </div>
                            <div class="col-md-4 has-feedback">
                                <label for="fine_mandato">Fine Mandato</label>

                                <div class="input-group">
                                    <span class="input-group-addon">Il</span>
                                    <input type="text"
                                           id="fine_mandato"
                                           name="fine_mandato"
                                           class="form-control input-sm datepicker"
                                           aria-label="ds"
                                           placeholder="Scade il"
                                           value="<?php echo "{$fine_mandato}"; ?>"
                                    >
                                </div>
                            </div>

                        </div><!--fine riga-->

                        <div class="row">
                            <div class="marroncino col-md-12">
                                <div class="col-md-4 has-feedback">
                                    <label for="provvallrisks"
                                           class="control-label-small">All Risks</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvallrisks"
                                           placeholder="Provvigioni"
                                           name="provvallrisks"
                                           value="<?php echo "{$provvallrisks_mandato}"; ?>"
                                    > <span class="glyphicon form-control-feedback"
                                            aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-md-4 has-feedback">
                                    <label for="provvcar"
                                           class="control-label"> C.A.R.</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvcar"
                                           placeholder="Provvigioni"
                                           name="provvcar"
                                           value="<?php echo "{$provvcar_mandato}"; ?>"
                                    > <span class="glyphicon form-control-feedback"
                                            aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                                <div class="col-md-4 has-feedback">
                                    <label for="provvcauz"
                                           class="control-label"> Cauzione</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvcauz"
                                           placeholder="Provvigioni"
                                           name="provvcauz"
                                           value="<?php echo "{$provvcauz_mandato}"; ?>"
                                    > <span class="glyphicon form-control-feedback"
                                            aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                                <div class="col-md-4 has-feedback">
                                    <label for="provvfro"
                                           class="control-label">F.R.O</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvfro"
                                           placeholder="Provvigioni"
                                           name="provvfro"
                                           value="<?php echo "{$provvfro_mandato}"; ?>"
                                    > <span class="glyphicon form-control-feedback"
                                            aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                                <div class="col-md-4 has-feedback">
                                    <label for="provvfineart"
                                           class="control-label">Fine Art</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvfineart"
                                           placeholder="Provvigioni"
                                           name="provvfineart"
                                           value="<?php echo "{$provvfineart_mandato}"; ?>"
                                    > <span class="glyphicon form-control-feedback"
                                            aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-4 has-feedback">
                                    <label for="provvkasko"
                                           class="control-label">Kasko</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvkasko"
                                           placeholder="Provvigioni"
                                           name="provvkasko"
                                           value="<?php echo "{$provvkasko_mandato}"; ?>"
                                    > <span class="glyphicon form-control-feedback"
                                            aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>

                            </div>
                            <div class="celestino col-md-6">
                                <div class="form-group col-md-8">
                                    <label for="provvgfabbricati"
                                           class="control-label">G.Fabbricati</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvgfabbricati"
                                           placeholder="Provvigioni"
                                           name="provvgfabbricati"
                                           value="<?php echo "{$provvgfabbricati_mandato}"; ?>"
                                    > <span class="glyphicon form-control-feedback"
                                            aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                                <div class="form-group col-md-8">
                                    <label for="provvgcomm"
                                           class="control-label">G.Commercio</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvgcomm"
                                           placeholder="Provvigioni"
                                           name="provvgcomm"
                                           value="<?php echo "{$provvgcomm_mandato}"; ?>"
                                    >
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="provvgabitazione"
                                           class="control-label">G.Abitazione</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvgabitazione"
                                           placeholder="Provvigioni"
                                           name="provvgabitazione"
                                           value="<?php echo "{$provvgabitazione_mandato}"; ?>"
                                    >
                                </div>
                            </div>
                            <div class="verdino col-md-6">
                                <div class="form-group col-md-8">
                                    <label for="provvincord"
                                           class="control-label">Incendio Ord</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvincord"
                                           placeholder="Provvigioni"
                                           name="provvincord"
                                           value="<?php echo "{$provvincord_mandato}"; ?>"
                                    >
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="provvincind"
                                           class="control-label">Incendio Ind</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvincind"
                                           placeholder="Provvigioni"
                                           name="provvincind"
                                           value="<?php echo "{$provvincind_mandato}"; ?>"
                                    >
                                </div>
                                <div class="form-group col-md-8 has-feedback">
                                    <label for="provvtutlegale"
                                           class="control-label">Tut.Legale</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvtutlegale"
                                           placeholder="Provvigioni"
                                           name="provvtutlegale"
                                           value="<?php echo "{$provvtutlegale_mandato}"; ?>"
                                    > <span class="glyphicon form-control-feedback"
                                            aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="grigino col-md-6">
                                <div class="form-group col-md-12">
                                    <label for="provvinabiltemp"
                                           class="control-label">Infortuni inab.temp </label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvinabiltemp"
                                           placeholder="Provvigioni"
                                           name="provvinabiltemp"
                                           value="<?php echo "{$provvinabiltemp_mandato}"; ?>"
                                    >
                                </div>

                                <div class="form-group col-md-12 has-feedback">
                                    <label for="provvnoinabiltemp"
                                           class="control-label">Infortuni no temp.</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvnoinabiltemp"
                                           placeholder="Provvigioni"
                                           name="provvnoinabiltemp"
                                           value="<?php echo "{$provvnoinabiltemp_mandato}"; ?>"
                                    > <span class="glyphicon form-control-feedback"
                                            aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                            <div class="rossetto col-md-18">
                                <div class="form-group col-md-3 has-feedback">
                                    <label for="provvrcinquinamento"
                                           class="control-label">RC Inquinam</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvrcinquinamento"
                                           placeholder="Provvigioni"
                                           name="provvrcinquinamento"
                                           value="<?php echo "{$provvrcinquinamento_mandato}"; ?>"
                                    > <span class="glyphicon form-control-feedback"
                                            aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                                <div class="form-group col-md-3 has-feedback">
                                    <label for="provvrccapofam"
                                           class="control-label">RC Capofam</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvrccapofam"
                                           placeholder="Provvigioni"
                                           name="provvrccapofam"
                                           value="<?php echo "{$provvrccapofam_mandato}"; ?>"
                                    > <span class="glyphicon form-control-feedback"
                                            aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                                <div class="form-group col-md-3 has-feedback">
                                    <label for="provvrcauto"
                                           class="control-label">RC Auto</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvrcauto"
                                           placeholder="Provvigioni"
                                           name="provvrcauto"
                                           value="<?php echo "{$provvrcauto_mandato}"; ?>"
                                    > <span class="glyphicon form-control-feedback"
                                            aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                                <div class="form-group col-md-3 has-feedback">
                                    <label for="provvrcalibmat"
                                           class="control-label">RCA Libro M.</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvrcalibmat"
                                           placeholder="Provvigioni"
                                           name="provvrcalibmat"
                                           value="<?php echo "{$provvrcalibmat_mandato}"; ?>"
                                    > <span class="glyphicon form-control-feedback"
                                            aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                                <div class="form-group col-md-3 has-feedback">
                                    <label for="provvrcrord"
                                           class="control-label">RC R.Ord </label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvrcrord"
                                           placeholder="Provvigioni"
                                           name="provvrcrord"
                                           value="<?php echo "{$provvrcrord_mandato}"; ?>"
                                    > <span class="glyphicon form-control-feedback"
                                            aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>

                                <div class="form-group col-md-3 has-feedback">
                                    <label for="provvrcprof"
                                           class="control-label">RC Prof.</label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvrcprof"
                                           placeholder="Provvigioni"
                                           name="provvrcprof"
                                           value="<?php echo "{$provvrcprof_mandato}"; ?>"
                                    > <span class="glyphicon form-control-feedback"
                                            aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                                <div class="form-group col-md-3 has-feedback">
                                    <label for="provvrcpatgrave"
                                           class="control-label">RC Patr.Grave </label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvrcpatgrave"
                                           placeholder="Provvigioni"
                                           name="provvrcpatgrave"
                                           value="<?php echo "{$provvrcpatgrave_mandato}"; ?>"
                                    > <span class="glyphicon form-control-feedback"
                                            aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                                <div class="form-group col-md-3 has-feedback">
                                    <label for="provvrcpatlieve"
                                           class="control-label">RC Patr.Lieve </label>
                                    <input type="text"
                                           class="form-control input-sm"
                                           id="provvrcpatlieve"
                                           placeholder="Provvigioni"
                                           name="provvrcpatlieve"
                                           value="<?php echo "{$provvrcpatlieve_mandato}"; ?>"
                                    > <span class="glyphicon form-control-feedback"
                                            aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                        </div>
                        <div class="row giallino">
                            <div class="form-group col-md-2"><br>Coperture</div>
                            <div class="form-group col-md-3 has-feedback">
                                <label for="oraricopertura" class="control-label">Dalle</label>
                                <select class="form-control input-sm"
                                        id="oraricopertura"
                                        name="orariocoperturamandato"
                                >
									<?php
										$sql_copertura = "SELECT * from coperture";

										$dbh->query($sql_copertura);
										$rowscopertura = $dbh->resultset();

										$recordscopertura = $dbh->rowCount();
										if ($recordscopertura > 0) {

											foreach ($rowscopertura as $rowcopertura) {
												$id_copertura = $rowcopertura['id_copertura'];
												$orario_copertura = $rowcopertura['orario_copertura'];
												?>
                                                <option
                                                        value="<?php echo $id_copertura ?>"
													<?php if ($id_copertura == $id_copertura_mandato) {
														echo " SELECTED ";
													} ?>
                                                ><?php echo $orario_copertura ?></option>
											<?php } ?>
										<?php } ?>

                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-5 has-feedback">
                                <label for="faxcopertura" class="control-label">Fax</label>
                                <input class="form-control input-sm"
                                       id="faxcopertura"
                                       name="faxcoperturamandato"
                                       value="<?php echo "{$fax_copertura_mandato}"; ?>"
                                >

                            </div>
                            <div class="form-group col-md-6 has-feedback">
                                <label for="emailcopertura" class="control-label">Email/PEC</label>
                                <input class="form-control input-sm"
                                       id="emailcopertura"
                                       name="emailcoperturamandato"
                                       value="<?php echo "{$email_copertura_mandato}"; ?>"
                                >

                            </div>
                            <div class="form-group col-md-3 has-feedback">
                                <label for="rimessapremi" class="control-label">Rimessa Premi</label>
                                <select class="form-control input-sm"
                                        id="rimessapremi"
                                        name="rimessapremimandato"
                                >
									<?php
										$sql_rimessa = "SELECT * from rimessapremi";

										$dbh->query($sql_rimessa);
										$rowsrimessa = $dbh->resultset();

										$recordsrimessa = $dbh->rowCount();
										if ($recordsrimessa > 0) {

											foreach ($rowsrimessa as $rowrimessa) {
												$id_rimessa = $rowrimessa['id_rimessapremio'];
												$rimessa_premio = $rowrimessa['descrizione_rimessapremio'];
												?>
                                                <option
                                                        value="<?php echo $id_rimessa ?>"
													<?php if ($id_rimessa == $id_rimessa_premi_mandato) {
														echo " SELECTED ";
													} ?>
                                                ><?php echo $rimessa_premio ?></option>
											<?php } ?>
										<?php } ?>
                                </select>

                            </div>
                            <div class="form-group col-md-3 has-feedback">
                                <label for="provvigioniincasso" class="control-label">Provv. incasso</label>
                                <input type="text" class="form-control input-sm"
                                       id="provvigioniincasso" placeholder="%"
                                       name="provvigioniincassomandato"
                                       value="<?php echo "{$provvigioni_incasso_mandato}"; ?>"
                                >
                            </div>
                        </div>

                        <div class="row celestino">
                            <div class="form-group col-md-2"><br>Premi</div>
                            <div class="form-group col-md-3 has-feedback">
                                <label for="conto1" class="control-label">Conto 1</label>
                                <input type="text" class="form-control input-sm"
                                       id="conto1"
                                       name="conto1mandato"
                                       value="<?php echo "{$conto1_mandato}"; ?>"
                                >
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-4 has-feedback">
                                <label for="ibanconto1" class="control-label">IBAN Conto1</label>
                                <input type="text" class="form-control input-sm"
                                       id="ibanconto1"
                                       name="ibanconto1mandato"
                                       minlength="27"
                                       maxlength="27"
                                       value="<?php echo "{$ibanconto1_mandato}"; ?>"
                                >
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group col-md-3 has-feedback">
                                <label for="conto2" class="control-label">Conto 2</label>
                                <input type="text" class="form-control input-sm"
                                       id="conto2"
                                       name="conto2mandato"
                                       value="<?php echo "{$conto2_mandato}"; ?>"
                                >
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-4 has-feedback">
                                <label for="ibanconto2" class="control-label">IBAN Conto2</label>
                                <input type="text" class="form-control input-sm"
                                       id="ibanconto2"
                                       name="ibanconto2mandato"
                                       minlength="27"
                                       maxlength="27"
                                       value="<?php echo "{$ibanconto2_mandato}"; ?>"
                                >
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group col-md-3 has-feedback">
                                <label for="conto3" class="control-label">Conto 3</label>
                                <input type="text" class="form-control input-sm"
                                       id="conto3"
                                       name="conto3mandato"
                                       value="<?php echo "{$conto3_mandato}"; ?>"
                                >
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-4 has-feedback">
                                <label for="ibanconto3" class="control-label">IBAN Conto3</label>
                                <input type="text" class="form-control input-sm"
                                       id="ibanconto3"
                                       name="ibanconto3mandato"
                                       minlength="27"
                                       maxlength="27"
                                       value="<?php echo "{$ibanconto3_mandato}"; ?>"
                                >
                                <div class="help-block with-errors"></div>

                            </div>
                        </div>


                        <div class="row"> <!--inizio riga RCT RCO-->

                            <div class="form-group col-md-19"></div>
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

                            </div> <!--fine riga RCT RCO-->
                    </form>
                </fieldset>
            </div><!--fine jumbotron-->
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