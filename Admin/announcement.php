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
		 
		$note=$_POST["note"];

 		$course_code=$_POST["course_code"];

 		$timing_from=$_POST["timing_from"];
 		
 		$timing_to=$_POST["timing_to"];

		$date=$_POST["date"];
 		
 		$day=$_POST["day"];

 		$room_no=$_POST["room_no"];
 		
 		$query="insert into announcement(course_code,note,timing_from,timing_to,date,day,room_no)values('$course_code','$note','$timing_from','$timing_to','$date','$day','$room_no')";
 		$run=mysqli_query($con, $query);
 		if ($run) {
 			echo "SUCCESSFULLY ANNOUNCED!!";
 		}
 		else {
 			echo "ANNOUNCEMENT FAILED!!";
 		}
 	}
?>

<?php
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $sql = "DELETE FROM announcement WHERE id=$id;";
    $result = mysqli_query($con , $sql);
    if($result){
        echo "ANNOUNCEMENT HAS BEEN REMOVED";
    }
}


?>

<!doctype html>
<html lang="en">
	<head>
		<title>ANNOUNCEMENTS</title> 
		<link rel="shortcut icon" href="../Images/plmun_logo.png" type="image/x-icon">

	</head>
	<body>
		<?php include('../common/admin-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?> 
		<?php
		$sql = "SELECT * FROM announcement inner join weekdays on day_id where announcement.day = weekdays.day_id";
		$result = mysqli_query($con , $sql);
		$resultCheck = mysqli_num_rows($result);
		?> 

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">MANAGE ANNOUNCEMENTS HERE </h4>
						<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">ANNOUNCE</button>
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
														<h4 class="modal-title text-center">MAKE NEW ANNOUNCEMENT</h4>
													</div>
													<div class="modal-body">
														<form action="announcement.php" method="post">
															<div class="row mt-3">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputEmail1">ANNOUNCEMENT FOR:</label>
																		<select class="browser-default custom-select" name="course_code" required>
																			<option selected disabled hidden>--Select Course--</option>
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
																		<label for="exampleInputEmail1">WHAT TO ANNOUNCE:</label>
																		<input type="text" name="note" class="form-control" placeholder="Announce something here" required>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputEmail1">STARTING TIME: </label>
																		<input type="time" name="timing_from" class="form-control" required>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="formp">
																		<label for="exampleInputPassword1">ENDING TIME:</label>
																		<input type="time" name="timing_to" class="form-control" required>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputEmail1">SPECIFIC DAY: </label>
																		<select class="browser-default custom-select" name="day" required>
																			<option selected disabled hidden>--Select Week Day--</option>
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
																		<label for="exampleInputPassword1">SPECIFIC DATE:</label>
																		<input type="date" name="date" class="form-control" required>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="formp">
																		<label for="exampleInputPassword1">LOCATION:</label>
																		<input type="text" name="room_no" class="form-control" placeholder="Specific Location" required>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn btn-primary" name="btn_save" value="ANNOUNCE">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
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
											<td colspan="9" class="text-center text-white"><h4>CURRENT ANNOUNCEMENTS</h4></td>
</td>
										</tr>


										<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-lg">
															<div class="modal-content">
																<div class="modal-header bg-info text-white">
																	<h4 class="modal-title text-center">UPDATE ANNOUNCEMENTS</h4>
																</div>
																<div class="modal-body">
																	
																</div>
															</div>
														</div>
													</div>

										<tr class="table-tr-head">
											<th>NO.</th>
											<th>COURSE</th>
											<th>REMINDER</th>
											<th>TIME</th>
											<th>DAY</th>
											<th>DATE</th>
											<th>LOCATION</th>
											<th colspan=2>OPERATION</th>
										</tr>
										<?php  
										 if($resultCheck > 0){
											while($row = mysqli_fetch_assoc($result)){
												echo "<tr>";
												echo "<td>".$row["id"]."</td>";
												echo "<td>".$row["course_code"]."</td>";
												echo "<td>".$row["note"]."</td>";
												echo "<td>" .$row["timing_from"]."<br>".$row["timing_to"]."</td>";
												echo "<td>".$row["day_name"]."</td>";
												echo "<td>".$row["date"]."</td>";
												echo "<td>".$row["room_no"]."</td>";
												echo '<td><a href="edit-announcement.php?edit='.$row['id'].'" class="btn btn-success"><i class="fas fa-pen"><i/></a></td>';
												echo '<td><a href="announcement.php?delete='.$row['id'].'" class="btn btn-danger"><i class="fas fa-trash"><i/></a></td>';
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