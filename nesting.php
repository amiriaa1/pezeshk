<?php

require_once('main.php');

$llvm=$uusername;
$test=date("Y-m-d H:i:s");
$sum=date("Y-m-d H:i:s", strtotime($utimestampuserupdatee. ' + 5 minute'));
$avttime=strtotime($sum)-strtotime($test); 
$timemin=round($timemin, 0);
$timemin=$avttime/60;
$timemin=round($timemin, 0);

echo'
<br><br><br><br><br><br><br><br><br>
<br>alan: '.$test.'<br>
<br>jam kol: '.$sum.'<br>
<br>saat get sql: '.$utimestampuserupdatee.'<br>
<br>avttime: '.$timemin.'va saniye:  '.$avttime.'<br>
';


if($test > $sum OR $utimestampuserupdatee==NULL)
{
	sendemailverfy($llvm);
	echo'enja';
	}


else{
	
	echo'onjahas';


	
	}
	




?>