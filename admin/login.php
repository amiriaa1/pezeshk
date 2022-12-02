<?php



include_once('main.php');
if(!$isLogedIn)
{
	if (isset($_GET['op'])) 
	{
	    
		include_once('header.php');
	

		echo '<center>
			
		';
		switch ($_GET['op']) {
			case 'lost':
				if (isset($_POST['send_link'])) {
					if(empty($_POST['email']))
						$error = _SOME_FIELDS_ARE_REQUIRED;
					else
					{
						$adminProp = $admin->GetAdminInfoById(1);
						$security_key = $admin->SendResetLink($_POST['email']);
						$email = $_POST['email'];
						if($security_key!="0")
						{
							echo'<center><br>'.$security_key.'<br>';
							$success = _A_LINK_SEND_TO_YOUR_MAIL_CLICK_ON_THAT;

							mail($email, 'Reset Password', "
								<html>
									<head>
									  <title>Reset Password</title>
									</head>
								<body  dir=\"".$dir."\" style=\"font-family:Tahoma; font-size:9pt;\">
									<div style=\"border: solid 1px #DB3484; padding:5px;\">
									<div style=\"background-color:#DB3484; padding-".$align1.":5px; direction: ".$dir."; text-align: ".$align1."; font-weight: bold;
										font-size: 12px; color: #FFFFFF; height:25px;\">"._RESET_PASSWORD.":</div>
										"._YOU_OR_SOMEONE_ELSE_REQUESTED_RESET_LINK.":<br>
										<a href=\"http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?op=reset&email=".$email."&security_key=".$security_key."\">"._CLICK_HERE_TO_RESET_PASSWORD."</a>
									</div>
								</body>
								</html>","MIME-Version: 1.0 \r\nContent-type: text/html; charset=utf-8\r\nFrom: ".$system_title." <".$adminProp['aemail'].">");
						}
						else
							$error = _EMAIL_IS_NOT_VALID;
					}
				}
				else
				{
				    echo'<html  class="h-100" id="login-page1">';
					echo '
			<br><br>
			
		
		
			<body class="h-100">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div class="login-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card">
                            <div class="card-body">
                                <div class="logo text-center">
                                    <a href="index.html">
                                        <img src="../assets/images/f-logo.png" alt="" class="ml-4">
                                    </a>
                                </div>
                                <h4 class="text-center mt-5">تغییر رمز عبور</h4>
                                <p class="text-center">ایمیل خود را وارد کنید تا لینک تغییر رمز عبور را برای شما ارسال
                                    کنیم!</p>
                                <form class="mt-5 mb-5" action="" method="post">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="email" dir="ltr">
                                    </div>
                                    <div class="text-center mb-4 mt-5">
									<input name="send_link" type="submit" class="btn btn-primary" value="'._SEND_RESET_LINK.'" class="btn btn-primary">
									
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
			
			';
				}
				break;
				case 'reset':
					if (isset($_GET['email']) && isset($_GET['security_key'])) {
						if ($admin->SendResetLink($_GET['email'])==$_GET['security_key']) {
							$new_pass = rand(1,10000);
							if ($admin->UserResetPassword($_GET['email'],$new_pass)) {
								
								echo'<center>';
								$success = _YOUR_PASSWORD_RESET_TO1.' '.$new_pass.' '._YOUR_PASSWORD_RESET_TO2.'<br>
							
							'._LOGIN_AND_CHANGE_YOUR_PASSWORD;
									
							}
							
							else
								$error = _PROBLEM_OCCURED_IN_CHANGING_PASSWORD;
							
						}
						else
							$error = _SOME_PARAMETERS_ARE_NULL;
					}
					else
						$error = _SOME_PARAMETERS_ARE_NULL;
						
					break;
		}
		if(!empty($error))
		{
			Failure($error);
		}
		if(!empty($success))
		{
			Success($success);
		}
	}
	else
	{
		$message="";
		$redirect = (isset($_REQUEST["redirect"])?$_REQUEST["redirect"]:'');
		if (isset($_POST["admin_login"]))
		{
			if(isset($_SESSION['login_count']) && $_SESSION['login_count']>3)
			{
				if(($_SESSION['security_code'] != $_POST['security_code']))
				{
					$error=$message=_CAPTCHA_IS_INVALID;
				}
			}
			if (empty($error))
			{
				//Check username and password
				$username =  $_POST["username"];
				$password = md5($_POST["password"]);
				$counts = $admin->LoginAdmin($username,$password);

				if($counts!=1)
				{
					if (!isset($_SESSION['login_count']))
						$_SESSION['login_count']=1;
					else
						$_SESSION['login_count']++;
					$message = _USER_BAD_USERNAME_OR_PASSWORD;
					$ip = $_SERVER['REMOTE_ADDR'];
					
			
				}
				else
			
				{
					date_default_timezone_set("UTC");
					$adminProp = $admin->GetAdminInfo($username);
					if($adminProp['aid']!=1 && $adminProp['aactive']==0)
						$message = _USER_YOUR_ACCOUNT_IS_DISABLED;
						
						
					else
					{
					
					$cookie=(isset($_POST['remember']) && $_POST['remember']==1?1:0);
						if ($cookie==0) {
							$_SESSION[$admin_session_name] = $username;
							$_SESSION[$admin_password_session_name] = $password;
						} else {
							setcookie($admin_session_name,$username,time()+2592000);
							setcookie($admin_password_session_name,$password,time()+2592000);
						}
						if($redirect == "")
							$redirect = "./";
                    
						header('Location:index');
					}
					
					
					

				}
			}
		}
		
	



echo'

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Crypto Admin - Responsive Bootstrap Admin HTML Templates + Bitcoin Dashboards + ICO </title>
  
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	
	<!-- theme style -->
	<link rel="stylesheet" href="css/horizontal-menu.css">
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Admin skins -->
	<link rel="stylesheet" href="css/skin_color.css">	

</head>
<body class="hold-transition theme-yellow bg-img" style="background-image: url(images/auth-bg/bg.jpg)" data-overlay="3">
	
	<div class="auth-2-outer row align-items-center h-p100 m-0">
		<div class="auth-2">
		  <div class="auth-logo font-size-30">
			<a href="index.html" class="text-dark"><b>Crypto</b>Admin</a>
		  </div>
		  <!-- /.login-logo -->
		  <div class="auth-body">
			<p class="auth-msg text-black-50">Sign in to start your session</p>
               <form action=""	method="post" class="form-element">

			  <div class="form-group has-feedback">
				<input type="email" class="form-control" name="username" id="username" placeholder="Email">
				<span class="ion ion-email form-control-feedback text-dark"></span>
			  </div>
			  <div class="form-group has-feedback">


				<input required type="password" class="form-control" name="password" id="password" placeholder="Password">
				<span class="ion ion-locked form-control-feedback text-dark"></span>
			  </div>
			  <div class="row">
				<div class="col-6">
				  <div class="checkbox">
					<input type="checkbox" name="remember" id="remember" id="basic_checkbox_1">
					<label for="basic_checkbox_1" class="text-dark">Remember Me</label>
				  </div>
				</div>
				<!-- /.col -->
				<div class="col-6">
				 <div class="fog-pwd">
					<a href="javascript:void(0)"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
				  </div>
				</div>
				<!-- /.col -->
				<div class="col-12 text-center">
		
'.(!empty($message)?'<span class="error">'.$message.'.</span><br>':'').'
				  <button type="submit" name="admin_login"  class="btn btn-rounded my-20 btn-success">SIGN IN</button>
				</div>
				<!-- /.col -->
			  </div>
			</form>

			<div class="text-center text-dark">
			  <p class="mt-50">- Sign With -</p>
			  <p class="gap-items-2 mb-20">
				  <a class="btn btn-social-icon btn-round btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
				  <a class="btn btn-social-icon btn-round btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
				  <a class="btn btn-social-icon btn-round btn-google" href="#"><i class="fa fa-google"></i></a>
				  <a class="btn btn-social-icon btn-round btn-instagram" href="#"><i class="fa fa-instagram"></i></a>
				</p>	
			</div>
			<!-- /.social-auth-links -->

			<div class="margin-top-30 text-center text-dark">
				<p>Dont have an account? <a href="auth_register.html" class="text-info m-l-5">Sign Up</a></p>
			</div>

		  </div>
		</div>
	
	</div>
			';
	}
	echo '<script>$(document).ready(function(){$(".jumbotron").addClass("login");})</script>';
echo '
	<!-- js -->
	<script src="js/vendors.min.js"></script>


';
	
	
    
}
else
{
	header ("Refresh: 3; url=./");
	echo '
	</body>
	</html>
	<meta charset="utf-8">'._ADMIN_LOGIN_YOU_HAVE_ALREADY_LOGGED_IN;	
}


?>