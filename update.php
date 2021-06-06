<?php

require_once("config/bootstrap.php");


$req = $pdo->prepare('UPDATE loading SET lu=1');
$req->execute();
$req->closeCursor();