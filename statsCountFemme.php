<?php
require_once("config/bootstrap.php");   
   $req = $pdo->query('SELECT COUNT(*) as total FROM membre WHERE civilite="femme"');
$req->execute();
$data =$req->fetch(PDO::FETCH_OBJ);
echo $data->total;


   

   ?>