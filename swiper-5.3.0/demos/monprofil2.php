
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
  <meta charset="utf-8">
  <title>profil</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <!-- Link Swiper's CSS -->
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

  <!-- Demo styles -->
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
      height: 300px;
      margin-left: auto;
      margin-right: auto;
    }
    .swiper-slide {
      background-size: cover;
      background-position: center;
    }
    .gallery-top {
      height: 80%;
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
   

  </style>
</hea230<body>
  <!-- Swiper -->
  <div class="swiper-container gallery-top">
    <div class="swiper-wrapper">
      <div class="swiper-slide  grdPic" style="background-image:url(/../../../../assets/img/<?= $item['photo'] ?>);height:230%;"></div>
      <div class="swiper-slide  grdPic" style="background-image:url(/../../../../assets/img/<?= $item['photo1'] ?>);height:230%;"></div>
      <div class="swiper-slide  grdPic" style="background-image:url(/../../../../assets/img/<?= $item['photo2'] ?>);height:230%;"></div>
      <div class="swiper-slide  grdPic" style="background-image:url(/../../../../assets/img/<?= $item['photo3'] ?>);height:230%;"></div>

    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-white" id="nxt"></div>
    <div class="swiper-button-prev swiper-button-white" id="prv"></div>
  </div>
  <div class="swiper-container gallery-thumbs">
    <div class="swiper-wrapper">
      <div class="swiper-slide" style="background-image:url(/../../../../assets/img/<?= $item['photo'] ?>)"></div>
      <div class="swiper-slide" style="background-image:url(/../../../../assets/img/<?= $item['photo1'] ?>)"></div>
      <div class="swiper-slide" style="background-image:url(/../../../../assets/img/<?= $item['photo2'] ?>)"></div>
      <div class="swiper-slide" style="background-image:url(/../../../../assets/img/<?= $item['photo3'] ?>)"></div>
  
    </div>
  </div>

  <!-- Swiper JS -->
  <script src="../package/js/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      loop: true,
      freeMode: true,
      loopedSlides: 5, //looped slides should be the same
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      loop:true,
      loopedSlides: 5, //looped slides should be the same
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs,
      },
    });
  </script>
</body>
</html>
