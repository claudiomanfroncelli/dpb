/**
 * Created by famiglia on 01/12/2016.
 */
$(document).ready(function () {

	var scegli = '<option value="0">...</option>';
	var attendere = '<option value="0">Attendere...</option>';

	$("select#agenzie").html(scegli);
	$("select#agenzie").attr("disabled", "disabled");
	$("select#mandati").html(scegli);
	$("select#mandati").attr("disabled", "disabled");


	$("select#compagnie").change(function () {
		var id_compagniaselezionata = $("select#compagnie option:selected").attr('value');
		var ragionesocialecompagniaselezionata = $("select#compagnie option:selected").text();
		$("select#agenzie").html(attendere);
		$("select#agenzie").attr("disabled", "disabled");
		$("select#mandati").html(scegli);
		$("select#mandati").attr("disabled", "disabled");

		$.post("compagnie_agenzie_mandati_select.php", {
			id_compagnia: id_compagniaselezionata,
			ragione_sociale_compagnia: ragionesocialecompagniaselezionata
		}, function (data) {
			$("select#agenzie").removeAttr("disabled");
			$("select#agenzie").html(data);
			//alert(codiceregioneselezionata);
			//alert(nomeregioneselezionata);
		});
	});

	$("select#agenzie").change(function () {
		var id_agenziaselezionata = $("select#agenzie option:selected").attr('value');
		var ragionesocialeagenziaselezionata = $("select#agenzie option:selected").text();
		$("select#mandati").attr("disabled", "disabled");
		$("select#mandati").html(attendere);
		$.post("compagnie_agenzie_mandati_select.php", {
			id_agenzia: id_agenziaselezionata,
			ragione_sociale_agenzia: ragionesocialeagenziaselezionata
		}, function (data) {
			$("select#mandati").removeAttr("disabled");
			$("select#mandati").html(data);
			//alert(codiceprovinciaselezionata);
			//alert(nomeprovinciaselezionata);
		});
	});

	$("select#mandati").change(function () {
		var id_mandatoselezionato = $("select#mandati option:selected").attr('value');
		var numeromandatoselezionato = $("select#mandati option:selected").text();
		$.post("compagnie_agenzie_mandati_select.php", {
			id_mandato: id_mandatoselezionato,
			numero_mandato: numeromandatoselezionato
		}, function (data) {
			//alert(id_mandatoselezionato);
			//alert(numeromandatoselezionato);
		});
	});
});

