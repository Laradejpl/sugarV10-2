<?php
require_once __DIR__ . '/config/bootstrap.php';







include __DIR__ . '/config/header.php';
?>

<script>
// Set the date we're counting down to
var countDownDate = new Date("nov 2, 2019 23:31:25").getTime();

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
</script>


<style>
    body
{
	
	background: url(assets/img/bg.jpg);
  background-size: cover;
  
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



<h1 class="badge-dark mb-4" style="text-align:center;" style="color: rgb(255, 0, 191);">Bienvenue sur SUGAR SUGAR</h1> <span></span>
<br><br>

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

<div class="container-fluid ">
  <div class="row  d-flex justify-content-center">




 
    <div class="border-primary   col-10 col-md-6 p-4 mt-4  rounded" id="loginBox">
      
      <form action="index.php" method="post">
          <img src="assets/img/user.png" class="user "> <hr>
          <h2>Log In Here</h2>
            <div class="form-group">
                <label for="email" style="color:white;">Email</label>
                <input type="email" placeholder="email" name="email" id="email" required  class="form-control">
            </div>

            <div class="form-group">
                <label for="mdp" style="color:white;">Mot de passe</label>
                <input type="password" name="password" class="form-control" placeholder="" style="text-align:center;" id="mdp" required>
            </div>

            <input type="submit" id="validation" class="btn btn-secondary" value="Log in" style="color:black; font-weight:bolder;">
            <input type="submit" id="fbbutton" class="btn btn-primary" value="Facebook" style="color:black; font-weight:bolder;">

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

<script>//facebook login
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '2540651372887196',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v3.3'
    });
  };
</script>
<script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
</body>
</html>


