<?php
require_once __DIR__ . '/config/bootstrap.php';


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





</style>
<br><br>
<form action="" method="post">
<div class="row d-flex justify-content-center">
   
  <button type="submit" class="col-6  btn btn-secondary " name="ajouter" id="ajout">demande d'amis</button>
  
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



<div class="container-fluid  ">


<div class="row d-flex justify-content-center">
<!----premier contenaire6------>
<div class=" col-12 col-md-5 bg-info-#d0d6e2 mdb-color lighten-5 rounded">
<!----titre------>
<div class="row">
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


<?php
//$moi = getMembre()['id_membre'];


$req = $pdo->query("SELECT DISTINCT * FROM amis WHERE id_membre_1 = $id OR  id_amis_ajouter = $id AND friend = 1");

$req->execute();



  //$req = $pdo->query("SELECT membre.id_membre ,membre.photo1,membre.pseudo,amis.id_membre_1,amis.id_amis_ajouter,amis.friend FROM membre ,amis WHERE  amis.id_amis_ajouter =membre.id_membre AND id_membre_1 = $id AND amis.friend = 1 OR id_amis_ajouter = $id");
  //$req->execute();
  
  ?>


<?php  $rt = $pdo->prepare("SELECT amis.id_amis_ajouter,amis.id_membre_1 ,membre.id_membre,membre.photo1,membre.pseudo 
FROM membre,amis 
WHERE membre.id_membre = amis.id_membre_1
AND amis.id_amis_ajouter = $id
AND friend = 1");
$rt->execute();
?>

   <div class="container">
      <div class="row d-flex justify-content-center">
<?php while($mbre = $rt->fetch(PDO::FETCH_OBJ)):?>
           <div class="col-12 col-sm-1">  <a href="membre.php?id=<?php echo $mbre->id_membre?>"><img src="assets/img/<?php echo $mbre->photo1 ; ?>" alt="..." 
               style="width:90px;height:90px;border-radius:50px;float:left;"></a></div>
              <div class="col-12 col-sm-1"><h6><?php echo $mbre->pseudo;?></h6></div>
         
<?php endwhile;?>





  <?php  $ramis = $pdo->prepare("SELECT amis.id_amis_ajouter ,amis.id_membre_1 ,membre.id_membre,membre.photo1,membre.pseudo 
FROM membre,amis 
WHERE membre.id_membre = amis.id_amis_ajouter 
AND  amis.id_membre_1 = $id
AND friend = 1");
$ramis->execute();
?>
<?php while($mbreAjout = $ramis->fetch(PDO::FETCH_OBJ)):?>
  
  
      <div class="col-12 col-sm-1"> <a href="membre.php?id=<?php echo $mbreAjout->id_membre?>"> <img src="assets/img/<?php echo $mbreAjout->photo1 ; ?>" alt="..." 
  style="width:90px;height:90px;border-radius:50px;float:left;"></a></div>
      <div class="col-12 col-sm-1"><h6><?php echo $mbreAjout->pseudo;?></h6></div>
<?php endwhile;?>
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





</div>
<div class="row">
  <div class="col-12 badge-secondary">
    <h2>CES ANNONCES POURRIENT VOUS PLAIRENT.</h2>
  </div>
</div>
<!---CAROUSSELLE----------->
<div id="carouselExampleIndicators " class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">

    <div class="row">
    <?php foreach(Annoncesdernierpublier($pdo) as $post) : ?>
    <!-------card-------->

<div class="image-flip   mr-4" ontouchstart="this.classList.toggle('hover');">
<div class="mainflip">
<div class="frontside">
<div class="card cardFlipping"" style="width:20rem;height:20rem;"  >
<img class="card-img-top img- fluid" src="assets/img/<?= $post['photo'] ?>"alt=".." style="width:100%;height:200px;" >
<div class="card-body">
<h4 class="card-title" style="color:white;"><?= nl2br(htmlspecialchars($post['pseudo'])) ?></h4>
<p class="card-text" style="color:white;"><?= nl2br(htmlspecialchars($post['description_membre'])) ?></p>
</div>
</div>
</div>
<div class="backside">
<div class="card " style="width:20rem;height:20rem;" >
<div class="card-header bg-danger"style="color:white;">
<?= $post['pseudo'] ?>
</div>
<div class="card-body ">
<h4 class="card-title"style="color:white;"><h4>Contactez ce membre</h4>
<p class="card-text">This is a card component with header and footer.</p>
<a href="membre.php?id=<?=  $post['id_membre']?>" class="btn btn-info btn-md">Voir</a>
</div>
<div class="card-footer d-flex justify-content-around"style="color:white;">
<?php if (role(ROLE_PREMIUM )) : ?>
  <a href="membre.php?id=<?=  $post['id_membre']?>"> <i class="fa fa-comments" aria-hidden="true" style="color:black;font-size:2em;"title="chatter avec <?= $post['pseudo'] ?>"></i>  </a> 
  <?php endif; ?>
<i class="fa fa-cart-plus" aria-hidden="true" style="color:black;font-size:2em;"title="Achetez plus de credits"></i>
<i class="fa fa-picture-o" aria-hidden="true" style="color:black;font-size:2em;" title="voir les photos"></i>
</div>
</div>
</div>
</div>
</div>
<!------- fincard-------->
<?php endforeach; ?>
    </div>
    </div>
    <div class="carousel-item">
    <div class="row">
    <?php foreach(Annoncesdernierpublier1($pdo) as $post1) : ?>
    <!-------card-------->

<div class="image-flip   mr-4" ontouchstart="this.classList.toggle('hover');">
<div class="mainflip">
<div class="frontside">
<div class="card cardFlipping"" style="width:20rem;height:20rem;"  >
<img class="card-img-top img- fluid" src="assets/img/<?= $post1['photo'] ?>"alt=".." style="width:100%;height:200px;" >
<div class="card-body">
<h4 class="card-title" style="color:white;"><?= nl2br(htmlspecialchars($post1['pseudo'])) ?></h4>
<p class="card-text" style="color:white;"><?= nl2br(htmlspecialchars($post1['description_membre'])) ?></p>
</div>
</div>
</div>
<div class="backside">
<div class="card " style="width:20rem;height:20rem;" >
<div class="card-header bg-danger"style="color:white;">
<?= $post1['pseudo'] ?>
</div>
<div class="card-body ">
<h4 class="card-title"style="color:white;"><h4>Contactez ce membre</h4>
<p class="card-text">This is a card component with header and footer.</p>
<a href="membre.php?id=<?=  $post1['id_membre']?>" class="btn btn-info btn-md">Voir</a>
</div>
<div class="card-footer d-flex justify-content-around"style="color:white;">
<?php if (role(ROLE_PREMIUM )) : ?>
  <a href="membre.php?id=<?=  $post1['id_membre']?>"> <i class="fa fa-comments" aria-hidden="true" style="color:black;font-size:2em;"title="chatter avec <?= $post1['pseudo'] ?>"></i>  </a> 
  <?php endif; ?>
<i class="fa fa-cart-plus" aria-hidden="true" style="color:black;font-size:2em;"title="Achetez plus de credits"></i>
<i class="fa fa-picture-o" aria-hidden="true" style="color:black;font-size:2em;" title="voir les photos"></i>
</div>
</div>
</div>
</div>
</div>


<!------- fincard-------->
<?php endforeach; ?>

    </div>
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!---CAROUSSELLE----------->


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
        <a  class=" btn btn-danger"href="acceptfreind.php?membre_id1=<?= $NewMessage['membre_id1']?>"> accepter</a>
        
      </div>
    </div>
  </div>
</div>
<?php  endwhile; ?> 
<!-- Modal 2  FIN MESSAGE-->


 
<script src="https://cdn.jsdelivr.net/npm/emoji-button@2.1.1/dist/index.min.js"></script>





 