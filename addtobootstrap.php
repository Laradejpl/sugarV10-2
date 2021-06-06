<?php
require_once __DIR__ . '/config/bootstrap.php';




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
   <style>
    
    * {
    margin: 0;
    padding: 0;
}
body {
    background-color: #000000;
    font: normal 13px/1.5;
    font-family: 'Roboto Condensed', sans-serif;
    color: #333;
}
.wrapper {
    width: 1205px;
    margin: 20px auto;
    padding: 20px;
}
h1 {
    display: inline-block;
    background-color: #fff;
    color: #ef4478;
    font-size: 16px;
    font-weight: normal;
    text-transform: uppercase;
    padding: 4px 20px;
    float: left;
    border-radius: 50px;
}
img
{

    width:100%;
}
        
.clear {
    clear: both;
}
.items {
    display: block;
    margin: 20px 0;
}
.item {
    background-color: #fff;
    float: left;
    margin: 0 10px 10px 0;
    width: 205px;
   
    padding: 10px;
     
}
.item img {
    display: block;
    margin: auto;
}
h2 {
    font-size: 12px;
    display: block;
    border-bottom: 1px solid #ccc;
    margin: 0 0 10px 0;
    padding: 0 0 5px 0;
}
button {
    border: 1px solid #ef4478;
    padding: 4px 14px;
    background-color: #ef4478;
    color: #fff;
    text-transform: uppercase;
    float: right;
    margin: 5px 0;
    font-weight: 400;
    cursor: pointer;
    font-family: 'Roboto Condensed', sans-serif;
    border-radius: 50px;
    
}
        button:focus{
            outline: none !important;
        }
span {
    float: right;
}
        
        p{
            font-size: 24px;
        }
.shopping-cart {
    display: inline-block;
    background: url(cart.png) no-repeat 0 0;
    width: 24px;
    height: 24px;
    margin: 0 10px 0 0;
}
    
    </style>

   <br>
   <br>
   <br>




   <div class="container-fluid wrapper">

   <span  ><i class="shopping-cart" ></i></span>

   <div class="clear"></div>
    <!-- items -->
    <div class="items">

       <div class="row">

           <div class="item">
           <div class="col-4"><img src="trojan.png" alt="item"style="width:100%;">
           <div class="btn btn-primary add-to-cart"> Add to cart </div>
           </div>
           </div>

           <div class="item">
           <div class="col-4"><img src="psg.png" alt="item"style="width:100%;">
           <div class="btn btn-primary add-to-cart"> Add to cart </div>
        </div> 
        </div>

        
        <div class="item">
           <div class="col-4"><img src="jamaicamod" alt="item"style="width:100%;">
           <div class="btn btn-primary add-to-cart"> Add to cart </div>
        </div>
        </div>
       </div>

   </div>

   <!--/ wrapper -->
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="js/scripts.js">
</script>