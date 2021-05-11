<!DOCTYPE html>    
<html>    
<head>   
     <link rel="stylesheet" type="text/css" href="style.css"> 
</head>    
<body>  

    <h2 class="h2">Add Police</h2><br>    
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
        <input class="textBox" type="text" name="name"placeholder="Police name"> 
        <br><br>  

        <label><b>Police ID :</b></label><br>    
        <input class="textBox" type="text" name="pid"placeholder="Police Id"> 
        <br><br>

        <label>Gender :</label>  <br>
                     <input type="radio" name="gender" value="male">
                     <label for="male">Male</label>
                     <input type="radio" name="gender" value="female">
                     <label for="female">Female</label><br><br>

        <label><b>National ID :</b></label><br>    
        <input class="textBox" type="text" name="nid"placeholder="National Id"> 
        <br>
        <br>  

        <label>Rank : </label>  <br>
                     <select name="rank" class="textBox">
                     <option value="" disabled selected>Select a option</option>
                     <option value="Constable">Constable</option>
                     <option value="Sergent">Sergent</option>
                     <option value="Sub Inspector">Sub Inspector</option> 
                     <option value="Assistant Superintendent of Police">Assistant Superintendent of Police</option>     
                     </select></label><br><br>

        <label>Date Of Birth : </label> <br> 
        <input type="date"  class="textBox" name="dob"><br>
        <br>

        <label><b>Phone no :</b></label><br>     
        <input class="textBox" type="text" name="phone" placeholder="Phone no"> 
        <br><br>   


        <label><b>Address :</b></label><br>     
        <input class="textBox" type="text" name="address" placeholder="Address"> 
        <br><br>   

        <label><b>Password :</b></label><br>     
        <input class="textBox" type="Password" name="password" placeholder="Password"> 
        <br>
        <br>   

        <label><b>Confirm Password :</b></label><br>     
        <input class="textBox" type="Password" name="confirmPassword" placeholder="Retype Password"> 
        <br><br>   

        <input type="submit" name="submit" id="submit" value="Submit"> 
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

