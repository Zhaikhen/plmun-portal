<?php  
require "../Admin/process.php";
		require_once "../connection/connection.php";
        
	?>

<!doctype html>
<html lang="en">
	<head>
		<title>EDIT TIME TABLE</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php include('../common/admin-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>
        <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">

            <h4 class="mr-5">UPDATE DETAILS FOR SCHEDULE NO: [<?php echo $id; ?>] SUBJECT CODE: [<?php echo $subject_code; ?>]</h4>
            </div>
            </div>
            </div>
            <div class="container">
                                        </head>
                                        <style>
                                    h1 {text-align: center;}
                                    p {text-align: center;}
                                    body, html {
                                    height: 100%;
                                    margin: 0;
                                    background-color: #e8dba0;
                                    }
                                    </style>
                                        <body>
                                    
                                        <div class="row justify-content-center">
                                        <form action="process.php" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                                <label for="Name"><b>Course Code:</b></label>
                                                <input type="text" name="course_code" class="form-control"  placeholder="Select Course" value="<?php echo $course_code; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Name"><b>Semester:</b></label>
                                                <input type="text" name="semester" class="form-control"  placeholder="Semester" value="<?php echo $semester; ?>" required>
                                            </div>
                                        
                                            <div class="form-group">
                                            <label for="exampleInputEmail1"><b>Starting Time: </b></label>
                                            <input type="time" name="timing_from" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                            <label for="exampleInputEmail1"><b>Ending Time: </b></label>
                                            <input type="time" name="timing_to" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                            <label for="exampleInputEmail1"><b>Lecture Day: </b></label>
                                            <select class="browser-default custom-select" name="day" required>
                                            <option selected dsabled hidden>--Select Week Day--</option>
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
                                            <input type="hidden" name="subject_code" value="<?php echo $subject_code; ?>">
                                            <div class="form-group">
                                                <label for="Name"><b>Room No:</b></label>
                                                <input type="text" name="room_no" class="form-control"  placeholder="Room Number" value="<?php echo $room_no; ?>" required>
                                            </div>


                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <div class="form-group">
                                            <?php
                                                if($update == true)
                                                    echo '<button type="submit" class="btn btn-success" name="update"><i class="fa fa-refresh"></i> Update</button>';
                                                    
                                                else
                                                    echo '<button type="submit"class="btn btn-success" name="save"><i class="fa fa-user-plus"></i> Register User</button>';
                                                    
                                            ?>
                                            <a href="time-table-edit.php" class="btn btn-danger"><i class="fas fa-close"></i> Cancel</a>
                  </div>                          
    
        </div>
    </form>
    </div>
    </body>
</html>