<?php
require_once __DIR__ . '/config/bootstrap.php';







$page_title = 'Backoffice'; # Pour la balise <title>



include __DIR__ . '/config/headerAdmin.php';
?>

<script>
function count_message(){


$.ajax({
    url:'statsCount.php',
    success:function(data)
    {
      

           $('#nombres').show();
          
           $('#nombres').html(data);
           $('#nombres').height(data); 

           if (data < 5) {

                $("#nombres").css("background-color","red");
                
            }else if ((data > 5) && (data < 20) )
            {
                $("#nombres").css("background-color","orange");

            }
            else if (data >20)
            {
                $("#nombres").css("background-color","green");

            }
            
            
            else{

                $("#nombres").css("background-color","green");
            }
       
    }

});


console.log("ca marche");

}


function countFemme(){


$.ajax({
    url:'statsCountFemme.php',
    success:function(data)
    {
      

           $('#nombresFemme').show();
          
           $('#nombresFemme').html(data);
           $('#nombresFemme').height(data); 

            if (data < 5) {

                $("#nombresFemme").css("background-color","red");
                
            }else if ((data > 5) && (data < 20) )
            {
                $("#nombresFemme").css("background-color","orange");

            }
            else if (data >20)
            {
                $("#nombresFemme").css("background-color","green");

            }
            
            
            else{

                $("#nombresFemme").css("background-color","blue");
            }
       
    }

});


console.log("ca marche");

}


function countHomme(){


$.ajax({
    url:'statsCountHomme.php',
    success:function(data)
    {
      

           $('#nombresHomme').show();
          
           $('#nombresHomme').html(data);
           $('#nombresHomme').height(data); 

            if (data < 5) {

                $("#nombresHomme").css("background-color","red");
                
            }else if ((data > 5) && (data < 20) )
            {
                $("#nombresHomme").css("background-color","orange");

            }
            else if (data >20)
            {
                $("#nombresHomme").css("background-color","green");

            }
            
            
            else{

                $("#nombresHomme").css("background-color","blue");
            }
       
    }

});


console.log("ca marche");

}


$(document).ready(function(){

count_message();
countFemme();
countHomme();


})





</script>
<style>

@media screen and (min-width: 500px) and (max-width: 3040px) {
    .bacNav
  {
    display:none;
  }

}

  


</style>
<!-----grand conteneneur--->
<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <h1 class="d-flex justify-content-center rounded-pill badge-info">Les statistiques</h1>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row d-flex justify-content-end mb-2">
        <div class="col-11 col-md-2   btn btn-primary border rounded-pill  bacNav"> <a href="backOffice.php"style="color:white;">Les membres</a></div>
        <div class="col-11 col-md-2   btn btn-primary border rounded-pill  bacNav"> <a href="backofficemessage.php"style="color:white;"> Les messages</a></div>
        <div class="col-11 col-md-2   btn btn-primary border rounded-pill  bacNav"> <a href="stats.php"style="color:white;"> Les stats</a></div>
        <div class="col-11 col-md-2   btn btn-primary border rounded-pill  bacNav"> <a href="stats.php"style="color:white;"> Courrier</a></div>
        <div class="col-11 col-md-2   btn btn-primary border rounded-pill  bacNav"> <a href="stats.php"style="color:white;">panier</a></div>

        <div class="col-11 col-md-2   btn btn-info border rounded-pill"> <a href="accueil.php"style="color:white;"> Quitter le back-office</a></div>

    </div>
</div>

<div class="container">
    <div class="row d-flex justify-content-center mb-2">
<div class="col-8">
    <h2 class="badge-danger rounded  mt-4 mb-4 p-2" style="text-align:center;">des chiffres</h2>
</div>      
    </div>
</div>


<div class="container">
    <div class="row d-flex justify-content-center mb-2">
<div class="col-8">
    <h3 class="badge-default rounded-pill  mt-4 mb-4 p-2" style="text-align:center;"> Les membres</h3>
</div>      
    </div>
</div>

</td></tr>

<div class="container-fluid mb-4">
   <div class="row d-flex justify-content-center mb-2 " style="color:black;text-decoration:underline;">
       <div class="col-8">

       <p >les membres inscrits sur le site :hommes et femmes</p>
       </div>
   </div>
 



<div class="container-fluid mb-2">
    <div class="row d-flex justify-content-end">
    <div  class="col-3 rounded-pill" id="nombres" style="color:white;width:20px;text-align:center;"></div>
            
        
        
    <div  class="col-3 rounded-pill"  id="nombresFemme" style="color:white;width:20px;text-align:center;"></div>
    <div  class="col-3 rounded-pill"  id="nombresHomme" style="color:white;width:20px;text-align:center;"></div>
    </div>
</div>







<div class="container-fluid mb-4">
    <div class="row d-flex justify-content-end   ">
        <div class="col-3  badge-dark ">MEMBRES </div>
            
        
       
        <div class="col-3 badge-dark">FEMMES</div>
        <div class="col-3 badge-dark">HOMMES</div>
    </div>
</div>
<hr width="100%"size ="5" noshade="noshade">
<div class="container">
    <div class="row d-flex justify-content-center mb-2">
<div class="col-8">
    <h3 class="badge-default rounded-pill  mt-4 mb-4 p-2" style="text-align:center;"> Les membres par régions</h3>
</div>      
    </div>
</div>
<div class="container-fluid">
<div class="row  d-flex justify-content-center mt-4">

<div class="col-12 col-md-4 badge-dark p-4" style="font-size:2em;">Région</div>
<div class="col-12 col-md-4 badge-dark p-4" style="font-size:2em;">Nombre de membre</div>
</div>

<?php
require_once("config/bootstrap.php");   
   $req = $pdo->query('SELECT region, COUNT(*) as nombre_de_membre FROM membre GROUP BY region ');
$req->execute();
$donnee =$req->fetch(PDO::FETCH_OBJ);
while ($donnee = $req ->fetch()) {
?>
<div class="row d-flex justify-content-center ">

<div class="col-12 col-md-4 p-2 border" style="color:black;font-size:1.5em"><?php echo $donnee['region']; ?></div>
<div class="col-12 col-md-4 p-2 border" style="color:black;font-size:1,5em"><?php echo $donnee['nombre_de_membre']; ?></div>
</div>


<?php
}
?>
</div>

<hr width="100%"size ="5" noshade="noshade">


<div class="container">
    <div class="row d-flex justify-content-center mb-2">
<div class="col-8">
    <h3 class="badge-default rounded-pill  mt-4 mb-4 p-2" style="text-align:center;"> Les membres par type</h3>
</div>      
    </div>
</div>
<div class="container-fluid">
<div class="row  d-flex justify-content-center mt-4">

<div class="col-12 col-md-4 badge-dark p-4" style="font-size:2em;">Type</div>
<div class="col-12 col-md-4 badge-dark p-4" style="font-size:2em;">Nombre de membre</div>
</div>

<?php
require_once("config/bootstrap.php");   
   $req = $pdo->query('SELECT type_membre, COUNT(*) as nombre_de_membre FROM membre GROUP BY type_membre ');
$req->execute();
$items =$req->fetch(PDO::FETCH_OBJ);
while ($items = $req ->fetch()) {
?>
<div class="row d-flex justify-content-center ">

<div class="col-12 col-md-4 p-2 border" style="color:black;font-size:1.5em"><?php echo $items['type_membre']; ?></div>
<div class="col-12 col-md-4 p-2 border" style="color:black;font-size:1,5em"><?php echo $items['nombre_de_membre']; ?></div>
</div>


<?php
}
?>
</div>
<hr width="100%"size ="5" noshade="noshade">