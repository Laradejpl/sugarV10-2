<?php
require_once __DIR__ . '/config/bootstrap.php';
$curentdate = date('l/d/m/Y/ H\hi' ) .'<br>';

echo $curentdate;
$req = $pdo->query("SELECT * FROM membre WHERE id_membre =2");
$data = $req->fetch(PDO::FETCH_OBJ);
$req->execute();
echo $data->pseudo .'<br>';
$inscriptionDate = $data->date_enregistrement;
echo $inscriptionDate;
echo '<h1>Ont calcule depuis quand le membre est inscrit<h1> <br>';

$timesubscription = $curentdate - $inscriptionDate;

  // echo   date(strtotime($timesubscription)) ;

if ($timesubscription > 24*60*60 ) 
 echo 'la date est correct';
 else  echo 'la date est incorrect';
  



?>