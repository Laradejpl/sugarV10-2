<?php
require_once __DIR__ . '/config/bootstrap.php';


if (!empty($_GET['id'])) {
    

  $id = $_GET['id'];

}



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
?>

<!DOCTYPE html>
<html lang="en">

<head>
<script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/css/mdb.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style2.css">
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
    <link rel="stylesheet" href="CSS/style.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/medias.css">
    <link href="CSS/animate/animate.min.css" rel="stylesheet">
    
</head>

<style>

html,
body,
header,
#intro {
    height: 100%;
}

#intro {
    background: url("assets/img/tifa.jpg")no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}



</style>
<!--Main Navigation-->
<body >
<script>
  function addheart(){
    document.querySelector(".coeur fa fa-heart").style.color="red"; 
    console.log("ca marche");
     
    
  }


</script>
  

<header>

<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color">

  <div class="container">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">Reggae Rencontre</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
      aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

      <!-- Links -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="accueil.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>

        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>

      </ul>
      <!-- Links -->

      <form class="form-inline">
        <div class="md-form my-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        </div>
      </form>
    </div>
    <!-- Collapsible content -->

  </div>
  <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item avatar">
        <a class="nav-link p-0" href="#">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" class="rounded-circle z-depth-0"
            alt="avatar image" height="35">
        </a>
      </li>
    </ul>

</nav>
<!--/.Navbar-->
<!--Mask-->
<div id="intro" class="view">

  <div class="mask">

  </div>

</div>
<!--/.Mask-->

</header>
<!--Main Navigation-->
<div class="container-fluid bg-dark">
  <div class="row">
    <div class="col-12 ">

    <h1 class="intro-title mb-4" style="font-size: 4em;color:white;">LA FEMME ROYAL OU REBEL</h1>


    </div>
  </div>
</div>>

<!--Main layout-->
<main>
  

<section class="container-fluid">

<div class="row d-flex justify-content-center">
  <div class="col-12 col-md-6">




  <div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/bellegal2.png" class="d-block w-100" alt="rool">
        <div class=" container-fluid carousel-caption d-none d-md-block p-4 rounded-pill " style="background-color:rgba(245, 245, 245, 0.4);">
        <i class="fa fa-heart" aria-hidden="true" style="font-size: 8em; float:left;"></i>
        
          <h3>First slide label</h3>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/bellegal2.png" class="d-block w-100" alt="fool">
        
        <div class=" container-fluid carousel-caption d-none d-md-block p-4 rounded-pill " style="background-color:rgba(245, 245, 245, 0.4);">

          
        <i class="fa fa-heart" aria-hidden="true" style="font-size: 8em;float:left;"></i>

          <h3>Second slide label</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/bellegal3.jpg" class="d-block w-100" alt="tool">
        <div class=" container-fluid carousel-caption d-none d-md-block p-4 rounded-pill " style="background-color:rgba(245, 245, 245, 0.4);">

        <i class="fa fa-heart" aria-hidden="true" style="font-size: 8em;float:left;"></i>

          <h3>Third slide label</h3>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/bellegal4.jpg" class="d-block w-100" alt="Yool">
        <div class=" container-fluid carousel-caption d-none d-md-block p-4 rounded-pill " style="background-color:rgba(245, 245, 245, 0.4);">

        <i class=" coeur fa fa-heart" aria-hidden="true" style="font-size: 8em;float:left;" onclick="addheart();" ></i>


          <h3>girl</h3>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/bellegal5.jpeg" class="d-block w-100" alt="vool">
        <div class=" container-fluid carousel-caption d-none d-md-block p-4 rounded-pill " style="background-color:rgba(245, 245, 245, 0.4);">

        <i class=" coeur fa fa-heart" aria-hidden="true" style="font-size: 8em;float:left;" onclick="addheart();" ></i>

          <h3>Third slide label</h3>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</div>
</div>



</section>

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



</main>
<!--Main layout-->

<!--Footer-->
<footer>

</footer>
<!--Footer-->
</body>
</html>