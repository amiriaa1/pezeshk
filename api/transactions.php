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
					$uid2=$disuserProp['uid'];
					}
	
	
$fee=new ManageFees();
			
$disuserList = $fee->GetUserPayments($uid2);

echo json_encode($disuserList);  
							

	

}

else{
	
	echo json_encode(array(
				"statusCode"=>320,
				"massage"=>"نام کاربری صحیح نیست"
	));	
	
}
?>