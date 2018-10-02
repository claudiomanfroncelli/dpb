<?php include_once "header.php" ?>
<?php include_once "inc/inc.utils.php";//serve per la formattazione della data?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
			todayHighlight: true,
			autoclose: true
		});
	});
</script>
<script>
	function addDays(date, days) {
		var result = new Date(date);
		result.setDate(date.getDate() + days);
		return result;
	}

</script>
<script>
	function formatDate(date) {
		return (date.getMonth() + 1) + '/' + date.getDate() + '/' + date.getFullYear();
	}
</script>
<script>
	function CalcolaPrimoTermine() {
		alert("sono in CalcolaPrimoTermine");

		var decorrenza = document.getElementById("decorrenza_polizza").value;
		alert("Data decorrenza è: " + decorrenza);
		var giorni_mora = document.getElementById("mora").value;
		alert("giorni di mora sono: " + giorni_mora);

		var giorno = decorrenza.substr(0, 2);
		alert("giorno è: " + giorno);
		var mese = decorrenza.substr(3, 2);
		alert("mese è: " + mese);
		var anno = decorrenza.substr(6, 4);
		alert("anno è: " + anno);

		var scadenza = new Date(anno, mese - 1, giorno);
		//secondascadenza.AddDays(40);
		alert("scadenza è: " + scadenza);

		//var scadenza_formattata = formatDate(scadenza);
		//alert("scadenza_formattata è: "+scadenza_formattata);
		// Correct

		var result = new Date(scadenza);
		result.setDate(result.getDate());
		alert("result è: " + result);

		var dataparse = Date.parse('Thu, 1 July 2004 22:30:00');
		alert("dataparse: " + dataparse);

		var scadenza_primo_premio = addDays(scadenza, Number(giorni_mora));
		alert("scadenza_primo_premio è: " + scadenza_primo_premio);
		var giorno_scadenza_primo_premio = scadenza_primo_premio.getDate();
		alert("giorno_scadenza_primo_premio: " + giorno_scadenza_primo_premio);
		var mese_scadenza_primo_premio = scadenza_primo_premio.getMonth() + 1;
		alert("mese_scadenza_primo_premio: " + mese_scadenza_primo_premio);
		var anno_scadenza_primo_premio = scadenza_primo_premio.getFullYear();
		alert("anno_scadenza_primo_premio: " + anno_scadenza_primo_premio);
		document.getElementById("scadenza_primo_premio").focus();
		//document.getElementById("scadenza_primo_premio").value = document.getElementById("decorrenza_polizza").value;
		document.getElementById("scadenza_primo_premio").value = giorno_scadenza_primo_premio + "-" + mese_scadenza_primo_premio + "-" + anno_scadenza_primo_premio;


	}
</script>

<div class="jumbotron">
    <div class="container margintop30">

        <div class="form-group col-md-4">
            <input type="text"
                   id="decorrenza_polizza"
                   class="form-control input-sm datepicker"
            >
        </div>
        <div class="form-group col-md-2">
            <input type="text"
                   id="mora"
                   class="form-control input-sm"
                   onchange="CalcolaPrimoTermine()">
        </div>
        <div class="form-group col-md-4">
            <input type="text"
                   id="scadenza_primo_premio"
                   class="form-control input-sm datepicker"
            >
        </div>
    </div>
</div>
