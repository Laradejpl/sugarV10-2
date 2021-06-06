<?php
require_once __DIR__ . '/../../../config/bootstrap.php';


if (getMembre() === null ) {
    header('Location: index.php');//si tu n'est pas connecter ont vas a index.php
  }

  
  
  $req = $pdo->prepare("SELECT SUM(score.points) as total ,membre.id_membre,membre.pseudo,membre.photo1 ,score.points FROM score,membre  WHERE score.membre_id = membre.id_membre AND id_membre = :id_membre ");
  $req->bindParam(':id_membre', getMembre()['id_membre'], PDO::PARAM_INT);
  
  $req->execute();
  $data =$req->fetch(PDO::FETCH_OBJ);
  $totalScore = $data->total;



if (isset($_POST['confirmation'])) {

 $message =  "vous avez misez ".$_POST['mise']."";
   var_dump( $totalScore );
   var_dump($_POST['mise']);
  $newSco = $totalScore - $_POST['mise'];
  echo $newSco;
  $req3 = $pdo->prepare("DELETE FROM score WHERE points = ".$_POST['mise']." ");
  $req3->execute();
 // echo '<div>vous avez misez '.$_POST['mise'].' </div>';
 $req3->closeCursor();

 $req = $pdo->prepare("SELECT SUM(score.points) as total ,membre.id_membre,membre.pseudo,membre.photo1 ,score.points FROM score,membre  WHERE score.membre_id = membre.id_membre AND id_membre = :id_membre ");
  $req->bindParam(':id_membre', getMembre()['id_membre'], PDO::PARAM_INT);
  $req->execute();
  $data =$req->fetch(PDO::FETCH_OBJ);
  $req->closeCursor();
$req8 = $pdo->prepare("INSERT INTO leaderboard (id_joueur,score_total) VALUES (:id_joueur,:score_total) ");
$req8->bindParam(':id_joueur', getMembre()['id_membre'], PDO::PARAM_INT);
$req8->bindParam(':score_total', $totalScore , PDO::PARAM_INT);
$req8->execute();
$req8->closeCursor();


}




  






?>


<html>
    <head>
    <link rel="icon" type="image/png" href="../config/favicon.png" />
            <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

        
        <link rel="stylesheet" href="main.css" type="text/css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>

      

        <script type="text/javascript" src="../../Winwheel.js"></script>
        <script
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <title> Winning Wheel</title>
    </head>
    <body>
         
        
        <div align="center">
            <h1 class="badge-dark titledark"  >Tentez votre chance pour 1OO CREDITS.</h1>
            <br />
            <p ><h2 class="badge-dark titledark">Le moyen de gagnez des avantages sur Reggae Rencontre.</h2></p>
            <br />
            
            <br />
            <div class="container">
                <div class="row">
                    <div class="col-6 btn btn-primary p-4 mb-2 titledark "> <a href="/../../Accueil.php" style="color:white;">Accueil</a> </div>
                    <div class="col-6 btn btn-danger p-4 mb-2 titledark">Les jeux</div>
                </div>
            </div>
            <br>

            <section class="profilGamer">
 <section>
	 <img src="/../../../assets/img/<?= $data->photo1 ;?>"alt=".." style="width:10%; height:90px;border-radius:50%;border:3px solid white;z-index:2">
	 <h2  class="titledark" style="background-color:dodgerblue;padding:5px;border-radius:20px;"><?php echo $data->pseudo;?></h2> <span style="background-color:red;padding:4px;border-radius:20px;border:4px solid white"> <?php echo $data->total;?> Credits</span>
	<br>


	</section>
 </section>




            <div align="center"> <img src="bgw.png" alt="reggae" ></div>
          
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td>
                        <div class="power_controls">
                            <br />
                            <br />
                            <table class="power" cellpadding="10" cellspacing="0">
                                <tr>
                                    <th align="center">Power</th>
                                </tr>
                                <tr>
                                    <td width="78" align="center" id="pw3" onClick="powerSelected(3);">High</td>
                                </tr>
                                <tr>
                                    <td align="center" id="pw2" onClick="powerSelected(2);">Med</td>
                                </tr>
                                <tr>
                                    <td align="center" id="pw1" onClick="powerSelected(1);">Low</td>
                                </tr>
                            </table>
                            <br />
                            <?php 
                            
                            if (($_POST['mise'] > 0) && ($totalScore >0)):
                               
                            ?>
                            <img id="spin_button" src="spin_off.png" alt="Spin" onClick="startSpin();" />
                            <br /><br />
                            &nbsp;&nbsp;<a href="#" onClick="resetWheel(); return false;">Play Again</a><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(reset)
                           
                                

                            <?php endif;?>
                        </div>
                    </td>
                    <td width="421" height="564" class="the_wheel" align="center" valign="center">
                        <canvas id="canvas" width="420" height="420">
                            <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                        </canvas>
                    </td>
                </tr>
            </table>
        </div>

        <div class="container-fluid mb-4">
       <div class="row">
           <div class="col-12 badge-success text-center">ils sont en haut du classement</div>
       </div>
   </div>

        <div class="container-fluid">
       
       
       <div class="row d-flex justify-content-around">
       
       <?php
    $req4 = $pdo->prepare(
        'SELECT SUM(score.points) as total ,membre.id_membre,membre.pseudo,membre.photo1  FROM score,membre  WHERE score.membre_id = membre.id_membre ORDER BY total DESC LIMIT  0, 4'
    );
    $req4->execute();
    while($item =$req4->fetch(PDO::FETCH_OBJ)):?>

<div class="col-1"><img src="/../../../../assets/img/<?php echo $item->photo1 ; ?>" alt="..." style="width:90px;height:90px;border-radius:50px;float:left;"><h6 style="color:white;"><?php echo $item->pseudo; ?></h6></div>

    
    
  



<?php endwhile;?>
</div>
   </div>


        <div class="container-fluid">
            <div class="row">
                <div class="col-12 badge-danger text-center">Multiplier les credits</div>
            
            </div>

           
        <script>
        
            // Create new wheel object specifying the parameters at creation time.
            let theWheel = new Winwheel({
                'numSegments'       : 8,                 // Specify number of segments.
                'outerRadius'       : 200,               // Set outer radius so wheel fits inside the background.
                'drawText'          : true,              // Code drawn text can be used with segment images.
                'textFontSize'      : 16,
                'textOrientation'   : 'curved',
                'textAlignment'     : 'inner',
                'textMargin'        : 90,
                'textFontFamily'    : 'monospace',
                'textStrokeStyle'   : 'black',
                'textLineWidth'     : 3,
                'textFillStyle'     : 'white',
                'drawMode'          : 'segmentImage',    // Must be segmentImage to draw wheel using one image per segemnt.
                'segments'          :                    // Define segments including image and text.
                
                [
                   {'image' : 'jane.png',  'text' : '0','id':'pablo'},
                   {'image' : 'tom.png',   'text' : '20000','id':'bob'},
                   {'image' : 'mary.png',  'text' : '10000','id':'joe'},
                   {'image' : 'alex.png',  'text' : '0','id':'dassin'},
                   {'image' : 'sarah.png', 'text' : '50','id': 'lovono'},
                   {'image' : 'bruce.png', 'text' : '100','id':'bof'},
                   {'image' : 'rose.png',  'text' : '0','id':'joko'},
                   {'image' : 'steve.png', 'text' : '20  ','id':'bono'}
                ],
                'animation' :           // Specify the animation to use.
                {
                    'type'     : 'spinToStop',
                    'duration' : 5,     // Duration in seconds.
                    'spins'    : 8,     // Number of complete spins.
                    'callbackFinished' : alertPrize
                }
            });

            // Vars used by the code in this page to do power controls.
            let wheelPower    = 0;
            let wheelSpinning = false;

            // -------------------------------------------------------
            // Function to handle the onClick on the power buttons.
            // -------------------------------------------------------
            function powerSelected(powerLevel)
            {
                // Ensure that power can't be changed while wheel is spinning.
                if (wheelSpinning == false) {
                    // Reset all to grey incase this is not the first time the user has selected the power.
                    document.getElementById('pw1').className = "";
                    document.getElementById('pw2').className = "";
                    document.getElementById('pw3').className = "";

                    // Now light up all cells below-and-including the one selected by changing the class.
                    if (powerLevel >= 1) {
                        document.getElementById('pw1').className = "pw1";
                    }

                    if (powerLevel >= 2) {
                        document.getElementById('pw2').className = "pw2";
                    }

                    if (powerLevel >= 3) {
                        document.getElementById('pw3').className = "pw3";
                    }

                    // Set wheelPower var used when spin button is clicked.
                    wheelPower = powerLevel;

                    // Light up the spin button by changing it's source image and adding a clickable class to it.
                    document.getElementById('spin_button').src = "spin_on.png";
                    document.getElementById('spin_button').className = "clickable";
                }
            }

            // -------------------------------------------------------
            // Click handler for spin button.
            // -------------------------------------------------------
            function startSpin()
            {
                // Ensure that spinning can't be clicked again while already running.
                if (wheelSpinning == false) {
                    // Based on the power level selected adjust the number of spins for the wheel, the more times is has
                    // to rotate with the duration of the animation the quicker the wheel spins.
                    if (wheelPower == 1) {
                        theWheel.animation.spins = 3;
                    } else if (wheelPower == 2) {
                        theWheel.animation.spins = 8;
                    } else if (wheelPower == 3) {
                        theWheel.animation.spins = 15;
                    }

                    // Disable the spin button so can't click again while wheel is spinning.
                    document.getElementById('spin_button').src       = "spin_off.png";
                    document.getElementById('spin_button').className = "";

                    // Begin the spin animation by calling startAnimation on the wheel object.
                    theWheel.startAnimation();

                    // Set to true so that power can't be changed and spin button re-enabled during
                    // the current animation. The user will have to reset before spinning again.
                    wheelSpinning = true;
                }
            }

            // -------------------------------------------------------
            // Function for reset button.
            // -------------------------------------------------------
            function resetWheel()
            {
                theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
                theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
                theWheel.draw();                // Call draw to render changes to the wheel.

                document.getElementById('pw1').className = "";  // Remove all colours from the power level indicators.
                document.getElementById('pw2').className = "";
                document.getElementById('pw3').className = "";

                wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
            }

            // -------------------------------------------------------
            // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters.
            // note the indicated segment is passed in as a parmeter as 99% of the time you will want to know this to inform the user of their prize.
            // -------------------------------------------------------
            function setCredit() {

$.ajax({
    url:'credit.php',
    success:function(data)
    {



    }


});

}
function setCredit_cent() {

$.ajax({
    url:'credit_cent.php',
    success:function(data)
    {



    }


});

}

function setCredit_cinquante() {

$.ajax({
    url:'credit_cinquante.php',
    success:function(data)
    {



    }


});

}

function setCredit_vingt() {

$.ajax({
    url:'credit_vingt.php',
    success:function(data)
    {



    }


});

}

function setCredit_realcent() {

$.ajax({
    url:'credit_realcent.php',
    success:function(data)
    {



    }


});

}


function setCredit_zero() {

$.ajax({
    url:'credit_zero.php',
    success:function(data)
    {



    }


});

}



            function alertPrize(indicatedSegment)
            {
                // Do basic alert of the segment text. You would probably want to do something more interesting with this information.
                //alert(indicatedSegment.text + '  CREDITS');
                var score = indicatedSegment.text;
                document.getElementById('popup').textContent = ' Vous avez gagnez'+indicatedSegment.text + '   ' + ' CREDITS 🎮';
                document.getElementById('lepopup').style.display="block";



               
               console.log(score);

             

               $(document).ready(function(){
            if(score == 20000 ){

console.log('le score est egale a '+ score);

                setCredit();
                window.setTimeout("location=('/../../../../accueil.php');",2000);

                




            }else if (score == 10000){

                console.log('le score est egale a '+ score);
                setCredit_cent();
                window.setTimeout("location=('/../../../../accueil.php');",2000);
	


            }else if (score == 50){

                setCredit_cinquante();
                window.setTimeout("location=('/../../../../accueil.php');",2000);
               

           

            }else if (score == 20){

setCredit_vingt();
window.setTimeout("location=('/../../../../accueil.php');",2000);



}else if (score == 100){

setCredit_realcent();
window.setTimeout("location=('/../../../../accueil.php');",2000);



}else{
    setCredit_zero();

    window.setTimeout("location=('/../../../../accueil.php');",2000);



}
               
        });  
                
            }

           
            
        </script>
        
     
        <div class="container">
            <div class="row d-flex  justify-content-center">
                <div class="col-2 badge-success">10000 JETONS pour 1,50€</div>
                <div class="col-2 badge-primary">20000 JETONS pour 2,50€</div>
                <div class="col-2 badge-secondary">500 JETONS pour 0,50€</div>

            </div>
            <div class="row d-flex  justify-content-center">
            
                <div class="col-2 badge-danger"> 
                <img src="jeton.gif" alt="token"style="width:100%;" >
            </div>
                <div class="col-2 badge-success"><img src="jetonorange.gif" alt="token"style="width:100%;" ></div>
                <div class="col-2 badge-primary"><img src="jetonvert.gif" alt="token"style="width:100%;" ></div>
            </div>
        </div>
      
        <?php if ($_POST['mise'] > 0):?>
        <div style="color:white;" class="badge-success rounded-pill"><?= $message; ?></div>
        <?php endif;?>
     
     <div class="row">
    <div class="col-12">
                <form action="" method="post">
                    <div class="form-group" style=" background: linear-gradient(0deg,#000,#262626);color: rgb(255, 0, 170);">
                        <label for="mise" style="text-align: center;">Miser </label>
                        <br>
                        <select class="form-control" id="type" name="mise">
                               <option value="0">0 Credits</option>
                               <option value="20">20 Credits</option>
                               <option value="50">50 Credits</option>
                               <option value="100">100 Credits</option>
                               <option value="10000" >10000 Credits</option>
                               <option value="20000" >20000 Credits</option>
                          
                          
                        </select>
                      </div>
                      <input type="submit" value="confirmer"name ="confirmation" >

                    </form>
            </div>
        </div>
        </div>

<div  id="lepopup" style="display:none;">
        <div id="popup" style="color:white;text-align:center; font-size:3em;position:absolute;width:400px;height:300px;margin-top:-990px ;margin-left:40%;background:grey;z-index:1;border:5px solid white;border-radius:20px;">
        </div>
       
    <button>fermer</button>
    </div>
  
  
      
    </body>
</html>
