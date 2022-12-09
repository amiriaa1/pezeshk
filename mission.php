<?php

$login_needed=1;
include_once('main.php');
include_once('header.php');
$student = new ManageStudents();
$fee = new ManageFees();	
		
		if (isset($_POST['idd'])){
			
			$idd=$_POST['idd'];
		    $name=$_POST['name'];
			$lat=$_POST['lat'];
			$lng=$_POST['lng'];
		    $addr=$_POST['addr'];
			$promoter=$_POST['promoter'];
			$comment=$_POST['comment'];
			$type=1;
			$status=0;
			
			$discountList = $fee->Addmissions($idd,$type,$status,$name,$addr,$lat,$lng,$comment,$promoter);
			
			
			
		}
		
		
		
$query = "ORDER BY `nim_customers`.`name` ASC";			
$disuserList = $fee->GetcustomersList($query);

	
		
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
			  <h4 class="box-title">لیست مشتری ها</h4>
			 		
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
	
	

	


							
					
 
 </script>

  
  

  
  ';
 
 foreach($disuserList as $disuserProp)
					{
						$idd=$disuserProp['aid'];
						$test=$disuserProp['name'];
						
						$lat=$disuserProp['lat'];
						$lng=$disuserProp['lng'];
						$addres=$disuserProp['addres'];
						
					
 echo'
 <script type="text/javascript">

var lat="'.$lat.'";
var lng="'.$lng.'";
var idd="'.$idd.'";

		
		
	L.marker(['.$lat.','.$lng.'],
        {alt: "'.$test.'"},
		{bubblingMouseEvents: "true"}
		).addTo(map) 
  .bindPopup("'.$test.', '.$addres.', '.$idd.'");
	map.on("click", showStudentProp);	

	
function showStudentProp()
 {
	 
	 
	                            document.getElementById("newnew").style.visibility = "visible";
								$("#newnew").html(\'<img src="images/wait.gif">\');
								var idd = $("#idd").val();
								$.ajax({
								    url: "aj.php",
								    type: "POST",
								    data: {op:"customeridtodet",idd:idd},
									dataType: "json",
								    success: function(data){
							
							if(data.statusCode==200){ 
							document.getElementById("newnew").style.visibility = "hidden";
                                document.getElementById("sa-success").style.visibility = "visible";
							$("#sa-success").html("دیتا دریافت شد");   		
								var name=data.name;
								var lat=data.lat;
								var lng=data.lng;
								var addres=data.addres;
								
								$("#name").val(name);
								$("#lat").val(lat);
								$("#lng").val(lng);
								$("#addr").val(addres);
								
								
								}
									
                                else if(data.statusCode==201){
									
									
									
								document.getElementById("sa-success").style.visibility = "visible";
								$("#sa-success").html("اطلاعات صحیح نیست");
								
								
							}
									
									},
									
								    error: function(){$("#sa-success").html("Problem in Ajax")}
								});
							
 }
						</script>	
';
}	

echo'
			<div class="box-body wizard-content">
			
					<!-- Step 1 -->
					<form action="" method="post" id="missions">
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								
									<label for="idd">کد مرکز</label>
<input type="text" name="idd"  id="idd" class="form-control" required data-validation-required-message="This field is required" onchange="showStudentProp()">

									</div>
							</div>
							
							
							<div class="col-md-6">
								<div class="form-group">
								
									<label for="cutomerstype">کاربر فروش</label>
		<select  name="promoter" id="promoter"  class="form-control select2 w-p100" >
						  <option selected="selected" name="promoter" id="promoter" value="00">آزاد</option>
						';
$query = "";			
$discountList = $student->GetStudentList($query);
						foreach($discountList as $disuserProp2)
					{
						
						echo'
						
<option selected="selected" name="promoter" id="promoter" value="'.$disuserProp2['uusername'].'">'.$disuserProp2['uusername'].'--'.$disuserProp2['ufaname'].'</option>
						';
						
					}
						echo'
						  
						</select>

									</div>
							</div>
							
							
							
						
						
						
							<div class="col-md-6">
								<div class="form-group">
								<h5>نام مشتری<span class="text-danger">*</span></h5>
								<div class="controls">
				
				<input type="text" name="name"  id="name"  class="form-control" required data-validation-required-message="This field is required">
								</div>
							</div>

							</div>
						
						
						
							<div class="col-md-6">
								<div class="form-group">
								<h5>توضیحات<span class="text-danger">*</span></h5>
									<div class="controls">
					<input type="text" name="comment"  id="comment" class="form-control" required data-validation-required-message="This field is required">
					
					
			<input type="hidden" name="submitby" id="submitby" value="'.$uusername.'" >
			
			<input type="hidden" name="lat" id="lat" value="" >
			<input type="hidden" name="lng" id="lng" value="" >
			<input type="hidden" name="addr" id="addr" value="" >

										<br>
										<div class="text-xs-right">
										
							<button type="submit" class="btn btn-rounded btn-info" >ثبت اطلاعات</button>
							</form>
						<span name"newnew" id="newnew"></span>
						</div>
				</div>
							</div>
					</div>
			</div>
			
			
						
						
						</div>
						</div>
						
						

<div name"sa-success" id="sa-success" class="alert alert-success" style="visibility:hidden;></div>

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
	
    
   
</body>
</html>

	';

?>





