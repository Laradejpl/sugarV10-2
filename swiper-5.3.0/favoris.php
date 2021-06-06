<?php
require_once __DIR__ . '/../../config/bootstrap.php';

function Annoncesdernierpublier(PDO $pdo) : array
{
    $req = $pdo->query(
        'SELECT *
        FROM membre
        ORDER BY date_enregistrement DESC LIMIT 0, 12'
    );

    $posts = $req->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
}


var_dump($post['id_membre']);

$req6 = $pdo->prepare("INSERT INTO favoris (ajouteur,ajouter,date_ajout ) VALUES(:ajouteur, :ajouter,NOW())");
$req6->bindParam(':ajouteur', getMembre()['id_membre'], PDO::PARAM_INT);
          $req6->bindParam(':ajouter', $post['id_membre'], PDO::PARAM_INT);
          $req6->execute();
  $req6->closeCursor();




?>