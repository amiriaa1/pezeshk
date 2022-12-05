<?php


include_once('main.php');
switch($_REQUEST['op'])
{
	
	
		case "vfr":
	$addres= $_REQUEST['addres'];
	$cutomerstype= $_REQUEST['cutomerstype'];
	$lat= $_REQUEST['lat'];
	$lng= $_REQUEST['lng'];
	$name= $_REQUEST['name'];
	$submitby= $_REQUEST['submitby'];
	
$fee=new ManageFees();
$userPayments = $fee->Addcustomers($name,$lat,$lng,$addres,$cutomerstype,$submitby);
if($userPayments==1){
			echo json_encode(array(
				"statusCode"=>200,
				"formatted_address"=>$name
			));	
		
		}
		else{
			
				echo json_encode(array(
				"statusCode"=>201,
				"formatted_address"=>$name
			));	
			
		}
		
		break;
		
}
?>