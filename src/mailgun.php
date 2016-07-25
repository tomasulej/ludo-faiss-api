<?php
function send_mailgun($email,$subject,$txt){
 
	$config = array();
 
	$config['api_key'] = "key-4c498788dbbce6979a5225f131cea166";
 
	$config['api_url'] = "https://api.mailgun.net/v2/ludoslovensky.sk/messages";
 
	$message = array();
 
	$message['from'] = "tomas@ludoslovensky.sk";
 
	$message['to'] = $email;
 
	$message['h:Reply-To'] = "tomas@ludoslovensky.sk";
 
	$message['subject'] = $subject;
 
	$message['html'] = $txt;
 
	$ch = curl_init();
 
	curl_setopt($ch, CURLOPT_URL, $config['api_url']);
 
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
 
	curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 
	curl_setopt($ch, CURLOPT_POST, true); 
 
	curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
 
	$result = curl_exec($ch);
 
	curl_close($ch);
 
	return $result;
 
}

?>