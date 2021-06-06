<?php 
 require_once('configuration.php');
 //ont creer un utilisateur token

 $token = $_POST['stripeToken'];
 //creer un client
 $customer = \Stripe\Customer::create(array(

    'source' => $token




 ));
 //crer le plan association du plan a changer
 $reggae2 = \Stripe\Subscription::create(array(

  'customer' => $customer->id,
  'plan' =>'plan_G9dgLyjOq36Cog'//a changer
  



 ));









?>
<style>
   body
   {
      background: black;
      color:white;
   }

</style>
<script>
setTimeout(function() {
  window.location = "accueil.php";
},5000); // Nb de millisecondes de délai


</script>

<div class="container-fluid ">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
        <h3 style="font-size:2em;">Votre payement à été accepter</h3>
        <p>

        Reggae_rencontre vous remerci! 
        Vous allez etre redirigé dans quelques secondes.. 
        
        
        
        </p>


        
        </div>
    </div>
</div>