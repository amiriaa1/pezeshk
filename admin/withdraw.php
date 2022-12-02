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
<center><H2>withdraw manager</H2></center>
</div>
</div>
</div>
</div>

';


$student = new ManageStudents();
$fee = new ManageFees();


if(isset($_GET['cheque_passed']))
			{
			

$disid=$_GET['cheque_passed'];
$query = "WHERE upid=$disid";			
$discountList = $fee->GetPaymentListapp($query);
foreach($discountList as $discountProp)
					{
						
						
						$uidprob=$discountProp['uid'];
						$uppaymentdprob=$discountProp['uppayment'];
						$uptrack_codeprob=$discountProp['uptrack_code'];
						$admin_statusprob=$discountProp['admin_status'];
					}
if(!$admin_statusprob==1){
				
				
		
					
						$fee = new ManageFees();
						$uid=$uidprob;
							
					
									$uid=$uidprob;
						
						$fee->link->query("UPDATE `".$table_prefix."user_payments_app` SET `admin_status`=1 WHERE upid=$disid");
						$fee->AddUserPayment($uidprob,-$uppaymentdprob,0,$uptrack_codeprob,'withdraw approve by admin',20);
						Success(_PAYMENT_ADDED0_SUCCESSFULLY);
							
							
							
							
						
					


					
				
			}
			
			
			else{
				
				
				echo'ghblan taeed shode';
			}
			}
			
			
$query = "WHERE walletacc=20 ORDER BY `nim_user_payments_app`.`admin_status` ASC";			
$discountList = $fee->GetPaymentListapp($query);			
			
echo'




 <div class="box box-default">
			<div class="box-header with-border">
			  <h4 class="box-title">admin deposit</h4>
			 		
			</div>
			<!-- /.box-header -->
			<div class="box-body wizard-content">
				
						
						
						
					<div style="'.$table_width.'">
						  <table class="table table-padded recent-order-list-table table-responsive-fix-big">
							<tr class="table_header default_font">
							';
					echo '
							<td style="width:70px;" class="small">
								approve?
							</td>';
					echo '
							<td style="width:120px;" class="small">
									<b>user</b>
							</td>';
					echo '
							<td style="width:120px;" class="small">
									<b>amount </b>
							</td>';
					echo '
							<td style="width:120px;" class="small">
									<b>hash id</b>
							</td>';
					echo '
							<td style="width:120px;" class="small">
									<b>submit time</b>
							</td>';
					echo '
							<td style="width:140px;" class="small">
									<b>commnet</b>
							</td>';
					echo '
							<td style="width:120px;" class="small">
									<b>wallet?</b>
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
									';
									if(!$discountProp['admin_status']==1){
									echo'
									
									<a href="withdraw?cheque_passed='.$discountProp['upid'].'">
										<button type="submit" class="btn btn-rounded btn-info">Approve</button></a>
										
										
							
										';
									}
									else{echo'Approved befor';}
										echo'
									</div>
								</td>';
						echo '<td style="text-align:center;">
							'.$discountProp['uid'].'
							</td>';
						
						echo '<td style="text-align:center;">
							'.$discountProp['uppayment'].'
							</td>';
						
						
						echo '<td>
							<span class="label label-xl label-rounded label-warning">'.$discountProp['uptrack_code'].'</span>
							</td>';
							
							
							
								echo '<td style="text-align:'.$align1.';">
				<span>'.$discountProp['uptimestamp'].'</span>
							</td>';
							
						
							
							
						echo '<td style="text-align:left;">
							'.$discountProp['upcomment'].'
							</td>';
							
						
							if($discountProp['admin_status']==0){
							
						echo '<td style="text-align:'.$align1.';">
						<span class="label label-xl label-rounded label-danger">waiting</span>
							
							</td>';}
							else{
								
									echo '<td style="text-align:'.$align1.';">
						<span class="label label-xl label-rounded label-success">approve</span>
							
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





