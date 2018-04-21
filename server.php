<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud');
  $db= new mysqli("localhost", 'root', '', 'student_db') or die("You are not connected");
  echo "You are connected to the database";

	// initialize variables
	$fname = "";
	$lname = "";
	$email = "";
  $std = "";
	$update = false;



	if (isset($_POST['save'])) {
		$fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
		$std = $_POST['std'];

		mysqli_query($db, "INSERT INTO student (first_name, last_name, email, study_program_id ) VALUES ('$fname', '$lname', '$email', '$std')");
		$_SESSION['message'] = "Student saved";
		header('location: index.php');
	}



  if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $std = $_POST['std'];

	mysqli_query($db, "UPDATE student SET first_name='$fname', last_name='$lname', email='$email', study_program_id='$std' WHERE id=$id");
	$_SESSION['message'] = "Student record updated!";
	header('location: index.php');
}



if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM student WHERE id=$id");
	$_SESSION['message'] = "Student record deleted!";
	header('location: index.php');
}
