<!DOCTYPE html>    
<html>    
<head>   
     <link rel="stylesheet" type="text/css" href="style.css"> 
</head>    
<body>  
<?php 
$police = getAPolice($_GET['NID']);

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

        <label>Rank : </label>  <br>
                     <select name="rank" class="textBox">
                     <option value="" disabled selected>Select a option</option>
                     <option value="Constable" 
                     <?php if ($police['Rank'] == 'Constable') {
                         echo "selected";
                     }  ?>>Constable</option>
                     <option value="Sergent" 
                     <?php if ($police['Rank'] == 'Sergent') {
                         echo "selected";
                     }  ?>>Sergent</option>
                     <option value="Sub Inspector" 
                     <?php if ($police['Rank'] == 'Sub Inspector') {
                         echo "selected";
                     }  ?>>Sub Inspector</option> 
                     <option value="ASP" 
                     <?php if ($police['Rank'] == 'ASP') {
                         echo "selected";
                     }  ?>>ASP</option>     
                     </select></label><br><br>

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
        <input type="reset" name="reset" id="reset" value="Reset">      
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

