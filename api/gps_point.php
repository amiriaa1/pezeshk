<?php

include_once('../main.php');


$gps=$_POST['gps'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];
$token=$_POST['token'];

//Check username and password
				
				$student = new ManageStudents();
				$counts = $student->UserTokenchek($token);
if($counts==1){
	$counts5 = $student->Getuserfromtoken($token);
	
	 foreach($counts5 as $disuserProp)
					{
					$username=$disuserProp['uusername'];
					}
$fee=new ManageFees();
$userPayments = $fee->Addgpspoint($username,$gps,$lat,$lng);

if($userPayments==1){
			echo json_encode(array(
				"statusCode"=>200,
				"massage"=>"Done"
			),JSON_UNESCAPED_UNICODE);		
		
		}
		else{
			
				echo json_encode(array(
				"statusCode"=>201,
				"massage"=>"import problem"
			),JSON_UNESCAPED_UNICODE);		
			
		}

}

else{
	
	echo json_encode(array(
				"statusCode"=>320,
				"massage"=>"نام کاربری صحیح نیست"
	),JSON_UNESCAPED_UNICODE);		
	
}
?>