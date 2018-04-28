<?php  include('server.php'); ?>
<?php
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM student WHERE id= '$id'");
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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
    <title>Edit</title>
		<div id="meny" style="display: block;">
			 <ul id="navbar">
			 <li>
					 <a href="index.php" style="display: block; font-weight: bold;"> Home</a>
			 </li>
			 <li>
					 <a href="add.php" style="display: block;"> Add Student</a>
			 </li>
			 <li>
					 <a href="list.php" style="display: block;">View All Students</a>
			 </li>

			 </ul>
	 </div>
  </head>
  <body>

    <form method="post" action="server.php" >
        <h3 class="title">Edit Student</h3>

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
	    <label> Study Program</label>
	    <!-- Study Program field -->
	    <div class="selectdiv">

	    <select name="std">

	        <?php

	      $sql= "SELECT * FROM study_program";
	        $result = $db->query($sql);


	        while($row = $result->fetch_assoc()) {
	        //$row = $result->fetch_assoc();
	        //foreach ($row as $s ) {
	          # code...

	        echo " <option value='".$row['study_program']."' selected='selected' > ".$row['study_program']."  </option>";
	        }
	        ?>


	      </select>

	    </div>
			<br>
			<br>

	  </div>

	  <br>


        <?php if ($update == true): ?>
    	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
    <?php else: ?>
    	<button class="btn" type="submit" name="save" >Save</button>
    <?php endif ?>


  	</form>
		<footer class="footer">
			Server Name: <?php 	echo $_SERVER['SERVER_NAME'] ?>
			<br>
			<br>
			Server IP: <?php echo $_SERVER['SERVER_ADDR']; ?>

		</footer>
  </body>
</html>
