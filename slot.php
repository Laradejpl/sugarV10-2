<?php
require_once __DIR__ . '/config/bootstrap.php';

if (getMembre() === null ) {
	header('Location: index.php');//si tu n'est pas connecter ont vas a index.php
  }





$req = $pdo->prepare("SELECT SUM(score.points) as total ,membre.id_membre,membre.pseudo,membre.photo1 FROM score,membre  WHERE score.membre_id = membre.id_membre AND id_membre = :id_membre ");
$req->bindParam(':id_membre', getMembre()['id_membre'], PDO::PARAM_INT);

$req->execute();
$data =$req->fetch(PDO::FETCH_OBJ);





?>
        <script
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
			crossorigin="anonymous"></script>

			            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

			


<!DOCTYPE html>
<head>
<link rel="icon" type="image/png" href="config/favicon.png" />
	<title>Slot Machine</title>
<style>
	body
	{
		background:url(assets/img/sapin.jpg) no-repeat;
		background-attachment: fixed;
		background-size: cover;
	}

/* keyframes for animation;  simple 0 to 360 */
@keyframes spin {
	from { transform: rotate(0deg); }
	to { transform: rotate(360deg); }
}

/* basic structure for the rays setup */
#raysDemoHolder	{ 
	position: absolute; 
	width: 490px; 
	height: 490px; 
	margin-top:10%; 
	margin-left:10%;
	display:none;

}
#raysLogo { 
	width: 100%; 
	height: 433px; 
	text-indent: -3000px; 
	background: url(malle.gif) 0 0 no-repeat; 
	display: block; 
	position: absolute; 
	top: 0; 
	left: -10; 
    z-index: 2; 
    
}
#rays	{ /* with animation properties */
	background: url(rays-main.png) 0 0 no-repeat; 
	position: absolute; 
	top: -100px; 
	left: -100px; 
	width: 490px; 
	height: 490px; 
	
	/* microsoft ie */
	animation-name: spin; 
	animation-duration: 40000ms; /* 40 seconds */
	animation-iteration-count: infinite; 
	animation-timing-function: linear;
}

#rays:hover {
	/* animation-duration: 10000ms; 10 seconds - speed it up on hover! */
	/* resets the position though!  sucks */
}


@import url('https://fonts.googleapis.com/css?family=Roboto');
@import url('https://fonts.googleapis.com/css?family=Roboto+Mono');
a{
	color: #283593;
	text-decoration: none;
}
h3{
	margin-top: 12px;
}
*{
	margin:0px;
}

main{
	
	border-radius: 5px;
	background-color: rgb(189, 155, 6);
	margin-top: 30px;
	padding-top: 20px;
	padding-bottom: 20px;
	padding-left: 15px;
	padding-right: 15px;
	margin-left: calc((100% - 580px) / 2);
	width: 550px;
border:9px solid rgb(8, 98, 8);
filter: blur(0px);

}
section#status{
	text-shadow: 2px 2px 2px rgb(253, 30, 0);
	margin-bottom: 25px;
	padding-top: 25px;
	padding-bottom: 25px;
	border-radius: 5px;
	text-align: center;
	background-color: #37474F;
	color: #FFFFFF;
	font-size: 25px;
	font-family: 'Roboto Mono', monospace;
	-webkit-box-shadow: 10px -1px 26px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 10px -1px 26px 0px rgba(0,0,0,0.75);
box-shadow: 10px -1px 26px 0px rgba(0,0,0,0.75);
}
section#Slots{
	border-radius: 15px;
	background-color: #FAFAFA;
	border-bottom: 5px solid grey;
}
section#Gira{
	margin-top: 25px;
	padding-top: 25px;
	padding-bottom: 25px;
	border-radius: 5px;
	text-align: center;
	background-color:rgb(8, 98, 8);
	color: #FFFFFF;
	font-size: 25px;
}

.GiraInactif{
	margin-top: 25px;
	padding-top: 25px;
	padding-bottom: 25px;
	border-radius: 5px;
	text-align: center;
	background-color:#278714;
	color: ;
	font-size: 25px;
	display: none;
}


section#Gira:hover{
	background-color: #BA68C8;
}
section#options{
	margin-top: 20px;
	padding-top: 5px;
	border-radius: 5px;
	background-color: #C62828;
	color: #FFFFFF;
}
.option{
	padding-left: 5px;
}
section#info{
	background-color: #616161;
	padding-left: 12px;
	padding-bottom: 12px;
	border-radius: 5px;
	overflow: hidden;
	animation-duration: 1s;
	color: #BDBDBD;
	margin-top: 50px;
	margin-left: 30%;
	margin-right: 30%;
	display: none;
}
#slot1, #slot2, #slot3{
	display: inline-block;
	margin-top: 5px;
	margin-left: 15px;
	margin-right: 15px;
	background-size: 150px;
	width: 150px;
	height: 150px;
}
.a1{
	background-image: url("res/tiles/seven.gif");
}
.a2{
	background-image: url("res/tiles/cherries.png");
}
.a3{
	background-image: url("res/tiles/club.png");
}
.a4{
	background-image: url("res/tiles/diamond.png");
}
.a5{
	background-image: url("res/tiles/heart.png");
}
.a6{
	background-image: url("res/tiles/spade.png");
}
.a7{
	background-image: url("res/tiles/joker.png");
}
#score
{
  border:2px solid yellow;
  color:yellowgreen;
  padding:10px;
  font-size:2em;
  background:white;
  border-radius:20px;
  float:right;
  position:relative;
  margin-top:-90px;
display:none;
text-shadow: 2px 2px 2px black;

}
#GiraMsg
{
	visibility:hidden;
	text-align:center;
	font-size: 3em;
	text-shadow: 2px 2px 2px greenyellow;
	background:dodgerblue ;
	border-radius: 20px;
	box-shadow: 2px 2px 2px black;

	
}
.profilGamer
{
	float:left;
	color:white;
}
</style>

</head>
<html>
	

<body onload="toggleAudio()">




<h1 style="background:orange;padding:5px;text-align:center;"> GAGNEZ DES CREDITS JOURNALIER</h1>
<br>
<br>







<br>
<a href="accueil.php"style="border:4px solid brown;background: lime; padding:5px;color:black;font-size:1.5em;border-radius:20px;text-shadow:2px 2px 2px orange;">Revenir à l'accueil</a>
<span id="messagedefin" style="text-align:center;font-size:2em;color:white;"></span>  <img src="assets/img/gift.png" alt="gift"  id="gift" style="float:right;display:none;"> 
<div id="raysDemoHolder">
	<a href="" id="raysLogo"></a>
	<div id="rays"></div>
</div>
<main>
	
	<section id="status">DO THE TO REGGAE!</section>
	<span id="score"> </span>
	<section id="Slots">
		<div id="slot1" class="a1"></div>
		<div id="slot2" class="a1"></div>
		<div id="slot3" class="a1"></div>
	</section>
	<section onclick="doSlot()" id="Gira" >TAKE A SPIN!</section>
	<section  id="GiraMsg">BIEN JOUEZ!</section>
	<section id="options"> 
	<img src="assets/img/<?= $data->photo1 ;?>"alt=".." style="width:20%; height:70px;border-radius:50%;border:3px solid white;z-index:2"><img src="res/icons/audioOn.png" id="audio" class="option" onclick="toggleAudio()" /><img src="res/icons/flagetio.png" alt="xx" style="width:100%;height:30px;"/>
	<h2 style="background-color:dodgerblue;padding:5px;border-radius:20px;"><?php echo $data->pseudo;?></h2> <span style="background-color:red;padding:4px;border-radius:20px;border:4px solid white"> <?php echo $data->total;?> Credits</span>

	</section>
</main>




<script>
var doing = false;
var spin = [new Audio("res/sounds/spin.mp3"),new Audio("res/sounds/spin.mp3"),new Audio("res/sounds/spin.mp3"),new Audio("res/sounds/spin.mp3"),new Audio("res/sounds/spin.mp3"),new Audio("res/sounds/spin.mp3"),new Audio("res/sounds/spin.mp3")];
var coin = [new Audio("res/sounds/coin.mp3"),new Audio("res/sounds/coin.mp3"),new Audio("res/sounds/coin.mp3")]
var win = new Audio("res/sounds/aplo.mp3");
var lose = new Audio("res/sounds/lose.mp3");
var audio = false;
let status = document.getElementById("status")
var info = true;

function doSlot(){
	if (doing){return null;}
	doing = true;
	var numChanges = randomInt(1,4)*7
	var numeberSlot1 = numChanges+randomInt(1,7)
	var numeberSlot2 = numChanges+2*7+randomInt(1,7)
	var numeberSlot3 = numChanges+4*7+randomInt(1,7)

	var i1 = 0;
	var i2 = 0;
	var i3 = 0;
	var sound = 0
	status.innerHTML = "GOOD LUCK..."

	document.getElementById('status').style.backgroundColor="grey";
		document.getElementById('status').style.color="white";
		document.getElementById('status').style.fontSize="30px";
	slot1 = setInterval(spin1, 50);
	slot2 = setInterval(spin2, 50);
	slot3 = setInterval(spin3, 50);
	function spin1(){
		i1++;
		if (i1>=numeberSlot1){
			coin[0].play()
			clearInterval(slot1);
			return null;
		}
		slotTile = document.getElementById("slot1");
		if (slotTile.className=="a7"){
			slotTile.className = "a0";
		}
		slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
	}
	function spin2(){
		i2++;
		if (i2>=numeberSlot2){
			coin[1].play()
			clearInterval(slot2);
			return null;
		}
		slotTile = document.getElementById("slot2");
		if (slotTile.className=="a7"){
			slotTile.className = "a0";
		}
		slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
	}
	function spin3(){
		i3++;
		if (i3>=numeberSlot3){
			coin[2].play()
			clearInterval(slot3);
			testWin();
			return null;
		}
		slotTile = document.getElementById("slot3");
		if (slotTile.className=="a7"){
			slotTile.className = "a0";
		}
		sound++;
		if (sound==spin.length){
			sound=0;
		}
		spin[sound].play();
		slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
	}
}

function testWin(){
	var slot1 = document.getElementById("slot1").className
	var slot2 = document.getElementById("slot2").className
	var slot3 = document.getElementById("slot3").className

	if (((slot1 == slot2 && slot2 == slot3) ||
		(slot1 == slot2 && slot3 == "a7") ||
		(slot1 == slot3 && slot2 == "a7") ||
		(slot2 == slot3 && slot1 == "a7") ||
		(slot1 == slot2 && slot1 == "a7") ||
		(slot1 == slot3 && slot1 == "a7") ||
		(slot2 == slot3 && slot2 == "a7") ) && !(slot1 == slot2 && slot2 == slot3 && slot1=="a7")){
		status.innerHTML = "YOU WIN!";
		document.getElementById('score').style.display="block";
        document.getElementById('messagedefin').textContent="Récuperer vos points en cliquant sur le cadeaux.";
       document.getElementById('Gira').style.visibility="hidden";
	   document.getElementById('GiraMsg').style.visibility="visible";
	 
	   document.querySelector("main").style.filter = "grayscale(100%)";
	   //document.querySelector("main").style.filter = "blur(4px)";
        document.getElementById('score').textContent="50 POINTS";
		document.getElementById('raysDemoHolder').style.display="block";
		win.play();
        

	} else if(slot1 == slot2 || slot1 == slot3 || slot2 == slot3 ){
		status.innerHTML = "GAGNEZ!";
		document.getElementById('status').style.backgroundColor="lime";
		document.getElementById('status').style.color="black";
		document.getElementById('status').style.fontSize="30px";
		document.getElementById('score').style.display="block";
        document.getElementById('messagedefin').textContent="Récuperer vos points en cliquant sur le cadeaux.";
		document.getElementById('Gira').style.visibility="hidden";
		document.getElementById('GiraMsg').style.visibility="visible";
		document.getElementById('raysDemoHolder').style.display="block";
        
	    document.querySelector("main").style.filter = "grayscale(100%)";
		//document.querySelector("main").style.filter = "blur(4px)";
		document.getElementById('score').textContent="30 POINTS";




		win.play();

	}
	else{
		status.innerHTML = "YOU LOSE!"
		document.getElementById('status').style.backgroundColor="red";
		document.getElementById('status').style.color="black";
		document.getElementById('status').style.fontSize="30px";
		document.getElementById('score').style.display="none";
        document.getElementById('messagedefin').textContent="Merci d'avoir joué avec nous a la prochaine";

		document.getElementById('score').textContent="0 POINTS";
		lose.play();
        window.setTimeout("location=('accueil.php');",2000);
	}
	doing = false;
}

function toggleAudio(){
	if (!audio){
		audio = !audio;
		for (var x of spin){
			x.volume = 0.5;
		}
		for (var x of coin){
			x.volume = 0.5;
		}
		win.volume = 1.0;
		lose.volume = 1.0;
	}else{
		audio = !audio;
		for (var x of spin){
			x.volume = 0;
		}
		for (var x of coin){
			x.volume = 0;
		}
		win.volume = 0;
		lose.volume = 0;
	}
	document.getElementById("audio").src = "res/icons/audio"+(audio?"On":"Off")+".png";
}

function randomInt(min, max){
	return Math.floor((Math.random() * (max-min+1)) + min);
}


//ajax pour inserer les points au membre
function setCredit() {

	$.ajax({
        url:'credit.php',
        success:function(data)
        {



        }


});
	
}

function setStatusJoueur() {

$.ajax({
	url:'statusjoueur.php',
	success:function(data)
	{



	}


});

}


$(document).ready(function(){


$('#raysDemoHolder').click(function(){


	setCredit();
	setStatusJoueur();
	
})


})




</script>


<script src="js/app.js"></script> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dca7e0e111d8b8d"></script>
</body>
</html>