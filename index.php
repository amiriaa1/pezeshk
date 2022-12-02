<?php

$login_needed=1;
include_once('main.php');
include_once('header.php');
$student = new ManageStudents();
		
		
	$fee=new ManageFees();
    $userPayments = $fee->GetUserinvestlistsum($uusername);
	foreach ($userPayments as $userPayment) {
		
		$investtotal=$userPayment['sum_score'];
		
	}
	
		
echo'


		<!-- Main content -->
			<section class="content">
				<div class="row">	
					<div class="col-12">
						<div class="box">
							<div class="box-body">
								<div class="row justify-content-between">
									<div class="col-xxxl-4 col-xl-5 col-12">
										<div class="pl-md-30 pt-md-30 pr-md-80 pb-md-30 p-0">
											<h5 class="text-uppercase font-weight-700">whidrable balance</h5>
											<h1 class="font-weight-900 text-dark mt-30">$'.$studentProp['mainwallet'].'</h1>
											
											<div class="d-md-flex d-block justify-content-between align-items-center">
												<div>
													<div class="d-flex align-items-center gap-items-3">
														<div class="w-70 h-70 bg-success-light rounded20 l-h-80 text-center">
															<i class="text-success ti-arrow-down font-size-24"></i>
														</div>
														<div>
															<h3 class="my-0 text-dark font-weight-700">total-invest</h3>
															<p class="mb-0">$  '.$investtotal.'</p>
														</div>
													</div>
													
												</div>
												<div>
													<div class="d-flex align-items-center gap-items-3">
														
														<div>
														
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</div>
									
									<div class="col-xxxl-8 col-xl-7 col-12">
										<div class="row">
											<div class="col-md-3 col-12">
												<div class="box bg-warning bg-brick-dark rounded30 mb-md-30 mt-30 mb-0">
													<div class="box-body">
														<div>
															<i class="ti-wallet text-white" title="mainwallet"></i>
															<h4>main wallet</h4>
														</div>
														<div class="mt-150">
															<h3 class="font-weight-700">$'.$studentProp['mainwallet'].'</h3>
															
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-3 col-12">
												<div class="box bg-primary bg-brick-dark rounded30 mb-md-30 mt-30 mb-0">
													<div class="box-body">
														<div>
															<i class="ti-wallet text-white"" title="referralwallet"></i>
															<h4>referral wallet</h4>
														</div>
														<div class="mt-150">
															<h3 class="font-weight-700">$'.$studentProp['referralwallet'].'</h3>
															
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-3 col-12">
												<div class="box bg-info bg-brick-dark rounded30 mb-md-30 mt-30 mb-0">
													<div class="box-body">
														<div>
															<i class="ti-wallet text-white"" title="incomewallet"></i>
															<h4>income wallet</h4>
														</div>
														<div class="mt-150">
															<h3 class="font-weight-700">$'.$studentProp['incomewallet'].'</h3>
															
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-3 col-12">
												<div class="box bg-danger bg-brick-dark rounded30 mb-md-30 mt-30 mb-0">
													<div class="box-body">
														<div>
															<i class="ti-wallet text-white"" title="wallettotal"></i>
															<h4>Total</h4>
														</div>
														<div class="mt-150">
														';
														$wallettotal=$studentProp['incomewallet']+$studentProp['referralwallet']+$studentProp['mainwallet'];
														echo'
															<h3 class="font-weight-700">$'.$wallettotal.'</h3>
															
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xxxl-9 col-xl-8 col-12">
						<div class="box bg-transparent no-shadow">
							<div class="box-header">
								<h4 class="box-title">invest</h4>
							</div>
							<div class="box-body">
								
								
								
							<div class="row">		  
			  <div class="col-md-6 col-lg-4">
				<div class="box">
				  <div class="box-body bg-success">
					<div class="flexbox mb-20">
					  <h6 class="text-uppercase text-white">Today</h6>
					  <h6 class="text-white"><i class="ion-android-arrow-dropup"></i> %20</h6>
					</div>
					<div id="lineToday"></div>
				  </div>

				  <div class="box-body">
					<ul class="flexbox flex-justified align-items-center">
					  <li class="text-right">
						<div class="font-size-20 text-success">%60</div>
						<small class="text-uppercase">Direct invest</small>
					  </li>

					  <li class="text-center px-2">
						<div class="easypie" data-percent="53">
						  <span class="percent">53%</span>
						</div>

					  </li>

					  <li class="text-left">
						<div class="font-size-20 text-warning">%40</div>
						<small class="text-uppercase">Whole invest</small>
					  </li>
					</ul>
				  </div>
				</div>
			  </div>
			  
			  
			  
			  
			  
			  
			  
			  
			  </div>
								
								
								
							</div>
						</div>
					</div>
					<div class="col-xxxl-3 col-xl-4">
						<div class="box">
							<div class="box-body d-flex p-0">
								<div class="flex-grow-1 px-30 pt-30 pb-200 flex-grow-1 bg-img min-h-450" style="background-position: right bottom; background-size: 80% auto; background-image: url(images/gallery/img-cy.png)">
									<h3 class="mb-0 font-weight-700">Support</h3>
									<p class="font-size-18">
										We always be in touch!
									</p>
									<a href="http://buynex.info/contact-us" class="btn btn-success"><i class="ti-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					

					
				</div>						
			</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
       
    </div>
	  &copy; 2022 <a href="#">BuyNex</a>. All Rights Reserved.
  </footer>

 
	<!-- js -->
	<script src="js/vendors.min.js"></script>
	<script src="assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	<!-- peity -->
	<script src="assets/vendor_components/jquery.peity/jquery.peity.js"></script>
	<!-- easypiechart -->
	<script src="assets/vendor_components/easypiechart/dist/jquery.easypiechart.js"></script>
<!-- chart-widgets -->
	<script src="js/pages/chart-widgets.js"></script>
	    <!--Vendor -->
	<script src="assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
	<script src="assets/vendor_components/www.amcharts.com/lib/4/core.js"></script>
	<script src="assets/vendor_components/www.amcharts.com/lib/4/charts.js"></script>
	<script src="assets/vendor_components/www.amcharts.com/lib/4/themes/animated.js"></script>
	<script src="assets/vendor_components/Web-Ticker-master/jquery.webticker.min.js"></script>	
	
	
	<!-- Crypto Admin App -->

	<script src="js/demo.js"></script>
	
  	
	 
	

	
</body>
</html>

';



?>