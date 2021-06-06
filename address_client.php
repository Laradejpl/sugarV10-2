<?php
require_once __DIR__ . '/config/bootstrap.php';

$req = $pdo->prepare("INSERT INTO adress_client_kotlin (email_client,rue,ville,cp,telephone,valided_status)VALUES (:email_client,:rue,:ville,:cp,:telephone,1)");
             $req->bindParam(':email_client',$_GET['email_client']);
             $req->bindParam(':rue',$_GET['rue']);
             $req->bindParam(':ville',$_GET['ville']);
             $req->bindParam(':cp',$_GET['cp']);
             $req->bindParam(':telephone',$_GET['telephone']);
             //$req->binParam(':valided_status',1);
             $req->execute();


echo 'enregister';





?>