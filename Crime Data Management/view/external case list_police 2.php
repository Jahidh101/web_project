<?php  
require_once '../model/model.php';
if (isset($_SESSION['policeID'])) {
    $myCaseList = getAllExternalCase($_SESSION['policeID']);
}



?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title></title>
</head>
<body>
    <h2 class="h2">External Case List</h2>
    
<table>
    <thead>
        <tr>
            <th>Case Number</th>
            <th>Crime Category</th>
            <th>Description</th>
            <th>Crime Place</th>
            <th>Crime Time & Date</th>
            <th>Weapon</th>
            <th>Case Status</th>
            <th>Victim ID</th>
            <th>Suspect ID</th>
            <th>Criminal ID</th>
            <th>Criminal Name</th>
            
        </tr>.
    </thead>
    <tbody>
        <?php 
        foreach ($myCaseList as $i => $case):
            echo '<tr>';
                echo '<td>' .$case["CaseNumber"]. '</td>';
                echo '<td>' .$case["CrimeCategory"]. '</td>';
                echo '<td>' .$case["Description"]. '</td>';
                echo '<td>' .$case["CrimePlace"]. '</td>';
                echo '<td>' .$case["TimeDate"]. '</td>';
                echo '<td>' .$case["Weapon"]. '</td>';
                echo '<td>' .$case["CaseStatus"]. '</td>';
                echo '<td>' .$case["Victim_ID"]. '</td>';
                echo '<td>' .$case["Suspect_ID"]. '</td>';
                echo '<td>' .$case["Criminal_ID"]. '</td>';
                echo '<td>' .$case["Name"]. '</td>';
                echo '<td><a href="EDIT A CASE.php?CaseNumber=' .$case["CaseNumber"]. '"><button>Edit case</button></a></td>';

            echo '</tr>' ;
        endforeach; 
        ?>

    </tbody>
    
</table>


</body>
</html>