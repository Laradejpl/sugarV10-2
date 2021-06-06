<?php
require_once __DIR__ . '/config/bootstrap.php';
$flashmessage ="";

   if (!empty($_GET['id'])) {
       
    $id = $_GET['id'];
   }


   if (!empty($_POST)) {
       
    $id = $_POST['id'];

    $req = $pdo->prepare("DELETE FROM membre WHERE id_membre = ? ");
    $req->execute(array($id)); 
    $flashmessage =" Le membre a été supprimer !";
   }



 
include __DIR__ . '/config/headerAdmin.php';

?>
<style>

@media screen and (min-width: 500px) and (max-width: 2040px) {
    .bacNav
  {
    display:none;
  }

}





body{

    background-color: rgba(100, 100, 100, 0.2);
}

</style>
<h1>Suprimer une annonce</h1>



<!-----grand conteneneur--->
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-12">
            <h1 class="d-flex justify-content-center">Administration</h1>
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



<div class="container">
    <div class="row d-flex justify-content-end mt-4">
        <div class="col-6">
            
            <span  class="mess" style="font-size:2em;color:pink; text-shadow: 2px 2px #ff0000;"><?= $flashmessage ?></span>
        </div>
    </div>
</div>
<br>

<div class="container-fluid ">
    <div class="row d-flex justify-content-center ">
        <div class="col-6 border p-4 btn-lg bg-light">

        <form action="" method="post" class="mt-4">
            <p class="alert alert-info"> voulez vous suprimez?</p>

            <div class="form-group form-check">
                <input type="hidden" name="id" value="<?php echo $id;  ?>"/>
               
            </div>

            <input type="submit" name="supprimer" value="Supprimer le post" class="btn btn-danger">
            <a class="btn btn-default border" href="backOffice.php">non</a>
        </form>
                        
                    
                </div>

            </form>
        </div>
    </div>
</div>