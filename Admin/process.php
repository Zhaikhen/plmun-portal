<?php  
		require "../Connection/connection.php";
?>

<?php

if(isset($_GET['edit'])){
    $id  = $_GET['edit'];
    $update = true;
    $sql = "SELECT * FROM time_table WHERE id=$id;";
    $result = mysqli_query($con , $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $course_code = $row['course_code'];
			$semester = $row['semester'];
            $timing_from = $row['timing_from'];
            $timing_to = $row['timing_to'];
			$day_name = $row['day'];
			$subject_code = $row['subject_code'];
			$room_no = $row['room_no'];
        }
    }
} 

//update data
if(isset($_POST['update'])){
    $update = true;
    echo $id = $_POST['id'];
    echo $course_code=$_POST["course_code"];

    echo $semester=$_POST["semester"];

    echo $timing_from=$_POST["timing_from"];
    
    echo $timing_to=$_POST["timing_to"];
    
    echo $day=$_POST["day"];
    
    echo $subject_code=$_POST["subject_code"];

    echo $room_no=$_POST["room_no"];

    $query1="update time_table set course_code='$course_code',semester='$semester',timing_from='$timing_from',timing_to='$timing_to',day='$day',subject_code='$subject_code',room_no='$room_no' where subject_code='$subject_code' and id='$id'";
    $run1=mysqli_query($con, $query1);
    if ($run1) {
        header("Location: time-table-edit.php");
        echo "Your Data has been updated";
    }
    else {
        echo "Your Data has not been updated";
    }
}


?>