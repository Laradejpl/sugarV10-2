<?php
require_once __DIR__ . '/config/bootstrap.php';
// la connection
/*session_start();
try
{
	$pdo = new PDO('mysql:host=localhost;dbname=testswap;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}*/

//les fonctions--------------------------------------------------------------------------------


// traitement de l'annonce
$_SESSION['membre'];
$poster ='';
$mssg ='';
$mssgcp ='';
$notification ='';
$mssgcontenu ='';
$mssgprix ='';
$mssgcon = 'deconnecter';
$mssgPseudo = $_SESSION['membre']['pseudo'];


if(isset($_POST['ajouter']) ? $_POST['ajouter'] : NULL)
{

    if(empty($_POST['titre']) || strlen($_POST['titre']) > 255){//si s'est vide 

        $mssg ='<span class="alert-danger"style="font-weight:bolder;">ajouter un titre!</span>'; 
       
    }if(!preg_match('~^[A-Z-a-z-0-9]{5}+$~', $_POST['cp'])) {

        $mssgcp ='<span class="alert-danger" style="font-weight:bolder;";>code postal incorrect!</span>';
        
    } if(!preg_match('~^[0-9-,-]+$~', $_POST['prix']))//le prix
    {
        $mssgprix ='<span class="alert-danger" style="font-weight:bolder;";>contenu incorrect!</span>';
    
    }  elseif (empty($_POST['contenu'])) {
        
        $mssgcontenu ='<span class="alert-danger" style="font-weight:bolder;";>contenu incorrect!</span>';
        // Vérification sur l'envoi du fichier
    }elseif (empty($_POST['contenulong'])) {
        
        $mssgcontenu ='<span class="alert-danger" style="font-weight:bolder;";>contenu incorrect!</span>';
        // Vérification sur l'envoi du fichier
    }   
    
        elseif ($_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
            //ajouterFlash('warning', 'Problème lors de l\'envoi du fichier. Code ' . $_FILES['image']['error']);
    
            // Vérification du type de l'image
            // la clé "type" de $_FILES n'est pas fiable, contrairement à exif_imagetype()
            // Un fichier doit faire minimum 12 octets pour être lu par exif_imagetype()
        }elseif ($_FILES['photo']['size'] < 12 || exif_imagetype($_FILES['photo']['tmp_name']) === false) {
            //ajouterFlash('danger', 'Le fichier envoyé n\'est pas une image');
    
            // OK: enregistrement de l'image
        }else{
            // Récupération de l'extension du fichier d'origine
            $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            // Chemin jusqu'au dossier des images
            $path = __DIR__ . '/';
    
            // Générer un nom de fichier aléatoire qui n'est pas déjà pris par une autre image
            do {
                // random_bytes() génère une chaîne d'octets
                // bin2hex convertit les octets (illisibles) en chaîne hexadécimale
                $filename = bin2hex(random_bytes(16));
    
                // Chemin complet = dossier_des_images/nom_fichier.extension
                $complete_path = $path . '/' . $filename . '.' . $extension;
    
                // Tant que le nom généré n'est pas disponible, on continue la boucle
            } while (file_exists($complete_path));
    
            // Enregistrement du fichier
            if (!move_uploaded_file($_FILES['photo']['tmp_name'], $complete_path)) {
                //ajouterFlash('danger', 'L\'image n\'a pas pu être enregistrée.');
    
            }

            //photo1

            elseif ($_FILES['photo1']['error'] !== UPLOAD_ERR_OK) {
              //ajouterFlash('warning', 'Problème lors de l\'envoi du fichier. Code ' . $_FILES['image']['error']);
      
              // Vérification du type de l'image
              // la clé "type" de $_FILES n'est pas fiable, contrairement à exif_imagetype()
              // Un fichier doit faire minimum 12 octets pour être lu par exif_imagetype()
          }elseif ($_FILES['photo1']['size'] < 12 || exif_imagetype($_FILES['photo1']['tmp_name']) === false) {
              //ajouterFlash('danger', 'Le fichier envoyé n\'est pas une image');
      
              // OK: enregistrement de l'image
          }else{
              // Récupération de l'extension du fichier d'origine
              $extension1 = pathinfo($_FILES['photo1']['name'], PATHINFO_EXTENSION);
              // Chemin jusqu'au dossier des images
              $path1 = __DIR__ . '/';
      
              // Générer un nom de fichier aléatoire qui n'est pas déjà pris par une autre image
              do {
                  // random_bytes() génère une chaîne d'octets
                  // bin2hex convertit les octets (illisibles) en chaîne hexadécimale
                  $filename1 = bin2hex(random_bytes(16));
      
                  // Chemin complet = dossier_des_images/nom_fichier.extension
                  $complete_path1 = $path1 . '/' . $filename1 . '.' . $extension1;
      
                  // Tant que le nom généré n'est pas disponible, on continue la boucle
              } while (file_exists($complete_path1));
      
              // Enregistrement du fichier
              if (!move_uploaded_file($_FILES['photo1']['tmp_name'], $complete_path1)) {
                  //ajouterFlash('danger', 'L\'image n\'a pas pu être enregistrée.');
      
              }

              //photo2

              elseif ($_FILES['photo2']['error'] !== UPLOAD_ERR_OK) {
                //ajouterFlash('warning', 'Problème lors de l\'envoi du fichier. Code ' . $_FILES['image']['error']);
        
                // Vérification du type de l'image
                // la clé "type" de $_FILES n'est pas fiable, contrairement à exif_imagetype()
                // Un fichier doit faire minimum 12 octets pour être lu par exif_imagetype()
            }elseif ($_FILES['photo2']['size'] < 12 || exif_imagetype($_FILES['photo2']['tmp_name']) === false) {
                //ajouterFlash('danger', 'Le fichier envoyé n\'est pas une image');
        
                // OK: enregistrement de l'image
            }else{
                // Récupération de l'extension du fichier d'origine
                $extension2 = pathinfo($_FILES['photo2']['name'], PATHINFO_EXTENSION);
                // Chemin jusqu'au dossier des images
                $path2 = __DIR__ . '/';
        
                // Générer un nom de fichier aléatoire qui n'est pas déjà pris par une autre image
                do {
                    // random_bytes() génère une chaîne d'octets
                    // bin2hex convertit les octets (illisibles) en chaîne hexadécimale
                    $filename2 = bin2hex(random_bytes(16));
        
                    // Chemin complet = dossier_des_images/nom_fichier.extension
                    $complete_path2 = $path2 . '/' . $filename2 . '.' . $extension2;
        
                    // Tant que le nom généré n'est pas disponible, on continue la boucle
                } while (file_exists($complete_path2));
        
                // Enregistrement du fichier
                if (!move_uploaded_file($_FILES['photo2']['tmp_name'], $complete_path2)) {
                    //ajouterFlash('danger', 'L\'image n\'a pas pu être enregistrée.');
        
                }

                //photo3

                elseif ($_FILES['photo3']['error'] !== UPLOAD_ERR_OK) {
                  //ajouterFlash('warning', 'Problème lors de l\'envoi du fichier. Code ' . $_FILES['image']['error']);
          
                  // Vérification du type de l'image
                  // la clé "type" de $_FILES n'est pas fiable, contrairement à exif_imagetype()
                  // Un fichier doit faire minimum 12 octets pour être lu par exif_imagetype()
              }elseif ($_FILES['photo3']['size'] < 12 || exif_imagetype($_FILES['photo3']['tmp_name']) === false) {
                  //ajouterFlash('danger', 'Le fichier envoyé n\'est pas une image');
          
                  // OK: enregistrement de l'image
              }else{
                  // Récupération de l'extension du fichier d'origine
                  $extension3 = pathinfo($_FILES['photo3']['name'], PATHINFO_EXTENSION);
                  // Chemin jusqu'au dossier des images
                  $path3 = __DIR__ . '/';
          
                  // Générer un nom de fichier aléatoire qui n'est pas déjà pris par une autre image
                  do {
                      // random_bytes() génère une chaîne d'octets
                      // bin2hex convertit les octets (illisibles) en chaîne hexadécimale
                      $filename3 = bin2hex(random_bytes(16));
          
                      // Chemin complet = dossier_des_images/nom_fichier.extension
                      $complete_path3 = $path3 . '/' . $filename3 . '.' . $extension3;
          
                      // Tant que le nom généré n'est pas disponible, on continue la boucle
                  } while (file_exists($complete_path3));
          
                  // Enregistrement du fichier
                  if (!move_uploaded_file($_FILES['photo3']['tmp_name'], $complete_path3)) {
                      //ajouterFlash('danger', 'L\'image n\'a pas pu être enregistrée.');
          
                  }

    
    else{
      $notification ='une nouvelle annonce';

         /*$req = $pdo->prepare('INSERT INTO photo (photo,photo1, photo2, photo3) VALUES (:photo, :photo1, :photo2, :photo3)');
         $req->bindValue(':photo', $filename . '.' . $extension);
         $req->bindValue(':photo1', $filename . '.' . $extension);
         $req->bindValue(':photo2', $filename . '.' . $extension);
         $req->bindValue(':photo3', $filename . '.' . $extension);
         $req->execute();
         // REQUETE PHOTO ANNONCE
         $req= $pdo->prepare(
          'INSERT INTO photo (photo1, photo2, photo3)
          VALUES(:photo1, :photo2, :photo3)'
      );
      $req->bindValue(':photo1', $filename1 . '.' . $extension1);
      $req->bindValue(':photo2', $filename2 . '.' . $extension2);
      $req->bindValue(':photo3', $filename3 . '.' . $extension3);

      $req->execute();
      $last_insert_id_photo = $pdo->lastInsertId();
      $req->closeCursor();*/
         
       

        

        $req1 =$pdo->prepare(
            'INSERT INTO annonce(titre, description_courte, description_longue,prix,photo,photo1,photo2,photo3,pays, ville, adresse, cp, membre_id, photo_id, categorie_id, date_enregistrement )
            VALUE (:titre, :description_courte, :description_longue, :prix, :photo,:photo1,:photo2,:photo3, "France", :ville, :adresse, :cp, :membre_id, :photo_id, :categorie_id, NOW())'
        );
        // $req3->bindParam(':pseudo',getMembre()['pseudo'], PDO::PARAM_INT);
        $req1->bindParam(':titre', $_POST['titre']);
        $req1->bindParam(':description_courte', $_POST['contenu']);
        $req1->bindParam(':description_longue', $_POST['contenulong']);
        $req1->bindValue(':photo', $filename . '.' . $extension);
        $req1->bindValue(':photo1', $filename1 . '.' . $extension1);
        $req1->bindValue(':photo2', $filename2 . '.' . $extension2);
        $req1->bindValue(':photo3', $filename3 . '.' . $extension3);
        $req1->bindParam(':prix', $_POST['prix']);
        // $req->bindParam(':pays', $_POST['pays']);
        $req1->bindParam(':ville', $_POST['ville']);
        $req1->bindParam(':adresse', $_POST['adresse']);
        $req1->bindParam(':cp', $_POST['cp']);
        $req1->bindParam(':membre_id',getMembre()['id_membre'], PDO::PARAM_INT);
        $req1->bindParam(':photo_id', $photo);
        $req1->bindParam(':categorie_id', $_POST['categorie'], PDO::PARAM_INT);
        // $req->bindValue(':date', (new DateTime())->format('Y-m-d H:i:s'));
        $req1->execute();


       
unset($_POST);
header('Location: annonces.php');

          }

        }
     }
    }
  }
  }

 

if (isset($_SESSION['membre'])) {
  $poster ='Annonces';
}else{
    $poster ='';
}
$page_title = 'Annonce'; # Pour la balise <title>
include __DIR__ . '/config/header.php';

?>

<body>
    <style>
    #photo,#photo1,#photo2,#photo3,#photo4{
        display: none;
    }
    
    </style>


<h3 style="text-align:center; border:3px solid; " class="badge-dark"><?= 'bonjour'. ' '.  $mssgPseudo ?></h3>

<h1>Déposer votre annonce</h1>
<div class="container-fluid  ">
    <div class="row ">
        <div class="col-12 col-md-6 bg-light border-white">

        <form action="poseAnnonce.php" class="form-group" method="post" ENCTYPE="multipart/form-data">
    <!----------TITRE---------->
        <label for="titre" class=" ">titre</label><span class="col-6 offset-md-2 text-center alert "><?= $mssg ?></span>
     <input type="text" name="titre"class="form-control">



                                    <!--DESCRIPTION COURTE-->
                                    <div class="form-group">
    <label for="Textarea1"> description courte</label><span class="col-6 offset-md-2 text-center alert "><?= $mssgcontenu ?></span>
    <textarea  name ="contenu" class="form-control" id=""  class="descourte"rows="3"><?= $_POST['contenu'] ?? ''; ?></textarea>
  </div>





                                      <!--DESCRIPTION LONG-->
                                      <div class="form-group">
    <label for="contenulong"> description longue</label><span class="col-6 offset-md-2 text-center alert "><?= $mssgcontenu ?></span>
    <textarea  name ="contenulong" class="form-control" id="contenulong"  class="descourte"rows="3"><?= $_POST['contenulong'] ?? ''; ?></textarea>
  </div>   



                                         <!------PRIX------->
  <div class="form-group">
  <label for="prix" class="">prix</label><span class="col-6 offset-md-2 text-center alert "><?= $mssgprix ?></span>
     <input type="text" name="prix"class="form-control">
  </div>



                                 <!--CATEGORIE-->

                                         <div class="form-group">
    <label for="categorie">Categorie</label>
    <select class="form-control" id="categorie" name="categorie">
      <option  value="1">sugar Baby</option>
      <option  value="2">sugar Daddy</option>
     
      
    </select>
  </div>

        
        
        
        
        </div>

        <div class="col-12 col-md-6 bg-light border-white">
    
     <div class="container-fluid badge-primary">
         <div class="container-fluid badge-primary">
             <div class="row">
                 <div class="col-12">
                     ajouter vos photos
                 </div>
             </div>
         </div>
         <div class="row bg-dark ">

                                    <!-----PHOTO1------->
             <div class="image-upload  col-3 ">
         <label for="photo">
           <img src="photoApp.jpeg" style="width:100%;" />
         </label>
       
         <input id="photo" type="file" name="photo"/>
       </div>
                                    <!-----PHOTO2------->
       
       <div class="image-upload col-3 ">
         <label for="photo1">
           <img src="photoApp.jpeg" style="width:100%;"name="image" />
         </label>
       
         <input id="photo1" type="file" name="photo1" />
       </div>
                                       <!-----PHOTO3------->

       <div class="image-upload col-3 ">
         <label for="photo2">
           <img src="photoApp.jpeg" style="width:100%;" name="image" />
         </label>
       
         <input id="photo2" type="file"name="photo2" />
       </div>

                                      <!-----PHOTO4------->
       <div class="image-upload col-3 ">
         <label for="photo3">
           <img src="photoApp.jpeg" style="width:100%;" name="image" />
         </label>
       
         <input id="photo3" type="file"name="photo3" />
       </div>


         </div>
     </div> 
     <div class="form-group">
    <label for="pays">pays</label>
    <select class="form-control" id="pays" name="pays">
      <option  value="france">france</option>
      <option  value="allemagne">allemagne</option>
      <option  value="espagne">espagne</option>
      <option  value="italie">italie</option>
      <option  value="angleterre">angleterre</option>
    </select>
  </div>

  <div class="form-group">
    <label for="ville">ville</label>
    <select class="form-control" id="ville" name="ville">
    <option  value="paris"  >paris</option>
      <option  value="bordeaux"  >bordeaux</option>
      <option  value="dijon"  >dijon</option>
      <option  value="marseilles"  >marseilles</option>
      <option  value="nice"  >nice</option>
    </select>
  </div>

  <div class="form-group">
    <label for="adresse">Adresse</label>
    <textarea class="form-control" id="adress"  name="adresse" rows="3" placeholder="adresse figurant dans l'annonce"></textarea>
  </div>

  <div class="form-group">
  <label for="cp">code postal</label><span class="col-6 offset-md-2 text-center alert "><?= $mssgcp ?></span>
        <input type="text" name="cp" id="cp" class="form-control" placeholder="code postal figurant dans l'annonce"> <br>
        
        </div>


  
        
        
        
        </div>
    </div>

  
</div>
<div class="container-fluid mt-4">
    <div class="row">
        <input type="submit" name="ajouter" value="ENREGISTER" class="col-12 badge-primary border-white">
        </form>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-3 btn btn-info" >  
            
    <a href="" style="color:white;">voir</a>
    </div>
    </div>
</div><br>



                  <!--------------------------------------------->



                 



                  <?php
// inclusion du footer
include __DIR__ . '/config/footer.php';