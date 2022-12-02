<?php
include_once('main.php');
$student = new ManageStudents();
$fee=new ManageFees();
$query1='1';
$mah=date("m");
$mahghabl=$mah-1;	
$userPayments = $student->GetUserinvestlistcron($query1);	
foreach ($userPayments as $userPayment) {
	
	$amountrr=$userPayment['amount'];
	$uusername=$userPayment['uusername'];
	$atimestamp=$userPayment['atimestamp'];
	$start_date=$userPayment['start_date'];
	$aactive=$userPayment['aactive'];
	
$start_date_explode=explode("-",$start_date);
$mahexplode=$start_date_explode[1];
if($mahghabl==$mahexplode || $mah==$mahexplode){echo'<br><br><br>sod gblan dade shode<br><br><br>';}
else
{

$fee=new ManageFees();
$userPayments = $fee->Getuseruusernamef($uusername);
foreach ($userPayments as $userPayment) {$uid=$userPayment['uid'];}		

$percentage=4.8;
$totalWidth=$amountrr;
$amount = ($percentage / 100) * $totalWidth;
$userPayments = $fee->GetmaWalletList($uid);


foreach ($userPayments as $userPayment) {$incomewallet=$userPayment['incomewallet'];}
$sum=$incomewallet+$amount;
$uidprob=$uid;
$uppaymentdprob=$amount;
$uptrack_codeprob='985';
$fee->AddUserPayment($uidprob,$uppaymentdprob,0,$uptrack_codeprob,'income from monthly invest add to income wallet',10);
$fee->WalletUpdateincome($sum,$uid);

echo'
<br>username : '.$uusername.'<br>
<br>start_date : '.$start_date.'<br>
<br>aactive : '.$aactive.'<br>
<br> next invest<br>



';
}


}

?>