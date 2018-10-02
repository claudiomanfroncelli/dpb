<?php

	class SelectOrarioCopertura
	{

		public function ShowOrarioCopertura()
		{
			include_once "Database.class.php";
			$oraricopertura = '';
			try {
				$dbh = new Database();
				$dbh->query("SELECT * from coperture");
				$rows = $dbh->resultset();
				foreach ($rows as $row) {
					$oraricopertura .= '<option value="'.$row['id_copertura'].'">'.utf8_encode($row['orario_copertura']).' </option>';
				}
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;

			return $oraricopertura;
		}
	}

?>