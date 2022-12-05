<?php

include_once('../main.php');


$name=$_POST['name'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];
$cutomerstype=$_POST['type'];
$addres=$_POST['address'];
$submitby=$username;

$username=$_POST['username'];
$password1=$_POST['password'];

//Check username and password
				
				$password = md5($password1);
				$student = new ManageStudents();
				$counts = $student->LoginStudent($username,$password);
if($counts==1){
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
				"formatted_address"=>$name
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