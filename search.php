<?php
require_once __DIR__ . '/config/bootstrap.php';

$search =$_GET['keyword'];

$req = $pdo->query("SELECT * FROM confiserie_kotlin_app WHERE name LIKE'%$search%' OR description LIKE'%$search%' OR brand LIKE'%$search%' ORDER BY id ");

$req->execute();

