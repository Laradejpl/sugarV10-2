<?php
require_once __DIR__ . '/../../../config/bootstrap.php';
$connecter = getMembre()['id_membre'];
var_dump($connecter);


$req = $pdo->prepare("INSERT INTO score (membre_id,points) VALUE (:membre_id,0) ");
$req->bindParam(':membre_id', getMembre()['id_membre'], PDO::PARAM_INT);
 

 $req->execute();