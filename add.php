<?php  include('server.php'); ?>

<html>
<head>

<link rel="stylesheet" href="style.css">
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

  <!-- Study Program field -->
<div class="select" style="width:200px;">
  <select  name="std">
    <select class="select" name="">
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

</select>
<br>
</div>


    <button class="btn" type="submit" name="save" >Save</button>
    <br>
    <br>




    <a href="index.php" class="back_link">Back to homepage</a>



	</form>






</body>
</html>
