<?php

// Set sandbox (test mode) to true/false.
$sandbox = TRUE;

$version = '95.0';
$endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
$username = $sandbox ? 'nettut_1324394971_biz_api1.gmail.com' : 'LIVE_USERNAME_GOES_HERE';
$password = $sandbox ? '1324395001' : 'LIVE_PASSWORD_GOES_HERE';
$signature = $sandbox ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31AzgQbJa8fS31WA4GgXVKk6T9vmOn' : 'LIVE_SIGNATURE_GOES_HERE';

?>