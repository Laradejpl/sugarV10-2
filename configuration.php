<?php
require_once('vendor/autoload.php');


$stripe = [
  "secret_key"      => "sk_test_V793TsRYVC2Tr5DIuemYJSZR00UaJHYv4d",
  "publishable_key" => "pk_test_vdGiXQPj0PfPsbZSMlvXXcRp00W0XtCrA7",
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>