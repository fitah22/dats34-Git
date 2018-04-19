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
      $std = $n['study_program_id'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
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
			<th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
			<th>Study Program ID </th>
			<th colspan="2">Action</th>
		</tr>
	</thead>

	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['first_name']; ?></td>
			<td><?php echo $row['last_name']; ?></td>
      	<td><?php echo $row['email']; ?></td>
        	<td><?php echo $row['study_program_id']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

	<form method="post" action="server.php" >

<!-- First Name field -->
<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="fname" value="<?php echo $fname; ?>">
		</div>

  <!-- Last Name field -->
  <div class="input-group">
    <label>Last Name</label>
    <input type="text" name="lname" value="<?php echo $lname; ?>">
  </div>

  <!-- Email field -->
  <div class="input-group">
    <label>Email</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
  </div>

  <!-- Study Program field -->
  <div class="input-group">
    <label>Study Program</label>
    <input type="text" name="std" value="<?php echo $std; ?>">
  </div>



      <?php if ($update == true): ?>
  	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
  <?php else: ?>
  	<button class="btn" type="submit" name="save" >Save</button>
  <?php endif ?>


	</form>


</body>



</html>
