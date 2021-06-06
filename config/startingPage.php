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

            <link href="https://fonts.googleapis.com/css?family=Anton|Orbitron&display=swap" rel="stylesheet">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
            <script src="js/javascript.js"></script>
            <script src="js/jquery-1.5.2.js"></script>
            <link rel="stylesheet" href="main.css" type="text/css" />
        <script type="text/javascript" src="Winwheel.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    
       
        <link rel="stylesheet" href="CSS/style.css">
       
        <title>accueil</title>


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
                     
                       <?php endif ;?>
                </div>
            </nav>
      
    


   


   

 








