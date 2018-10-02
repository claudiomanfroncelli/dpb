<?php

	class SelectRetroattiva
	{

		public function ShowRetroattiva()
		{
			include_once "Database.class.php";
			$retroattiva = '';
			try {
				$dbh = new Database();
				$dbh->query("SELECT * from retroattiva");
				$rows = $dbh->resultset();
				foreach ($rows as $row) {
					$retroattiva .= '<option value="'.$row['descrizione_retroattiva'].'">'.utf8_encode($row['descrizione_retroattiva']).' </option>';
				}
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;

			return $retroattiva;
		}
	}

?>