<?php
$destinataire ='valentine.lasne@audencia.com';
$message_envoye = "Votre message est bien parvenu !";
$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";

if (!isset($_POST['envoi']))
{
	echo '<p>'.$message_non_envoye.'</p>'."\n";
}
else
{
	$email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
	$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';
 
	
	if ($email != '') && ($message != ''))
	{
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'From: <'.$email.'>' . "\r\n" .
				'Reply-To:'.$email. "\r\n" .
				'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed '."\r\n" .
				'Content-Disposition: inline'. "\r\n" .
				'Content-Transfer-Encoding: 7bit'." \r\n" .
				'X-Mailer:PHP/'.phpversion();
 
		// Envoi du mail
		$num_emails = 0;
		$tmp = explode(';', $cible);
		foreach($tmp as $email_destinataire)
		{
			if (mail($email_destinataire, $objet, $message, $headers))
				$num_emails++;
		}
 
		if ((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1)))
		{
			echo '<p>'.$message_envoye.'</p>';
		}
		else
		{
			echo '<p>'.$message_non_envoye.'</p>';
		};
	}
	else
	{
		// une des 3 variables (ou plus) est vide ...
		echo '<p>'.$message_non_envoye.' <a href="index.html">Retour au formulaire</a></p>'."\n";
	};
}; // fin du if (!isset($_POST['envoi']))
?>

