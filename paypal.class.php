<?php

class Paypal {

   protected $credentials = array( //ne pas oublier de remplacer les infos par les votres et modifier pour mise en production
      'USER' => 'sb-uhxe9536059@business.example.com',
      'PWD' => 'lesly972',
      'SIGNATURE' => 'access_token$sandbox$jktyf2m9fdyq5hjk$5e627a0cde38be17157f4b339ed367a1'
   );

   protected $endPoint = '  https://api-3t.sandbox.paypal.com/nvp'; //l'url pour communiquer avec l'api paypal, modifier pour production �galement

 
   protected $version = '95.0'; //la version de l'api

   public function request($method,$params = array()) {
      $this->errors = array();
      if( empty($method) )
      { 
         $this->errors = array('Method undefined'); //si la m�thode n'est pas d�finie
         return false;
      }

      
      $requestParams = array( //on definit nos param�tres obligatoires qui serviront � chaque communication avec l'api paypal
         'METHOD' => $method,
         'VERSION' => $this->version
      ) + $this->credentials;

      
      $request = http_build_query($requestParams + $params); //g�n�re une chaine en encodage URL d'apr�s le tableau pass� en param�tres

      $curlOptions = array ( //on definit nos options de session curl
         CURLOPT_URL => $this->endPoint, //l'url vers laquelle on va envoyer les donn�es
         CURLOPT_RETURNTRANSFER => true, //on retourne le transfert sous forme de chaine
         CURLOPT_POSTFIELDS => $request //toutes les donn�es � passer par http POST qui est le mode d'envoi par d�faut
      );

      $ch = curl_init(); //on initialise la session curl
      curl_setopt_array($ch,$curlOptions); //on transmet nos options curl � la session

      
      $response = curl_exec($ch); // on envoi notre requ�te et on stocke le r�sultat dans une variable response

      if(!curl_errno($ch)) //s'il n'y a pas d'erreur
      {
         curl_close($ch); //on ferme la session curl
         $responseArray = array(); //on definit un tableau pour stocker la r�ponse de l'api paypal
         parse_str($response,$responseArray); // On stocke le r�sultat dans un tableau 
         return $responseArray; //on retourne le tableau qui contient les informations communiqu�es par l'api paypal
      }
      else
      { 
         curl_close($ch);
         return false;
      }
   }
}

?>