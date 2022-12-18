<?php

$login_needed=0;
include_once('main.php');
include_once('header.php');
$student = new ManageStudents();
$fee = new ManageFees();	
	


if($_GET['state']=="del"){
	
	$id=$_GET['id'];
$userPayments = $fee->Deletecustomerapp($id);
					
	if($userPayments==1){echo'delete shod';}
	else{echo'problem in deleting';}
}

if($_GET['state']=="approve"){
	
	$id=$_GET['id'];
	$query1 = " WHERE aid=$id ORDER BY `nim_customers_add_app`.`name` ASC";			
$disuserList1 = $fee->GetcustomersListapproval($query1);
 foreach($disuserList1 as $disuserProp1)
					{
						$name=$disuserProp1['name'];
						$lat=$disuserProp1['lat'];
						$lng=$disuserProp1['lng'];
						$addres=$disuserProp1['addres'];
				     	$cutomerstype=$disuserProp1['cusomer_type'];
						$submitby=$disuserProp1['submitby'];
						$approve=$disuserProp1['approve'];
	                }
					if(!$approve==1){
	
	$userPayments = $fee->Addcustomers($name,$lat,$lng,$addres,$cutomerstype,$submitby);
	$userPayments = $fee->customerappupdate($id);
	
	$userPayments1 = $fee->GetmaWalletList($submitby);
	foreach ($userPayments1 as $userPayment) {
	
	$walletget=$userPayment['mainwallet'];
	$uid2=$userPayment['uid'];

                                            }
$amount='10000';
$sum=$walletget+$amount;
$fee->WalletUpdate($sum,$submitby);
$uidprob=$uid2;	
$uppaymentdprob=$amount;
$uptrack_codeprob=rand(956,10000000);
$fee->AddUserPayment($uidprob,$uppaymentdprob,0,$uptrack_codeprob,'واریز به کیف پول برای ثبت مرکز',10);										
	
	}
}


	
$query = "WHERE approve=0 ORDER BY `nim_customers_add_app`.`name` ASC";			
$disuserList = $fee->GetcustomersListapproval($query);

			

			
	  
echo'



 <style>@-webkit-keyframes fa-beat{0%,90%{-webkit-transform:scale(1);transform:scale(1)}45%{-webkit-transform:scale(var(--fa-beat-scale,1.25));transform:scale(var(--fa-beat-scale,1.25))}}@-webkit-keyframes fa-bounce{0%{-webkit-transform:scale(1) translateY(0);transform:scale(1) translateY(0)}10%{-webkit-transform:scale(var(--fa-bounce-start-scale-x,1.1),var(--fa-bounce-start-scale-y,.9)) translateY(0);transform:scale(var(--fa-bounce-start-scale-x,1.1),var(--fa-bounce-start-scale-y,.9)) translateY(0)}30%{-webkit-transform:scale(var(--fa-bounce-jump-scale-x,.9),var(--fa-bounce-jump-scale-y,1.1)) translateY(var(--fa-bounce-height,-.5em));transform:scale(var(--fa-bounce-jump-scale-x,.9),var(--fa-bounce-jump-scale-y,1.1)) translateY(var(--fa-bounce-height,-.5em))}50%{-webkit-transform:scale(var(--fa-bounce-land-scale-x,1.05),var(--fa-bounce-land-scale-y,.95)) translateY(0);transform:scale(var(--fa-bounce-land-scale-x,1.05),var(--fa-bounce-land-scale-y,.95)) translateY(0)}57%{-webkit-transform:scale(1) translateY(var(--fa-bounce-rebound,-.125em));transform:scale(1) translateY(var(--fa-bounce-rebound,-.125em))}64%{-webkit-transform:scale(1) translateY(0);transform:scale(1) translateY(0)}to{-webkit-transform:scale(1) translateY(0);transform:scale(1) translateY(0)}}@-webkit-keyframes fa-fade{50%{opacity:var(--fa-fade-opacity,.4)}}@-webkit-keyframes fa-beat-fade{0%,to{opacity:var(--fa-beat-fade-opacity,.4);-webkit-transform:scale(1);transform:scale(1)}50%{opacity:1;-webkit-transform:scale(var(--fa-beat-fade-scale,1.125));transform:scale(var(--fa-beat-fade-scale,1.125))}}@-webkit-keyframes fa-flip{50%{-webkit-transform:rotate3d(var(--fa-flip-x,0),var(--fa-flip-y,1),var(--fa-flip-z,0),var(--fa-flip-angle,-180deg));transform:rotate3d(var(--fa-flip-x,0),var(--fa-flip-y,1),var(--fa-flip-z,0),var(--fa-flip-angle,-180deg))}}@-webkit-keyframes fa-shake{0%{-webkit-transform:rotate(-15deg);transform:rotate(-15deg)}4%{-webkit-transform:rotate(15deg);transform:rotate(15deg)}8%,24%{-webkit-transform:rotate(-18deg);transform:rotate(-18deg)}12%,28%{-webkit-transform:rotate(18deg);transform:rotate(18deg)}16%{-webkit-transform:rotate(-22deg);transform:rotate(-22deg)}20%{-webkit-transform:rotate(22deg);transform:rotate(22deg)}32%{-webkit-transform:rotate(-12deg);transform:rotate(-12deg)}36%{-webkit-transform:rotate(12deg);transform:rotate(12deg)}40%,to{-webkit-transform:rotate(0deg);transform:rotate(0deg)}}@-webkit-keyframes fa-spin{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}:root{--fa-font-brands:normal 400 1em/1 "Font Awesome 6 Brands"}@font-face{font-family:"Font Awesome 6 Brands";font-style:normal;font-weight:400;font-display:block;src:url(../webfonts/fa-brands-400.woff2) format("woff2"),url(../webfonts/fa-brands-400.ttf) format("truetype")}:root{--fa-font-regular:normal 400 1em/1 "Font Awesome 6 Free"}@font-face{font-family:"Font Awesome 6 Free";font-style:normal;font-weight:400;font-display:block;src:url(../webfonts/fa-regular-400.woff2) format("woff2"),url(../webfonts/fa-regular-400.ttf) format("truetype")}:root{--fa-font-solid:normal 900 1em/1 "Font Awesome 6 Free"}@font-face{font-family:"Font Awesome 6 Free";font-style:normal;font-weight:900;font-display:block;src:url(../webfonts/fa-solid-900.woff2) format("woff2"),url(../webfonts/fa-solid-900.ttf) format("truetype")}</style><link rel="stylesheet" href="assets/fonts/fontawesome-free-6.1.1-web/css/all.min.css" media="print" onload="this.media="all""><noscript><link rel="stylesheet" href="assets/fonts/fontawesome-free-6.1.1-web/css/all.min.css"></noscript>
  <link rel="stylesheet" href="assets/styles/fonts/iran-sans.css" media="print" onload="this.media="all""><noscript><link rel="stylesheet" href="assets/styles/fonts/iran-sans.css"></noscript>
  <style type="text/css">@font-face{font-family:"Material Icons";font-style:normal;font-weight:400;font-display:block;src:url(https://fonts.gstatic.com/s/materialicons/v139/flUhRq6tzZclQEJ-Vdg-IuiaDsNcIhQ8tQ.woff2) format("woff2");}.material-icons{font-family:"Material Icons";font-weight:normal;font-style:normal;font-size:24px;line-height:1;letter-spacing:normal;text-transform:none;display:inline-block;white-space:nowrap;word-wrap:normal;direction:ltr;-webkit-font-feature-settings:"liga";-webkit-font-smoothing:antialiased;}</style>


<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.css" rel="stylesheet" type="text/css">
    <script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js" type="text/javascript"></script>

  <!-- Leaflet Marker-Cluster -->
  <link rel="stylesheet" href="assets/scripts/leaflet/cluster/MarkerCluster.css" media="print" onload="this.media="all"">
  <noscript><link rel="stylesheet" href="assets/scripts/leaflet/cluster/MarkerCluster.css"></noscript>
  
  
  <link rel="stylesheet" href="assets/scripts/leaflet/cluster/MarkerCluster.Default.css" media="print" onload="this.media="all"">
  <noscript><link rel="stylesheet" href="assets/scripts/leaflet/cluster/MarkerCluster.Default.css"></noscript>
  <script src="assets/scripts/leaflet/cluster/leaflet.markercluster.js"></script>

  <link rel="stylesheet" href="assets/scripts/leaflet/draw/leaflet.draw.css" media="print" onload="this.media="all""><noscript><link rel="stylesheet" href="assets/scripts/leaflet/draw/leaflet.draw.css"></noscript>
  <script src="assets/scripts/leaflet/draw/leaflet.draw.js"></script>

  <script src="assets/scripts/leaflet/editable/Leaflet.Editable.js"></script>

  <script src="assets/scripts/leaflet/ant-path/leaflet-ant-path.js"></script>

 
 <script>
    paceOptions = {
      ajax: false,
      restartOnPushState: false
    }
  </script>
<script id="pace-script" src="assets/scripts/pace-js/pace.min.js"></script>






 <div class="box box-default">
			<div class="box-header with-border">
			  <h4 class="box-title">لیست مراکز نیاز به تایید</h4>
			 		
			</div>
			
			<!-- /.box-header -->
			
			
			
			  
<div id="map" style="width: 1808px; height: 450px; background: #eee; border: 2px solid #aaa;"></div>


<script type="text/javascript">



    var map = new L.Map("map", {
        key: "web.557352077ed74289898568a7de7b1588",
        maptype: "osm-bright",
        poi: true,
        traffic: true,
        center: [35.718240469043195,51.34226983881916],
        zoom: 9
    });
	
	

	

  var myIcon = L.icon({
    iconUrl: "Address.png",
    iconSize: [38, 95],
    iconAnchor: [22, 94],
    popupAnchor: [-3, -76],
    shadowUrl: "Address.png",
    shadowSize: [68, 95],
    shadowAnchor: [22, 94]
});
 
 </script>

  
  

  
  ';
 
 foreach($disuserList as $disuserProp)
					{
						$test=$disuserProp['name'];
						
						$lat=$disuserProp['lat'];
						$lng=$disuserProp['lng'];
						$addres=$disuserProp['addres'];
						
					
 echo'
 <script type="text/javascript">

var lat="'.$lat.'";
var lng="'.$lng.'";


		var marker = L.marker(['.$lat.','.$lng.'],
  {alt: "'.$test.'"},{icon: myIcon}).addTo(map) 
  .bindPopup("'.$test.', '.$addres.'");
	
							
							
						</script>	
';
}
echo'
		

 <div class="box box-default">
			<div class="box-header with-border">
			  <h4 class="box-title">لیست مراکز نیاز به تایید</h4>
			 		
			</div>
			<!-- /.box-header -->
			<div class="box-body wizard-content">
				
						
					

	<div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-success myadmin-alert-top alerttop">
	<i class="ti-user"></i> This is an example top alert. You can edit what u wish. <a href="#" class="closed">&times;</a> </div>
								</div>
						
					<div style="'.$table_width.'">
						  <table class="table table-padded recent-order-list-table table-responsive-fix-big">
							<tr class="table_header default_font">
							';
					echo '
							<td style="width:70px;" class="small">
								id
							</td>';
					echo '
							<td style="width:120px;" class="small">
									<b>نام</b>
							</td>';
					echo '
							<td style="width:120px;" class="small">
									<b>آدرس</b>
							</td>';
				
						
					echo '
							<td style="width:120px;" class="small">
									<b>cusomer_type</b>
							</td>';
							
						
							
							
				
					
						
					echo '</tr>';
					///--Table Header
					$i=0;
					foreach($disuserList as $disuserProp)
					{
						if($i%2==0)
							$bgClass = "tr_hover_class";
						else
							$bgClass = "";
						echo '<tr style="height:30px; border-bottom:silver;" class="table_rows default_font '.$bgClass.'">';
						echo '<td style="text-align:left;">
									<!-- Split button -->
									<div class="btn-group">
										<a href="centerpoint_approve?id='.$disuserProp['aid'].'&state=approve">
										<button type="submit" class="btn btn-rounded btn-success mb-5">تایید</button></a>
										
										<a href="centerpoint_approve?id='.$disuserProp['aid'].'&state=del">
										<button type="submit" class="btn btn-rounded btn-danger mb-5">رد</button></a>
										
							
										
									</div>
								</td>';
						echo '<td style="text-align:center;">
							'.$disuserProp['name'].'
							</td>';
						
						echo '<td style="text-align:center;">
							'.$disuserProp['addres'].'
							</td>';
						
						
						
							
							
							
								echo '<td style="text-align:'.$align1.';">
				<span>'.$disuserProp['cusomer_type'].'</span>
							</td>';
							
						
					
					
						
								
							
						
						echo '</tr>';	
						$i++;				
					}
					echo '</table>
						
						
						
						
						
						
						</div>
						</div></div></div>



						

';


include_once('footer.php');




echo'
	 <!-- Sweet-Alert  -->
    <script src="assets/vendor_components/sweetalert/sweetalert.min.js"></script>
    <script src="assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js"></script>
	
	<!-- js -->
	<script src="js/vendors.min.js"></script>
	
	<!-- Crypto Admin App -->
	<script src="js/jquery.smartmenus.js"></script>
	<script src="js/menus.js"></script>
	<script src="js/template.js"></script>
	
	<!-- Crypto Admin for demo purposes -->
	<script src="js/demo.js"></script>
	<!-- Bootstrap 4.0-->
	<script src="js/pages/notification.js"></script>
    <script src="js/pages/toastr.js"></script>
   
</body>
</html>

	';

?>





