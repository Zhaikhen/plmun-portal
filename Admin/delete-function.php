<?php  
session_start();
if (!$_SESSION["LoginAdmin"])
{
	header('location:../login/login.php');
}
	require_once "../connection/connection.php";
?>
	<?php 
	if (isset($_GET['roll_no'])) {
		$roll_no=$_GET['roll_no'];
		$user_id=$_GET['roll_no'];
		$query1="delete from student_info where roll_no='$roll_no'";
		$query6="delete from login where user_id='$user_id'";
		$run1=mysqli_query($con,$query1);
		$run6=mysqli_query($con,$query6);
		if ($run1&&$run6) {
			header('Location: student.php');
		}
		else{
			echo "Record not deleted. Frist of all delete record  from the child table then you can delete from here ";
			header('Refresh: 5; url=student.php');
		}
	}
	?>
<!-- --------------------------------Delete Course------------------------------------- -->
<?php 
	if (isset($_GET['course_code'])) {
		$course_code=$_GET['course_code'];
		$query2="delete from courses where course_code='$course_code'";
		$run2=mysqli_query($con,$query2);
		if ($run2) {
			header('Location: courses.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
<!-- --------------------------------Delete Subject------------------------------------- -->
<?php 
	if (isset($_GET['subject_code'])) {
		$subject_code=$_GET['subject_code'];
		$query3="delete from course_subjects where subject_code='$subject_code'";
		$run3=mysqli_query($con,$query3);
		if ($run3) {
			header('Location: subjects.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
<!-- --------------------------------Delete Teacher------------------------------------- -->
<?php 
	if (isset($_GET['email'])) {
		$teacher_id=$_GET['email'];
		$user_id=$_GET['email'];
		$query3="delete from teacher_info where email='$teacher_id'";
		$query4="delete from login where user_id='$user_id'";
		$run3=mysqli_query($con,$query3);
		$run4=mysqli_query($con,$query4);
		if ($run3&&$run4) {
			header('Location: teacher.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
