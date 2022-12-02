<?php

$login_needed=1;
include_once('main.php');
include_once('header.php');
$student = new ManageStudents();
$fee = new ManageFees();	
echo'


<div class="col-12">
<div class="box box-inverse bg-dark bg-hexagons-white">
<div class="box-body">
<div class="row">						
<center><H2>user list</H2></center>
</div>
</div>
</div>
</div>

';


$student = new ManageStudents();
$fee = new ManageFees();



			
			
$query = "";			
$discountList = $student->GetStudentList($query);			
			
echo'




 <div class="box box-default">
			<div class="box-header with-border">
			  <h4 class="box-title">admin user list</h4>
			 		
			</div>
			<!-- /.box-header -->
			<div class="box-body wizard-content">
				
						
						
						
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
									<b>username</b>
							</td>';
					echo '
							<td style="width:120px;" class="small">
									<b>name</b>
							</td>';
					echo '
							<td style="width:120px;" class="small">
									<b>referral cod user use</b>
							</td>';
							echo '
							<td style="width:120px;" class="small">
									<b>user own referral</b>
							</td>';
					echo '
							<td style="width:120px;" class="small">
									<b>register date</b>
							</td>';
							
							echo '
							<td style="width:120px;" class="small">
									<b>mainwallet</b>
							</td>';
							
							echo '
							<td style="width:120px;" class="small">
									<b>referralwallet</b>
							</td>';
							
							echo '
							<td style="width:120px;" class="small">
									<b>incomewallet</b>
							</td>';
							
							
					
					echo '
							<td style="width:120px;" class="small">
									<b>active?</b>
							</td>';
					
						
					echo '</tr>';
					///--Table Header
					$i=0;
					foreach($discountList as $discountProp)
					{
						if($i%2==0)
							$bgClass = "tr_hover_class";
						else
							$bgClass = "";
						echo '<tr style="height:30px; border-bottom:silver;" class="table_rows default_font '.$bgClass.'">';
						echo '<td style="text-align:left;">
									<!-- Split button -->
									<div class="btn-group">
										<a href="user-de?uid='.$discountProp['uid'].'">
										<button type="submit" class="btn btn-rounded btn-info">show user</button></a>
										
										
							
										
									</div>
								</td>';
						echo '<td style="text-align:center;">
							'.$discountProp['uusername'].'
							</td>';
						
						echo '<td style="text-align:center;">
							'.$discountProp['ufaname'].'
							</td>';
						
						
						echo '<td>
							<span class="label label-xl label-rounded label-warning">'.$discountProp['ucomment'].'</span>
							</td>';
							echo '<td>
							<span class="label label-xl label-rounded label-warning">'.$discountProp['umobile'].'</span>
							</td>';
							
							
								echo '<td style="text-align:'.$align1.';">
				<span>'.$discountProp['ureg_date'].'</span>
							</td>';
							
						
							
							
						echo '<td style="text-align:left;">
							'.$discountProp['mainwallet'].'
							</td>';
							
							
						echo '<td style="text-align:left;">
							'.$discountProp['referralwallet'].'
							</td>';
								
						echo '<td style="text-align:left;">
							'.$discountProp['incomewallet'].'
							</td>';
								
					
							
							
							if($discountProp['uactive']==0){
							
						echo '<td style="text-align:'.$align1.';">
						<span class="label label-xl label-rounded label-danger">not active</span>
							
							</td>';}
							else{
								
									echo '<td style="text-align:'.$align1.';">
						<span class="label label-xl label-rounded label-success">active</span>
							
							</td>';
								
							}
						
						echo '</tr>';	
						$i++;				
					}
					echo '</table>
						
						
						
						
						
						
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





