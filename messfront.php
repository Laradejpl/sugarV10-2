<?php 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <style>
       

       

        body {
            padding: 0px;
            margin: 0px;
        }


        div.scrollmenu {

            overflow: auto;
            white-space: nowrap;

            border-radius: 20px;

        }

        .bro {
            display: inline-block;
            color: black;

            position: relative;


            z-index: 1;


        }

        div.pepa {
            display: inline-block;
            color: black;
            text-align: center;

            padding: 14px;
            text-decoration: none;
        }

        div.scrollmenu a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px;
            text-decoration: none;
        }

        div.scrollmenu a:hover {
            background-color: lime;
        }

        ::-webkit-scrollbar {
            width: 0px;
            /* remove scrollbar space */
            background: transparent;
            /* optional: just make scrollbar invisible */
        }

        .chat,
        .badgeprofil {

            overflow: auto;
            max-width: 405px;
            /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#f2f5f6+0,e3eaed+22,e3eaed+64,c8d7dc+100 */
            background: #f2f5f6;
            /* Old browsers */
            background: -moz-linear-gradient(top, #f2f5f6 0%, #e3eaed 22%, #e3eaed 64%, #c8d7dc 100%);
            /* FF3.6-15 */
            background: -webkit-linear-gradient(top, #f2f5f6 0%, #e3eaed 22%, #e3eaed 64%, #c8d7dc 100%);
            /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom, #f2f5f6 0%, #e3eaed 22%, #e3eaed 64%, #c8d7dc 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f2f5f6', endColorstr='#c8d7dc', GradientType=0);
            /* IE6-9 */


        }

        p>i {

            font-size: 10px;
            color: red;
        }

        h5 {}

        h1,
        h3 {
            color: black;
             !important
        }

        .bandMenu {
            background-color: rgb(211, 218, 215);
            height: 740px;
        }


        .fa {
            font-size: 20px;

            margin-bottom: 50px;


        }

        .barre {
            margin-top: 100px;

        }

        .logoW {

            margin-left: -5px;
            margin-top: 5px;

        }

        .firstprof {
            overflow: hidden;
        }

        .status {
            color: red;
        }

        .status_connected {
            color: rgb(64, 200, 64);
        }

        .mssgPro {
            overflow: scroll;
            white-space: nowrap;
            height: 390px;
        }

        .vignette {
            background-color: white;
        }

        .vignette:hover {
            background-color: rgb(231, 231, 231);

        }

        #search {
            background-color: rgb(231, 231, 231);
        }

        .chatarea {

            overflow: auto;
            height: 560px;
        }



        .bubble {
            position: relative;
            font-family: sans-serif;
            font-size: 18px;
            line-height: 24px;
            width: 300px;
            background: rgb(134, 106, 211);
            border-radius: 40px;
            padding: 24px;
            text-align: center;
            color: #000;
        }

        .bubble-reponse {
            position: relative;
            font-family: sans-serif;
            font-size: 18px;
            line-height: 24px;
            width: 300px;
            background: rgb(219, 241, 216);
            border-radius: 40px;
            padding: 24px;
            text-align: center;
            color: #000;
        }

        .bubble-bottom-left:before {
            content: "";
            width: 0px;
            height: 0px;
            position: absolute;
            border-left: 24px solid rgb(134, 106, 211);
            border-right: 12px solid transparent;
            border-top: 12px solid rgb(134, 106, 211);
            border-bottom: 20px solid transparent;
            left: 32px;
            bottom: -24px;
        }

        .bubble-bottom-right:before {
            content: "";
            width: 0px;
            height: 0px;
            position: absolute;
            border-right: 24px solid rgb(219, 241, 216);
            border-left: 12px solid transparent;
            border-top: 12px solid rgb(219, 241, 216);
            border-bottom: 20px solid transparent;
            right: 32px;
            bottom: -24px;
        }


        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: white;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            text-align: center;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;

        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .cons{
            line-height:60px;
            max-height:23px;
           
           }
           .utility{display:none;}
           #mySidenav{display:none;}

           @media all and (max-width: 480px) {
            .bandMenu {
                display: none;
            }

            .formulaire {
                display: none;
            }

            .chatarea {
                display: none;
            }

            .chaty {
                display: none;
            }

            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }

            .bottomNavMobile {
                display: none;
            }
            .utility {
                display: block;
                
            }
            #mySidenav{
                display: block;


            }


        }

        .chatarea_mobile{
            overflow: auto;
            height: 650px;
            }

    </style>
    <title>Document</title>
</head>


<body>


<div id="mySidenav" class="sidenav">
   
     <div class="container-fluid">
         <div class="row  border-bottom">
         
             
               <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
               <div class="col-1 mr-4" style="font-size:2em;">📞</div>
               <div class="col-1 mr-4" style="font-size:2em;">📨</div>
               <div class=" offset-2 col-1 mr-4" style="font-size:2em;"><img src="dingo.jpg" alt="dingo" width="50" height="50"
                        style="border-radius:40px; "></div>

            </div>
     </div>
     
     <div class="container-fluid ">
         <div class="chatarea_mobile">
         <div class="row  ">

          <div class="col-12">

          <div class="bubble bubble-bottom-left mt-4" contenteditable>Hello fine my friend ?</div>
           <img src="dingo.jpg" alt="dingo" style="width:50px;height:50px;border-radius:80px;float: left;"
           class="mt-4">
        </div>



    <div class="col-12">
    <div class="bubble bubble-bottom-right bubble-reponse mt-4 " contenteditable>Type
                                        any text here and the bubble will grow to ?</div>
           <img src="hiphop.png" alt="dingo" style="width:50px;height:50px;border-radius:80px;float: right;"
           class="mt-4">
        </div>
    </div>


    <div class="col-12">

<div class="bubble bubble-bottom-left mt-4 mb-4" contenteditable>rap or reggae i guess ?</div>
 <img src="dingo.jpg" alt="dingo" style="width:50px;height:50px;border-radius:80px;float: left;"
 class="mt-8 ">
</div>


<div class="col-12 ">

<div class="bubble bubble-bottom-left mt-4" contenteditable>rap or reggae i guess ?</div>
 <img src="dingo.jpg" alt="dingo" style="width:50px;height:50px;border-radius:80px;float: left;"
 class="mt-8">
</div>

<div class="col-12">
    <div class="bubble bubble-bottom-right bubble-reponse mt-4 " contenteditable>Type
                                        any text here and the bubble will grow to ?</div>
           <img src="hiphop.png" alt="dingo" style="width:50px;height:50px;border-radius:80px;float: right;"
           class="mt-4">
        </div>
    </div>




    </div>

      </div>
    </div>

    



  





  </div>



</div>





    <!--main---container-->
    <div class="container-fluid ">
        <div class="row d-flex justify-content-start">

            <!--colonne menu(1)-->
            <div class="col-0 col-sm-1  bandMenu">

                <div class="col-12 "><img src="weed.png" alt="..." class="logoW " width="50"></div>

                <div class="barre">
                    <div class="col-12 mt-4"><i class="fa fa-user-o" aria-hidden="true"></i></div>
                    <div class="col-12 mt-4"><i class="fa fa-commenting-o" aria-hidden="true"></i></div>
                    <div class="col-12 mt-4"><i class="fa fa-cog" aria-hidden="true"></i></div>
                    <div class="col-12 mt-4"><i class="fa fa-users" aria-hidden="true"></i></div>
                    <div class="col-12 mt-4"><i class="fa fa-moon-o" aria-hidden="true"></i></div>

                </div>
                <div class="col-12 "><img src="dingo.jpg" alt="dingo" width="50" height="50"
                        style="border-radius:40px; "></div>

            </div>
            <!--colonne menu(1)-->

            <!--colonne menu-profil et message(2)-->
            <div class="col-12 col-sm-3 badgeprofil ml-1 ">
                <div class="firstprof">
                    <h4>Chats</h4>
                    <div class="row d-flex justify-content-center">
                        <div class="col-11">

                            <form class="d-flex">
                                <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search"
                                    id="search">

                            </form>
                        </div>
                    </div>


                    <!--barre de -profiles-->
                    <div class="scrollmenu">

                        <div class="pepa">
                            <img src="dingo.jpg" alt="dingo" style="width:70px;height:70px;border-radius:80px;"
                                onclick="openNav()">
                            <p class="mt-2 bg-light rounded border border-dark">
                                <b>Dingo</b> <span class="status_connected" cursor:pointer" onclick="openNav()">●</span>
                            </p>

                        </div>

                        <div class="pepa">
                            <img src="ours.jpeg" alt="dingo" style="width:70px;height:70px;border-radius:80px;"
                                onclick="openNav()">
                            <p class="mt-2 bg-light rounded border border-dark">
                                <b>Ours</b> <span class="status">●</span></i>
                            </p>

                        </div>

                        <div class="pepa">
                            <img src="hiphop.png" alt="dingo" style="width:70px;height:70px;border-radius:80px;"
                                onclick="openNav()">
                            <p class="mt-2 bg-light rounded border border-dark">
                                <b>Hiphop</b> <span class="status">●</span>
                            </p>

                        </div>


                        <div class="pepa">
                            <img src="rasta.png" alt="dingo" style="width:70px;height:70px;border-radius:80px;"
                                >
                            <p class="mt-2 bg-light rounded border border-dark">
                                <b>Rasta</b> <span class="status">●</span></i>
                            </p>

                        </div>

                    </div>
                    <!--barre de -profiles---->
                    <h5>Récent</h5>

                    <!--messages en colonne ---->
                    <div class="container-fluid ">
                        <div class="row  d-flex justify-content-center">
                            <div class="mssgPro">

                                <div class="col-12  mb-2 rounded vignette">

                                    <img src="dingo.jpg" alt="dingo" style="width:50px;height:50px;border-radius:80px;" >
                                    <span style="float: right;  " >23:07</span>
                                    <p> <b>dingo</b><span class="status_connected">●</span></p>
                                    <p>skjdksjdkjskdjksdjksjdkjskdjksjdjksdjksdjk</p>
                                </div>

                                <div class="col-12  mb-2 rounded vignette">

                                    <img src="rasta.png" alt="rasta" style="width:50px;height:50px;border-radius:80px;" onclick="closeNav()">
                                    <span style="float: right; " >08:02</span>
                                    <p> <b>rasta</b><span class="status">●</span> </p>
                                    <p>skjdksjdkjskdjksdjksjdkjskdjksjdjksdjksdjk</p>
                                </div>

                                <div class="col-12  mb-2 rounded vignette">

                                    <img src="ours.jpeg" alt="ours" style="width:50px;height:50px;border-radius:80px;">
                                    <p> <b>ours</b><span class="status">●</span> </p>
                                    <p>skjdksjdkjskdjksdjksjdkjskdjksjdjksdjksdjk</p>
                                </div>

                                <div class="col-12  mb-2 rounded vignette">

                                    <img src="hiphop.png" alt="hiphop"
                                        style="width:50px;height:50px;border-radius:80px;">
                                    <p> <b>hiphop</b><span class="status">●</span> </p>
                                    <p>skjdksjdkjskdjksdjksjdkjskdjksjdjksdjksdjk</p>
                                </div>





                            </div>
                        </div>
                    </div>
                    <!--messages en colonne ---->




                </div>


            </div>
            <!--colonne menu-profil et message(2)-->

            <!--colonne menu_chat(3)-->
            <div class="  col-7  chaty">
                <!--colonne menu_chat horizontale-->
                <div class="container bg-light rounded">
                    <div class="row  border-bottom  ">
                        <div class="col-2 ">
                            <img src="dingo.jpg" alt="dingo"
                                style="width:50px;height:50px;border-radius:80px;"><span><b>Dingo</b></span>
                        </div>

                        <div class="col-1 offset-8">
                            <i class="fa fa-phone" aria-hidden="true" style="line-height:50px;"></i>
                        </div>
                        <div class="col-1">
                            <i class="fa fa-video-camera" aria-hidden="true" style="line-height:50px;"></i>

                        </div>

                    </div>
                </div>
                <!--colonne menu_chat horizontale-->

                <!--Lechat -->
                <div class="container chatarea border border-light rounded">
                    <div class="row">
                        <div class="col-7">

                            <div class="row">
                                <div class="col-1">
                                    <div class="bubble bubble-bottom-left mt-4" contenteditable>Hello fine? ?</div>
                                    <img src="dingo.jpg" alt="dingo" style="width:50px;height:50px;border-radius:80px;"
                                        class="mt-4">



                                </div>
                            </div>

                            <div class="row">
                                <div class="offset-11">

                                    <div class="bubble bubble-bottom-right bubble-reponse mt-4 " contenteditable>Type
                                        any text here and the bubble will grow to ?</div>
                                    <img src="dingo.jpg" alt="dingo"
                                        style="width:50px;height:50px;border-radius:80px;float:right;">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-1">

                                    <div class="bubble bubble-bottom-left mt-4" contenteditable>Type any text here and
                                        the bubble will grow to ?</div>
                                    <img src="dingo.jpg" alt="dingo" style="width:50px;height:50px;border-radius:80px;"
                                        class="mt-4">

                                </div>
                            </div>

                            <div class="row">
                                <div class="offset-11">
                                    <div class="bubble bubble-bottom-right bubble-reponse mt-4" contenteditable>dingo is
                                        crazy dont you know ?</div>
                                    <img src="dingo.jpg" alt="dingo"
                                        style="width:50px;height:50px;border-radius:80px;float:right;" class="mt-4">
                                </div>
                            </div>
                            <div class="bubble bubble-bottom-left mt-4" contenteditable>dingo is crazy dont you know ?
                            </div>
                            <img src="dingo.jpg" alt="dingo" style="width:50px;height:50px;border-radius:80px;"
                                class="mt-4">



                        </div>
                    </div>
                </div>

                <!--Lechat -->

                <!---formulaire-->



                <form action="#" class="bg-light formulaire">
                    <div class="input-group">
                        <input type="text" placeholder="Type a message" aria-describedby="button-addon2"
                            class="form-control rounded-0 border-0 py-4 bg-light">
                        <div class="input-group-append">
                            <button id="button-addon" type="submit" class="btn btn-link"> <i
                                    class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </form>


                <!---formulaire-->









            </div>

            <!--colonne menu_chat(3)-->




        </div>
    </div>
    <!--main---container-->
    <!---utilitaire-->
    <div class="container-fluid utility">
        <div class="row">
            <div class="offset-0 offset-sm-1 "></div>
            <div class="col-12 col-sm-3 ">

                <div class="row d-flex justify-content-around utility bg-light">

                    <div class="col-1 cons" style="font-size:2em;">💬</div>

                    <div class="col-1 cons" style="font-size:2em;">⚙️</div>

                    <div class="col-1 cons" style="font-size:2em;">👩‍❤️‍💋‍👨</div>

                    <div class="col-1 cons" style="font-size:2em;">🎨</div> 



                </div>


            </div>
            <div class="offset-0 offset-sm-7"></div>





        </div>
    </div>
    <!---utilitaire-->


    <script>

        /* Open the sidenav */
        function openNav() {
            document.getElementById("mySidenav").style.width = "100%";
        }

        /* Close/hide the sidenav */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

    </script>



</body>

</html>