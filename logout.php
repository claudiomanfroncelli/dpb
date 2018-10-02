<?php include "header.php" ?>

<div class="page-header">
    <div class="jumbotron">
        <div class="container">
            <h1 class="center">Chiusura della Sessione di lavoro di<br> <?php echo $_SESSION['email_utente']; ?> </h1>
        </div>
    </div>
</div>
<?php session_unset(); ?>
<?php session_destroy(); ?>
<?php $_SESSION = array(); ?>

<div class="container">
    <div class="col-sm-10">
    </div>
    <div class="col-sm-5">
        <a class="btn btn-danger btn-lg center" href="../signup/index.php" role="button">Login</a>
    </div>
</div>

<?php include "footer.php" ?>

