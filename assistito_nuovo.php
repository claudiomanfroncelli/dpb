<?php include "header.php"; ?>
    <!--
	ho eliminato il controllo sui dati territoriali di nascita
	script type = "text/javascript" src = "js/select.regioni-province-comuni-nascita.js"></script>-->
    <script type="text/javascript" src="js/select.regioni-province-comuni-abitazione.js"></script>
    <script type="text/javascript" src="js/select.cr-cc-conf.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- script per la gestione delle caselle combinate concatenate -->


<?php // script per la visualizzazione dei tab: dati generali e dati specifici ?>

    <script type="text/javascript">
		$(document).ready(function () {
			$("#tabDati a").click(function (e) {
				e.preventDefault();
				$(this).tab('show');
			});
		});
    </script>


<?php // queries per la popolazione delle caselle combinate

// ------------------- comincia la zona "database Sql693597_1 ------------------

// procedo con un'istanza della Classe Database

	include_once 'Database.class.php';
	$dbh = new Database();
	include_once 'Database.class.php';
	$dbh4 = new Database();

?>
    <!-- js per le date --->
    <script type="text/javascript">

		//script per l'attivazione del calendario Widget DatePicker
		$(function () {
			$("#data_nascita_persona").datepicker({
				dateFormat: "dd-mm-yy",
				changeMonth: true,
				changeYear: true,
				yearRange: '<?php echo date("Y") - 100?>:<?php echo date("Y")?>'
			});
			$("#scadenza_permesso_persona_dett").datepicker({
				dateFormat: "dd-mm-yy",
				changeMonth: true,
				changeYear: true,
				yearRange: '<?php echo date("Y") - 100?>:<?php echo date("Y") + 10 ?>'
			});
			$("#data_carico_persona_dett").datepicker({
				dateFormat: "dd-mm-yy",
				changeMonth: true,
				changeYear: true,
				yearRange: '<?php echo date("Y") - 100?>:<?php echo date("Y") ?>'
			});
			$("#data_stato_persona_dett").datepicker({
				dateFormat: "dd-mm-yy",
				changeMonth: true,
				changeYear: true,
				yearRange: '<?php echo date("Y") - 100?>:<?php echo date("Y") + 2 ?>'
			});

		});
    </script>

    <br>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <form id="nuovoassistito" method="post" action="assistito_nuovo_dati_generali_inserimento.php"
              data-toggle="validator">

            <!-- container con i dati fondamentali --->
            <div class="container verdino">
                <div class="row"><!-- inizio prima riga. Questa riga è comune ai dati generali e specifici -->

                    <div class="form-group col-md-5 has-feedback">
                        <label for="titolo" class="control-label"> </label>
                        <div class="h2" id="titolo">Nuovo Assistito</div>
                        <input id="session_regione_utente" class="hidden"
                               value="<?php echo $_SESSION['regione_utente']; ?>">
                        <input id="session_consiglio_centrale_utente" class="hidden"
                               value="<?php echo $_SESSION['consiglio_centrale_utente']; ?>">
                        <input id="session_conferenza_utente" class="hidden"
                               value="<?php echo $_SESSION['conferenza_utente']; ?>">
                    </div>

                    <div class="form-group col-md-4 has-feedback">
                        <label for="cognome_persona" class="control-label">Cognome Assistito </label>
                        <input type="text" class="form-control"
                               id="cognome_persona" name="cognome_persona"
                               placeholder="Cognome dell'Assistito"
                               data-minlength="3"
                               required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-4 has-feedback">
                        <label for="nome_persona" class="control-label">Nome Assistito </label>
                        <input type="text" class="form-control"
                               id="nome_persona" name="nome_persona"
                               placeholder="Nome dell'Assistito"
                               data-minlength="3"
                               required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-2 has-feedback">
                        <label for="sesso_persona" class="control-label">Sesso</label>
                        <select class="form-control" id="sesso" name="sesso_persona">
                            <option value="F">F</option>
                            <option value="M">M</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-7 has-feedback">
                        <label for="cittadinanza_persona" class="control-label">Cittadinanza</label>
                        <select class="form-control" id="cittadinanza_persona" name="cittadinanza_persona">
							<?php echo $dbh->ShowNazioniCittadinanza(); ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 has-feedback">
                        <label for="riservato_persona" class="control-label">Riservato</label>
                        <select class="form-control" id="riservato_persona" name="riservato_persona">
                            <option value="No">No</option>
                            <option value="Si">Si</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-9 has-feedback">

                        <label for="consigliregionali" class="control-label">Consiglio Regionale</label>
                        <select class="form-control input-sm-small" id="consigliregionali" name="codice_cr">
							<?php echo $dbh4->ShowConsigliRegionali(); ?>
                        </select>
                    </div>

                    <div class="form-group col-md-6 has-feedback">
                        <label for="consiglicentrali" class="control-label">Consiglio Centrale</label>
                        <select class="form-control input-sm-small" id="consiglicentrali" name="codice_cc">
                            <option>Scegli il Consiglio Centrale</option>
                        </select>
                    </div>
                    <div class="form-group col-md-9 has-feedback">

                        <label for="codice_conf_persona" class="control-label">Conferenza</label>
                        <select class="form-control input-sm-small" id="conferenze" name="codice_conf">
                            <option>Scegli la Conferenza</option>
                        </select>
                    </div>
                </div>

            </div>

            <!-- struttura a schede : dati specifici ---->
            <div class="container marroncino">
                <div class="row">

                    <ul class="nav nav-tabs" id="tabDati">
                        <li class="active">
                            <a href="#tab1" data-toggle="tab">Dati Generali</a>
                        </li>
                        <li class="disabled">
                            <a href="#tab2" data-toggle="tab">Dati Specifici</a>
                        </li>
                        <li class="disabled">
                            <a href="#tab3" data-toggle="tab">Situazione</a>
                        </li>
                        <li class="disabled">
                            <a href="#tab4" data-toggle="tab">Rete</a>
                        </li>
                        <li class="disabled">
                            <a href="#tab5" data-toggle="tab">Contatti</a>
                        </li>
                        <li class="disabled">
                            <a href="#tab6" data-toggle="tab">Progetto</a>
                        </li>
                        <li class="disabled">
                            <a href="#tab7" data-toggle="tab">Azioni</a>
                        </li>
                        <li class="disabled">
                            <a href="#tab8" data-toggle="tab">Interventi</a>
                        </li>
                        <li class="disabled">
                            <a href="#tab9" data-toggle="tab">Verifica</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1">
							<?php include("assistito_nuovo_dati_generali.php") ?>
                        </div>
                        <div class="tab-pane fade" id="tab2">
                            <h4>
                                In questo momento la Sezione Dati Specifici non è attiva.<br> Per attivarla devi prima
                                inserire i Dati Generali.
                            </h4>
                        </div>
                        <div class="tab-pane fade" id="tab3">
                            <h4>
                                In questo momento la Sezione Situazione non è attiva.<br> Per attivarla devi prima
                                inserire i Dati Generali.
                            </h4>
                        </div>
                        <div class="tab-pane fade" id="tab4">
                            <h4>
                                In questo momento la Sezione Rete non è attiva.<br> Per attivarla devi prima inserire i
                                Dati Generali.
                            </h4>
                        </div>
                        <div class="tab-pane fade" id="tab5">
                            <h4>
                                In questo momento la Sezione Contatti non è attiva.<br> Per attivarla devi prima
                                inserire i Dati Generali.
                            </h4>
                        </div>
                        <div class="tab-pane fade" id="tab6">
                            <h4>
                                In questo momento la Sezione Progetto non è attiva.<br> Per attivarla devi prima
                                inserire i Dati Generali.
                            </h4>
                        </div>
                        <div class="tab-pane fade" id="tab7">
                            <h4>
                                In questo momento la Sezione Azioni non è attiva.<br> Per attivarla devi prima inserire
                                i Dati Generali.
                            </h4>
                        </div>
                        <div class="tab-pane fade" id="tab8">
                            <h4>
                                In questo momento la Sezione Interventi non è attiva.<br> Per attivarla devi prima
                                inserire i Dati Generali.
                            </h4>
                        </div>
                        <div class="tab-pane fade" id="tab9">
                            <h4>
                                In questo momento la Sezione Verifica non è attiva.<br> Per attivarla devi prima
                                inserire i Dati Generali.
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </form><!-- fine form -->
    </div><!-- fine jumbotron -->
    <!--================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/validator.js"></script>

<?php include "footer.php" ?>