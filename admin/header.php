<?php

echo' 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="'.$system_title.'">
	<meta name="keywords" content="'.str_replace(' ',',',$system_title).'">
	<meta name="generator" content="royaal">';
		if(!isset($responsive) || $responsive==1)
			
		include('main.php');

			echo '
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>' . $system_title . '</title>
    
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">
	
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">
    
	<!--amcharts -->
	<link href="assets/vendor_components/www.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css" /> 
	  
	<!-- Data Table-->
	<link rel="stylesheet" type="text/css" href="assets/vendor_components/datatable/datatables.min.css"/>
	
	<!-- theme style -->
	<link rel="stylesheet" href="css/horizontal-menu.css">
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Crypto Admin skins -->
	<link rel="stylesheet" href="css/skin_color.css">

     
  </head>

<body class="layout-top-nav light-skin theme-classic">
	
<div class="wrapper">

  <header class="main-header">
	  <div class="inside-header">
		  <div class="d-flex align-items-center logo-box justify-content-between">	
			<a href="index" class="logo">			  
			  <div class="logo-mini">
				  <span class="light-logo"><img src="images/logo-dark.png" alt="logo"></span>
				  <span class="dark-logo"><img src="images/logo-dark.png" alt="logo"></span>
			  </div>
			  <div class="logo-lg">
				  <span class="light-logo"><img src="images/logo-dark-text.png" alt="logo"></span>
				  <span class="dark-logo"><img src="images/logo-light-text.png" alt="logo"></span>
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
				  <img src="images/avatar/default.jpg" class="user-image rounded-circle" alt="User Image">
				</a>
				<ul class="dropdown-menu animated flipInX">
				  <!-- User image -->
				  <li class="user-header bg-img" style="background-image: url(images/user-info.jpg)" data-overlay="3">
					  <div class="flexbox align-self-center">					  
						<img src="images/avatar/default.jpg" class="float-left rounded-circle" alt="User Image">					  
						<h4 class="user-name align-self-center">
						  <span>'.$adminProp['ausername'].'---ADMIN</span>
						  <small>'.$adminProp['afname'].'---'.$adminProp['alname'].'</small>
						</h4>
					  </div>
				  </li>
				  <!-- Menu Body -->
				  <li class="user-body">

						<a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-settings"></i> Account Setting</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="logout"><i class="ion-log-out"></i> Logout</a>
						<div class="dropdown-divider"></div>
						<div class="p-10"><a href="javascript:void(0)" class="btn btn-sm btn-rounded btn-success">View Profile</a></div>
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
		<li><a href="index"><i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>Dashboard</a></li>
		<li><a href="deposit"><i class="icon-Equalizer"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>deposit</a>
			
		</li>
		<li><a href="invest-pack"><i class="icon-Chart-pie"><span class="path1"></span><span class="path2"></span></i>invest pack</a>
			
		</li>
	
		
		<li><a href="wallet-ttp"><i class="icon-Repeat"><span class="path1"></span><span class="path2"></span></i>wallet add</a></li> 
		<li><a href="withdraw"><i class="icon-Repeat"><span class="path1"></span><span class="path2"></span></i>withdraw</a></li> 
		
		<li><a href="user"><i class="icon-Repeat"><span class="path1"></span><span class="path2"></span></i>user list</a></li> 
		
		
		
		</li>
	  </ul>
	</nav>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->	  
		<div class="content-header">
			<h3>
				admin panel
				<small>Control panel</small>
		  	</h3>
		  	<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="breadcrumb-item active">Admin panel</li>
		  	</ol>
		</div>



';          
?>
	