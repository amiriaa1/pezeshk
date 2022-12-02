<?php


function sendemailforgot($email,$security_key)
{	

	include_once('main.php');
$settings_class = new ManageSettings();
$system_settings = $settings_class->SystemSettings();
$sendinblueapikey = $system_settings["gateway1_key"];						
								
$data = array(

 "sender" => [
"name" => "buynex",
"email" => "info@buynex.info",

],
 "to" => [	
 
 [
 
 "email" => $email,
"name" => "users",
 ],

 ],
 "subject" => "forgot pass confirm key",
"htmlContent" => "<html><head></head><body><p>Hello,</p><a href=\"my.buynex.info/login?op=reset&email=".$email."&security_key=".$security_key."\">click on this link for reset password</a>
</p></body></html>" 
);           
	
	
                                                         
$data_string = json_encode($data);                                                                                   
                                                                                                                     
$ch = curl_init('https://api.sendinblue.com/v3/smtp/email');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                                                                                     
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                   
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
	'User-Agent: PostmanRuntime/7.29.2', 
	'Accept: */*',
	'Content-Length: ' . strlen($data_string),
	'Content-Type: application/json',
	'api-key: '.$sendinblueapikey.''
	)                                                                     
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);

curl_close($ch);

//var_dump(json_decode($result, true));

$data2 = json_decode(trim($result), TRUE);

$tre2=date("Y-m-d H:i:s");
$tre=rand(999,9999);
$student = new ManageStudents();
$mobileInfo = $student->autveruserinsert($tre,$tre2,$email);	


	

}

function sendemailverfy($llvm)
{	
include_once('main.php');
$settings_class = new ManageSettings();
$system_settings = $settings_class->SystemSettings();
$sendinblueapikey = $system_settings["gateway1_key"];
$email_temp = $system_settings["teachers_message"];
$email_temp2 = $system_settings["users_message"];
$tre=rand(999,9999);

$tre2=date("Y-m-d H:i:s");

$data = array(

 "sender" => [
"name" => "buynex",
"email" => "info@buynex.info",

],
 "to" => [	
 
 [
 
 "email" => $llvm,
"name" => "users",
 ],

 ],
 "subject" => "confirm key",
"htmlContent" => " $email_temp $tre $email_temp2 " 
);           
	
	
                                                         
$data_string = json_encode($data);                                                                                   
                                                                                                                     
$ch = curl_init('https://api.sendinblue.com/v3/smtp/email');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                                                                                     
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                   
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
	'User-Agent: PostmanRuntime/7.29.2', 
	'Accept: */*',
	'Content-Length: ' . strlen($data_string),
	'Content-Type: application/json',
	'api-key: '.$sendinblueapikey.''
	)                                                                     
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);

curl_close($ch);

//var_dump(json_decode($result, true));

$data2 = json_decode(trim($result), TRUE);

$tre2=date("Y-m-d H:i:s");
$student = new ManageStudents();
$mobileInfo = $student->autveruserinsert($tre,$tre2,$llvm);	
	

}

?>