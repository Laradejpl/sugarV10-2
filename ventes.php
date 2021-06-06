<?php
require_once __DIR__ . '/config/bootstrap.php';

$req = $pdo->prepare('SELECT * FROM vente v JOIN articles a ON a.id_articles=v.articles_id');
$req->execute();
while($data = $req->fetch(PDO::FETCH_OBJ)):
$infos = unserialize($data->datas);?>
<div><?php echo $data->nom;?></div>

<div>
  <pre>
    <?php print_r($infos);?>
  </pre>
</div>

<?php endwhile;?>