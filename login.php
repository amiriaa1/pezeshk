<?php


$login_needed=0;
include_once('main.php');
if(!$isLogedIn)
{
	if (isset($_GET['op'])) 
	{
		

		
		switch ($_GET['op']) {
			case 'lost':
				if (isset($_POST['send_link'])) {
					if(empty($_POST['email']))
						$error = _SOME_FIELDS_ARE_REQUIRED;
					else
					{
						$security_key = $student->SendResetLink($_POST['email']);
						$email = $_POST['email'];
						if($security_key!="0")
						{
							$admin = new ManageAdmins();
							$adminProp = $admin->GetAdminInfoById(1);
							$success = _A_LINK_SEND_TO_YOUR_MAIL_CLICK_ON_THAT;
							mail($email, 'Reset Password', "
								<html>
									<head>
									  <title>Reset Password</title>
									</head>
								<body dir=\"".$dir."\" style=\"font-family:Tahoma; font-size:9pt;\">
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
				
				}
				break;


			case 'reset':
				if (isset($_GET['email']) && isset($_GET['security_key'])) {
					if ($student->SendResetLink($_GET['email'])==$_GET['security_key']) {
						
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
<meta name="keywords" content="Pezeshk,Investment Systems,Capital stock,Private investment,Interest rate">
<meta property="og:type" content="article" />
<meta property="og:title" content="Pezeshk" />
<meta property="og:description" content="Invest your money in the best solver problem"/>
    <meta property="og:image" content="https://Pezeshk.info/images/logo2.png" />
    <meta property="og:url" content="https://Pezeshk.info/" />
    <meta property="og:site_name" content="Pezeshk" />
    <meta name="og:region" content="cupertino" />
    <meta name="og:country-name" content="California" />
  

    <title>' . $system_title . ' reset password</title>
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">
	<!-- theme style -->
	<link rel="stylesheet" href="css/style.css">

</head>
<body class="hold-transition theme-yellow bg-img" style="background-image: url(images/auth-bg/bg.jpg)" data-overlay="3">
	
	<div class="auth-2-outer row align-items-center h-p100 m-0">
		<div class="auth-2">
		  <div class="auth-logo font-size-30">
			<a href="index" class="text-dark"><b>Crypto</b>Member</a>
		  </div>
		  <!-- /.login-logo -->
		  <div class="auth-body">
			<p class="auth-msg text-black-50">forgot password</p>
               <form action=""	method="post" class="form-element">

			  <div class="form-group has-feedback">
			  ';
			  if (!isset($_POST["newpass"])){
			  echo'
				<input type="password" class="form-control" name="newpass" id="newpass" placeholder="newpass">
				<span class="ion ion-email form-control-feedback text-dark"></span>
			  </div>
			  
		
			  ';
			  }
					if (isset($_POST["newpass"])){
						
						
						$new_pass = $_POST["newpass"];
						
					if ($student->UserResetPassword($_GET['email'],$new_pass)) {
							$success = _YOUR_PASSWORD_RESET_TO1.''._YOUR_PASSWORD_RESET_TO2.'.<br>
						'._LOGIN_AND_CHANGE_YOUR_PASSWORD;
							
							
						}
						else
							$error = _PROBLEM_OCCURED_IN_CHANGING_PASSWORD;	
						
						
					}
			  
			  if(!empty($error))
		{
			Failure($error);
		}
		if(!empty($success))
		{
			Success($success);
			
			header( "refresh:20;url=login" );
		}
			  
			  
			  echo'
			  
			  <div class="row">
				
				'.(!empty($message)?'<span class="error">'.$message.'.</span><br>':'').'
				
				<div class="col-12 text-center">
		
';
if (!isset($_POST["newpass"])){
echo'
				  <button type="submit" name="forgot_pass"  class="btn btn-rounded my-20 btn-success">submit</button>
				  ';
}
				  echo'
				</div>
				<!-- /.col -->
			  </div>
			</form>

			<div class="text-center text-dark">
			
				
			</div>
			<!-- /.social-auth-links -->

			

		  </div>
		</div>
	
	</div>


	

</body>
</html>

						
						';
						
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
		if (isset($_POST["user_login"]))
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
				$counts = $student->LoginStudent($username,$password);

				if($counts!=1)
				{
					if (!isset($_SESSION['login_count']))
						$_SESSION['login_count']=1;
					else
						$_SESSION['login_count']++;
					$message = _USER_BAD_USERNAME_OR_PASSWORD;
				}
				else
				{
					date_default_timezone_set("UTC");
					$studentProp = $student->GetStudentInfo($username);
					if($studentProp['uactive']==0){
						$message = _USER_YOUR_ACCOUNT_IS_DISABLED;
					setcookie($user_session_name,$username,time()+2592000);
					setcookie($user_password_session_name,$password,time()+2592000);
                      header('Location: verification');		exit;
					}
					
					elseif (strtotime($studentProp['uexpiration_date'])<time()) {
						$message = _USER_YOUR_ACCOUNT_HAS_BEEN_EXPIRED;
					}
					else
					{
						$cookie=(isset($_POST['remember']) && $_POST['remember']==1?1:0);
						if ($cookie==0) {
							$_SESSION[$user_session_name] = $username;
							$_SESSION[$user_password_session_name] = $password;
						}
						else
						{
							if (!empty($testa_prefix))
							{
								$domain = (preg_match("/localhost/",$_SERVER['SERVER_NAME'])==true?"localhost":($_SERVER['SERVER_NAME']==$_SERVER['SERVER_ADDR']?"localhost":get_domain('http://'.$_SERVER['SERVER_NAME'])));
								setcookie($user_session_name,$username,time()+2592000,"/",$domain);
								setcookie($user_password_session_name,$password,time()+2592000,"/",$domain);
							}
							else
							{
								setcookie($user_session_name,$username,time()+2592000);
								setcookie($user_password_session_name,$password,time()+2592000);
							}
						}
						
						
						if($redirect == "")
							$redirect = "./";

						header('Location: '.urldecode($redirect).'');
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
    <meta name="description" content="'.$system_title.'">
	<meta name="keywords" content="'.str_replace(' ',',',$system_title).'">
	<meta name="generator" content="royaal">
    <link rel="icon" href="images/favicon.ico">

    <title>' . $system_title . '</title>
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">
	<!-- theme style -->
	<link rel="stylesheet" href="css/style.css">
	
	
</head>
<body class="hold-transition theme-yellow bg-img" style="background-image: url(images/auth-bg/bg.jpg)" data-overlay="3">
	
	<div class="auth-2-outer row align-items-center h-p100 m-0">
		<div class="auth-2">
		  <div class="auth-logo font-size-30">
			<img src="images/logo.png" alt="logo">
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
					<input type="checkbox" id="basic_checkbox_1">
					<label for="basic_checkbox_1" name="remember" id="remember" class="text-dark">Remember Me</label>
				  </div>
				</div>
				'.(!empty($message)?'<span class="error">'.$message.'.</span><br>':'').'
				<!-- /.col -->
				<div class="col-6">
				 <div class="fog-pwd">
					<a href="forgot"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
				  </div>
				</div>
				<!-- /.col -->
				<div class="col-12 text-center">
		

				  <button type="submit" name="user_login"  class="btn btn-rounded my-20 btn-success">SIGN IN</button>
				</div>
				<!-- /.col -->
			  </div>
			</form>

			<div class="text-center text-dark">
			
				
			</div>
			<!-- /.social-auth-links -->

			<div class="margin-top-30 text-center text-dark">
				<p>Dont have an account? <a href="register" class="text-info m-l-5">Sign Up</a></p>
			</div>

		  </div>
		</div>
	
	</div>


	<!-- js -->


</body>
</html>

';





}
	echo '<script>$(document).ready(function(){$(".jumbotron").addClass("login");})</script>';

}
else
{
	header("Location: index");
	echo '<meta charset="utf-8">'._ADMIN_LOGIN_YOU_HAVE_ALREADY_LOGGED_IN;	

    
}


?>