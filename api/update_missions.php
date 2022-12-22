<?php

include_once('../main.php');


            $status=$_POST['status'];
		    $id=$_POST['id'];
			
$token=$_POST['token'];

//Check username and password
				
			$fee=new ManageFees();
				$student = new ManageStudents();
				$counts = $student->UserTokenchek($token);
if($counts==1){
	$counts5 = $student->Getuserfromtoken($token);
	
	 foreach($counts5 as $disuserProp)
					{
					$user=$disuserProp['uusername'];
					}
					$counts12 = $fee->Getmissionslistbyid($id);
	 foreach($counts12 as $disuserProp12)
					{
					$promoter=$disuserProp12['promoter'];
					$status2=$disuserProp12['status'];
					}




	if($promoter=='00' OR $promoter==$user){
		if($status2==0 OR $status2==1){
			
			$userPayments = $fee->missionsupdate($status,$user,$id);
		
		echo json_encode(array(
				"statusCode"=>1,
				"massage"=>"ماموریت برای شما ثبت شد شروع کنید"
			),JSON_UNESCAPED_UNICODE);	
		
			
		}
		
		else{
		
		echo json_encode(array(
				"statusCode"=>5,
				"massage"=>"این ماموریت در وضعیت انتخاب نیست"
			),JSON_UNESCAPED_UNICODE);	
	}
		
		
		
	}
	else{
		
		echo json_encode(array(
				"statusCode"=>7,
				"massage"=>"این ماموریت تویط کاربر دیگری دریافت شده است"
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