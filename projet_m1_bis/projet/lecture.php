<?php
 header('Content-Type: text/html; charset: UTF-8');

	// 1 : on ouvre le fichier
$monfichier = fopen('../java/e.txt', 'r+');
 
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
echo $str;
fclose($monfichier);
//bon moment d'ajout a la bdd ???
try{
		// Sous MAMP (Mac)
		$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'root');
		}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
$req = $bdd->prepare('INSERT INTO valeur(id_capteur, value) VALUES(:id_capteur, :value)');
$req->execute(array(
    'id_capteur' => 1,
    'value' => $niveau*1.0
    ));
$req->execute(array(
    'id_capteur' => 2,
    'value' =>  $ph*1.0
    ));
$req->execute(array(
    'id_capteur' => 3,
    'value' =>  $lumi*1.0
    ));
$req->execute(array(
    'id_capteur' => 4,
    'value' =>  $teau*1.0
    ));
$req->execute(array(
    'id_capteur' => 5,
    'value' =>  $tair*1.0
    ));
$req->execute(array(
    'id_capteur' => 6,
    'value' => $humi*1.0
    ));
$req->execute(array(
    'id_capteur' => 7,
    'value' => $sali*1.0
    ));
$req->closeCursor();
$bdd=null;



?>