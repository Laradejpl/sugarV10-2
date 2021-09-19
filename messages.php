<?php

require_once __DIR__ . '/config/bootstrap.php';
//var_dump(getMembre()['pseudo']);
         switch ($_REQUEST['action']) {
             case 'sendMessage':
                 $req = $pdo->prepare("INSERT INTO messages ( user,message) VALUES(?,?)");
                  $run = $req->execute([getMembre()['pseudo'],$_REQUEST['message']]);
                 
                  if($run){

                    echo 1;
                    exit;

                  }
                
                 
                 break;


                 case 'getMessages' :
                    
                    $req = $pdo->prepare("SELECT * FROM messages ");
                    $run = $req->execute();
                    $chat = "";
                    $rs = $req->fetchAll(PDO::FETCH_OBJ);
                      foreach ($rs as $message) {
                         

                          $chat .= '<div class="single-message">
                            <strong>'.$message->user .'</strong>' . $message->message.'
                          
                        <span style="float:right;"> '.date('d/m/Y',strtotime($message->date)).'</span>
                                   </div>';

                                       
                      }
                   
                       echo $chat;
             
             default:
                 # code...
                 break;
         }

?>