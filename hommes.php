<?php
require_once __DIR__ . '/config/bootstrap.php';


// ont recuper la ville et l'adresse du connecter
$req = $pdo->prepare("SELECT * FROM membre WHERE id_membre = :id_membre ");
$req->bindParam(':id_membre',getMembre()['id_membre'], PDO::PARAM_INT);
$req->execute();
$dnes = $req->fetch(PDO::FETCH_OBJ);

var_dump($dnes->pseudo,$dnes->town);//ville du connecter
//ont recupere la les coordonnées lat lng de la ville du connecter
$reqville = $pdo->prepare("SELECT * FROM france WHERE ville = '$dnes->town' ");
$reqville ->execute();

//mise en variable des coordonnées du connecter
$donneDesVilles = $reqville->fetch(PDO::FETCH_OBJ);
$dlatstring = $donneDesVilles->lat;//latitude
$dlongtstring = $donneDesVilles->lng;//longitude

$converlat = floatval($dlatstring);//convertion des string en float.

$converlong = floatval($dlongtstring);
 var_dump($converlat);
 var_dump($converlong);


 





$req7 = $pdo->prepare("SELECT * FROM membre WHERE town = '$dnes->town' ");
//$req7->bindParam(':town',$dnes->town, PDO::PARAM_INT);
$req7->execute();

while($donnes = $req7->fetch(PDO::FETCH_OBJ))
{
  
  ?>

<h4 class="lesadresses"><?php echo $donnes->adresse , $donnes->town; ?></h4>


<?php

}



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
   
   L.circleMarker(mkr1,{

    radius:100,
  color:"red",
  FillColor:'#ff0000',
  fillOpacity:0.5,
  weight:4
   }).addTo(map).bindPopup("y du monde");
   //let  geocodeBtn = document.getElementById('geocode');
   

     //let adresse = document.getElementById('adresse').value;

     let mkrgeneric1 = document.querySelector(".lesadresses:nth-child(1)").textContent;
     let mkrgeneric2 = document.querySelector(".lesadresses:nth-child(2)").textContent;
     let mkrgeneric3 = document.querySelector(".lesadresses:nth-child(3)").textContent;
     let mkrgeneric4 = document.querySelector(".lesadresses:nth-child(4)").textContent;

     console.log(mkrgeneric1);
     console.log(mkrgeneric2);
     console.log(mkrgeneric3);
     console.log(mkrgeneric4);
     
     //console.log(adresse);

     geoCode(mkrgeneric2);
  


   
   async function geoCode(mkrgeneric2){

     let url = `https://nominatim.OpenStreetMap.org/search/?format=json&q=${mkrgeneric2} `;
     let resp  = await fetch(url);
     let datas = await resp.json();
     console.log(datas);
     let lat = parseFloat(datas[0].lat).toFixed(4);
      let lng = parseFloat(datas[0].lon).toFixed(4);
      console.log(lat, lng);


      L.marker([lat, lng]).addTo(map).bindPopup("<?php echo  $dnes->adresse .' '.$dnes->town ;?>");
     
      map.flyTo([lat, lng], 16);
     }
      





   </script>

</body>
</html>


