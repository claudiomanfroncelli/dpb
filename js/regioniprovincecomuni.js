/**
 * Created by famiglia on 01/12/2016.
 */
$(document).ready(function () {

	var vuoto = '<option value="">...</option>';
	var idregioneselezionata = "";
	var idprovinciaselezionata = "";
	var idcomuneselezionato = "";
	var capenomecomuneselezionato = " - 00000";

	$("select#regioni").change(function () {
		var idregioneselezionata = $("select#regioni option:selected").attr('value');
		//var nomeregioneselezionata = $("select#regioni option:selected").text();
		$("select#province").attr("disabled", "disabled");
		$("select#comuni").attr("disabled", "disabled");
		$("select#province").html(vuoto);
		$("select#comuni").html(vuoto);

		$.post("regioniprovincecomuni_select.php", {
			id_regione: idregioneselezionata,
		}, function (data) {
			$("select#province").removeAttr("disabled");
			$("select#province").html(data);
			//alert(idregioneselezionata);
			//alert(nomeregioneselezionata);
		});
	});

	$("select#province").change(function () {
		var idprovinciaselezionata = $("select#province option:selected").attr('value');
		var nomeprovinciaselezionata = $("select#province option:selected").text();
		$("select#comuni").html(vuoto);
		$.post("regioniprovincecomuni_select.php", {
			id_provincia: idprovinciaselezionata,
			nome_provincia: nomeprovinciaselezionata
		}, function (data) {
			$("select#comuni").removeAttr("disabled");
			$("select#comuni").html(data);
			//alert(idprovinciaselezionata);
			//alert(nomeprovinciaselezionata);
		});
	});

	$("select#comuni").change(function () {
		var idcomuneselezionato = $("select#comuni option:selected").attr('value');
		var capenomecomuneselezionato = $("select#comuni option:selected").text();
		$.post("regioniprovincecomuni_select.php", {
			id_comune: idcomuneselezionato,
			cap_e_nome_comune: capenomecomuneselezionato
		}, function (data) {
			var capcomuneselezionato = capenomecomuneselezionato.substr(capenomecomuneselezionato.length - 5);
			$("#capComuni").val(capcomuneselezionato);
		});
	});
});

