<?php

	/**
	 * Created by PhpStorm.
	 * User: famiglia
	 * Date: 28/11/2016
	 * Time: 10:01
	 */
	class Update
	{
		public function AggiornaAgenzia()
		{
			include_once "Database.class.php";

			try {
				$dbh = new PDO('mysql:host='.$host.';dbname='.$db, $user, $password);
				$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = "UPDATE agenzie SET ";
				$stmt .= " persona_agenzia = \"$_POST[personariferimento]\", ";
				$stmt .= " email_agenzia = \"$_POST[email]\", pec_agenzia = \"$_POST[pec]\", ";
				$stmt .= " telfisso_agenzia = \"$_POST[telefono]\", ";
				$stmt .= " mobile_agenzia = \"$_POST[mobile]\", fax_agenzia = \"$_POST[fax]\", ";
				$stmt .= " cap_agenzia = \"$_POST[cap]\", indirizzo_agenzia = \"$_POST[indirizzo]\" ";
				$stmt .= " WHERE agenzie.id_agenzia = \"$_POST[id_agenzia]\" ";
				//, ) ";

				$query = $dbh->prepare($stmt);
				$query->execute();

			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;
		}

		public function AggiornaContraente()
		{
			include_once "Database.class.php";

			try {
				$dbh = new PDO('mysql:host='.$host.';dbname='.$db, $user, $password);
				$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = "UPDATE contraenti SET ";
				$stmt .= " personafisica_contraente = \"$_POST[personafisica]\", ";
				$stmt .= " privacy_contraente = \"$_POST[privacy]\", ";
				$stmt .= " email_contraente = \"$_POST[email]\", pec_contraente = \"$_POST[pec]\", ";
				$stmt .= " telfisso_contraente = \"$_POST[telefono]\", ";
				$stmt .= " mobile_contraente = \"$_POST[mobile]\", fax_contraente = \"$_POST[fax]\", ";
				$stmt .= " cap_contraente = \"$_POST[cap]\", indirizzo_contraente = \"$_POST[indirizzo]\", ";
				$stmt .= " piva_contraente = \"$_POST[piva]\", cf_contraente = \"$_POST[cf]\", ";
				$stmt .= " professione_contraente = \"$_POST[professione]\", ";
				$stmt .= " sito_contraente = \"$_POST[sito]\", modulo_7a7b_contraente = \"$_POST[modulo7a7b]\" ";
				$stmt .= " WHERE contraenti.id_contraente = \"$_POST[id_contraente]\" ";
				//, ) ";

				$query = $dbh->prepare($stmt);
//            $query->bindParam[:firstname', $firstname);
//            $query->bindParam[:lastname', $lastname);
				$query->execute();
//            $id = $dbh->lastInsertId();
//            return $id;
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;
		}

		public function AggiornaPolizza()
		{
			include_once "Database.class.php";

			try {
				$dbh = new PDO('mysql:host='.$host.';dbname='.$db, $user, $password);
				$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = "UPDATE polizze SET ";
				$stmt .= " stato_polizza = \"$_POST[stato]\", ";
				$stmt .= " frazionamento_polizza = \"$_POST[frazionamento]\", ";
				$stmt .= " numero_sostituita_polizza = \"$_POST[numerosostituita]\", ";
				$stmt .= " data_sostituzione_polizza = \"$_POST[datasostituzione]\", ";
				$stmt .= " proroga_servizio_polizza = \"$_POST[prorogaservizio]\", ";
				$stmt .= " tacito_rinnovo_polizza = \"$_POST[tacitorinnovo]\" ";
				$stmt .= " WHERE polizze.id_polizza = \"$_POST[id_polizza]\" ";
				//, ) ";

				$query = $dbh->prepare($stmt);
//            $query->bindParam[:firstname', $firstname);
//            $query->bindParam[:lastname', $lastname);
				$query->execute();
//            $id = $dbh->lastInsertId();
//            return $id;
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;
		}

		public function AggiornaUtente()
		{
			include_once "Database.class.php";

			try {
				$dbh = new PDO('mysql:host='.$host.';dbname='.$db, $user, $password);
				$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = "UPDATE utenti SET ";
				$stmt .= " ente_utente = \"$_POST[ente_utente]\", ";
				$stmt .= " ufficio_utente = \"$_POST[ufficio_utente]\", ";
				$stmt .= " compagnia_utente = \"$_POST[compagnia_utente]\", ";
				$stmt .= " agenzia_utente = \"$_POST[agenzia_utente]\", ";
				$stmt .= " telefono_utente = \"$_POST[telefono_utente]\", ";
				$stmt .= " mobile_utente = \"$_POST[mobile_utente]\", ";
				$stmt .= " pec_utente = \"$_POST[pec_utente]\", ";
				$stmt .= " fax_utente = \"$_POST[fax_utente]\" ";
				$stmt .= " WHERE utenti.id_utente = \"$_POST[id_utente]\" ";
				//, ) ";
				/*$_SESSION['ente_utente'] = "";
				$_SESSION['ufficio_utente'] = "";
				$_SESSION['compagnia_utente'] = "";
				$_SESSION['agenzia_utente'] = "";
				$_SESSION['telefono_utente'] = "";
				$_SESSION['mobile_utente'] = "";
				$_SESSION['pec_utente'] = "";
				$_SESSION['fax_utente'] = "";

				$_SESSION['ente_utente'] = $_POST['ente_utente'];
				$_SESSION['ufficio_utente'] = $_POST['ufficio_utente'];
				$_SESSION['compagnia_utente'] = $_POST['compagnia_utente'];
				$_SESSION['agenzia_utente'] = $_POST['agenzia_utente'];
				$_SESSION['telefono_utente'] = $_POST['telefono_utente'];
				$_SESSION['mobile_utente'] = $_POST['mobile_utente'];
				$_SESSION['pec_utente'] = $_POST['pec_utente'];
				$_SESSION['fax_utente'] = $_POST['fax_utente'];*/

				$query = $dbh->prepare($stmt);
//            $query->bindParam[:firstname', $firstname);
//            $query->bindParam[:lastname', $lastname);
				$query->execute();
//            $id = $dbh->lastInsertId();
//            return $id;
			}
			catch (PDOException $e) {
				print "Error!: ".$e->getMessage()."<br/>";
				die();
			}
			$dbh = null;

		}

	}
