<?php

$login_needed=0;
include_once('main.php');
include_once('header.php');
$student = new ManageStudents();
$fee = new ManageFees();	
if(isset($_GET['id']))
			{
	$id=$_GET['id'];	
	
			
$query = "WHERE aid=$id ";	
$disuserList = $fee->GetcustomersList($query);

			}

			
	  
echo'
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.css" rel="stylesheet" type="text/css">
    <script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js" type="text/javascript"></script>




 <div class="box box-default">
			<div class="box-header with-border">
			  <h4 class="box-title">Client invest</h4>
			 		
			</div>
			
			<!-- /.box-header -->
			
			
			
			  
<div id="map" style="width: 1808px; height: 450px; background: #eee; border: 2px solid #aaa;"></div>

<script type="text/javascript">



    var map = new L.Map("map", {
        key: "web.557352077ed74289898568a7de7b1588",
        maptype: "osm-bright",
        poi: true,
        traffic: false,
        center: [35.718240469043195,51.34226983881916],
        zoom: 9
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
  {alt: "'.$test.'"}).addTo(map) // "Kyiv" is the accessible name of this marker
  .bindPopup("'.$test.', '.$addres.'");
	
							
							
						</script>	
';
}
echo'
			<div class="box-body wizard-content">
			
					<!-- Step 1 -->
					
					<section>
						<div class="row">
					
							
						
						
						'.$test.'
						
						
						
						
							</div>
					</div>
			</div>
						
						
						</div>
						</div>
						
						

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





