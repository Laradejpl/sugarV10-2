<?php
require_once __DIR__ . '/config/bootstrap.php';
if (!empty($_GET['id'])) {
    

    $id = $_GET['id'];
  
  }
$membreki_aime = getMembre()['id_membre'];
$req = $pdo->prepare("INSERT INTO likeornot  (membre_aimer,membre_ki_aime) VALUE ('.$id.','.$membreki_aime.')");
$req->execute();
?>