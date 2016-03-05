<?php
	$sujet = $_POST['sujet'];
	$mail = $_POST['mail'];
	$msg = $_POST['msg'];
	$nom = $_POST['nom'];
	$site = $_POST['site'];
	
	$erreur = array(
  		array('nom', ''.$nom.'', ''),
  		array('sujet', ''.$sujet.'', ''),
  		array('msg', ''.$msg.'', ''),
  		array('mail', ''.$mail.'', ''),
 	);
	
	function verifNom() { //Verification du champ nom
		if (strlen($nom) < 2 || strlen($nom) > 25) { $erreur[0][2]=FALSE; return FALSE; }
		else { $erreur[0][2]=TRUE; return TRUE; }
	}
	function verifSujet() { //Verification du champ sujet
		if (strlen($sujet) < 2 || strlen($sujet) > 50) { $erreur[1][2]=FALSE; return FALSE; }
		else { $erreur[1][2]=true; return TRUE; }
	}
	function verifMsg() { //Verification du champ msg
		if (strlen($msg) < 5 || strlen($msg) > 2000) { $erreur[2][2]=FALSE; return FALSE; }
		else { $erreur[2][2]=TRUE; return TRUE; }
	}
	function verifMail() {
		if (!preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $mail) && strlen($sujet) < 6 || strlen($sujet) > 25) { $erreur[3][2]=FALSE; return FALSE; }
		else { $erreur[3][2]=TRUE; return TRUE; }
	}
	if (verifNom() && verifSujet() && verifMsg() && verifMail()) { 
		// Destinataire
		$to = 'contact@nicolas-devynck.fr';
		// l'en-tête Content-type
		$headers  = 'MIME-Version: 1.0'."\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
		$headers .= 'To: '.$to.''."\r\n"; // 
		$headers .= 'From: '.$mail.''."\r\n";
		// message wordwarp pour diviser le message en ligne de 70 caractaire max 
		$message = '
		<html>
		<head><title>'.$sujet.'</title></head>
		<body>
			'.$nom.' vous a envoyer un message depuis votre CV<br /><br />
			<b>Message :</b><br />
			'.wordwrap($msg, 70, "\r\n").'
			<hr />
			<b>Site Web :</b>'.$site.'<br />
			<b>Mail :</b>'.$mail.'<br />
		</body>
		</html>
		';
		
		// Envoi
		mail($to, $sujet, $message, $headers);
		// si le formulaire$erreur et envois sans ajax alors il y a redirection sur la page precedente
		if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			header("Location: ".$_SERVER['HTTP_REFERER']);
		}
	}
	else {
		 echo json_encode($erreur);
	} 
?>
