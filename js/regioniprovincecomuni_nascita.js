/**
 * Created by famiglia on 01/12/2016.
 */
$(document).ready(function () {

	var vuoto = '<option value="">...</option>';
	var idregioneselezionata = "";
	var idprovinciaselezionata = "";
	var idcomuneselezionato = "";
	var capenomecomuneselezionato = " - 00000";

	$("select#regioninascita").change(function () {
		var idregioneselezionata = $("select#regioninascita option:selected").attr('value');
		var nomeregioneselezionata = $("select#regioninascita option:selected").text();
		$("select#provincenascita").attr("disabled", "disabled");
		$("select#comuninascita").attr("disabled", "disabled");
		$("select#provincenascita").html(vuoto);
		$("select#comuninascita").html(vuoto);

		$.post("regioniprovincecomuni_nascita_select.php", {
			id_regione: idregioneselezionata,
			nome_regione: nomeregioneselezionata
		}, function (data) {
			$("select#provincenascita").removeAttr("disabled");
			$("select#provincenascita").html(data);
			//alert(idregioneselezionata);
			//alert(nomeregioneselezionata);
		});
	});

	$("select#provincenascita").change(function () {
		var idprovinciaselezionata = $("select#provincenascita option:selected").attr('value');
		var nomeprovinciaselezionata = $("select#provincenascita option:selected").text();
		$("select#comuninascita").html(vuoto);
		$.post("regioniprovincecomuni_nascita_select.php", {
			id_provincia: idprovinciaselezionata,
			nome_provincia: nomeprovinciaselezionata
		}, function (data) {
			$("select#comuninascita").removeAttr("disabled");
			$("select#comuninascita").html(data);
			//alert(idprovinciaselezionata);
			//alert(nomeprovinciaselezionata);
		});
	});

	$("select#comuninascita").change(function () {
		var idcomuneselezionato = $("select#comuninascita option:selected").attr('value');
		var capenomecomuneselezionato = $("select#comuninascita option:selected").text();
		$.post("regioniprovincecomuni_nascita_select.php", {
			id_comune: idcomuneselezionato,
			cap_e_nome_comune: capenomecomuneselezionato
		}, function (data) {
			var capcomuneselezionato = capenomecomuneselezionato.substr(capenomecomuneselezionato.length - 5);
			$("#capComuni").val(capcomuneselezionato);
		});
	});
});

