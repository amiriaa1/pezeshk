<?php include_once('class.database.php'); class ManageFees { public $link; function __construct() { global $table_prefix; $db_connection = new dbConnection(); $this->link = $db_connection->connect(); return $this->link; }


 
function Addcustomers($name,$lat,$lng,$addres,$cutomerstype,$submitby)
 { global $table_prefix;
 $query = $this->link->prepare("INSERT INTO `nim_customers` (`name`,`lat`,`lng`,`addres`,`cusomer_type`,`submitby`) VALUES (?,?,?,?,?,?) ");

 $values = array($name,$lat,$lng,$addres,$cutomerstype,$submitby);
 $query->execute($values); $counts = $query->rowCount();
 return $counts; }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function Addgpspoint($username,$gps,$lat,$lng)
 { global $table_prefix;
 $query = $this->link->prepare("INSERT INTO `marketer_gps` (`ausername`,`gps`,`lat`,`lng`) VALUES (?,?,?,?) ");

 $values = array($username,$gps,$lat,$lng);
 $query->execute($values); $counts = $query->rowCount();
 return $counts; }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////



function GetcustomersList($query) { global $table_prefix;
 $query = $this->link->query("SELECT * FROM `nim_customers` $query");
 $counts = $query->rowCount(); $result = $query->fetchAll();
 return $result; }
 
 
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
	}


?>