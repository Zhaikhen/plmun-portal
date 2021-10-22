<?php  
		require "../Connection/connection.php";
?>

<?php

if(isset($_GET['edit'])){
    $id  = $_GET['edit'];
    $update = true;
    $sql = "SELECT * FROM announcement WHERE id=$id;";
    $result = mysqli_query($con , $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $course_code = $row['course_code'];
            $note = $row['note'];
            $timing_from = $row['timing_from'];
            $timing_to = $row['timing_to'];
			$day_name = $row['day'];
            $date = $row['date'];
			$room_no = $row['room_no'];
        }
    }
} 

//update data
if(isset($_POST['update'])){
    $update = true;
    echo $id = $_POST['id'];
    
    echo $course_code=$_POST["course_code"];

    echo $note=$_POST["note"];

    echo $timing_from=$_POST["timing_from"];
    
    echo $timing_to=$_POST["timing_to"];
    
    echo $day=$_POST["day"];

    echo $date=$_POST["date"];

    echo $room_no=$_POST["room_no"];

    $query1="update announcement set course_code='$course_code',note='$note',timing_from='$timing_from',timing_to='$timing_to',day='$day',date='$date',room_no='$room_no' where id='$id'";
    $run1=mysqli_query($con, $query1);
    if ($run1) {
        header("Location: announcement.php");
        echo "Your Data has been updated";
    }
    else {
        echo "Your Data has not been updated";
    }
}


?>