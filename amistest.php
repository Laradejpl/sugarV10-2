<?php
require_once __DIR__ . '/config/bootstrap.php';


if (!empty($_GET['id'])) {
    

  $id = $_GET['id'];

}



include __DIR__ . '/config/header.php';

?>
<?php $requete = $pdo->prepare("SELECT * FROM membre WHERE id_membre = :id_membre ");
$requete->bindParam(':id_membre',$id , PDO::PARAM_INT);
$requete->execute();
$dnes = $requete->fetch(PDO::FETCH_OBJ);?>
<h2><?= $dnes->pseudo ;?></h2>
<img src="assets/img/<?php echo $dnes->photo1 ; ?>" alt="..." >


<?php
//$moi = getMembre()['id_membre'];


$req = $pdo->query("SELECT DISTINCT * FROM amis WHERE id_membre_1 = $id OR  id_amis_ajouter = $id AND friend = 1");

$req->execute();



  //$req = $pdo->query("SELECT membre.id_membre ,membre.photo1,membre.pseudo,amis.id_membre_1,amis.id_amis_ajouter,amis.friend FROM membre ,amis WHERE  amis.id_amis_ajouter =membre.id_membre AND id_membre_1 = $id AND amis.friend = 1 OR id_amis_ajouter = $id");
  //$req->execute();
  
  ?>


<?php  $rt = $pdo->prepare("SELECT amis.id_amis_ajouter,amis.id_membre_1 ,membre.id_membre,membre.photo1,membre.pseudo 
FROM membre,amis 
WHERE membre.id_membre = amis.id_membre_1
AND amis.id_amis_ajouter = $id
AND friend = 1");
$rt->execute();
?>

   <div class="container">
      <div class="row d-flex justify-content-center">
<?php while($mbre = $rt->fetch(PDO::FETCH_OBJ)):?>
           <div class="col-12 col-sm-1">  <a href="membre.php?id=<?php echo $mbre->id_membre?>"><img src="assets/img/<?php echo $mbre->photo1 ; ?>" alt="..." 
               style="width:90px;height:90px;border-radius:50px;float:left;"></a></div>
              <div class="col-12 col-sm-1"><h6><?php echo $mbre->pseudo;?></h6></div>
         
<?php endwhile;?>





  <?php  $ramis = $pdo->prepare("SELECT amis.id_amis_ajouter ,amis.id_membre_1 ,membre.id_membre,membre.photo1,membre.pseudo 
FROM membre,amis 
WHERE membre.id_membre = amis.id_amis_ajouter 
AND  amis.id_membre_1 = $id
AND friend = 1");
$ramis->execute();
?>
<?php while($mbreAjout = $ramis->fetch(PDO::FETCH_OBJ)):?>
  
  
      <div class="col-12 col-sm-1"> <a href="membre.php?id=<?php echo $mbreAjout->id_membre?>"> <img src="assets/img/<?php echo $mbreAjout->photo1 ; ?>" alt="..." 
  style="width:90px;height:90px;border-radius:50px;float:left;"></a></div>
      <div class="col-12 col-sm-1"><h6><?php echo $mbreAjout->pseudo;?></h6></div>
<?php endwhile;?>
    </div>
  </div>















