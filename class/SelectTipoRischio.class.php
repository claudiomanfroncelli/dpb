<?php

	class SelectTipoRischio
	{

		public function ShowTipoRischio()
		{
			include_once "Database.class.php";
			$id_tiporischio_polizza = '<option value="">Tipo Rischio...</option>';
			try {
				$dbh = new Database();
				$dbh->query("SELECT * from tiporischio ORDER BY descrizione_tiporischio");
				$rows = $dbh->resultset();
				foreach ($rows as $row) {
					$id_tiporischio_polizza .= '<option value="'.$row['id_tiporischio'].'">'.utf8_encode($row['descrizione_tiporischio']).' </option>';
				}
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;

			return $id_tiporischio_polizza;
		}
	}

?>