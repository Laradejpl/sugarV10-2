<?php
require_once __DIR__ . '/config/bootstrap.php';
//include __DIR__ . '/config/header.php';
//https://www.codeseek.co/RobVermeer/tinder-swipe-cards-japZpY
$req = $pdo->prepare("SELECT * FROM membre ");
$req->execute();

?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Tinder swipe cards</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="tinda.css">

  
</head>

<body>
  <div id="message" style="color:white;">cool</div>

  <div class="tinder">
     <div class="tinder--status">
       <i class="fa fa-remove"></i>
      <i class="fa fa-heart"></i>
  </div>
  <?php while($membre= $req->fetch(PDO::FETCH_ASSOC) ) : ?>
  <div class="tinder--cards">
    <div class="tinder--card">
      <img src="assets/img/<?= $membre['photo'] ?>"alt="..">
      <h3><?php echo $membre['pseudo'] ?></h3>
      <p>This is a demo for Tinder like swipe cards</p>
    </div>
  <?php endwhile;?>
    <!---<div class="tinder--card">
      <img src="https://placeimg.com/600/300/animals">
      <h3>Demo card 2</h3>
      <p>This is a demo for Tinder like swipe cards</p>
    </div>
    <div class="tinder--card">
      <img src="https://placeimg.com/600/300/nature">
      <h3>Demo card 3</h3>
      <p>This is a demo for Tinder like swipe cards</p>
    </div>
    <div class="tinder--card">
      <img src="https://placeimg.com/600/300/tech">
      <h3>Demo card 4</h3>
      <p>This is a demo for Tinder like swipe cards</p>
    </div>
    <div class="tinder--card">
      <img src="https://placeimg.com/600/300/arch">
      <h3>Demo card 5</h3>
      <p>This is a demo for Tinder like swipe cards</p>
    </div>
  </div>------->
<br>
<br>
<br>
<br>
  <div class="tinder--buttons">
    <button id="nope"><i class="fa fa-remove"></i></button>
    <button id="love" onclick="amour()"><i class="fa fa-heart"></i></button>
  </div>
</div>
  <script src='https://hammerjs.github.io/dist/hammer.min.js'></script>

  

    <script  src="index.js"></script>




</body>

</html>