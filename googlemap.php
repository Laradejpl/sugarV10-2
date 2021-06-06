
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

    <title>googlemap</title>
</head>
<body>

    <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj4NRwq8dycEADHUkF7n6i24cb2I0tBVU&callback=initMap">
</script>
    <h1>my google map</h1>
    <div id="map" style="height:500px;"></div>
    <button id="charge">charge</button>
  <script>

     
         $(document).ready(function(){

             
       
              var lat,lng;
              navigator.geolocation.getCurrentPosition(function(pos){
                  lat = pos.coords.latitude; 
                  lng = pos.coords.longitude; 
              });
              $('charge').click(function(){
                var map = new google.maps.Map(document.getElementById('map'),options);

                var options = {


zoom:8,
center:centreCarte
}

var map = new google.maps.Map(document.getElementById('map'),options);


          alert(lat);
              })
        })

          var map = new google.maps.Map(document.getElementById('map'),options);
          //marker ajout
          var marker = new google.maps.Marker({

              position:{lat,lng},
              map:map
          });

          
     
  
  
  
  
  </script>  

</body>
</html>