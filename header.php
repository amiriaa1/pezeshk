<?php
include('main.php');



if($isLogedIn && $uactive==0 & !$verification==1)
{
header("Location: verification");
}




echo' 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <meta name="description" content="'.$system_title.'">
';
		if(!isset($responsive) || $responsive==1)
			
		include('main.php');
if($system_settings["maintenance"]==1)
{
 header("Location: ma");
}
			echo '
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>' . $system_title . '</title>
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">
	<!-- theme style -->
	<link rel="stylesheet" href="css/style.css">
	
	

    
  </head>
<body class="layout-top-nav light-skin theme-classic">
	
<div class="wrapper">

  <header class="main-header">
	  <div class="inside-header">
		  <div>	
			<a href="index" class="logo">			  
			  <div>
				  <span class="light-logo"><img src="images/logo2.png" alt="logo" style="width:200px;height:100px;"></span>
				  
			  </div>
			  
		</a>	
		  </div>
		
		<!-- Header Navbar -->
		<nav class="navbar navbar-static-top">
		  <!-- Sidebar toggle button-->
		  <div>		  
			  <a href="#" data-provide="fullscreen" class="sidebar-toggle d-lg-inline-flex d-none" title="Full Screen">
				<i class="mdi mdi-crop-free"></i>
			  </a> 

		  </div>

		  <div class="navbar-custom-menu r-side">
			<ul class="nav navbar-nav">
			  <!-- full Screen -->
			  		
			 

			  <!-- User Account-->
			  <li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="User">
				  <img src="images/avatar/7.jpg" class="user-image rounded-circle" alt="User Image">
				</a>
				<ul class="dropdown-menu animated flipInX">
				  <!-- User image -->
				  <li class="user-header bg-img" style="background-image: url(images/user-info.jpg)" data-overlay="3">
					  <div class="flexbox align-self-center">					  
						<img src="images/avatar/7.jpg" class="float-left rounded-circle" alt="User Image">					  
						<h4 class="user-name align-self-center">
						  <span>'.$studentProp['ufaname'].'</span>
						  <small>'.$studentProp['uusername'].'</small>
						</h4>
					  </div>
				  </li>
				  <!-- Menu Body -->
				  <li class="user-body">

						
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="logout"><i class="ion-log-out"></i> Logout</a>
						<div class="dropdown-divider"></div>
						
				  </li>
				</ul>
			  </li>	


			  <!-- Control Sidebar Toggle Button -->
			  

			</ul>
		  </div>
		</nav>
	  </div>
  </header>
  
  <nav class="main-nav" role="navigation">

	  <!-- Mobile menu toggle button (hamburger/x icon) -->
	  <input id="main-menu-state" type="checkbox" />
	  <label class="main-menu-btn" for="main-menu-state">
		<span class="main-menu-btn-icon"></span> Toggle main menu visibility
	  </label>

	  <!-- Sample menu definition -->
	  <ul id="main-menu" class="sm sm-blue">
		<li><a href="index"><i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>داشبور</a></li>
	
		
			<li><a href="centerpoint"><i class="icon-Chart-line"><span class="path1"></span><span class="path2"></span></i>ثبت  مرکز</a></li>
				
				
		
	
		
				
				
			</ul>
		</li>
		
	  </ul>
	</nav>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->	  
		<div class="content-header">
			<h3>
				Dashboard
				<small>Control panel</small>
		  	</h3>
		  	<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="breadcrumb-item active">Dashboard</li>
		  	</ol>
		</div>



';          
?>
	