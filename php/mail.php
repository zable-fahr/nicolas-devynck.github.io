<?php
	$sujet = addslashes($_POST['sujet']);
	$mail = $_POST['mail'];
	$msg = addslashes($_POST['msg']);
	$nom = $_POST['nom'];
	
	function verifNom($fnom) { //Verification du champ nom
		if (!preg_match('/^[a-zA-Z ]*$/', $fnom) || strlen($fnom) < 2 || strlen($fnom) > 25) { return FALSE; }
		else { return TRUE; }
	}
	function verifSujet($fsujet) { //Verification du champ sujet
		if (strlen($fsujet) < 2 || strlen($fsujet) > 50) { return FALSE; }
		else { return TRUE; }
	}
	function verifMsg($fmsg) { //Verification du champ msg
		if (strlen($fmsg) < 5 || strlen($fmsg) > 2000) { return FALSE; }
		else { return TRUE; }
	}
	function verifMail($fmail) {
		if (!preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $fmail) || strlen($fmail) < 7 || strlen($fmail) > 25) { return FALSE; }
		else { return TRUE; }
	}
	
	$boolMsg = verifMsg($msg);
	$boolNom = verifNom($nom);
	$boolSujet = verifSujet($sujet);
	$boolMail = verifMail($mail);
	
	//tab erreur pour identifer le problemme
	$erreur = array(
  		array('msg', $msg, $boolMsg),
		array("nom", $nom, $boolNom),
		array("sujet", $sujet, $boolSujet),
		array("mail", $mail, $boolMail),
	);
	
	if ($boolMsg && $boolNom && $boolSujet && $boolMail) { 
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
			<b>Mail :</b>'.$mail.'<br />
		</body>
		</html>
		';
		
		// Envoi
		mail($to, $sujet, $message, $headers);
	 
		// si le formulaire sans ajax msg de validation
		if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			echo "Votre requête a bien été traitée!<br /> \n\r";
			echo "<a href=".$_SERVER['HTTP_REFERER']." ><-- Retour</a>";
		}
		// si le formulaire avec ajax envois d'information a traiter 
		else {
			echo json_encode($erreur);
		}
	}
	else {
		// si le formulaire sans ajax msg d'erreur
		if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			echo "<h1>Erreur</h1> \n\r";
			for ($i=0; $i<sizeof($erreur); $i++) {
				for ($j=0; $j<sizeof($erreur[$i]); $j++) {
					if (!$erreur[$i][$j]) {
						echo "le champs <b>".$erreur[$i][0]."</b> est incorrecte :<br />\n\n<b>".$erreur[$i][1]."</b><br /><br />\n\n";						
					}
				}
			}
			echo "<br /><a href=".$_SERVER['HTTP_REFERER']." ><-- Retour</a>";
		}
		// si le formulaire avec ajax envois d'information a traiter
		else {
			echo json_encode($erreur);
		}
	}
?>