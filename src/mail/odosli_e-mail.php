<?php

require 'Mailgun.php';

# Instantiate the client.
$mgClient = new Mailgun('key-4c498788dbbce6979a5225f131cea166');
$domain = "ludoslovensky.sk";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'    => 'Ludo Slovensky <ludo@ludoslovensky.sk>',
    'to'      => 'tomas@ludoslovensky.sk',
    'cc'      => 'tomas@ludoslovensky.sk',
    'subject' => 'Hello',
    'text'    => 'Testing some Mailgun awesomness!',
    'html'    => '<html>HTML version of the body</html>'
), array(
    'attachment' => array('pokus.txt', 'pokus.txt')
));

	
	
	
?>	