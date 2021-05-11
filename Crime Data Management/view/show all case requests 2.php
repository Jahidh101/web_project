<?php  
require_once '../model/model.php';

$requestList = getAllRequest();

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title></title>
</head>
<body>
    <h2 class="h2">Pending request</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Case Number</th>
            <th>Police ID</th>
            <th>Request Status</th>
            
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($requestList as $i => $request):
            echo '<tr>';
                echo '<td>' .$request["ID"]. '</td>';
                echo '<td>' .$request["CaseNumber"]. '</td>';
                echo '<td>' .$request["Police_ID"]. '</td>';
                if ($request["Type"] == 'a') {
                    $reqType = 'Accepted';
                }
                else if ($request["Type"] == 'r') {
                    $reqType = 'Rejected';
                }
                else if ($request["Type"] == 'p') {
                    $reqType = 'Pending';
                }
                echo '<td>' .$reqType. '</td>';
                
                echo '<td width = 20%;><a href="../controller/confirm pending requests.php?Action=3&ID=' .$request["ID"]. '"><button>Delete</button></a></td>';
            echo '</tr>' ;
        endforeach; 
        ?>

    </tbody>
    

</table>


</body>
</html>