/**
 * Created by famiglia on 01/12/2016.
 */
$(document).ready(function () {

	var scegli = '<option value="0">...</option>';
	var attendere = '<option value="0">Attendere...</option>';

	$("select#agenzie").html(scegli);
	$("select#agenzie").attr("disabled", "disabled");
	$("select#contraenti").html(scegli);
	$("select#contraenti").attr("disabled", "disabled");


	$("select#compagnie").change(function () {
		var id_compagniaselezionata = $("select#compagnie option:selected").attr('value');
		var ragionesocialecompagniaselezionata = $("select#compagnie option:selected").text();
		$("select#agenzie").html(attendere);
		$("select#agenzie").attr("disabled", "disabled");
		$("select#contraenti").html(scegli);
		$("select#contraenti").attr("disabled", "disabled");

		$.post("compagnie_agenzie_contraenti_select.php", {
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
		$("select#contraenti").attr("disabled", "disabled");
		$("select#contraenti").html(attendere);
		$.post("compagnie-agenzie-contraenti-select.php", {
			id_agenzia: id_agenziaselezionata,
			ragione_sociale_agenzia: ragionesocialeagenziaselezionata
		}, function (data) {
			$("select#contraenti").removeAttr("disabled");
			$("select#contraenti").html(data);
			//alert(codiceprovinciaselezionata);
			//alert(nomeprovinciaselezionata);
		});
	});

	$("select#contraenti").change(function () {
		var id_contraenteselezionato = $("select#contraenti option:selected").attr('value');
		var ragionesocialecontraenteselezionato = $("select#contraenti option:selected").text();
		$.post("compagnie-agenzie-contraenti-select.php", {
			id_contraente: id_contraenteselezionato,
			ragione_sociale_contraente: ragionesocialecontraenteselezionato
		}, function (data) {
			//alert(codicecomuneselezionato);
			//alert(capenomecomuneselezionato);
		});
	});
});

