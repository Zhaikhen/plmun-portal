<?php  
require "../Admin/announcement_process.php";
		require_once "../connection/connection.php";
        
	?>

<!doctype html>
<html lang="en">
	<head>
		<title>EDIT ANNOUNCEMENTS</title>
        <link rel="shortcut icon" href="../Images/plmun_logo.png" type="image/x-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php include('../common/admin-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>
        <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">

            <h4 class="mr-5">UPDATE DETAILS FOR ANNOUNCEMENT NO: [<?php echo $id; ?>]. REMINDER FOR: [<?php echo $note; ?>]</h4>
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
                                        <form action="announcement_process.php" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                                <label for="Name"><b>Course:</b></label>
                                                <input type="text" name="course_code" class="form-control"  placeholder="Select Course" value="<?php echo $course_code; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="Name"><b>Announcement:</b></label>
                                                <input type="text" name="note" class="form-control"  placeholder="Announce Something" value="<?php echo $note; ?>" required>
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
                                            <label for="exampleInputEmail1"><b>Specific Day: </b></label>
                                            <select class="browser-default custom-select" name="day" required>
                                            <option selected dsabled hidden>--Select Week Day--</option>
                                            <?php
                                            
                                            $query="select * from weekdays";
                                            $run=mysqli_query($con,$query);
                                            while($row=mysqli_fetch_array($run)) {
                                            echo	"<option value=".$row['day_id'].">".$row['day_name']."</option>";
                                            }
                                            ?>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                            <label for="exampleInputEmail1"><b>Specific Date: </b></label>
                                            <input type="date" name="date" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="Name"><b>Location:</b></label>
                                                <input type="text" name="room_no" class="form-control"  placeholder="Enter Location" value="<?php echo $room_no; ?>" required>
                                            </div>


                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <div class="form-group">
                                            <?php
                                                if($update == true)
                                                    echo '<button type="submit" class="btn btn-success" name="update"><i class="fa fa-refresh"></i> Update</button>';
                                                    
                                                else
                                                    echo '<button type="submit"class="btn btn-success" name="save"><i class="fa fa-user-plus"></i> Register User</button>';
                                                    
                                            ?>
                                            <a href="announcement.php" class="btn btn-danger"><i class="fas fa-close"></i> Cancel</a>
                  </div>                          
    
        </div>
    </form>
    </div>
    </body>
</html>