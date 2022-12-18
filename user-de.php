<?php
$login_needed=1;
include_once('main.php');
include_once('header.php');
$student = new ManageStudents();
$fee = new ManageFees();	



if(isset($_GET['uid']))
			{
			
			$uidgeter=$_GET['uid'];
			
		
				
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

							  <label class="col-sm-2 col-form-label">reg date: '.$ureg_date1.'</label>
							 
							</div>
							
							
							<div class="form-group row">
							  <label class="col-sm-2 col-form-label">main wallet: '.$mainwallet1.' $</label>
							
							</div>
							
							
							
							
							
				
			
			
			
			
			
			
			
			
			
			
			
			';

?>