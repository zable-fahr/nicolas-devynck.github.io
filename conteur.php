<?php
	if (file_exists('conteur_visite.txt')) {// si le ficher existe
		$compteur_f = fopen('conteur_visite.txt', 'r+');
		// on l'ouvre en lecture seule
		$compte = fgets($compteur_f);
		// on r�cup�re le chiffre du ficher dans la variable compte
	} else {// s'il n'existe pas
		$compteur_f = fopen('conteur_visite.txt', 'a+');
		// on le cr�er
		$compte = 0;
		// on cr�er la variable compte
	}
	$compte++;
	// on ajoute 1 � la variable compte
	fseek($compteur_f, 0);
	// on supprime le contenu du ficher
	fputs($compteur_f, $compte);
	//pour le remplacer par le contenu de la variable compte
	fclose($compteur_f);
	// on ferme le ficher
?>