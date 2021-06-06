<?php
require_once __DIR__ . '/config/bootstrap.php';
$connecter = getMembre()['id_membre'];
var_dump(getMembre()['pseudo']);

$req = $pdo->prepare("SELECT SUM(score.points) as total ,membre.id_membre,membre.pseudo FROM score,membre  WHERE score.membre_id = membre.id_membre AND id_membre = :id_membre ");
$req->bindParam(':id_membre', getMembre()['id_membre'], PDO::PARAM_INT);

$req->execute();
$data =$req->fetch(PDO::FETCH_OBJ);

 echo $data->total;
 echo $data->pseudo;
 var_dump($data->total);




?>