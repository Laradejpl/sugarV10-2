<?php
require_once __DIR__ . '/config/bootstrap.php';

$flashmessage ="";
   if (!empty($_GET['id'])) {
       
    $id = $_GET['id'];
   }


   if (!empty($_POST)) {
       
    $id = $_POST['id'];

    $req = $pdo->prepare("DELETE FROM loading WHERE id_message = ? ");
    $req->execute(array($id)); 
    $flashmessage =" Votre message a été supprimer !";
   }



 
include __DIR__ . '/config/headerAdmin.php';

?>
<style>




body{

    background-color: rgba(100, 100, 100, 0.2);
}

</style>
<h1 style="text-align:center;">Suprimer un message</h1>

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

