<?php

	class SelectCompagnieAgenzieMandati
	{

		public
		function ShowCompagnie()
		{
			include_once "Database.class.php";

			//$compagnie ="";
			$compagnie = '<option value="">Scegli una Compagnia</option>';

			try {
				$dbh = new Database();
				$dbh->query("SELECT * from compagnie ORDER BY ragione_sociale_compagnia");
				$rows = $dbh->resultset();
				foreach ($rows as $row) {
					$compagnie .= '<option value="'.$row['id_compagnia'].'">'.($row['ragione_sociale_compagnia']).'</option>';
				}
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;
			return $compagnie;
		}


		public
		function ShowAgenzie()
		{
			include_once "Database.class.php";

			$agenzie = '<option value="">Scegli una Agenzia</option>';

			try {
				$dbh = new Database();
				$dbh->query("SELECT * from agenzie WHERE id_compagnia_agenzia = $_POST[id_compagnia] ORDER BY ragione_sociale_agenzia");
				$rows = $dbh->resultset();
				foreach ($rows as $row) {
					$agenzie .= '<option value="'.$row['id_agenzia'].'">'.($row['ragione_sociale_agenzia']).'</option>';
				}
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;
			return $agenzie;
		}

		public
		function ShowMandati()
		{
			include_once "Database.class.php";

			$mandati = '<option value="">Scegli un Mandato</option>';

			try {
				$dbh = new Database();
				$dbh->query("SELECT * from mandati WHERE (id_agenzia_mandato = $_POST[id_agenzia]) ORDER BY identificativo_mandato");
				$rows = $dbh->resultset();
				foreach ($rows as $row) {
					$mandati .= '<option value="'.$row['id_mandato'].'">'.$row['identificativo_mandato'].'</option>';
				}
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;
			return $mandati;
		}

	}

?>