<?php

// Define configuration
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "Sql973021_2");
//	define("DB_HOST", "89.46.111.19");
//	define("DB_USER", "Sql973021");
//	define("DB_PASS", "o739y0hn82");
//	define("DB_NAME", "Sql973021_2");

	/**
	 * Created by PhpStorm.
	 * User: famiglia
	 * Date: 01/02/2017
	 * Time: 15:28
	 */
	class Database
	{
		public $conn;
		private $host = DB_HOST;
		private $user = DB_USER;
		private $pass = DB_PASS;
		private $dbname = DB_NAME;
		private $pdo;
		private $errore;
		private $statement;

//------------------------------------------------------------------------------
//Metodi che si applicano al database

		public function __construct()
		{
			// Set DSN
			$dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
			// Set options
			$options = array(PDO::ATTR_PERSISTENT => false,// non true: per guadagnare in prestazione si rischiano casini giganteschi
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
			// Create a new PDO instance
			try {
				$this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
			} // Catch any errors
			catch (PDOException $e) {
				$this->errore = $e->getMessage();
			}
		}


		public function lastInsertId()
		{
			return $this->pdo->lastInsertId();
		}

		public function beginTransaction()
		{
			return $this->pdo->beginTransaction();
		}

		public function endTransaction()
		{
			return $this->pdo->commit();
		}

		public function cancelTransaction()
		{
			return $this->pdo->rollBack();
		}

		//------------------------------------------------------------------------------
//Metodi che si applicano agli statement (in particolare, alle query)

		public function bind($param, $value, $type = null)
		{
			if (is_null($type)) {
				switch (true) {
					case is_int($value):
						$type = PDO::PARAM_INT;
						break;
					case is_bool($value):
						$type = PDO::PARAM_BOOL;
						break;
					case is_null($value):
						$type = PDO::PARAM_NULL;
						break;
					default:
						$type = PDO::PARAM_STR;
				}
			}
			$this->statement->bindValue($param, $value, $type);
		}


		public function query($query)
		{
			$this->statement = $this->pdo->prepare($query);
		}


		//funzione per l'aggiornamento dei dati in tabella
		//$campi è un elenco di campi diviso da virgole; $valori è un array

		public function inserisci($tabella, $campi = null, $valori = null)
		{
			$istruzione = "INSERT INTO ".$tabella;
			$istruzione .= " (".$campi.")";
			$numerovalori = count($valori);

			for ($i = 0; $i < $numerovalori; $i++) {
				if (is_string($valori[$i])) {
					$valori[$i] = '"'.$valori[$i].'"';
				}
			}
			$valori = implode(",", $valori);
			$istruzione .= " VALUES (".$valori.")";
			//echo "sql inserimento:" . $istruzione . "<br>";
			//die();
			$this->statement = $this->pdo->prepare($istruzione);

		}


		//funzione per l'aggiornamento dei dati in tabella
		//$campi e $valori sono array

		public function aggiorna($tabella, $campi = null, $valori = null, $condizioni = null)
		{
			$istruzione = "UPDATE ".$tabella." SET ";
			$numerovalori = count($valori);

			for ($i = 0; $i < $numerovalori; $i++) {
				if (is_string($valori[$i])) {
					if ($i > 0) {
						$istruzione .= " , ";
					}
				}
				$istruzione .= " $campi[$i] = '".$valori[$i]."' ";
			}
			$istruzione .= " WHERE 1 = 1 ";

			if ($condizioni <> "") {
				$istruzione .= " AND ".$condizioni;
			}
			//echo "sql aggiornamento:" . $istruzione . "<br>";
			$this->statement = $this->pdo->prepare($istruzione);
		}


		public function resultset()
		{
			$this->execute();
			return $this->statement->fetchAll(PDO::FETCH_ASSOC);
		}


		public function execute()
		{
			return $this->statement->execute();
		}


		public function resultsetobj()
		{
			$this->execute();
			return $this->statement->fetchAll(PDO::FETCH_OBJ);
		}

		public function resultsetnum()
		{
			$this->execute();
			return $this->statement->fetchAll(PDO::FETCH_NUM);
		}


		public function single()
		{
			$this->execute();
			return $this->statement->fetch(PDO::FETCH_ASSOC);
		}


		public function rowCount()
		{
			return $this->statement->rowCount();// non si può usare con la SELECT
		}


		public function debugDumpParams()
		{
			return $this->statement->debugDumpParams();
		}


		public function ShowNazioniNascita()
		{
			$nazioninascita = '<option value="">Scegli la Nazione</option>';

			$sql = "SELECT nome_nazione FROM nazioni ORDER BY nome_nazione";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {
				$nazioninascita .= '<option value="'.$row['nome_nazione'].'"  > '.utf8_encode($row['nome_nazione']).'</option>';
			}
			//$this->pdo = null;
			return $nazioninascita;
		}


		public function ShowNazioniCittadinanza()
		{
			$cittadinanza = '<option value="">Scegli la Nazione</option>';

			$sql = "SELECT nome_nazione FROM nazioni ORDER BY nome_nazione";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {
				$cittadinanza .= '<option value="'.$row['nome_nazione'].'"  > '.utf8_encode($row['nome_nazione']).'</option>';
			}
			//$this->pdo = null;
			return $cittadinanza;
		}


		public function ShowRegioniAbitazione()
		{

			$regioniabitazione = '<option value="0">scegli la regione...</option>';

			$sql = "SELECT * FROM regioni ORDER BY nome_regione";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {
				$regioniabitazione .= '<option value="'.$row['id_regione'].'">'.utf8_encode($row['nome_regione']).'</option>';
			}
			//$this->pdo = null;
			return $regioniabitazione;
		}


		public function ShowProvinceAbitazione()
		{

			$provinceabitazione = '<option value="0">scegli la provincia...</option>';

			$sql = "SELECT * FROM province WHERE nome_regione_provincia = '".$_POST['nome_regione']."'";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {
				$provinceabitazione .= '<option value="'.$row['id_provincia'].'">'.utf8_encode($row['nome_provincia']).'</option>';
			}
			//$this->pdo = null;
			return $provinceabitazione;
		}


		public function ShowComuniAbitazione()
		{

			$comuniabitazione = '<option value="0">scegli il comune...</option>';

			$sql = "SELECT nome_comune, cap_comune FROM comuni WHERE sigla_provincia_comune = '".$_POST['sigla_provincia']."' ORDER BY comuni.nome_comune";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {
				$comuniabitazione .= '<option value="'.$row['nome_comune'].'">'.utf8_encode($row['nome_comune']).' - '.$row['cap_comune'].'</option>';
			}
			return $comuniabitazione;
		}


		public function ShowCapAbitazione()
		{

			$sql = "SELECT cap_comune FROM comuni WHERE nome_comune = '".$_POST['nome_comune']."'";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {
				return $row['cap_comune'];
			}
		}


		public function Show_PicklistAttivita()
		{
			$attivita = '<option value="0">scegli il tipo attività...</option>';

			$sql = "SELECT id_picklist, valore FROM Sql693597_1.picklist WHERE picklist = 'ATTIVITA' ORDER BY valore";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {
				$attivita .= '<option value="'.$row['id_picklist'].'">'.utf8_encode($row['valore']).'</option>';
			}
			return $attivita;
		}


		public function Show_PicklistFamiliare()
		{
			$familiari = '<option value="0">Scegli il legame...</option>';

			$sql = "SELECT id_picklist, valore FROM Sql693597_1.picklist WHERE picklist = 'FAMILIARE' ORDER BY valore";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {
				$familiari .= '<option value="'.$row['id_picklist'].'">'.utf8_encode($row['valore']).'</option>';
			}
			return $familiari;
		}


		public function Show_PicklistPermesso()
		{
			$permessi = '<option value="0">scegli il permesso...</option>';

			$sql = "SELECT id_picklist, valore FROM Sql693597_1.picklist WHERE picklist = 'PERMESSO' ORDER BY valore";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {
				$permessi .= '<option value="'.$row['id_picklist'].'">'.utf8_encode($row['valore']).'</option>';
			}
			return $permessi;
		}


		public function Show_TipoPatente()
		{
			$patenti = '<option value="0">scegli il tipo...</option>';

			$sql = "SELECT id_patente, tipo_patente FROM Sql693597_1.patenti ORDER BY tipo_patente";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {
				$patenti .= '<option value="'.$row['id_patente'].'">'.utf8_encode($row['tipo_patente']).'</option>';
			}
			return $patenti;
		}


		public function Show_NucleoFamiliare()
		{
			$nucleo = '<option value="0">scegli il capofamiglia...</option>';

			$sql = "SELECT id_persona, cognome_persona, nome_persona, codice_conf_persona FROM Sql693597_1.persona WHERE persona.cancellato_persona <> 1 ";

			if ($_SESSION['privilegio_utente'] == "4") {
				$sql .= " AND persona.codice_conf_persona ='";
				$sql .= $_SESSION['conferenza_utente'];
				$sql .= "' ";
			}
			$sql .= " ORDER BY cognome_persona ASC, nome_persona ASC ";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {
				$nucleo .= '<option value="'.$row['id_persona'].'">'.utf8_encode($row['cognome_persona']).' '.utf8_encode($row['nome_persona']).'</option>';
			}
			return $nucleo;
		}


		public function Inserisci_DatiGenerali()
		{
			$assistitoInserito = $_POST['nome_persona']." ".$_POST['cognome_persona'];

			$sql = " INSERT INTO persona ( ";
			$sql .= " codice_conf_persona, nome_persona, cognome_persona, sesso_persona, data_nascita_persona, ";
			$sql .= " nazione_nascita_persona, regione_nascita_persona, provincia_nascita_persona, comune_nascita_persona, ";
			$sql .= " cittadinanza_persona, codice_fiscale_persona, regione_abitazione_persona, provincia_abitazione_persona, ";
			$sql .= " comune_abitazione_persona, cap_abitazione_persona, indirizzo_abitazione_persona, anno_arrivo_italia_persona, ";
			$sql .= " tipo_attivita_persona, riservato_persona )";

			$sql .= " VALUES(\"$_POST[codice_conf_persona]\", \"$_POST[nome_persona]\", \"$_POST[cognome_persona]\",\"$_POST[sesso_persona]\", date_format(\"$_POST[data_nascita_persona]\", 'Y-m-d'), \"$_POST[nazione_nascita_persona]\", \"$_POST[regione_nascita_persona]\", \"$_POST[provincia_nascita_persona]\", \"$_POST[comune_abitazione_persona]\", \"$_POST[cap_abitazione_persona]\", \"$_POST[indirizzo_abitazione_persona]\", \"$_POST[anno_arrivo_italia_persona]\", \"$_POST[tipo_attivita_persona]\", \"$_POST[riservato_persona]\") ";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			return $assistitoInserito;

		}


		public
		function ShowRegioni()
		{

			$regioni = '<option value="">Scegli la Regione...</option>';

			$sql = "SELECT * FROM regioni ORDER BY nome_regione";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {

				$regioni .= '<option value="'.$row['id_regione'].'"  >'.utf8_encode($row['nome_regione']).'</option>';
			}
			//$this->pdo = null;
			return $regioni;
		}


		public
		function ShowProvince()
		{

			$province = '<option value="">Scegli la Provincia...</option>';

			$sql = "SELECT * from province WHERE id_regione_provincia = ".$_POST['id_regione']." ORDER BY nome_provincia ";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {
				$province .= '<option value="'.$row['id_provincia'].'">'.utf8_encode($row['nome_provincia']).'</option>';
			}
			//$this->pdo = null;
			return $province;
		}


		public
		function ShowComuni()
		{

			$comuni = '<option value="">Scegli il Comune...</option>';

			$sql = "SELECT * from comuni WHERE id_provincia_comune = ".$_POST['id_provincia']." ORDER BY nome_comune";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);


			foreach ($rows as $row) {
				$comuni .= '<option value="'.$row['id_comune'].'">'.utf8_encode($row['nome_comune']).' - '.$row['cap_comune'].'</option>';
			}
			//$this->pdo = null;
			return $comuni;
		}

		public
		function ShowRegioniNascita()
		{

			$regioninascita = '<option value="0">Scegli la Regione...</option>';

			$sql = "SELECT * FROM regioni ORDER BY nome_regione";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {

				$regioninascita .= '<option value="'.$row['id_regione'].'"  >'.utf8_encode($row['nome_regione']).'</option>';
			}
			//$this->pdo = null;
			return $regioninascita;
		}


		public
		function ShowProvinceNascita()
		{

			$provincenascita = '<option value="0">Scegli la Provincia...</option>';

			$sql = "SELECT * from province WHERE id_regione_provincia = ".$_POST['id_regione']." ORDER BY nome_provincia ";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {
				$provincenascita .= '<option value="'.$row['id_provincia'].'">'.utf8_encode($row['nome_provincia']).'</option>';
			}
			//$this->pdo = null;
			return $provincenascita;
		}


		public
		function ShowComuniNascita()
		{

			$comuninascita = '<option value="0">Scegli il Comune...</option>';

			$sql = "SELECT * from comuni WHERE id_provincia_comune = ".$_POST['id_provincia']." ORDER BY nome_comune";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);


			foreach ($rows as $row) {
				$comuninascita .= '<option value="'.$row['id_comune'].'">'.utf8_encode($row['nome_comune']).' - '.$row['cap_comune'].'</option>';
			}
			//$this->pdo = null;
			return $comuninascita;
		}

		public
		function ShowRegioniResidenza()
		{

			$regioniresidenza = '<option value="0">Scegli la Regione...</option>';

			$sql = "SELECT * FROM regioni ORDER BY nome_regione";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {

				$regioniresidenza .= '<option value="'.$row['id_regione'].'"  >'.utf8_encode($row['nome_regione']).'</option>';
			}
			//$this->pdo = null;
			return $regioniresidenza;
		}


		public
		function ShowProvinceResidenza()
		{

			$provinceresidenza = '<option value="0">Scegli la Provincia...</option>';

			$sql = "SELECT * from province WHERE id_regione_provincia = ".$_POST['id_regione']." ORDER BY nome_provincia ";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {
				$provinceresidenza .= '<option value="'.$row['id_provincia'].'">'.utf8_encode($row['nome_provincia']).'</option>';
			}
			//$this->pdo = null;
			return $provinceresidenza;
		}


		public
		function ShowComuniResidenza()
		{

			$comuniresidenza = '<option value="0">Scegli il Comune...</option>';

			$sql = "SELECT * from comuni WHERE id_provincia_comune = ".$_POST['id_provincia']." ORDER BY nome_comune";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);


			foreach ($rows as $row) {
				$comuniresidenza .= '<option value="'.$row['id_comune'].'">'.utf8_encode($row['nome_comune']).' - '.$row['cap_comune'].'</option>';
			}
			//$this->pdo = null;
			return $comuniresidenza;
		}


		public
		function ShowRegioniCorrispondenza()
		{

			$regionicorrispondenza = '<option value="0">Scegli la Regione...</option>';

			$sql = "SELECT * FROM regioni ORDER BY nome_regione";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {

				$regionicorrispondenza .= '<option value="'.$row['id_regione'].'"  >'.utf8_encode($row['nome_regione']).'</option>';
			}
			//$this->pdo = null;
			return $regionicorrispondenza;
		}


		public
		function ShowProvinceCorrispondenza()
		{

			$provincecorrispondenza = '<option value="0">Scegli la Provincia...</option>';

			$sql = "SELECT * from province WHERE id_regione_provincia = ".$_POST['id_regione']." ORDER BY nome_provincia ";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {
				$provincecorrispondenza .= '<option value="'.$row['id_provincia'].'">'.utf8_encode($row['nome_provincia']).'</option>';
			}
			//$this->pdo = null;
			return $provincecorrispondenza;
		}


		public
		function ShowComuniCorrispondenza()
		{

			$comunicorrispondenza = '<option value="0">Scegli il Comune...</option>';

			$sql = "SELECT * from comuni WHERE id_provincia_comune = ".$_POST['id_provincia']." ORDER BY nome_comune";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);


			foreach ($rows as $row) {
				$comunicorrispondenza .= '<option value="'.$row['id_comune'].'">'.utf8_encode($row['nome_comune']).' - '.$row['cap_comune'].'</option>';
			}
			//$this->pdo = null;
			return $comunicorrispondenza;
		}

		public
		function ShowContraenti()
		{

			$contraenti = '<option value="">Scegli il Contraente...</option>';

			$sql = "SELECT * from contraenti ORDER BY cognome_contraente, nome_contraente";

			$this->statement = $this->pdo->prepare($sql);
			$this->execute();
			$rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);


			foreach ($rows as $row) {
				$contraenti .= '<option value="'.$row['id_contraente'].'">'.utf8_encode($row['cognome_contraente']).' '.utf8_encode($row['nome_contraente']).'</option>';
			}
			//$this->pdo = null;
			return $contraenti;
		}


		public function chiudiPdo()
		{
			$this->errore = null;
			$this->statement = null;
			$this->pdo = null;
		}


		// distruttore
		public function __destruct()
		{
			//echo "__destruct method called!";
		}

	}