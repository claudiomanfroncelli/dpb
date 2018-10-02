<?php include_once "header.php" ?>
<?php include_once "inc/inc.utils.php";//serve per la formattazione della data e dei numeri?>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script type="text/javascript" src="js/compagnie_agenzie_mandati.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="js/jquery-ui.min.js"></script>

    <script src="js/validator.js"></script>
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
			$id_tipopagamento_premio = $row['id_tipopagamento_premio'];
			$rata_premio = $row['rata_premio'];
			$pagato_il_premio = format_data($row['pagato_il_premio']);
			$data_incasso_premio = format_data($row['data_incasso_premio']);
			$provv_liquidata_premio = formato_italiano($row['provv_liquidata_premio']);
			$provv_da_liquidare_premio = formato_italiano($row['provv_da_liquidare_premio']);
			$data_liquidata_premio = format_data($row['data_liquidata_premio']);
			?>

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <!-- Righe di dettaglio -->
            <!-- inizio prima riga -->
            <div class="jumbotron" style="padding-left:15px; padding-right: 0">
                <form id="vedipremio"
                      method="post"
                      action="#"
                      data-toggle="validator">
					<?php echo " <input type=\"hidden\" name=\"id_premio\" value={$id_premio}>"; ?>

                    <div class="row">
                        <div class="form-group col-md-1  margintop15 has-feedback">
                            <label for="rata_premio"
                                   class="control-label">Rata</label>
                            <input type="text"
                                   class="form-control input-sm"
                                   id="rata_premio"
                                   placeholder="Premio Lordo"
                                   name="rata_premio"
                                   value="<?php echo "{$rata_premio}"; ?>"
                                   readonly>
                            <div class="help-block with-errors"></div>


                        </div>
                        <div class="form-group col-md-2  margintop15 has-feedback">
                            <label for="importo_lordo_premio"
                                   class="control-label">Imp.Lordo</label>
                            <input type="text"
                                   class="form-control input-sm"
                                   id="importo_lordo_premio"
                                   placeholder="Premio Lordo"
                                   name="importo_lordo_premio"
                                   maxlength="10"
                                   value="<?php echo "{$importo_lordo_premio}"; ?>"
                                   readonly>
                            <div class="help-block with-errors"></div>


                        </div>

                        <div class="form-group col-md-2 margintop15 has-feedback">
                            <label for="importo_netto_premio"
                                   class="control-label">Imp.Netto</label>
                            <input type="text"
                                   class="form-control input-sm"
                                   id="importo_netto_premio"
                                   placeholder="Premio netto"
                                   name="importo_netto_premio"
                                   maxlength="10"
                                   value="<?php echo "{$importo_netto_premio}"; ?>"
                                   readonly>
                            <div class="help-block with-errors"></div>

                        </div>

                        <div class="col-md-3  margintop15 has-feedback">
                            <label for="scadenza_premio">Scadenza</label>

                            <div class="input-group">
                                <span class="input-group-addon">Il</span>


                                <input type="text"
                                       id="scadenza_premio"
                                       name="scadenza_premio"
                                       class="form-control input-sm datepicker"
                                       aria-label="ds"
                                       placeholder="Giorno/Ora"
                                       value="<?php echo "{$scadenza_premio}"; ?>"
                                       readonly>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="col-md-3  margintop15 has-feedback">
                            <label for="pagato_il_premio">Pagato</label>
                            <div class="input-group">
                                <span class="input-group-addon">Il</span>


                                <input type="text"
                                       id="pagato_il_premio"
                                       name="pagato_il_premio"
                                       class="form-control input-sm datepicker"
                                       aria-label="ds"
                                       placeholder="Giorno/Ora"
                                       value="<?php echo "{$pagato_il_premio}"; ?>"
                                       readonly>

                            </div>
                            <div class="help-block with-errors"></div>

                        </div>
                        <div class="margintop15 form-group col-md-2 has-feedback grassetto">
                            <label for="id_tipopagamento_premio"
                                   class="control-label">Tipo</label>
                            <select class="form-control input-sm" id="id_tipopagamento_premio"
                                    name="id_tipopagamento_premio" readonly>
								<?php
									$sql_tipopagamento = "SELECT * from tipopagamento";

									$dbh->query($sql_tipopagamento);
									$rowstipopagamento = $dbh->resultset();

									$recordstipopagamento = $dbh->rowCount();
									if ($recordstipopagamento > 0) {

										foreach ($rowstipopagamento as $rowtipopagamento) {
											$id_tipopagamento = $rowtipopagamento['id_tipopagamento'];
											$descrizione_tipopagamento = $rowtipopagamento['descrizione_tipopagamento'];
											?>
                                            <option
                                                    value="<?php echo $id_tipopagamento ?>"
												<?php if ($id_tipopagamento == $id_tipopagamento_premio) {
													echo " SELECTED ";
												} ?>
                                            ><?php echo $descrizione_tipopagamento ?></option>
										<?php } ?>
									<?php } ?>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="col-md-3  margintop15 has-feedback">
                            <label for="data_incasso_premio"
                                   class="control-label">Incassato</label>
                            <div class="input-group">
                                <span class="input-group-addon">Il</span>

                                <input type="text"
                                       class="form-control input-sm datepicker"
                                       id="data_incasso_premio"
                                       name="data_incasso_premio"
                                       placeholder="Giorno/Ora"
                                       value="<?php echo "{$data_incasso_premio}"; ?>"
                                       readonly>

                            </div>
                            <div class="help-block with-errors"></div>

                        </div>
                        <div class="form-group col-md-2 margintop15 has-feedback grassetto">
                            <label for="provv_da_liquidare_premio"
                                   class="control-label">Pr.da liquid.</label>
                            <input class="form-control"
                                   id="provv_da_liquidare_premio"
                                   name="provv_da_liquidare_premio"
                                   value="<?php echo "{$provv_da_liquidare_premio}"; ?>"
                                   readonly>

                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-md-2 margintop15 has-feedback grassetto">
                            <label for="provv_liquidata_premio"
                                   class="control-label">Pr.Liquidata</label>
                            <input class="form-control"
                                   id="provv_liquidata_premio"
                                   name="provv_liquidata_premio"
                                   value="<?php echo "{$provv_liquidata_premio}"; ?>"
                                   readonly>

                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group col-md-3 margintop15 has-feedback grassetto">
                            <label for="data_liquidata_premio"
                                   class="control-label">Data Liquidazione</label>
                            <div class="input-group">
                                <span class="input-group-addon">Il</span>
                                <input class="form-control input-sm datepicker"
                                       id="data_liquidata_premio"
                                       name="data_liquidata_premio"
                                       value="<?php echo "{$data_liquidata_premio}"; ?>"
                                       readonly>

                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div><!-- fine prima riga -->


                    <!-- nuova riga per i campi aggiunti ---------------------------->

                    <div class="row">
                    </div>

                    <div class="row">
                        <div class="form-group btn-group col-md-offset-20 col-md-5" id="azioni">
                            <!-- un pulsante per aggiornare i dati della compagnia -->
                            <input type="button" onclick="window.close();"
                                   value="chiudi" data-toggle="tooltip" title="Chiudi la finestra"
                                   class="btn btn-sm btn-success">
                            <a href="premio_esistente_modifica.php?idpol=<?php echo "{$id_polizza_premio}"; ?>&idprem=<?php echo "{$id_premio}"; ?>"
                               class="btn btn-warning btn-sm" data-toggle="tooltip"
                               title="Modifica Premio"
                               role="button" target="_blank">M</a>
                        </div>
                    </div>

                </form><!-- fine form -->
                <div class="container">

                    <ul class="nav nav-pills" id="myTab">
                        <li class="active"><a href="#tab1" data-toggle="pill">Elenco Premi</a></li>
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