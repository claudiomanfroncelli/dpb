<?php include "header.php" ?>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js/compagnie_agenzie_mandati.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="js/jquery-ui.min.js"></script>
    <!-- seguono le risorse per la gestione dei campi data e ora -->
    <script src="js/validator.js"></script>
    <script>
		function CreaIdentificativoMandato() {
			//alert("The input value has changed. The new value is: " + val);
			var x = $("select#compagnie option:selected").text();
			x = x.substr(0, 3).toUpperCase();
			var y = $("select#agenzie option:selected").text();
			y = y.substr(0, 3).toUpperCase();
			var z = document.getElementById("inizio_mandato").value;
			z = z.substr(z.length - 7);
			var q = document.getElementById("identificativomandato");
			//alert("x in questo momento vale: "+ x);
			//alert("y in questo momento vale: "+ y);
			//alert("z in questo momento vale: "+ z);
			q.value = x + "/" + y + "/" + z;
			//alert("q in questo momento vale: "+ q.value);
		}
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
	include_once 'class/SelectCompagnieAgenzieMandati.class.php';
	$comp = new SelectCompagnieAgenzieMandati();
?>
<?php
	include_once 'class/SelectOrarioCopertura.class.php';
	$ora = new SelectOrarioCopertura();
?>
<?php
	include_once 'class/SelectRimessaPremi.class.php';
	$rim = new SelectRimessaPremi();
?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <fieldset class="container">
            <form id="nuovomandato"
                  method="post"
                  action="mandato_nuovo_inserimento.php"
                  data-toggle="validator">
                <div class="row">
                    <h2>Nuovo Mandato</h2>
                    <!-- inizio prima riga -->

                    <div class="form-group col-md-6 has-feedback grassetto">
                        <label for="compagnie"
                               class="control-label">Compagnia</label>
                        <select class="form-control"
                                id="compagnie"
                                name="id_compagnia_mandato"
                                required>
							<?php echo $comp->ShowCompagnie(); ?>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4 has-feedback grassetto">
                        <label for="agenzie"
                               class="control-label">Agenzia</label>
                        <select class="form-control"
                                id="agenzie"
                                name="id_agenzia_mandato"
                                required>

                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-3 has-feedback">
                        <label for="inizio_mandato">Inizio Mandato</label>

                        <div class="input-group">
                            <span class="input-group-addon">Il</span>


                            <input type="text"
                                   id="inizio_mandato"
                                   name="inizio_mandato"
                                   class="form-control input-sm datepicker"
                                   aria-label="ds"
                                   placeholder="Inizia il"
                                   onchange="CreaIdentificativoMandato()">
                        </div>
                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="col-md-3 has-feedback">
                        <label for="fine_mandato">Fine Mandato</label>

                        <div class="input-group">
                            <span class="input-group-addon">Il</span>


                            <input type="text"
                                   id="fine_mandato"
                                   name="fine_mandato"
                                   class="form-control input-sm datepicker"
                                   aria-label="ds"
                                   placeholder="Scade il">
                        </div>
                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="form-group col-md-4 has-feedback">
                        <label for="identificativomandato"
                               class="control-label">Identificativo Mandato</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="identificativomandato"
                               placeholder="Mandato"
                               name="identificativo_mandato"
                               maxlength="100"
                        >
                        <div class="help-block with-errors"></div>
                    </div>


                </div><!-- fine riga -->

                <div class="row">
                    <div class="marroncino col-md-12">

                        <div class="col-md-4 has-feedback">
                            <label for="provvallrisks"
                                   class="control-label-small">All Risks</label>
                            <input type="text"
                                   class="form-control input-sm"
                                   id="provvallrisks"
                                   placeholder="Provvigioni"
                                   name="provvallrisks_mandato"
                            > <span class="glyphicon form-control-feedback"
                                    aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="col-md-4 has-feedback">
                            <label for="provvcar"
                                   class="control-label">C.A.R.</label>
                            <input type="text"
                                   class="form-control input-sm"
                                   id="provvcar"
                                   placeholder="Provvigioni"
                                   name="provvcar_mandato"
                            > <span class="glyphicon form-control-feedback"
                                    aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>

                        </div>
                        <div class="col-md-4 has-feedback">
                            <label for="provvcauz"
                                   class="control-label">Cauzione</label>
                            <input type="text"
                                   class="form-control input-sm"
                                   id="provvcauz"
                                   placeholder="Provvigioni"
                                   name="provvcauz_mandato"
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
                                   name="provvfro_mandato"
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
                                   name="provvfineart_mandato"
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
                                   name="provvkasko_mandato"
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
                                   name="provvgfabbricati_mandato"
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
                                   name="provvgcomm_mandato"
                            >
                        </div>

                        <div class="form-group col-md-8">
                            <label for="provvgabitazione"
                                   class="control-label">G.Abitazione</label>
                            <input type="text"
                                   class="form-control input-sm"
                                   id="provvgabitazione"
                                   placeholder="Provvigioni"
                                   name="provvgabitazione_mandato"
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
                                   name="provvincord_mandato"
                            >
                        </div>
                        <div class="form-group col-md-8">
                            <label for="provvincind"
                                   class="control-label">Incendio Ind</label>
                            <input type="text"
                                   class="form-control input-sm"
                                   id="provvincind"
                                   placeholder="Provvigioni"
                                   name="provvincind_mandato"
                            >
                        </div>
                        <div class="form-group col-md-8 has-feedback">
                            <label for="provvtutlegale"
                                   class="control-label">Tut. Legale</label>
                            <input type="text"
                                   class="form-control input-sm"
                                   id="provvtutlegale"
                                   placeholder="Provvigioni"
                                   name="provvtutlegale_mandato"
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
                                   class="control-label">Infortuni inab. temp</label>
                            <input type="text"
                                   class="form-control input-sm"
                                   id="provvinabiltemp"
                                   placeholder="Provvigioni"
                                   name="provvinabiltemp_mandato"
                            >
                        </div>

                        <div class="form-group col-md-12 has-feedback">
                            <label for="provvnoinabiltemp"
                                   class="control-label">Infortuni no temp.</label>
                            <input type="text"
                                   class="form-control input-sm"
                                   id="provvnoinabiltemp"
                                   placeholder="Provvigioni"
                                   name="provvnoinabiltemp_mandato"
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
                                   name="provvrcinquinamento_mandato"
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
                                   name="provvrccapofam_mandato"
                            > <span class="glyphicon form-control-feedback"
                                    aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>

                        </div>
                        <div class="form-group col-md-3 has-feedback">
                            <label for="provvrcauto"
                                   class="control-label">RCAuto</label>
                            <input type="text"
                                   class="form-control input-sm"
                                   id="provvrcauto"
                                   placeholder="Provvigioni"
                                   name="provvrcauto_mandato"
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
                                   name="provvrcalibmat_mandato"
                            > <span class="glyphicon form-control-feedback"
                                    aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>

                        </div>
                        <div class="form-group col-md-3 has-feedback">
                            <label for="provvrcrord"
                                   class="control-label">RC R.Ord</label>
                            <input type="text"
                                   class="form-control input-sm"
                                   id="provvrcrord"
                                   placeholder="Provvigioni"
                                   name="provvrcrord_mandato"
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
                                   name="provvrcprof_mandato"
                            > <span class="glyphicon form-control-feedback"
                                    aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>

                        </div>
                        <div class="form-group col-md-3 has-feedback">
                            <label for="provvrcpatgrave"
                                   class="control-label">RC Patr. Grave</label>
                            <input type="text"
                                   class="form-control input-sm"
                                   id="provvrcpatgrave"
                                   placeholder="Provvigioni"
                                   name="provvrcpatgrave_mandato"
                            > <span class="glyphicon form-control-feedback"
                                    aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>

                        </div>
                        <div class="form-group col-md-3 has-feedback">
                            <label for="provvrcpatlieve"
                                   class="control-label">Rc Patr. Lieve</label>
                            <input type="text"
                                   class="form-control input-sm"
                                   id="provvrcpatlieve"
                                   placeholder="Provvigioni"
                                   name="provvrcpatlieve_mandato"
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
                                name="id_copertura_mandato">
							<?php echo $ora->ShowOrarioCopertura(); ?>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-5 has-feedback">
                        <label for="faxcopertura" class="control-label">Fax</label>
                        <input class="form-control input-sm"
                               id="faxcopertura"
                               name="fax_copertura_mandato">
                    </div>
                    <div class="form-group col-md-6 has-feedback">
                        <label for="emailcopertura" class="control-label">Email/PEC</label>
                        <input class="form-control input-sm"
                               id="emailcopertura"
                               name="email_copertura_mandato">
                    </div>
                    <div class="form-group col-md-5 has-feedback">
                        <label for="rimessapremi" class="control-label">Rimessa Premi</label>
                        <select class="form-control input-sm"
                                id="rimessapremi"
                                name="id_rimessa_premi_mandato"
                        >
							<?php echo $rim->ShowRimessaPremi(); ?>
                        </select>

                    </div>
                    <div class="form-group col-md-2 has-feedback">
                        <label for="provvigioniincasso" class="control-label">Prov.incasso</label>
                        <input type="text" class="form-control input-sm"
                               id="provvigioniincasso" placeholder="%"
                               name="provvigioni_incasso_mandato"
                        >
                    </div>
                </div>

                <div class="row celestino">
                    <div class="form-group col-md-2"><br>Premi</div>
                    <div class="form-group col-md-3 has-feedback">
                        <label for="conto1" class="control-label">Conto 1</label>
                        <input type="text" class="form-control input-sm"
                               id="conto1"
                               name="conto1_mandato">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4 has-feedback">
                        <label for="ibanconto1" class="control-label">IBAN Conto1</label>
                        <input type="text" class="form-control input-sm"
                               id="ibanconto1"
                               name="ibanconto1_mandato"
                               minlength="27"
                               maxlength="27">
                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="form-group col-md-3 has-feedback">
                        <label for="conto2" class="control-label">Conto 2</label>
                        <input type="text" class="form-control input-sm"
                               id="conto2"
                               name="conto2_mandato">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4 has-feedback">
                        <label for="ibanconto2" class="control-label">IBAN Conto2</label>
                        <input type="text" class="form-control input-sm"
                               id="ibanconto2"
                               name="ibanconto2_mandato"
                               minlength="27"
                               maxlength="27">
                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="form-group col-md-3 has-feedback">
                        <label for="conto3" class="control-label">Conto 3</label>
                        <input type="text" class="form-control input-sm"
                               id="conto3"
                               name="conto3_mandato">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4 has-feedback">
                        <label for="ibanconto3" class="control-label">IBAN Conto3</label>
                        <input type="text" class="form-control input-sm"
                               id="ibanconto3"
                               name="ibanconto3_mandato"
                               minlength="27"
                               maxlength="27">
                        <div class="help-block with-errors"></div>

                    </div>
                </div>

                <div class="row"> <!-- inizio riga pulsanti -->

                    <div class="form-group col-md-20"></div>

                    <div class="form-group col-md-2">
                        <label>Conferma</label>
                        <button
                                class="btn btn-danger btn-sm"
                                type="submit"
                        >Inserimento
                        </button>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Annulla</label>
                        <button
                                class="btn btn-danger btn-sm"
                                type="reset"
                        >Reset
                        </button>
                    </div>

                </div> <!-- fine riga RCT RCO -->
            </form>
        </fieldset>
    </div><!-- fine jumbotron -->


    <!--================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<?php include "footer.php" ?>