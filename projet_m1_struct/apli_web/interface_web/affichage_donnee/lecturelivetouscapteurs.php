<?php
 header('Content-Type: text/html; charset: UTF-8');

	// 1 : on ouvre le fichier
$monfichier = fopen('../../simulateur_java/e.txt', 'r+');
 
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
echo $str;




?>
