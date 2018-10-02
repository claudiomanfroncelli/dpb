<?php
	/**
	 * Created by PhpStorm.
	 * User: famiglia
	 * Date: 12/07/2018
	 * Time: 16:11
	 */
?>
<script>
	$('#sandbox-container input').datepicker({
		format: "dd/mm/yyyy",
		weekStart: 1,
		maxViewMode: 2,
		todayBtn: "linked",
		clearBtn: true,
		language: "it",
		daysOfWeekHighlighted: "0,6",
		calendarWeeks: true,
		todayHighlight: true
	});
</script>
<div id="sandbox-container">
    <input type="text" class="form-control">
</div>
