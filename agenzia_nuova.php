<?php include "header.php" ?>
    <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="js/regioniprovincecomuni.js"></script>
    <script type="text/javascript" src="js/compagnie_agenzie_contraenti.js"></script>
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
    <script>
		function ScriviEmailSinistri(val) {
			//alert("The input value has changed. The new value is: " + val);
			var z = document.getElementById("email");
			var q = document.getElementById("emailsinistri");
			//alert("partita iva in questo momento vale: "+ x.value);
			q.value = z.value;
			//alert("codice fiscale in questo momento vale: "+ y.value);
		}
    </script>


<?php
	include_once 'class/SelectCompagnieAgenzieContraenti.class.php';
	$comp = new SelectCompagnieAgenzieContraenti();
?>
<?php
	include_once 'class/Database.class.php';
	$reg = new Database();
?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1>Nuova Agenzia</h1>
            <!-- Righe di dettaglio -->
            <!-- inizio prima riga -->
            <form id="nuovaagenzia" method="post" action="agenzia_nuova_inserimento.php"
                  data-toggle="validator">
                <div class="row">
                    <div class="form-group col-md-6 has-feedback">
                        <label for="compagnia" class="control-label">Compagnia</label>
                        <select class="form-control" id="compagnie" name="id_compagnia_agenzia">
							<?php echo $comp->ShowCompagnie(); ?>
                        </select>

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-6 has-feedback">
                        <label for="agenzia" class="control-label">Agenzia</label>
                        <input type="text" class="form-control input-sm"
                               id="agenzie" name="ragione_sociale_agenzia"
                               placeholder="Ragione Sociale Agenzia"
                               data-minlength="3"
                               required>

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-3 has-feedback">
                        <label for="piva" class="control-label">P.Iva</label>
                        <input type="text" class="form-control input-sm"
                               id="partita_iva" name="partita_iva_agenzia"
                               placeholder="P.Iva"
                               maxlength="11"
                               data-minlength="11"
                               onchange="ScriviCodFisc(this.value)"
                        >

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4 has-feedback">
                        <label for="cf" class="control-label">Codice Fiscale</label>
                        <input type="text" class="form-control input-sm"
                               id="codice_fiscale" name="codice_fiscale_agenzia"
                               placeholder="Codice Fiscale"
                               maxlength="16"
                               data-minlength="11"
                        >

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-5 has-feedback">
                        <label for="personariferimento" class="control-label">Persona di Riferimento</label>
                        <input type="text" class="form-control input-sm"
                               id="personariferimento" name="personariferimento_agenzia"
                               placeholder="Persona di Riferimento"
                               maxlength="40"
                               data-minlength="5">

                        <div class="help-block with-errors"></div>
                    </div>
                </div><!-- fine prima riga -->
                <div class="row">
                    <div class="form-group col-md-4 has-feedback">
                        <label for="rui" class="control-label">RUI</label>
                        <input type="text" class="form-control input-sm"
                               id="rui" name="rui_agenzia"
                               placeholder="R.U.I."
                               maxlength="40"
                               data-minlength="3">

                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-6 has-feedback">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" class="form-control input-sm"
                               id="email" name="email_agenzia"
                               placeholder="Email"
                               onchange="ScriviEmailSinistri(this.value)"
                        >

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-6 has-feedback">
                        <label for="emailsinistri" class="control-label">Email sinistri</label>
                        <input type="email" class="form-control input-sm"
                               id="emailsinistri" name="email_sinistri_agenzia"
                               placeholder="Email sinistri">

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-6 has-feedback">
                        <label for="pec" class="control-label">PEC</label>
                        <input type="email" class="form-control input-sm"
                               id="pec" name="pec_agenzia"
                               placeholder="PEC">

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
                               data-minlength="8">

                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="form-group col-md-6 has-feedback">
                        <label for="mobile" class="control-label">Mobile Principale</label>
                        <input type="tel" class="form-control input-sm"
                               id="mobile" placeholder="Mobile"
                               name="mobile_agenzia"
                               data-minlength="8">

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-6 has-feedback">
                        <label for="fax" class="control-label">Fax</label>
                        <input type="tel" class="form-control input-sm"
                               id="fax" placeholder="Fax"
                               name="fax_agenzia"
                               data-minlength="8">

                        <div class="help-block with-errors"></div>
                    </div>
                </div><!-- fine seconda riga -->

                <div class="row">
                    <div class="form-group col-md-4 has-feedback">
                        <label for="regioni" class="control-label">Regione</label>
                        <select class="form-control" id="regioni" name="id_regione_agenzia">
							<?php echo $reg->ShowRegioni(); ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 has-feedback">
                        <label for="province" class="control-label">Provincia</label>
                        <select class="form-control" id="province" name="id_provincia_agenzia">
                        </select>
                    </div>
                    <div class="form-group col-md-5 has-feedback">
                        <label for="comuni" class="control-label">Comune</label>
                        <select class="form-control" id="comuni" name="id_comune_agenzia">
                        </select>
                    </div>
                    <div class="form-group col-md-2 has-feedback">
                        <label for="cap" class="control-label">Cap</label>
                        <input type="text" class="form-control input-sm"
                               id="cap" placeholder="CAP"
                               name="cap_agenzia"
                               data-minlength="5"
                               maxlength="5">

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-6 has-feedback">
                        <label for="Indirizzo" class="control-label">Indirizzo</label>
                        <input type="text" class="form-control input-sm"
                               id="Indirizzo" placeholder="Indirizzo"
                               name="indirizzo_agenzia"
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
    <!-- Placed at the end of the document so the pages load faster -->

<?php include "footer.php" ?>