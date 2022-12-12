<?php

include_once('../main.php');


echo'<meta charset="utf-8">';
$username=$_POST['username'];
$password1=$_POST['password'];
//Check username and password
				
				$password = md5($password1);
				$student = new ManageStudents();
				$counts = $student->LoginStudent($username,$password);
if($counts==1){
	
	
	$token=rand(999999,99999999999);
	$student = new ManageStudents();
    $userPayments = $student->Useraddtoken($token,$username);
	if($userPayments==1){
		
	
$student = new ManageStudents();	
$disuserList = $student->GetStudenuusername($username);

foreach($disuserList as $disuserProp)
					{$ufaname=$disuserProp['ufaname'];	
					 $mainwallet=$disuserProp['mainwallet'];}
					
	echo json_encode(array(
				"statusCode"=>200,
				"massage"=>"True",
				"token"=>$token,
				"name"=>$ufaname,
				"wallet"=>$mainwallet
	                       ),JSON_UNESCAPED_UNICODE);		
}

else{
	
	echo json_encode(array(
				"statusCode"=>510,
				"massage"=>"cant get token"
	),JSON_UNESCAPED_UNICODE);		
	
}

}
else{
	
	echo json_encode(array(
				"statusCode"=>320,
				"massage"=>"نام کاربری یا رمز عبور اشتباه است"
				
	),JSON_UNESCAPED_UNICODE);	
	
}
?>