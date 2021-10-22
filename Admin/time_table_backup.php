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

	

		$course_code=$_POST["course_code"];

		$semester=$_POST["semester"];

		$timing_from=$_POST["timing_from"];
		
		$timing_to=$_POST["timing_to"];
		
		$day=$_POST["day"];
		
		$subject_code=$_POST["subject_code"];

		$room_no=$_POST["room_no"];

		$query1="update time_table set course_code='$course_code',semester='$semester',timing_from='$timing_from',timing_to='$timing_to',day='$day',subject_code='$subject_code',room_no='$room_no' where id='$id'";
 		$run1=mysqli_query($con, $query1);
 		if ($run1) {
 			echo "Your Data has been updated";
 		}
 		else {
 			echo "Your Data has not been updated";
 		}


	}
?>


<!doctype html>
<html lang="en">
	<head>
		<title>Update Personal Information</title>
	</head>
	<body>
		<?php include('../common/admin-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div class="sub-main sub-main-student">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Update Your Personal Information </h4>
				</div>
				<div class="row ml-4">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<form action="student-personal-information.php" method="post">
							<?php  
								$query="select * from time_table where id='$id'";
								$run=mysqli_query($con,$query);
								while ($row=mysqli_fetch_array($run)) {?>
							<div class="row">
								<div class=" col-lg-6 col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Course:</label>
										<input type="text" class="form-control" name="course_code" value=<?php echo $row['course_code'] ?>>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Semester:*</label>
										<input type="text" class="form-control" name="semester"  value="<?php echo $row['semester'] ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Time from:*</label>
										<input type="text" class="form-control" name="timing_from" value=<?php echo $row['timing_from'] ?>>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Time to:*</label>
										<input type="text" class="form-control" name="timing_to"  value=<?php echo $row['timing_to'] ?>>
									</div>
								</div>
							</div>
							<div class="row">
							<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Day</label>
										<select class="browser-default custom-select" name="day">
															<option value="Male">Male</option>
															<option value="Female">Female</option>
														</select>									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Subject:</label>
										<input type="text" class="form-control" name="subject_code"  value=<?php echo $row['subject_code'] ?>>
									</div>
								</div>
							</div>
							<div class="row">
							<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Room No:*</label>
										<input type="text" name="room_no" class="form-control"  value=<?php echo $row['room_no'] ?>>
									</div>
								</div>
						
							<?php } ?>
							<div class="row mt-3">
								<div class="col-lg-6 col-md-6 offset-4">
									<input type="submit" name="sub" type="submit" class="btn btn-primary" value="Update Information">
								</div>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>