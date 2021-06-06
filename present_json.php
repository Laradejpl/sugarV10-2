<?php
$connection = new mysqli("185.98.131.128","regga1388946","v56m4wtkss","regga1388946");

$sqlcommand = $connection->prepare("SELECT * FROM product_ecom WHERE id = ?");

$sqlcommand->bind_param("i",$_GET['id']);


$sqlcommand->execute();
$result = $sqlcommand->get_result();
$rowOfData = $result->fetch_assoc();

//echo $rowOfData['id'] ;
//echo $rowOfData['name'] ;
//echo $rowOfData['price'] ;
echo json_encode($rowOfData);



?>