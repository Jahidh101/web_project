<!DOCTYPE html>    
<html>    
<head>   
     <link rel="stylesheet" type="text/css" href="style.css"> 
</head>    
<body>  
<?php 
$police = getPoliceInfo($_SESSION['policeID']);

?>

<h2 class="h2">View Profile</h2><br>  
<div style="width: 60%; ">
    <table>
        <tr>
            <td width="30%">Police ID :</td>
            <td><?php echo $police['Police_ID'];?></td>
        </tr>
        <tr>
            <td>Name : </td>
            <td><?php echo $police['Name'];?></td>
        </tr>
        <tr>
            <td>Gender : </td>
            <td><?php echo $police['Gender'];?></td>
        </tr>
        <tr>
            <td>NID : </td>
            <td><?php echo $police['NID'];?></td>
        </tr>
        <tr>
            <td>Rank : </td>
            <td><?php echo $police['Rank'];?></td>
        </tr>
        <tr>
            <td>Date Of Birth : </td>
            <td><?php echo $police['DateOfBirth'];?></td>
        </tr>
        <tr>
            <td>Phone no : </td>
            <td><?php echo $police['PhoneNo'];?></td>
        </tr>
        <tr>
            <td>Address : </td>
            <td><?php echo $police['Address'];?></td>
        </tr>
    </table>  
</div>

    

</body>    
</html>     

