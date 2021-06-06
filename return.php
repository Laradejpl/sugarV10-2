<?php
require_once __DIR__ . '/config/bootstrap.php';
require('paypal.class.php');

if(!empty($_GET['token'])) //si on a bien le token
{
	 //on le stocke en paramètre pour le prochaine envoi
	 $params = array(
			'TOKEN'=>htmlentities($_GET['token'], ENT_QUOTES)
		);
		
		$paypal = new Paypal();
		$response = $paypal->request('GetExpressCheckoutDetails',$params); //on envoi notre requête vers l'api
		if(is_array($response) && $response['ACK']=='Success') //si l'appel s'est bien passé
		{
				 $custom = htmlentities($response['CUSTOM']);
				 //on extrait la valeur du champ custom pour récupérer l'id de l'article voulu
				 $custom = explode(':',$custom);
				 $article_id = $custom[1];
				 $req = $pdo->prepare('SELECT * FROM articles WHERE id_articles=:articles_id');
				 $req->execute(array(':articles_id'=>$articles_id));
				 $data = $req->fetch(PDO::FETCH_OBJ);
				 if($data->prix != $response['AMT']){return;} //on vérifie que le prix correspond bien avec celui de l'article
				 
				 //on définit d'autres paramètres pour le dernier appel qui va nous servir à finaliser la transaction
				 $payment_params = array(
						'CURRENCYCODE'=>'EUR',
						'PayerID'=>htmlentities($_GET['PayerID'], ENT_QUOTES), //l'id du payer
						'PAYMENTACTION'=>'Sale', //le même que dans ExpressCheckout
						'AMT'=>$data->prix //le prix de l'objet
				 );
				 
				 $params += $payment_params; //on cumul tous les paramètres dans 1 seul tableau
				 
				 $paypal = new Paypal();
				 $response = $paypal->request('DoExpressCheckoutPayment',$params); //on finalise le paiement
				 
				 if(is_array($response) && $response['ACK']=='Success') //si l'appel s'est passé avec succès, on a reçu le paiement
				 {
						$datas = serialize($response); //on sérialize les données d'information renvoyées sur le paiement
						//on insert les données renvoyés dans notre table vente
						$req = $pdo->prepare('INSERT INTO vente (articles_id,datas) VALUES (:articles_id,:datas)');
						$req->execute(array(':articles_id'=>$articles_id,':datas'=>$datas));
						
						echo 'Merci pour votre achat !'; //remerciement, logiquement on envoie un mail au client etc.........
				 }
				 else
				 {
						echo 'Une erreur s\'est produite : <br> '.$response['L_LONGMESSAGE0']; //si echec on affiche le message d'erreur détaillé
				 }
		}
		else
		{
			echo 'Une erreur s\'est produite : <br> '.$response['L_LONGMESSAGE0']; //si echec on affiche le message d'erreur détaillé
		}
}