<?php
require_once __DIR__ . '/config/bootstrap.php';




include __DIR__ . '/config/header.php';
?>

<style>




</style>


<h1>NOS FORFAITS</h1>

<br><br>
<div class="container">

      <?php
      $req = $pdo->prepare('SELECT * FROM articles');
      $req->execute();
      while ($data = $req->fetch(PDO::FETCH_OBJ)):?>

      <h3><?php echo $data->nom;?> &nbsp<span><strong><?php echo $data->prix;?> €</strong></span></h3>
			
      <form action="paiement.php" method="post">
      	<input type="hidden" name="amount" value="<?php echo $data->prix;?>">
      	<input type="hidden" name="id_articles" value="<?php echo $data->id;?>">
		<input type="hidden" name="desc" value="<?php echo $data->description;?>">

		<input type="submit" class="btn" value="Acheter">
      </form>

  	<?php endwhile;?>

    </div> <!-- /container -->