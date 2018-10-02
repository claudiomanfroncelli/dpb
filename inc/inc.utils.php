<?php
// Questa funzione permette di stampare una lista HTML di $formErrors
	function showFormErrors($formErrors)
	{
		return '<ul><li>'.implode('</li><li>', $formErrors).'</li></ul>';
	}

// Questa funzione permette di stampare una lista HTML del nucleo familiari
	function mostrafamiliari($nucleo_f)
	{
		return '<ul><li>'.implode('</li><li>', $nucleo_f).'</li></ul>';
	}

// Questa funzione permette di stampare una lista HTML del nucleo familiari
	function mostramessaggi($formMsg)
	{
		return '<ul><li>'.implode('</li><li>', $formMsg).'</li></ul>';
	}

// Questa funzione si occupa di controllare se l'indirizzo email è valido
	function emailIsValid($email)
	{
		if (false == preg_match('/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/', $email)) {
			return false;
		} else {
			return true;
		}
	}

// Questa funzione si occupa di controllare se un token è generato correttamente
	function tokenIsValid($token)
	{
		// Un token deve essere composto solamente da numeri e lettere
		// ed avere una lunghezza di 32 caratteri
		if (false == preg_match('/^([a-z0-9]){32}$/', $token)) {
			return false;
		} else {
			return true;
		}
	}

//Per il momento non è utilizzata - manca anche la directory "mailer"
	function send_mail($email, $message, $subject)
	{
		require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Host = "smtps.aruba.it";
		$mail->Port = 465;
		$mail->AddAddress($email);
		$mail->Username = "provamail@dpbroker.it";
		$mail->Password = "cl4ud100";
		$mail->SetFrom('provamail@dpbroker.it', 'DP Broker');
		$mail->AddReplyTo("provamail@dpbroker.it", "DP Broker");
		$mail->Subject = $subject;
		$mail->MsgHTML($message);
		$mail->Send();
	}

//Metodo per indirizza ad altra url
	function redirect($url)
	{
		header("Location: $url");
	}

//Metodo che si applica al risultato delle query
	function qualeTipo($var)
	{
		echo "sono in qualeTipo";
		if (is_array($var)) {
			echo "is_array"."<br>";
			return "is_array";
		}
		if (is_bool($var)) {
			echo "is_bool"."<br>";
			return "is_bool";
		}
		if (is_float($var)) {
			echo "is_float"."<br>";
			return "is_float";
		}
		if (is_int($var)) {
			echo "is_int"."<br>";
			return "is_int";
		}
		if (is_null($var)) {
			echo "is_null"."<br>";
			return "is_null";
		}
		if (is_numeric($var)) {
			echo "is_numeric"."<br>";
			return "is_numeric";
		}
		if (is_object($var)) {
			echo "is_object"."<br>";
			return "is_object";
		}
		if (is_resource($var)) {
			echo "is_resource"."<br>";
			return "is_resource";
		}
		if (is_string($var)) {
			echo "is_string"."<br>";
			return "is_string";
		}
		echo "unknown type"."<br>";
	}

//Metodo che si applica per la formattazione della data
	function format_data($data)
	{
		$dataformattata = "";
		if (isset($data) && ($data <> "") && ($data <> "0000-00-00")) {

			$vet = explode("-", $data);

			//print_r($vet);
			$dataformattata = $vet['2']."-".$vet['1']."-".$vet['0'];

		}
		return $dataformattata;
	}

	function formato_italiano($number)
	{

		if (isset($number) && ($number <> 0)) {
			$numero = number_format($number, 2, ".", "");
		} else {
			$numero = 0;
		}
		return $numero;
	}

	function f_ormato_inglese($number)
	{

		if (isset($number) && ($number <> "0")) {
			$numero = str_replace(".", "", $number);
			$numero = str_replace(",", "", $numero);
			$numero = $numero / 100;
		} else {
			$numero = 0;
		}
		return (string)$numero;
	}

