<?php
require_once __DIR__ . '/config/bootstrap.php';


// ont recuper la ville et l'adresse du connecter
$req = $pdo->prepare("SELECT * FROM membre WHERE id_membre = :id_membre ");
$req->bindParam(':id_membre',getMembre()['id_membre'], PDO::PARAM_INT);
$req->execute();
$dnes = $req->fetch(PDO::FETCH_OBJ);

var_dump($dnes->pseudo,$dnes->town);//ville du connecter
//ont recupere la les coordonnées lat lng de la ville du connecter
$reqville = $pdo->prepare("SELECT * FROM ville WHERE ville_nom = '$dnes->town' ");
$reqville ->execute();

//mise en variable des coordonnées du connecter
$donneDesVilles = $reqville->fetch(PDO::FETCH_OBJ);
$dlatstring = $donneDesVilles->ville_latitude_deg;//latitude
$dlongtstring = $donneDesVilles->ville_longitude_deg;//longitude

$converlat = floatval($dlatstring);//convertion des string en float.

$converlong = floatval($dlongtstring);
 var_dump($converlat);
 var_dump($converlong);


 









?>



<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <title>MAPGEO-03-02</title>
   <link rel="stylesheet" href="libs/leaflet.css" />
   <link rel="stylesheet" href="CSS/style.css">
   <style>

   p>button{

 background: red;

     float: right;
     font-size: 3em;

   }
   .btn:disabled{

     font-size: 3em;
      background:grey;
   }
input {


  width:300px;
  height:40px;
  border:4px solid lime;

}
#mapid {
   border: 5px solid white;
   /* IMPORTANT */
   height: 30vh;
   width: 55vw;
   margin:auto;
}
#coordones,#coordsLng
{

  visibility: hidden;
}
.pic{


}
   </style>
</head>
<body>



   <p class="nav"><a href="index.html">&equiv;</a></p>

   <h1>Adresse en lat lng </h1>
  
   <p class="text-right">
     <input type="text" class="geo" id="adresse" value="" >
    <button class="btn" id="geocode"> chercher</button>

    <div id="coordones" ><?php echo  $converlat;?></div>
    <div id="coordsLng" ><?php echo  $converlong;?></div>

<a href="accueil.php">retour</a>



   </p>

   <div id="mapid"></div>
   <div class="container-fluid">
     <div class="row ">
       
<?php   
$req7 = $pdo->prepare("SELECT * FROM membre WHERE town = '$dnes->town' ");
//$req7->bindParam(':town',$dnes->town, PDO::PARAM_INT);
$req7->execute();

while($donnes = $req7->fetch(PDO::FETCH_OBJ))
{
  
  ?>
<div class="col-1   pic "><img src="assets/img/<?php echo $donnes->photo; ?>" alt="..." style="width:90px;height:90px;border-radius:50px;float:left;"><h6 style="color:white;"></h6></div>

</div>

<?php

}




?>


       
     </div>
   </div>


   <script src="libs/leaflet.js"></script>
   <script src="js/appLeaflet.js"></script>
   <script src="data/data.js"></script>

   <script>

  



     let  latVille = document.getElementById('coordones').textContent;
     let  longVille = document.getElementById('coordsLng').textContent;
     console.log(latVille,longVille);
     let lat = latVille ;
     let lng = longVille;
     let mkr1 = {lat:latVille,lng:longVille};//correspond a pithiviers
   let centre = {lat: 48.9064, lng: 2.2483};
   
   let map = L.map('mapid').setView( centre , 14);
   
  
   
   L.tileLayer(layerOSM.url, { attribution: layerOSM.attribution }).addTo(map);
   map.locate({setView:true , maxZoom:18})
      let iconGreen = L.icon({// un objet

iconUrl:'assets/img/<?= getMembre()['photo'] ?>"',
iconSize:[80,80],
iconAnchor:[12,41],
popupAnchor:[0,-11]
});



    L.marker(mkr1,{
  icon:iconGreen,
  popupAnchor:iconGreen


}).addTo(map).bindPopup("cool").openPopup();



   //let  geocodeBtn = document.getElementById('geocode');
   

     //let adresse = document.getElementById('adresse').value;

     
     
     //console.log(adresse);

    


   
   
      





   </script>

</body>
</html>


