<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <title>MAPGEO-03-02</title>
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
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
   height: 50vh;
   width: 55vw;
   margin:auto;
}

   </style>
</head>
<body>



   <p class="nav"><a href="index.html">&equiv;</a></p>

   <h1>bonusmapgeo </h1>
   <p class="text-right">
    
   
<a href="accueil.php">retour</a>
   </p>

   <div id="mapid"></div>


   <script src="libs/leaflet.js"></script>
   <script src="js/appLeaflet.js"></script>
   <script src="data/data.js"></script>



   <script>

  




   let centre = {lat: 48.9064, lng: 2.2483};
   
   let map = L.map('mapid').setView( centre , 16);

   
   
  
   
   L.tileLayer(layerOSM.url, { attribution:
     layerOSM.attribution }).addTo(map);

   document.addEventListener("DOMContentLoaded", function(){

       chargerDonnees();
      
       
   });

   async  function chargerDonnees(){


           
    let iconGreen = L.icon({// un objet

iconUrl:'assets/img/<?= getMembre()['photo'] ?>"',
iconSize:[80,80],
iconAnchor:[12,41],
popupAnchor:[0,-11]
});


    let url =  ' https://reggaerencontre.com/testnominatim.php';
       let resp = await fetch(url);
       let datas = await resp.json();
       console.log(datas);
       let groupMarkers  = [];
       for (let data of datas) {

       let m = L.marker(data,{
               icon: markColor('orange')
              });
              groupMarkers.push(m);
           
       }
       let groupe = L.featureGroup(groupMarkers).addTo(map);
       map.fitBounds(groupe.getBounds());
     }


    
  


   
   
      





   </script>

</body>
</html>