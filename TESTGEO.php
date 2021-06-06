<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
    src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
    

   



    <title>geoencore</title>
</head>
<body>

    <div id="infoposition"></div>

    <form action="position.php" method="post">
<label for="lat">latitude
        <input type="text" name="lat" id="lat" value=""/>
        </label> 
        <input type="text" name="lng" id="lng"value="" />
        <input type="submit" value="envoyer">


    </form>
    <script>
        function maPosition(position) {
          var infopos = "Position déterminée :\n";
          infopos += "Latitude : "+position.coords.latitude +"\n";
          infopos += "Longitude: "+position.coords.longitude+"\n";
          infopos += "Altitude : "+position.coords.altitude +"\n";
          document.getElementById("infoposition").innerHTML = infopos;
        }
        
        if(navigator.geolocation)
          navigator.geolocation.getCurrentPosition(maPosition);


          function erreurPosition(error) {
    var info = "Erreur lors de la géolocalisation : ";
    switch(error.code) {
    case error.TIMEOUT:
    	info += "Timeout !";
    break;
    case error.PERMISSION_DENIED:
	info += "Vous n’avez pas donné la permission";
    break;
    case error.POSITION_UNAVAILABLE:
    	info += "La position n’a pu être déterminée";
    break;
    case error.UNKNOWN_ERROR:
    	info += "Erreur inconnue";
    break;
    }
document.getElementById("infoposition").innerHTML = info;}
$.post("https://reggaerencontre.com/position.php",{lat:position.coords.latitude,lng:position.coords.longitude});

$("#lat").val(position.coords.latitude); 
$("#lng").val(position.coords.longitude);




        </script>

    
    
</body>
</html>