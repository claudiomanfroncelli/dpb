<?php

	class SelectRimessaPremi
	{

		public function ShowRimessaPremi()
		{
			include_once "Database.class.php";
			$rimessapremi = '';
			try {
				$dbh = new Database();
				$dbh->query("SELECT * from rimessapremi");
				$rows = $dbh->resultset();
				foreach ($rows as $row) {
					$rimessapremi .= '<option value="'.$row['id_rimessapremio'].'">'.utf8_encode($row['descrizione_rimessapremio']).' </option>';
				}
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;

			return $rimessapremi;
		}
	}

?>