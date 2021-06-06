<?php
require_once __DIR__ . '/config/bootstrap.php';

$id = getMembre()['id_membre'];
$req =$pdo->prepare("SELECT * FROM membre  WHERE id_membre= $id");
$req->execute();
$don = $req->fetch(PDO::FETCH_OBJ);


$req =$pdo->query("SELECT * FROM form_profil ");
$req->execute();
$dnns = $req->fetch(PDO::FETCH_OBJ);
$css = $_POST['bgcolor'];

if (isset($_POST['confirm'])) {
    $rtt =$pdo->prepare('INSERT INTO pagepro (bg_color) VALUES(:bg_color)');
    $rtt->bindParam(':bg_color', $_POST['bgcolor']);
    $rtt->execute();
   var_dump($css);
}


include __DIR__ . '/config/header.php';
?>
<style>
    #btnh1white{
              background-color:white;
              color:black
              }
 #btnh1red{   background-color:brown;
              color:white
}  
#btnh1line{
    background-color:lime;
              color:white
} 

#btnbgorange{
    background-color:orange;
color:white;
}
#btnbg{
    background-color:red;
    color:white;
}
#btnbgpink{
    background-color:pink;
    color:white;
}
#headingOne{

    background-color:lime;
}
#headingTwo{

    background-color:red;
}
#headingThree{

background-color:blue;
}

</style>
<div class="container bg-danger">
    <div class="row">
    <div class="col-12  border" style="height:40px;" id="hautmenu"></div>
    </div>
    </div>
<div class="container  border">
    <div class="row">

    <div class="col-2 border" id="leftmenu">


    </div>


        <div class="col-8 border" id="centermenu">

        <h1 class="titl" >Mon profil</h1>
<img src="assets/img/<?php echo $don->photo ; ?>" alt=".." width="100%;">

<!---MESSAGE , NOTIFICATION, LIKE -->
<div class="container">
    <div class="row d-flex justify-content-between">
        <div class="col-4 bg-primary"><img src="" alt="" width="10%;" ></div>
        <div class="col-4 bg-info"><img src="" alt="" width="10%;" ></div>
        <div class="col-4 bg-danger"><img src="" alt="" width="10%;" ></div>
        
        
    </div>
</div>

<!---MESSAGE , NOTIFICATION, LIKE -->


<!---DESCRIPTION-->
<div class="container">
    <div class="row ">
        <div class="col-12 bg-success border rounded" style="height:70px;" ></div>
       
        
        
    </div>
</div>
<!---DESCRIPTION-->


<!--STICKERS--->

<div class="container">
    <div class="row d-flex justify-content-between">
        <div class="col-2 bg-danger"><img src="interface/dance.gif" alt=".." width="100%;" id=""></div>
        <div class="col-2 bg-info"><img src="" alt="" width="10%;" id="pic2"></div>
        <div class="col-2 bg-danger"><img src="" alt="" width="10%;" id="pic3"></div>
        <div class="col-2 bg-info"><img src="" alt="" width="10%;" id="pic4"></div>
        
    </div>
</div>
<!--STICKERS--->








         </div>

   
         <div class="col-2 border" id="rightmenu">



</div>

    </div>
</div>

<div class="container">
    <div class="row">
   
    </div>
</div>


<div class="container-lg ">
	<div class="row">
		<div class="col-lg-8 mx-auto">
			<div class="accordion mt-5" id="accordionExample">
				<div class="card">
					<div class="card-header" id="headingOne">
						<h2 class="clearfix mb-0">
							<a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="material-icons">add</i> Fond d'écran</a>									
						</h2>
					</div>
					<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body">
							<div class="media">
								<div class="media-body">
							<!-----BOUTON CONTROLE INTERFACE BACKGROUND------>
<div class="container">
    <div class="row">
    <div class="col-12 col-sm-2 btn " onclick="changebG()" id="btnbg">bg 1</div>
    <div class="col-12 col-sm-2 btn " onclick="changebGorange()" id="btnbgorange">bg 2</div>
    <div class="col-12 col-sm-2 btn btn-primary" onclick="changebGblue()" id="btnbgblue">bg 3</div>
    <div class="col-12 col-sm-2 btn btn-dark" onclick="changebGblack()" id="btnbgblk">bg 4</div>
    <div class="col-12 col-sm-2 btn " onclick="changebGpink()" id="btnbgpink">reae1</div>
    <div class="col-12 col-sm-2 btn " onclick="changebGpimg()" id="btnbgpimg1">image1</div>
</div>
    </div>
  
<!-----BOUTON CONTROLE INTERFACE BACKGROUND------>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingTwo">
						<h2 class="mb-0">
							<a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="material-icons">add</i> Collapsible Group Item #2</a>
						</h2>
					</div>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						<div class="card-body">
							<div class="media">
								
								<div class="media-body">
							<!-----BOUTON CONTROLE INTERFACE H1------>
                            <div class="container">
    <div class="row">
    <div class="col-12 col-sm-2 btn " onclick="chHred()" id="btnh1red">H1 Color</div>
    <div class="col-12 col-sm-2 btn " onclick="chHlime()" id="btnh1line">H1 Color</div>
    <div class="col-12 col-sm-2 btn " onclick="chHwhite()" id="btnh1white">H1 Color</div>


</div>
    </div>
  
<!-----BOUTON CONTROLE INTERFACE H1------>								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingThree">
						<h2 class="mb-0">
							<a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="material-icons">add</i> Collapsible Group Item #3</a>                     
						</h2>
					</div>
					<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						<div class="card-body">
							<div class="media">
								<img src="/examples/images/media/agent.png" class="mr-3" alt="Home">
								<div class="media-body">
									<h5 class="mt-0">Find a Real Estate Agent</h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Vestibulum id metus ac nisl bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet sagittis. In tincidunt orci sit amet elementum vestibulum.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingFour">
						<h2 class="mb-0">
							<a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><i class="material-icons">add</i> Collapsible Group Item #4</a>                               
						</h2>
					</div>
					<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
						<div class="card-body">
							<div class="media">
								<img src="/examples/images/media/location.png" class="mr-3" alt="Home">
								<div class="media-body">
									<h5 class="mt-0">Get Details of the Locality</h5>
									<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>





<!---FORM---->

<form action="profil.php" method="post">
<input type="hidden" name="bgcolor"  id="inputcolor">
<input type="hidden" name="colorh1"  id="inputh1">

<input type="submit" value="confirmer" name="confirm">
</form>
<!---FORM---->

<script>
    //les couleurs stocker en bdd
    //BACKGROUND
function changebG() {
    document.querySelector('body').style.backgroundColor="red";
    document.getElementById('inputcolor').value="<?php echo $dnns->background_color1;?>";


}
function changebGorange() {
    document.querySelector('body').style="<?php echo $dnns->background_color2;?>";
    document.getElementById('inputcolor').value="<?php echo $dnns->background_color2;?>";

    
}
function changebGblue() {
    document.querySelector('body').style="<?php echo $dnns->background_color3;?>";
    document.getElementById('inputcolor').value="<?php echo $dnns->background_color3;?>";

    
}
function changebGblack() {
    
    document.querySelector('body').style="<?php echo $dnns->background_color4;?>";
    document.getElementById('inputcolor').value="<?php echo $dnns->background_color4;?>";

    
}
function changebGpink() {
    document.querySelector('body').style="<?php echo $dnns->background_color5;?>";
    document.getElementById('inputcolor').value="<?php echo $dnns->background_color5;?>";

}
function changebGpimg() {
    document.querySelector('body').style="<?php echo $dnns->background_color6;?>";
    document.getElementById('inputcolor').value="<?php echo $dnns->background_color6;?>";

    }
//BACKGROUND
function chHred() {
    document.querySelector('h1.titl').style="<?php echo $dnns->color1_h1;?>";
    document.getElementById('colorh1').value="<?php echo $dnns->color1_h1;?>";
}
function chHlime() {
    document.querySelector('h1.titl').style="<?php echo $dnns->color2_h1;?>";
    document.getElementById('colorh1').value="<?php echo $dnns->color2_h1;?>";
       }

       function chHwhite() {
    document.querySelector('h1.titl').style="<?php echo $dnns->color3_h1;?>";
    document.getElementById('colorh1').value="<?php echo $dnns->color3_h1;?>";
       }








$(document).ready(function(){
	// Add minus icon for collapse element which is open by default
	$(".collapse.show").each(function(){
		$(this).siblings(".card-header").find(".btn i").html("remove");
	});
	
	// Toggle plus minus icon on show hide of collapse element
	$(".collapse").on('show.bs.collapse', function(){
		$(this).parent().find(".card-header .btn i").html("remove");
	}).on('hide.bs.collapse', function(){
		$(this).parent().find(".card-header .btn i").html("add");
	});
});







</script>






