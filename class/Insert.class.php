<?php

	/**
	 * Created by PhpStorm.
	 * User: famiglia
	 * Date: 28/11/2016
	 * Time: 10:01
	 */
	class Insert
	{

		public function InserisciPolizza()
		{
			include_once "Database.class.php";

			try {
				$dbh = new PDO('mysql:host='.$host.';dbname='.$db, $user, $password);
				$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = "INSERT INTO polizze ";
				$stmt .= " (id_contraente_polizza, id_compagnia_polizza, id_agenzia_polizza, ";
				$stmt .= " numero_polizza, decorrenza_polizza, scadenza_polizza, inizio_copertura_polizza, fine_copertura_polizza, ";
				$stmt .= " id_mandato_polizza, id_accordo_collaborazione_polizza, numero_sostituita_polizza, ";
				$stmt .= " data_sostituzione_polizza, ramo_polizza, tipologia_polizza, frazionamento_polizza, ";
				$stmt .= " capitolato_polizza, massimale_totale_annuo_polizza, tipologia_contratto_polizza, ";
				$stmt .= " tacito_rinnovo_polizza, proroga_servizio_polizza, termine_primo_premio_polizza, ";
				$stmt .= " mora_altre_scadenze_polizza, provvigioni_broker_polizza, regolazione_premio_polizza, ";
				$stmt .= " giorni_denuncia_sinistro_polizza, stato_polizza, premio_netto_polizza, accessori_polizza, ";
				$stmt .= " imposte_polizza, ssn_polizza, totale_lordo_polizza, totale_imponibile_polizza) ";

				$stmt .= " VALUES(\"$_POST[contraente]\", \"$_POST[compagnia]\", \"$_POST[agenzia]\", \"$_POST[numeropolizza]\", ";
				$stmt .= " date_format(\"$_POST[decorrenza]\", 'Y-m-d'), date_format(\"$_POST[scadenza]\", 'Y-m-d'), ";
				$stmt .= " date_format(\"$_POST[iniziocopertura]\", 'Y-m-d'), date_format(\"$_POST[finecopertura]\", 'Y-m-d'), ";
				$stmt .= " \"$_POST[numeromandato]\", \"$_POST[accordo]\",  \"$_POST[numerosostituita]\", ";
				$stmt .= " date_format(\"$_POST[datasostituzione]\", 'Y-m-d'), \"$_POST[ramo]\", \"$_POST[tipologia]\", \"$_POST[frazionamento]\", ";
				$stmt .= " \"$_POST[capitolato]\", \"$_POST[massimaleannuo]\", \"$_POST[tipologiacontratto]\", ";
				$stmt .= " \"$_POST[tacitorinnovo]\", \"$_POST[prorogaservizio]\", \"$_POST[terminepagamentoprimopremio]\", ";
				$stmt .= " \"$_POST[morascadenze]\", \"$_POST[provvigionibroker]\", \"$_POST[regolazionepremio]\", ";
				$stmt .= " \"$_POST[giornidenunciasinistro]\", \"$_POST[stato]\", \"$_POST[premionetto]\", \"$_POST[accessori]\", ";
				$stmt .= " \"$_POST[imposte]\", \"$_POST[ssn]\", \"$_POST[totalelordo]\", \"$_POST[totaleimponibile]\" )";
				//, ); ";

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


?>