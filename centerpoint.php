<?php

$login_needed=1;
include_once('main.php');
include_once('header.php');

		
echo'
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.css" rel="stylesheet" type="text/css">
    <script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js" type="text/javascript"></script>

<div class="col-12">
<div class="box box-inverse bg-dark bg-hexagons-white">
<div class="box-body">
<div class="row">						
<center><H2>for invest you need first deposit to wallet</H2></center>
</div>
</div>
</div>
</div>




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
        zoom: 14
    });

		
	const popup = L.popup()
		.setLatLng([35.718240469043195,51.34226983881916])
		.setContent("کلیک کنید و موقعیت مورد نظر را مشخص کنید")
		.openOn(map);

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent(`موقعیت به مشخصات ${e.latlng.toString()} انتخاب شد`)
			.openOn(map);
			const myArray = e.latlng.toString().split("(");
			const myArray2 = myArray.toString().split(",");
			const myArray3 = myArray2[2].split(")");
			document.getElementById("lat").value =myArray2[1];
		
			document.getElementById("lng").value =myArray3[0];
			
	}

	map.on("click", onMapClick);
	
	
</script>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			<div class="box-body wizard-content">
				<form  class="tab-wizard wizard-circle" action=""	method="post">
					<!-- Step 1 -->
					<h6>The capital can be withdrawn after one year</h6>
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								
									<label for="1hashid">invest program :</label>
									<select id="pid" name="pid" class="form-control select2 w-p100" >
									
									
									
										         
	 <option id="pid" name="pid" value="1" selected="selected">1</option>
										
							
						 
						</select>
									</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
								<h5>lat<span class="text-danger">*</span></h5>
								<div class="controls">
				
				<input type="text" name="lat" id="lat" class="form-control" required data-validation-required-message="This field is required" min="1000">
								</div>
							</div>

							</div>
						
						
					
						
							<div class="col-md-6">
								<div class="form-group">
								<h5>lng <span class="text-danger">*</span></h5>
									<div class="controls">
											<input type="text" name="lng" id="lng" class="form-control" required data-validation-required-message="This field is required" min="1000">

										<br>
										<div class="text-xs-right">
										
							<button type="submit" name="Submit" class="btn btn-rounded btn-info">Submit</button>
							
							</form>
						</div>
				</div>
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





