<?php include "header.php" ?>
<?php if (isset($_SESSION['id_utente'])) { // se la sessione è aperta ?>


	<?php header("location: profilo.php"); // visualizzo il profilo ?>


<?php } else { // altrimenti segnalo che si deve ancora effettuare il login ?>

    <div class="jumbotron">
        <div class="container">
            <h1 class="center">Sessione di lavoro non ancora aperta</h1>
            <h2 class="center">(Utente non ancora autenticato!)</h2><br>
            <div class="center">
                <a class="btn btn-danger btn-lg col-offset-3" href="../signup/index.php" role="button">Login</a>
            </div>
        </div>
    </div>
<?php } ?>

<?php include "footer.php" ?>