<?php


//------------------------------------------------------------------------------
//Metodo che registra il nuovo utente

	function registerNewUser($userData)
	{
		// Questi sono i dati da inserire nel database
		$userUserOppureEmail = $userData['email_oppure_utente'];
		$userPassword = $userData['password_utente'];
		$userName = $userData['nome_utente'];
		$userFamilyName = $userData['cognome_utente'];
		$userPwdScaduta = $userData['pwd_scaduta_utente'];
		$userDataCambioPwd = $userData['cambio_password_scaduta'];
		$userEmail_vera = $userData['email_vera_utente'];

		// Query per inserire i nuovi dati nel database
		$sql = "INSERT INTO utenti (email_oppure_utente, password_utente, nome_utente, cognome_utente, pwd_scaduta_utente, data_cambio_password_utente, email_vera_utente, attivo_utente) ";
		$sql .= " VALUES(:userUserOppureEmail, :userPassword, :userNome, :userCognome, :userPwdScaduta, :user_mail_vera, 1) ";


		require "Database.class.php";
		$database = new Database();

		//Preparo la query
		$database->query($sql);

		// Assegno alla query i parametri da cercare
		$database->bind(':userUserOppureEmail', $userUserOppureEmail);
		$database->bind(':userPassword', $userPassword);
		$database->bind(':userNome', $userName);
		$database->bind(':userCognome', $userFamilyName);
		$database->bind(':userEmail_vera', $userEmail_vera);
		$database->bind(':userPwdScaduta', $userPwdScaduta);
		$database->bind(':userDataCambioPwd', $userDataCambioPwd);


		// Eseguo la query sul database
		$affectedrows = $database->execute();

	}

//------------------------------------------------------------------------------
//Metodo che effettua il login

	function login($email, $upass)
	{
		$_SESSION['errorAutentica'] = "";
		$_SESSION['active'] = "";

		try {
			$stmt = $this->conn->prepare("SELECT * FROM utenti WHERE email_utente=:email_id");
			$stmt->execute(array(":email_id" => $email));
			$userRow = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($stmt->rowCount() == 1) {
				if ($userRow['attivo_utente'] == 'Y') {
					if (password_verify($upass, $userRow['password_utente'])) {
						foreach ($userRow as $nomevalore => $valore) {// se autenticazione ok,
							$_SESSION[$nomevalore] = $userRow[$nomevalore];//carico i valori del record utente //nelle $_SESSION.
						} //la sessione aperta è indicata da $_SESSION['sessione']=true e l'utente collegato è $_SESSION['id_utente'].
						return true;
					} else {
						$_SESSION['errorAutentica'] = 'Y';
						header("Location: index.php");
						exit;
					}
				} else {
					$_SESSION['errorActive'] = 'Y';
					header("Location: index.php");
					exit;
				}
			} else {
				$_SESSION['errorAutentica'] = 'Y';
				header("Location: index.php");
				exit;
			}
		}
		catch (PDOException $ex) {
			echo $ex->getMessage();
		}
	}

//---------------------------------------------------------------------------------------
// Questa funzione si occupa di controllare se un utente è già loggato
//
	function is_logged_in()
	{
		if (array_key_exists('id_utente', $_SESSION) && ($_SESSION['id_utente'] == true)) {
			return true;
		} else {
			return false;
		}
	}

//---------------------------------------------------------------------------------------
// Questa funzione si occupa di autenticare un utente
// nel sistema
	function authenticateUser($userUserOppureEmail, $userPassword)
	{
		// Apro una connessione con il database
		require "Database.class.php";
		$database = new Database();

		// Cerco nel database un utente attivo
		// con la coppia useremail:password specificata
		$sql = "SELECT * FROM utenti 
                            WHERE email_oppure_utente = :userUserOppureEmail
                            AND password_utente = :userPassword
                            AND attivo_utente = 1";

		//Preparo la query
		$database->query($sql);

		// Assegno alla query i parametri da cercare
		$database->bind(':userUserOppureEmail', $userUserOppureEmail);
		$database->bind(':userPassword', $userPassword);

		// Eseguo la query sul database
		$affectedrows = $database->execute();
		// echo "affected rows: ".$affectedrows."<br>";

		//Se trovo la riga nel database, restituisco le informazioni relative
		if ($affectedrows > 0) {
			$row = $database->single();
			return $row;
		} else {
			// Altrimenti restituisco"false"
			return false;
		}
	}


//---------------------------------------------------------------------------------------
// Questa funzione effettua il logout di un utente distruggendo tutte le session
// e le variabili relative
	function logout()
	{
		session_unset();
		session_destroy();
		$_SESSION = array();
	}

//---------------------------------------------------------------------------------------
// Questa funzione controlla l'esistenza
// nel database di un utente con uno specifico indirizzo email
	function userEmailExists($userEmailVera)
	{
		// Apro una connessione con il database
		require "Database.class.php";
		$dbh = new Database();

		// Conto il numero di utenti registrati con
		// l'indirizzo useremail specificato
		$sql = "SELECT id_utente FROM utenti WHERE email_vera_utente = '%s' ";

		// Assegno alla query i parametri da cercare
		$sql = sprintf($sql, $userEmailVera);

		// Eseguo la query sul database
		$dbh->query($sql);
		$rows = $dbh->resultset();
		$records = $dbh->rowCount();


		// Se non ho trovato utenti oppure se si Â
		// verificato un errore
		if ($records > 0) {
			return true;
		} // Altrimenti vuol dire che tutto è ok
		else {
			return false;
		}

	}

//---------------------------------------------------------------------------------------
// Questa funzione controlla l'esistenza
// nel database di un utente con lo stesso username
	function utenteExists($user)
	{
		// Apro una connessione con il database
		require "Database.class.php";
		$dbh = new Database();

		// Conto il numero di utenti registrati con
		// l'indirizzo useremail specificato
		$sql = "SELECT id_utente FROM utenti WHERE email_oppure_utente = '%s' ";

		// Assegno alla query i parametri da cercare
		$sql = sprintf($sql, $user);

		// Eseguo la query sul database
		$dbh->query($sql);
		$rows = $dbh->resultset();
		$records = $dbh->rowCount();

		// Se ho trovato un utente con lo stesso username
		// esco con true
		if ($records > 0) {
			return true;
		} // Altrimenti vuol dire che tutto è ok
		else {
			return false;
		}
	}

//---------------------------------------------------------------------------------------


// Questa funzione cerca i dati di un utente
// in base al token specificato
	function userFindByToken($token)
	{
		// Apro una connessione con il database
		$connection = getConnection();

		// Cerco un utente con un certo token
		$sql = "SELECT * FROM utenti WHERE token_utente = '%s'";

		// Assegno alla query i parametri da cercare
		$sql = sprintf($sql, $token);

		// Eseguo la query sul database
		$result = mysql_query($sql, $connection);

		// Se si Â verificato un errore oppure non
		// ho trovato nessun utente
		if (false == $result || mysql_num_rows($result) == 0) {
			return false;
		}

		// Ritorno i dati dell'utente trovato
		return mysql_fetch_assoc($result);
	}

//---------------------------------------------------------------------------------------
// Questa funzione cerca i dati di un utente
// in base all'indirizzo email specificato
	function userFindByEmail($userEmailVera)
	{
		// Apro una connessione con il database
		$connection = getConnection();

		// Cerco un utente con un certo indirizzo email
		$sql = "SELECT * FROM utenti WHERE email_vera_utente = '%s'";

		// Assegno alla query i parametri da cercare
		$sql = sprintf($sql, $userEmailVera);

		// Eseguo la query sul database
		$result = mysql_query($sql, $connection);

		// Se si Â verificato un errore oppure non
		// ho trovato nessun utente
		if (false == $result || mysql_num_rows($result) == 0) {
			return false;
		}

		// Ritorno i dati dell'utente trovato
		return mysql_fetch_assoc($result);
	}

//---------------------------------------------------------------------------------------
// Questa funzione cerca i dati di un utente
// in base ad un userId specificato
	function userFindById($userId)
	{
		// Apro una connessione con il database
		require "Database.class.php";
		$dbh = new Database();

		// Cerco un utente con un certo userId
		$sql = "SELECT * FROM utenti WHERE id_utente = %d";
		// Assegno alla query i parametri da cercare
		$sql = sprintf($sql, $userId);
		// Eseguo la query sul database
		$dbh->query($sql);
		$rowsutente = $dbh->resultset();
		$recordsutente = $dbh->rowCount();

		// Se si Â verificato un errore oppure non
		// ho trovato nessun utente
		if (false == $rowsutente || $recordsutente == 0) {
			return false;
		}

		// Altrimenti restituisco i dati dell'utente trovato
		return $rowsutente;
	}

//---------------------------------------------------------------------------------------
// Questa funzione serve per attivare l'account
// di un utente con un certo userId
	function userActivate($userId)
	{
		// Apro una connessione con il database
		$connection = getConnection();
		// Attivo l'utente impostando il campo
		// active a 1
		$sql = "UPDATE utenti 
		SET attivo_utente = 1, token_utente = NULL, privilegio_utente = '0'
		WHERE
		id_utente = %d";

		// Assegno alla query i parametri da cercare
		$sql = sprintf($sql, $userId);


		// Eseguo la query sul database
		$result = mysql_query($sql, $connection);

		// Se si Â verificato un errore oppure nessun utente
		// Å½ stato active
		if (false == $result || mysql_affected_rows($connection) == 0) {
			return false;
		} // Altrimenti l'utente Ã¨Â stato attivato
		else {
			// e creo la mail in formato HTML all'amministratore
			$headers = 'MIME-Version: 1.0'."\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
			// compongo il link per visualizzare lo user che Ã¨ stato attivato
			$authorizationLink = 'http://'.$_SERVER['HTTP_HOST'];
			$authorizationLink .= str_replace('confirm.php', 'edit_new_user.php', $_SERVER['REQUEST_URI']);
			//dalla stringa usata per attivare l'account tolgo il token (39 caratteri da destra)
			$authorizationLink = substr($authorizationLink, 0, -39);
			//$activationLink .= '?token='.$activationToken;
			$authorizationLink .= '?id='.$userId;
			//echo $authorizationLink;
			// Oggetto e testo dell'email da inviare
			$subject = 'Attivazione account';
			$emailText = "<p>E' appena stata effettuata la attivazione di un nuovo account;</p>"."<p>Per visualizzarlo ed autorizzarlo, clicca sul link sottostante</p>"."<p><a href=\"{$authorizationLink}\">Clicca qui</a></p>";
			$PostmasterEmail = "claudio@manfroncelli.it";
			$subject = "attivato nuovo utente";
			// Provo ora ad inviare l'email all'amministratore
			// Redirigo poi il nuovo utente alla pagina di conferma invio email
			mail($PostmasterEmail, $subject, $emailText, $headers);
			//exit();
			// e restituisco true alla funzione
			return true;
		}
	}

//---------------------------------------------------------------------------------------
// Questa funzione permette di settare il token
// di uno specifico utente, identificato dal suo userId
	function userSetToken($token, $userId)
	{
		// Apro la connessione al database
		$connection = getConnection();

		// Questa Â la query di aggornamento
		$sql = "UPDATE utenti 
			SET token_utente = '%s'
			WHERE id_utente = %d";

		// Assegno alla query i parametri da cercare
		$sql = sprintf($sql, $token, $userId);

		// Eseguo la query
		$result = mysql_query($sql, $connection);

		// Se si Â verificato un errore oppure nessun token Â stato settato
		// ritorno false
		if (false == $result || mysql_affected_rows($connection) == 0) {
			return false;
		} // altrimenti ritorno true
		else {
			return true;
		}

	}

//---------------------------------------------------------------------------------------
//Metodo che consente di effettuare il cambio password su richiesta dell'utente
	function userChangePassword($token, $userPassword)
	{
		// Apro una connessione con il database
		$connection = getConnection();

		// Cambio la password, impostando  il campo token a NULL
		// e inserisco la password criptata
		$sql = "UPDATE utenti SET password_utente =  '".$userPassword."', token_utente = NULL  WHERE token_utente = '".$token."'";

		// Eseguo la query sul database
		$result = mysql_query($sql, $connection);
		// Se si Â verificato un errore
		if (false == $result) {
			return false;
		} // Altrimenti ho cambiato la password
		else {
			// e creo la mail in formato HTML all'utente
			$headers = 'MIME-Version: 1.0'."\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
			$userEmailVera = $_SESSION['email_vera'];
			// Oggetto e testo dell'email da inviare
			$subject = 'Portale Assistiti - Cambio della password';
			$emailText = "<p>E' appena stata effettuata con successo la modifica della password sul Portale;</p>"."<p>Da ora si pu&ograve; accedere utilizzando la nuova password</p>";

			mail($userEmailVera, $subject, $emailText, $headers);

			// e restituisco true alla funzione
			return true;
		}
	}

//---------------------------------------------------------------------------------------
//Metodo che consente di effettuare il cambio password alla scadenza della password

	function userChangePasswordScaduta($userId, $userPassword, $scadenza_password)
	{
		// Se non è già aperta, apro una connessione con il database
		$dbh = New Database();
		//creo la query per l'aggiornamento
		$sql = "UPDATE utenti
          SET password_utente = '".$userPassword."',  data_cambio_password_utente = '".$scadenza_password."', pwd_scaduta_utente = 0 WHERE id_utente = '".$userId."'";
		// Eseguo la query sul database
		$dbh->query($sql);
		$dbh->execute();

		// Se si èverificato un errore
		if (false == $dbh) {
			return false;
		} // Altrimenti ho cambiato la password
		else {

			//se la mail vera dell'utente è <>""
			if ($_SESSION['email_vera'] <> "") {
				// creo la mail in formato HTML e la invio all'utente
				$headers = 'MIME-Version: 1.0'."\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
				$userEmailVera = $_SESSION['email_vera'];
				// Oggetto e testo dell'email da inviare
				$subject = 'Portale Assistiti - Cambio della password scaduta';
				$emailText = "<p>E' appena stata effettuata con successo la modifica della password scaduta sul Portale;</p>"."<p>Da ora si pu&ograve; accedere utilizzando la nuova password</p>";
				mail($userEmailVera, $subject, $emailText, $headers);
			}
			// e comunque restituisco true alla funzione
			return true;
		}
	}
		
