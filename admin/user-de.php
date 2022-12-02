<?php
$login_needed=1;
include_once('main.php');
include_once('header.php');
$student = new ManageStudents();
$fee = new ManageFees();	



if(isset($_GET['uid']))
			{
			
			$uidgeter=$_GET['uid'];
			
			
$query = "WHERE uid=$uidgeter  ORDER BY `nim_user_payments_app`.`admin_status` ASC";			
$discountList = $fee->GetPaymentListapp($query);			
				
			$query = "WHERE uid=$uidgeter";			
$disuserList = $student->GetStudentList($query);			
	foreach($disuserList as $disuserProp)
					{
					$uusername1=$disuserProp['uusername'];	
					$uactive1=$disuserProp['uactive'];	
					$ufaname1=$disuserProp['ufaname'];	
					$ucomment1=$disuserProp['ucomment'];	
					$ureg_date1=$disuserProp['ureg_date'];
					$mainwallet1=$disuserProp['mainwallet'];
					$referralwallet1=$disuserProp['referralwallet'];
					$incomewallet1=$disuserProp['incomewallet'];
						
					}
	
	
	
	
	
	
	
	
			}
		
	
			
			
			echo'
			<!-- Main content -->
		<section class="content">
		    <div class="row">
				<div class="col-xl-4 col-lg-5">

				  <!-- Profile Image -->
				  <div class="box bg-warning bg-deathstar-dark">
					<div class="box-body box-profile">
					  <img class="rounded img-fluid mx-auto d-block max-w-150" src="../images/avatar/7.jpg" alt="User profile picture">

					  <h2 class="profile-username text-center mb-0">'.$ufaname1.'</h2>

					  <h4 class="text-center mt-0"><i class="fa fa-envelope-o mr-10"></i>'.$uusername1.'</h4>

					 

					 
					</div>
					<!-- /.box-body -->
				  </div>
				  <!-- /.box -->
				</div>
				<!-- /.col -->
				<div class="col-xl-8 col-lg-7">
				  <div class="box box-solid box-inverse box-dark">
					<div class="box-header with-border">
					  <h3 class="box-title">Personal details</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
					  <div class="row">
						<div class="col-12">
					
					
							<div class="form-group row">

							  <label class="col-sm-2 col-form-label">username : '.$uusername1.'</label>
							 
							</div>
							
							
							<div class="form-group row">

							  <label class="col-sm-2 col-form-label">avtive: '.$uactive1.'</label>
							 
							</div>
							
							<div class="form-group row">

							  <label class="col-sm-2 col-form-label">Name: '.$ufaname1.'</label>
							 
							</div>
							
							<div class="form-group row">

							  <label class="col-sm-2 col-form-label">referral code : '.$ucomment1.'</label>
							 
							</div>
							
							<div class="form-group row">

							  <label class="col-sm-2 col-form-label">reg date: '.$ureg_date1.'</label>
							 
							</div>
							
							
							<div class="form-group row">
							  <label class="col-sm-2 col-form-label">main wallet: '.$mainwallet1.' $</label>
							
							</div>
							
							
							<div class="form-group row">
							  <label class="col-sm-2 col-form-label">referral wallet:'.$referralwallet1.' $</label>
							  
							</div>
							
							
							<div class="form-group row">
							  <label class="col-sm-2 col-form-label">income wallet: '.$incomewallet1.' $</label>
							 
							</div>
							
							
							
							<div class="form-group row">
							  <label class="col-sm-2 col-form-label"></label>
							  <div class="col-sm-10">
							
							  </div>
							</div>
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
					<!-- /.box-body -->
				  </div>
				  <!-- /.box -->
				  <div class="box box-solid box-inverse box-dark">
					<div class="box-header with-border">
					  <h3 class="box-title">user deposit & withdraw</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
					  <div class="row">
						<div class="col-12">
						
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
									<div class="btn-group">';
									if($discountProp['admin_status']==1){
										
										echo'Approve befor';
										
									}else{
										if($discountProp['walletacc']==20){
										echo'
										
										<a href="withdraw?cheque_passed='.$discountProp['upid'].'">
										<button type="submit" class="btn btn-rounded btn-info">Approve</button></a>
										';
										}
										else{
										echo'
										
										<a href="deposit?cheque_passed='.$discountProp['upid'].'">
										<button type="submit" class="btn btn-rounded btn-info">Approve</button></a>
										';
										}
									}
									
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
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
					<!-- /.box-body -->
				  </div>
				  <!-- /.box -->
				  <div class="box box-solid box-inverse box-dark">
					<div class="box-header with-border">
					  <h3 class="box-title">invest</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
					  <div class="row">
						<div class="col-12">
						<table class="table no-margin table-hover">
							  <thead>					
								<tr class="bg-dark">
								  <th class="text-warning">amount</th>
								  <th class="text-warning">finish date</th>
								  <th class="text-warning">invest pack number</th>
								  <th class="text-warning">interest rate</th>
								  <th class="text-warning">Status</th>
								</tr>
							  </thead>
							  <tbody>
						';
						$fee = new ManageFees();	

        $uusername=$uusername1;				
		$userPayments = $fee->GetUserinvestlist($uusername);
							foreach ($userPayments as $userPayment) {
								
							
								echo'
							
								<tr>
								  <td>
									<a href="/transactions-List?op='.$userPayment['upid'].'" class="text-warning hover-warning">
									'.$userPayment['amount'].'
									</a>
									
								  </td>
								  
								  ';
								$comment=$userPayment['expdate'];
								$atimestamp=$userPayment['atimestamp'];
								  $test=date("Y-m-d");
                                   $sum=date('Y-m-d', strtotime($atimestamp. ' + '.$comment.' days'));

								  
								  echo'
								  <td>'.$sum.'</td>
								  <td>
									<time class="timeago" >'.$userPayment['investpack'].'</time>
								  </td>
								  <td>'.$userPayment['intrest'].'</td>
								  
								  ';
								  if($userPayment['aactive']==1){
									echo'<td><span class="label label-success">active</span></td>';  
									  
								  }
								  
								  else{
									 echo'<td><span class="label label-warning">finish</span></td>';   
									  
								  }
								  echo'
								  
								  
								  
								</tr>
								
							
								';
								}
								echo'
							  </tbody>
							</table>
							
							
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
					<!-- /.box-body -->
				  </div>
				  <!-- /.box -->

				</div>
				<!-- /.col -->
			  </div>
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
 
			
			
			
			
			
			
			
			
			
			
			
			
			
			';

?>