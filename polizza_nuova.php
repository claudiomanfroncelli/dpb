<?php include_once "header.php" ?>
<?php include_once "inc/inc.utils.php";//serve per la formattazione della data?>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript"
            src="js/compagnie_agenzie_mandati.js"></script>

    <!--script type="text/javascript"
            src="select.contraenti.js"></script-->
    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="js/jquery-ui.min.js"></script>
    <!-- seguono le risorse per la gestione dei campi data e ora -->
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
		})
    </script>

    <script>
		function PopolaTipoRischio() {
			//alert("The input value has changed. The new value is: bubbu");
			var x = $("#mandati").serialize();
			//var y = "&" + $("#id_tiporischio_polizza").serialize();
			alert("mandati in questo momento vale: " + x);
			//alert("id_tiporischio in questo momento vale: " + y);
			var dati = x;
			alert("dati in questo momento vale: " + dati);
			//return;
			//form invio dati post ajax
			//invio
			$.ajax({
				type: "POST",
				url: "polizza_nuova_popola_tipo_rischio.php",
				data: dati,
				dataType: "html",
				success: function (msg) {
					alert("sono di ritorno in ajax");
					$("#tiporischio").html(msg);
				},
				error: function () {
					alert("Chiamata fallita, si prega di riprovare...");
				}
			});//ajax
		}
    </script>

    <script>
		function CalcolaProvvigioni() {
			//alert("The input value has changed. The new value is: bubbu");
			var x = $("#mandati").serialize();
			var y = "&" + $("#id_tiporischio_polizza").serialize();
			//alert("mandati in questo momento vale: " + x);
			//alert("id_tiporischio in questo momento vale: " + y);
			var dati = x + y;
			//alert("dati in questo momento vale: " + dati);
			//form invio dati post ajax
			//invio
			$.ajax({
				type: "POST",
				url: "polizza_nuova_recupera_provvigioni.php",
				data: dati,
				dataType: "html",
				success: function (msg) {
					//alert("sono di ritorno in ajax");
					$("#provvigioni_broker_polizza").val(msg);
				},
				error: function () {
					alert("Chiamata fallita, si prega di riprovare...");
				}
			});//ajax
		}
    </script>

    <script>
		function CalcolaPrimoTermine() {
			var decorrenza = document.getElementById("decorrenza_polizza").value;
			document.getElementById("termine_primo_premio_polizza").value = decorrenza;
		}
    </script>

    <!--todo    inserire la gestione date jquery in tutte le maschere che gestiscono date -->
    <!--todo	inserire js calcolo giorni di mora + decorrenzaq-->

<?php
	include_once 'class/SelectCompagnieAgenzieMandati.class.php';
	$comp = new SelectCompagnieAgenzieMandati();
?>
<?php
	include_once 'class/Database.class.php';
	$cont = new Database();
?>
<?php
	include_once 'class/SelectTipoRischio.class.php';
	$tipo = new SelectTipoRischio();
?>
<?php
	include_once 'class/SelectTipoAppendice.class.php';
	$app = new SelectTipoAppendice();
?>
<?php
	include_once 'class/SelectFrazionamenti.class.php';
	$fraz = new SelectFrazionamenti();
?>
<?php
	include_once 'class/SelectRetroattiva.class.php';
	$retro = new SelectRetroattiva();
?>
<?php
	include_once 'class/SelectPostuma.class.php';
	$post = new SelectPostuma();
?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <fieldset class="container">
            <!-- Righe di dettaglio -->
            <!-- inizio prima riga -->
            <form id="nuovapolizza"
                  method="post"
                  action="polizza_nuova_inserimento.php"
                  data-toggle="validator">
                <div class="row">
                    <h1 class="col-md-9">Nuova Polizza</h1>
                    <div class="form-group margintop30 col-md-3 has-feedback required">
                        <label for="numero_polizza"
                               class="control-label">Numero</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="numero_polizza"
                               name="numero_polizza"
                               placeholder="Numero Polizza"
                               maxlength="30"
                               required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="margintop30 col-md-3 has-feedback">
                        <label for="appendice_polizza"
                               class="control-label">Appendice</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="appendice_polizza"
                               name="appendice_polizza"
                               placeholder="Num.Appendice"
                               maxlength="20"
                        >
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="margintop30 form-group col-md-3 has-feedback grassetto">
                        <label for="id_tipoappendice_polizza"
                               class="control-label">Tipo App.</label>
                        <select class="form-control"
                                id="tipoappendice_polizza"
                                name="id_tipoappendice_polizza"
                        >
							<?php echo $app->ShowTipoAppendice(); ?>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="col-md-3 margintop30 has-feedback">
                        <label for="numero_sostituita_polizza"
                               class="control-label">Polizza
                            sostituita</label>
                        <div class="input-group">

                            <input type="text"
                                   class="form-control input-sm"
                                   id="numero_sostituita_polizza"
                                   name="numero_sostituita_polizza"
                                   placeholder="Num.Polizza sostituita">
                            <span class="glyphicon form-control-feedback"
                                  aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>


                        </div>
                    </div>
                    <div class="col-md-3 margintop30 has-feedback">
                        <label for="data_sostituzione_polizza"
                               class="control-label">Data sostituzione</label>

                        <div class="input-group">
                            <span class="input-group-addon">Il</span>
                            <input type="text"
                                   class="form-control input-sm datepicker"
                                   id="data_sostituzione_polizza"
                                   name="data_sostituzione_polizza"
                                   placeholder="Data di sostituzione">

                        </div>
                        <div class="help-block with-errors"></div>

                    </div>
                </div><!-- fine riga -->

                <div class="row">

                    <div class="form-group col-md-6 has-feedback grassetto required">
                        <label for="compagnie"
                               class="control-label">Compagnia</label>
                        <select class="form-control"
                                id="compagnie"
                                name="compagnia_polizza"
                                required>
							<?php echo $comp->ShowCompagnie(); ?>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-4 has-feedback grassetto required">
                        <label for="agenzie_polizza"
                               class="control-label">Agenzia</label>
                        <select class="form-control"
                                id="agenzie"
                                name="agenzia_polizza"
                                required>

                        </select>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-4 has-feedback required">
                        <label for="id_mandato_polizza"
                               class="control-label">Mandato</label>
                        <select class="form-control input-sm"
                                id="mandati"
                                name="id_mandato_polizza"
                                onchange="PopolaTipoRischio()"
                                required>

                        </select>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-4 has-feedback required">
                        <label for="id_tiporischio_polizza"
                               class="control-label">Tipo Rischio</label>
                        <select class="form-control input-sm"
                                id="tiporischio"
                                name="id_tiporischio_polizza"
                                onchange="CalcolaProvvigioni()"
                                required>
							<?php echo $tipo->ShowTipoRischio(); ?>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-5 has-feedback grassetto required">
                        <label for="contraenti_polizza"
                               class="control-label">Contraente</label>
                        <select class="form-control"
                                id="contraenti"
                                name="contraente_polizza"
                                required>
							<?php echo $cont->ShowContraenti(); ?>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>

                </div><!-- fine riga -->

                <div class="row">
                    <div class="form-group col-md-3 has-feedback required">
                        <label for="decorrenza_polizza" class="control-label">Decorrenza</label>

                        <div class="input-group">
                            <span class="input-group-addon">Il</span>
                            <input type="text"
                                   id="decorrenza_polizza"
                                   name="decorrenza_polizza"
                                   class="form-control input-sm datepicker"
                                   aria-label="ds"
                                   onChange="CalcolaPrimoTermine()"
                                   placeholder="Decorre dal"
                                   required>
                        </div>

                    </div>

                    <div class="form-group col-md-3 has-feedback required">
                        <label for="scadenza_polizza" class="control-label">Scadenza</label>

                        <div class="input-group">
                            <span class="input-group-addon">Il</span>


                            <input type="text"
                                   id="scadenza_polizza"
                                   name="scadenza_polizza"
                                   class="form-control input-sm datepicker"
                                   aria-label="ds"
                                   placeholder="Scade il"
                                   required>

                        </div>

                    </div>
                    <div class="col-md-3 has-feedback">
                        <label for="inizio_copertura_polizza"
                               class="control-label">Inizio Copertura</label>
                        <div class="input-group">
                            <span class="input-group-addon">Il</span>

                            <input type="text"
                                   class="form-control input-sm datepicker"
                                   id="inizio_copertura_polizza"
                                   name="inizio_copertura_polizza"
                                   placeholder="Copertura dal"
                            >

                        </div>
                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="col-md-3 has-feedback">
                        <label for="fine_copertura_polizza"
                               class="control-label">Fine Copertura</label>

                        <div class="input-group">
                            <span class="input-group-addon">Il</span>
                            <input type="text"
                                   class="form-control input-sm datepicker"
                                   id="fine_copertura_polizza"
                                   name="fine_copertura_polizza"
                                   placeholder="Copertura al"
                            >

                        </div>
                        <div class="help-block with-errors"></div>

                    </div>

                    <div class="form-group col-md-4 has-feedback required">
                        <label for="id_frazionamento_polizza"
                               class="control-label">Frazionamento</label>
                        <select class="form-control input-sm"
                                id="frazionamenti"
                                name="id_frazionamento_polizza"
                                required>
							<?php echo $fraz->ShowFrazionamenti(); ?>
                        </select>
                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="form-group col-md-3 has-feedback">
                        <label for="targa_auto_polizza"
                               class="control-label">Targa Auto</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="targa_auto_polizza"
                               placeholder="Targa"
                               name="targa_auto_polizza">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-2 has-feedback">
                        <label for="incendio_furto_polizza"
                               class="control-label">Inc./furto</label>
                        <input type="hidden"
                               name="incendio_furto_polizza"
                               value="0">
                        <input type="checkbox"
                               class="form-control input-sm"
                               id="incendio_furto_polizza"
                               name="incendio_furto_polizza"
                               value="1">
                    </div>
                    <div class="form-group col-md-2 has-feedback">
                        <label for="proroga_servizio_polizza"
                               class="control-label">Proroga</label>
                        <input type="hidden"
                               name="proroga_servizio_polizza"
                               value="0">
                        <input type="checkbox"
                               class="form-control input-sm"
                               id="proroga_servizio_polizza"
                               name="proroga_servizio_polizza"
                               value="1">
                    </div>
                    <div class="form-group col-md-1 has-feedback">
                        <label for="tacito_rinnovo_polizza"
                               class="control-label">Rinnovo</label>
                        <input type="hidden"
                               name="tacito_rinnovo_polizza"
                               value="0">
                        <input type="checkbox"
                               class="form-control input-sm"
                               id="tacito_rinnovo_polizza"
                               name="tacito_rinnovo_polizza"
                               value="1">
                    </div>
                </div><!-- fine riga -->

                <div class="row">
                    <div class="form-group col-md-3 has-feedback">
                        <label for="ramo_agenzia_polizza"
                               class="control-label">Ramo Agenzia</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="ramo_agenzia_polizza"
                               placeholder="Ramo"
                               name="ramo_agenzia_polizza">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-3 has-feedback">
                        <label for="stato_polizza"
                               class="control-label">Stato Polizza</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="stato_polizza"
                               name="stato_polizza"
                               placeholder="stato Polizza"
                               maxlength="30"
                        >
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-3 has-feedback">
                        <label for="accordo_collaborazione_polizza"
                               class="control-label">Accordo Collab.ne</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="accordo_collaborazione_polizza"
                               placeholder="accordo di coll.ne"
                               name="accordo_collaborazione_polizza"
                               maxlength="10">
                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="form-group col-md-2 has-feedback">

                        <label for="capitolato_polizza"
                               class="control-label">Capitolato</label>
                        <select class="form-control input-sm"
                                id="capitolato_polizza"
                                name="capitolato_polizza"
                        >
                            <option value="..." selected>...</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 has-feedback">
                        <label for="cig_polizza"
                               class="control-label">C.I.G.</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="cig_polizza"
                               placeholder="C.I.G."
                               name="cig_polizza"
                        >
                        <div class="help-block with-errors"></div>

                    </div>

                    <div class="form-group col-md-2 has-feedback">
                        <label for="regolazione_premio_polizza"
                               class="control-label">Reg.premio</label>
                        <select class="form-control input-sm"
                                id="regolazione_premio_polizza"
                                name="regolazione_premio_polizza"
                        >
                            <option value="" selected>...</option>
                            <option value="30">30</option>
                            <option value="60">60</option>
                            <option value="90">90</option>
                        </select>
                    </div>


                    <div class="form-group col-md-2 has-feedback">
                        <label for="giorni_denuncia_sinistro_polizza"
                               class="control-label">GG. Sinistro</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="giorni_denuncia_sinistro_polizza"
                               placeholder="Ritardo denuncia"
                               name="giorni_denuncia_sinistro_polizza"
                        > <span class="glyphicon form-control-feedback"
                                aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-2 has-feedback">
                        <label for="franchigia_polizza"
                               class="control-label">Franchigia(€)</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="franchigia_polizza"
                               placeholder="Franchigia"
                               name="franchigia_polizza"
                        > <span class="glyphicon form-control-feedback"
                                aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-2 has-feedback">
                        <label for="scoperto_polizza"
                               class="control-label">Scoperto(%)</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="scoperto_polizza"
                               placeholder="Scoperto"
                               name="scoperto_polizza"
                        > <span class="glyphicon form-control-feedback"
                                aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>


                </div><!-- fine riga -->

                <div class="row">


                    <div class="form-group col-md-1 has-feedback">
                        <label for="mora_altre_scadenze_polizza"
                               class="control-label">Mora</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="mora_altre_scadenze_polizza"
                               placeholder=""
                               name="mora_altre_scadenze_polizza"
                               value="0"
                               onchange="CalcolaPrimoTermine()"
                        >
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="col-md-3 has-feedback">
                        <label for="termine_primo_premio_polizza"
                               class="control-label">Termine 1°
                            premio</label>

                        <div class="input-group">
                            <span class="input-group-addon">Al</span>
                            <input type="text"
                                   class="form-control input-sm datepicker"
                                   id="termine_primo_premio_polizza"
                                   name="termine_primo_premio_polizza"
                                   placeholder="Termine di pagamento"
                            >
                        </div>
                        <div class="help-block with-errors"></div>

                    </div>

                    <div class="form-group col-md-2 has-feedback">
                        <label for="provvigioni_broker_polizza"
                               class="control-label">Provv.broker</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="provvigioni_broker_polizza"
                               placeholder="Provvigioni broker"
                               name="provvigioni_broker_polizza"
                        > <span class="glyphicon form-control-feedback"
                                aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>

                    </div>

                    <div class="form-group col-md-3 has-feedback">
                        <label for="maxrcsinistro_polizza"
                               class="control-label">Max RC Sin</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="maxrcsinistro_polizza"
                               placeholder="Max RC Sinistro"
                               name="maxrcsinistro_polizza"
                        > <span class="glyphicon form-control-feedback"
                                aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="form-group col-md-3 has-feedback">
                        <label for="maxrcpersona_polizza"
                               class="control-label">Max RC Pers</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="maxrcpersona_polizza"
                               placeholder="Max RC Pers"
                               name="maxrcpersona_polizza"
                        > <span class="glyphicon form-control-feedback"
                                aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="form-group col-md-3 has-feedback">
                        <label for="maxrccoseanimali_polizza"
                               class="control-label">Max RC cose/animali</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="maxrccoseanimali_polizza"
                               placeholder="Max RC cose/animali"
                               name="maxrccoseanimali_polizza"
                        > <span class="glyphicon form-control-feedback"
                                aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="form-group col-md-3 has-feedback">
                        <label for="massimale_annuo_polizza"
                               class="control-label">Max Tot. Annuo</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="massimale_annuo_polizza"
                               placeholder="Max Tot. Annuo"
                               name="massimale_annuo_polizza"
                        > <span class="glyphicon form-control-feedback"
                                aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div><!-- fine riga -->

                <div class="row">
                    <div class="form-group col-md-3 has-feedback">
                        <label for="premio_netto_polizza"
                               class="control-label">Premio Netto</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="premio_netto_polizza"
                               placeholder="Premio netto"
                               name="premio_netto_polizza"
                               maxlength="10"
                        >
                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="form-group col-md-2 has-feedback">
                        <label for="accessori_polizza"
                               class="control-label">Accessori</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="accessori_polizza"
                               placeholder="accessori"
                               name="accessori_polizza"
                               maxlength="10"
                        >
                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="form-group col-md-2 has-feedback">

                        <label for="imposte_polizza"
                               class="control-label">Imposte</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="imposte_polizza"
                               placeholder="Imposte"
                               name="imposte_polizza"
                               maxlength="10"
                        >
                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="form-group col-md-2 has-feedback">
                        <label for="ssn_polizza"
                               class="control-label">SSN</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="ssn_polizza"
                               placeholder="SSN"
                               name="ssn_polizza"
                               maxlength="15"
                        >
                        <div class="help-block with-errors"></div>

                    </div>
                    <div class="form-group col-md-3 has-feedback">
                        <label for="totale_imponibile_polizza"
                               class="control-label">Tot. Imponib.</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="totale_imponibile_polizza"
                               placeholder="Totale Imponibile"
                               name="totale_imponibile_polizza"
                               maxlength="15"
                        >
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-3 has-feedback">
                        <label for="totale_lordo_polizza"
                               class="control-label">Totale Lordo</label>
                        <input type="text"
                               class="form-control input-sm"
                               id="totale_lordo_polizza"
                               placeholder="Totale Lordo"
                               name="totale_lordo_polizza"
                        >
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-2 has-feedback">
                        <label for="retroattiva_polizza"
                               class="control-label">Retroattiva</label>
                        <select class="form-control input-sm"
                                id="retroattiva"
                                name="retroattiva_polizza"
                        >
							<?php echo $retro->ShowRetroattiva(); ?>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-2 has-feedback">
                        <label for="postuma_polizza"
                               class="control-label">Postuma</label>
                        <select class="form-control input-sm"
                                id="postuma"
                                name="postuma_polizza"
                        >
							<?php echo $post->ShowPostuma(); ?>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <label for="azioni">Azioni</label>
                    <div class="form-group btn-group col-md-5" id="azioni">
                        <!-- un pulsante per aggiornare i dati della compagnia -->
                        <button
                                class="btn btn-danger btn-sm" type="submit"
                        >Inserisci
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
                </div><!-- fine riga -->
                <div class="form-group required">
                    <div class="control-label grassetto center">Attenzione: i campi in cui viene utilizzato questo
                        colore sono obbligatori
                    </div>
                </div>
            </form>
        </fieldset>
    </div><!-- fine jumbotron -->


    <!--================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<?php include "footer.php" ?>