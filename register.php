<?php
require_once __DIR__ . '/config/bootstrap.php';
// la connection

//les fonctions--------------------------------------------------------------------------------





// traitement de l'annonce

$mssgAlert = '';
$mssUccess ='';
$mssgcp ='';
$mssgcontenu ='';
$mssgprix ='';

// Traitement
if(isset($_POST['register'])) {
    // Pseudo déjà existant
    if(strlen($_POST['pseudo']) < 1 || strlen($_POST['pseudo']) > 25) {
       
        $mssgAlert = 'Le pseudo doit etre compris entre 2 et 26 charactéres🙁';
        // Caractères non-autorisés

        //cp
    }if(!preg_match('~^[A-Z-a-z-0-9]{2}+$~', $_POST['cp'])) {

        $mssgcp ='<span class="alert-danger" style="font-weight:bolder;";>code postal incorrect!</span>';
        
    }if(!preg_match('~^[0-9-,-]+$~', $_POST['valeur']))//le prix
    {
        $mssgprix ='<span class="alert-danger" style="font-weight:bolder;";>contenu incorrect!</span>';
    
    }elseif (empty($_POST['description_membre'])) {//description_membre
        
        $mssgcontenu ='<span class="alert-danger" style="font-weight:bolder;";>contenu incorrect!</span>';
        // Vérification sur l'envoi du fichier
    }  elseif(!preg_match('~^[a-zA-Z0-9_-]+$~', $_POST['pseudo'])) {//pseudo
        $mssgAlert = 'Caractères non autorisés🙁';
        // Email déjà existant
    } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $mssgAlert = 'Email déjà existant🙁';
        

        // Mot de passe: min. 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre, 1 caractère spécial
    } elseif(!preg_match('~([A-Z-a-z-0-9]){5,}$~', $_POST['mdp'])) {
        $mssgAlert = 'mot de passe pas corecte que des chiffres et des lettres en minuscules et majuscules🙁';
        
        // Confirmation du mot de passe
    } elseif(strlen($_POST['nom']) < 1 || strlen($_POST['nom']) > 25) {
        

    
    
    
    } elseif ($_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
        //ajouterFlash('warning', 'Problème lors de l\'envoi du fichier. Code ' . $_FILES['image']['error']);
        $mssgAlert = 'Problème lors de l\'envoi du fichier🙁';
        // Vérification du type de l'image
        // la clé "type" de $_FILES n'est pas fiable, contrairement à exif_imagetype()
        // Un fichier doit faire minimum 12 octets pour être lu par exif_imagetype()
    }elseif ($_FILES['photo']['size'] < 12 || exif_imagetype($_FILES['photo']['tmp_name']) === false) {
        //ajouterFlash('danger', 'Le fichier envoyé n\'est pas une image');
        $mssgAlert = 'Le fichier envoyé n\'est pas une image🙁';
        // OK: enregistrement de l'image
    }else{
        // Récupération de l'extension du fichier d'origine
        $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        // Chemin jusqu'au dossier des images
        $path = __DIR__ . '/assets/img';

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
            $mssgAlert = 'L\'image n\'a pas pu être enregistrée.🙁';
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
            $path1 = __DIR__ . '/assets/img';
    
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
                $path2 = __DIR__ . '/assets/img';
        
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
            $path3 = __DIR__ . '/assets/img';
    
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




    else {
        // Enregistrement en base de données
        $req = $pdo->prepare(
            'INSERT INTO membre (photo,photo1,photo2,photo3 ,pseudo, mdp, nom, prenom, telephone, email,adresse,town,region,cp,description_membre, civilite,type_membre,Silhouette,taille,yeux,age, statut,enfant,valeur,etat,date_enregistrement,lat,lng)
            VALUES (:photo, :photo1, :photo2, :photo3, :pseudo, :mdp, :nom, :prenom, :telephone, :email, :adresse,:town, :region, :cp, :description_membre, :civilite, :type_membre, :Silhouette,:taille, :yeux,:age, :statut,:enfant, :valeur,:etat, NOW(),:lat,:lng)'
        );
         /**
        $req->execute([
            'pseudo' => $_POST['pseudo'],
            'mdp' => password_hash($_POST['mdp'], PASSWORD_DEFAULT),
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'telephone' =>$_POST['telephone'],
            'email' => $_POST['email'],
            'civilite' =>$_POST['civilite'],
            'statut' => $_POST['statut'],
            'photo' => array($_FILES['photo']),
            
            //'token' => bin2hex(random_bytes(16)),
            ]);
            
/**
       
         * ATTENTION:
         * En pratique, à ce moment, il faut envoyer un email à l'utilisateur
         * contenant un lien de confirmation.
         * Exemple: https://monsite.fr/confirmation.php?email=toto@gmail.com&token=abc123
         */
        $hash = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        $req->bindValue(':photo', $filename . '.' . $extension);
        $req->bindValue(':photo1', $filename1 . '.' . $extension1);
        $req->bindValue(':photo2', $filename2 . '.' . $extension2);
        $req->bindValue(':photo3', $filename3 . '.' . $extension3);
        $req->bindParam(':pseudo', $_POST['pseudo']);
        $req->bindParam(':nom', $_POST['nom']);
        $req->bindParam(':mdp', $hash );
        $req->bindParam(':prenom', $_POST['prenom']);
        $req->bindParam(':cp', $_POST['cp']);
        $req->bindParam(':region', $_POST['region']);
        $req->bindParam(':adresse', $_POST['adresse']);
        $req->bindParam(':town', $_POST['town']);
        $req->bindParam(':description_membre', $_POST['description_membre']);
        $req->bindParam(':telephone', $_POST['telephone']);
        $req->bindParam(':email', $_POST['email']);
        $req->bindParam(':civilite', $_POST['civilite']);
        $req->bindParam(':statut', $_POST['statut']);
        $req->bindParam(':type_membre', $_POST['type_membre']);
        $req->bindParam(':yeux', $_POST['yeux']);
        $req->bindParam(':age', $_POST['age']);
        $req->bindParam(':Silhouette', $_POST['Silhouette']);
        $req->bindParam(':valeur', $_POST['valeur']);
        $req->bindParam(':etat', $_POST['etat']);
        $req->bindParam(':taille', $_POST['taille']);
        $req->bindParam(':enfant', $_POST['enfant']);
        $req->bindParam(':lat', $_POST['lat']);
        $req->bindParam(':lng', $_POST['lng']);

       // $req->bindParam(':ville', $_POST['ville']);


       // $req->bindParam(':membre_id',getMembre()['id_membre'], PDO::PARAM_INT);
        //$req->bindParam(':photo_id', $photos);
       // $req->bindParam(':categorie_id', $_POST['categorie'], PDO::PARAM_INT);
        // $req->bindValue(':date', (new DateTime())->format('Y-m-d H:i:s'));
        $req->execute();
        echo 'votre message a ete bien delivré.';
        $header="MIME-Version: 1.0\r\n";
        $header.='From:"saintecroixtattoo.com"<pablolarade@gmail.com>'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';
        $destinataire = $_POST['email'];
        $message='
        <html>
            <body style="background:black;color:lime;">
                <div align="center">
                    <img  style="width:100%;"src="https://www.saintecroixtattoo.com/mailing/banniere.png"/>
                    <br />
                    Bienvenue sur RR le site ou reggae et rencontre se conjugue a deux...
                    Vous etes bien inscrit sur le site Reggae Rencontre.
                    
                    Veuillez vous connectez sur le site en suivant ce lien 
                    <a href="saintecroixtattoo.com">Reggae rencontre </a>
                    <br />
                    <img src="https://www.saintecroixtattoo.com/mailing/facebook.png"/>
                    
        
                </div>
            </body>
        </html>
        ';
        
        mail($destinataire ,"CONFIRMATION INSCRIPTION !", $message, $header);


     
        unset($_POST);
         
       



        $mssUccess = 'vous etes inscrit';
    }
}
}
}
}
}



include __DIR__ . '/config/headerRegister.php';

?>
<body>
<style>
    body{

        background:black;
    }
    #photo,#photo1,#photo2,#photo3,#photo4{
        display: none;
    }

    .image-flip:hover .backside, .image-flip.hover .backside {
-webkit-transform: rotateY(0deg);
-moz-transform: rotateY(0deg);
-o-transform: rotateY(0deg);
-ms-transform: rotateY(0deg);
transform: rotateY(0deg);
}
.image-flip:hover .frontside, .image-flip.hover .frontside {
-webkit-transform: rotateY(180deg);
-moz-transform: rotateY(180deg);
-o-transform: rotateY(180deg);
transform: rotateY(180deg);
}
.image-flip {
margin-bottom:200px;
width: 300px;
height: 250px;
}
.mainflip {
-webkit-transition: 1.5s;
-webkit-transform-style: preserve-3d;
-ms-transition: 1.5s;
-moz-transition: 1.5s;
-moz-transform: perspective(1000px);
-moz-transform-style: preserve-3d;
-ms-transform-style: preserve-3d;
transition: 1.5s;
transform-style: preserve-3d;
position: relative;
}
.frontside, .backside {
-webkit-backface-visibility: hidden;
-moz-backface-visibility: hidden;
-ms-backface-visibility: hidden;
backface-visibility: hidden;
-webkit-transition: 1.5s;
-webkit-transform-style: preserve-3d;
-moz-transition: 1.5s;
-moz-transform-style: preserve-3d;
-o-transition: 1.5s;
-o-transform-style: preserve-3d;
-ms-transition: 1.5s;
-ms-transform-style: preserve-3d;
transition: 1.5s;
transform-style: preserve-3d;
position: absolute;
top: 0;
left: 0;
}
.frontside {
-webkit-transform: rotateY(0deg);
-ms-transform: rotateY(0deg);
z-index: 2;
}
.backside {
background: white;
-webkit-transform: rotateY(-180deg);
-moz-transform: rotateY(-180deg);
-o-transform: rotateY(-180deg);
-ms-transform: rotateY(-180deg);
transform: rotateY(-180deg);
}
.card, .card-img-top {
border-radius: 0;
}

.cardFlipping
{

    position: relative;
    margin: 10px auto 0;
    width: 400px;
    height: 250px;
    background: linear-gradient(0deg,rgb(43, 42, 42),#000000);
    color: rgb(0, 0, 0);
    text-align: center;

}


.cardFlipping:before,
.cardFlipping:after
{
    content: '';
    position: absolute;
    top: -2px;
    left:  -2px;
    background: linear-gradient(49deg,#0000ff,#00ff00,#ff0000,#fb0094,#0000ff,#00ff00,#ff0000);
    background-size: 400%;
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    z-index: -1;
    animation: animate 20s linear infinite;

}

.cardFlipping:after{
    filter: blur(10px);


}
    
    </style>
  
    


<br>
<div id="infoposition" style="color:black;"></div><!---pour tester la geo https://www.alsacreations.com/tuto/lire/926-geolocalisation-geolocation-html5.html-->



<h1 style="color:black;">inscrivez vous sur Sugar Sugar</h1>
<br>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 bg-secondary rounded p-4">
            <h2> NOS ABONNEMENTS</h2>
            
        </div>
    </div>
    <br>
    <div class="row d-flex justify-content-center">
    <!-------card-------->

<div class="image-flip mr-4 " ontouchstart="this.classList.toggle('hover');">
<div class="mainflip">
<div class="frontside">
<div class="card cardFlipping"" style="width:20rem;height:20rem;"  >
<img class="card-img-top img- fluid" src="assets/img/forfait1.jpg" alt="card image" style="height:200px;" >
<div class="card-body">
<h4 class="card-title" style="color:lime;">Le forfait letsGo</h4>
<p class="card-text" style="color:white;">Tester nos services 1mois .</p>
</div>
</div>
</div>
<div class="backside">
<div class="card " style="width:20rem;height:20rem;" >
<div class="card-header bg-danger"style="color:white;">
This is a Header
</div>
<div class="card-body ">
<h4 class="card-title"style="color:white;">Le forfait Chillout</h4>
<p class="card-text">This is a card component with header and footer.</p>
<a href="#" class="btn btn-info btn-md">Info Button</a>
</div>
<div class="card-footer"style="color:white;">
This is a Footer
</div>
</div>
</div>
</div>
</div>
<!------- fincard-------->

  <!-------card-------->

  <div class="image-flip ml-4 mr-4 round" ontouchstart="this.classList.toggle('hover');">
<div class="mainflip">
<div class="frontside">
<div class="card cardFlipping" style="width:20rem;height:20rem;"  >
<img class="card-img-top img- fluid" src="assets/img/forfait2.jpg" alt="card image" style="height:200px;"  >
<div class="card-body">
<h4 class="card-title" style="color:yellow;">Le forfait brown SUGAR</h4>
<p class="card-text" style="color:white;">Il donne acces a plus de chat plus de jeux,plus de fun pendant 6mois.</p>
</div>
</div>
</div>
<div class="backside">
<div class="card " style="width:20rem;height:20rem;" >
<div class="card-header bg-danger"style="color:white;">
This is a Header
</div>
<div class="card-body ">
<h4 class="card-title"style="color:yellow;">Le forfait brown SUGAR</h4>
<p class="card-text">chilll</p>
<a href="#" class="btn btn-info btn-md">Info Button</a>
</div>
<div class="card-footer"style="color:white;">
This is a Footer
</div>
</div>
</div>
</div>
</div>
<!------- fincard-------->

  <!-------card-------->

  <div class="image-flip ml-4 round" ontouchstart="this.classList.toggle('hover');">
<div class="mainflip">
<div class="frontside">
<div class="card cardFlipping"" style="width:20rem;height:20rem;"  >
<img class="card-img-top img- fluid" src="assets/img/forfait3.jpg" alt="card image" style="height:200px;" >
<div class="card-body">
<h4 class="card-title" style="color:red;">Le forfait Easy </h4>
<p class="card-text" style="color:white;">Easy vous permet d'avoir accés pendant <b>12</b> Mois a un prix moindre.</p>
</div>
</div>
</div>
<div class="backside">
<div class="card cardFlipping"" style="width:20rem;height:20rem;" >
<div class="card-header bg-danger"style="color:white;">
This is a Header
</div>
<div class="card-body ">
<h4 class="card-title"style="color:white;">Card Title</h4>
<p class="card-text">This is a card component with header and footer.</p>
<a href="#" class="btn btn-info btn-md">Info Button</a>
</div>
<div class="card-footer"style="color:white;">
This is a Footer
</div>
</div>
</div>
</div>
</div>
<!------- fincard-------->






    
    
    </div>



<form action="register.php" method="post" ENCTYPE="multipart/form-data">
        <!-----CONTENAIRE PRINCIPAL------->
<div class="container-fluid">
    <div class="row">

      <!-----CONTENAIRE partie1------>
        <div class="col-12 col-sm-6 border rounded" style=" background: linear-gradient(0deg,#000,#242424);">
<div class="container">
    <div class="row no-gutters">
        <div class="col-12 " style=" background: linear-gradient(0deg,#000,#262626); color: rgb(255, 0, 170);"> montrez de quoi vous avez l'air
    </div>
    <div class="row no-gutters">
        <!-----PHOTO1------->
<div class="image-upload  col-6 col-sm-3">
<label for="photo">
<img src="photoApp.jpeg" style="width:100%;" />
</label>

<input id="photo" type="file" name="photo"/>
</div>
        <!-----PHOTO2------->

<div class="image-upload col-6 col-sm-3">
<label for="photo1">
<img src="photoApp.jpeg" style="width:100%;"name="image" />
</label>

<input id="photo1" type="file" name="photo1" />
</div>
           <!-----PHOTO3------->

<div class="image-upload col-6 col-sm-3">
<label for="photo2">
<img src="photoApp.jpeg" style="width:100%;" name="image" />
</label>

<input id="photo2" type="file"name="photo2" />
</div>
         <!-----PHOTO4------->
<div class="image-upload col-6 col-sm-3">
<label for="photo3">
<img src="photoApp.jpeg" style="width:100%;" name="image" />
</label>

<input id="photo3" type="file"name="photo3" />
</div>
    </div>
    </div>
</div>

<!----FINPHOTOS----->


    <!-----CIVILITE--------->

    <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
    <label for="civilite">civilite</label>
    <select class="form-control" id="civilite" name="civilite">
      <option value="homme">Homme</option>
      <option value="femme" >Femme</option>
      
    </select>
  </div>

<!----PSEUDO----->


<div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
            <label for="pseudo" >pseudo</label>
                <input type="text" name="pseudo" class="form-control" value="">
            </div>
            <!----MOT DE PASSE----->

            <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
            <label for="mdp">mot de passe</label>
                <input type="password" name="mdp" class="form-control">
            </div>
            <!-----NOM---->

            <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
            <label for="nom">nom</label>
                <input type="text" name="nom" class="form-control" value="">
            </div>
            <!---- PRENOM----->

            <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
                <label for="prenom">prenom</label>
                <input type="text" name="prenom" class="form-control" value="">
            </div>

            <!----telephone------>
            <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
            <label for="telephone">Entrer votre telephone:</label>

<input type="tel" id="telephone" name="telephone" value="">

<small>Format: 01-40-32-10-10</small>
            
            </div>

        <!--------AGE------------>

        <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
    <label for="age">AGE</label>
    <select class="form-control" id="age" name="age">
      <option value="18-25">18-25</option>
      <option value="25-35" >25-35</option>
      <option value="35-45">35-45</option>
      <option value="45-60" >45-60</option>
      
      
    </select>
  </div>





            <!--------etat------------>

  <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
    <label for="etat">Ètat Marital</label>
    <select class="form-control" id="type" name="etat">
      <option value="celibataire">Celibataire</option>
      <option value="marie" >Marié</option>
      <option value="concubinage">Concubinage</option>
      <option value="libertinage" >Libertinage</option>
      
      
    </select>
  </div>

          <!--------Taille----------->

          <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
    <label for="taille">Taille</label>
    <select class="form-control" id="type" name="taille">
      <option value="petite">Petite</option>
      <option value="moyenne" >Moyenne</option>
      <option value="grande">Grande</option>
      
      
      
    </select>
  </div>





        <!--------enfants----------->

        <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
    <label for="enfant">Enfants</label>
    <select class="form-control" id="type" name="enfant">
      <option value="non">Non</option>
      <option value="oui">Oui</option>
      
      
      
      
    </select>
  </div>

<!--forfait---->




        
        
        
        
        
        </div>
        <!-----FINCONTENAIRE partie1------>

        <!-----CONTENAIRE partie2----->

        <div class="col-12 col-sm-6 border rounded" style=" background: linear-gradient(0deg,#000,#242424); text-align:center;">

        <!------EMAIL----->

        <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="">
            </div>

        

  <!--------type------------>

  <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
    <label for="type_membre">TYPE</label>
    <select class="form-control" id="type" name="type_membre">
      <option value="europeen">europeen</option>
      <option value="asiatique" >asiatique</option>
      <option value="africain">africain</option>
      <option value="magrebin" >magrebin</option>
      <option value="antillais" >antillais</option>
      <option value="indien'">indien</option>
      <option value="autre">autre</option>
      
    </select>
  </div>
    <!-------silhouette-------->


    <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
    <label for="Silhouette">Silhouette</label>
    <select class="form-control" id="abo" name="Silhouette">
      <option value="sportive">Sportive</option>
      <option value="ronde" >Ronde</option>
      <option value="autre">autre</option>
      
      
      
      
    </select>
  </div>

  <!----------yeux------------->


  <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
    <label for="yeux">YEUX</label>
    <select class="form-control" id="type" name="yeux">
      <option value="bleu">bleu</option>
      <option value="noir" >noir</option>
      <option value="gris">gris</option>
      <option value="marron" >marron</option>
      
      
    </select>
  </div>

<!----------REGION------------->

<div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
    <label for="region">Région</label>
    <select class="form-control" id="region" name="region">
    <option  value="paris"  >paris</option>
      <option  value="centrevaldeloire">Région-centre-val-de-loire</option>
      <option  value="grandest"  >Région-grand-est</option>
      <option  value="hautdefrance"  >Région-haut-de-france</option>
      <option  value="normandie">Région-normandie</option>
      <option value="bretagne">Région-bretagne</option>
      <option value="paysdelaloire">Région-pays-de-la-loire</option>
      <option value="bourgogne">Région-bourgogne-franche-comté</option>
      <option value="nouvelleaquitaine">region-nouvelle-aquitaine</option>
      <option value="auvergne">Région-auvergne-rhone-alpe</option>
      <option value="occitanie">Région-occitannie</option>
      <option value="alpescotedazur">Région-provence-alpes-cote-d'azur</option>
      <option value="martinique">Région-martinique</option>
      <option value="guadeloupe">Région-guadeloupe</option>
      <option value="reunion">Région-reunion</option>
      <option value="guyanne">Région-guyanne</option>
    </select>
  </div>
  <!--

  <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
            <label for="ville">ville</label>
                <input type="text" name="ville" class="form-control" value="">
            </div>
 --->

                       <!----------adresse------>

                       <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
    <label for="adresse">Adresse</label>
    <textarea class="form-control" id="adress"  name="adresse" rows="2" placeholder="votre adresse"></textarea>
  </div>
  <!---VILLE--->

  <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
    <label for="town">VILLE</label>
    <input type="text" name="town" id="ville">


  </div>
                               <!---VILLE--->



                      <!-----------CP---------------->


                      <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
  <label for="cp">DEPARTEMENT ne rentrer que deux chiffres ou trois pour les doms</label>
        <input type="text" name="cp" id="cp" class="form-control" placeholder="code postal figurant dans l'annonce" > <br>
        
        </div>
        <span class="col-6 offset-md-2 text-center alert "><?= $mssgcp ?></span>

        




                                      <!--DESCRIPTION-MEMBRE-->
                                      <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
    <label for="description_membre"> description membre</label>
    <textarea  name ="description_membre" class="form-control" id="contenu"  class="descourte"rows="3"></textarea>
  </div> 
  <span class="col-6 offset-md-2 text-center alert "><?= $mssgcontenu ?></span>


  <!----------STATUT------------>


  <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
    <label for="statut">Abonnement</label>
    <select class="form-control" id="abo" name="statut">
      <option value="0">FREE</option>
      <option value="2" >PREMIUM</option>
      
      
      
      
    </select>
  </div>






                                         <!------PRIX------->
                                         <div class="form-group">
  <label for="valeur" class="">Combien doit il dépenser pour vous</label><span class="col-6 offset-md-2 text-center alert "><?= $mssgprix ?></span>
     <input type="text" name="valeur"class="form-control">
  </div>



        
        
        
        
        
        </div>
         <!-----FINCONTENAIRE partie2----->

          <!-----coordonnées----->


         <input type="hidden" name="lat" id="lat" value="" /> 
         <input type="hidden" name="lng" id="lng"value="" />

          <!-----FINcoordonnées------>


    </div>
</div>

        <!----- FIN CONTENAIRE PRINCIPAL------->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                
                <input type="submit" name="register" value="S'inscrire" class=" col-12  mt-2 btn btn-primary" >
                
                
                </div>
            </div>
        </div>

        </form>

        <div class="col-6">

<div class="container">
    <div class="row">
        <div class="col-12 "><span style="color:black; background-color:#f27693;font-size:2em; font-weight:bolder;border-radius:10px; -webkit-box-shadow: 7px 9px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 7px 9px 5px 0px rgba(0,0,0,0.75);
box-shadow: 7px 9px 5px 0px rgba(0,0,0,0.75);"><?= $mssgAlert  ?></span></div>
    </div>

    <div class="row">
        <div class="col-12 "><span style="color:black; background-color:lime;font-size:2em; font-weight:bolder;border-radius:10px; -webkit-box-shadow: 7px 9px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 7px 9px 5px 0px rgba(0,0,0,0.75);
box-shadow: 7px 9px 5px 0px rgba(0,0,0,0.75);"><?= $mssUccess   ?></span></div>
    </div>
</div>

            </div>
        </div>
   
</div>

<script>

function maPosition(position) {// test geo avec method navigator.geolocation
  var infopos = "Position déterminée :\n";
  infopos += "Latitude : "+position.coords.latitude +"\n";
  infopos += "Longitude: "+position.coords.longitude+"\n";
  infopos += "Altitude : "+position.coords.altitude +"\n";
  document.getElementById("infoposition").innerHTML = infopos;
  let bol = document.getElementById('lng').value = position.coords.longitude;
  document.getElementById('lat').value = position.coords.latitude;
document.getElementById('lng').value = position.coords.longitude;
  console.log(infopos);
  
  
}

if(navigator.geolocation)
  navigator.geolocation.getCurrentPosition(maPosition);
//les callbacks en cas d'erreurs .
// Fonction de callback en cas d’erreur
function erreurPosition(error) {
    var info = "Erreur lors de la géolocalisation : ";
    switch(error.code) {
    case error.TIMEOUT:
    	info += "Timeout !";
    break;
    case error.PERMISSION_DENIED:
	info += "Vous n’avez pas donné la permission";
    break;
    case error.POSITION_UNAVAILABLE:
    	info += "La position n’a pu être déterminée";
    break;
    case error.UNKNOWN_ERROR:
    	info += "Erreur inconnue";
    break;
    }
document.getElementById("infoposition").innerHTML = info;


}






</script>










    
</body>
</html>