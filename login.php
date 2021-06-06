<?php
require_once __DIR__ . '/config/bootstrap.php';
$mssgAlert ='';

if (getMembre() != null ) {
  header('Location: accueil.php');//si tu n'est pas connecter ont vas a index.php
}
//traitement

if (isset($_POST['login'])) {
    // Récupérer l'utilisateur par son pseudo/email
    $req = $pdo->prepare(
      'SELECT *
      FROM membre
      WHERE
          pseudo = :pseudo'
         );
  $req->bindParam(':pseudo', $_POST['pseudo']);
   $req->execute();
  $utilisateur = $req->fetch(PDO::FETCH_ASSOC);

 

    // Si on ne récupère rien ...
    if (!$utilisateur) {


      
     
      // Si le compte n'a pas été confirmé
  }  elseif (!password_verify($_POST['mdp'], $utilisateur['mdp'])) {
      

      // Sinon, connexion
  } else {
      // On ne garde pas le hash du mot de passe en session
      unset($utilisateur['mdp']);
      foreach($utilisateur as $key => $value)
      {
        $_SESSION['membre'][$key] = $value;
      }
                   
      $req5 = $pdo->prepare('UPDATE membre SET connexion = 1 WHERE id_membre = :id_membre');
      $req5->bindParam(':id_membre', getMembre()['id_membre'], PDO::PARAM_INT);
      $req5->execute();
      $req5->closeCursor();
      
      $mssgcon = $utilisateur['pseudo']; 
      $poster ='Annonces';
      header("Location: accueil.php");
     
  }
}
if (isset($_GET['logout'])) {
  $req5 = $pdo->prepare('UPDATE membre SET connexion = 0 WHERE id_membre = :id_membre');
  $req5->bindParam(':id_membre', getMembre()['id_membre'], PDO::PARAM_INT);
  $req5->execute();
  $req5->closeCursor();
  unset($_SESSION['membre']);
  $poster ='vous avez ete deconnecter';
  $userconnecter ='';

}







include __DIR__ . '/config/startingPage.php';
?>




<style>
    body
{
	
	background: url(assets/img/reggaerencontre.png);
  background-size: cover;
  
  font-family: sans-serif;
  
  
}

#loginBox
{
  
 
  background: rgba(0,0,0,.7);

  
}


</style>






<h2 class="badge-dark mb-4 mt-4" style="text-align:center;font-family: 'Orbitron', sans-serif;" style="color: rgb(255, 0, 191);">Bienvenue ReggaeRencontre</h2> <span><?= $mssgAlert  ?></span>
<br><br>

<div class="container-fluid ">
  <div class="row  d-flex justify-content-center">




 
    <div class="border-primary   col-10 col-md-6 p-4 mt-4  rounded" id="loginBox">
      
      <form action="index.php" method="post">
          <img src="assets/img/user.png" class="user "> <hr>
          <h2>Log In Here</h2>
            <div class="form-group">
                <label for="pseudo" style="color:white;">Pseudo</label>
                <input type="text" name="pseudo" class="form-control" value="" >
            </div>

            <div class="form-group">
                <label for="mdp" style="color:white;">Mot de passe</label>
                <input type="password" name="mdp" class="form-control" placeholder="" style="text-align:center;">
            </div>

            <input type="submit" name="login" class="btn btn-secondary" value="Connexion" style="color:black; font-weight:bolder;">
        </form>
    </div>

    </div>
    </div>
</div><br>
<hr>
<hr>

<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-md-6">
         

    </div>

    <div class="col-12 col-md-6">

    
    </div>
  </div>
</div>



</body>
</html>


