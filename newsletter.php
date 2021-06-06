<?php


require_once __DIR__ . '/config/bootstrap.php';

$reply = '';
$content = '';
$from_name = 'Dai';
$from_email = 'newsletter@abc.fr';
$members = array ();

if (isset ($_POST['message']) && !empty ($_POST['message'])) {
	$subject = (!empty ($_POST['subject'])) ? $_POST['subject'] : 'Sans sujet';
    $req = $pdo->query("SELECT id_membre, pseudo, email FROM membre");
    $req->execute();
$d =$req->fetch(PDO::FETCH_OBJ);
while ($d = $req ->fetch())
	
	 {
		$members[$d['membre']]['pseudo'] = $d['pseudo'];
		$members[$d['membre']]['email'] = $d['email'];
		}
	
	$headers = 'From: "'.$from_name.'"<'.$from_email.'>'."\n";
	$headers .= 'Reply-To: <no-reply@abc.fr'."\n";
	$headers .= 'Content-Type: text/plain; charset="iso-8859-1"'."\n";
	$headers .= 'Content-Transfer-Encoding: 8bit';
	
	$i = 0;
	$to = '';
	foreach ($members AS $idmember => $infos) {
		$to .= $infos['email'];
		if ($i < $req->fetchColumn($d) - 1)
			$to .= ', ';
		$i++;
		}
	
	if (@mail ($to, $subject, stripslashes ($_POST['message']), $headers))
		$reply = 'Emails envoy�s !';
	else
		$reply = 'Il y a eu un probl�me lors de l\'envoi des emails.';
	}

ob_start ();
?>
<form action="" method="post">
	<table>
		<tr>
			<td>Sujet</td><td><input type="text" name="subject"/>
		</tr>
		<tr>
			<td>Message</td><td><textarea name="message" rows="12"></textarea>
		</tr>
		<tr>
			<td></td><td><input type="submit" value="Envoyer !"/>
		</tr>
	</table>
</form>
<br />
<?php
$content = ob_get_contents ();
ob_end_clean ();

include 'template.php';
?>