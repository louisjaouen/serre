<?php
	header('Content-Type: text/html; charset: UTF-8');
	//$bassin=$_GET['bassin'];
	$capteur=$_GET['capteur'];
	$nombre_de_valeur=$_GET['nombre_de_valeur'];



	try{
        // Sous MAMP (Mac)
        $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'Louloudu29');
        }
	catch (Exception $e)
	{
	    die('Erreur : ' . $e->getMessage());
	}

	
	$rep = $bdd->prepare('SELECT * FROM valeur WHERE id_capteur = ?   DESC LIMIT 0,?');
	$rep->execute(array($capteur, $nombre_de_valeur));

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
