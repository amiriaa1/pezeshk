<?php

$login_needed=0;
include_once('main.php');
include_once('header.php');

$student = new ManageStudents();	
$fee=new ManageFees();
$query="ORDER BY `city`.`id` DESC";
$userPayments = $fee->Getcitylist($query);

	
$query="";
$userPayments2 = $fee->Gettypelist($query);


$uusername=$_POST['uusername'];
$pass=$_POST['pass'];
$type=$_POST['type'];
$name=$_POST['name'];
$city=$_POST['city'];
$tell=$_POST['tell'];
$uactive=1;
if($student->UsernameAvailability($uusername)==0)
				{
					
					$error = $uusername_title._USER_SIDE_USERNAME_IS_RESERVED;
					echo $error;
				}
				else
				{
						$counts = $student->AddStudent(1,$uusername,md5($pass),$uactive,$name,$city,$type,$tell);
				}
				if($counts==1)
					{
						$success = _YOU_SUCCESSFULLY_SIGNED_UP;
						echo $success;
						}


	

echo'



 <div class="box box-default">
			<div class="box-header with-border">
			  <h4 class="box-title">افزودن کاربر</h4>
			 		
			</div>
			
			<!-- /.box-header -->
			
		<form class="form-vertical" id="add" method="post" action="" >

			<div class="box-body wizard-content">
			
					<!-- Step 1 -->
					
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								
									<label for="addres">نام کاربری</label>
<input type="text" name="uusername"  id="uusername" class="form-control" required data-validation-required-message="This field is required">
<br> رمز
<input type="text" name="pass"  id="pass" class="form-control" required data-validation-required-message="This field is required">
									</div>
							</div>
							
							
							<div class="col-md-6">
								<div class="form-group">
								
									<label for="type">نوع کاربر</label>
		<select  name="type" id="type"  class="form-control select2 w-p100" >
						 ';
				foreach($userPayments2 as $disuserProp2)
					{
						
			echo'<option selected="selected" name="type" id="type" value="'.$disuserProp2['aid'].'">'.$disuserProp2['text'].'</option>';
						
					}
					echo'	  
						</select>

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
						
			echo'<option selected="selected" name="city" id="city" value="'.$disuserProp['id'].'">'.$disuserProp['name'].'</option>';
						
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





