<?php
	/**
	 * Created by PhpStorm.
	 * User: famiglia
	 * Date: 24/07/2016
	 * Time: 16:23
	 */ ?>
<?php include "header.php" ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1>Elenco Premi - non ancora attiva</h1>
            <div class="col-md-4 has-feedback">
                <label for="dataincassopremio"
                       class="control-label">Data incasso</label>

                <div class="input-group">
                    <span class="input-group-addon">Al</span>
                    <input type="text"
                           class="form-control input-sm"
                           id="dataincassopremio"
                           name="dataincassopremio"
                           placeholder="Data di incasso"
                    >

                    <script type="text/javascript">
						$(function () {
							$("#dataincassopremio").datepicker({
								dateFormat: "dd-mm-yy",
								changeMonth: true,
								changeYear: true,
								yearRange: '<?=date("Y") - 1?>:<?=date("Y") + 2?>'
							});
						});
                    </script>
                </div>
                <span class="glyphicon form-control-feedback"
                      aria-hidden="true"></span>
                <div class="help-block with-errors"></div>

            </div>

        </div>
    </div>
<?php include "footer.php" ?>