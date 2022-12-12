<?php

include_once('../main.php');

$token=$_POST['token'];

//Check username and password
				
			
				$student = new ManageStudents();
				$counts = $student->UserTokenchek($token);
if($counts==1){
$fee=new ManageFees();

$query = "ORDER BY `nim_customers`.`aid` ASC";			
$disuserList = $fee->GetcustomersListapi($query);

echo json_encode($disuserList);  
							
						


}

else{
	
	echo json_encode(array(
				"statusCode"=>320,
				"massage"=>"نام کاربری صحیح نیست"
	),JSON_UNESCAPED_UNICODE);	
	
}
?>