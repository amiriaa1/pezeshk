<?php

include_once('../main.php');


            $status=$_POST['status'];
		    $id=$_POST['id'];
			
$token=$_POST['token'];
$post=json_encode($_POST);
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
		if($status==1){
		echo json_encode(array(
				"statusCode"=>200,
				"finalstatusCode"=>1,
				"massage"=>"ماموریت برای شما ثبت شد شروع کنید"
			),JSON_UNESCAPED_UNICODE);	
		$userPayments5 = $fee->Addlog('update_missions',$post,'ماموریت ثبت شد');
			}
			if($status==2){
		echo json_encode(array(
				"statusCode"=>200,
				"finalstatusCode"=>2,
				"massage"=>"ماموریت با موفقیت پایان یافت خسته نباشید"
			),JSON_UNESCAPED_UNICODE);	
		
			}
		}
		
		else{
		
		echo json_encode(array(
				"statusCode"=>200,
				"finalstatusCode"=>5,
				"massage"=>"این ماموریت در وضعیت انتخاب نیست"
			),JSON_UNESCAPED_UNICODE);	
	}
		
		
		
	}
	else{
		
		echo json_encode(array(
				"statusCode"=>200,
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