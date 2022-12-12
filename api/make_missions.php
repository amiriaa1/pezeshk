<?php

include_once('../main.php');


            $idd=$_POST['id'];
		    $name=$_POST['name'];
			$lat=$_POST['lat'];
			$lng=$_POST['lng'];
		    $addr=$_POST['addr'];
			
			$comment=$_POST['comment'];
			$type=1;
			$status=0;
$token=$_POST['token'];

//Check username and password
				
			
				$student = new ManageStudents();
				$counts = $student->UserTokenchek($token);
if($counts==1){
	$counts5 = $student->Getuserfromtoken($token);
	
	 foreach($counts5 as $disuserProp)
					{
					$promoter=$disuserProp['uusername'];
					}
	
	
$fee=new ManageFees();
$userPayments = $fee->Addmissions($idd,$type,$status,$name,$addr,$lat,$lng,$comment,$promoter);

if($userPayments==1){
			echo json_encode(array(
				"statusCode"=>200,
				"massage"=>"ثبت شد"
			),JSON_UNESCAPED_UNICODE);	
		
		}
		else{
			
				echo json_encode(array(
				"statusCode"=>201,
				"massage"=>"مشکلی در ثبت بوجود آمده است"
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