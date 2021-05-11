<?php  
require_once '../model/model.php';

$policeList = getAllPolice();

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title></title>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>Police ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Rank</th>
            <th>Date Of Birth</th>
            <th>Phone no</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($policeList as $i => $police):
            echo '<tr>';
                echo '<td>' .$police["Police_ID"]. '</td>';
                echo '<td>' .$police["Name"]. '</td>';
                echo '<td>' .$police["Gender"]. '</td>';
                echo '<td>' .$police["Rank"]. '</td>';
                echo '<td>' .$police["DateOfBirth"]. '</td>';
                echo '<td>' .$police["PhoneNo"]. '</td>';
                echo '<td>' .$police["Address"]. '</td>';
                echo '<td><a href="EDIT A POLICE_admin.php?NID=' .$police["NID"]. '">Edit</a> &nbsp<a href="DELETE A POLICE_admin.php?NID=' .$police["NID"]. '">Delete</a></td>';
            echo '</tr>' ;
        endforeach; 
        ?>

    </tbody>
    

</table>


</body>
</html>