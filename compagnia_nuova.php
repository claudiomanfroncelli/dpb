<?php include_once "header.php" ?>
    <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="js/regioniprovincecomuni.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/validator.js"></script>
    <script>
		function ScriviCodFisc(val) {
			//alert("The input value has changed. The new value is: " + val);
			var x = document.getElementById("partita_iva");
			var y = document.getElementById("codice_fiscale");
			//alert("partita iva in questo momento vale: "+ x.value);
			y.value = x.value.toUpperCase();
			//alert("codice fiscale in questo momento vale: "+ y.value);
		}
    </script>


<?php
	include 'class/Database.class.php';
	$reg = new Database();
?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1>Nuova Compagnia</h1>
            <!-- Righe di dettaglio -->
            <!-- inizio prima riga -->
            <form id="formnuovacompagnia" method="post" action="compagnia_nuova_inserimento.php"
                  data-toggle="validator">
                <div class="row">
                    <div class="form-group col-md-6 has-feedback">
                        <label for="ragionesocialecompagnia" class="control-label">Compagnia</label>
                        <input type="text" class="form-control input-sm"
                               id="ragionesocialecompagnia" name="ragione_sociale_compagnia"
                               placeholder="Ragione Sociale Compagnia"
                               data-minlength="3"
                               required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-3 has-feedback">
                        <label for="partita_iva" class="control-label">Partita Iva</label>
                        <input type="text" class="form-control input-sm"
                               id="partita_iva" name="partita_iva_compagnia"
                               placeholder="Partita Iva"
                               maxlength="11"
                               data-minlength="11"
                               onchange="ScriviCodFisc(this.value)"
                        >
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4 has-feedback">
                        <label for="codice_fiscale" class="control-label">Codice Fiscale</label>
                        <input type="text" class="form-control input-sm"
                               id="codice_fiscale" name="codice_fiscale_compagnia"
                               placeholder="Codice Fiscale"
                               maxlength="16"
                               data-minlength="11"
                        >
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-6 has-feedback">
                        <label for="personariferimento" class="control-label">Persona di Riferimento</label>
                        <input type="text" class="form-control input-sm"
                               id="personariferimento" name="personariferimento_compagnia"
                               placeholder="Persona di Riferimento"
                               maxlength="40"
                               data-minlength="5">
                        <div class="help-block with-errors"></div>
                    </div>
                </div><!-- fine prima riga -->

                <div class="row">
                    <div class="form-group col-md-5 has-feedback">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" class="form-control input-sm"
                               id="email" name="email_compagnia"
                               placeholder="Email">

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-5 has-feedback">
                        <label for="pec" class="control-label">PEC</label>
                        <input type="email" class="form-control input-sm"
                               id="pec" name="pec_compagnia"
                               placeholder="PEC">

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4 has-feedback">
                        <label for="telefono" class="control-label">Telefono Principale</label>
                        <input type="tel" class="form-control input-sm"
                               id="telefono"
                               placeholder="Telefono"
                               name="telefono_fisso_compagnia"
                               data-minlength="8">

                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="form-group col-md-4 has-feedback">
                        <label for="mobile" class="control-label">Mobile Principale</label>
                        <input type="tel" class="form-control input-sm"
                               id="mobile" placeholder="Mobile"
                               name="mobile_compagnia"
                               data-minlength="8">

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4 has-feedback">
                        <label for="fax" class="control-label">Fax</label>
                        <input type="tel" class="form-control input-sm"
                               id="fax" placeholder="Fax"
                               name="fax_compagnia"
                               data-minlength="8">

                        <div class="help-block with-errors"></div>
                    </div>
                </div><!-- fine seconda riga -->

                <div class="row">
                    <div class="form-group col-md-4 has-feedback">
                        <label for="regioni" class="control-label">Regione</label>
                        <select class="form-control" id="regioni" name="id_regione_compagnia">
							<?php echo $reg->ShowRegioni(); ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 has-feedback">
                        <label for="province" class="control-label">Provincia</label>
                        <select class="form-control" id="province" name="id_provincia_compagnia">
                        </select>
                    </div>
                    <div class="form-group col-md-5 has-feedback">
                        <label for="comuni" class="control-label">Comune</label>
                        <select class="form-control" id="comuni" name="id_comune_compagnia">
                        </select>
                    </div>
                    <div class="form-group col-md-2 has-feedback">
                        <label for="cap" class="control-label">Cap</label>
                        <input type="text" class="form-control input-sm"
                               id="cap" placeholder="CAP"
                               name="cap_compagnia"
                               data-minlength="5"
                               maxlength="5">

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-6 has-feedback">
                        <label for="Indirizzo" class="control-label">Indirizzo</label>
                        <input type="text" class="form-control input-sm"
                               id="Indirizzo" placeholder="Indirizzo"
                               name="indirizzo_compagnia"
                               data-minlength="5">

                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="form-group col-md-2">
                        <label>Conferma</label>
                        <button
                                class="btn btn-danger btn-sm" type="submit"
                        >Inserimento
                        </button>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Annulla</label>
                        <button
                                class="btn btn-danger btn-sm" type="reset"
                        >Reset
                        </button>
                    </div>
                </div><!-- fine terza riga -->
            </form><!-- fine form -->
        </div><!-- fine container -->
    </div><!-- fine jumbotron -->

    <!--================================================== -->

<?php include "footer.php" ?>