<?php
	/**
	 * Created by PhpStorm.
	 * User: famiglia
	 * Date: 28/08/2018
	 * Time: 15:52
	 */ ?>

<SCRIPT type="text/javascript">
	function aggiornaHidden(sel) {
		var f = document.frm;
		f.sel_value.value = sel.options[sel.selectedIndex].value;
		f.sel_text.value = sel.options[sel.selectedIndex].text;
	}
</SCRIPT>

<FORM name="frm">

    <SELECT name="sel1" onchange="aggiornaHidden(this)">
        <OPTION value="" selected> Scegli</OPTION>
        <OPTION value="A">Opzione 1</OPTION>
        <OPTION value="B">Opzione 2</OPTION>
        <OPTION value="C">Opzione 3</OPTION>
    </SELECT>

    <INPUT type="text" name="sel_value">
    <INPUT type="text" name="sel_text">

</FORM>