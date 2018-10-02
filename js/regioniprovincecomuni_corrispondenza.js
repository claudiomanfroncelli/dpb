/**
 * Created by famiglia on 01/12/2016.
 */
$(document).ready(function () {

	var vuoto = '<option value="">...</option>';
	var nomeregioneselezionata = "";
	var nomeprovinciaselezionata = "";
	var capenomecomuneselezionato = " - 00000";

	$("select#regionicorrispondenza").change(function () {
		var idregioneselezionata = $("select#regionicorrispondenza option:selected").attr('value');
		var nomeregioneselezionata = $("select#regionicorrispondenza option:selected").text();
		$("select#provincecorrispondenza").attr("disabled", "disabled");
		$("select#comunicorrispondenza").attr("disabled", "disabled");
		$("select#provincecorrispondenza").html(vuoto);
		$("select#comunicorrispondenza").html(vuoto);

		$.post("regioniprovincecomuni_corrispondenza_select.php", {
			id_regione: idregioneselezionata,
			nome_regione: nomeregioneselezionata
		}, function (data) {
			$("select#provincecorrispondenza").removeAttr("disabled");
			$("select#provincecorrispondenza").html(data);
			//alert(idregioneselezionata);
			//alert(nomeregioneselezionata);
		});
	});

	$("select#provincecorrispondenza").change(function () {
		var idprovinciaselezionata = $("select#provincecorrispondenza option:selected").attr('value');
		var nomeprovinciaselezionata = $("select#provincecorrispondenza option:selected").text();
		$("select#comunicorrispondenza").html(vuoto);
		$.post("regioniprovincecomuni_corrispondenza_select.php", {
			id_provincia: idprovinciaselezionata,
			nome_provincia: nomeprovinciaselezionata
		}, function (data) {
			$("select#comunicorrispondenza").removeAttr("disabled");
			$("select#comunicorrispondenza").html(data);
			//alert(idprovinciaselezionata);
			//alert(nomeprovinciaselezionata);
		});
	});

	$("select#comunicorrispondenza").change(function () {
		var idcomuneselezionato = $("select#comunicorrispondenza option:selected").attr('value');
		var capenomecomuneselezionato = $("select#comunicorrispondenza option:selected").text();
		$.post("regioniprovincecomuni_corrispondenza_select.php", {
			id_comune: idcomuneselezionato,
			cap_e_nome_comune: capenomecomuneselezionato
		}, function (data) {
			var capcomuneselezionato = capenomecomuneselezionato.substr(capenomecomuneselezionato.length - 5);
			$("#capCorrispondenza").val(capcomuneselezionato);
		});
	});
});

