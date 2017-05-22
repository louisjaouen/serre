<?php
	header('Content-Type: text/html; charset: UTF-8');


	 header('Content-Type: text/html; charset: UTF-8');
	try{
	        // Sous MAMP (Mac)
	        $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'Louloudu29');
	        }
	catch (Exception $e)
	{
	    die('Erreur : ' . $e->getMessage());
	}

	$rep = $bdd->query('SELECT * FROM valeur ORDER BY date_valeur  DESC LIMIT 0,6 ');


	$str="";
	$str .= '[';
	$str .= '{"valeur": "';

	while($donnees= $rep->fetch()){
	    $str .= $donnees['value'];
	    $str .= '"},';
	    $str .= '{"valeur": "';
	}
	$str .= 666;
	$str .= '"}';
	$str.=']';
	echo $str;


	$rep->closeCursor();
	$bdd=null;





		// 1 : on ouvre le fichier
	/*$monfichier = fopen('../../../simulateur_java/e.txt', 'r+');
	 
	// 2 : on lit la première ligne du fichier
	$niveau="";
	$niveau += fgets($monfichier);
	$ph ="";
	$ph += fgets($monfichier);
	$lumi ="";
	$lumi += fgets($monfichier);
	$teau ="";
	$teau += fgets($monfichier);
	$tair ="";
	$tair += fgets($monfichier);
	$humi ="";
	$humi += fgets($monfichier);
	$sali ="";
	$sali += fgets($monfichier);

	// 3 : quand on a fini de l'utiliser, on ferme le fichier
	$str = '[{"nom_capteur": "niveau d\'eau", "valeur": "'.$niveau.'"}, {"nom_capteur": "pH", "valeur": "'.$ph.'"}, {"nom_capteur": "luminosite", "valeur": "'.$lumi.'"},{"nom_capteur": "tempeau", "valeur": "'.$teau.'"},{"nom_capteur": "tempair", "valeur": "'.$tair.'"},{"nom_capteur": "humidite", "valeur": "'.$humi.'"},{"nom_capteur": "salinite", "valeur": "'.$sali.'"}]';
	fclose($monfichier);
	echo $str;*/




?>
