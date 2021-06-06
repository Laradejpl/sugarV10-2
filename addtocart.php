<?php
require_once __DIR__ . '/config/bootstrap.php';




?>




    <style>




*{
  padding: 0;
  margin: 0;
  text-decoration: none;
  list-style: none;
  box-sizing: border-box;
}
body{
  font-family: montserrat;
}
nav{
  background: #0082e6;
  height: 80px;
  width: 100%;
}
label.logo{
  color: white;
  font-size: 35px;
  line-height: 80px;
  padding: 0 100px;
  font-weight: bold;
}
nav ul{
  float: right;
  margin-right: 20px;
}
nav ul li{
  display: inline-block;
  line-height: 80px;
  margin: 0 5px;
}
nav ul li a{
  color: white;
  font-size: 17px;
  padding: 7px 13px;
  border-radius: 3px;
  text-transform: uppercase;
}
a.active,a:hover{
  background: #1b9bff;
  transition: .5s;
}
.checkbtn{
  font-size: 30px;
  color: white;
  float: right;
  line-height: 80px;
  margin-right: 40px;
  cursor: pointer;
  display: none;
}
#check{
  display: none;
}
@media (max-width: 952px){
  label.logo{
    font-size: 30px;
    padding-left: 50px;
  }
  nav ul li a{
    font-size: 16px;
  }
}
@media (max-width: 858px){
  .checkbtn{
    display: block;
  }
  
  ul{
    position: fixed;
    width: 100%;
    height: 100vh;
    background: #2c3e50;
    top: 80px;
    left: -100%;
    text-align: center;
    transition: all .5s;
  }
  nav ul li{
    display: block;
    margin: 50px 0;
    line-height: 30px;
  }
  nav ul li a{
    font-size: 20px;
  }
  a:hover,a.active{
    background: none;
    color: #0082e6;
  }
  #check:checked ~ ul{
    left: 0;
  }
}
section{
  background: url(bg1.jpg) no-repeat;
  background-size: cover;
  height: calc(100vh - 80px);
}
@media screen and (min-width: 500px) and (max-width: 3040px) {
    .stpe
  {
    width:200px;
    height:100px
  }

}
    
    * {
    margin: 0;
    padding: 0;
}
body {
  background: linear-gradient(10deg,#00ff00,#262630,#000);
    font: normal 13px/1.5;
    font-family: 'Roboto Condensed', sans-serif;
    color: #333;
}
.wrapper {
    width: 1090px;
    margin: 20px auto;
    padding: 20px;
}
h1 {
    display: inline-block;
    background-color: #fff;
    color: #ef4478;
    font-size: 16px;
    font-weight: normal;
    text-transform: uppercase;
    padding: 4px 20px;
    float: left;
    border-radius: 50px;
}
img
{

    width:100%;
}
        
.clear {
    clear: both;
}
.items {
    display: block;
    margin: 20px 0;
}
.item {
    background-color: #fff;
    float: left;
    margin: 0 4px 4px 0;
    width: 330px;
   
    padding: 5px;
     
}
.item img {
    display: block;
    margin: auto;
}
h2 {
    font-size: 12px;
    display: block;
    border-bottom: 1px solid #ccc;
    margin: 0 0 10px 0;
    padding: 0 0 5px 0;
}
button {
    border: 1px solid #ef4478;
    padding: 4px 14px;
    background-color: #ef4478;
    color: #fff;
    text-transform: uppercase;
    float: right;
    margin: 5px 0;
    font-weight: 400;
    cursor: pointer;
    font-family: 'Roboto Condensed', sans-serif;
    border-radius: 50px;
    
}
        button:focus{
            outline: none !important;
        }
span {
    float: right;
}
        
        p{
            font-size: 24px;
        }
.shopping-cart {
    display: inline-block;
    background: url(cart.png) no-repeat 0 0;
    width: 24px;
    height: 24px;
    margin: 0 5px 0 0;
}
nav
{
  width:100%;
}
.menunon
{
    display: flex;
  flex-wrap: nowrap;
justify-content: space-around;

}



.cont
{
  display:none;
  display: flex;
  flex-direction: column;
}
.titreR
{

  font-size: 3em;
  font-family: 'Orbitron', sans-serif;
}
    
    </style>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add to cart animation effect</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="https://fonts.googleapis.com/css?family=Anton|Orbitron&display=swap" rel="stylesheet">

     <head/>

    <a  class="titreR" href="accueil.php" style="color: red;"><b style="color:green;">Reggae</b> <b style="color:red;">R</b><b style="color:yellow;" >encontre</b> </a>
<br><br>
  
 <hr style="color:white;"> 





    
   <br><br><br>

   <h1 style="font-size:3em;color:black;background-color:white;padding:5px;text-align:center">REGGAE SHOP</h1> <br><br><br><br>

    <!-- wrapper -->
<div class="wrapper">
     <h2 style="font-size:30px;color:white;">Nos produits</h2> 
 <span  ><i class="shopping-cart" ></i></span>  <a href="#"><span style="font-size:2em;color:white;text-decoration:underline;">Panier</span></a> 

    <div class="clear"></div>
    <!-- items -->
    <div class="items">
        <!-- single item -->
        <div class="item">
            <img src="yesI.png" alt="item"  />
            <br>
             <h2>YES I</h2>

            <p>Forfait:BS
            </p>
            <button class="add-to-cart" type="button">Add to cart</button>
        </div>
        <!--/ single item -->
        <!-- single item -->
        <div class="item">
            <img src="jamaicamod.png" alt="item" />
            <br>
             <h2>JAMAICAN FLAG</h2>

            <p>Forfait:BS
            </p>
            <button class="add-to-cart" type="button">Add to cart</button>
        </div>
        <!--/ single item -->
        <!-- single item -->
        <div class="item">
            <img src="trojan.png"alt="item" />
            <br>
             <h2>TROJAN GIRLY</h2>

            <p>Forfait:Chillout
            </p>
            <button class="add-to-cart" type="button">Add to cart</button>
            
        </div>

        <div class="item">
            <img src="rasta.png"alt="item" />
            <br>
             <h2>RASTA FLAG</h2>

            <p>Forfait:Chillout
            </p>
            <button class="add-to-cart" type="button">Add to cart</button>
            
        </div>
        <div class="item">
            <img src="jamaicanflag.png"alt="item" />
            <br>
             <h2>Jamaican flag 2</h2>

            <p>Forfait:BS 
            </p>
            <button class="add-to-cart" type="button">Add to cart</button>
            
        </div>
        <div class="item">
            <img src="ska.png"alt="item" />
            <br>
             <h2>TWO TONE badge</h2>

            <p>Forfait:Easy
            </p>
            <button class="add-to-cart" type="button">Add to cart</button>
            
        </div>
        <div class="item">
            <img src="psg.png"alt="item" />
            <br>
             <h2>PARIS Reggae firm</h2>

            <p>Forfait:Easy
            </p>
            <button class="add-to-cart" type="button">Add to cart</button>
            
        </div>
        <div class="item">
            <img src="masiv1.png"alt="item" />
            <br>
             <h2 style="font-weight: bolder;">972 MASSIV</h2>

            <p>Forfait:BS 
            </p>
            <button class="add-to-cart" type="button">Add to cart</button>
            
        </div>
        <div class="item">
            <img src="lionkings.png "alt="item" />
            <br>
             <h2> REGGAE KINGS</h2>

            <p>Forfait:Easy
            </p>
            <button class="add-to-cart" type="button">Add to cart</button>
            
        </div>
       
        
        <!--/ single item -->
    </div>
    <!--/ items -->
</div>
<!--/ wrapper -->
<img src="assets/img/logostripe_res.png" alt="stripe" class="stpe">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="js/scripts.js">

</script>


</body>
</html>