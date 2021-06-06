<?php
$poster ='';






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

            <link href="https://fonts.googleapis.com/css?family=Anton|Orbitron&display=swap" rel="stylesheet">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
            <script src="js/javascript.js"></script>
            <script src="js/jquery-1.5.2.js"></script>
            <link rel="stylesheet" href="main.css" type="text/css" />
        <script type="text/javascript" src="Winwheel.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    
       
        <link rel="stylesheet" href="CSS/style.css">
       
        <title>accueil</title>
<style>
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

</style>

    </head>
<body >


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
                            <img   style="border-radius:50px; width:15%; " src="assets/img/<?= getMembre()['photo'] ?>"alt="..">

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item"   data-toggle="modal" data-target="#exampleModalLong3"   href="#">votre profil</a>
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
                      class="form-control mr-sm-2 barsearch"
                      type="search"
                      placeholder=""
                      aria-label="Search" 
                      name="search" >
                      <button class="loupe border-0" type="submit" ><i class="fa fa-search" aria-hidden="true"></i></button>
                     
                    </form>
                       <?php endif ;?>
                </div>
            </nav>
            <div class="row d-flex justify-content-center mb-2 centreNav">
        <div class="col-3 border p-2 seconMenu rounded-left " style="background: linear-gradient(0deg,#000,#262626);"> <a href="#" style="color:white;" class="linkMenu" >Reggaeman</a></div>
        <div class="col-3 border p-2 seconMenu " style="background: linear-gradient(0deg,#000,#262626);"><a href="#"style="color:white;" class="linkMenu">Reggaewoman</a></div>
        <div class="col-3 border p-2 seconMenu " style="background: linear-gradient(0deg,#000,#262626);"><a href="#"style="color:white;" class="class="dropdown-item"   data-toggle="modal" data-target="#exampleModalLong4" ">Jeux</a></div>
        <i class="fas fa-shopping-basket border   p-2 rounded-right btn btn-primary" style="background: linear-gradient(0deg,#000,#262626);font-size:1.5em"  data-toggle="modal" data-target="#exampleModal"></i>
    </div>
    

    <!---deuxieme module MOBILE---->

    <div class="row d-flex justify-content-center mb-2 coolnav" id="fluo">
        <div class="col-3  p-2 seconMenu2  border-right rounded-left " style="background: linear-gradient(0deg,#000,#262626);"> <a href="#" style="color:white;" class="linkMenu2" >homme</a></div>
        <div class="col-3  p-2 seconMenu2 border-right"><a href="#"style="color:white; " class="linkMenu2">Femme</a></div>
        <div class="col-3  p-2 seconMenu2 border-right"><a href="#"style="color:white;" class="linkMenu2">qui nous sommes</a></div>
        <div class="col-3  p-2 seconMenu2 border-right"><a href="#"style="color:white;" class="linkMenu2">contact</a></div>

    </div>
    <!--- FIN deuxieme module MOBILE---->

   


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

 



<!-- Modal 3  MESSAGE-->
<div class="modal fade" id="exampleModalLong3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">MON PROFIL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      Ipsum exercitation exercitation consequat nulla magna qui et occaecat magna amet pariatur consequat. Aute ex aute officia cillum. Elit ad laborum qui eiusmod minim ea aute deserunt voluptate nulla cillum irure aliqua. Sit labore ex magna tempor commodo anim sunt officia consequat ullamco. Cupidatat et commodo reprehenderit quis laboris aliqua. Labore sit mollit incididunt ad ex eu ullamco sit magna.
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal 3  FIN MESSAGE-->


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
      <div class="col-12 btn btn-success #00C851"><a href="slot.php" style="color:white;">jeux1</a></div>
      <div class="col-12 btn btn-warning #FF8800 dark"><a  href="slot.php"style="color:white;">jeux2</a></div>
      <div class="col-12 btn btn-info #33b5e5"><a  href="slot.php"style="color:white;">jeux3</a></div>


      
      </div>
      
    </div>
  </div>
</div>
<!-- Modal 4  FIN MESSAGE-->





