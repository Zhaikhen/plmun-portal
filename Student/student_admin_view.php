<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/login.php');
	}
	if($_SESSION['LoginAdmin']){
		$_SESSION['LoginStudent'];
	}
		require_once "../connection/connection.php";
		
	?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		<title>STUDENT INFORMATION</title>
		<link rel="shortcut icon" href="../Images/plmun_logo.png" type="image/x-icon">

	</head>
	<body>
		<?php include('../common/admin-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Student: <?php $roll_no=$_SESSION['LoginStudent'];
					$query="select * from student_info where roll_no='$roll_no'";
					$run=mysqli_query($con,$query);
					while ($row=mysqli_fetch_array($run)) {
						echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
					}
					?>'s Information </h4> </h4>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div>
							<section class="mt-3">
								<div class="btn btn-block table-two text-light d-flex">
									<span class="font-weight-bold"><i class="fa fa-file-text-o mr-3" aria-hidden="true"></i>SUBJECTS CREDITED</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapseOne"><i class="fas fa-angle-double-down text-light" aria-hidden="true"></i></a>
									
								</div>
								<div class="collapse show mt-2" id="collapseOne">
									<table class="w-100 table-elements table-two-tr"cellpadding="2">
										<tr class="pt-5 table-two text-white" style="height: 32px;">
											<th>Subject Code</th>
											<th>Subject Name</th>
											<th>Semester</th>
											<th>Credit Hours</th>
										</tr>
										<?php $roll_no=$_SESSION['LoginStudent'];
											$query="select * from course_subjects inner join student_courses on course_subjects.subject_code=student_courses.subject_code where student_courses.roll_no='$roll_no'";
											$run=mysqli_query($con,$query);
											while ($row=mysqli_fetch_array($run)) { ?>								
										<tr>
											<td><?php echo $row['subject_code'] ?></td>
											<td><?php echo $row['subject_name'] ?></td>
											<td><?php echo $row['semester'] ?></td>
											<td><?php echo $row['credit_hours'] ?></td>
										</tr>
										<?php }  ?>
									</table>
								</div>
							</section>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 col-md-6 col-sm-12">
						<div>
							<section class="mt-3">
								<div class="btn btn-block table-four text-light d-flex">
									<span class="font-weight-bold"><i class="fa fa-warning mr-3" aria-hidden="true"></i>VIOLATION RECORDS</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsefive"><i class="fas fa-angle-double-down text-light" aria-hidden="true"></i></a>
									
								</div>
								<div class="collapse show mt-2" id="collapsefive">
									<table class="w-100 table-elements table-four-tr"cellpadding="2">
										<tr class="pt-5 table-four text-white" style="height: 32px;">
											<th>Student No.</th>
											<th>Violation</th>
											<th>Date</th>
											<th>Status</th>
										</tr>
										<?php 
											$roll_no=$_SESSION['LoginStudent'];
											$query="select * from student_violation inner join student_info on student_violation.roll_no=student_info.roll_no where student_violation.roll_no='$roll_no'";
											$run=mysqli_query($con,$query);
											while ($row=mysqli_fetch_array($run)) { ?>
											<tr class="text-center">
												<td><?php echo $row['roll_no'] ?></td>
												<td><?php echo $row['violation'] ?></td>
												<td><?php echo $row['date'] ?></td>
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
			
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>