<?php
require_once __DIR__ . '/config/bootstrap.php';

if (!empty($_GET['id'])) {
    

    $id = $_GET['id'];
  
  }
  
include __DIR__ . '/config/header.php';


?>
<style>
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  text-align:center;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;

}

.sidenav a:hover{
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}






    
    div.scrollmenu {
   
   overflow: auto;
   white-space: nowrap;
  
   border-radius:20px;
   
  }
  .bro{
   display: inline-block;
   color: black;
   
   position:relative;
   
   
   z-index:1;
   
   
  }
  div.pepa {
   display: inline-block;
   color: black;
  
   padding: 14px;
   text-decoration: none;
 }
 
  div.scrollmenu a{
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
 width: 0px; /* remove scrollbar space */ 
 background: transparent; /* optional: just make scrollbar invisible */ 
 }
 .chat,.zone_mss{

    overflow: auto;
    /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#f2f5f6+0,e3eaed+22,e3eaed+64,c8d7dc+100 */
    background: #f2f5f6; /* Old browsers */
              background: -moz-linear-gradient(top,  #f2f5f6 0%, #e3eaed 22%, #e3eaed 64%, #c8d7dc 100%); /* FF3.6-15 */
              background: -webkit-linear-gradient(top,  #f2f5f6 0%,#e3eaed 22%,#e3eaed 64%,#c8d7dc 100%); /* Chrome10-25,Safari5.1-6 */
              background: linear-gradient(to bottom,  #f2f5f6 0%,#e3eaed 22%,#e3eaed 64%,#c8d7dc 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
              filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f5f6', endColorstr='#c8d7dc',GradientType=0 ); /* IE6-9 */


 }
 p >i{

     font-size:10px;
     color:red;
 }
 h1, h3{color:black;!important}
 .zone_mss{
   
   height: 400px;
 }
 </style>


<div class="row mt-4" >
    <div class="col-12 badge-light border text-center mb-4 chat" > <h3><b><?= ucfirst(getMembre()['pseudo'])?></b> chatter avec vos amis .</h3>  </div>
</div>


<?php



   $req = $pdo->query("SELECT DISTINCT * FROM amis WHERE id_membre_1 = '.$id.' OR  id_amis_ajouter = '.$id.' AND friend = 1");

   $req->execute();

?>










<?php  $rt = $pdo->prepare("SELECT amis.id_amis_ajouter,amis.id_membre_1 ,membre.id_membre,membre.photo1,membre.pseudo,membre.town  
       FROM membre,amis 
       WHERE membre.id_membre = amis.id_membre_1
       AND amis.id_amis_ajouter = '.$id.'
       AND friend = 1");
       $rt->execute();
       ?>
<!----profil des amis-->
<div class="scrollmenu">
<?php while($mbre = $rt->fetch(PDO::FETCH_OBJ)):?>
    <div class="pepa">
                    <img src="assets/img/<?php echo $mbre->photo1 ; ?>" alt="..." 
                     style="width:110px;height:110px;border-radius:80px;"  onclick="openNav()">
                     <p class="mt-2 bg-light rounded border border-dark">
                       <b> <?php echo ucfirst($mbre->pseudo);?> </b> | <i class="fa fa-circle" aria-hidden="true"></i> <?php echo ucfirst($mbre->town);?>
                        
                     </p>
                     
    </div>                
 <?php endwhile;?>
 
     <?php  $ramis = $pdo->prepare("SELECT amis.id_amis_ajouter ,amis.id_membre_1 ,membre.id_membre,membre.photo1,membre.pseudo,membre.town 
            FROM membre,amis 
            WHERE membre.id_membre = amis.id_amis_ajouter 
            AND  amis.id_membre_1 = $id
            AND friend = 1");
            $ramis->execute();
      ?>
     <?php while($mbreAjout = $ramis->fetch(PDO::FETCH_OBJ)):?>
       
        
    <div class="pepa">
            <img src="assets/img/<?php echo $mbreAjout->photo1 ;?>" alt="..." 
           style="width:110px;height:110px;border-radius:80px;" >
        <p class="mt-2 bg-light rounded border border-dark">
            <b>  <?php echo ucfirst($mbreAjout->pseudo);?> </b>| <i class="fa fa-circle" aria-hidden="true"></i>  <?php echo ucfirst($mbreAjout->town);?>
        </p>
           

           </div>
        
        
        
        
        <?php endwhile;?>
        
    </div>
    <!----profil des amis-->
    <!--le chat--->

    <div class="container-fluid">
      <div class="row">
        <div class="col-12 zone_mss">
        
        </div>
      </div>
    </div>

   



   
    
       <!---formulaire--->

           

    <form action="#" class="bg-light">
          <div class="input-group">
                <input type="text" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                <div class="input-group-append">
                  <button id="button-addon" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
                </div>
          </div>
    </form>
                     
                    
           



            <!---formulaire--->
      <!--le chat--->
  </body> 
  </html>