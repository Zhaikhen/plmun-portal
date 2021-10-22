<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>

<?php 
 
 	if (isset($_POST['btn_save'])) {

 		$course_code=$_POST["course_code"];

 		$semester=$_POST["semester"];

 		$timing_from=$_POST["timing_from"];
 		
 		$timing_to=$_POST["timing_to"];
 		
 		$day=$_POST["day"];
 		
 		$subject_code=$_POST["subject_code"];

 		$room_no=$_POST["room_no"];
 		
 		$query="insert into time_table(course_code,semester,timing_from,timing_to,day,subject_code,room_no)values('$course_code','$semester','$timing_from','$timing_to','$day','$subject_code','$room_no')";
 		$run=mysqli_query($con, $query);
 		if ($run) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}
 	}
?>

<?php
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $sql = "DELETE FROM time_table WHERE id=$id;";
    $result = mysqli_query($con , $sql);
    if($result){
        echo "TIME TABLE SCHEDULE has been DELETED";
    }
}


?>

<!doctype html>
<html lang="en">
	<head>
		<title>FACULTY SCHEDULE</title>
		<link rel="shortcut icon" href="../Images/plmun_logo.png" type="image/x-icon">

	</head>
	<body>
		<?php include('../common/admin-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?> 
		<?php
		$sql = "SELECT * FROM time_table inner join weekdays on day_id where time_table.day = weekdays.day_id";
		$result = mysqli_query($con , $sql);
		$resultCheck = mysqli_num_rows($result);
		?> 

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">FACULTY SCHEDULE </h4>
						<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">ADD NEW SCHEDULE</button>
					</div>
				</div>

				<div class="row">
								<div class="col-md-8"></div>
								<div class="col-md-3 ml-5 ">
									<div class="col-md-12 pt-3 ml-5">
										<!-- Large modal -->
										<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header bg-info text-white">
														<h4 class="modal-title text-center">ADD NEW SCHEDULE</h4>
													</div>
													<div class="modal-body">
														<form action="time-table-edit.php" method="post">
															<div class="row mt-3">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputEmail1">Course Code: </label>
																		<select class="browser-default custom-select" name="course_code" required>
																			<option selected disabled>--Select Course--</option>
																			<?php
																			$query="select course_code from courses";
																			$run=mysqli_query($con,$query);
																			while($row=mysqli_fetch_array($run)) {
																			echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
																			}
																		?>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputEmail1">Select Semester:</label>
																		<select class="browser-default custom-select" name="semester" required>
																			<option selected disabled>--Select Semester--</option>
																			<?php
																			$teacher_id=$_SESSION['teacher_id'];
																			$query="select distinct(semester) as semester from course_subjects";
																			$run=mysqli_query($con,$query);
																			while($row=mysqli_fetch_array($run)) {
																			echo	"<option value=".$row['semester'].">".$row['semester']."</option>";
																			}
																			?>
																		</select>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputEmail1">Starting From: </label>
																		<input type="time" name="timing_from" class="form-control" required>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="formp">
																		<label for="exampleInputPassword1">End To:</label>
																		<input type="time" name="timing_to" class="form-control" required>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputEmail1">Lecture Day: </label>
																		<select class="browser-default custom-select" name="day" required>
																			<option selected disabled>--Select Week Day--</option>
																			<?php
																			$teacher_id=$_SESSION['teacher_id'];
																			$query="select * from weekdays";
																			$run=mysqli_query($con,$query);
																			while($row=mysqli_fetch_array($run)) {
																			echo	"<option value=".$row['day_id'].">".$row['day_name']."</option>";
																			}
																			?>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="formp">
																		<label for="exampleInputPassword1">Please Select Subject:*</label>
																	<select class="browser-default custom-select" name="subject_code" required>
																		<option selected disabled>--Select Subject--</option>
																		<?php
																			$query="select * from course_subjects";
																			$run=mysqli_query($con,$query);
																			while($row=mysqli_fetch_array($run)) {
																			echo	"<option value=".$row['subject_code'].">".$row['subject_name']."</option>";
																			}
																		?>
																	</select>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="formp">
																		<label for="exampleInputPassword1">Enter Room No:</label>
																		<input type="text" name="room_no" class="form-control" placeholder="Room No" required>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn btn-primary" name="btn_save" value="Save Data">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															</div> 	
														</form>
													</div>
												</div>
										</div>
										</div>
									</div>
								</div>
							</div>

<table class="w-100 table-elements table-three-tr" cellpadding="3">
										<tr class="table-tr-head table-three text-white">
											<td colspan="8" class="text-center text-white"><h4>AVAILABLE SCHEDULES</h4></td>
</td>
										</tr>


										<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-lg">
															<div class="modal-content">
																<div class="modal-header bg-info text-white">
																	<h4 class="modal-title text-center">UPDATE CURRENT SCHEDULE</h4>
																</div>
																<div class="modal-body">
																	
																</div>
															</div>
														</div>
													</div>

										<tr class="table-tr-head">
											<th>SCHED NO.</th>
											<th>CLASS NAME</th>
											<th>TIME</th>
											<th>DAY</th>
											<th>SUBJECT</th>
											<th>ROOM NO.</th>
											<th colspan=2>OPERATION</th>
										</tr>
										<?php  
										 if($resultCheck > 0){
											while($row = mysqli_fetch_assoc($result)){
												echo "<tr>";
												echo "<td>".$row["id"]."</td>";
												echo "<td>".$row["course_code"]." ".$row["semester"]."</td>";
												echo "<td>" .$row["timing_from"]."<br>".$row["timing_to"]."</td>";
												echo "<td>".$row["day_name"]."</td>";
												echo "<td>".$row["subject_code"]."</td>";
												echo "<td>".$row["room_no"]."</td>";
												echo '<td><a href="edit-time-table.php?edit='.$row['id'].'" class="btn btn-success"><i class="fas fa-pen"><i/></a></td>';
												echo '<td><a href="time-table-edit.php?delete='.$row['id'].'" class="btn btn-danger"><i class="fas fa-trash"><i/></a></td>';
												echo "</tr>";
											}
										}
										?>
									</table>

                                    </main>
	<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>