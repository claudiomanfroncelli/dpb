<?php include "header.php" ?>
    <script src="js/validator.js"></script>


<?php if (isset($_REQUEST['id_utente'])) {
	$id_utente = $_REQUEST['id_utente'];
}
?>

<?php if (isset($_SESSION['id_utente'])) {
	$id_utente = $_SESSION['id_utente'];
}
?>

<?php if (isset($id_utente)) { ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="page-header">
        <div class="jumbotron">
            <div class="container">
                <h1>Benvenuto,
					<?php echo $_SESSION['nome_cognome_utente']; ?>!
                </h1>
                <h2>Ecco il tuo profilo</h2>
            </div>
        </div>
    </div>

    <!--style="background: url(img/1.jpg) no-repeat"-->
    <form action="profilo_aggiornamento.php" id="form_profilo" method="post">
        <div class="container">
			<?php echo " <input type=\"hidden\" name=\"id_utente\" value={$id_utente}>"; ?>
            <!-- Example row of columns -->
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="Nome">Nome e Cognome</label>
                    <input type="text" class="form-control input-sm" id="Nome_cognome" placeholder="Nome e Cognome"
                           name="nome_cognome_utente"
                           value="<?=$_SESSION['nome_cognome_utente']?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="Societa">Società</label>
                    <input type="text" class="form-control input-sm" id="Societa" placeholder="Società"
                           name="societa_utente"
                           value="<?=$_SESSION['societa_utente']?>" readonly>
                </div>

            </div><!-- end riga-->

            <div><p></p></div><!-- spaziatura -->

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="Ente">Ente</label>
                    <input type="text" class="form-control input-sm" id="Ente" placeholder="Denominazione Ente"
                           name="ente_utente"
                           value="<?=$_SESSION['ente_utente']?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="Ufficio">Ufficio</label>
                    <input type="text" class="form-control input-sm" id="Ufficio" placeholder="Denominazione Ufficio"
                           name="ufficio_utente"
                           value="<?=$_SESSION['ufficio_utente']?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="Compagnia">Compagnia</label>
                    <input type="text" class="form-control input-sm" id="Compagnia"
                           placeholder="Ragione Sociale Compagnia"
                           name="compagnia_utente"
                           value="<?=$_SESSION['compagnia_utente']?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="Agenzia">Agenzia</label>
                    <input type="text" class="form-control input-sm" id="Agenzia" placeholder="Nome o Sigla Agenzia"
                           name="agenzia_utente"
                           value="<?=$_SESSION['agenzia_utente']?>">
                </div>
            </div><!-- end riga-->

            <div><p></p></div><!-- spaziatura -->


            <div class="row">
                <div class="form-group col-md-6">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control input-sm" id="telefono" placeholder="Telefono Fisso"
                           name="telefono_utente"
                           value="<?=$_SESSION['telefono_utente']?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control input-sm" id="mobile" placeholder="Cellulare"
                           name="mobile_utente"
                           value="<?=$_SESSION['mobile_utente']?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="PEC">PEC</label>
                    <input type="email" class="form-control input-sm" id="PEC" placeholder="Indirizzo PEC"
                           name="pec_utente"
                           value="<?=$_SESSION['pec_utente']?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="fax">Fax</label>
                    <input type="text" class="form-control input-sm" id="fax" placeholder="Numero di fax"
                           name="fax_utente"
                           value="<?=$_SESSION['fax_utente']?>">
                </div>
            </div><!-- end riga-->
            <div><p></p></div><!-- spaziatura -->


            <div class="row center">

                <div class="btn-group">
                    <!-- un pulsante per modificare il profilo -->
                    <button type="submit" class="btn btn-success" role="button" id="updatebutton">Modifica il
                        Profilo
                    </button>

                    <!-- un pulsante per modificare il profilo -->
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </div>
        </div>  <!-- end container -->
    </form>
    <!-- fine caselle a discesa -->
<?php } else {

	include "sessione_ancora_chiusa.php";

} ?>
<?php include "footer.php" ?>