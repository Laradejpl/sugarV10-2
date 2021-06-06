<?php
require_once __DIR__ . '/config/bootstrap.php';
$mssgAlert ='';
//if (getMembre() != null ) {
  //header('Location: accueil.php');//si tu n'est pas connecter ont vas a index.php
//}
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
//if (isset($_GET['logout'])) {
  
  //unset($_SESSION['membre']);
  //$poster ='vous avez ete deconnecter';
  //$userconnecter ='';

//}







include __DIR__ . '/config/startingPage.php';
?>
<script data-ad-client="ca-pub-4364480609190271" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<script>

  // Set the date we're counting down to
var countDownDate = new Date("feb 28, 2020 23:31:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "J " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Notre promo à expirer.";
    document.getElementById("timerPromo").style.display ="none";


  }
}, 1000);






 window.fbAsyncInit = function() {
                FB.init({
                appId: '2738799849570646',
                status: true,
                cookie: true,
                xfbml: true
            });
        };

        // Load the SDK asynchronously
        (function(d){
        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id; js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);
        }(document));

        function login() {
            FB.login(function(response) {

            // handle the response
            console.log("Response goes here!");
            document.getElementById('responseFB').style.display ="block";
            setTimeout(function(){
	document.getElementById("responseFB").style.display = "none";}
, 3000);

    document.getElementById('responseFB').textContent="vous etes connectez sur votre compte Facebook";

            }, {scope: 'read_stream,publish_stream,publish_actions,read_friendlists'});            
        }

        function logout() {
            FB.logout(function(response) {
              // user is now logged out
              document.getElementById('responseFB').style.display ="block";
            setTimeout(function(){
	document.getElementById("responseFB").style.display = "none";}
, 3000);

              document.getElementById('responseFB').textContent="vous etes déconnectez de compte Facebook"

            });
        }

        var status = FB.getLoginStatus();

        console.log(status);
  






</script>


<style>


@media all and (max-width: 480px)
{
   
    
  b {
      display: none;

  }
  .imageU
  {
    height:100px;
    width:100%;


  }
}

    body
{
	

 
  
  
  font-family: sans-serif;
  
  
}


#loginBox
{
  
 
  background: rgba(0,0,0,.7);

  
}
.tima
{
  background: rgba(0,0,0,.7);
  color:white;
  border-radius:20px;

}

</style>



<h2 class="badge-dark mb-4" style="text-align:center;font-family: 'Orbitron', sans-serif;" style="color: rgb(255, 0, 191);font-family: 'Orbitron', sans-serif;">Bienvenue sur ReggaeRencontre</h2> <span><?= $mssgAlert  ?></span>
<br><br>

   <div style="z-index:1">
   <img src="assets/img/reggaerencontre.png" alt="reggae" style="width:100%;">
   </div>
   <div style="position:absolute;top:360px; width:100%; height:400px; z-index:2;font-size:200%">
      <center><b>Un espace enfin pour les fans de Reggae  </b></center>
    </div> 





<div  class="badge-secondary p-2"   id="responseFB" style="display:none;"> </div>
<!-- Display the countdown timer in an element -->
<div class="container" id="timerPromo">
  <div class="row tima">
    <div class="col-12">

    <p class="rounded p-2 tima" >  <h3 >L' inscription est gratuite pendant:</h3>
</p>
<p id="demo" style="font-size:30px;"></p>
    
    </div>
  </div>
</div>

<br><br>

<!--------bando----->
<div class="container-fluid badge-dark rounded mb-4">
    <div class="row d-flex justify-content-around ">
    
      <div class="col-6  col-md-2  ml-3 mt-3">
        
      <img class="card-img-top img- fluid imageU" src="assets/img/rastacouple.jpg"alt=".." style="width:100%; height:150px;border-radius:50%;border:3px solid white;" >
      <h4>vraiment cool se site.</h4>
      <p>j'ai trouvé ce site par hasard y des filles sympas...</p>
      </div>
      <div class="col-6  col-md-2  ml-3 mt-3">
      <img class="card-img-top img- fluid imageU" src="assets/img/rastacouple1.jpg"alt=".." style="width:100%; height:150px;border-radius:50%;border:3px solid white;" >
      <h4>yess ils l'ont fait!</h4>
      <p>enfin un site sur notre musique préferée le Reggae...</p>
      </div>
      <div class="col-6  col-md-2  ml-3  mt-3">
      <img class="card-img-top img- fluid imageU" src="assets/img/rastcouple2.jpg"alt=".." style="width:100%; height:150px;border-radius:50%;border:3px solid white;" >
      <h4>j'ai trouvé des amis.</h4>
      <p>Du reggae des amis et plus j'avoue j'adere...</p>
      </div>
      
        
    </div>
</div>
<!--------bando----->
<div class="container-fluid mt-4" id="boxLogin">
  <div class="row  d-flex justify-content-center">




 
    <div class="border-primary   col-10 col-md-6 p-4 mt-4  rounded" id="loginBox">
      
      <form action="index.php" method="post">
          <img src="assets/img/user.png" class="user "> <hr>
          <h2>Connectez-vous</h2>
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
        <div class="row d-flex justify-content-center">
        <button  class="btn btn-primary" onclick="javascript:login();">Login Facebook</button>
            <button class="btn btn-danger "  onclick="javascript:logout();">Logout from Facebook</button>
        </div>
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

<div class="container-fluid">
    <div class="row">
        <div class="col-12 badge-danger p-2" id="modalPolilik">

            <i class="fa fa-times-circle" aria-hidden="true" onclick="closePolitik()"></i>
            <p class="badge-dark">le ReggaeRencontre à  le respect la vie privée de ces clients
                ,leur données ,leur images ne seront pas utilisées à  des fins autres
                qu'interne;Veuillez clicker ici pour
                <a href="politique_confidentialite.php">
                    les mentions legal
                </a>et
                <a href="politique_confidentialite.php">
                    la politique de ReggaeRencontre</a>
            </p>
        </div>
    </div>
</div>


</body>
</html>


