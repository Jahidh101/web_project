<!DOCTYPE html>    
<html>    
<head>   
     <link rel="stylesheet" type="text/css" href="style.css"> 
</head>    
<body>  
<?php 
$police = getPoliceInfo($_SESSION['policeID']);

?>

    <h2 class="h2">Edit Police</h2><br>    
    <div class="login1">    
    <form method="post" action="">   
    <?php 
    if(isset($error))
    {
        echo $error;
    }
    ?>   
    <br><br>
        <label><b>Police name :</b></label><br>    
        <input class="textBox" type="text" name="name" value="<?php echo $police['Name'] ?>"> 
        <br><br>  

        <label>Gender :</label>  <br>
                     <input type="radio" name="gender" value="male" 
                     <?php if ($police['Gender'] == 'male') {
                         echo "checked";
                     }  ?>>
                     <label for="male">Male</label>
                     <input type="radio" name="gender" value="female"
                     <?php if ($police['Gender'] == 'female') {
                         echo "checked";
                     }  ?>>
                     <label for="female">Female</label><br><br>

        <label>Date Of Birth : </label> <br> 
        <input type="date"  class="textBox" name="dob" value="<?php echo $police['DateOfBirth'] ?>"><br>
        <br>

        <label><b>Phone no :</b></label><br>     
        <input class="textBox" type="text" name="phone" value="<?php echo $police['PhoneNo'] ?>"> 
        <br><br>   

        <label><b>Address :</b></label><br>     
        <input class="textBox" type="text" name="address" value="<?php echo $police['Address'] ?>"> 
        <br><br>   

        <label><b>Password :</b></label><br>     
        <input class="textBox" type="Password" name="password" value="<?php echo $police['Password'] ?>"> 
        <br>
        <br>   

        <label><b>Confirm Password :</b></label><br>     
        <input class="textBox" type="Password" name="confirmPassword" value="<?php echo $police['Password'] ?>"> 
        <br><br>   

        <input type="submit" name="submit" id="submit" value="Update"> 
        <br><br>    
        <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
        <br><br>    
    </form>     
</div> 

</body>    
</html>     

