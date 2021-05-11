<!DOCTYPE html>    
<html>    
<head>   
    <link rel="stylesheet" type="text/css" href="../style.css"> 
</head>    
<body>  
<?php 
require_once ("../controller/login.php");
include 'header.php';
?>
    <h2 class="h2">Login Page</h2><br>    
    <div class="login1">    
    <form method="post" action="">   
    <span>
    <?php if(isset($msg))
    {
        echo $msg;
    }
    ?>   
    </span>
    <br><br>
    <label> User type :</label>
    <select name="userType" >
        <option class="select1" value="" disabled selected hidden>Select a user type</option>
        <option value="admin">ADMIN</option>
        <option value="police">POLICE</option>  
    </select>
    <br><br><br>
        <label><b>ID :
        </b> <br>   
        </label>    
        <input class="textBox" type="text" name="id" >
        <br>  
        <br>    
        <label><b>Password :  
        </b>  <br>  
        </label>    
        <input class="textBox" type="password" name="password" > 
        <br>   
        <br><br>    
        <input type="submit" name="login" id="log" value="Log In">       
        <br><br>    
        
        <br><br>    
    </form>     
</div> 
<?php include 'footer.php';?>

</body>    
</html>     