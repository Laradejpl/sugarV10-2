<?php

require_once("config/bootstrap.php");



$req = $pdo->prepare ('SELECT membre.pseudo,loading.message FROM membre,loading WHERE  membre.id_membre = loading.membre_id AND  lu=0 ORDER BY id_message DESC ');
$req->execute();
while($data =$req->fetch(PDO::FETCH_OBJ)):?>


<div class="message">
<p class="border "><?php  echo 'vous avez un nouveau message de: <hr>';?></p>

 <h4><?php echo $data->pseudo;?></h4>

 <p><?php  echo $data->message; ?></p>



</div>



<?php endwhile;
$req->closeCursor();
?>
