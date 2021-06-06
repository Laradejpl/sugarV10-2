<?php
require_once __DIR__ . '/config/bootstrap.php';

/*if (getMembre() === null ) {
	header('Location: index.php');//si tu n'est pas connecter ont vas a index.php
  }

  $rq = $pdo->prepare('SELECT * FROM membre where id_membre = :id_membre');
  $rq->bindParam(':id_membre',getMembre()['id_membre'], PDO::PARAM_INT);
  $rq->execute();
  $dta = $rq->fetch(PDO::FETCH_ASSOC);*/

  $page_title = 'quizz'; # Pour la balise <title>

include __DIR__ . '/config/header.php';
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quizzboot</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cerulean/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<style>

#modaal
{
  position: relative;
 margin-left: -4000px;
 margin-top: -900px;
 transition: 2s;
  height:200px;
  width:200px;
  z-index:2;
}
#pop
{
  position: relative;
  
  color: red;
  z-index: 3;

}

button {
height: 40px;
/*width: 200px;*/
outline: none;
background: white;
border: black solid 2px;
}

button:active {
background: blue;
}
</style>
<div id="main">
  <div class="container" style="-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);
box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);">
    <div class="row">
      <div class="col-3 bg-secondary rounded-pill mt-2 mb-2">
        <a href="accueil.php">Accueil</a>
      </div>
    </div>
  </div>
<div class="container-fluid">
  <div class="row">
      <div class="col-10 bg-dark" style="height:200px;">
        
          <h1 align=center>Testez vos connaissances</h1>
          <div class="row d-flex justify-content-between">
          <div class="col-md-6 col-6 bg-success " style="color:white; font-size: 1.5em;border:2px solid white;-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);
box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);">SCORE</div>
          <div class="col-md-3 col-3 mt-4" id="score" style="font-size:2em;color:red;">0</div>
      </div>

      </div>
      <div class="col-2 bg-success p-1" id="starting" align=center; style="height:200px;color:white;font-size:2em;" onclick="chrono()"> GO!

  </div>
  <div class="col-12" id="status" style="color:red;font-size:3em;"></div>

</div>
</div>




<div class="container-fluid">
  <div class="row">
      <div class="col-12 bg-primary" style="height:200px;">
          <div class="row">
          <div class="col-8 bg-danger  mt-4" style="color:white;" align=center>QUESTION</div>
          </div>
          <div class="row">
          <h2 class="col-8 mt-4 bg-info rounded-pill" id="question" style="text-shadow: 3px 3px #ff0000;-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);
box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);"></h2>
      </div>
      <div class="row">
       <div class="col-12" id="status" style="color:red;font-size:1.5em;"></div>
      </div>
      </div>
     
  </div>
</div>



<!------REPONSE A-->
<div class="container" >
<div class="row"style="z-index:1;">
  <div class="col-md-6 col-6 bg-danger  mt-4 rounded-pill" style="color:white;-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);
box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);">REPONSE A</div>
  <div class="col-md-6 col-6 mt-4"  ><button id="answerA" onclick="answerA_clicked()"> </button></div>
</div>
</div> 
<!------REPONSE A-->
<!------REPONSE B-->
<div class="container">
<div class="row">
  <div class="col-md-6 col-6 bg-danger  mt-4 rounded-pill" style="color:white;-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);
box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);">REPONSE B</div>
  <div class="col-md-6 col-6 mt-4" ><button id="answerB" onclick="answerB_clicked()"> </button></div>
</div>
</div> 


<!------REPONSE B-->

<!------REPONSE C-->
<div class="container">
<div class="row">
  <div class="col-md-6 col-6 bg-danger  mt-4 rounded-pill" style="color:white;-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);
box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.19);">REPONSE C</div>
  <div class="col-md-6 col-6 mt-4" ><button id="answerC" onclick="answerC_clicked()"> </button></div>
</div>
</div> 
<!------REPONSE C-->
</div>
<img src="gagnez.png" alt=".." id="modaal">


<script>


//variables
var quiz = [];
quiz[0] = new Question( "What is 1/4 of 100?", "25", "24", "23");
quiz[1] = new Question("What color is blood?", "Red", "White", "Green");
quiz[2] = new Question("What color is grass?", "Green", "White", "Red");
quiz[3] = new Question("How many legs does a spider have?", "8", "6", "4");
quiz[4] = new Question("Who is the king of the Netherlands?", "Willem-Alexander", "Willem-Alexzelf", "Willem-Alexniemand");
quiz[5] = new Question("What is 2-2?", "0", "2", "4");
quiz[6] = new Question("What was Vincent van Gogh?", "Artist", "Baker", "Jobless");
quiz[6] = new Question("bob est?", "un rasta", "anglais", "un tekel");

// autres questions

var quiz1 = [];
quiz[0] = new Question( "marcus garvey est?", "jamaicain", "martiniquais", "americain");
quiz[1] = new Question("musolini est?", "l'empreur d'italie", "un malade", "italien");
quiz[2] = new Question("barak obama a été élu combien de fois?", "1", "2", "4");


var randomQuestion;
var answers = [];
var currentScore = 0;

document.addEventListener("DOMContentLoaded", function(event) { 
btnProvideQuestion();
});

function Question(question,rightAnswer,wrongAnswer1,wrongAnswer2) {
this.question = question;
this.rightAnswer = rightAnswer;
this.wrongAnswer1 = wrongAnswer1;
this.wrongAnswer2 = wrongAnswer2;
};

function shuffle(o) {
for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
return o;
};

function btnProvideQuestion() { 

var randomNumber = Math.floor(Math.random()*quiz.length);
randomQuestion = quiz[randomNumber]; //getQuestion
answers = [randomQuestion.rightAnswer, randomQuestion.wrongAnswer1, randomQuestion.wrongAnswer2];
shuffle(answers);

document.getElementById("question").innerHTML= randomQuestion.question;
document.getElementById("answerA").value= answers[0];
document.getElementById("answerA").innerHTML= answers[0];
document.getElementById("answerB").value= answers[1];
document.getElementById("answerB").innerHTML= answers[1];
document.getElementById("answerC").value= answers[2];
document.getElementById("answerC").innerHTML= answers[2];

}

function answerA_clicked() {
var answerA = document.getElementById("answerA").value;
checkAnswer(answerA);
}

function answerB_clicked() {
var answerB = document.getElementById("answerB").value;
checkAnswer(answerB);
}
function answerC_clicked() {
var answerC = document.getElementById("answerC").value;

checkAnswer(answerC);
}

function adjustScore(isCorrect) {
debugger;
if (isCorrect) {
currentScore++;
} else {
if (currentScore > 0) {
currentScore--;
}
}
document.getElementById("score").innerHTML = currentScore;
}

function checkAnswer(answer) {  
if (answer == randomQuestion.rightAnswer) {
adjustScore(true);
btnProvideQuestion();
} else { 
alert("Mauvaise reponse!");
adjustScore(false);
}	  
}


//chrono

function countDown(secs,elem) {
var element = document.getElementById(elem);
element.innerHTML = ""+secs+" seconds";
if(secs < 1) {
clearTimeout(timer);
element.innerHTML = " vous avez gagnez"+" "+currentScore +" "+"points" ;

//document.getElementById('modaal').style.display="block";
document.getElementById('modaal').style.marginLeft="100px";
document.getElementById("modaal").innerHTML = currentScore;
document.getElementById("main").style.filter = "grayscale(100%)";
document.getElementById('starting').style.display="none";
document.getElementById('answerA').style.display="none";
document.getElementById('answerB').style.display="none";
document.getElementById('answerC').style.display="none";

/*setTimeout(function(){
document.getElementById('modaal').style.display = "none";}
, 3000);*/

// element.innerHTML += '<a href="#">Click here now</a>';
}
secs--;
var timer = setTimeout('countDown('+secs+',"'+elem+'")',1000);//10second
}

//chrono

</script>

<script>

function chrono(){


countDown(10,"status");

}

</script>


</body>
</html>