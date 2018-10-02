<?php include "header.php" ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/compagnie_agenzie_mandati.js"></script>

<?php
	include_once 'class/SelectCompagnieAgenzieMandati.class.php';
	$comp = new SelectCompagnieAgenzieMandati();
?>

    <!-- questo script contiene la chiamata ajax. -->

    <script type="text/javascript">
		$(document).ready(function () {
			var dati = $("#cercadati").serialize(); //recupera tutti i valori del form automaticamente

			$("#pulsante_cercadati").click(function () {

				var dati = $("#cercadati").serialize(); //recupera tutti i valori del form automaticamente

				//form invio dati post ajax

				//alert(dati)
				//invio
				$.ajax({
					type: "POST",
					url: "mandati_lista.php",
					data: dati,
					dataType: "html",
					success: function (msg) {
						$("#risultato").html(msg);
					},
					error: function () {
						alert("Chiamata fallita, si prega di riprovare...");
					}
				});//ajax
			});//bottone click
		});
    </script>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1>Elenco Mandati</h1>

            <!-- due caselle a discesa per la scelta di Compagnia e Agenzia -->
            <form id="cercadati" method="post" action="#" data-toggle="validator">
                <div class="row">
                    <div class="form-group col-md-5 has-feedback grassetto">
                        <select class="form-control input-sm-small col-md-6 has-feedback grassetto" id="compagnie"
                                name="compagnia">
							<?php echo $comp->ShowCompagnie(); ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 has-feedback grassetto">
                        <select class="form-control" id="agenzie" name="agenzia">

                        </select>
                    </div>

                    <div class="form-group col-md-4 has-feedback grassetto">
                        <select class="form-control" id="mandati" name="mandato">

                        </select>
                    </div>

					<?php if (isset($_REQUEST['testodacercare']) && ($_REQUEST['testodacercare'] != "") && (preg_match("/^[-' a-z0-9]+$/i", $_REQUEST['testodacercare']))) {
						$testodacercare = $_REQUEST['testodacercare'];
					} else {
						$testodacercare = "";
					} ?>

                    <div class="form-group col-md-4 has-feedback grassetto">
                        <input type="text" class="form-control input-sm-small"
                               placeholder="testo da cercare"
                               name="testodacercare"
                               id="testodacercare"
                               value="<?php echo $testodacercare; ?>">
                    </div>
                    <div class="form-group btn-group col-md-7">
                        <!-- un pulsante per cercare i dati selezionati nelle caselle a discesa e nel testo libero -->
                        <button type="button" class="btn btn-success btn-sm active" id="pulsante_cercadati"
                                value="cerca">
                            Cerca
                        </button>
                        <button type="reset" class="btn btn-warning btn-sm active" id="reset"
                                value="reset">Reset
                        </button>
                        <!-- un pulsante per inserire una nuova compagnia -->
                        <a href="mandato_nuovo.php" class="btn btn-danger btn-sm"
                           role="button" style="float:right">Inserisci un Mandato</a>
                    </div>
                </div>
            </form>

        </div>
    </div><!-- end first container -->

    <!-- fine caselle a discesa -->
    <div class="container">
        <div id="risultato">

			<?php include "mandati_lista.php"; ?>

        </div>
    </div>
    <!--================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/validator.js"></script>

<?php include "footer.php" ?>