<?php
	session_start();

$db= new mysqli("localhost", 'root', '', 'studentinfo') or die("You are not connected");


//we cannot use double quote after echo , it must be single quote.

  //echo "You are connected to the database";
	// initialize variables
	$fname = "";
	$lname = "";
	$email = "";
  $std = "";
	$id = "";
	$update = false;

	//save method
	if (isset($_POST['save'])) {
		$id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
		$std = $_POST['std'];
		mysqli_query($db, "INSERT INTO student (id, first_name, last_name, email, study_program) VALUES ('$id','$fname', '$lname', '$email', '$std')");
		$_SESSION['message'] = "Student saved";
		header('location: index.php');
	}

	//update method
  if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $std = $_POST['std'];
	mysqli_query($db, "UPDATE student SET first_name='$fname', last_name='$lname', email='$email', study_program='$std' WHERE id='$id'");
	$_SESSION['message'] = "Student record updated!";
	header('location: index.php');
}

//delete method
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM student WHERE id='$id'");
	$_SESSION['message'] = "Student record deleted!";
	header('location: index.php');
}

//select progrms
