<?php
	session_start();
	require_once 'class/User.class.php';
	$user = new USER();

	if (isset($_SESSION['id_utente'])) {
		$user->redirect('profilo.php');
	}

	if (isset($_POST['btn-login'])) {
		redirect('index.php');
	}

	if (isset($_POST['btn-submit'])) {
		$email = $_POST['txtemail'];

		$stmt = $user->runQuery("SELECT id_utente FROM utenti WHERE email_utente=:email LIMIT 1");
		$stmt->execute(array(":email" => $email));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($stmt->rowCount() == 1) {
			$id = base64_encode($row['id_utente']);
			$code = md5(uniqid(rand()));

			$stmt = $user->runQuery("UPDATE utenti SET token_utente=:token WHERE email_utente=:email");
			$stmt->execute(array(":token" => $code, "email" => $email));

			$message = "
				   Benvenuto, $email
				   <br /><br />
				   Ci è stato chiesto di effettuare il reset della tua password;
				    se hai fatto tu la richiesta e vuoi effettuare il reset ti basta cliccare sul link seguente.
				    Se invece la richiesta non è tua oppure hai cambiato idea, ignora questo messaggio.
				   <br /><br />
				   Link da cliccare per effettuare il reset della password:
				   <br /><br />
				   <a href='http://www.dpbroker.it/signup/resetpass.php?id=$id&code=$code'>clicca qui</a>
				   <br /><br />
				   Grazie
				   ";
			$subject = "Password Reset";

			$user->send_mail($email, $message, $subject);

			$msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					Abbiamo inviato una mail a $email.
                    Per favore, clicca sul link contenuto per generare una nuova password.
			  	</div>";
		} else {
			$msg = "<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Ci dispiace, ma non abbiamo trovato questo indirizzo mail.</strong>
			    </div>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nuova Password | DP Broker</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body id="login">
<div class="container">

    <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Nuova Password</h2>
        <hr/>

		<?php
			if (isset($msg)) {
				echo $msg;
			} else {
				?>
                <div class='alert alert-info'>
                    Digita qui il tuo indirizzo email.<br>
                    Riceverai per posta il link per creare una nuova password.
                </div>
				<?php
			}
		?>

        <input type="email" class="input-block-level" placeholder="Indirizzo Email" name="txtemail" required/>
        <hr/>
        <button class="btn btn-danger btn-large btn-primary" type="submit" name="btn-submit">Invia il link</button>
        <a href="index.php" style="float:right;" class="btn btn-large">Torna al Login</a>

    </form>

</div> <!-- /container -->
<script src="js/jquery-1.11.1.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>