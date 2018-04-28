<?php  include('server.php'); ?>

<html>
<head>

<link rel="stylesheet" href="style.css">
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
<h3 class="title">Student Registration</h3>

<div class="input-group">
  <label>StudentNr</label>
  <input type="text" name="id" value="">
</div>

<!-- First Name field -->
		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="fname" value="">
		</div>

  <!-- Last Name field -->
  <div class="input-group">
    <label>Last Name</label>
    <input type="text" name="lname" value="">
  </div>

  <!-- Email field -->
  <div class="input-group">
    <label>Email</label>
    <input type="text" name="email" value="">
  </div>

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

  </div>



<br>
<br>



    <button class="btn" type="submit" name="save" >Save</button>
    <br>
    <br>




    <a href="index.php" class="back_link">Back to homepage</a>



	</form>





</body>

<footer class="footer">
  Server Name: <?php 	echo $_SERVER['SERVER_NAME'] ?>

  | Server IP: <?php echo $_SERVER['SERVER_ADDR']; ?>

</footer>
</html>
