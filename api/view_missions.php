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
					$promoter=$disuserProp['uusername'];
					}
	
	
$fee=new ManageFees();
			
$disuserList = $fee->GEtmissionsapi($promoter);
$disuserList2=json_encode($disuserList,JSON_UNESCAPED_UNICODE); 
echo json_encode($disuserList,JSON_UNESCAPED_UNICODE);  
							

	$userPayments5 = $fee->Addlog('view_missions',$post,$disuserList2);

}

else{
	
	echo json_encode(array(
				"statusCode"=>320,
				"massage"=>"نام کاربری صحیح نیست"
	),JSON_UNESCAPED_UNICODE);		
	
}
?>