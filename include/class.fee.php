<?php include_once('class.database.php'); class ManageFees { public $link; function __construct() { global $table_prefix; $db_connection = new dbConnection(); $this->link = $db_connection->connect(); return $this->link; }


 
function Addcustomers($name,$lat,$lng,$addres,$cutomerstype,$tell,$submitby,$city)
 { global $table_prefix;
 $query = $this->link->prepare("INSERT INTO `nim_customers` (`name`,`lat`,`lng`,`addres`,`cusomer_type`,`tell`,`submitby`,`city`) VALUES (?,?,?,?,?,?,?,?) ");

 $values = array($name,$lat,$lng,$addres,$cutomerstype,$tell,$submitby,$city);
 $query->execute($values); $counts = $query->rowCount();
 return $counts; }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
function Addproduct($name,$type,$mojodi,$mojodizarib,$saleprice,$buyprice,$site)
 { global $table_prefix;
 $query = $this->link->prepare("INSERT INTO `nim_product` (`name`,`type`,`count`,`zaribcount`,`price`,`buyprice`,`siteview`) VALUES (?,?,?,?,?,?,?) ");

 $values = array($name,$type,$mojodi,$mojodizarib,$saleprice,$buyprice,$site);
 $query->execute($values); $counts = $query->rowCount();
 return $counts; }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    function Addproducttype($name,$site,$pic)
    { global $table_prefix;
        $query = $this->link->prepare("INSERT INTO `nim_product_type` (`name`,`show_on`,`pic`) VALUES (?,?,?) ");

        $values = array($name,$site,$pic);
        $query->execute($values); $counts = $query->rowCount();
        return $counts; }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function Addfactorbase($factor_num)
 { global $table_prefix;
 $query = $this->link->prepare("INSERT INTO `nim_factors` (`factor_num`) VALUES (?) ");

 $values = array($factor_num);
 $query->execute($values); $counts = $query->rowCount();
 return $counts; }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function Addcustomersapproval($name,$lat,$lng,$addres,$cutomerstype,$submitby,$approve)
 { global $table_prefix;
 $query = $this->link->prepare("INSERT INTO `nim_customers_add_app` (`name`,`lat`,`lng`,`addres`,`cusomer_type`,`submitby`,`approve`) VALUES (?,?,?,?,?,?,?) ");

 $values = array($name,$lat,$lng,$addres,$cutomerstype,$submitby,$approve);
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


function Addlog($url,$post,$back)
 { global $table_prefix;
 $query = $this->link->prepare("INSERT INTO `logs` (`url`,`psot`,`back`) VALUES (?,?,?) ");

 $values = array($url,$post,$back);
 $query->execute($values); $counts = $query->rowCount();
 return $counts; }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////



function Addmissions($idd,$type,$status,$name,$addr,$lat,$lng,$comment,$promoter)
 { global $table_prefix;
 $query = $this->link->prepare("INSERT INTO `nim_missions` (`custumerid`,`missions_type`,`status`,`custumernama`,`custumeraddr`,`custumerlat`,`custumerlng`,`acomment`,`promoter`) VALUES (?,?,?,?,?,?,?,?,?) ");

 $values = array($idd,$type,$status,$name,$addr,$lat,$lng,$comment,$promoter);
 $query->execute($values); $counts = $query->rowCount();
 return $counts; }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function GetcustomersList($query) { global $table_prefix;
 $query = $this->link->query("SELECT * FROM `nim_customers` $query");
 $counts = $query->rowCount(); $result = $query->fetchAll();
 return $result; }
 
 

function Getcitylist($query) { global $table_prefix;
 $query = $this->link->query("SELECT * FROM `city` $query");
 $counts = $query->rowCount(); $result = $query->fetchAll();
 return $result; }
 
 
function Gettypelist($query) { global $table_prefix;
 $query = $this->link->query("SELECT * FROM `nim_customers_type` $query");
 $counts = $query->rowCount(); $result = $query->fetchAll();
 return $result; }


    function Gettypelist2($query) { global $table_prefix;
        $query = $this->link->query("SELECT * FROM `nim_product_type` $query");
        $counts = $query->rowCount(); $result = $query->fetchAll();
        return $result; }
 
 function Getproduct($query) { global $table_prefix;
 $query = $this->link->query("SELECT * FROM `nim_product` $query");
 $counts = $query->rowCount(); $result = $query->fetchAll();
 return $result; }
 
 function Getcitybyid($ccid) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `city` WHERE `id`=? ");

 $values = array($ccid);
 $query->execute($values);
 $counts = $query->rowCount();
 $result = $query->fetchAll();
 if($counts==1) { $result = $query->fetchAll(); return $result; } 
 else { return $result; } } 
 

////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function GetcustomersListapproval($query) { global $table_prefix;
 $query = $this->link->query("SELECT * FROM `nim_customers_add_app` $query");
 $counts = $query->rowCount(); $result = $query->fetchAll();
 return $result; }
 
 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function Deletecustomerapp($id)
 { global $table_prefix; $query = $this->link->prepare("DELETE FROM `nim_customers_add_app` WHERE `aid`=?");
 $values = array($id); $query->execute($values); $counts = $query->rowCount(); if($counts==1) return 1; else return $counts; } 
 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////


 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 function GetcustomersListapi($query) { global $table_prefix;
 $query = $this->link->query("SELECT aid AS id ,name AS name , lat AS lat ,lng AS lng,addres AS address , cusomer_type AS type FROM `nim_customers` $query");
 $counts = $query->rowCount(); $result = $query->fetchAll();
 return $result; }
 
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
 function missionsupdate($status,$user,$id)
 { global $table_prefix;
 $query = $this->link->prepare("UPDATE `nim_missions` SET `status`=? , `promoter`=? WHERE `aid`=?"); 
 $values = array($status,$user,$id); $query->execute($values); $counts = $query->rowCount(); return $counts; }

 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
 function customerappupdate($id)
 { global $table_prefix; $query = $this->link->prepare("UPDATE `nim_customers_add_app` SET `approve`=1 WHERE `aid`=?");
 $values = array($id); $query->execute($values); $counts = $query->rowCount(); return $counts; } 

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
 
 function GetmaWalletList($submitby)
 { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `nim_users` WHERE `uusername`=?"); $values = array($submitby);
 $query->execute($values); $result = $query->fetchAll(); return $result; } 
 
 
  function GEtmissionsapi($promoter)
 { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `nim_missions` WHERE status NOT LIKE '2' AND promoter LIKE '00' OR status NOT LIKE '2'  AND promoter=?"); $values = array($promoter);
 $query->execute($values); $result = $query->fetchAll(); return $result; } 

   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
function WalletUpdate($sum,$submitby)
 { global $table_prefix; $query = $this->link->prepare("UPDATE `".$table_prefix."users` SET `mainwallet`=? WHERE `uusername`=?");
 $values = array($sum,$submitby); $query->execute($values); $counts = $query->rowCount(); return $counts; }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function GetUserPayments($uid2) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."user_payments` WHERE `uid`=?");
 $values = array($uid2); $query->execute($values); $result = $query->fetchAll(); return $result; }



function AddUserPayment($uid,$uppayment,$upgateway,$uptrack_code,$upcomment,$walletacc) { global $table_prefix; $now = gmdate("Y-m-d H:i:s"); $query = $this->link->prepare("INSERT INTO `".$table_prefix."user_payments` (`uid`,`uppayment`,`upgateway`,`uptrack_code`,`update`,`upcomment`,`walletacc`) VALUES (?,?,?,?,?,?,?) "); $values = array($uid,$uppayment,$upgateway,$uptrack_code,$now,$upcomment,$walletacc); $query->execute($values); $counts = $query->rowCount(); return $counts;}

   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
 function Getmissionslistbyid($id) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `nim_missions` WHERE `aid`=?");

 $values = array($id);
 $query->execute($values);
 $counts = $query->rowCount();
 if($counts==1) { $result = $query->fetchAll(); return $result; } 
 else { return $counts; } } 

 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 
 
  function Getcustomerformission($idd) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."customers` WHERE `aid`=?");

 $values = array($idd);
 $query->execute($values);
 $counts = $query->rowCount();
 if($counts==1) { $result = $query->fetchAll(); return $result; } 
 else { return $counts; } } 

 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	}


?>