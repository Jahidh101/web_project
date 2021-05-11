<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<div class="navbar">
  <div class="dropdown">
    <a href = "LOGGED IN DASHBOARD.php" class="dropbtn">Home</a>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Police
      <i class="arrow down"></i>
    </button>
    <div class="dropdown-content">
      <a href="ADD POLICE.php">Add Police</a>
      <a href="VIEW POLICE_admin.php">View Police</a>
      <a href="EDIT POLICE_admin.php">Edit/delete Police</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Case
      <i class="arrow down"></i>
    </button>
    <div class="dropdown-content">
      <a href="CREATE A CASE.php">Create Case</a>
      <a href="MY CASE LIST_police.php">Case list</a>
      <a href="PENDING CASE REQUESTS.php">Pending Case requests</a>
      <a href="SHOW ALL CASE REQUESTS.php">All Case requests</a>
    </div>
  </div>

  
</div>
</body>
</html>