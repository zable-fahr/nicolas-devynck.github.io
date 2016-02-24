<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Curiculum Vitae Developpeur Web</title>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="Content-Type" content="UTF-8">
		<meta name="Content-Language" content="fr">
		<meta name="description" content="CV Nicolas Devynck, CV developpeur PHP, Narbonne, Creation de sites, developpement web, XHTML CSS">
	    <meta name="keywords" content="cv d&eacute;veloppeur narbonne, developpement web, developpeur web, CV freelance, CV developpeur PHP, Narbonne, freelance, indépendant, creation site internet, developpement">
		<meta name="Copyright" content="Devynck nicolas">
		<meta name="Author" content="Devynck nicolas">
		<meta name="Identifier-Url" content="http://www.nicolas-devynck.fr/">
		<meta name="Revisit-After" content="30 days">
		<meta name="Robots" content="all">
		<meta name="Rating" content="general">
		<meta name="Distribution" content="global">
		<meta name="Geography" content="France">
		<meta name="Category" content="internet">

		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="jQuery.js"></script>
		<script type="text/javascript" src="jQueryRotate.js"></script>

		<?php
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
		?>
	<script type="text/javascript">
		alert('Votre requête a bien été traitée!');
		document.location.href =  "www.nicolas-devynck.fr/#contact";
	</script>
	</head>
<body>
</body>
</html>