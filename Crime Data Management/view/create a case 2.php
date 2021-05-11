<!DOCTYPE html>    
<html>    
<head>   
     <link rel="stylesheet" type="text/css" href="../style.css"> 
</head>    
<body>  

    <h2 class="h2">Add Case</h2><br>    
    <div class="login1">    
    <form method="post" action="">   
    <?php 
    if(isset($error))
    {
        echo $error;
    }
    ?>   
    <br><br>
        <label><b>Case Number :</b></label><br>    
        <input class="textBox" type="text" name="caseNo" placeholder="Case No"> 
        <br><br>

        <label>Crime Category : </label>  <br>
                     <select name="crimeCategory" class="textBox">
                     <option value="" disabled selected>Select a option</option>
                     <option value="murder">Murder</option>
                     <option value="assault">Assault</option>
                     <option value="kidnapping">Kidnapping</option>
                     <option value="theft">Theft</option>
                     <option value="manslaughter">Manslaughter</option>
                     <option value="burglary">Burglary</option>
                     </select></label><br><br>

        <label><b>Description : </b></label><br>    
        <textarea name="crimeDescription" rows="5" cols="55"></textarea> 
        <br><br>

        <label><b>Crime Place :</b></label><br>     
        <input class="textBox" type="text" name="crimePlace" placeholder="Crime place"> 
        <br><br>

        <label>Crime Date and Time:</label> <br> 
        <input type="datetime-local"  class="textBox" name="crimeDateTime">
        <br><br>

        <label><b>Weapon :</b></label><br>    
        <input class="textBox" type="text" name="crimeWeapon" placeholder="weapon"> 
        <br><br>

        <label>Case Status : </label>  <br>
                     <select name="caseStatus" class="textBox">
                     <option value="" disabled selected>Select a option</option>
                     <option value="solved">Solved</option>
                     <option value="open">Open</option>
                     <option value="closed">Closed</option> 
                     </select></label>
                     <br><br>

        <label>Case Privacy : </label>  <br>
                     <select name="casePrivacy" class="textBox">
                     <option value="" disabled selected>Select a option</option>
                     <option value="private">Private</option>
                     <option value="public">Public</option>
                     </select></label>
                     <br><br><br><hr>

        <label><b>ID (Victim ) :</b></label><br>    
        <input class="textBox" type="text" name="vId" placeholder="victim Id"> 
        <br><br>

        <label><b>NID (Victim ) :</b></label><br>    
        <input class="textBox" type="text" name="vNid" placeholder="victim Id"> 
        <br><br>

        <label><b>Name (Victim ):</b></label><br>    
        <input class="textBox" type="text" name="vName" placeholder="victim Id"> 
        <br><br>

        <label> Gender (Victim ):</label>  <br>
                     <input type="radio" name="vGender" value="male">
                     <label for="male">Male</label>
                     <input type="radio" name="vGender" value="female">
                     <label for="female">Female</label>
                     <br><br>

        <label> Date Of Birth (Victim ) : </label> <br> 
        <input type="date"  class="textBox" name="vDob"><br>
        <br>

        <label><b>Phone no (Victim ):</b></label><br>     
        <input class="textBox" type="text" name="vPhone" placeholder="Phone no"> 
        <br><br>   

        <label><b>Address (Victim ):</b></label><br>     
        <input class="textBox" type="text" name="vAddress" placeholder="Address"> 
        <br><br>

        <label><b>Victim's Description : </b></label><br>    
        <textarea name="vDescription" rows="5" cols="55"></textarea> 
        <br><br><hr>

        <label><b>ID (Suspect ) :</b></label><br>    
        <input class="textBox" type="text" name="sId" placeholder="victim Id"> 
        <br><br>

        <label><b>NID (Suspect ) :</b></label><br>    
        <input class="textBox" type="text" name="sNid" placeholder="victim Id"> 
        <br><br>

        <label><b>Name (Suspect ):</b></label><br>    
        <input class="textBox" type="text" name="sName" placeholder="victim Id"> 
        <br><br>

        <label> Gender (Suspect ):</label>  <br>
                     <input type="radio" name="sGender" value="male">
                     <label for="male">Male</label>
                     <input type="radio" name="sGender" value="female">
                     <label for="female">Female</label>
                     <br><br>

        <label> Date Of Birth (Suspect ) : </label> <br> 
        <input type="date"  class="textBox" name="sDob"><br>
        <br>

        <label><b>Phone no (Suspect ):</b></label><br>     
        <input class="textBox" type="text" name="sPhone" placeholder="Phone no"> 
        <br><br>   

        <label><b>Address (Suspect ):</b></label><br>     
        <input class="textBox" type="text" name="sAddress" placeholder="Address"> 
        <br><br>

        <label><b>Suspect's Description : </b></label><br>    
        <textarea name="sDescription" rows="5" cols="55"></textarea> 
        <br><br><hr>

        <span class="red">Fill up cinvicted criminal field only for solved case...</span><br>
        <label><b>ID ( Convicted Criminal ) :</b></label><br>    
        <input class="textBox" type="text" name="cId" placeholder="victim Id"> 
        <br><br>

        <label><b>NID (Convicted Criminal ) :</b></label><br>    
        <input class="textBox" type="text" name="cNid" placeholder="victim Id"> 
        <br><br>

        <label><b>Name (Convicted Criminal ):</b></label><br>    
        <input class="textBox" type="text" name="cName" placeholder="victim Id"> 
        <br><br>

        <label> Gender (Convicted Criminal ):</label>  <br>
                     <input type="radio" name="cGender" value="male">
                     <label for="male">Male</label>
                     <input type="radio" name="cGender" value="female">
                     <label for="female">Female</label>
                     <br><br>

        <label> Date Of Birth (Convicted Criminal ) : </label> <br> 
        <input type="date"  class="textBox" name="cDob"><br>
        <br>

        <label><b>Phone no (Convicted Criminal ):</b></label><br>     
        <input class="textBox" type="text" name="cPhone" placeholder="Phone no"> 
        <br><br>   

        <label><b>Address (Convicted Criminal ):</b></label><br>     
        <input class="textBox" type="text" name="cAddress" placeholder="Address"> 
        <br><br>

        <label><b>Convicted Criminal's Description : </b></label><br>    
        <textarea name="cDescription" rows="5" cols="55"></textarea> 
        <br><br><hr>

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

