<?php
$sendEmailTo = 'Demo contact form <valentine.lasne@audencia.com>';
$subject = 'Contact site Github';
$okMessage = 'Merci pour votre message, je reviendrai vers vous rapidement';
$header =
$header. = 'From :$'
$message = 
.$_POST['email'].
.$_POST['message'].
;
mail("lasne.valentine@gmail.com", "Contact site Github", $message);
?>