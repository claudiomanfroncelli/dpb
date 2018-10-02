<?php include "header.php" ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1>Elenco Privati</h1>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="ente">Ente</label>
                    <select class="form-control" id="ente" placeholder="Ragione Sociale Ente">
                        <option>...</option>
                        <option>INPS</option>
                        <option>INPDAP</option>
                        <option>Ministero Agricoltura e Foreste</option>
                        <option>NNNNNN</option>
                        <option>RRR</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="compagnia">Compagnia</label>
                    <select class="form-control" id="compagnia" placeholder="Ragione Sociale Compagnia">
                        <option>...</option>
                        <option>Cattolica</option>
                        <option>FFFF</option>
                        <option>KKKK</option>
                        <option>Unipol</option>
                        <option>Vittoria</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="numeropolizza">Numero Polizza</label>
                    <select class="form-control" id="numeropolizza" placeholder="Numero Polizza">
                        <option>...</option>
                        <option>123/456</option>
                        <option>333/859</option>
                        <option>545/78/89</option>
                        <option>699.78/25</option>
                        <option>989.23.78</option>
                    </select>
                </div>
                <div class="form-group col-md-8">
                </div>
                <div class="form-group col-md-2">
                    <!-- un pulsante per inserire una nuova compagnia -->
                    <label>Inserisci</label>
                    <a href="ente_nuovo.php" class="btn btn-danger btn-sm" role="button" style="float:right">Nuovo
                        Privato</a>
                </div>

            </div>
        </div>
    </div> <!-- end first container -->

    <div class="container">
        <!-- Righe di dettaglio -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Ente</th>
                    <th>Email</th>
                    <th>PEC</th>
                    <th>Telefono</th>
                    <th>Mobile</th>
                    <th>P.Iva</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Ministero dei Lavori Pubblici</td>
                    <td>info@minlav.it</td>
                    <td>pec@minlav.it</td>
                    <td>06.58897854</td>
                    <td>333.212587</td>
                    <td>12345678901</td>
                    <td><a href="singolo_ente.php" class="btn btn-info btn-sm" role="button" style="float:right">Vedi
                            Privato</a></td>
                </tr>
                <tr>
                    <td>Ministero della Pubblica Istruzione</td>
                    <td>info@minpubist.it</td>
                    <td>pec@minpubist.it</td>
                    <td>06.58897854</td>
                    <td>333.212587</td>
                    <td>12345678901</td>
                    <td><a href="singolo_ente.php" class="btn btn-info btn-sm" role="button" style="float:right">Vedi
                            Privato</a></td>
                </tr>
                </tbody>
            </table>
        </div>

    </div><!-- end second container -->


<?php include "footer.php" ?>