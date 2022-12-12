<?php

include_once('../main.php');

$token=$_POST['token'];

//Check username and password
				
			
				$student = new ManageStudents();
				$counts = $student->UserTokenchek($token);
if($counts==1){



$counts5 = $student->Getuserfromtoken($token);
	
	 foreach($counts5 as $disuserProp)
					{
					$username=$disuserProp['uusername'];
					$ufaname=$disuserProp['ufaname'];
					$mainwallet=$disuserProp['mainwallet'];
					$username=$disuserProp['uusername'];
					}
					
						echo json_encode(array(
				"statusCode"=>200,
				"massage"=>"True",
				"username"=>$username,
				"name"=>$ufaname,
				"wallet"=>$mainwallet,
	),JSON_UNESCAPED_UNICODE);	
	

}

else{
	
	echo json_encode(array(
				"statusCode"=>320,
			"massage"=>"نام کاربری صحیح نیست"
	),JSON_UNESCAPED_UNICODE);
	
}
?>