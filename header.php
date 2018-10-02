<?php ob_start() ?>
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>DP Broker</title>

    <!-- Bootstrap core CSS -->
    <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/bootstrapceruleannew.css" rel="stylesheet">
    <link href="css/bootstrap24colonne.css" rel="stylesheet">
    <link href="css/modifiche_bootstrap.css" rel="stylesheet">

</head>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php" class="navbar-left"><img src="img/logo50pxsfondo bianco.png"></a>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><a href="istruzioni.php">Istruzioni</a></li>
            <li><a href="compagnie.php">Compagnie</a></li>
            <li><a href="agenzie.php">Agenzie</a></li>
            <li><a href="mandati.php">Mandati</a></li>
            <li><a href="contraenti.php">Contraenti</a></li>
            <li><a href="polizze.php">Polizze</a></li>
            <li><a href="premi.php">Premi</a></li>
            <li><a href="sinistri.php">Sinistri</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Anagrafiche<span
                            class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="soggettiterzi.php">Soggetti Terzi</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">SOLO AMMINISTRATORE</li>
                    <li><a href="utenti.php">Gestione Utenti</a></li>
                </ul>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Account <span
                            class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="cartellaprivata.php">Cartella Privata</a></li>
                    <li hidden><a href="profilo.php">Profilo</a></li>
                    <li hidden><a href="profilo_modifica.php">Modifica il Profilo</a></li>
                    <li hidden><a href="../signup/fpass.php">Reset Password</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">CHIUSURA SESSIONE DI LAVORO</li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav><!--/.nav-collapse -->
<br>
