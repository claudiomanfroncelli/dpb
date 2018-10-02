<?php include "header.php" ?>
<?php if (isset($_SESSION['id_utente'])) { ?>


    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="page-header">
        <div class="jumbotron">
            <div class="container">
                <h1>Benvenuto, <?php echo $_SESSION['nome_cognome_utente']; ?>!</h1>
                <h2>Ecco il tuo profilo</h2>
            </div>
        </div>
    </div>

    <!--style="background: url(img/1.jpg) no-repeat"-->

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="form-group col-md-8">
                <label for="Nome">Nome e Cognome</label>
                <input type="text" class="form-control input-sm" id="Nome_cognome" placeholder="Nome e Cognome"
                       value="<?=$_SESSION['nome_cognome_utente']?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="Societa">Società</label>
                <input type="text" class="form-control input-sm" id="Societa" placeholder="Società"
                       value="<?=$_SESSION['societa_utente']?>" readonly>
            </div>

        </div><!-- end riga-->

        <div><p></p></div><!-- spaziatura -->

        <div class="row">
            <div class="form-group col-md-6">
                <label for="Ente">Ente</label>
                <input type="text" class="form-control input-sm" id="Ente" placeholder="Denominazione Ente"
                       value="<?=$_SESSION['ente_utente']?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="Ufficio">Ufficio</label>
                <input type="text" class="form-control input-sm" id="Ufficio" placeholder="Denominazione Ufficio"
                       value="<?=$_SESSION['ufficio_utente']?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="Compagnia">Compagnia</label>
                <input type="text" class="form-control input-sm" id="Compagnia" placeholder="Ragione Sociale Compagnia"
                       value="<?=$_SESSION['compagnia_utente']?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="Agenzia">Agenzia</label>
                <input type="text" class="form-control input-sm" id="Agenzia" placeholder="Nome o Sigla Agenzia"
                       value="<?=$_SESSION['agenzia_utente']?>" readonly>
            </div>
        </div><!-- end riga-->

        <div><p></p></div><!-- spaziatura -->


        <div class="row">
            <div class="form-group col-md-6">
                <label for="telefono">Telefono</label>
                <input type="text" class="form-control input-sm" id="telefono" placeholder="Telefono Fisso"
                       value="<?=$_SESSION['telefono_utente']?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control input-sm" id="mobile" placeholder="Cellulare"
                       value="<?=$_SESSION['mobile_utente']?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="PEC">PEC</label>
                <input type="email" class="form-control input-sm" id="PEC" placeholder="Indirizzo PEC"
                       value="<?=$_SESSION['pec_utente']?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="fax">Fax</label>
                <input type="text" class="form-control input-sm" id="fax" placeholder="Numero di fax"
                       value="<?=$_SESSION['fax_utente']?>" readonly>
            </div>
        </div><!-- end riga-->
    </div>  <!-- end container -->

    <div><p></p></div><!-- spaziatura -->
    <div><p></p></div><!-- spaziatura -->

    <div class="row">

        <div class="form-group col-md-8">
        </div>
        <div class="form-group col-md-2">
            <!-- un pulsante per modificare il profilo -->
            <!--    <a href="modifica_profilo.php" class="btn btn-primary btn-sm" role="button">Modifica Profilo</a>-->
        </div>
    </div>
    <!-- fine caselle a discesa -->
<?php } else {

	include "sessione_ancora_chiusa.php";

} ?>

<?php include "footer.php" ?>