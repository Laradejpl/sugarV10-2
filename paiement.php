<?php
require_once __DIR__ . '/config/bootstrap.php';
require('paypal.class.php');
if(!empty($_POST))
{
	//on r�cup�re les infos sur l'article voulu
	$req = $pdo->prepare('SELECT * FROM articles WHERE id=:articles_id');
	$req->execute(array(':articles_id'=>htmlentities($_POST['articles_id'])));
	$data = $req->fetch(PDO::FETCH_OBJ);
	if(!$data){return;}
	
	$params = array( //on d�finit les param�tres suppl�mentaire � envoyer vers l'api de paypal
		'PAYMENTACTION'=>'Sale',
		'CURRENCYCODE'=>'EUR',
		'LOCALCODE'=>'FR',
		'DESC'=>$data->nom,
		'AMT'=>$data->prix,
		'RETURNURL'=>'https://saintecroixtattoo.com/return.php', //url de retour appel�e par le serveur de l'api paypal
		'CANCELURL'=>'https://saintecroixtattoo.com/cancel.php', //url d'annulation
		'CUSTOM'=>'articles_id:'.$data->id,
		'iNVNum'=>uniqid()
	);
	
	$paypal = new Paypal();
	$response = $paypal->request('SetExpressCheckout',$params); //on executre notre requ�te et on stocke le r�sultat dans une variable
	
	if(!empty($response['TOKEN']) && $response['ACK'] == 'Success') //si on a bien le token et que l'appel s'est pass� correctement
	{
		$token = htmlentities($response['TOKEN']);
		//on redirige le navigateur du client vers paypal avec le token comme identifiant
		header( 'Location: https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&token=' . urlencode($token).'&useraction=commit');
	}
	else
	{
		echo 'Une erreur s\'est produite : <br> '.$response['L_LONGMESSAGE0']; //on affiche le message d'erreur d�taill�
	}
}
var_dump($response);
include __DIR__ . '/config/header.php';
?>