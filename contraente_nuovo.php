<?php include_once "header.php" ?>
    <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="js/regioniprovincecomuni_nascita.js"></script>
    <script type="text/javascript" src="js/regioniprovincecomuni_residenza.js"></script>
    <script type="text/javascript" src="js/regioniprovincecomuni_corrispondenza.js"></script>
    <script type="text/javascript" src="js/compagnie_agenzie_contraenti.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/validator.js"></script>
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

    <script>
		function ScriviCodFisc(val) {
			//alert("The input value has changed. The new value is: " + val);
			var x = document.getElementById("partita_iva");
			var y = document.getElementById("codice_fiscale");
			//alert("piva in questo momento vale: "+ x.value);
			y.value = x.value.toUpperCase();
		}
    </script>
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

<?php
	include_once 'class/SelectCompagnieAgenzieContraenti.class.php';
	$comp = new SelectCompagnieAgenzieContraenti();
?>
<?php
	include_once 'class/Database.class.php';
	$nas = new Database();
?>
<?php
	include_once 'class/SelectTipoDocumento.class.php';
	$tipo = new SelectTipoDocumento();
?>
<?php
	$res = new Database();
?>
<?php
	$corr = new Database();
?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1>Nuovo Contraente</h1>
            <!-- Righe di dettaglio -->
            <!-- inizio prima riga -->

            <form id="nuovocontraente" method="post" action="contraente_nuovo_inserimento.php"
                  data-toggle="validator">
                <div class="row">

                    <div class="form-group col-md-2 has-feedback">
                        <label for="qualificacontraente" class="control-label">Qualifica</label>
                        <input type="text" class="form-control input-sm"
                               id="qualifica_contraente" name="qualifica_contraente"
                               placeholder="Qual."
                               data-minlength="2"
                        >

                        <div class="help-block with-errors"></div>
                    </div>


                    <div class="form-group col-md-6 has-feedback">
                        <label for="cognomecontraente" class="control-label">Ragione sociale o Cognome
                            contraente</label>
                        <input type="text" class="form-control input-sm"
                               id="cognomecontraente" name="cognome_contraente"
                               placeholder="Ragione Sociale o Cognome Contraente"
                               data-minlength="3"
                               required>

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-5 has-feedback">
                        <label for="nomecontraente" class="control-label">Nome contraente</label>
                        <input type="text" class="form-control input-sm"
                               id="nomecontraente" name="nome_contraente"
                               placeholder="Nome del Contraente"
                               data-minlength="3"
                        >

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-1 has-feedback">
                        <label for="personafisicacontraente" class="control-label">P.fis.</label>
                        <input type="hidden" name="personafisica_contraente" value="0">
                        <input type="checkbox" class="form-control input-sm"
                               id="personafisica_contraente"
                               name="personafisica_contraente"
                               value="1">
                    </div>
                    <div class="form-group col-md-2 has-feedback">
                        <label for="privacy" class="control-label">&nbsp; &nbsp; Privacy</label>
                        <input type="hidden" name="privacy_contraente" value="0">
                        <input type="checkbox" class="form-control input-sm"
                               id="privacy_contraente"
                               name="privacy_contraente"
                               value="1">
                    </div>
                    <div class="form-group col-md-3 has-feedback">
                        <label for="partita_iva_contraente" class="control-label">Partita Iva</label>
                        <input type="text" class="form-control input-sm"
                               id="partita_iva" name="partita_iva_contraente"
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
                               id="codice_fiscale" name="codice_fiscale_contraente"
                               placeholder="Codice Fiscale"
                               maxlength="16"
                               data-minlength="11"
                        >

                        <div class="help-block with-errors"></div>
                    </div>

                </div>

                <div class="row">
                    <div class="giallino col-md-23">

                        <div class="form-group col-md-3"><br>Nascita:</div>
                        <div class="form-group col-md-4 has-feedback">
                            <label for="regioni" class="control-label">Regione</label>
                            <select class="form-control input-sm" id="regioninascita"
                                    name="id_regione_nascita_contraente">
								<?php echo $nas->ShowRegioniNascita(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4 has-feedback">
                            <label for="province" class="control-label">Provincia</label>
                            <select class="form-control input-sm" id="provincenascita"
                                    name="id_provincia_nascita_contraente">
                            </select>
                        </div>
                        <div class="form-group col-md-5 has-feedback">
                            <label for="comuni" class="control-label">Comune</label>
                            <select class="form-control input-sm" id="comuninascita"
                                    name="id_comune_nascita_contraente">
                            </select>
                        </div>
                        <div class="form-group col-md-3 has-feedback">
                            <label for="datanascita" class="control-label">Data di Nascita </label>
                            <input type="text"
                                   class="form-control input-sm datepicker"
                                   id="datanascita"
                                   name="data_nascita_contraente"
                                   placeholder="Data di Nascita"
                            >

                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-md-2 has-feedback">
                            <label for="tipodocumentocontraente" class="control-label">Tipo Doc.</label>
                            <select class="form-control input-sm" id="tipodocumento" name="id_tipodocumento_contraente">
								<?php echo $tipo->ShowTipoDocumento(); ?>
                            </select>


                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group col-md-3 has-feedback">
                            <label for="numerodocumentocontraente" class="control-label">Numero</label>
                            <input type="text" class="form-control input-sm"
                                   id="numerodocumentocontraente" name="numero_documento_contraente"
                                   placeholder="Num.Doc."
                            >

                            <div class="help-block with-errors"></div>
                        </div>

                    </div>

                </div><!-- fine terza riga -->
                <div class="row">
                    <div class="verdino col-md-23">

                        <div class="form-group col-md-3 margintop15">Residenza /<br>Sede Legale</div>
                        <div class="form-group col-md-4 has-feedback">
                            <label for="regioniresidenza" class="control-label">Regione</label>
                            <select class="form-control input-sm"
                                    id="regioniresidenza"
                                    name="id_regione_residenza_contraente">
								<?php echo $res->ShowRegioniResidenza(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4 has-feedback">
                            <label for="provinceresidenza" class="control-label">Provincia</label>
                            <select class="form-control input-sm" id="provinceresidenza"
                                    name="id_provincia_residenza_contraente">
                            </select>
                        </div>
                        <div class="form-group col-md-5 has-feedback">
                            <label for="comuniresidenza" class="control-label">Comune</label>
                            <select class="form-control input-sm" id="comuniresidenza"
                                    name="id_comune_residenza_contraente">
                            </select>
                        </div>
                        <div class="form-group col-md-2 has-feedback">
                            <label for="capresidenza" class="control-label">Cap</label>
                            <input type="text" class="form-control input-sm"
                                   id="capresidenza" placeholder="CAP"
                                   name="cap_residenza_contraente"
                                   data-minlength="5"
                                   maxlength="5">

                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-md-6 has-feedback">
                            <label for="indirizzoresidenza" class="control-label">Indirizzo</label>
                            <input type="text" class="form-control input-sm"
                                   id="indirizzoresidenza" placeholder="Indirizzo"
                                   name="indirizzo_residenza_contraente"
                                   data-minlength="5">

                            <div class="help-block with-errors"></div>

                        </div>
                    </div>

                </div><!-- fine terza riga -->

                <div class="row">
                    <div class="marroncino col-md-23">
                        <div class="form-group col-md-3 margintop15">Corrispondenza /<br>Sede Operativa</div>
                        <div class="form-group col-md-4 has-feedback">
                            <label for="regionicorrispondenza" class="control-label">Regione</label>
                            <select class="form-control input-sm" id="regionicorrispondenza"
                                    name="id_regione_corrispondenza_contraente">
								<?php echo $corr->ShowRegioniCorrispondenza(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4 has-feedback">
                            <label for="provincecorrispondenza" class="control-label">Provincia</label>
                            <select class="form-control input-sm" id="provincecorrispondenza"
                                    name="id_provincia_corrispondenza_contraente">
                            </select>
                        </div>
                        <div class="form-group col-md-5 has-feedback">
                            <label for="comunicorrispondenza" class="control-label">Comune</label>
                            <select class="form-control input-sm" id="comunicorrispondenza"
                                    name="id_comune_corrispondenza_contraente">
                            </select>
                        </div>
                        <div class="form-group col-md-2 has-feedback">
                            <label for="capcorrispondenza" class="control-label">Cap</label>
                            <input type="text" class="form-control input-sm"
                                   id="capCorrispondenza" placeholder="CAP"
                                   name="cap_corrispondenza_contraente"
                                   data-minlength="5"
                                   maxlength="5">

                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-md-6 has-feedback">
                            <label for="indirizzocorrispondenza" class="control-label">Indirizzo</label>
                            <input type="text" class="form-control input-sm"
                                   id="Indirizzocorrispondenza" placeholder="Indirizzo"
                                   name="indirizzo_corrispondenza_contraente"
                                   data-minlength="5">

                            <div class="help-block with-errors"></div>

                        </div>
                    </div>
                </div><!-- fine terza riga -->

                <div class="row">
                    <div class="form-group col-md-5 has-feedback">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" class="form-control input-sm"
                               id="email" name="email_contraente"
                               placeholder="Email">

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-5 has-feedback">
                        <label for="pec" class="control-label">PEC</label>
                        <input type="email" class="form-control input-sm"
                               id="pec" name="pec_contraente"
                               placeholder="PEC">

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4 has-feedback">
                        <label for="telefono" class="control-label">Telefono Principale</label>
                        <input type="tel" class="form-control input-sm"
                               id="telefono"
                               placeholder="Telefono"
                               name="telefono_fisso_contraente"
                               data-minlength="8">

                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="form-group col-md-4 has-feedback">
                        <label for="mobile" class="control-label">Mobile Principale</label>
                        <input type="tel" class="form-control input-sm"
                               id="mobile" placeholder="Mobile"
                               name="mobile_contraente"
                               data-minlength="8">

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4 has-feedback">
                        <label for="fax" class="control-label">Fax</label>
                        <input type="tel" class="form-control input-sm"
                               id="fax" placeholder="Fax"
                               name="fax_contraente"
                               data-minlength="8">

                        <div class="help-block with-errors"></div>
                    </div>
                </div><!-- fine seconda riga -->

                <div class=row>
                    <div class="form-group col-md-5 has-feedback">
                        <label for="professione" class="control-label">Professione</label>
                        <input type="text" class="form-control input-sm"
                               id="professione" name="professione_contraente"
                               placeholder="Professione"
                        >

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-5 has-feedback">
                        <label for="sito" class="control-label">Sito</label>
                        <input type="text" class="form-control input-sm"
                               id="sito" name="sito_contraente"
                               placeholder="Sito"
                        >

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-1 has-feedback">
                        <label for="modulo7a7b" class="control-label">7a7b</label>
                        <input type="hidden" name="modulo7a7bcontraente" value="0">
                        <input type="checkbox" class="form-control input-sm"
                               id="modulo7a7b"
                               name="modulo_7a7b_contraente"
                               value="1">
                    </div>
                    <div class="form-group btn-group col-md-3">
                        <label>Conferma</label>
                        <button
                                class=" btn btn-danger btn-sm" type="submit"
                        >Inserimento
                        </button>
                    </div>
                    <div class="form-group col-md-2">

                        <label>Annulla</label>
                        <button
                                class="btn btn-danger btn-group btn-sm" type="reset"
                        >Reset
                        </button>
                    </div>
                </div>
            </form><!-- fine form -->
        </div><!-- fine container -->
    </div><!-- fine jumbotron -->

    <!--================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<?php include "footer.php" ?>