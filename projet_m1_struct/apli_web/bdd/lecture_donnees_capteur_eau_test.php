<?php
 header('Content-Type: text/html; charset: UTF-8');
try{
        // Sous MAMP (Mac)
        $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'Louloudu29');
        }
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$rep = $bdd->query('SELECT * FROM valeur ORDER BY id_valeur DESC LIMIT 0,1 ');


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



?>
