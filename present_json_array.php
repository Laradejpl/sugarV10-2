<?php
//const DB_HOST = '185.98.131.128';
//const DB_NAME = 'regga1388946';
//const DB_USER = 'regga1388946';
//const DB_PASS = 'v56m4wtkss';

$connection = new mysqli("185.98.131.128","regga1388946","v56m4wtkss","regga1388946");

$sqlcommand = $connection->prepare("SELECT * FROM product_ecom");
$sqlcommand->execute();
$result = $sqlcommand->get_result();
$products = array();
while ($rowOfProduct = $result->fetch_assoc()){

    array_push($products, $rowOfProduct);



}

echo json_encode($products);