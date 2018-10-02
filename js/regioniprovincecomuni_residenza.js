/**
 * Created by famiglia on 01/12/2016.
 */
$(document).ready(function () {

	var vuoto = '<option value="">...</option>';
	var nomeregioneselezionata = "";
	var nomeprovinciaselezionata = "";
	var capenomecomuneselezionato = " - 00000";

	$("select#regioniresidenza").change(function () {
		var idregioneselezionata = $("select#regioniresidenza option:selected").attr('value');
		var nomeregioneselezionata = $("select#regioniresidenza option:selected").text();
		$("select#provinceresidenza").attr("disabled", "disabled");
		$("select#comuniresidenza").attr("disabled", "disabled");
		$("select#provinceresidenza").html(vuoto);
		$("select#comuniresidenza").html(vuoto);

		$.post("regioniprovincecomuni_residenza_select.php", {
			id_regione: idregioneselezionata,
			nome_regione: nomeregioneselezionata
		}, function (data) {
			$("select#provinceresidenza").removeAttr("disabled");
			$("select#provinceresidenza").html(data);
			//alert(idregioneselezionata);
			//alert(nomeregioneselezionata);
		});
	});

	$("select#provinceresidenza").change(function () {
		var idprovinciaselezionata = $("select#provinceresidenza option:selected").attr('value');
		var nomeprovinciaselezionata = $("select#provinceresidenza option:selected").text();
		$("select#comuniresidenza").html(vuoto);
		$.post("regioniprovincecomuni_residenza_select.php", {
			id_provincia: idprovinciaselezionata,
			nome_provincia: nomeprovinciaselezionata
		}, function (data) {
			$("select#comuniresidenza").removeAttr("disabled");
			$("select#comuniresidenza").html(data);
			//alert(idprovinciaselezionata);
			//alert(nomeprovinciaselezionata);
		});
	});

	$("select#comuniresidenza").change(function () {
		var idcomuneselezionato = $("select#comuniresidenza option:selected").attr('value');
		var capenomecomuneselezionato = $("select#comuniresidenza option:selected").text();
		$.post("regioniprovincecomuni_residenza_select.php", {
			id_comune: idcomuneselezionato,
			cap_e_nome_comune: capenomecomuneselezionato
		}, function (data) {
			var capcomuneselezionato = capenomecomuneselezionato.substr(capenomecomuneselezionato.length - 5);
			$("#capresidenza").val(capcomuneselezionato);
		});
	});
});

