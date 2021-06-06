<?php
require_once __DIR__ . '/config/bootstrap.php';
echo '<?xml version="1.0" encoding="UTF-8"?>'
?>
<rss version="2.0">
    <channel>
        <title>FLUX RSS de l'actualité REGGAE</title>

    <link> http://www.reggaefrance.com</link> 

    <description>voici les dernieres news sur le reggae</description>

 

<?php  


$req =$pdo->prepare("SELECT * FROM news ORDER BY id DESC");
$req->execute();
while ($datas = $req->fetch(PDO::FETCH_OBJ))
{
  echo "<item>\n";

  echo "<title>".$datas->titre."</title><br>";
  echo "<link>".$datas->url."</link><br>";
  echo "<description><![CDATA[" .nl2br($datas->contenu)."]]></description>\n<br>";
  echo "<pubDate>".date("D,d M Y H:i:s",strtotime($datas->date))."GMT</pubDate>\n<br>";


  echo "</item>\n";
}

?>
  
  </channel>

</rss>

