<?php
require_once __DIR__ . '/config/bootstrap.php';

$id = getMembre()['id_membre'];
$req =$pdo->prepare("SELECT * FROM membre  WHERE id_membre= $id");
$req->execute();
$don = $req->fetch(PDO::FETCH_OBJ);
$rtt = $pdo->prepare("SELECT * FROM pagepro WHERE id_client= $id");
$rtt->execute();
$pageMembre = $rtt->fetch(PDO::FETCH_OBJ);



include __DIR__ . '/config/header.php';
?>
<style>
body{<?php echo $pageMembre->bg_color;?>}
.titl{<?php echo $pageMembre->h1;?>}

#modification_panel{display:none;}
@media all and (max-width: 480px)
  {
   #pic1 ,#pic2,#pic3,#pic4{
       width:200%;
   }

  }
  #mssg{

      font-size:3em;


}


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
a.dd-selected{
          background-color:lime;
    }
img.dd-selected-imgage{

                width:50px;


      }
a.dd-option{
    width:100px;

}
img.dd-option-image
           {width:50px;}

</style>
<?php if ($id == $pageMembre->id_client):?>
<div class="container ">
    <div class="row">
    <div class="col-12  border btn btn-secondary" style="height:40px;" id="hautmenu" onclick="openMenu()">Modifier votre menu.

</div>
    </div>
    </div>
<?php endif;?>

<div class="container  border">
    <div class="row">

    <div class="col-2 border" id="leftmenu">


    </div>


        <div class="col-8 border" id="centermenu">

        <h1 class="titl" ><?php echo ucfirst($don->pseudo);?></h1>
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
        <div class="col-12 bg-success border rounded" style="height:70px;" >
        
        <p><?php echo ucfirst($don->description_membre);?></p>
        
        </div>
       
        
        
    </div>
</div>
<!---DESCRIPTION-->











         </div>

   
         <div class="col-2 border" id="rightmenu">



</div>

    </div>
</div>
<!--STICKERS--->

<div class="container">
    <div class="row d-flex justify-content-between">
        <div class="col-2 "><img src="<?php echo $pageMembre->stickers1 ;?>" alt="..." width="130%;" id="pic1" data-toggle="modal" data-target="#exampleModalLong"></div>
        <div class="col-2 "><img src="<?php echo $pageMembre->stickers2 ;?>"  alt="..." width="130%;" id="pic2" data-toggle="modal" data-target="#exampleModalLong1"></div>
        <div class="col-2"><img src="<?php echo $pageMembre->stickers3 ;?>"  alt="..." width="130%;" id="pic3" data-toggle="modal" data-target="#exampleModalLong2"></div>
        <div class="col-2 "><img src="<?php echo $pageMembre->stickers4 ;?>"  alt="..." width="130%;"  id="pic4" data-toggle="modal" data-target="#stikkk"></div>
        
        
    </div>
</div>
<!--STICKERS--->
<?php if ($id == $pageMembre->id_client):?>
   <section id="modification_panel">

  <div class="container-lg " >
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
							<a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="material-icons">add</i> Votre titre</a>
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
							<a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="material-icons">add</i>Vos Stickers</a>                     
						</h2>
					</div>
					<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						<div class="card-body">
							<div class="media">
								<div class="media-body">

                           



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

</section>
<?php endif;?>

<?php if ($id == $pageMembre->id_client):?>
<!-- Modal 1-->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Choisi ton Emoji</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <img  src="interface/dance.gif" alt="..." width="20%"  id="btnpic" onclick="sticks()"> 
      <img  src="interface/dance_b.gif" alt="..." width="20%" onclick="sticks2()">
      <img  src="interface/RepulsiveMammothGannet-max-1mb.gif" alt="..." width="20%" onclick="sticks3()"> 
      <img  src="interface/unionjamak.gif" alt="..." width="20%" onclick="sticks4()"> 
      <img  src="interface/ganstaboy.png" alt="..." width="20%" onclick="sticks5()"> 
                               <img  src="interface/gangswhing.gif" alt="..." width="20%" onclick="sticks6()"> 
                               <img  src="interface/bague.png" alt="..." width="20%" onclick="sticks7()"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal 2-->
<div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Choisi ton Emoji</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <img  src="interface/dance.gif" alt="..." width="20%"  id="btnpic" onclick="sticks8()"> 
      <img  src="interface/dance_b.gif" alt="..." width="20%" onclick="sticks9()">
      <img  src="interface/RepulsiveMammothGannet-max-1mb.gif" alt="..." width="20%" onclick="sticks10()"> 
      <img  src="interface/unionjamak.gif" alt="..." width="20%" onclick="sticks11()"> 
      <img  src="interface/ganstaboy.png" alt="..." width="20%" onclick="sticks12()"> 
                               <img  src="interface/gangswhing.gif" alt="..." width="20%" onclick="sticks13()"> 
                               <img  src="interface/bague.png" alt="..." width="20%" onclick="sticks14()"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal 3-->
<div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Choisi ton Emoji</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <img  src="interface/dance.gif" alt="..." width="20%"  id="btnpic" onclick="sticks15()"> 
      <img  src="interface/dance_b.gif" alt="..." width="20%" onclick="sticks16()">
      <img  src="interface/RepulsiveMammothGannet-max-1mb.gif" alt="..." width="20%" onclick="sticks17()"> 
      <img  src="interface/unionjamak.gif" alt="..." width="20%" onclick="sticks18()"> 
      <img  src="interface/ganstaboy.png" alt="..." width="20%" onclick="sticks19()"> 
                               <img  src="interface/gangswhing.gif" alt="..." width="20%" onclick="sticks20()"> 
                               <img  src="interface/bague.png" alt="..." width="20%" onclick="sticks21()"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal 4-->
<div class="modal fade" id="stikkk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Choisi ton Emoji</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <img  src="interface/dance.gif" alt="..." width="20%"  id="btnpic" onclick="sticks22()"> 
      <img  src="interface/dance_b.gif" alt="..." width="20%" onclick="sticks23()">
      <img  src="interface/RepulsiveMammothGannet-max-1mb.gif" alt="..." width="20%" onclick="sticks24()"> 
      <img  src="interface/unionjamak.gif" alt="..." width="20%" onclick="sticks25()"> 
      <img  src="interface/ganstaboy.png" alt="..." width="20%" onclick="sticks26()"> 
                               <img  src="interface/gangswhing.gif" alt="..." width="20%" onclick="sticks27()"> 
                               <img  src="interface/bague.png" alt="..." width="20%" onclick="sticks28()"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>





<!---FORM---->

<form action="profil.php" method="post">
      <input type="hidden" name="bgcolor"  id="inputcolor">
        <input type="hidden" name="colorh1"  id="inputh1">
           <input type="hidden" name="sticker1" id="stck1">
            <input type="hidden" name="sticker2" id="stck2">
            <input type="hidden" name="sticker3" id="stck3">
            <input type="hidden" name="sticker4" id="stck4">

      <input type="submit" value="confirmer" name="confirm" class="btn btn-primary">
</form>
<!---FORM---->
<?php endif;?>

<script>
function openMenu() {

    document.getElementById('modification_panel').style.display="block";


    
}
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
    document.getElementById('inputh1').value="<?php echo $dnns->color1_h1;?>";
}
function chHlime() {
    document.querySelector('h1.titl').style="<?php echo $dnns->color2_h1;?>";
    document.getElementById('inputh1').value="<?php echo $dnns->color2_h1;?>";
       }

       function chHwhite() {
    document.querySelector('h1.titl').style="<?php echo $dnns->color3_h1;?>";
    document.getElementById('inputh1').value="<?php echo $dnns->color3_h1;?>";
       }

       function sticks(){

         document.getElementById('pic1').setAttribute('src','interface/dance.gif');
         document.getElementById('stck1').value="interface/dance.gif";
           
          }




          function sticks2(){

                       document.getElementById('pic1').setAttribute('src','interface/dance_b.gif');
                       document.getElementById('stck1').value="interface/dance_b.gif";
  
                    }


    function sticks3(){

                    document.getElementById('pic1').setAttribute('src','interface/RepulsiveMammothGannet-max-1mb.gif');
                    document.getElementById('stck1').value="interface/RepulsiveMammothGannet-max-1mb.gif";


}
function sticks4(){

                  document.getElementById('pic1').setAttribute('src','interface/unionjamak.gif');
                  document.getElementById('stck1').value="interface/unionjamak.gif";

             } 

function sticks5(){

                     document.getElementById('pic1').setAttribute('src','interface/ganstaboy.png');
                     document.getElementById('stck1').value="interface/ganstaboy.png";

                     

        }
function sticks6(){

                       document.getElementById('pic1').setAttribute('src','interface/gangswhing.gif');
                       document.getElementById('stck1').value="interface/gangswhing.gif";
                  } 

function sticks7(){

                        document.getElementById('pic1').setAttribute('src','interface/bague.png');
                               document.getElementById('stck1').value="interface/bague.png";


                       }
                       
                       function sticks8(){

                            document.getElementById('pic2').setAttribute('src','interface/dance.gif');
                               document.getElementById('stck2').value="interface/dance.gif";

                                           }


                                           function sticks9(){

                                document.getElementById('pic2').setAttribute('src','interface/dance_b.gif');
                                 document.getElementById('stck2').value="interface/dance_b.gif";

                                                              }

            function sticks10(){

                                       document.getElementById('pic2').setAttribute('src','interface/RepulsiveMammothGannet-max-1mb.gif');
                                       document.getElementById('stck2').value="interface/RepulsiveMammothGannet-max-1mb.gif";
                              } 


                              function sticks11(){

                  document.getElementById('pic2').setAttribute('src','interface/unionjamak.gif');
                  document.getElementById('stck2').value="interface/unionjamak.gif";

             } 
             
function sticks12(){

document.getElementById('pic2').setAttribute('src','interface/ganstaboy.png');
document.getElementById('stck2').value="interface/ganstaboy.png";



}
function sticks13(){

document.getElementById('pic2').setAttribute('src','interface/gangswhing.gif');
document.getElementById('stck2').value="interface/gangswhing.gif";
} 


function sticks14(){

document.getElementById('pic2').setAttribute('src','interface/bague.png');
document.getElementById('stck2').value="interface/bague.png";


}

function sticks15(){

document.getElementById('pic3').setAttribute('src','interface/dance.gif');
   document.getElementById('stck3').value="interface/dance.gif";

               }

               function sticks16(){

document.getElementById('pic3').setAttribute('src','interface/dance_b.gif');
 document.getElementById('stck3').value="interface/dance_b.gif";

                              }


            function sticks17(){

document.getElementById('pic3').setAttribute('src','interface/RepulsiveMammothGannet-max-1mb.gif');
document.getElementById('stck3').value="interface/RepulsiveMammothGannet-max-1mb.gif";
} 

function sticks18(){

document.getElementById('pic3').setAttribute('src','interface/unionjamak.gif');
document.getElementById('stck3').value="interface/unionjamak.gif";

} 

function sticks19(){

document.getElementById('pic3').setAttribute('src','interface/ganstaboy.png');
document.getElementById('stck3').value="interface/ganstaboy.png";



}


function sticks20(){

document.getElementById('pic3').setAttribute('src','interface/gangswhing.gif');
document.getElementById('stck3').value="interface/gangswhing.gif";
} 

function sticks21(){

document.getElementById('pic3').setAttribute('src','interface/bague.png');
document.getElementById('stck3').value="interface/bague.png";


}



function sticks22(){

document.getElementById('pic4').setAttribute('src','interface/dance.gif');
   document.getElementById('stck4').value="interface/dance.gif";

               }

               function sticks23(){

document.getElementById('pic4').setAttribute('src','interface/dance_b.gif');
 document.getElementById('stck4').value="interface/dance_b.gif";

                              }


            function sticks24(){

document.getElementById('pic4').setAttribute('src','interface/RepulsiveMammothGannet-max-1mb.gif');
document.getElementById('stck4').value="interface/RepulsiveMammothGannet-max-1mb.gif";
} 

function sticks25(){

document.getElementById('pic4').setAttribute('src','interface/unionjamak.gif');
document.getElementById('stck4').value="interface/unionjamak.gif";

} 

function sticks26(){

document.getElementById('pic4').setAttribute('src','interface/ganstaboy.png');
document.getElementById('stck4').value="interface/ganstaboy.png";



}


function sticks27(){

document.getElementById('pic4').setAttribute('src','interface/gangswhing.gif');
document.getElementById('stck4').value="interface/gangswhing.gif";
} 

function sticks28(){

document.getElementById('pic4').setAttribute('src','interface/bague.png');
document.getElementById('stck4').value="interface/bague.png";


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