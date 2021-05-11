<?php  
require_once '../model/model.php';
if (isset($_SESSION['policeID'])) {
    $myCaseList = getAllOtherCase($_SESSION['policeID']);
}

if (isset($_POST['search'])) {
    if (isset($_POST['searchBy'])) {
        if ($_POST['searchBy'] == 'CaseNumber') {
            $myCaseList = getAllOtherCase_CaseNo($_SESSION['policeID'], $_POST['searchValue'] );
        }
        if ($_POST['searchBy'] == 'Criminal_ID') {
            $myCaseList = getAllOtherCase_CriminalID($_SESSION['policeID'], $_POST['searchValue'] );
        }
        if ($_POST['searchBy'] == 'Victim_ID') {
            $myCaseList = getAllOtherCase_VictimID($_SESSION['policeID'], $_POST['searchValue'] );
        }
        if ($_POST['searchBy'] == 'CrimeCategory') {
            $myCaseList = getAllOtherCase_CrimeCategory($_SESSION['policeID'], $_POST['searchValue'] );
        }
        if ($_POST['searchBy'] == 'CrimeDate') {
            $myCaseList = getAllOtherCase_CrimeDate($_SESSION['policeID'], $_POST['searchValue'] );
        }
        if ($_POST['searchBy'] == 'CaseStatus') {
            $myCaseList = getAllOtherCase_CaseStatus($_SESSION['policeID'], $_POST['searchValue'] );
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
    <h2 class="h2">Other Case List</h2>
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
                echo '<td><a href="REQUEST PERMISSION.php?CaseNumber=' .$case["CaseNumber"]. '"><button>Request Permission</button></a></td>';

            echo '</tr>' ;
        endforeach; 
        ?>

    </tbody>
    
</table>


</body>
</html>