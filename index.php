<?php  include('server.php'); ?>
<?php
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM student WHERE id=$id");
		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$fname = $n['first_name'];
			$lname = $n['last_name'];
      $email = $n['email'];
      $std = $n['study_program'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Mangement</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php if (isset($_SESSION['message'])): ?>
  	<div class="msg">
  		<?php
  			echo $_SESSION['message'];
  			unset($_SESSION['message']);
  		?>
  	</div>
  <?php endif ?>

<!-- Display table records -->
<?php $results = mysqli_query($db, "SELECT * FROM student"); ?>



<table>
	<thead>
		<tr>
			<th>StudentNr</th>
			<th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
			<th>Study Program</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>

	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['first_name']; ?></td>
			<td><?php echo $row['last_name']; ?></td>
      	<td><?php echo $row['email']; ?></td>
        	<td><?php echo $row['study_program']; ?></td>
			<td>
				<a href="edit.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>


			<a href="add.php" class="button"  >Add student</a>



</body>



</html>
