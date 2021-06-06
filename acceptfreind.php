<?php
require_once __DIR__ . '/config/bootstrap.php';

if (!empty($_GET['membre_id1'])) {
    

    $id = $_GET['membre_id1'];
  
  }

$req = $pdo->prepare("UPDATE message SET lu=1,accept=1  WHERE membre_id1 = :membre_id1 AND membre_id2 = :membre_id2");
$req->bindParam(':membre_id1', $id);
$req->bindParam(':membre_id2', getMembre()['id_membre']);

$req->execute();
$req->closeCursor();


$rtt = $pdo->prepare("UPDATE amis SET friend = 1 WHERE id_membre_1 = $id OR  id_amis_ajouter = $id ");
$rtt->execute();
header('Location: accueil.php');


?>