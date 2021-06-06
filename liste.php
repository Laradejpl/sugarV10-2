<?php
require_once __DIR__ . '/config/bootstrap.php';


// ont recupere la ville et l'adresse du connecter
$requete = $pdo->prepare("SELECT * FROM membre WHERE id_membre = :id_membre ");
$requete->bindParam(':id_membre',getMembre()['id_membre'], PDO::PARAM_INT);
$requete->execute();
$dnes = $requete->fetch(PDO::FETCH_OBJ);
var_dump($dnes->pseudo,$dnes->town);

$req7 = $pdo->prepare("SELECT * FROM membre WHERE cp = '$dnes->cp' ");
//$req7->bindParam(':town',$dnes->town, PDO::PARAM_INT);
$req7->execute();
while($donnes = $req7->fetch(PDO::FETCH_OBJ))
{
  
  ?>

<h4 class="lesadresses"><?php echo $donnes->adresse , $donnes->town; ?></h4>


<?php

}

//requete sql


$req = $pdo->query("SELECT ville,lat,lng,codePostal FROM france LIMIT 0,5");
$donnees = $req->fetchAll();


//aller chercher les données 


//format json



//renvoyer les données (json).
header("content-type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");//accepte toute les meme requete avec l'etoile.

print json_encode($donnees);//permet d'encoder en json ont specifie avec le header que la page va recevoir du json pas du html classic. 


?>



