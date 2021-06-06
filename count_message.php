<?php

require_once("config/bootstrap.php");

$req = $pdo->prepare('SELECT COUNT(*) as total FROM loading WHERE lu=0 ORDER BY id_message DESC ');
$req->execute();
$data =$req->fetch(PDO::FETCH_OBJ);
echo $data->total;
