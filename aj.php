<?php

if($_REQUEST['op']=="load_cities")
	$login_needed=0;
else
	$login_needed=1;

include_once('main.php');
switch($_REQUEST['op'])
{
	
		
		
	
		case "withdraw":
		
	$uptrack_code= $_REQUEST['wallet'];
	$uppayment= $_REQUEST['amount'];
	$date= $_REQUEST['date'];
	
	
	$upcomment='user withdraw';
$wallet='20';	
$fee = new ManageFees();
$student = new ManageStudents();
$studentInfo = $student->GetStudentInfo($uusername);	
$uid=$studentInfo['uid'];
$courseList = $fee->GetWallet($uid);
foreach ($courseList as $courseStudentInfo)
{$walletget=$courseStudentInfo['mainwallet'];}
$sum=$walletget-$uppayment;
	if($sum<=0){
		
		
		
		echo json_encode(array(
				"statusCode"=>201,
				"hashid"=>$uptrack_code,
				"amount"=>$uppayment
			));		
		
		
	}else{
		$counts = $fee->AddUserPaymentapp($studentInfo['uid'],$uppayment,0,$uptrack_code,$upcomment,$wallet,'0');
		$fee->WalletUpdate($sum,$uid);
		echo json_encode(array(
				"statusCode"=>200,
				"hashid"=>$uptrack_code,
				"amount"=>$uppayment
			));
		
	}


		
		
		break;
		
		
		
		
		
		
		break;
		
		case "vfr":
	$uptrack_code= $_REQUEST['hashid'];
	$uppayment= $_REQUEST['amount'];
	$date= $_REQUEST['date'];
	
	
	
	
	
$upcomment='user deposit';
$wallet='10';
$fee = new ManageFees();
$student = new ManageStudents();
$studentInfo = $student->GetStudentInfo($uusername);
$counts = $fee->AddUserPaymentapp($studentInfo['uid'],$uppayment,0,$uptrack_code,$upcomment,$wallet,'0');


		echo json_encode(array(
				"statusCode"=>200,
				"hashid"=>$uptrack_code,
				"amount"=>$uppayment
			));
		
		break;
		
}
?>