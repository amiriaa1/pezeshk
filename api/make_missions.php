<?php

include_once('../main.php');


            $idd=$_POST['id'];
		    
			
			$comment=$_POST['comment'];
			$type=1;
			$status=0;
$token=$_POST['token'];
$post=json_encode($_POST);
//Check username and password
				
			
				$student = new ManageStudents();
				$counts = $student->UserTokenchek($token);
if($counts==1){
	$counts5 = $student->Getuserfromtoken($token);
	
	 foreach($counts5 as $disuserProp)
					{
					$promoter=$disuserProp['uusername'];
					$cytyuser=$disuserProp['city'];
					}
					
		$fee=new ManageFees();	
$query="WHERE aid=$idd";		
		$custumerslist = $fee->GetcustomersList($query);
	
	 foreach($custumerslist as $custumerslistprob)
					{
					$name=$custumerslistprob['name'];
					$lat=$custumerslistprob['lat'];
					$lng=$custumerslistprob['lng'];
					$addr=$custumerslistprob['addres'];
					$custumercity=$custumerslistprob['city'];
					}
					
	if($cytyuser==$custumercity){
	
$fee=new ManageFees();
$userPayments = $fee->Addmissions($idd,$type,$status,$name,$addr,$lat,$lng,$comment,$promoter);
}
if($userPayments==1){
			echo json_encode(array(
				"statusCode"=>200,
				"massage"=>"ثبت شد"
			),JSON_UNESCAPED_UNICODE);	
		$userPayments5 = $fee->Addlog('make_missions',$post,'ثبت شد');
		}
		else{
			
				echo json_encode(array(
				"statusCode"=>201,
				"massage"=>"مشکلی در ثبت بوجود آمده است"
			),JSON_UNESCAPED_UNICODE);	
			$userPayments5 = $fee->Addlog('make_missions',$post,'مشکلی در ثبت بوجود آمده است');
		}

}

else{
	
	echo json_encode(array(
				"statusCode"=>320,
				"massage"=>"نام کاربری صحیح نیست"
	),JSON_UNESCAPED_UNICODE);
	
}
?>