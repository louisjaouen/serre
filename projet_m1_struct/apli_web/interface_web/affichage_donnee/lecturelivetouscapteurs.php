<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['login'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: http://serregoarem.ddnsking.com/serre/projet_m1_struct/apli_web/interface_web/securite/connexion.php');
  exit();
} 
if(empty($_SESSION['bassin']) || empty($_SESSION['capteur']) || empty($_SESSION['nombre_de_valeur'])) 
{
  $_SESSION['bassin']=1;
  $_SESSION['capteur']=1;
  $_SESSION['nombre_de_valeur']=100;
}

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

	$rep = $bdd->query('SELECT * FROM valeur WHERE id_capteur=1 ORDER BY date_valeur  DESC LIMIT 0,1 ');


	$str="";
	$str .= '[';
	$str .= '{"valeur": "';


	$donnees= $rep->fetch();
    $str .= $donnees['value'];
    $str .= '"},';
    $str .= '{"valeur": "';

    $rep = $bdd->query('SELECT * FROM valeur WHERE id_capteur=2 ORDER BY date_valeur  DESC LIMIT 0,1 ');
    $donnees= $rep->fetch();
    $str .= $donnees['value'];
    $str .= '"},';
    $str .= '{"valeur": "';

    $rep = $bdd->query('SELECT * FROM valeur WHERE id_capteur=3 ORDER BY date_valeur  DESC LIMIT 0,1 ');
    $donnees= $rep->fetch();
    $str .= $donnees['value'];
    $str .= '"},';
    $str .= '{"valeur": "';

    $rep = $bdd->query('SELECT * FROM valeur WHERE id_capteur=4 ORDER BY date_valeur  DESC LIMIT 0,1 ');
    $donnees= $rep->fetch();
    $str .= $donnees['value'];
    $str .= '"},';
    $str .= '{"valeur": "';

    $rep = $bdd->query('SELECT * FROM valeur WHERE id_capteur=5 ORDER BY date_valeur  DESC LIMIT 0,1 ');
    $donnees= $rep->fetch();
    $str .= $donnees['value'];
    $str .= '"},';
    $str .= '{"valeur": "';

    $rep = $bdd->query('SELECT * FROM valeur WHERE id_capteur=6 ORDER BY date_valeur  DESC LIMIT 0,1 ');
    $donnees= $rep->fetch();
    $str .= $donnees['value'];
    $str .= '"},';
    $str .= '{"valeur": "';

    $rep = $bdd->query('SELECT * FROM valeur WHERE id_capteur=7 ORDER BY date_valeur  DESC LIMIT 0,1 ');
    $donnees= $rep->fetch();
    $str .= $donnees['value'];
    $str .= '"}';
    $str .= ']';

	
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
