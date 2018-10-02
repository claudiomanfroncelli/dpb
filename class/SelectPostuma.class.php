<?php

	class SelectPostuma
	{

		public function ShowPostuma()
		{
			include_once "Database.class.php";
			$postuma = '';
			try {
				$dbh = new Database();
				$dbh->query("SELECT * from postuma");
				$rows = $dbh->resultset();
				foreach ($rows as $row) {
					$postuma .= '<option value="'.$row['descrizione_postuma'].'">'.utf8_encode($row['descrizione_postuma']).' </option>';
				}
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;

			return $postuma;
		}
	}

?>