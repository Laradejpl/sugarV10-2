<?php 
require_once __DIR__ . '/config/bootstrap.php';
$req = $pdo->query("SELECT * FROM membre");
$req->execute();
$items = $req->fecth(PDO::FETCH_ASSOC);
header("content-type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");

$json = json_encode(array('username'=>$items['pseudo'], 'password'=>$items['mdp'], 'gender'=>'male', 'role'=>'user', 'profile'=>'https://monsite.com/profile/myUserername', 'image'=>'https://html5-chat.com/img/malecostume.svg'));
$encoded = file_get_contents("https://jwt.html5-chat.com/protect/".base64_encode($json), 'startRoom'=>5);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HTML5 chat</title>
</head>
<body>

<div style="width: 1024px;height: 800px;">
    <script src="https://html5-chat.com/script/xxxxx/<?=$encoded?>"></script>
</div>

</body>
</html>