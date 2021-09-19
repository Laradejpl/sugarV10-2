<?php

$poster ='';
$idc = getMembre()['id_membre'];
$rtt = $pdo->prepare("SELECT * FROM pagepro WHERE id_client= $idc");
$rtt->execute();
$pageMembre = $rtt->fetch(PDO::FETCH_OBJ);
$profilmodif =$pageMembre->first_modif;


if (getMembre() === null ) {
  header('Location: index.php');//si tu n'est pas connecter ont vas a index.php
}


/**
 * Récupérer l'utilisateur connecté (s'il y a)
 * @return array|null
 * 
 * Typage nullable (type ou null):  ?type
 */


if ($item['statut'] = 0) {
    $statut='FREE';
  } elseif ($item['statut'] = 2) {
    $statut='PREMIUM';
  }
  else{
  
      $statut='ADMIN';
  }









?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
   <script src="js/appLeaflet.js"></script>
   <script src="data/data.js"></script>

<link rel="icon" type="image/png" href="config/favicon.png" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

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

            <link href="https://fonts.googleapis.com/css?family=Anton|Orbitron&display=swap" rel="stylesheet">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
            <script src="js/javascript.js"></script>
            <script src="js/jquery-1.5.2.js"></script>
            <link rel="stylesheet" href="main.css" type="text/css" />
        <script type="text/javascript" src="Winwheel.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    
       <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
       <link rel="stylesheet" href="swiper-5.3.0/package/css/swiper.min.css">
       <link rel="stylesheet" href="CSS/style.css">
       
        <title>accueil</title>
        <script src="libs/leaflet.js"></script>
   <script src="js/app.js"></script>
   <script src="data/data.js"></script>
  








       
<style>

@media all and (max-width: 480px)
{
  #mapid
  {
    display: none;

  }
  .titleone
  {
    display: none;
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

</style>

    </head>
<body>




<div class="container-fluid ">
    <div class="row d-flex justify-content-center">
        <div class=" col-12 shadow item1">

        <h1 class="usbtitle con" style="color: rgb(255, 0, 191);"><b style="color:green;">Reg</b><b style="color:yellow;">gae</b><b style="color:red;">R</b></h1>
        
        
        

        <nav
            class="navbar navbar-expand-lg navbar-dark "
            style=" background: linear-gradient(0deg,#000,#262626);;">
            
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
                            <a   class="nav-link" style="color:white;font-size:20px;" href="post.php"><strong><?= getMembre()['pseudo'] ?></strong></a>
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
                            <img    style="border-radius:50px; width:15%; " src="assets/img/<?= getMembre()['photo'] ?>"alt="..">
                            <?php if(getMembre()['connexion'] == 1):?>
                              <span style="background: red;border:2px solid white;border-radius:20px;color:white;">connecté</span>
                              <?php elseif (getMembre()['connexion'] == 0) :?>

                              <?php endif;?>

                        </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <?php if ($profilmodif != 1 ):?>
                            <a   href="profil.php?id=<?php echo getMembre()['id_membre']?>">PROFIL</a>
                          <?php else:?>
                            <a   href="profil_fini.php?id=<?php echo getMembre()['id_membre']?>">PROFIL</a>

                          <?php endif;?>
                            <a class="dropdown-item"  data-toggle="modal" data-target="#exampleModalLong"  href="#">vos messages</a>
                            <a class="dropdown-item"     href="messagerie.php?id=<?php echo getMembre()['id_membre']?>"> Messagerie</a>
                            <a class="dropdown-item"     href="messfront.php"> Messfront</a>



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
            <div class="row d-flex justify-content-center mb-2 centreNav">
        <!---<div class="col-3 border p-2 seconMenu rounded-left " style="background: linear-gradient(0deg,#000,#262626);"> <a href="https://saintecroixtattoo.com/swiper-5.3.0/demos/swipewoman.php#" style="color:white;" class="linkMenu" >MATCH</a></div>--->
        <div class="col-3 border p-2 seconMenu rounded-left " style="background: linear-gradient(0deg,#000,#262626);"> <a href="swipeAgain.php" style="color:white;" class="linkMenu" >MATCH</a></div>
        <div class="col-3 border p-2 seconMenu " style="background: linear-gradient(0deg,#000,#262626);"><a href="addtocart.php"style="color:white;" class="linkMenu">Boutique</a></div>
        <div class="col-3 border p-2 seconMenu " style="background: linear-gradient(0deg,#000,#262626);"><a href="#"style="color:white;" class="class="dropdown-item"   data-toggle="modal" data-target="#exampleModalLong4" ">Jeux</a></div>
        <i class="fas fa-shopping-basket border   p-2 rounded-right btn btn-primary" style="background: linear-gradient(0deg,#000,#262626);font-size:1.5em"  data-toggle="modal" data-target="#exampleModal"></i>
    </div>
    

    <!---deuxieme module MOBILE---->

    <div class="row d-flex justify-content-center mb-2 coolnav" id="fluo">
      
        <div class="col-3  p-2 seconMenu2  border-right rounded-left " style="background: linear-gradient(0deg,#000,#262626);"> 
        <?php if((getMembre()['statut'] == 1)||(getMembre()['statut'] == 2) ):?>
        <a href="https://reggaerencontre.com/CHAT.php" style="color:white;text-shadow: 3px 3px #ff0000;" class="linkMenu2" title="Réservez aux forfait chillout ou BS."  >ChatVideo</a>
        <?php elseif(getMembre()['statut'] == 0):?>

                  <a href="#" style="color:white;text-shadow: 3px 3px #ff0000;" class="linkMenu2" title="Réservez aux forfait chillout ou BS." onclick="openPremium()" >ChatVideo</a>

          <?php endif;?>
          

      </div>
      
        <div class="col-3  p-2 seconMenu2 border-right"><a href="femmes.php"style="color:white; " class="linkMenu2">Femme</a></div>
        <div class="col-3  p-2 seconMenu2 border-right"><a href="#"style="color:white;" class="linkMenu2">qui nous sommes</a></div>
        <div class="col-3  p-2 seconMenu2 border-right"><a href="bonus_mapgeo.html"style="color:white;" class="linkMenu2">contact</a></div>

    </div>
    <!--- FIN deuxieme module MOBILE----> 

<div class="container titleone" >
  <div class="row d_flex justify-content-center">
    <div class="col-6 bg-dark rounded-pill">

   <h2 >Ils sont  prés de chez vous .
</h2> 


    </div>
  </div>
</div>
<div id="mapid"></div>


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-header " >
      
        <h4 class="modal-title " id="exampleModalLabel"  style="color:black;">votre Panier</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

 






<!-- Modal 4  MESSAGE-->
<div class="modal fade" id="exampleModalLong4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header badge-dark">
        <h5 class="modal-title " id="exampleModalLongTitle text-center text-capitalize">LES JEUX  <i class="fa fa-gamepad" aria-hidden="true"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:white;">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-dark">

      <div class="col-12 btn btn-danger #ff4444"><a href="slot.php" style="color:white;">Slot machine</a></div>
      <!------<div class="col-12 btn btn-success #00C851"><a href="javascript-winwheel-2.8.0/examples/one_image_per_segment/fortuna.php" style="color:white;">Reggae Fortuna</a></div>--->
      <div class="col-12 btn btn-success #00C851"><a href="surf.php" style="color:white;">SURF</a></div>
      <div class="col-12 btn btn-warning #FF8800 dark"><a  href="bowling.php"style="color:white;">Super Soccer Noggins</a></div>
      <div class="col-12 btn btn-info #33b5e5"><a  href="poll.php"style="color:white;">8 Pool ball</a></div>
</div>
      
    </div>
  </div>
</div>





<!-- Modal 4  FIN MESSAGE-->


<script>


   let centre = {lat:<?php echo getMembre()['lat']?>, lng: <?php echo getMembre()['lng']?>};
   let map = L.map('mapid').setView( centre , 20);

   
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
	maxZoom: 20,
	attribution: '&copy; Openstreetmap France | &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

   document.addEventListener("DOMContentLoaded", function(){

       chargerDonnees();
      
       
   });

  async function chargerDonnees(){
     

       let url =   'https://reggaerencontre.com//testnominatim.php';
       let resp = await fetch(url);
       let datas = await resp.json();
       console.log(datas);

       let groupMarkers  = [];
       for (let data of datas) {

       let m = L.marker(data,{
               icon: markColor('green')
              }).bindPopup(`${data.pseudo}<br>  <a href="membre.php?id=${data.id_membre}">  <img  src="assets/img/${data.photo}"  style="border-radius:50px;width:50px;height:50px;border:3px solid red;" > </a>`);
              groupMarkers.push(m);
           
       }
       let groupe = L.featureGroup(groupMarkers).addTo(map);
       map.fitBounds(groupe.getBounds());
      
     }

     /*$(document).ready(function(){
        $(".menu a").each(function(){
          if($(this).hasClass("disabled")){
            $(this).removeAttr("href");

          }
        });
      });*/
     function openPremium(){

       alert("RESERVEZ AUX FORFAITS BS OU EASY.")
       
     }

   </script>

