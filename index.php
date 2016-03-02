<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Curiculum Vitae Developpeur Web</title>
		<!-- Encodage UTF8 -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="Content-Type" content="UTF-8">
		<!-- Meta pour les robots -->
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
		<!-- Liens JQuery plus son plugin, CSS -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jQuery.js"></script>
		<script type="text/javascript" src="js/jQueryRotate.js"></script>
		<link rel="icon" type="image/png" href="css/logo.png" />
		<?php include 'php/conteur.php'; ?>

	</head>
	<body>
		<!-- Engrenage JQuery -->
		<div id="engr1"></div>
		<div id="engr2"></div>
		<div id="engr3"></div>
		<nav>
			<div class="nav">
				<!-- Logo -->
				<div id="logo"></div>
				<!-- Menu -->
				<span>[<a class="scrollTo" href="#experiance"> Expériences </a>]</span><span>[<a class="scrollTo" href="#formation"> Formations </a>]</span><span>[<a class="scrollTo" href="#info"> Qui-suis-je </a>]</span><span>[<a class="scrollTo" href="#loisir"> loisirs </a>]</span><span>[<a class="scrollTo" href="#contact"> Contact </a>]</span>
				<!-- Engrenage JQuery Bis -->
				<div id="engr4"></div>
				<div id="engr5"></div>
			</div>
		</nav>
		<div id="cadre">
			<!-- Header pour la vertion print (cacher) -->
			<header>
				<h1>Nicolas DEVYNCK</h1>
				www.nicolas-devynck.fr
			</header>
			<aside>
				<div class="aside">
					<h2 id="info">Qui-suis-je</h2>
					<!-- Qui-suis-je dans txt/info.txt --><?php include 'txt/info.txt'; ?>
					<a class="scrollTo ancre" href="#cadre">^Haut de page^</a>
					<h2 id="loisir">loisirs</h2>
					<!-- Loisirs dans txt/loisir.txt --><?php include 'txt/loisir.txt'; ?>
					<a class="scrollTo ancre" href="#cadre">^Haut de page^</a>
				</div>
			</aside>
			<article>
				<div class="article">
					<h2 id="experiance">Expériences</h2>
					<!-- Expériences dans txt/experiance.txt --><?php include 'txt/experiance.txt'; ?>
					<a class="scrollTo ancre"  href="#cadre">^Haut de page^</a>
					
					<h2 id="formation">Formations</h2>
					<!-- Formations dans txt/formation.txt --><?php include 'txt/formation.txt'; ?>
					<a class="scrollTo ancre" href="#cadre">^Haut de page^</a>
					<div class="contact">
						<h2 id="contact">Contactez moi</h2>
						<!-- Formulaire de contacte -->
						<form method="post" action="php/mail.php" id="formulaire" onsubmit="return verifForm(this)">
							<h3>Vos Coordonners :</h3>
							<div class="input_contact">
								<label for="nom">Nom & Prénom :</label>
								<br />
								<input type="text" name="nom" id="nom" required onblur="verifPseudo(this)"/>
								<br />
								<label for="site">Site Web :</label>
								<br />
								<input type="url" name="site" id="site" placeholder="http://example.com/" />
								<br />
								<label for="mail">Mail :</label>
								<br />
								<input type="email" name="mail" id="mail" placeholder="contact@example.com" required onblur="verifMail(this)"/>
								<br />
							</div>
							<h3>Details du message :</h3>
							<div class="input_contact">
								<label for="sujet">Sujet :</label>
								<br />
								<input type="text" name="sujet" id="sujet" required onblur="verifSujet(this)"/>
								<br />
								<label for="msg">Message :</label>
								<br />
								<textarea name="msg" id="msg" required onblur="verifMsg(this)"></textarea>
								<div class="bouton">
									<input type="submit" value="Envoyer" />
								</div>
							</div>
						</form>
					</div>
					<a class="scrollTo ancre" href="#cadre">^Haut de page^</a>
					<div class="clear"></div>
				</div>
			</article>
			<footer>
				<div class="footer">
					<!-- Footer -->
					© Devynck nicolas 2015
					<br />
					Les portes de l'avenir sont ouvertes à ceux qui savent les pousser. <a href="https://fr.wikipedia.org/wiki/Coluche" target="_blank">(coluche)</a>
				</div>
				<div class="clear"></div>
			</footer>
		</div>
		<!-- Script Vérification formulaire, Engrenage, Scroll sur les ancres -->
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>