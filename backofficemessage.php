<?php
require_once __DIR__ . '/config/bootstrap.php';







$page_title = 'Backoffice'; # Pour la balise <title>



include __DIR__ . '/config/headerAdmin.php';
?>
<style>

@media screen and (min-width: 500px) and (max-width: 3040px) {
    .bacNav
  {
    display:none;
  }

}

  


</style>
<!-----grand conteneneur--->
<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <h1 class="d-flex justify-content-center badge-info rounded-pill">Les messages</h1>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row d-flex justify-content-end mb-2">
        <div class="col-11 col-md-2   btn btn-primary border rounded-pill  bacNav"> <a href="backOffice.php"style="color:white;">Les membres</a></div>
        <div class="col-11 col-md-2   btn btn-primary border rounded-pill  bacNav"> <a href="backofficemessage.php"style="color:white;"> Les messages</a></div>
        <div class="col-11 col-md-2   btn btn-primary border rounded-pill  bacNav"> <a href="stats.php"style="color:white;"> Les stats</a></div>
        <div class="col-11 col-md-2   btn btn-primary border rounded-pill  bacNav"> <a href="stats.php"style="color:white;"> Courrier</a></div>
        <div class="col-11 col-md-2   btn btn-primary border rounded-pill  bacNav"> <a href="stats.php"style="color:white;">panier</a></div>

        <div class="col-11 col-md-2   btn btn-info border rounded-pill"> <a href="accueil.php"style="color:white;"> Quitter le back-office</a></div>

    </div>
</div>
 


<div class="container-fluid">
    <div class="row mt-4 ">
        <div class="offset-md-2 col-10 ">
       <h3 class="badge-dark rounded mb-4" style="text-align:center;" > Les messages</h3>
       <div class="row">
           <div class="col-6 col-md-1 border p-2 badge-dark">photo</div>
    <div class="col-6 col-md-2 border p-2 badge-dark">pseudo</div>
    <div class="col-6 col-md-2 border p-2 badge-dark">message</div>
    
    <div class="col-6 col-md-1 border p-1 badge-dark">date de publication</div>
</div>
       <?php

$req =$pdo->query('SELECT membre.photo,membre.pseudo,loading.message,loading.date_pub ,loading.id_message from membre,loading WHERE membre.id_membre = loading.membre_id ');
while ($item = $req ->fetch()) {
?>
<div class="row" >
    <div class="col-12 col-md-1 border p-2"> <img src="assets/img/<?php echo $item['photo']; ?>" alt="..." style="width:100%;">  </div>
    <div class="col-12 col-md-2 border p-2"><?php echo $item['pseudo']; ?></div>
    <div style="overflow:scroll;" class="col-12 col-md-2 border p-2"><?php echo $item['message']; ?></div>
    <div class="col-12 col-md-1 border p-2"><?php echo $item['date_pub']; ?></div>
    
   
  
    <div class="row">
        <div class="col-12 col-md-4" >

        <a  class="btn btn-default border" href="membre.php?id=<?php echo $item['id_membre']; ?>"style="border-radius:20px;">voir</a>

        </div>
        <div class="col-12 col-md-4" >
        <a  class="btn btn-danger border" href="effacerMessage.php?id=<?php echo $item['id_message']; ?>" style="border-radius:20px;">effacer</a>
        </div>
        <div class="col-12 col-md-4">
        <a  class="btn btn-primary border" href=""style="border-radius:20px;">modifier</a>
        </div>
    </div>
</div>
<br> 


<?php

}
    ?>
      
           

        </div>
    </div>
</div>

