<?php include_once('class.database.php'); class ManageFees { public $link; function __construct() { global $table_prefix; $db_connection = new dbConnection(); $this->link = $db_connection->connect(); return $this->link; }



function WalletUpdate($sum,$uid) { global $table_prefix; $query = $this->link->prepare("UPDATE `".$table_prefix."users` SET `mainwallet`=? WHERE `uid`=?"); $values = array($sum,$uid); $query->execute($values); $counts = $query->rowCount(); return $counts; }

function WalletUpdateincome($sum,$uid) { global $table_prefix; $query = $this->link->prepare("UPDATE `".$table_prefix."users` SET `incomewallet`=? WHERE `uid`=?"); $values = array($sum,$uid); $query->execute($values); $counts = $query->rowCount(); return $counts; }

function WalletUpdatereferral($sum,$uid) { global $table_prefix; $query = $this->link->prepare("UPDATE `".$table_prefix."users` SET `referralwallet`=? WHERE `uid`=?"); $values = array($sum,$uid); $query->execute($values); $counts = $query->rowCount(); return $counts; }
    
function WalletUpdatereferral2($sum,$umps) { global $table_prefix; $query = $this->link->prepare("UPDATE `".$table_prefix."users` SET `referralwallet`=? WHERE `uusername`=?"); $values = array($sum,$umps); $query->execute($values); $counts = $query->rowCount(); return $counts; }


function GetWallet($uid) { global $table_prefix; $tids=implode(',', $tids); $query = $this->link->prepare("SELECT * FROM `".$table_prefix."users` WHERE `uid`=?"); $values = array($uid); $query->execute($values); $result = $query->fetchAll(); return $result; } 

function GetWalletother($uiddd) { global $table_prefix; $tids=implode(',', $tids); $query = $this->link->prepare("SELECT * FROM `".$table_prefix."users` WHERE `uusername`=?"); $values = array($uiddd); $query->execute($values); $result = $query->fetchAll(); return $result; } 





function GetWallet2($uid) { global $table_prefix; $tids=implode(',', $tids); $query = $this->link->prepare("SELECT * FROM `".$table_prefix."users` WHERE `uid`=?"); $values = array($uid); $query->execute($values); $result = $query->fetchAll(); return $result; } 



function AddUserr($aid,$uusername,$upass,$uparent_pass,$uactive,$uexpiration_date,$ufname,$ulname,$ufaname,$uemail,$uparent_email,$ugender,$ustatus,$ubirthdate,$ucardid,$ucard_place,$udegree,$umajor,$ucurrent_major,$uarmy_status,$ujob,$uskills,$uhome_address,$uhome_zipcode,$uhome_tel,$uwork_address,$uwork_zipcode,$uwork_tel,$umobile,$uparent_mobile,$ucomment,$upic,$unewsletter,$ureg_date,$utimestamp,$wallet,$VIP) { global $table_prefix; $now = gmdate("Y-m-d H:i:s"); $query = $this->link->prepare("INSERT INTO `".$table_prefix."users` (`aid`,`uusername`,`upass`,`uparent_pass`,`uactive`,`uexpiration_date`,`ufname`,`ulname`,`ufaname`,`uemail`,`uparent_email`,`ugender`,`ustatus`,`ubirthdate`,`ucardid`,`ucard_place`,`udegree`,`umajor`,`ucurrent_major`,`uarmy_status`,`ujob`,`uskills`,`uhome_address`,`uhome_zipcode`,`uhome_tel`,`uwork_address`,`uwork_zipcode`,`uwork_tel`,`umobile`,`uparent_mobile`,`ucomment`,`upic`,`unewsletter`,`ureg_date`,`utimestamp`,`wallet`,`VIP`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) "); $values = array($aid,$uusername,$upass,$uparent_pass,$uactive,$uexpiration_date,$ufname,$ulname,$ufaname,$uemail,$uparent_email,$ugender,$ustatus,$ubirthdate,$ucardid,$ucard_place,$udegree,$umajor,$ucurrent_major,$uarmy_status,$ujob,$uskills,$uhome_address,$uhome_zipcode,$uhome_tel,$uwork_address,$uwork_zipcode,$uwork_tel,$umobile,$uparent_mobile,$ucomment,$upic,$unewsletter,$ureg_date,$utimestamp,$wallet,$VIP); $query->execute($values); $counts = $query->rowCount(); return $counts;}




function GetPaymentList($query,$num=false) { global $table_prefix; $query = $this->link->query("SELECT ".($num==false?"*":"count(*) as num")." FROM `".$table_prefix."user_payments` INNER JOIN `".$table_prefix."users` ON `".$table_prefix."user_payments`.`uid`=`".$table_prefix."users`.`uid` $query"); $result = $query->fetchAll(); if($num==true) return $result[0]['num']; else return $result; return $result; } 

function GetPaymentListapp($query) { global $table_prefix; $query = $this->link->query("SELECT * FROM `nim_user_payments_app` $query"); $result = $query->fetchAll(); if($num==true) return $result[0]['num']; else return $result; return $result; }

function GetwalletListttp($query) { global $table_prefix; $query = $this->link->query("SELECT * FROM `nim_wallet_ids` $query"); $result = $query->fetchAll(); if($num==true) return $result[0]['num']; else return $result; return $result; }



function Deleteapprove($upid) { global $table_prefix; $query = $this->link->prepare("DELETE FROM `".$table_prefix."user_payments_app` WHERE `upid`=?"); $values = array($upid); $query->execute($values); $counts = $query->rowCount(); if($counts==1) return 1; else return $counts; } 

function AddUserPayment($uid,$uppayment,$upgateway,$uptrack_code,$upcomment,$walletacc) { global $table_prefix; $now = gmdate("Y-m-d H:i:s"); $query = $this->link->prepare("INSERT INTO `".$table_prefix."user_payments` (`uid`,`uppayment`,`upgateway`,`uptrack_code`,`update`,`upcomment`,`walletacc`) VALUES (?,?,?,?,?,?,?) "); $values = array($uid,$uppayment,$upgateway,$uptrack_code,$now,$upcomment,$walletacc); $query->execute($values); $counts = $query->rowCount(); return $counts;}



function AddUserPaymentapp($uid,$uppayment,$upgateway,$uptrack_code,$upcomment,$walletacc,$admin_status) { global $table_prefix; $now = gmdate("Y-m-d H:i:s"); $query = $this->link->prepare("INSERT INTO `".$table_prefix."user_payments_app` (`uid`,`uppayment`,`upgateway`,`uptrack_code`,`update`,`upcomment`,`walletacc`,`admin_status`) VALUES (?,?,?,?,?,?,?,?) "); $values = array($uid,$uppayment,$upgateway,$uptrack_code,$now,$upcomment,$walletacc,$admin_status); $query->execute($values); $counts = $query->rowCount(); return $counts;}




function AddUserPaymentdis($uid,$uppayment,$upgateway,$uptrack_code,$upcomment) { global $table_prefix; $now = gmdate("Y-m-d H:i:s"); $query = $this->link->prepare("INSERT INTO `".$table_prefix."user_payments` (`uid`,`uppayment`,`upgateway`,`uptrack_code`,`update`,`upcomment`) VALUES (?,?,?,?,?,?) "); $values = array($uid,$uppayment,$upgateway,$uptrack_code,$now,$upcomment); $query->execute($values); $counts = $query->rowCount(); return $counts;}


function updateUserinveststatus($nid) { global $table_prefix; $now = gmdate("Y-m-d H:i:s"); $query = $this->link->prepare("UPDATE `nim_invest` SET aactive='0' WHERE nid=? "); $values = array($nid); $query->execute($values); $counts = $query->rowCount(); return $counts;} 



function GetUserPayments($uid) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."user_payments` WHERE `uid`=?"); $values = array($uid); $query->execute($values); $result = $query->fetchAll(); return $result; }

function GetUserinvestlist($uusername) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `nim_invest` WHERE `uusername`=?"); $values = array($uusername); $query->execute($values); $result = $query->fetchAll(); return $result; }




    function Getuseruusernamef($uusername) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `nim_users` WHERE `uusername`=?"); $values = array($uusername); $query->execute($values); $result = $query->fetchAll(); return $result; }



    function GetUserinvestlistsum($uusername) { global $table_prefix; $query = $this->link->prepare("SELECT SUM(amount) as sum_score FROM `nim_invest` WHERE `uusername`=?"); $values = array($uusername); $query->execute($values); $result = $query->fetchAll(); return $result; }



    function GetUserPaymentsapplist($uid) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."user_payments_app` WHERE `uid`=?"); $values = array($uid); $query->execute($values); $result = $query->fetchAll(); return $result; }


    function Getinvestlist($pid) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `nim_package` WHERE pid=?"); $values = array($pid); $query->execute($values); $result = $query->fetchAll(); return $result; }


    function Getinvestlistnoid($pid) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `nim_package`"); $values = array($pid); $query->execute($values); $result = $query->fetchAll(); return $result; }


    function Addwallettypepps($wallet,$wallet_type,$acomment) { global $table_prefix; $now = gmdate("Y-m-d H:i:s"); $query = $this->link->prepare("INSERT INTO `nim_wallet_ids` (`wallet`,`wallet_type`,`acomment`) VALUES (?,?,?) "); $values = array($wallet,$wallet_type,$acomment); $query->execute($values); $counts = $query->rowCount(); return $counts; }


    function Addinvestuser($amount,$expdate,$aactive,$uusername,$intrest,$investpack,$start_date) { global $table_prefix; $now = gmdate("Y-m-d H:i:s"); $query = $this->link->prepare("INSERT INTO `nim_invest` (`amount`,`expdate`,`aactive`,`uusername`,`intrest`,`investpack`,`start_date`) VALUES (?,?,?,?,?,?,?) "); $values = array($amount,$expdate,$aactive,$uusername,$intrest,$investpack,$start_date); $query->execute($values); $counts = $query->rowCount(); return $counts; }

    
function GetreferalList($referral) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `nim_users`  WHERE ucomment=?"); $values = array($referral); $query->execute($values); $result = $query->fetchAll(); return $result; } 

function GetreferalListcod($ucomment1) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `nim_users`  WHERE umobile=?"); $values = array($ucomment1); $query->execute($values); $result = $query->fetchAll(); return $result; } 


function GetreferalListcodcount($ucomment) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `nim_users`  WHERE umobile=?"); $values = array($ucomment); $query->execute($values); $counts = $query->rowCount(); return $counts; } 


    function GetmaWalletList($uid) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `nim_users` WHERE `uid`=?"); $values = array($uid); $query->execute($values); $result = $query->fetchAll(); return $result; } }


?>