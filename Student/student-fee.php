<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		<title>PAYMENT HISTORY</title>
		<link rel="shortcut icon" href="../Images/plmun_logo.png" type="image/x-icon">
	</head>
	<body>
		<?php include('../common/student-header.php') ?>
		<?php include('../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main ">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">ALL PAYMENTS HISTORY</h4>
				</div>
				<div class="row">
					<div class="col-md-12">
					<section class="mt-3">
								<div class="btn btn-block table-three text-light d-flex">
									<span class="font-weight-bold"><i class="fa fa-credit-card-alt mr-3" aria-hidden="true"></i>PAYMENT RECORDS</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsetwo"><i class="fas fa-angle-double-down text-light" aria-hidden="true"></i></a>
									
								</div>
								<div class="collapse show mt-2" id="collapsetwo">
									<table class="w-100 table-elements table-three-tr"cellpadding="2">
										<tr class="pt-5 table-three text-white" style="height: 32px;">
											<th class="text-center">Record No.</th>
											<th class="text-center">Student No.</th>
														<th class="text-center">Fee</th>
														<th class="text-center">Amount</th>
														<th class="text-center">Transaction Date</th>
														<th class="text-center">Status</th>
													</tr>
													<?php 
														$roll_no=$_SESSION['LoginStudent'];
														$query="select * from student_fee inner join student_info on student_fee.roll_no=student_info.roll_no inner join payments on student_fee.fee_code=payments.fee_code where student_fee.roll_no='$roll_no'";
														$run=mysqli_query($con,$query);
														while ($row=mysqli_fetch_array($run)) { ?>
														<tr class="text-center">
															<td><?php echo $row['fee_voucher'] ?></td>
															<td><?php echo $row['roll_no'] ?></td>
															<td><?php echo $row['fee_name'] ?></td>
															<td><?php echo $row['amount'] ?></td>
															<td><?php echo $row['posting_date'] ?></td>
															<td><?php echo $row['status'] ?></td>
														</tr>
														<?php	
														}
													?>
												</table>
											</div>
										</section>
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>