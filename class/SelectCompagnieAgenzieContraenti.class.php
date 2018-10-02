<?php

	class SelectCompagnieAgenzieContraenti
	{

		public function ShowCompagnie()
		{
			include_once "Database.class.php";

			//$compagnie ="";
			$compagnie = '<option value="0">Scegli una Compagnia</option>';

			try {
				$dbh = new Database();
				$dbh->query("SELECT * from compagnie ORDER BY ragione_sociale_compagnia");
				$rows = $dbh->resultset();
				foreach ($rows as $row) {
					$compagnie .= '<option value="'.$row['id_compagnia'].'">'.utf8_encode($row['ragione_sociale_compagnia']).'</option>';
				}
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;
			return $compagnie;
		}


		public function ShowAgenzie()
		{
			include_once "Database.class.php";

			$agenzie = '<option value="0">Scegli una Agenzia</option>';

			try {
				$dbh = new Database();
				$dbh->query("SELECT * from agenzie WHERE id_compagnia_agenzia = $_POST[id_compagnia] ORDER BY ragione_sociale_agenzia");
				$rows = $dbh->resultset();
				foreach ($rows as $row) {
					$agenzie .= '<option value="'.$row['id_agenzia'].'">'.utf8_encode($row['ragione_sociale_agenzia']).'</option>';
				}
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;
			return $agenzie;
		}


		public function ShowContraenti()
		{
			include_once "Database.class.php";

			$contraenti = '<option value="0">Scegli un Contraente</option>';

			try {
				$dbh = new Database();
				$dbh->query("SELECT * from contraenti ORDER BY cognome_contraente, nome_contraente");
				$rows = $dbh->resultset();
				foreach ($rows as $row) {
					$contraenti .= '<option value="'.$row['id_contraente'].'">'.$row['cognome_contraente'].' '.$row['nome_contraente'].'</option>';
				}
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;
			return $contraenti;
		}

	}

?>