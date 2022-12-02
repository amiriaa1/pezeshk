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
<center><H2>wallet ttp manager</H2></center>
</div>
</div>
</div>
</div>

';


$student = new ManageStudents();
$fee = new ManageFees();



if(isset($_POST['acomment']))
			{
				
				if($_POST['wallet_type']=='TRC20'){$wallet_type=1;}
					if($_POST['wallet_type']=='ERC20'){$wallet_type=2;}
					
						if($_POST['wallet_type']=='Bep20'){$wallet_type=3;}
				
				
		$wallet=$_POST['wallet'];
		
		$acomment=$_POST['acomment'];
				
		$discountLsssist = $fee->Addwallettypepps($wallet,$wallet_type,$acomment);	
			if($discountLsssist==1){
				
				echo"Done";
				
			}	
			}
			
			
		

$query = "ORDER BY `aactive` ASC";			
$discountList = $fee->GetwalletListttp($query);

	
echo'


	<!-- Step 1 -->
					<h6>wallet ttp Information</h6>
					<section>
						<div class="row">
							<div class="col-md-6">
							<form   action=""	method="post">
								<div class="form-group">
									<label for="1hashid">wallet ID</label>
									<input type="text" class="form-control" name="wallet" id="wallet">
									</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<label for="1amount">comment</label>
								<div class="input-group">
	<input type="text" name="acomment" id="acomment" class="form-control" onkeyup="" required data-validation-required-message="This field is required"></div>

							</div>
						</div>
						
					
							<div class="col-md-6">
								<div class="form-group">
								
									<div class="controls">
										<label>wallet type</label>
						<select name="wallet_type" id="wallet_type"  class="form-control select2 w-p100">
						  <option name="1" id="1" value"1" selected="selected">TRC20</option>
						   <option name="2" id="2" value"2" selected="selected">ERC20</option>
						    <option name="3" id="3" value"3"selected="selected">Bep20</option>
						</select>
										
										<div class="text-xs-right">
										
										<br>
							<button type="submit" class="btn btn-rounded btn-info" onclick="showStudentProp()">Submit</button>
						</div>	
							</form>
						</div>
									
							</div>
						</div>
						
						</div>
						</div>
						</div>
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
								wallet
							</td>';
					
					echo '
							<td style="width:120px;" class="small">
									<b>type </b>
							</td>';
					echo '
							<td style="width:120px;" class="small">
									<b>comment</b>
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
								'.$discountProp['wallet'].'
									</div>
								</td>';
						echo '<td style="text-align:center;">
							
							
							';
							if($discountProp['wallet_type']==1){echo'TRC20';}
							if($discountProp['wallet_type']==2){echo'Bep20';}
							if($discountProp['wallet_type']==3){echo'ERC20';}
							echo'
							
							
							
							</td>';
						
						echo '<td style="text-align:center;">
							'.$discountProp['acomment'].'
							</td>';
						
						
					
							
							
							
							
							
						
							if($discountProp['aactive']==0){
							
						echo '<td style="text-align:'.$align1.';">
						<span class="label label-xl label-rounded label-danger">disable</span>
							
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





