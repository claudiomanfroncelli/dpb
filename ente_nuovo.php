<?php include "header.php" ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1>Nuovo Ente</h1>
            <!-- Righe di dettaglio -->
            <!-- inizio prima riga -->
            <form id="formnuovacompagnia" method="post" action="">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="compagnia" class="control-label">Ente</label>
                        <input type="text" class="form-control input-sm"
                               id="compagnia" name="compagnia"
                               placeholder="Ragione Sociale Ente"
                               data-validation="length alphabetic"
                               data-validation-length="min3"
                               required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email" class="control-label">Email</label>
                        <input type="text" class="form-control input-sm"
                               id="email" name="email" placeholder="Email"
                               data-validation="email"
                               required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="pec" class="control-label">PEC</label>
                        <input type="text" class="form-control input-sm"
                               id="pec" name="pec" placeholder="PEC"
                               data-validation="email"
                               required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telefono" class="control-label">Telefono</label>
                        <input type="text" class="form-control input-sm"
                               id="telefono" placeholder="Telefono fisso"
                               name="telefono"
                               data-validation="length number"
                               data-validation-length="min8">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mobile" class="control-label">Mobile</label>
                        <input type="text" class="form-control input-sm"
                               id="mobile" placeholder="Mobile"
                               name="mobile"
                               data-validation="length number"
                               data-validation-length="min8">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="piva" class="control-label">P.Iva</label>
                        <input type="text" class="form-control input-sm"
                               id="input2" placeholder="P.Iva"
                               data-validation="length number"
                               data-validation-length="min11"
                               maxlength="11"
                               required>
                    </div>
                </div><!-- fine prima riga -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="input1" class="control-label">Indirizzo</label>
                        <input type="text" class="form-control input-sm"
                               id="input1" placeholder="Indirizzo"
                               data-validation="length alphanumericaccentospazio"
                               data-validation-length="min3"
                               required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="input2" class="control-label">CAP</label>
                        <input type="text" class="form-control input-sm"
                               id="input2" placeholder="CAP"
                               data-validation="length"
                               data-validation-length="min5"
                               maxlength="5"
                               required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input2" class="control-label">Città</label>
                        <input type="text" class="form-control input-sm"
                               id="input2" placeholder="Città"
                               data-validation="length alphabeticaccentospazio"
                               data-validation-length="min3"
                               required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input2" class="control-label">Provincia</label>
                        <input type="text" class="form-control input-sm"
                               id="input2" placeholder="Provincia"
                               data-validation="length alphabeticaccentospazio"
                               data-validation-length="min3"
                               required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="input2" class="control-label">Regione</label>
                        <input type="text" class="form-control input-sm"
                               id="input2" placeholder="Regione"
                               data-validation="length alphabeticaccentospazio"
                               data-validation-length="min3"
                               required>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Conferma</label>
                        <a href="compagnia_nuova.php"
                           class="btn btn-danger btn-sm" role="button"
                        >Inserimento</a>
                    </div>
                </div><!-- fine seconda riga -->
            </form><!-- fine form -->
        </div><!-- fine container -->
    </div><!-- fine jumbotron -->

    <!-- finito il jumbotron, comincia la tabella -->

    <div class="container">
        <br>
        <ul class="nav nav-pills">
            <li class="active"><a href="#tab-1" data-toggle="pill">Persone di Riferimento</a></li>
        </ul>
        <br>
        <div class="tab-content">
            <div class="tab-pane active" id="tab-1">
                <form id="formnuovaagenzia" method="post" action="">
                    <div class="row">
                        <div class="col-xs-offset-1">
                            <div class="form-group col-md-4">
                                <label for="compagnia" class="control-label">Nome</label>
                                <input type="text" class="form-control input-sm"
                                       id="compagnia" name="compagnia"
                                       placeholder="Ragione Sociale Agenzia"
                                       data-validation="length alphabetic"
                                       data-validation-length="min3"
                                       required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="compagnia" class="control-label">Cognome</label>
                                <input type="text" class="form-control input-sm"
                                       id="compagnia" name="compagnia"
                                       placeholder="Ragione Sociale Agenzia"
                                       data-validation="length alphabetic"
                                       data-validation-length="min3"
                                       required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email" class="control-label">Email</label>
                                <input type="text" class="form-control input-sm"
                                       id="email" name="email" placeholder="Email"
                                       data-validation="email"
                                       required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="pec" class="control-label">PEC</label>
                                <input type="text" class="form-control input-sm"
                                       id="pec" name="pec" placeholder="PEC"
                                       data-validation="email"
                                       required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="telefono" class="control-label">Telefono</label>
                                <input type="text" class="form-control input-sm"
                                       id="telefono" placeholder="Telefono"
                                       name="telefono"
                                       data-validation="length number"
                                       data-validation-length="min8">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mobile" class="control-label">Mobile</label>
                                <input type="text" class="form-control input-sm"
                                       id="mobile" placeholder="Mobile"
                                       name="mobile"
                                       data-validation="length number"
                                       data-validation-length="min8">
                            </div>
                        </div>
                    </div><!-- fine prima riga -->
                    <div class="row">
                        <div class="col-xs-offset-1">
                            <div class="form-group col-md-6">
                                <label for="input1" class="control-label">Indirizzo</label>
                                <input type="text" class="form-control input-sm"
                                       id="input1" placeholder="Indirizzo"
                                       data-validation="length alphanumericaccentospazio"
                                       data-validation-length="min3"
                                       required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="input2" class="control-label">CAP</label>
                                <input type="text" class="form-control input-sm"
                                       id="input2" placeholder="CAP"
                                       data-validation="length"
                                       data-validation-length="min5"
                                       maxlength="5"
                                       required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="input2" class="control-label">Città</label>
                                <input type="text" class="form-control input-sm"
                                       id="input2" placeholder="Città"
                                       data-validation="length alphabeticaccentospazio"
                                       data-validation-length="min3"
                                       required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="input2" class="control-label">Provincia</label>
                                <input type="text" class="form-control input-sm"
                                       id="input2" placeholder="Provincia"
                                       data-validation="length alphabeticaccentospazio"
                                       data-validation-length="min3"
                                       required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="input2" class="control-label">Regione</label>
                                <input type="text" class="form-control input-sm"
                                       id="input2" placeholder="Regione"
                                       data-validation="length alphabeticaccentospazio"
                                       data-validation-length="min3"
                                       required>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Conferma</label>
                                <a href="compagnia_nuova.php"
                                   class="btn btn-danger btn-sm" role="button"
                                >Inserimento</a>
                            </div>
                        </div>
                    </div><!-- fine seconda riga -->
                </form><!-- fine form -->
            </div>
        </div>
    </div>
    <script src="js/validator.js"></script>


<?php include "footer.php" ?>