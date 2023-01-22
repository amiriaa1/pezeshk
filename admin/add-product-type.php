<?php

$login_needed=0;
include_once('main.php');
include_once('header.php');


$fee = new ManageFees();	
$site=$_POST['site'];
$name=$_POST['name'];
$pic=$_POST['pic'];




if(isset($_POST['site'])){
if($fee->Addproducttype($name,$site,$pic)==0)
				{
					
					
					echo"خطا انجام نشد";
				}
				else
				{
						echo"دسته بندی ثبت شد";
				}
			

	
}
echo'



 <div class="box box-default">
			<div class="box-header with-border">
			  <h4 class="box-title">افزودن دسته بندی محصول</h4>
			 		
			</div>
			
			<!-- /.box-header -->
			
		<form class="form-vertical" id="add" method="post" action="" >

			<div class="box-body wizard-content">
			
					<!-- Step 1 -->
					
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								
									<label for="name">نام دسته بندی</label>
<input type="text" name="name"  id="name" class="form-control" required data-validation-required-message="This field is required"><br>
<label for="pic">ادرس عکس دته بندی</label>
<input type="text" name="pic"  id="pic" class="form-control" required data-validation-required-message="This field is required">

									</div>
							</div>
							
							
						
						
							<div class="col-md-6">
								<div class="form-group">
								<h5>نمایش در سایت؟؟<span class="text-danger">*</span></h5>
								<div class="controls">
				
<select  name="site" id="site"  class="form-control select2 w-p100" >
						  <option selected="selected" name="site" id="site" value="medico">medico</option>
						  <option  name="site" id="site" value="denctcenter">denctcenter</option>
						    <option  name="site" id="site" value="azmacenter">azmacenter</option>
						      <option  name="site" id="site" value="citracenter">citracenter</option>
						  
						</select>								</div>
							</div>

							</div>
						
						
						
						
						
										<div class="text-xs-right">
										
							<button type="submit" class="btn btn-rounded btn-info">ثبت اطلاعات</button>
							
						</form>
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





