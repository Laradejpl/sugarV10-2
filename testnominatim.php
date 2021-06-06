<?php
require_once __DIR__ . '/config/bootstrap.php';

$requete = $pdo->prepare("SELECT * FROM membre WHERE id_membre = :id_membre ");
$requete->bindParam(':id_membre',getMembre()['id_membre'], PDO::PARAM_INT);
$requete->execute();
$dnes = $requete->fetch(PDO::FETCH_OBJ);


$req1 = $pdo->prepare("SELECT id_membre,lat,lng,pseudo,photo FROM membre WHERE cp = '$dnes->cp' ");
$req1->execute();
$donnees = $req1->fetchAll();
header("content-type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");//accepte toute les meme requete avec l'etoile.
//ne pas mettre de var_dump ou sinon erreur l'ors de la reception par leaflet.
print json_encode($donnees);//permet d'encoder en json ont specifie avec le header que la page va recevoir du json pas du html classic. 


?>
