<?php
    // r�cup�ration de l'heure courante
    $date_courante = date("Y-m-d H:i:s");

    // r�cup�ration de l'adresse IP du client (on cherche d'abord � savoir si il est derri�re un proxy)
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    elseif(isset($_SERVER['HTTP_CLIENT_IP'])) {
      $ip  = $_SERVER['HTTP_CLIENT_IP'];
    }
    else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    // r�cup�ration du domaine du client
    $host = gethostbyaddr($ip);

    // r�cup�ration du navigateur et de l'OS du client
    $navigateur = $_SERVER['HTTP_USER_AGENT'];

    // r�cup�ration du REFERER
    if (isset($_SERVER['HTTP_REFERER'])) {
    	if (eregi($_SERVER['HTTP_HOST'], $_SERVER['HTTP_REFERER'])) {
    	$referer ='';
    	}
    	else {
    	$referer = $_SERVER['HTTP_REFERER'];
    	}
    }
    else {
      $referer ='';
    }

    // r�cup�ration du nom de la page courante ainsi que ses arguments
    if ($_SERVER['QUERY_STRING'] == "") {
      $page_courante = $_SERVER['PHP_SELF'];
    }
    else {
      $page_courante = $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
    }

    // connexion � la base de donn�es
    $base = mysql_connect('serveur', 'login', 'pass');
    mysql_select_db('base', $base);

    // insertion des �l�ments dans la base de donn�es
    $sql = 'INSERT INTO statistiques VALUES("", "'.$date_courante.'", "'.$page_courante.'", "'.$ip.'", "'.$host.'", "'.$navigateur.'", "'.$referer.'")';
    mysql_query($sql) or die('Erreur : '.$sql.'<br />'.mysql_error());

	//suprime dans la base de donn�es tout ce qu'il y plus de 5ans
	$supp5ans = date('Y')-5;
	$sql = 'DELETE FROM `statistiques` WHERE `date` = SUBSTR(date, 1, 4) = '.$supp5ans.'';
	mysql_query($sql) or die('Erreur : '.$sql.'<br />'.mysql_error());
	
    // fermeture de la connexion � la base de donn�es
    mysql_close();
?>