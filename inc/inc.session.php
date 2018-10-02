<?php

	/*
	 * In questo file sono contenute le funzioni utili
	 * alla gestione delle sessioni
	 */

// Questa funzione fa partire la sessione
	function sessionStart()
	{
		// session_start() è una funzione nativa di PHP
		ob_start();
		session_start();
		$_SESSION['sessione'] = true;
	}

// Questa funzione controlla che la sessione esista
	function session_is_started()
	{
		if ($_SESSION['sessione'] = true) {
			return true;
		} else {
			return false;
		}
	}

// Questa funzione aggiunge informazioni alla sessione
	function sessionAddInformation($informationKey, $informationValue)
	{
		$_SESSION[$informationKey] = $informationValue;
	}

// Questa funzione serve per ottenere informazioni dalla sessione
	function sessionGetInformation($informationKey)
	{
		return $_SESSION[$informationKey];
	}

// Questa funzione distrugge la sessione e tutte le variabili collegate;
// è usata quando un utente effettua il logout
	function sessionDestroy()
	{
		// session_unset e session_destroy() sono funzioni native di PHP
		session_unset();
		session_destroy();
	}
