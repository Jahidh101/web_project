<?php  
require_once '../model/model.php';

$requestList = getAllPendingRequest();

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
            
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($requestList as $i => $request):
            echo '<tr>';
                echo '<td>' .$request["ID"]. '</td>';
                echo '<td>' .$request["CaseNumber"]. '</td>';
                echo '<td>' .$request["Police_ID"]. '</td>';
                
                echo '<td width = 20%;><a href="../controller/confirm pending requests.php?Action=1&ID=' .$request["ID"]. '"><button>Accept</button></a> &nbsp<a href="../controller/confirm pending requests.php?Action=2&ID=' .$request["ID"]. '"><button>Reject</button></a></td>';
            echo '</tr>' ;
        endforeach; 
        ?>

    </tbody>
    

</table>


</body>
</html>