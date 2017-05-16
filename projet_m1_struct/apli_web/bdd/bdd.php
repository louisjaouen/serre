<?php
	

	try{
		// Sous MAMP (Mac)
		$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'Louloudu29');
		}
	catch (Exception $e)
	{
	    die('Erreur : ' . $e->getMessage());
	}

	$reponse = $bdd->query('select * from capteur');//lecture
	$donnees = $reponse->fetch();//ligne par ligne
	$donnees = $reponse->fetch();
	echo $donnees['id_capteur'];//sortir les donnees
	$reponse->closeCursor();

	$niveau = 1.0;
	$ph=1.4;
	$lumi=50.2;
	$teau=31.2;
	$tair=15.2;
	$humi=18.2;
	$sali=19.2;



$req = $bdd->prepare('INSERT INTO valeur(id_capteur, value) VALUES(:id_capteur, :value)');
$req->execute(array(
    'id_capteur' => 1,
    'value' => $niveau
    ));
$req->execute(array(
    'id_capteur' => 2,
    'value' =>  $ph
    ));
$req->execute(array(
    'id_capteur' => 3,
    'value' =>  $lumi
    ));
$req->execute(array(
    'id_capteur' => 4,
    'value' =>  $teau
    ));
$req->execute(array(
    'id_capteur' => 5,
    'value' =>  $tair
    ));
$req->execute(array(
    'id_capteur' => 6,
    'value' => $humi
    ));
$req->execute(array(
    'id_capteur' => 7,
    'value' => $sali
    ));
$req->closeCursor();
$a=null;
echo $a;
?>
