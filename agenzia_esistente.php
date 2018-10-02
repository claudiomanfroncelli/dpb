<?php include "header.php" ?>

<?php $id_agenzia = $_REQUEST['idage'] ?>
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

	if (isset($id_agenzia)) {

		// accedo al db, prelevo i dati della agenzia e creo la maschera
		// per la singola agenzia


		$conf_STR_sql = " SELECT compagnie.ragione_sociale_compagnia, regioni.nome_regione, province.nome_provincia, comuni.nome_comune, agenzie.* FROM agenzie ";
		$conf_STR_sql .= "  LEFT JOIN regioni ON agenzie.id_regione_agenzia = regioni.id_regione ";
		$conf_STR_sql .= "  LEFT JOIN province ON agenzie.id_provincia_agenzia = province.id_provincia ";
		$conf_STR_sql .= "  LEFT JOIN comuni ON agenzie.id_comune_agenzia = comuni.id_comune ";
		$conf_STR_sql .= "  LEFT JOIN compagnie ON agenzie.id_compagnia_agenzia = compagnie.id_compagnia ";
		$conf_STR_sql .= " WHERE id_agenzia = {$id_agenzia}";

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
			$id_agenzia = $row['id_agenzia'];
			$id_compagnia_agenzia = $row['id_compagnia_agenzia'];
			$ragione_sociale_compagnia = $row['ragione_sociale_compagnia'];
			$ragione_sociale_agenzia = $row['ragione_sociale_agenzia'];
			$partita_iva_agenzia = $row['partita_iva_agenzia'];
			$codice_fiscale_agenzia = $row['codice_fiscale_agenzia'];
			$rui_agenzia = $row['rui_agenzia'];
			$email_agenzia = $row['email_agenzia'];
			$email_sinistri_agenzia = $row['email_sinistri_agenzia'];
			$pec_agenzia = $row['pec_agenzia'];
			$telefono_fisso_agenzia = $row['telefono_fisso_agenzia'];
			$mobile_agenzia = $row['mobile_agenzia'];
			$fax_agenzia = $row['fax_agenzia'];
			$id_regione = $row['id_regione_agenzia'];
			$nome_regione = $row['nome_regione'];
			$id_provincia = $row['id_provincia_agenzia'];
			$nome_provincia = $row['nome_provincia'];
			$id_comune = $row['id_comune_agenzia'];
			$nome_comune = $row['nome_comune'];
			$cap_agenzia = $row['cap_agenzia'];
			$indirizzo_agenzia = $row['indirizzo_agenzia'];
			$personariferimento_agenzia = $row['personariferimento_agenzia'];
			?>


            <div class="jumbotron">
                <div class="container">
                    <h1><?php echo "Agenzia: {$ragione_sociale_agenzia} ({$ragione_sociale_compagnia})"; ?></h1>
                    <!-- Righe di dettaglio -->
                    <!-- inizio prima riga -->
                    <form id="aggiornadati" method="post" action="#" data-toggle="validator">
						<?php echo "<input type=\"hidden\" name=\"id_agenzia\" value=\"{$id_agenzia}\">"; ?></h1>

                        <div class="row">

                            <div class="form-group col-md-6 has-feedback">
                                <label for="personariferimento" class="control-label">Persona di riferimento</label>
                                <input type="text" class="form-control input-sm"
                                       id="personariferimento" name="personariferimento_agenzia"
                                       placeholder="Persona di riferimento"
                                       maxlength="11"
                                       data-minlength="11"
                                       value="<?php echo "{$personariferimento_agenzia}"; ?>"
                                       readonly>

                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-md-3 has-feedback">
                                <label for="piva" class="control-label">P.Iva</label>
                                <input type="text" class="form-control input-sm"
                                       id="piva" name="partita_iva_agenzia"
                                       placeholder="P.Iva"
                                       maxlength="11"
                                       data-minlength="11"
                                       value="<?php echo "{$partita_iva_agenzia}"; ?>"
                                       readonly>

                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-4 has-feedback">
                                <label for="cf" class="control-label">Codice Fiscale</label>
                                <input type="text" class="form-control input-sm"
                                       id="cf" name="codice_fiscale_agenzia"
                                       placeholder="Codice Fiscale"
                                       maxlength="16"
                                       data-minlength="11"
                                       value="<?php echo "{$codice_fiscale_agenzia}"; ?>"
                                       readonly>

                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4 has-feedback">
                                <label for="rui" class="control-label">RUI</label>
                                <input type="text" class="form-control input-sm"
                                       id="rui" name="rui_agenzia"
                                       placeholder="R.U.I."
                                       maxlength="40"
                                       data-minlength="3"
                                       value="<?php echo "{$rui_agenzia}"; ?>"
                                       readonly>

                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-md-6 has-feedback">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" class="form-control input-sm"
                                       id="email" name="email_agenzia"
                                       placeholder="Email"
                                       value="<?php echo "{$email_agenzia}"; ?>"
                                       readonly>

                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-6 has-feedback">
                                <label for="emailsinistri" class="control-label">Email sinistri</label>
                                <input type="email" class="form-control input-sm"
                                       id="emailsinistri" name="email_sinistri_agenzia"
                                       placeholder="Email sinistri"
                                       value="<?php echo "{$email_sinistri_agenzia}"; ?>"
                                       readonly>

                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-6 has-feedback">
                                <label for="pec" class="control-label">PEC</label>
                                <input type="email" class="form-control input-sm"
                                       id="pec" name="pec_agenzia"
                                       placeholder="PEC"
                                       value="<?php echo "{$pec_agenzia}"; ?>"
                                       readonly>

                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 has-feedback">
                                <label for="telefono" class="control-label">Telefono Principale</label>
                                <input type="tel" class="form-control input-sm"
                                       id="telefono"
                                       placeholder="Telefono"
                                       name="telefono_fisso_agenzia"
                                       data-minlength="8"
                                       value="<?php echo "{$telefono_fisso_agenzia}"; ?>"
                                       readonly>

                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group col-md-6 has-feedback">
                                <label for="mobile" class="control-label">Mobile Principale</label>
                                <input type="tel" class="form-control input-sm"
                                       id="mobile" placeholder="Mobile"
                                       name="mobile_agenzia"
                                       data-minlength="8"
                                       value="<?php echo "{$mobile_agenzia}"; ?>"
                                       readonly>

                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-6 has-feedback">
                                <label for="fax" class="control-label">Fax</label>
                                <input type="tel" class="form-control input-sm"
                                       id="fax" placeholder="Fax"
                                       name="fax_agenzia"
                                       data-minlength="8"
                                       value="<?php echo "{$fax_agenzia}"; ?>"
                                       readonly>

                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
						<?php
							$opt = new Database();
						?>
                        <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
                        <script type="text/javascript" src="js/regioniprovincecomuni.js"></script>

                        <div class="row"><!-- inizio seconda riga -->

                            <div class="form-group col-md-4 has-feedback">
                                <label for="regioni" class="control-label">Regione</label>
                                <input class="form-control input-sm" id="regioni" name="id_regione_agenzia"
                                       value="<?php echo "{$nome_regione}"; ?>"
                                       readonly>

                            </div>
                            <div class="form-group col-md-4 has-feedback">
                                <label for="province" class="control-label">Provincia</label>
                                <input class="form-control input-sm" id="province" name="id_provincia_agenzia"
                                       value="<?php echo "{$nome_provincia}"; ?>"
                                       readonly>

                            </div>
                            <div class="form-group col-md-4 has-feedback">
                                <label for="comuni" class="control-label">Comune</label>
                                <input class="form-control input-sm" id="comuni" name="id_comune_agenzia"
                                       value="<?php echo "{$nome_comune}"; ?>"
                                       readonly>

                            </div>
                            <div class="form-group col-md-2 has-feedback">
                                <label for="cap" class="control-label">Cap</label>
                                <input type="text" class="form-control input-sm"
                                       id="cap" placeholder="CAP"
                                       name="cap_agenzia"
                                       value="<?php echo "{$cap_agenzia}"; ?>"
                                       data-minlength="5"
                                       maxlength="5"
                                       readonly>

                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-6 has-feedback">
                                <label for="Indirizzo" class="control-label">Indirizzo</label>
                                <input type="text" class="form-control input-sm"
                                       id="Indirizzo" placeholder="Indirizzo"
                                       name="indirizzo_agenzia"
                                       value="<?php echo "{$indirizzo_agenzia}"; ?>"
                                       data-minlength="5"
                                       readonly>

                                <div class="help-block with-errors"></div>
                            </div>
                            <label for="azioni">Azioni</label>
                            <div class="form-group btn-group col-md-4 btn-block" id="azioni">
                                <!-- un pulsante per chiudere la finestra -->
                                <input type="button" onclick="window.close();"
                                       value="chiudi" data-toggle="tooltip" title="Chiudi la finestra"
                                       class="btn btn-sm btn-success">

                                <a href="agenzia_esistente_modifica.php?idage=<?php echo "{$id_agenzia}"; ?>"
                                   class="btn btn-warning btn-sm" data-toggle="tooltip" title="Modifica Agenzia"
                                   role="button" target="_blank">M</a></div>

                        </div><!-- fine prima riga -->
                    </form>
                </div>
            </div>
		<?php } ?>


        <!-- finita la testata della agenzia, comincia la sezione TAB -->

        <div class="container">

            <ul class="nav nav-pills" id="myTab">
                <li class="active"><a href="#tab1" data-toggle="pill">Mandati</a></li>
                <li><a href="#tab2" data-toggle="pill">Polizze</a></li>
                <li><a href="#tab3" data-toggle="pill">Premi</a></li>
                <li><a href="#tab4" data-toggle="pill">Sinistri</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
					<?php include "mandati_lista.php" ?>
                </div>
                <div class="tab-pane" id="tab2">
					<?php include "polizze_lista.php"; ?>
                </div>
                <div class="tab-pane" id="tab3">
					<?php include "premi_lista.php"; ?>
                </div>
                <div class="tab-pane" id="tab4">
					<?php include "sinistri_lista.php"; ?>
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