<?php
require_once __DIR__ . '/../../config/bootstrap.php';
$poster ='';


if (!empty($_GET['id'])) {
    

  $id = $_GET['id'];

}

if(isset($_POST['ajouter'])){

  

  $req6 = $pdo->prepare("INSERT INTO amis (id_membre_1,id_amis_ajouter,date_enregistrement ) VALUES(:id_membre_1, :id_amis_ajouter,NOW())");
  $req6->bindParam(':id_membre_1', getMembre()['id_membre'], PDO::PARAM_INT);
            $req6->bindParam(':id_amis_ajouter', $_GET['id']);
            $req6->execute();
    $req6->closeCursor();

  
    $reqmessage = $pdo->prepare(
      'INSERT INTO message(membre_id1, membre_id2, message, date_enregistrement, lu)
      VALUES (:membre_id1, :membre_id2,"Vous a demandé en amis...", NOW(), :lu)'
  );
  $reqmessage->bindParam(':membre_id1', getMembre()['id_membre'], PDO::PARAM_INT);
  $reqmessage->bindParam(':membre_id2', $_GET['id']);
  $reqmessage->bindValue(':lu',0);
  $reqmessage->execute();
  
  
  }




//traitement afficher les derniers membres


function Annoncesdernierpublier(PDO $pdo) : array
{
    $req = $pdo->query(
        'SELECT *
        FROM membre
        WHERE civilite ="femme"
        LIMIT 0, 5'
    );

    $posts = $req->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
}

function Annoncesdernierpublier1(PDO $pdo) : array
{
    $req1 = $pdo->query(
        'SELECT *
        FROM membre
        WHERE civilite ="homme"
        ORDER BY date_enregistrement DESC LIMIT 6, 9'
    );

    $posts1 = $req1->fetchAll(PDO::FETCH_ASSOC);
    return $posts1;
}


if (!empty($_GET['id'])) {
    

    $id = $_GET['id'];
  
  }





  $req = $pdo->prepare('SELECT COUNT(*) as totalcadeaux FROM cadeau WHERE beneficiaire_id = ?');
 
  $req->execute(array($id));
  $datas = $req->fetch(PDO::FETCH_OBJ);
  

//calcule distance
$requete = $pdo->prepare("SELECT * FROM membre WHERE id_membre = :id_membre ");
$requete->bindParam(':id_membre',getMembre()['id_membre'], PDO::PARAM_INT);
$requete->execute();
$dnes = $requete->fetch(PDO::FETCH_OBJ);
$lat1 = $dnes->lat;
$lng1 = $dnes->lng;
//var_dump($lat1);


  

$req =$pdo->prepare('SELECT * FROM membre  WHERE id_membre=?');
$req->execute(array($id));
$item = $req->fetch();

$lat2 = $item['lat'];
$lng2 = $item['lng'];



$distance = (round(get_distance_m($lat1, $lng1, $lat2, $lng2) / 1000,
3)). ' km' ;
//echo (round(get_distance_m($lat1, $lng1, $lat2, $lng2) / 1000,
//3)). ' km';
   // affiche 391.613 km


//fin calcule distance


if ($item['civilite'] = 'homme') {
    $civilite='Monsieur';
  }else{
  
      $civilite='Femme';
  }
$woman = $civilite='Femme';
$man = $civilite='Monsieur';

$page_title = 'membre'; # Pour la balise <title>





//  afficher tout les champs tout les champs lu 


if(isset($_POST['repondre'])){

    if(empty($_POST['message'])||strlen($_POST['message'])>255){
echo 'vide message';
      }else{
          $req = $pdo->prepare(
              'INSERT INTO message(membre_id1, membre_id2, message, date_enregistrement, lu)
              VALUES (:membre_id1, :membre_id2, :message, NOW(), :lu)'
          );
          $req->bindParam(':membre_id1', getMembre()['id_membre'], PDO::PARAM_INT);
          $req->bindParam(':membre_id2', $_GET['id']);
          $req->bindParam(':message', $_POST['message']);
         
          $req->bindValue(':lu',0);
          $req->execute();
      }
            





    
  }
  
  
  
   

elseif(isset($_POST)) {
    extract($_POST);
   $req = $pdo->prepare("INSERT INTO cadeau (src,nom_cadeau,donateur_id,beneficiaire_id) VALUES ('https://www.smartphonefrance.info/news/SPF9787878746549849865.png','boite1',:donateur_id,:beneficiaire_id)");
   $req->execute(array(
    ':donateur_id'=>getMembre()['id_membre'],

     ':beneficiaire_id'=>$_GET['id']
));
    $req->closeCursor();
}









?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../package/css/swiper.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
   <script src="js/appLeaflet.js"></script>
   <script src="data/data.js"></script>

<link rel="icon" type="image/png" href="config/favicon.png" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
       

            <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/css/mdb.min.css" rel="stylesheet">

<script src="js/mdb.min.js"></script>


            
        <script
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
            <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
            integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
            crossorigin="anonymous">
            <link rel="stylesheet" href="CSS/style.css" rel="stylesheet>
            <link rel="stylesheet" href="CSS/medias.css">

            
        
        <link
            href="https://fonts.googleapis.com/css?family=Righteous&display=swap"
            rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Akronim|Modak|Montserrat|Sigmar+One&display=swap" rel="stylesheet">

            <link href="https://fonts.googleapis.com/css?family=Anton|Orbitron&display=swap" rel="stylesheet">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
            <script src="js/javascript.js"></script>
            <script src="js/jquery-1.5.2.js"></script>
            <link rel="stylesheet" href="main.css" type="text/css" />
        <script type="text/javascript" src="Winwheel.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    
       
        <link rel="stylesheet" href="/../CSS/style.css">
       
        <title>accueil</title>
        <script src="libs/leaflet.js"></script>
   <script src="js/app.js"></script>
   <script src="data/data.js"></script>

<script>

function addFavoris(){

$.ajax({

    url:'favoris.php',
    success:function(data)
    {


    }
    

});




}

$(document).ready(function(){


$('#coeur').click(function(){



  addFavoris();
    
    
})




})
</script>






       
<style>
   html, body {
      position: relative;
      height: 100%;
    }
    body {
      background: #000;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }
    .swiper-container {
      width: 100%;
      height: 500px;
      margin-left: auto;
      margin-right: auto;
    }
    .swiper-slide {
      background-size: cover;
      background-position: center;
    }
    .gallery-top {
      height: 140%;
      width: 100%;
    }
    .gallery-thumbs {
      height: 60%;
      box-sizing: border-box;
      padding: 10px 0;
    }
    .gallery-thumbs .swiper-slide {
      width: 25%;
      height: 100%;
      opacity: 0.4;
    }
    .gallery-thumbs .swiper-slide-thumb-active {
      opacity: 1;
    }
    #nxt, #prv
    {

        display:none;
    }


body
{

    background-color:black;
}

@media all and (max-width: 480px)
{

 
  .picswiper
  {

 width:100%; 
  }
  .gallery-top 
  {
    height: 80%;
      width: 100%;


  }
  .swiper-container {
      width: 100%;
      height: 300px;
      margin-left: auto;
      margin-right: auto;
    }
    .gallery-thumbs {
      height: 30%;
      box-sizing: border-box;
      padding: 10px 0;
    }
  
    span#nameprofil
  {
    font-size:10px;
  }

}


  .loupe 
  {
    position: relative;
    margin-top:-40px;
  }

  .barsearch
  {

    padding:0.5em;
    text-indent:2em
  }
  #mapid {
   border: 5px solid white;
   /* IMPORTANT */
   height: 40vh;
   width: 55vw;
   margin:auto;
}
#mssg{display:block};

</style>

    </head>
<body >




  

  



        <h1 class="usbtitle seconMenu  " style="color: rgb(255, 0, 191);background-color:black;"><b style="color:green;">Reg</b><b style="color:yellow;">gae</b><b style="color:red;">R</b></h1>
        
        
        

        <nav
            class="navbar navbar-expand-lg navbar-dark  "
            style=" background: linear-gradient(0deg,#000,#262626);">
            
            <a  class="navbar-brand con mb-4" href="index.php" style="color: red;"><b style="color:green;">Reggae</b> <b style="color:red;">R</b><b style="color:yellow;" >encontre</b> </a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto  meu1">
                    
                   
              
                        
                        <?php if (getMembre() === null) : ?>
                        <li class="nav-item">
                            <a class="nav-link con" href="index.php">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link con" href="register.php">Inscription</a>
                        </li>

                        <?php else: ?>
                      

                 
                        <li class="nav-item">
                            <a   class="nav-link" style="color:white;font-size:20px;" href="#"><strong><?= getMembre()['pseudo'] ?></strong></a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="login.php?logout">Déconnexion</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            <?php if(getMembre()['connexion'] == 1):?>
                                <img    style="border-radius:50px; width:15%; " src="assets/img/<?= getMembre()['photo'] ?>"alt="..">
                              <span ><img src="knob1.png" alt=".."></span>
                              <?php elseif (getMembre()['connexion'] == 0) :?>

                              <?php endif;?>

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item"   data-toggle="modal" data-target="#exampleModalLong3"   href="#"  ><button class="btn" >Me trouver</button></a>
                            <a class="dropdown-item"  data-toggle="modal" data-target="#exampleModalLong"  href="#">vos messages</a>

                        </li>
                       
                      
                        <?php if (role(ROLE_ADMIN)) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="backOffice.php">Back-Office</a>
                        </li>
                        <?php endif;?>
                        <?php endif;?>
                         
                        <li class="nav-item">
                            <a class="nav-link" href="poseAnnonce.php"></a>
                        </li>
                       


                    </ul>
                    <?php if (getMembre() != null) : ?>
              <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
                      <input
                      class="form-control  barsearch"
                      type="search"
                      placeholder=""
                      aria-label="Search" 
                      name="search" >
                      <button class="btn btn-outline-primary " type="submit">search</button>                     
              </form>
                       <?php endif ;?>
                </div>
            </nav>

    <div class="container-fluid bg-dark ">
      <div class="row align-center">
        <div class="col-12">
          <h1>Nos membres sont des stars.</h1>

        </div>
      </div>
    </div>
    <span id="mssg" style="font-size:3em;color:white;text-shadow: 3px 3px #ff0000;" ></span>
    





<!-- Swiper -->
<div class="swiper-container gallery-top mt-4">
    <div class="swiper-wrapper">
    
      <div class="swiper-slide picswipe"   style="background-image:url(/../../../../assets/img/<?= $item['photo'] ?>);height:50%;">
      <div class="swiper-slide picswipe"   style="background-image:url(/../../../../assets/img/<?= $item['photo1'] ?>);height:50%;">
      <div class="swiper-slide picswipe"   style="background-image:url(/../../../../assets/img/<?= $item['photo2'] ?>);height:50%;">
      <div class="swiper-slide picswipe"   style="background-image:url(/../../../../assets/img/<?= $item['photo3'] ?>);height:50%;">


      <i class="fa fa-heart btn" id="coeur"  aria-hidden="true" style="color:green;font-size:4em;" onclick="closeprofil()">
      </i>    
      
      <i class="fa fa-times btn " aria-hidden="true"   style="color:red;font-size:4em;float:right" onclick="minusProfil()" ></i>
      
      <h4 id="nameprofil" style="font-family: 'Sigmar One', cursive;color:white;text-shadow: 3px 3px #ff0000;"><?= $item['pseudo'] ?></h4><span style="font-family: 'Sigmar One', cursive;color:white;text-shadow: 3px 3px black;font-size:20px;"><?= $item['town']." ".$item['cp'] ?></span>
      <div><?= $post['id_membre']?></div>
     
     <br><span style="font-size:1.5em;color:white;background:red;padding:3px;border-radius:10px;border:3px solid white;"><?php 
       //calcule distance entre les membres.
$requete = $pdo->prepare("SELECT * FROM membre WHERE id_membre = :id_membre ");
$requete->bindParam(':id_membre',getMembre()['id_membre'], PDO::PARAM_INT);
$requete->execute();
$dnes = $requete->fetch(PDO::FETCH_OBJ);
$lat1 = $dnes->lat;
$lng1 = $dnes->lng;


$lat2 = $post['lat'];

$lng2 = $post['lng'];


  $distance = (round(get_distance_m($lat1, $lng1, $lat2, $lng2) / 1000,
  1)). ' km' ;
  echo '  à '.$distance; 

  
  
  //fin calcule distance
       
       
       ?></span>
    </div>
      
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-white" id="nxt"></div>
    <div class="swiper-button-prev swiper-button-white" id="prv"></div>
  </div>
  <div class="swiper-container gallery-thumbs">
    <div class="swiper-wrapper">
    
    <div class="swiper-slide" id="picswipeLittle" style="background-image:url(/../../../../assets/img/<?= $item['photo'] ?>)"></div>

      <div class="swiper-slide" id="picswipeLittle" style="background-image:url(/../../../../assets/img/<?= $item['photo1'] ?>)"></div>
      <div class="swiper-slide" id="picswipeLittle" style="background-image:url(/../../../../assets/img/<?= $item['photo2'] ?>)"></div>
      <div class="swiper-slide" id="picswipeLittle" style="background-image:url(/../../../../assets/img/<?= $item['photo3'] ?>)"></div>


    </div>
  </div>

  <!-- Swiper JS -->
  <script src="../package/js/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>






        function closeprofil(){
 console.log("ca marche");
 

 document.getElementById('mssg').textContent="J'aime.";
 
 setTimeout(function(){ document.getElementById('mssg').style.display="none"; }, 3000);
 document.getElementById('mssg').style.display="block";

}

function minusProfil(){
  console.log("utilisateur enlever");
  document.getElementById('mssg').textContent="J'aime pas";
  setTimeout(function(){ document.getElementById('mssg').style.display="none"; }, 3000);
  document.getElementById('mssg').style.display="block";  
  
}









    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs
      }
    });

  </script>
</body>
</html>