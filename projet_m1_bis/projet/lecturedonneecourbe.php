<?php
try{
		// Sous MAMP (Mac)
	$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
$req = $bdd->query('SELECT value FROM valeur WHERE id_capteur = 1   ORDER BY id_valeur DESC LIMIT 0, 50');

$str="";
$str .= '[';
while($donnees= $req->fetch()){
    
    $str .= '"{"valeur": "';
    $str .= $donnees['value'];
    $str .= '"},';
    
}
$str.=']';
$str[strlen($str)-2]=']';
$str[strlen($str)-1]=null;


$req->closeCursor();
$bdd=null;

echo $str;

?>