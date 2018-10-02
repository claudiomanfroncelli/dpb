<?php

	class SelectTipoAppendice
	{

		public function ShowTipoAppendice()
		{
			include_once "Database.class.php";
			$tipoappendice_polizza = '<option value="1">...</option>';
			try {
				$dbh = new Database();
				$dbh->query("SELECT * from tipoappendice");
				$rows = $dbh->resultset();
				foreach ($rows as $row) {
					$tipoappendice_polizza .= '<option value="'.$row['id_tipoappendice'].'">'.utf8_encode($row['descrizione_tipoappendice']).' </option>';
				}
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;

			return $tipoappendice_polizza;
		}
	}

?>