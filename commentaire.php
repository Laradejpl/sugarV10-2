<?php
require_once __DIR__ . '/config/bootstrap.php';


 var_dump($_GET['id']);
if (isset($_POST['ajouter'])) {
   



    $req = $pdo->prepare('INSERT INTO commentaire (auteur, post, contenu, date_publication) VALUES(:auteur, :post, :contenu, :date)'
);
$req->bindParam(':auteur', getMembre()['id_membre'], PDO::PARAM_INT);
$req->bindParam(':post',$_GET['id'] );
$req->bindParam(':contenu',$_POST['contenu']);
$req->bindValue(':date', (new DateTime())->format('Y-m-d H:i:s'));
$req->execute();

//Pour vider le formulaire
unset($_POST);



}




// Affichage
$page_title = 'Ajouter un post';
include __DIR__ . '/config/header.php'; 
?>

<h1>ajouter un commentaire</h1>

<div class="container border mt-4 p-4"> 
    <form action="post_ajouter.php" method="post">

    <div class="form-group">
                <label>Contenu</label>
                <textarea name="contenu" class="form-control"></textarea>
            </div>
            <input type="submit" name="ajouter" class="form-control btn btn-info">

    
    </form>




</div>



