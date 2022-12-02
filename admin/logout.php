<?php

include_once('../config.php');
session_start();
if(isset($_SESSION[$admin_session_name]))
{
	session_unset();
	session_destroy();
}
if(isset($_COOKIE[$admin_session_name]))
{
	setcookie($admin_session_name,'',time()-2592000);
	setcookie($admin_password_session_name,'',time()-2592000);
}
header('Location: ./');
?>