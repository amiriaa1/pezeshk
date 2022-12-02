<?php
include_once('main.php');
$student = new ManageStudents();
$fee=new ManageFees();
$query1='ORDER BY `nim_invest`.`nid` ASC';
$userPayments = $student->GetUserinvestlistcron($query1);	
foreach ($userPayments as $userPayment) {
	$aactive=$userPayment['aactive'];
	$amountrr=$userPayment['amount'];
	$uusername=$userPayment['uusername'];
	$nid=$userPayment['nid'];
	$comment=$userPayment['expdate'];
	$start_date=$userPayment['start_date'];
	$test=date("Y-m-d");
    $sum=date('Y-m-d', strtotime($start_date. ' + '.$comment.' days'));
	
	$fee=new ManageFees();
$userPayments2 = $fee->Getuseruusernamef($uusername);
foreach ($userPayments2 as $userPayment) {$uid=$userPayment['uid'];}

echo'<br>uusername: ';
echo $uusername;
echo'<br>expdate: ';
echo $comment;
echo'<br>';
echo'<br>amountrr: ';
echo $amountrr;
echo'<br>sum:';
echo $sum;
echo'<br>query1: ';
echo $query1;
echo'<br>test: ';
echo $test;
echo'<br>uid: ';
echo $uid;
echo'<br>';
echo'<br>aactive: ';
echo $aactive;
echo'<br>';


	if($sum<$test && $aactive=='1'){
		
		
	$userinveststate = $fee->updateUserinveststatus($nid);		
	$userPayments3 = $fee->GetmaWalletList($uid);
     foreach ($userPayments3 as $userPayment) {$mainwallet=$userPayment['mainwallet'];}	
		$sum=$mainwallet+$amountrr;
		$uidprob=$uid;
		$uppaymentdprob=$amountrr;
		$uptrack_codeprob='256';
		$fee->AddUserPayment($uidprob,$uppaymentdprob,0,$uptrack_codeprob,'income from finish invest add to main wallet',10);
        $fee->WalletUpdate($sum,$uid);
		echo'<br>';
echo 'next user';
echo'<br>';
	}
	
	
	else{echo'invest hanoz active ast';}

}

?>