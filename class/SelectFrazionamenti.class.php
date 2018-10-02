<?php

	class SelectFrazionamenti
	{

		public function ShowFrazionamenti()
		{
			include_once "Database.class.php";
			$frazionamenti = '<option value="">Frazionamento...</option>';
			try {
				$dbh = new Database();
				$dbh->query("SELECT * from frazionamenti");
				$rows = $dbh->resultset();
				foreach ($rows as $row) {
					$frazionamenti .= '<option value="'.$row['id_frazionamento'].'">'.utf8_encode($row['descrizione_frazionamento']).' </option>';
				}
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;

			return $frazionamenti;
		}
	}

?>