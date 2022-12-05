<?php

include_once('../main.php');


$gps=$_POST['gps'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];
$username=$_POST['username'];
$password1=$_POST['password'];

//Check username and password
				
				$password = md5($password1);
				$student = new ManageStudents();
				$counts = $student->LoginStudent($username,$password);
if($counts==1){
$fee=new ManageFees();
$userPayments = $fee->Addgpspoint($username,$gps,$lat,$lng);

if($userPayments==1){
			echo json_encode(array(
				"statusCode"=>200,
				"formatted_data"=>"Done"
			));	
		
		}
		else{
			
				echo json_encode(array(
				"statusCode"=>201,
				"formatted_address"=>"no sql"
			));	
			
		}

}

else{
	
	echo json_encode(array(
				"statusCode"=>320,
				"massage"=>"user problem"
	));	
	
}
?>