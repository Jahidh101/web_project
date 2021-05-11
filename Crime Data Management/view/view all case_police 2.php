<?php  
require_once '../model/model.php';
if (isset($_SESSION['policeID'])) {
    $myCaseList = getMyAllCase($_SESSION['policeID']);
}
else if (isset($_SESSION['id'])) {
    $myCaseList = getAdminAllCase();
}
if (isset($_POST['search'])) {
    if (isset($_POST['searchBy'])) {
        if ($_POST['searchBy'] == 'CaseNumber') {
            $myCaseList = getAllCase_CaseNo($_POST['searchValue'] );
        }
        else if ($_POST['searchBy'] == 'Criminal_ID') {
            $myCaseList = getAllCase_CriminalID($_POST['searchValue'] );
        }
        else if ($_POST['searchBy'] == 'Victim_ID') {
            $myCaseList = getAllCase_VictimID($_POST['searchValue'] );
        }
        else if ($_POST['searchBy'] == 'CrimeCategory') {
            $myCaseList = getAllCase_CrimeCategory($_POST['searchValue'] );
        }
        else if ($_POST['searchBy'] == 'CrimeDate') {
            $myCaseList = getAllCase_CrimeDate($_POST['searchValue'] );
            $date = $_POST['searchValue'];
        }
        else if ($_POST['searchBy'] == 'CaseStatus') {
            $myCaseList = getAllCase_CaseStatus($_POST['searchValue'] );
            $date = $_POST['searchValue'];
        }
    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title></title>
</head>
<body>
    <form method="post">
        <span id=""><b>Search By :</b> </span>
        <select name="searchBy" class="textBox1">
            <option value="" disabled selected>Select a option</option>
            <option value="CaseNumber">Case Number</option>
            <option value="Criminal_ID">Criminal ID</option>
            <option value="Victim_ID">Victim ID</option> 
            <option value="CrimeCategory">Crime Category</option>   
            <option value="CrimeDate">Crime Date</option>
            <option value="CaseStatus">Case Status</option>     
        </select>
        <input class="textBox" type="text" name="searchValue" placeholder="Enter search value here">
        <input id="submit" type="submit" name="search" value="Search">
    </form>
    
<br><br>
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