<?php
	/**
	 * Created by PhpStorm.
	 * User: famiglia
	 * Date: 03/07/2018
	 * Time: 09:06
	 */ ?>
<?php

	$id_mandato = $_POST['id_mandato_polizza'];

	require_once "class/Database.class.php";
	$dbmand = new Database();

	$sql_mand = " SELECT * FROM mandati ";
	$sql_mand .= " WHERE id_mandato = ".$id_mandato;

	echo "sql_provv è: ".$sql_provv."<br>";


	$dbmand->query($sql_mand);
	$dbmand->execute();
	$rows = $dbmand->resultsetnum();
	$recordsmand = $dbmand->rowCount();//deve essere = 1

	if ($recordsmand > 0) {

		$tiporischio = "";
		$i = 0;

		$tiporischio = '<option value="">Tipo Rischio...</option>';

		foreach ($rows as $row) {//il primo campo provvigioni è l'ottavo del record; quindi....

			for ($i = 7; $i < 29; $i++) {
				$valore = $row[$i];
				if ($row[$i] > 0) {
					$tiporischio .= '<option value="'.$row[$i].'">'.utf8_encode($row['descrizione_tiporischio']).' </option>';
				}
			}
		}
		return $tiporischio;
	} else {
		echo "'nze po' fà";
	}
