<?php
require_once __DIR__ . '/config/bootstrap.php';

$req =$pdo->prepare("SELECT * FROM membre");
$req->execute();
$data = $req->fetch();
$data = $req->fetch(PDO::FETCH_OBJ);
$content = $_POST['message'];
$destinataire = $_POST['destinataire'];

if(isset($_POST['mailform']))
{
    if(empty($_POST['message']))
    {    
        echo 'message vide';

    }
    if (empty($_POST['destinataire'])) {
        echo 'destinataire est vide';
    }
    
    else{
       
    
        echo 'votre message a ete bien delivré.';
$header="MIME-Version: 1.0\r\n";
$header.='From:"reggaerencontre.com"<reggaerencontre.com>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$message='
<html>
	<body style="background:black;color:lime;">
		<div align="center">
			<img  style="width:100%;"src="https://www.saintecroixtattoo.com/mailing/banniere.png"/>
			<br />
            '.$content.'
            jah est parmis nous ayont la foie
            <a href="saintecroixtattoo.com">Reggae rencontre    </a>
			<br />
            <img src="https://www.saintecroixtattoo.com/mailing/facebook.png"/>
            

		</div>
	</body>
</html>
';

mail($destinataire ,"LOVER ROCK  !", $message, $header);
}
}


include __DIR__ . '/config/headerAdmin.php';
?>
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-12">


        <h1>Envoyer leur des mails</h1>
<form method="post" action="">
<select name="destinataire" id="" class="form-group">
<?php
while($data = $req->fetch(PDO::FETCH_OBJ)):


?>
<option value="<?php echo $data->email;?>"><?php echo $data->email;?></option>

<?php endwhile;?>
</select>
<textarea name="message" id="" cols="30" rows="10" class="form-group badge-light"></textarea>

<input  class="form-group" type="submit" value="Recevoir un mail !" name="mailform"/>
</form>


        </div>
    </div>
</div>


