<?php
require_once __DIR__ . '/config/bootstrap.php';




if (!empty($_GET['id'])) {
    

    $id = $_GET['id'];
  
  }
  
  
  if(isset($_POST['ajouter'])){
  
    
  
    $req6 = $pdo->prepare("INSERT INTO amis (id_membre_1,id_amis_ajouter,date_enregistrement ) VALUES(:id_membre_1, :id_amis_ajouter,NOW())");
    $req6->bindParam(':id_membre_1', getMembre()['id_membre'], PDO::PARAM_INT);
              $req6->bindParam(':id_amis_ajouter', $_GET['id']);
              $req6->execute();
      $req6->closeCursor();
  
    
      $reqmessage = $pdo->prepare(
        'INSERT INTO message(membre_id1, membre_id2, message, date_enregistrement, lu)
        VALUES (:membre_id1, :membre_id2,"Vous a demandé en amis...", NOW(), :lu)'
    );
    $reqmessage->bindParam(':membre_id1', getMembre()['id_membre'], PDO::PARAM_INT);
    $reqmessage->bindParam(':membre_id2', $_GET['id']);
    $reqmessage->bindValue(':lu',0);
    $reqmessage->execute();
    
    
    }
  
  
  
  
  //traitement afficher les derniers membres
  
  
  function Annoncesdernierpublier(PDO $pdo) : array
  {
      $req = $pdo->query(
          'SELECT *
          FROM membre
          WHERE civilite ="femme"
          LIMIT 0, 5'
      );
  
      $posts = $req->fetchAll(PDO::FETCH_ASSOC);
      return $posts;
  }
  
  function Annoncesdernierpublier1(PDO $pdo) : array
  {
      $req1 = $pdo->query(
          'SELECT *
          FROM membre
          WHERE civilite ="homme"
          ORDER BY date_enregistrement DESC LIMIT 6, 9'
      );
  
      $posts1 = $req1->fetchAll(PDO::FETCH_ASSOC);
      return $posts1;
  }
  
  
  if (!empty($_GET['id'])) {
      
  
      $id = $_GET['id'];
    
    }
  
  
  
  
  
    $req = $pdo->prepare('SELECT COUNT(*) as totalcadeaux FROM cadeau WHERE beneficiaire_id = ?');
   
    $req->execute(array($id));
    $datas = $req->fetch(PDO::FETCH_OBJ);
    
  
  //calcule distance
  $requete = $pdo->prepare("SELECT * FROM membre WHERE id_membre = :id_membre ");
  $requete->bindParam(':id_membre',getMembre()['id_membre'], PDO::PARAM_INT);
  $requete->execute();
  $dnes = $requete->fetch(PDO::FETCH_OBJ);
  $lat1 = $dnes->lat;
  $lng1 = $dnes->lng;
  //var_dump($lat1);
  
  
    
  
  $req =$pdo->prepare('SELECT * FROM membre  WHERE id_membre=?');
  $req->execute(array($id));
  $item = $req->fetch();
  
  $lat2 = $item['lat'];
  $lng2 = $item['lng'];
  
  
  
  $distance = (round(get_distance_m($lat1, $lng1, $lat2, $lng2) / 1000,
  3)). ' km' ;
  //echo (round(get_distance_m($lat1, $lng1, $lat2, $lng2) / 1000,
  //3)). ' km';
     // affiche 391.613 km
  
  
  //fin calcule distance
  
  
  if ($item['civilite'] = 'homme') {
      $civilite='Monsieur';
    }else{
    
        $civilite='Femme';
    }
  $woman = $civilite='Femme';
  $man = $civilite='Monsieur';
  
  $page_title = 'membre'; # Pour la balise <title>
  
  
  
  
  
  //  afficher tout les champs tout les champs lu 
  
  
  if(isset($_POST['repondre'])){
  
      if(empty($_POST['message'])||strlen($_POST['message'])>255){
  echo 'vide message';
        }else{
            $req = $pdo->prepare(
                'INSERT INTO message(membre_id1, membre_id2, message, date_enregistrement, lu)
                VALUES (:membre_id1, :membre_id2, :message, NOW(), :lu)'
            );
            $req->bindParam(':membre_id1', getMembre()['id_membre'], PDO::PARAM_INT);
            $req->bindParam(':membre_id2', $_GET['id']);
            $req->bindParam(':message', $_POST['message']);
           
            $req->bindValue(':lu',0);
            $req->execute();
        }
   
      
    }

  
  elseif(isset($_POST)) {
      extract($_POST);
     $req = $pdo->prepare("INSERT INTO cadeau (src,nom_cadeau,donateur_id,beneficiaire_id) VALUES ('https://www.smartphonefrance.info/news/SPF9787878746549849865.png','boite1',:donateur_id,:beneficiaire_id)");
     $req->execute(array(
      ':donateur_id'=>getMembre()['id_membre'],
  
       ':beneficiaire_id'=>$_GET['id']
  ));
      $req->closeCursor();
  }


include __DIR__ . '/config/header.php';
?>
<style>

#wrapper{
    background: rgb(110, 110, 110);
    padding: 5px;
    width: 905px;
    margin: auto;
}

#chat{width: 800px;
    height: 500px;
    overflow: auto;
    border: solid black 2px;
    background: rgb(245, 243, 243);
    margin-bottom: 10px ;

}
textarea{
    background: rgb(230, 74, 74);
    width: 800px;
    background: rgb(245, 243, 243);

}

.single-message{

    padding: 5px 0px 0px;
    border:1px solid rgb(92, 90, 90);

}

 span{
    float: right;
}
</style>





    <div id="wrapper" >
<h1>Welcome to my chat php</h1>

<div id="chat">

</div>






<form action="" method="POST" id="messageFrm">
    
           <textarea name="message"  cols="110" rows="10" class="textarea">
           
           </textarea>

           <button name="envoie" class="envoie dodgerblue"> envoie </button>

           
    </form>

    </div>

<script>
    
    

LoadChat();

setInterval(function(){

    LoadChat();

},1000);


    

  function LoadChat(){

    $.post('messages.php?action=getMessages' , function(response){

        var scrollpos = $('#chat').scrollTop();
        var scrollpos = parseInt(scrollpos) + 520;
        var scrollHeight = $('#chat').prop('scrollHeight');

        $('#chat').html(response);

        if(scrollpos < scrollHeight){

        }else{
            $('#chat').scrollTop($('#chat').prop('scrollHeight'));
        }

    });
  }

    $('.textarea').keyup(function(e){

        if (e.which == 13) {
            $('form').submit();
     
        }

     

    });
    $('form').submit(function(){

        var message = $('.textarea').val();

        $.post('messages.php?action=sendMessage&message='+ message, function(response){

            //alert(response);

            if (response ==1) {
                LoadChat();
               document.getElementById('messageFrm').reset();
                
            }

        });
        return false; 

    });
</script>


    
</body>
    



