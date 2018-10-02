<?php include_once "header.php" ?>
<?php include_once "inc/inc.utils.php";//serve per la formattazione della data?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
	function cercaprovvigioni() {
		alert("The input value has changed. The new value is: bubbu");
		var x = document.getElementById("id_mandato_polizza").value;
		var y = document.getElementById("id_tiporischio_polizza").value;
		alert("id_mandato in questo momento vale: " + x);
		alert("id_tipo rischio in questo momento vale: " + y);
		var dati = $("#datidaleggere").serialize();
		//var dati = "id_mandato_polizza =" + x + "&id_tiporischio_polizza=" + y;
		alert("dati in questo momento vale: " + dati);
		//form invio dati post ajax
		//invio
		$.ajax({
			type: "POST",
			url: "recupera_provvigione.php",
			data: dati,
			dataType: "html",
			success: function (msg) {
				alert("sono di ritorno in ajax");
				$("#provvigioni_broker_polizza").val(msg);
			},
			error: function () {
				alert("Chiamata fallita, si prega di riprovare...");
			}
		});//ajax
	}
</script>


<?php
	include_once 'class/SelectTipoRischio.class.php';
	$tipo = new SelectTipoRischio();
?>


<!--script type="text/javascript"
		src="select.contraenti.js"></script-->
<link rel="stylesheet"
      href="css/jquery-ui.css">
<script src="js/jquery-ui.min.js"></script>
<!-- seguono le risorse per la gestione dei campi data e ora -->
<script src="js/validator.js"></script>
<br>
<div class="jumbotron">
    <div class="container">

		<?php require_once "class/Database.class.php";
			$dbh = new Database();
			$conf_STR_sql = " SELECT mandati.*, polizze.* FROM polizze ";
			$conf_STR_sql .= "  LEFT JOIN mandati on polizze.id_mandato_polizza = mandati.id_mandato ";
			$conf_STR_sql .= "  WHERE mandati.id_mandato = 1 ";

			$dbh->query($conf_STR_sql);
			$dbh->execute();
			$rows = $dbh->resultset();
			foreach ($rows as $row) {

				$id_mandato = $row['id_mandato'];
				$identificativo_mandato = $row['identificativo_mandato'];
				$provvigioni_broker_polizza = $row['provvigioni_broker_polizza'];

			} ?>

        <form id="datidaleggere">
            <div class="form-group col-md-4 has-feedback">
                <label for="id_mandato_polizza"
                       class="control-label">Mandato</label>
                <select class="form-control input-sm"
                        id="id_mandato_polizza"
                        name="id_mandato_polizza"
					<?php echo $dbh->Show_Mandati(); ?>
                >
                </select>
                <span class="glyphicon form-control-feedback"
                      aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group col-md-4 has-feedback">
                <label for="id_tiporischio_polizza"
                       class="control-label">Tipologia
                    Contratto</label>
                <select class="form-control input-sm"
                        id="id_tiporischio_polizza"
                        name="id_tiporischio_polizza"
                        onchange="cercaprovvigioni()"
                >
					<?php echo $tipo->ShowTipoRischio(); ?>
                </select>
                <span class="glyphicon form-control-feedback"
                      aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
            </div>
        </form>


        <div class="form-group col-md-2 has-feedback">
            <label for="provvigioni_broker_polizza"
                   class="control-label">Provv.broker</label>
            <input type="text"
                   class="form-control input-sm"
                   id="provvigioni_broker_polizza"
                   placeholder="Provvigioni broker"
                   name="provvigioni_broker_polizza"
                   value="<?php echo $provvigioni_broker_polizza; ?>"
            > <span class="glyphicon form-control-feedback"
                    aria-hidden="true"></span>
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
    </div><!-- fine riga ------------------------------------------------------>
</div><!-- fine jumbotron -->


<!--================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<?php include "footer.php" ?>

