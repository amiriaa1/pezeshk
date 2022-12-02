<?php

require_once('../config.php');
$excel=0;
$border=1;
ini_set('session.cookie_httponly',true);
session_start();
$cookie = (isset($_COOKIE[$admin_session_name])?1:0);
if($cookie==0)
{
	//Protecting against SESSION Hijaking
	if(isset($_SESSION['user_last_ip'])===false)
	{
		$_SESSION['user_last_ip'] = $_SERVER['REMOTE_ADDR'];
	}
	if($_SESSION['user_last_ip'] !== $_SERVER['REMOTE_ADDR'])
	{
		session_unset();
		session_destroy();
	}
	//--End of Protecting against SESSION Hijaking
}

$isLogedIn = ($cookie==0?isset($_SESSION[$admin_session_name]):isset($_COOKIE[$admin_session_name]));


if (!$isLogedIn && !preg_match("/login/i", $_SERVER['REQUEST_URI']))
{
	$redirect = explode('/',$_SERVER['REQUEST_URI']);
	$redirect = $redirect[count($redirect)-1];
	if($redirect=="")
	{
		header("Location: login"); exit;
	}
	else
	{
		header("Location: login?redirect=".urlencode($redirect).""); exit;
	}
}

include_once('../include/class.database.php');
$db_connection = new dbConnection();
if(!($db_connection->connect()))
	header('Location: ../install');

include_once('../include/class.settings.php');
$settings_class = new ManageSettings();
$system_settings = $settings_class->SystemSettings();
$dir = $system_settings["dir"];
$theme = $system_settings["theme"];
$language = $system_settings["language"];

$maintenance = $system_settings["maintenance"];
$system_title = $system_settings["system_title"];

$uusername_title = $system_settings["uusername_title"];

$maintenance = $system_settings["maintenance"];
if ($dir =="ltr")
{
	$align1 = "right";
	$align2 = "left";
}
else
{
	$align1 = "left";
	$align2 = "right";
}


include_once('../include/functions.php');
include_once('../language/'.$language.'.php');
include_once('../include/class.admin.php');
include_once('../include/class.student.php');
include_once('../include/class.fee.php');

$admin = new ManageAdmins();

if($isLogedIn)
{
	if($cookie==0)
	{
		if(!$admin->LoginAdmin($_SESSION[$admin_session_name],$_SESSION[$admin_password_session_name]))
			header ('Location: logout');
		$ausername = $_SESSION[$admin_session_name];
	}
	else
	{
		if(!$admin->LoginAdmin($_COOKIE[$admin_session_name],$_COOKIE[$admin_password_session_name]))
			header ('Location: logout');
		$ausername = $_COOKIE[$admin_session_name];
	}
	$adminProp = $admin->GetAdminInfo($ausername);
	$aid = $adminProp['aid'];
}
$table_width=$success=$error="";
?>