<?php
require_once __DIR__ . '/config/bootstrap.php';

$req = $pdo->query('SELECT * FROM adresse  WHERE ville_id = 1');
$req->execute();
$datas = $req->fetch(PDO::FETCH_OBJ);

echo $data->ville;

/*if (getMembre()['cp']) {
    # code...
}*/




?>