<?php
require_once __DIR__ . '/config/bootstrap.php';

 
$req8 = $pdo->prepare('DELETE FROM message WHERE membre_id2 = :membre_id2 AND lu = 0  ');
$req8->bindParam(':membre_id2', getMembre()['id_membre'], PDO::PARAM_INT);
$req8->execute();












?>