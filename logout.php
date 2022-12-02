<?php

session_start();
include_once('config.php');
if(isset($_SESSION[$user_session_name]))
{
	session_unset();
	session_destroy();
}
if(isset($_COOKIE[$user_session_name]))
{
	setcookie($user_session_name,'',time()-2592000);
	setcookie($user_password_session_name,'',time()-2592000);
}
header('Location: ./');
?>