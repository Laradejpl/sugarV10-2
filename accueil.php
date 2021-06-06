<?php
require_once __DIR__ . '/config/bootstrap.php';
$messageWarning = "";
$req9 = $pdo->prepare("SELECT * FROM message WHERE lu = 0 AND membre_id2 = :membre_id2 ");
$req9->bindParam(':membre_id2', getMembre()['id_membre'], PDO::PARAM_INT);
$req9->execute();
$dta = $req9->fetch(PDO::FETCH_OBJ);
//var_dump($dta->id_message);
$idmess = $dta->id_message;

if (isset($_POST['addingfr'])) {
  
  
    $req8 = $pdo->prepare('DELETE FROM message WHERE id_message = :id_message');
    $req8->bindParam(':id_message',$idmess, PDO::PARAM_INT);
    $req8->execute();

$messageWarning = "Vous avez été enregistrer!";
    
    }
//traitement afficher les derniers membres

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

$req = $pdo->prepare('UPDATE loading SET lu=1');
$req->execute();
$req->closeCursor();



//  afficher tout les champs tout les champs lu 


if (!empty($_POST)) {
    extract($_POST);//ont les separent les valeurs du post
    $req = $pdo->prepare("INSERT INTO loading(message,lu,membre_id) VALUES(:message,:lu,:membre_id)");
    $req->execute(array(
    ':message'=>$message,
    ':lu'=>0,

    ':membre_id'=>getMembre()['id_membre']
));
    $req->closeCursor();

}




//compter les messages qui non pas été lu

$page_title = 'bienvenue'; # Pour la balise <title>

include __DIR__ . '/config/header.php';

?>






<style>
    

.lds-ring {
  display: inline-block;
  position: relative;
  width: 604px;
  height: 604px;
  margin-left:25%;
}
.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 151px;
  height: 151px;
  margin: 6px;
  border: 6px solid #fff;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: #fff transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}


@keyframes fadeOut {
    100% {
        opacity: 0;
        visibility: hidden;
    }
}






    body{

        background:black;
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
   
   
<script>




window.addEventListener("load", function () {
    const loader = document.querySelector(".lds-ring ");
    loader.className += "hidden"; // class "loader hidden"

 
});

/*function heart(){

 document.getElementById('Textarea1').textContent ="❤️";

      

}
function fun(){


document.getElementById('Textarea1').textContent ="😀";
}*/

function addfriend(){

    $.ajax({

        url:'addamis.php',
        success:function(data)
        {


        }
        

    });




}



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

     $('#envoyer').on("submit",function(e){
        e.preventDefault();
        console.log('bouton desactivivé.');
    })

    


})



</script>

    <div class="container">
        <div class="row">
            <div class="col-12"><?= $messageWarning  ;?></div>
        </div>
    </div>


 <!---LOADER---->

                
 <div class="lds-ring"><div></div><div></div><div></div><div></div></div>

<!--FIN-LOADER---->




  <!---slide---->
    
  <div class="row mb-4">
        <div class="col-12">
            <div id="block-itunes">
                
                <div id="bi-max"></div>
                <div id="bi-images" >
                    <div id="bi-min">
                        <a href="#melanie">
                            <img src="assets/img/PSKEY-min.png" alt="1" class="min" />
                            <img src="assets/img/PSKEY-max.png" alt="one" class="max" />
                        </a>
                        <a href="#beyonce">
                            <img src="assets/img/osx-min.png" alt="" class="min" />
                            <img src="assets/img/osx-max.png" alt="" class="max" />
                        </a>
                        <a href="#amelie">
                            <img src="assets/img/xkey-min.png" alt="" class="min" />
                            <img src="assets/img/xkey-max.png" alt="" class="max" />
                        </a>

                        <a href="#amelie">
                            <img src="assets/img/lion-min.png" alt="" class="min" />
                            <img src="assets/img/lion-max.png" alt="" class="max" />
                        </a>
                        <a href="#drhouse">
                            <img src="assets/img/win-min.png" alt="" class="min" />
                            <img src="assets/img/win-max.png" alt="" class="max" />
                        </a>
                    </div>
                </div>
                <button type="button" id="bi-button"></button>
            </div>
            
        </div>
        
    </div>
    <div class="row   d-flex justify-content-center contenu1 ">
            <div class="col-2  " id="sideMenu1">


           
            <!--- FIN slide---->
            </div> 
            <br><br>
            <div class="row   d-flex justify-content-center contenu1 " >
            <div class="col-2  " id="sideMenu1">


     


            <div class="container  p-2 rounded-left  mb-4 mt-4">
                <div class="row d-flex justify-content-around">


                <img src="assets/img/facebook.png" alt="fb"> 
                
                
                    <img src="assets/img/insta.png" alt="insta"> 
                    
                    
                    <img src="assets/img/twer.png" alt="twiter"> 
                   
                
                
                
                </div>
                </div>

                </div>
                <br><br>

                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-8">
                        <p >
            
                        « Il y a t’il plus grand bonheur dans la vie que de trouver des personnes qui partagent le même engouement que vous ,le même intérêt  pour la musique et les relations amoureuses ,amicales. 
REGGAE RENCONTRE veut réunir  l’amour du reggae ,notre musique que nous aimons et l’amour de la vie .
ici pas de prises de tête ,ceci est votre espace  et comme disais un illustre chanteur tout les bonnes choses sont FREE ou presque.
Enjoy YOURSELF. »
            
            
            </p>
                        </div>
                    </div>
                </div>
                <br><br>
         

                <div class="container-fluid">
        <div class="row">
            <div class="col-12 rounded p-4">
                <img src="assets/img/rastaflag.png" alt="ethiopien" style="width:100%;height:90px;">
                <h2> Nos derniers membres</h2>
                
            </div>
        </div>
        

   <div class="container js-scrollTo">
      <div class="row d-flex justify-content-center">
          <div class="col-12 col-md-6">
       

          <a href="https://play.google.com/store/apps/details?id=com.uwall.airmusic" ><img  class="mt-4" src="assets/img/radio.png" alt="radiorasta" style="width:100%;"></a>
          </div>
      </div>
  </div>


    <div class="row">
        <div class="col-12">
     
    <br>
    <div class="row d-flex justify-content-center">

    <?php foreach(Annoncesdernierpublier($pdo) as $post) : ?>
    <!-------card-------->
   

<div class="image-flip ml-4  mr-4" ontouchstart="this.classList.toggle('hover');">
<?php 



$req1 = $pdo->prepare('SELECT COUNT(*) as totalcadeaux FROM cadeau WHERE beneficiaire_id = ?');
 
$req1->execute(array($post['id_membre']));
$datas =$req1->fetch(PDO::FETCH_OBJ);


if ($post['civilite'] == "femme") {
   echo '<img src="assets/img/weed.png" alt"weed" style="width:20%;height:20%;position:relative;float:right;z-index:1;"/> ';
  
   ?>
          <span class="card-title" style="color:lime; "><i class="fa fa-street-view" aria-hidden="true" style="font-size: 20px;"></i></i><?= nl2br(htmlspecialchars($post['town'])) ?></span><br>
          <span><?php 
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
  echo ' est à '.$distance; 

  
  
  //fin calcule distance
       
       
       ?></span>

   <span id="countGifts" style="background-color:rgb(255, 0, 170);font-size:14px;color:white;border:2px solid;border-radius:50%;padding:5px;position:relative;float:right;z-index:1;">  <?php echo $datas->totalcadeaux." vue"; ?> </span>
   <?php 
}
else {
    echo '<img src="assets/img/lion.png" alt"weed" style="width:20%;height:20%;position:relative;float:right;z-index:1;"/>';
    ?>
       <span id="countGifts" style="background-color:dodgerblue;font-size:14px;color:white;border:2px solid;border-radius:50%;padding:5px;position:relative;float:right;z-index:1;">  <?php echo $datas->totalcadeaux." vue"; ?> </span>
       <span class="card-title" style="color:lime; "><i class="fa fa-street-view" aria-hidden="true" style="font-size: 20px;"></i></i><?= nl2br(htmlspecialchars($post['town'])) ?></span> <br>
       <span><?php 
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
  echo ' est à '.$distance; 

  
  
  //fin calcule distance
       
       
       ?></span>

    <?php 
}

?>
<div class="mainflip">
<div class="frontside">
<div class="card cardFlipping"" style="width:20rem;height:20rem;"  >

<img class="card-img-top img- fluid" src="assets/img/<?= $post['photo'] ?>"alt=".." style="width:100%; height:200px;" >
<div class="card-body">
<h4 class="card-title" style="color:red;"><?= nl2br(htmlspecialchars($post['pseudo'])) ?></h4><?php if($post['connexion'] == 1):?>
                              <span style="background: red;border:2px solid white;border-radius:20px;color:white;padding:3px;">connecté</span>
                              <?php elseif ($post['connexion'] == 0) :?>

                              <?php endif;?>
                              <?php if (strlen($post['description_membre']) > 50) : ?>
<p class="card-text" style="color:yellow;"><?= nl2br(htmlspecialchars(substr($post['description_membre'],0,20) . '...')); ?></p>
                     <?php else: ?>
 <p class="card-text" style="color:yellow;"> <?= $post['description_membre']; ?></p>

                        <?php endif; ?>
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
<p class="card-text">Nos membres vous respectent ..pas de propos déplacer injures racistes.</p>
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

<!--CHAT-->
    


    <!--FIN-CHAT-->




    
    
    </div>

    
<hr>
<br><br>
<div class="row">

<div class="col-12">
 <a href="price.php"> <img src="assets/img/logopremium.png" alt="premium_logo"></a>

</div>

</div>

<!----CHAT-- form--------->

<div class="container-fluid" id="chatty" >
    <div class="row d-flex justify-content-center">
      
   

       
        <div class="col-12 col-md-5">
            <span id="nombres" style="background-color:red;font-size:1em;color:white;border:2px solid;border-radius:50%;padding:5px; display:none;"></span>
            <h3 class="badge-success p-2" style="border-top-right-radius: 50px 50px;border-top-left-radius: 50px 50px;">Les derniers messages</h3>
        <div id="news"></div>

        <!----les MESSAGES--------->
        <div id="messages" class="badge-light border p-4" style="overflow:scroll;height:300px;">

        <?php
           $req = $pdo->prepare('SELECT membre.pseudo,membre.photo,loading.message ,loading.date_pub FROM membre,loading WHERE  membre.id_membre = loading.membre_id AND  lu=1 ORDER BY id_message DESC LIMIT 0, 6');
           $req->execute();
           while($data =$req->fetch(PDO::FETCH_OBJ)):?>

           <div class="message">


           <h4 class="badge-danger " style="border-top-left-radius: 120px 120px;">
           <img src="assets/img/<?php echo $data->photo ; ?>" alt="..." style="width:90px;height:90px;border-radius:50px;float:left;">
           
           <?php echo $data->pseudo; ?></h4> 

           <p   class="badge-primary "style=" padding:2px;z-index:1; border-radius:20px;text-align:center"><?php echo htmlentities($data->message); ?></p>
           <h6><?php echo $data->date_pub; ?></h6>
           <br>
           <hr>
           <br><br>
           </div>

<?php endwhile;
  
  ?>

    
      
    
 
        </div>
        </div>

        
    </div>
            <?php if (role(ROLE_PREMIUM)  OR role(ROLE_ADMIN) ) : ?>
    <div class="row d-flex justify-content-center">

    <div class="col-12 col-md-5">
            <!----form--------->
            

           
            <form action="accueil.php" method="post" class="form-group" id="envoyer">


           

            <label for="message">VOTRE MESSAGE</label>
    <textarea  name ="message" class="form-control" id="Textarea1"  class="">

   
    
    
    
    </textarea>
   

    <input type="submit" value="poster" class="btn btn-primary mt-2" >
   
            </form>

            </div>
            <?php endif; ?>
    
    
    </div>
    <br><br>
  
    <div class="container-fluid">
    <div class="row">
        <div class="col-12 rounded p-4">
            <img src="assets/img/rastaflag.png" alt="ethiopien" style="width:100%;height:90px;">
           
            
        </div>
    </div>
     

    
    <div class="container badge-light rounded" style="overflow:scroll;height:300px;">
                    <div class="row d-flex justify-content-center ">
                        <div class="col-8 ">
                            <h3>LES NEWS REGGAE</h3><a href="rss.php"><img src="assets/img/rss.png" alt="rss"> </a>
                            <br>

                            <?php

                                    $req =$pdo->prepare("SELECT * FROM news ORDER BY id DESC");
                                    $req->execute();
                                   while ($datas = $req->fetch(PDO::FETCH_OBJ)) {
                                         ?>

                                        <a href="<?php echo $datas->url;?>" style="font-size:1.5em;font-weight:bolder;" class="badge-dark rounded p-2"><?= $datas->titre ;?></a> <br>
                                         <br>
                                         <p><?= $datas->contenu ;?></p>
                                         <p ><?= date('d/m/Y',strtotime($datas->date))  ;?></p>
                                         <hr>



                                         <?php
                            }
                            
                           
                            
                            ?>
                        </div>
                    </div>
                </div>


    <!------------------------------------ FOOTER -------------------->
    
<div class="container-fluid ">
            
            <div class="row">
               
        
            </div>
        
        
        </div>
        <br>
        <?php

$req4 = $pdo->query('SELECT COUNT(*) as total FROM membre WHERE connexion = 1');
$req4->execute();
$data =$req4->fetch(PDO::FETCH_OBJ);
echo  'il y a ' .$data->total.'personnes connectés';
        
        ?>
          <footer class="page-footer font-small mt-4" style="background-color:black; color:white; margin-top:0px; ">
    <script language="javascript" type="text/javascript">
      /*
     pour imprimer
      */
      if(window.print)
      {
      document.write('<A HREF="javascript:window.print()"> <i style="font-size:1em;" class="fa fa-print" aria-hidden="true"></i> imprimer ce document</A>');
      }
      </SCRIPT> 
  
       <div class="container-fluid">
         <div class="row  justify-content-around sol">
                      <div class=" youtube mt-2"> <img src="assets/img/facebook.png" alt="fb"> </div>
                      <div class=" twi mt-2" >  <img src="assets/img/insta.png" alt="instagram">   </div>
                      <div class=" fb mt-2" > <img src="assets/img/twer.png" alt="tw"> </div>
                      
      </div>
        
      </div> 
            
       
        <br>
    
   

    <!--------------------->
    <div class="container text-center text-md mt-5 ">
        <div class="row mt-3 ">
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 ">


                <h6 class="text-uppercase font-weight-bold ">Qui sommes-nous?</h6>
                <hr class=" accent-2 mb-4 mt-0 d-inline-block mx-auto " style="width: 60px; ">
                <p><a href="recrutement.html">Nous rejoindre</a></p>
            </div>

            <!-- ---------Divers---------->
            <div class="col-md-3 col-lg-4 col-xl-2 mx-auto mb-4">


                <h6 class="text-uppercase font-weight-bold">DIVERS</h6>
                <hr class=" text-light accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="mentions.html">Mentions legales</a>
                </p>
                <p>
                    <a href="cgv.html">Conditions Générales de Vente</a>
                </p>
                <p>
                    <a href="plan_de_site.html">Plan de site</a>
                </p>
            </div>


            <!-- ---------Newsletter---------->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">


                    <h6 class="text-uppercase font-weight-bold">NEWSLETTER</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <a href="newletter.html">
                        <p>Inscrivez vous à notre Newsletter</p>
                    </a>
                </div>


            <!-- ---------Avis---------->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">


                <h6 class="text-uppercase font-weight-bold">AVIS</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <a href="Avis.html">
                    <p>Votre avis</p>
                </a>
            </div>


            <!-- ---------Contact---------->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-2">

                
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>
              
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                
                    <i class="fas fa-envelope mr-3"></i> UsbP@gmail.com</p>
                <p>
                    <i class="fas fa-phone mr-3"></i> 01 40 46 10 12</p>
                
                <iframe
                    src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=button_count&size=small&width=105&height=20&appId"
                    width="105" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                    allowTransparency="true" allow="encrypted-media"></iframe>
                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button"
                    data-show-count="false">Tweet</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>

    <hr>
    <div class="container-fluid">
        <div class="row">
            <dic class="col-12">
<span >REGGAE RENCONTRE NE SUPORTE AUCUNE UTILISATION DE DROGUE LES IMAGES RELATIVES AU CHANVRE NE FONT REFERENCES QU'A LA PLANTE MEDICINALE ...</span>


            </dic>
        </div>
    </div>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
        <span id="createurs">Reggae Rencontre</span>
    </div>
</footer>



<!-- fin CONTENU PRINCIPALE--->
        </div> 
        

  

                
            
            
            </div>
    </div>
</div>










</div>


</div>
    


   
</div>  <br><br><br> 










                                                                     
                                                                      





                                                                    
</div>

        </div>
    </div>
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

  


<script src="js/javascript.js"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dca7e0e111d8b8d"></script>

</body>
</html>



