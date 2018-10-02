<?php
	/**
	 * Created by PhpStorm.
	 * User: famiglia
	 * Date: 02/12/2016
	 * Time: 16:00
	 */

	$dati = $_REQUEST; // quindi $dati è un array che contiene i dati provenienti da agenzie.php
	if (!isset($dati['id'])) {
		$dati['id'] = 0;
	}
	if (!isset($dati['compagnia'])) {
		$dati['compagnia'] = 0;
	}
	if (!isset($dati['testodacercare'])) {
		$dati['testodacercare'] = "";
	}
	$id_compagnia_telefono = $dati['id'];
?>

<!-- Righe di dettaglio -->
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th><h4>Numero di telefono</h4></th>
            <th><h4>Tipo di telefono</h4></th>
        </tr>
        </thead>
        <tbody>

		<?php

			// query per l'estrazione dei record

			$testodacercare = str_replace("'", "\'", $dati['testodacercare']);
			// faccio vedere tutte le compagnie
			$conf_STR_sql = " SELECT * FROM telefoni_compagnia LEFT JOIN compagnie ON id_compagnia_telefono = id_compagnia WHERE 1=1 ";

			if ($dati['compagnia'] > "0") {
				$conf_STR_sql .= " AND id_compagnia = '".$dati['compagnia']."' ";
			}
			if ($dati['testodacercare'] != "") {
				$conf_STR_sql .= " AND ((ragione_sociale_compagnia LIKE '%".$dati['testodacercare']."%')) ";
			}

			$conf_STR_sql .= " ORDER BY ragione_sociale_compagnia ASC ";

			//            echo $conf_STR_sql;

			include_once "class/Database.class.php";

			try {
				$dbh = new PDO('mysql:host='.$host.';dbname='.$db, $user, $password);
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}

			$q = $dbh->prepare($conf_STR_sql);
			$q->execute();

			$q->setFetchMode(PDO::FETCH_ASSOC);

			$num = 0;

			while ($row = $q->fetch()) {

				// loop sui record presenti in tabella
				// estrazione dei record tramite ciclo while

				$num++;
				$telefono_compagnia = $row['numero_telefono_compagnia'];
				$tipo_telefono_compagnia = $row['tipo_telefono_compagnia'];

				?>

                <TR>

                    <td><?php echo "".$telefono_compagnia." "; ?></td>
                    <td><?php echo "".$tipo_telefono_compagnia." "; ?></td>

                </TR>
			<?php }
		?>

        </tbody>
    </TABLE>
</div>
