<?php
require './vendor/autoload.php';
use Mailgun\Mailgun;
$mgClient = new Mailgun('');
$domain = "https://api.eu.mailgun.net/v3/musicstoreportugal.pt";
if ((strlen($_POST['subject']) and ($_POST['firstname']) and ($_POST['email']))>0) {
	
	$result = $mgClient->sendMessage($domain, array(
		'from'	=> ('Formulário <form@musicstoreportugal.pt>'),
		'to'	=> ('MusicStore <geral@musicstoreportugal.pt>'),
		'subject' => ('Nova entrada no formulário'),
		'text'	=> ('O cliente '.$_POST['firstname'].' com o email '.$_POST['email'].' escreveu no formulário: ' .$_POST['subject'])
	));
	echo "<script type='text/javascript'>alert('Obrigado pelo seu contacto');window.location = '../contactos.php'</script>";
	
}
else{
echo "<script type='text/javascript'>alert('Todos os campos são obrigatórios');window.location = '../contactos.php'</script>";
}
?>
