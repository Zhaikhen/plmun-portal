<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<?php
if (isset($_POST['sub'])) {
 	$roll_no=$_POST['roll_no'];
	$fee_code=$_POST['fee_code'];
 	$amount=$_POST['amount'];
 	$status=$_POST['status'];
		$que="insert into student_fee(roll_no,fee_code,amount,status)values('$roll_no','$fee_code','$amount','$status')";
	$run=mysqli_query($con,$que);
	if ($run) {
			echo "PAYMENT RECORDED";
		}	
		else{
			echo "TRANSACTION FAILED";
		}
	}

?>

<!doctype html>
<html lang="en">
	<head>
		<title>PAYMENT PROCESS</title>
		<link rel="shortcut icon" href="../Images/plmun_logo.png" type="image/x-icon">

	</head>
	<body>
		<?php include('../common/admin-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>PAYMENT RECORDS MANAGEMENT SYSTEM </h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form action="student-fee.php" method="post">
							<div class="row mt-3">
								<div class="col-md-6">
									<div class="form-group">
										<label>Enter Student No:</label>
										<div class="d-flex">
											<input type="text" class="form-control" name="roll_no" placeholder="Enter Student Number">
											<input type="submit" name="submit" class="btn btn-primary px-4 ml-4" value="SEARCH">
										</div>
									</div>
								</div>
								<div class="col-md-6 align-items-baseline pt-4">
								</div>
							</div>	
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="border mt-3">
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white">
									<th>Rec No.</th>
									<th>Student No.</th>
									<th>Student Name</th>
									<th>Program</th>
									<th>Fee</th>
									<th>Amount in Peso</th>
								</tr>
								<?php  
								$i=1;
									if (isset($_POST['submit'])) {
										$roll_no=$_POST['roll_no'];


										$que="select roll_no,first_name,middle_name,last_name,course_code from student_info where roll_no='$roll_no' ";
									$run=mysqli_query($con,$que);
									while ($row=mysqli_fetch_array($run)) {
									?>
										<form action="student-fee.php" method="post">
										<tr>
											<td><?php echo $i++ ?></td>
											<td><?php echo $row['roll_no'] ?></td>
											<input type="hidden" name="roll_no" value=<?php echo $row['roll_no'] ?> >
											<td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></td>
											<td><?php echo $row['course_code'] ?></td>
											<td>
											<select class="browser-default custom-select" name="fee_code">
																						<option selected disabled hidden>Select Payment For</option>
																						<?php
																						$query="select * from payments";
																						$run=mysqli_query($con,$query);
																						while($row=mysqli_fetch_array($run)) {
																						echo	"<option value=".$row['fee_code'].">".$row['fee_name']."</option>";
																						}
																						?>
																					</select>
											</td>
											<td><input type="text" name="amount" class="form-control" placeholder="Enter Amount for fee"></td>
											<input type="hidden" name="status" value="Paid">

										</tr>
										
								<?php		
									}
									}
								?>
								<input class="btn btn-success"type="submit" name="sub" value="RECORD">

								</form>
							</table>				
						</section>
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>

