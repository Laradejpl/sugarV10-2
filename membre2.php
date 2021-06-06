<?php
require_once __DIR__ . '/config/bootstrap.php';



// Si le post n'existe pas



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









include __DIR__ . '/config/header.php';
?>

<script>



/*function ajout_amis(){


  $.ajax({
        url:'addFriend.php',
        success:function(data){


        }
       

    });

  }*/
 
 



function count_message(){


    $.ajax({
        url:'count_message.php',
        success:function(data)
        {
            if (data!=0) {//SI cest different de non lu donc lu

               $('#nombres').show();
              
               $('#nombres').html(data); 

                
            }
        }

    });


    setTimeout('count_message()',500);
}






function get_message(){  


    $.ajax({
        url:'get_message.php',
        success:function(data)
        {

$('#news').slideDown( ).html(data);
$('#nombres').hide();

$('#messages').css('border-top','solid 2px black');

        }


    });
        

        

}; 

function update(){

$.ajax({
        url:'update.php',
        success:function(data)
        {



        }


});
}


$(document).ready(function(){

     count_message();
     $('#nombres').click(function(){



         get_message();
         update();
     })

     $('#ajout').click(function(){

      ajout_amis();   

     })


})
</script>

<style>
  #picswipeLittle{

background-repeat: no-repeat;
background-size: 50% 500px;
border-radius:70px;
background-position: center;
border:3px solid red;
}


    @media all and (max-width: 480px)
{
    .grdpic{

        display:none;
    }
    #picswipeLittle {
      background-size: 100% 500px;
      background-position: center;
    }


}

body
{
  background: black;
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

.mySlides {display:none;}

  p{font-size:20px;
    color:black;
} 
.desc{

    color:black;
    border:2px solid;
}

h6{

    font-weight:bolder;
}

/*carouselle swipe 320_multiple-swipers
*/ 
.swiper-container {
      width: 100%;
      height: 500px;
      margin: 20px 0;
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }



</style>
<!---radio--->
<script>(function (win, doc, script, source, objectName) { (win.RadionomyPlayerObject = win.RadionomyPlayerObject || []).push(objectName); win[objectName] = win[objectName] || function (k, v) { (win[objectName].parameters = win[objectName].parameters || { src: source, version: '1.1' })[k] = v; }; var js, rjs = doc.getElementsByTagName(script)[0]; js = doc.createElement(script); js.async = 1; js.src = source; rjs.parentNode.insertBefore(js, rjs); }(window, document, 'script', 'https://www.radionomy.com/js/radionomy.player.js', 'radplayer'));
radplayer('url', 'bigfmreggaevibez');
radplayer('type', 'mobile');
radplayer('autoplay', '0');
radplayer('volume', '50');
radplayer('color1', '#000000');
radplayer('color2', '#ffffff');
</script>
<div class="radionomy-player"></div>

<!---radio--->
<br><br>
<form action="" method="post">
<div class="row d-flex justify-content-center">
   
  <button type="submit" class="col-6  btn btn-secondary " name="ajouter" id="ajout">ajoutes moi en amis</button>
  
  </form>
</div>



<?php if (role(ROLE_ADMIN)) : ?>
<a  class="btn btn-primary border rounded" href="backOffice.php">retour au backOffice</a>
<?php endif; ?>
<a  class="btn btn-success border rounded" href="accueil.php">retour au annonces</a>

<div class="container">

    <div class="row bg-info round ">
   
<div class="col-12 mt-4">



<h1 > "<?= $item['pseudo']?>" est à <?php echo $distance;?> de vous</h1>
        
        
        </div>
    </div>
</div>
<br><br>


<!----pricipale------>


<div class="container-fluid   ">
    
    <!----photo principale------>
<div class="row no-gutters rounded">
    <div class="col-md-8 col-12"><img src="assets/img/<?= $item['photo'] ?>"alt=".." style="width:100%;height:100%;z-index:1;" alt="..">
   <div class="grdpic">
    <img src="yesI.png" alt=".." style="z-index:2;position:relative;top:-300px;width:200px;float:left;">
    <img src="psg.png" alt=".." style="z-index:2;position:relative;top:-300px;width:200px;float:left;">
    <img src="jamaicanflag.png" alt=".." style="z-index:2;position:relative;top:-300px;width:200px;float:left;">


    </div>
</div>




<!---BLOG------>
<section class="col-md-4 col-12 bg-light  no-gutters" style="overflow:scroll;height:700px;"  >
 <h2  class="bg-dark">Mes soirées</h2>
 <hr>

 <?php
 $demande = $pdo->prepare("SELECT * FROM post WHERE auteur = :auteur");
 $demande->bindParam(':auteur', $_GET['id']);
 $demande->execute();
 if ($dnnes = $demande->fetch(PDO::FETCH_ASSOC)== null) {
  ?>

  <div class="col-12 bg-success" ><img src="ONG.png" alt="..." style="width:100%;">
  <img src="ACF.png" alt="..." style="width:100%;">

</div>
  <?php
 }

 while($dnnes = $demande->fetch(PDO::FETCH_ASSOC))
{
  ?>
 <h5><?php echo $dnnes['titre']?></h5>
 <img src="assets/img/<?= $dnnes['img'] ?>"alt=".." style="width:100%;" alt=".."> <p><?php echo $dnnes['contenu']?></p>
 <b><?php echo date('d/m/Y',strtotime ($dnnes['date_publication']));?></b><br>
 <a href="commentaire.php?id=<?=$dnnes['id'] ?>" class="col-3 btn btn-secondary">commentaire</a>
 <hr>
 <?php

}
?>



</section>


<!---BLOG------>





</div>
<!----photo principale------>


<div class="row d-flex justify-content-center mt-2">
<!----premier contenaire6------>
<div class=" col-12 col-md-5 bg-info-#d0d6e2 mdb-color lighten-5 rounded">
<!----titre------>
<div class="row" >
    <div class="col-12 badge-secondary mb-2 rounded">
    découvrez mon profile
    </div>
</div>
<!---fin-titre------>

<!----PHOTOS----->

<div class="row">
    <!----PHOTOS1----->
<div class="col-12 col-sm-4 mb-4">
    <img class="card-img-top img- fluid rounded" src="assets/img/<?= $item['photo1'] ?>"alt=".." style="width:100%;height:300px;" >
</div>

<!----PHOTOS2----->

<div class="col-12 col-sm-4">
    <img class="card-img-top img- fluid rounded" src="assets/img/<?= $item['photo2'] ?>"alt=".." style="width:100%;height:300px;" >
</div>

<!----PHOTOS3---->

<div class="col-12 col-sm-4">
    <img class="card-img-top img- fluid rounded" src="assets/img/<?= $item['photo3'] ?>"alt=".." style="width:100%;height:300px;" >
</div>
</div>

<!---FIN-PHOTOS----->
<!----description membre----->
<div class="row ">
    <div class="col-12 bg-secondary rounded" >

    <p style="color:white;">"<?= $item['description_membre'] ?>"</p>
    
    </div>
</div>

<div class="row">
<div class="col-3 desc">Mes yeux<h6><?= $item['yeux'] ?></h6></div>
<div class="col-3 desc">Ma silhouette<h6><?= $item['Silhouette'] ?></h6></div>
<div class="col-3 desc">Inscrit(e) depuis<h6><?= $item['date_enregistrement'] ?></h6></div>
<div class="col-3 desc"><h6><?= $item['valeur'] ?> €</h6></div>
<?php if($item['connexion'] == 1):?>
                              <span style="background: red;border:2px solid white;border-radius:20px;color:white;padding:4px;">connecté</span>
                              <?php elseif ($item['connexion'] == 0) :?>

                              <?php endif;?>





</div>

<div class="row ">
    <div class="col-12 bg-secondary rounded" >

    <p style="color:white;">"<?= $item['etat'] ?>"</p>
    
    </div>
</div>

<div class="row">
<div class="col-6 desc">Ma taille<h6><?= $item['taille'] ?></h6></div>
<div class="col-6 desc">Enfants<h6><?= $item['enfant'] ?></h6></div>






</div>

<div class="row">

          <div class="col-2 mr-2">

                 <img src="assets/img/gift.png" alt="gift" > <span id="countGifts" style="background-color:red;font-size:1em;color:white;border:2px solid;border-radius:50%;padding:5px;"><?php echo $datas->totalcadeaux ;?></span>

          </div>


         <div class="col-2 mr-2">
             <img src="assets/img/gateau1.png" alt="gift" > 
         </div>


        <div class="col-2 mr-2">
               <img src="assets/img/bijou1.png" alt="gift" > 
        </div>
</div>
<div class="row mt-4" >
    <div class="col-12 badge-success text-center">Ils sonts amis avec <?= $item['pseudo']?></div>
</div>



<div class="row d-flex justify-content-center">
  <?php //selectionne les amis
  $req9 = $pdo->prepare("SELECT membre.id_membre ,membre.photo1,membre.pseudo,amis.id_amis_ajouter,amis.id_membre_1 FROM membre,amis WHERE amis.id_amis_ajouter = membre.id_membre  AND id_membre_1 = ".$_GET['id']."   LIMIT 0,15 ");
  
  
  
  
  
  
  $req9->execute();
  while($friends =$req9->fetch(PDO::FETCH_ASSOC)):?>
    
  

<div class="col-1 mt-2   mr-4"><img src="assets/img/<?php echo $friends['photo1'] ; ?>" alt="..." style="width:90px;height:90px;border-radius:50px;float:left;"><h6 style="color:white;"><?php echo $friends['pseudo']; ?></h6></div>
<?php endwhile ;?>
<div class="row">
  <div class="col-12">
    <img src="ONG.png" alt="..." style="width:100%;">
  </div>
</div>

</div>
</div>

 
<!----FIN-description membre----->




<!----FIN premier contenaire6------>


<!---- Deuxieme contenaire------>

<div class=" col-12 col-md-5 ml-2 border rounded">

<div class="row">
    <div class="col-12">

    <a href="price.php">   <img src="assets/img/logopremium.png" alt="logo premium"></a>
    
    
    
    </div>
</div>


        
  
    <div class="row d-flex justify-content-center">

    <div class="col-12 col-md-8">
            <!----form--------->
            
            <?php if (role(ROLE_PREMIUM)  OR role(ROLE_ADMIN) ) : ?>
           
            <form action="membre.php?id=<?=  $_GET['id']; ?>" method="post" class="form-group">


           


            <label for="message">VOTRE MESSAGE</label>
    <textarea  name ="message" class="form-control" id="Textarea1"  class=""></textarea>

    <button type="submit" class="btn btn-primary" name="repondre" id="repondre">répondre</button>
   
   
            </form>
            </div>
    
    
    </div>
    <?php endif; ?>

    <form action="membre.php?id=<?=  $_GET['id']; ?>" method="post">
    <input type="hidden" value="cadeau" name="cado" id="submit">
    </form>






</div>

<div class="container-fluid mt-2">
  <div class="row">
    <div class="col-12">
      <h2>Les dernieres arrivées.</h2>
    </div>
  </div>
</div>



</div>
<div class="swiper-container swiper1">
    <div class="swiper-wrapper">
    <?php foreach(Annoncesdernierpublier($pdo) as $post) : ?>
    <div class="swiper-slide" id="picswipeLittle" style="background-image:url(assets/img/<?= $post['photo'] ?>)"></div>
    <?php endforeach; ?>
    
    </div>
    <!-- Add Pagination -->
   
    <div class="swiper-pagination swiper-pagination1"></div>
  </div>
<div class="container-fluid mt-2">
  <div class="row">
    <div class="col-12">
      <h2>Les derniers membres.</h2>
    </div>
  </div>
</div>
  <!-- Swiper -->
  <div class="swiper-container swiper2">
    <div class="swiper-wrapper">
    <?php foreach(Annoncesdernierpublier1($pdo) as $post1) : ?>
    <div class="swiper-slide" id="picswipeLittle" style="background-image:url(assets/img/<?= $post1['photo'] ?>)"></div>
    <?php endforeach; ?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination swiper-pagination2"></div>
  </div>



</div>

</div>


  </div>
  






<!-- Modal 2   MESSAGE-->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Vous avez  Messages</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      
<?php

$allNewMessage=$pdo->query('SELECT * 
FROM message 
WHERE membre_id2 = '.getMembre()['id_membre'].' AND lu = 0
ORDER BY date_enregistrement DESC LIMIT 0, 1');

?>

<?php while($NewMessage = $allNewMessage ->fetch()) :?>

<?php

$expediteur = $NewMessage['membre_id1'];
$data = $pdo->query("SELECT pseudo,photo FROM membre WHERE id_membre = '$expediteur'");
$pseudo = $data->fetch(PDO::FETCH_ASSOC);

?>  
<img src="assets/img/<?php echo $pseudo['photo']; ?>" alt="..." style="width:90px;height:90px;border-radius:50px;float:left;">
            
<p style="font-size:32px;font-weight: bolder;color:black;"><?php echo $pseudo['pseudo'];?></p>
<?php echo $NewMessage['message'];?><br>
<?php echo $NewMessage['date_enregistrement'];?>
<!-- nonlu->lu-->
   
    <?php  endwhile; ?> 


    <?php

$allNewMessage=$pdo->query('SELECT * 
FROM message 
WHERE membre_id2 = '.getMembre()['id_membre'].' AND lu = 0
ORDER BY date_enregistrement DESC LIMIT 0, 1');

?>
 
 <?php while($NewMessage = $allNewMessage ->fetch()) :?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a  class=" btn btn-primary"href="membre.php?id=<?= $NewMessage['membre_id1']?>"> Répondre</a>
        
      </div>
    </div>
  </div>
</div>
<?php  endwhile; ?> 
<!-- Modal 2  FIN MESSAGE-->


 
<script src="https://cdn.jsdelivr.net/npm/emoji-button@2.1.1/dist/index.min.js"></script>
<script src="swiper-5.3.0/package/js/swiper.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper1 = new Swiper('.swiper1', {
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination1',
      clickable: true,
    },
  });
  var swiper2 = new Swiper('.swiper2', {
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination2',
      clickable: true,
    },
  });
  var swiper3 = new Swiper('.swiper3', {
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination3',
      clickable: true,
    },
  });
</script>
</body>
</html>


 