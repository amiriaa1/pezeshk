<?php

$login_needed=0;
include_once('main.php');
include_once('header.php');

$fee=new ManageFees();
$query="ORDER BY `nim_product`.`name` ASC";
$userPayments = $fee->Getproduct($query);	

if((!isset($_GET['id']))){


if($_POST['add_factor']!=="ساخت شماره فاکتور"){
	
	echo'
	<center>
	<form id="myForm" method="post" action="">
 
  <input type="submit" name="add_factor" id="add_factor" value="ساخت شماره فاکتور">
</form></center>
	';
	
	
}
else{
	
$factor_num=rand(999999,999999999);
$fee=new ManageFees();
$userPayments2 = $fee->Addfactorbase($factor_num);	
	
	if($userPayments2==1){
		
		
		echo "<script>
		
		window.location.href='add-factor?id=$factor_num';
		
		
		</script>";
		
	}


}
}
echo'



<script type="text/javascript">
							function showStudentProp()
							{
							
								var x = "51";
								
							$.ajax({
							
								    url: "aj.php",
								    type: "POST",
								    data: {op:"makefacror",x:x},
									dataType: "json",
								    success: function(data){
									
									     window.location.href = "/test";
									
									                        }
							      });
							
							
							
							}
						</script>
						




<div class="box-body p-15">						
						<div class="table-responsive">
							<table id="tickets" class="table mt-0 table-hover no-wrap table-borderless" data-page-size="10">
								<thead>
									<tr>
										<th>کد</th>
										<th>نام</th>
										<th>نوع</th>
										<th>تعداد</th>
										<th>نوع تعداد</th>
										<th>مبلغ فروش</th>
										<th>مبلغ خرید</th>
										<th>اضافه به فاکتور</th>
									</tr>
								</thead>
								
								<tbody>
								';
								
								foreach($userPayments as $disuserProp2)
					{
						
			echo'
			
			<tr>
										<td>'.$disuserProp2["pid"].'</td>
										<td>
											<a href="product-veiw?id='.$disuserProp2["pid"].'">'.$disuserProp2["name"].'</a>
										</td>
										<td>'.$disuserProp2["type"].'</td>
										<td>'.$disuserProp2["count"].'</td>
										<td><span class="badge badge-success">'.$disuserProp2["zaribcount"].'</span> </td>
										<td>'.$disuserProp2["price"].'</td>
										<td>'.$disuserProp2["buyprice"].'</td>
										<td>
										<input type="submit" name="add_factor" onclick="showStudentProp()" id="add_factor" value="Submit">

										</td>
									</tr>
			
			
			
			';
						
					}
								echo'
									
									
									
								
								</tbody>
							</table>
							<script src="js/vendors.min.js"></script>
	                        <script src="assets/vendor_components/datatable/datatables.min.js"></script>
                         	<script src="js/pages/data-table.js"></script>
	                        
	
	
	  
	
						</div>
					</div>
		

	


<div class="box box-default">
			<div class="box-header with-border">
			  <h4 class="box-title">لیست فاکتور</h4>
			 		
			</div>
			</div>
	
 <div class="box box-default">
			<div class="box-header with-border">
			  <h4 class="box-title">افزودن فاکتور</h4>
			 		
			</div>
			
			<!-- /.box-header -->
			
		<form class="form-vertical" id="add" method="post" action="" >

			<div class="box-body wizard-content">
			
					<!-- Step 1 -->
					
					<section>
						<div class="row">
							
							
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


	
	<!-- Crypto Admin App -->
	<script src="js/jquery.smartmenus.js"></script>
	<script src="js/menus.js"></script>
	<script src="js/template.js"></script>
	
	<!-- Crypto Admin for demo purposes -->
	<script src="js/demo.js"></script>
</body>
</html>

	';

?>





