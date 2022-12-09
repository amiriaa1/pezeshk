<?php

	
	include_once('main.php');
	
	$idd=7;
	$fee = new ManageFees();
	
	
$disuserList = $fee->Getcustomerformission($idd);
	echo'salam';
	foreach($disuserList as $disuserProp)
					{
						$name=$disuserProp['name'];
						
						echo $name;
					} 
					echo'salam';
?>