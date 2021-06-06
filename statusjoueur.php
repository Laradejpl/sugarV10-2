<?php

require_once("config/bootstrap.php");


$req = $pdo->prepare('UPDATE membre SET status_joueur = 2 WHERE id_membre =:id_membre');
$req->bindParam(':id_membre', getMembre()['id_membre'], PDO::PARAM_INT);
$req->execute();
$req->closeCursor();