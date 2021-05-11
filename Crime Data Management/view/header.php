
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<div class="row">
  <div class="column" >
    <h2>Criminal Database</h2>
  </div>
  <div class="column alignRight" >
    <?php

    if (isset($_SESSION['id'])) {
      echo " Logged in as Admin ( ID : ";
      echo '';
      echo $_SESSION["id"];
      echo ' )&nbsp<br><br>';
      echo "<a href='logout.php'>Logout</a>";

    }
    else if (isset($_SESSION['policeID'])) {
      echo " Logged in as Police ( ID : ";
      echo '';
      echo $_SESSION["policeID"];
      echo ' )&nbsp<br><br>';
      echo "<a href='logout.php'>Logout</a>";

    }
    else{
      echo '<a href="PUBLIC HOME.php">Home . | .</a>
      <a href="LOGIN.php">Login . | .</a>';   
      }
    ?>
  </div>
  
</div>
<div class="menu">
  <?php
  if (isset($_SESSION['id'])) {
     include 'menu bar.php';
   }
   else if (isset($_SESSION['policeID'])) {
     include 'menu bar_police.php';
   }  
  ?>
</div>

</body>
</html>
