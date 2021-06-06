<?php
require_once __DIR__ . '/config/bootstrap.php';
//include __DIR__ . '/config/header.php';
//https://www.codeseek.co/RobVermeer/tinder-swipe-cards-japZpY
$req = $pdo->prepare("SELECT * FROM membre ");
$req->execute();

?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.css">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.js"></script>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>

<link rel="stylesheet" href="swp.css">
</head>
<body>

  <center>
  <div id="test"><h1></h1></div>
  </center>
  
<div id="container">
  <?php while($membre= $req->fetch(PDO::FETCH_ASSOC) ) : ?>
  
  
    <div class="buddy" style="display: block;">
    <h2><?php echo ucfirst( $membre['pseudo']) ;?></h2>
   
    
    <div class="avatar"  style="display: block; background-image: url(assets/img/<?= $membre['photo'] ?>"alt="..")">
    <h3><?php echo $membre['town'];?></h3>
  </div>
</div>
    
    <?php endwhile;?>
  </div>
  
  <script>
  

function like(){  
 <?php $req = $pdo->prepare("SELECT * FROM membre ");
$req->execute();?>

$.ajax({
    url:'like.php?id=<?php echo $membre['id_membre'];?>',
    success:function(data)
    {

        

    }

});
    

  };

function aime(){
  $.ajax({
    url:'amisSwipe.php',
    success:function(data)
    {

        

    }


});

}

    
var ajouter = document.getElementById('test').innerHTML="OUIII!";

$(document).ready(function(){

  $(".buddy").on("swiperight",function(){
    $(this).addClass('rotate-left').delay(700).fadeOut(1);
    console.log("right");
    document.getElementById('test').style.backgroundColor="lime";
    document.getElementById('test').innerHTML="OUIII!";

    
   

    if (ajouter) {

  
      aime();
      
    }

 


    
    $('.buddy').find('.status').remove();

    $(this).append('<div class="status like"><i class="fa fa-heart"></i></div>');      
    if ( $(this).is(':last-child') ) {
      $('.buddy:nth-child(1)').removeClass ('rotate-left rotate-right').fadeIn(300);
     } else {
        $(this).next().removeClass('rotate-left rotate-right').fadeIn(400);
     }
     like();
  });  

 $(".buddy").on("swipeleft",function(){
  $(this).addClass('rotate-right').delay(700).fadeOut(1);
  console.log("left");
  document.getElementById('test').style.backgroundColor="pink";
  document.getElementById('test').innerHTML="NOOON!";

  $('.buddy').find('.status').remove();
  $(this).append('<div class="status dislike"><i class="fa fa-remove"></i></div>');

  if ( $(this).is(':last-child') ) {
   $('.buddy:nth-child(1)').removeClass ('rotate-left rotate-right').fadeIn(300);

   } else {
      $(this).next().removeClass('rotate-left rotate-right').fadeIn(400);
  } 
    like();
});

});
  
  
  </script>
  
  
</body>
</html>