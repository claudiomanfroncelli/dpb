<?php

	class SelectTipoDocumento
	{

		public function ShowTipoDocumento()
		{
			include_once "Database.class.php";
			$tipodocumento = '<option value="">Tipo...</option>';
			try {
				$dbh = new Database();
				$dbh->query("SELECT * from tipodocumento ORDER BY descrizione_tipodocumento");
				$rows = $dbh->resultset();
				foreach ($rows as $row) {
					$tipodocumento .= '<option value="'.$row['id_tipodocumento'].'">'.utf8_encode($row['descrizione_tipodocumento']).' </option>';
				}
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;

			return $tipodocumento;
		}
	}

?>