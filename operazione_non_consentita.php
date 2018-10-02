<?php include "header.php"; ?>
<div class="jumbotron">
    <div class="container">
        <h2 class="center">Questa operazione non è consentita: o non ti sei autenticato, oppure non è sufficiente il tuo
            livello di ingresso<br>
            <div class="center">
                (<?php echo $_SESSION['nome_cognome_utente']." - L".$_SESSION['ruolo_utente'] ?>)
            </div>
        </h2>
        <div class="col-sm-10"></div>
        <div class="col-sm-2"><p><a class="btn btn-danger btn-lg" href="profilo.php" role="button">Login</a>
            </p>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
