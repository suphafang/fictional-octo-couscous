<?php
	require_once(__DIR__.'/../modules/facebook.module.php');

	$fb = new Login_with_facebook('147605887474105', '5310c85b103366b03f36d6bbf0b795f1');
	$fb->getLoginURL('https://'.$_SERVER['HTTP_HOST'].'/register');

	header('location:'.$fb->loginURL);
?>