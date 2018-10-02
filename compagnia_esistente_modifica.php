<?php include_once "header.php" ?>
    <script src="js/validator.js"></script>


<?php $id_compagnia = $_REQUEST['idcom'] ?>

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
// se non arriva l'id_compagnia vuol dire che l'utente ha digitato
//l'indirizzo direttamente sulla barra, e quindi va fermato
	if (isset($id_compagnia)) {
		// accedo al db, prelevo i dati della compagnia e creo la maschera
		// per la singola compagnia
		$conf_STR_sql = " SELECT regioni.nome_regione, province.nome_provincia, comuni.nome_comune, compagnie.* FROM compagnie ";
		$conf_STR_sql .= "  LEFT JOIN regioni ON compagnie.id_regione_compagnia = regioni.id_regione ";
		$conf_STR_sql .= "  LEFT JOIN province ON compagnie.id_provincia_compagnia = province.id_provincia ";
		$conf_STR_sql .= "  LEFT JOIN comuni ON compagnie.id_comune_compagnia = comuni.id_comune ";
		$conf_STR_sql .= "  WHERE compagnie.id_compagnia = {$id_compagnia}";

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
			$id_compagnia = $row['id_compagnia'];
			$ragione_sociale_compagnia = $row['ragione_sociale_compagnia'];
			$email_compagnia = $row['email_compagnia'];
			$pec_compagnia = $row['pec_compagnia'];
			$telefono_fisso_compagnia = $row['telefono_fisso_compagnia'];
			$mobile_compagnia = $row['mobile_compagnia'];
			$fax_compagnia = $row['fax_compagnia'];
			$partita_iva_compagnia = $row['partita_iva_compagnia'];
			$codice_fiscale_compagnia = $row['codice_fiscale_compagnia'];
			$nome_regione = $row['nome_regione'];
			$nome_provincia = $row['nome_provincia'];
			$nome_comune = $row['nome_comune'];
			$cap_compagnia = $row['cap_compagnia'];
			$indirizzo_compagnia = $row['indirizzo_compagnia'];
			$personariferimento_compagnia = $row['personariferimento_compagnia'];
			?>


            <div class="jumbotron">
                <div class="container">
                    <!-- Righe di dettaglio -->
                    <!-- inizio prima riga -->
                    <form id="aggiornacompagnia" method="post" action="compagnia_esistente_aggiornamento.php"
                          data-toggle="validator">
                        <h1><?php echo "Compagnia: {$ragione_sociale_compagnia}"; ?>
							<?php echo " <input type=\"hidden\" name=\"id_compagnia\" value=\"{$id_compagnia}\">"; ?>
							<?php echo " <input type=\"hidden\" name=\"ragione_sociale_compagnia\" value=\"{$ragione_sociale_compagnia}\">"; ?></h1>

                        <div class="row">
                            <div class="form-group col-md-6 has-feedback">
                                <label for="personariferimento" class="control-label">Persona di riferimento</label>
                                <input type="text" class="form-control input-sm"
                                       id="personariferimento" name="personariferimento_compagnia"
                                       placeholder="Persona di riferimento"
                                       value="<?php echo "{$personariferimento_compagnia}"; ?>"
                                >

                                <div class="help-block with-errors"></div>
                            </div>


                            <div class="form-group col-md-3 has-feedback">
                                <label for="piva" class="control-label">P.Iva</label>
                                <input type="text" class="form-control input-sm"
                                       id="piva" name="partita_iva_compagnia"
                                       placeholder="P.Iva"
                                       maxlength="11"
                                       data-minlength="11"
                                       value="<?php echo "{$partita_iva_compagnia}"; ?>"
                                >

                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-4 has-feedback">
                                <label for="cfcompagnia" class="control-label">Codice Fiscale</label>
                                <input type="text" class="form-control input-sm"
                                       id="cfcompagnia" name="codice_fiscale_compagnia"
                                       placeholder="Codice Fiscale"
                                       maxlength="16"
                                       data-minlength="11"
                                       value="<?php echo "{$codice_fiscale_compagnia}"; ?>"
                                >

                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 has-feedback">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" class="form-control input-sm"
                                       id="email" name="email_compagnia"
                                       placeholder="Email"
                                       value="<?php echo "{$email_compagnia}"; ?>"
                                >

                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-md-6 has-feedback">
                                <label for="pec" class="control-label">PEC</label>
                                <input type="email" class="form-control input-sm"
                                       id="pec" name="pec_compagnia"
                                       placeholder="PEC"
                                       value="<?php echo "{$pec_compagnia}"; ?>">

                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-4 has-feedback">
                                <label for="telefono" class="control-label">Telefono Principale</label>
                                <input type="tel" class="form-control input-sm"
                                       id="telefono"
                                       placeholder="Telefono"
                                       name="telefono_fisso_compagnia"
                                       value="<?php echo "{$telefono_fisso_compagnia}"; ?>"
                                       data-minlength="8">

                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group col-md-4 has-feedback">
                                <label for="mobile" class="control-label">Mobile Principale</label>
                                <input type="tel" class="form-control input-sm"
                                       id="mobile" placeholder="Mobile"
                                       name="mobile_compagnia"
                                       value="<?php echo "{$mobile_compagnia}"; ?>"
                                       data-minlength="8">

                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-3 has-feedback">
                                <label for="fax" class="control-label">Fax Principale</label>
                                <input type="tel" class="form-control input-sm"
                                       id="fax" placeholder="Fax"
                                       name="fax_compagnia"
                                       value="<?php echo "{$fax_compagnia}"; ?>"
                                       data-minlength="8">

                                <div class="help-block with-errors"></div>
                            </div>

                        </div><!-- fine riga -->
						<?php

							$opt = new Database();

						?>
                        <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
                        <script type="text/javascript" src="js/regioniprovincecomuni.js"></script>

                        <div class="row"><!-- inizio seconda riga -->
                            <div class="row">
                                <div class="form-group col-md-4 has-feedback">
                                    <label for="regioni" class="control-label">Regione</label>
                                    <input class="form-control input-sm" id="regioni" name="id_regione_compagnia"
                                           value="<?php echo "{$nome_regione}"; ?>"
                                           readonly>

                                </div>
                                <div class="form-group col-md-4 has-feedback">
                                    <label for="province" class="control-label">Provincia</label>
                                    <input class="form-control input-sm" id="province" name="id_provincia_compagnia"
                                           value="<?php echo "{$nome_provincia}"; ?>"
                                           readonly>

                                </div>
                                <div class="form-group col-md-4 has-feedback">
                                    <label for="comuni" class="control-label">Comune</label>
                                    <input class="form-control input-sm" id="comuni" name="id_comune_compagnia"
                                           value="<?php echo "{$nome_comune}"; ?>"
                                           readonly>

                                </div>
                                <div class="form-group col-md-2 has-feedback">
                                    <label for="cap" class="control-label">Cap</label>
                                    <input type="text" class="form-control input-sm"
                                           id="cap" placeholder="CAP"
                                           name="cap_compagnia"
                                           value="<?php echo "{$cap_compagnia}"; ?>"
                                           data-minlength="5"
                                           maxlength="5">

                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-5 has-feedback">
                                    <label for="indirizzo" class="control-label">Indirizzo</label>
                                    <input type="text" class="form-control input-sm"
                                           id="indirizzo" placeholder="Indirizzo"
                                           name="indirizzo_compagnia"
                                           value="<?php echo "{$indirizzo_compagnia}"; ?>"
                                           data-minlength="5">

                                    <div class="help-block with-errors"></div>
                                </div>
                                <label for="azioni">Azioni</label>
                                <div class="form-group btn-group col-md-5" id="azioni">
                                    <!-- un pulsante per aggiornare i dati della compagnia -->
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

                            </div><!-- fine prima riga -->
                        </div>
                    </form>
                </div>
            </div>
		<?php } ?>


        <!-- finito la testata della compagnia, comincia la sezione TAB -->

        <div class="container">

            <ul class="nav nav-pills" id="myTab">
                <li class="active"><a href="#tab1" data-toggle="pill">Agenzie</a></li>
                <li><a href="#tab2" data-toggle="pill">Polizze</a></li>
                <li><a href="#tab3" data-toggle="pill">Premi</a></li>
                <li><a href="#tab4" data-toggle="pill">Sinistri</a></li>
                <li><a href="#tab5" data-toggle="pill">Altri Telefoni</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane  active" id="tab1">
					<?php include("agenzie_lista.php") ?>
                </div>
                <div class="tab-pane" id="tab2">
					<?php include("polizze_lista.php"); ?>
                </div>
                <div class="tab-pane" id="tab3">
					<?php include("premi_lista.php"); ?>
                </div>
                <div class="tab-pane" id="tab4">
					<?php include("sinistri_lista.php"); ?>
                </div>
                <div class="tab-pane" id="tab5">
					<?php include("__compagnia_esistente_lista_telefoni.php") ?>
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

<?php include "footer.php" ?>