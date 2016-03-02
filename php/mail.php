<?php
	if (isset($_POST['sujet']) && isset($_POST['mail']) && isset($_POST['msg']) && isset($_POST['nom'])) {
		// Destinataire
		$to = 'contact@nicolas-devynck.fr';
		// Sujet
		$subject = $_POST['sujet'];
		// message
		$message = '
		<html>
		<head>
			<title>'.$subject.'</title>
		</head>
		<body>
			<p>
				'.$_POST['nom'].' vous a envoyer un message depuis votre CV<br /><br />
				<b>Message :</b><br />
				'.wordwrap($_POST['msg'], 70, "\r\n").'
				<hr />
				<b>Site Web :</b>'.$_POST['site'].'<br />
				<b>Mail :</b>'.$_POST['mail'].'<br />
			</p>
		</body>
		</html>
		';
		// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
		$headers  = 'MIME-Version: 1.0'."\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
		// En-têtes additionnels
		$headers .= 'To: '.$to.''."\r\n";
		$headers .= 'From: '.$_POST['mail'].''."\r\n";

		// Envoi
		mail($to, $subject, $message, $headers);
	}
	if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}
?>