<?php

include_once('../main.php');


$name=$_POST['name'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];
$cutomerstype=$_POST['type'];
$addres=$_POST['address'];

$token=$_POST['token'];

//Check username and password
				
			
				$student = new ManageStudents();
				$counts = $student->UserTokenchek($token);
if($counts==1){
	
	$counts5 = $student->Getuserfromtoken($token);
	
	 foreach($counts5 as $disuserProp)
					{
					$submitby=$disuserProp['uusername'];
					}
	
$fee=new ManageFees();
$userPayments = $fee->Addcustomers($name,$lat,$lng,$addres,$cutomerstype,$submitby);

if($userPayments==1){
			echo json_encode(array(
				"statusCode"=>200,
				"formatted_address"=>$name
			));	
		
		}
		else{
			
				echo json_encode(array(
				"statusCode"=>201,
				"formatted_data"=>"false"
			));	
			
		}

}

else{
	
	echo json_encode(array(
				"statusCode"=>320,
				"massage"=>"نام کاربری صحیح نیست"
	));	
	
}
?>