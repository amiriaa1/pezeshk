<?php

$login_needed=0;
include_once('main.php');
include_once('header.php');

		
$fee=new ManageFees();
$query="ORDER BY `city`.`id` DESC";
$userPayments = $fee->Getcitylist($query);	

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
	
	
	

							function showStudentProp()
							{
								$("#show_back").html(\'<img src="images/wait.gif">\');
								var addres = $("#addres").val();
								var cutomerstype = $("#cutomerstype").val();
								var lat = $("#lat").val();
								var lng = $("#lng").val();
								var name = $("#name").val();
								var tell = $("#tell").val();
								var submitby = $("#submitby").val();
								var city = $("#city").val();
								if(addres!=""){
								$.ajax({
								    url: "aj.php",
								    type: "POST",
								    data: {op:"vfr",addres:addres,cutomerstype:cutomerstype,lat:lat,lng:lng,name:name,submitby:submitby,tell:tell,city:city},
									dataType: "json",
								    success: function(data){
							
							if(data.statusCode==200){ 
                                document.getElementById("sa-success").style.visibility = "visible";
							$("#sa-success").html("مشتری با موفقیت ثبت شد");   		
								
								
								
								
								
								
								}
									
                                else if(data.statusCode==201){
									
									
									
								document.getElementById("sa-success").style.visibility = "visible";
								$("#sa-success").html("اطلاعات صحیح نیست");
								
								
							}
									
									},
									
								    error: function(){$("#sa-success").html("Problem in Ajax")}
								});
								                           }
														   else{
			$("#show_back").html("اطلاعات خالی است");
		}
		                         
								
								
							}
							
							
						</script>	

			<div class="box-body wizard-content">
			
					<!-- Step 1 -->
					
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								
									<label for="addres">ادرس</label>
<input type="text" name="addres"  id="addres" class="form-control" required data-validation-required-message="This field is required">

									</div>
							</div>
							
							
							<div class="col-md-6">
								<div class="form-group">
								
									<label for="cutomerstype">نوع مشتری</label>
		<select  name="cutomerstype" id="cutomerstype"  class="form-control select2 w-p100" >
						  <option selected="selected" name="cutomerstype" id="cutomerstype" value="1">1</option>
						  <option selected="selected" name="cutomerstype" id="cutomerstype" value="2">2</option>
						  
						</select>

									</div>
							</div>
							
							
							
							<div class="col-md-6">
								<div class="form-group">
								<h5>طول جغرافیایی<span class="text-danger">*</span></h5>
								<div class="controls">
				
				<input type="text" name="lat" id="lat" disabled="disabled" class="form-control" required data-validation-required-message="This field is required">
								</div>
							</div>

							</div>
						
						
						
						
						
						
						
							<div class="col-md-6">
								<div class="form-group">
								<h5>نام<span class="text-danger">*</span></h5>
								<div class="controls">
				
				<input type="text" name="name" id="name"  class="form-control" required data-validation-required-message="This field is required">
								</div>
							</div>

							</div>
						
						
						
							<div class="col-md-6">
								<div class="form-group">
								<h5>شهر<span class="text-danger">*</span></h5>
								<div class="controls">
				
				<select  name="city" id="city"  class="form-control select2 w-p100" >
				
				
				';
				foreach($userPayments as $disuserProp)
					{
						
						echo'<option selected="selected" name="cutomerstype" id="cutomerstype" value="'.$disuserProp['id'].'">'.$disuserProp['name'].'</option>';
						
					}
				echo'</select>
								</div>
							</div>

							</div>
						
						
						
							
						
							<div class="col-md-6">
								<div class="form-group">
								<h5>تلفن<span class="text-danger">*</span></h5>
								<div class="controls">
				
				<input type="text" name="tell" id="tell"  class="form-control" required data-validation-required-message="This field is required">
								</div>
							</div>

							</div>
						
						
						
						
							<div class="col-md-6">
								<div class="form-group">
								<h5>عرض جغرافیایی <span class="text-danger">*</span></h5>
									<div class="controls">
											<input type="text" name="lng" disabled="disabled" id="lng" class="form-control" required data-validation-required-message="This field is required">
			<input type="hidden" name="submitby" id="submitby" value="'.$ausername.'" >

										<br>
										<div class="text-xs-right">
										
							<button type="submit" class="btn btn-rounded btn-info" onclick="showStudentProp()">ثبت اطلاعات</button>
							
						
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





