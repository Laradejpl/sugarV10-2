<?php
require_once __DIR__ . '/config/bootstrap.php';

$req = $pdo->prepare("SELECT * FROM membre ");
$req->execute();
$membre= $req->fetch(PDO::FETCH_ASSOC);


$req2 = $pdo->prepare('INSERT INTO  testSwipe (amis,id_amis_ajouter)VALUES("oui",:id_amis_ajouter) ');
$req2->bindParam(':id_amis_ajouter',$membre['id_membre'], PDO::PARAM_INT);
$req2->execute();


?>