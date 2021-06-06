<?php
require_once __DIR__ . '/config/bootstrap.php';
if (!empty($_GET['id'])) {
    

    $id = $_GET['id'];
  
  }




$req3 = $pdo->prepare("INSERT INTO amis (id_membre_1,id_amis_ajouter,date_enregistrement) VALUES (:id_membre_1,$id,NOW()) ");
$req3->bindParam(':id_membre_1',getMembre()['id_membre'], PDO::PARAM_INT);

$req3->execute();




?>