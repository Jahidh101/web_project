<!DOCTYPE html>    
<html>    
<head>   
    <style type="text/css">
        .textboxColor{
            background-color: #C0C0C0;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="../style.css"> 
</head>    
<body>  

    <h2 class="h2">Edit Case</h2><br>    
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
        <input class="textBox textboxColor" type="text" name="caseNo" value="<?php echo $ACaseInfo['CaseNumber']; ?> " readonly> 
        <br><br>

        <label>Crime Category : </label>  <br>
                     <select name="crimeCategory" class="textBox">
                     <option value="" disabled selected>Select a option</option>
                     <option value="murder"
                     <?php if ($ACaseInfo['CrimeCategory'] == 'murder') {
                         echo "selected";
                     }  ?>>Murder</option>
                     <option value="assault"
                     <?php if ($ACaseInfo['CrimeCategory'] == 'assault') {
                         echo "selected";
                     }  ?>>Assault</option>
                     <option value="kidnapping"
                     <?php if ($ACaseInfo['CrimeCategory'] == 'kidnapping') {
                         echo "selected";
                     }  ?>>Kidnapping</option>
                     <option value="theft"
                     <?php if ($ACaseInfo['CrimeCategory'] == 'theft') {
                         echo "selected";
                     }  ?>>Theft</option>
                     <option value="manslaughter"
                     <?php if ($ACaseInfo['CrimeCategory'] == 'manslaughter') {
                         echo "selected";
                     }  ?>>Manslaughter</option>
                     <option value="burglary"
                     <?php if ($ACaseInfo['CrimeCategory'] == 'burglary') {
                         echo "selected";
                     }  ?>>Burglary</option>
                     </select></label><br><br>

        <label><b>Description : </b></label><br>    
        <textarea name="crimeDescription" rows="5" cols="55"><?php echo $ACaseInfo['Description']; ?> </textarea> 
        <br><br>

        <label><b>Crime Place :</b></label><br>     
        <input class="textBox" type="text" name="crimePlace" value="<?php echo $ACaseInfo['CrimePlace']; ?>" placeholder="Crime place"> 
        <br><br>

        <label>Crime Date and Time:</label> <br> 
        <input type="datetime"  class="textBox" name="crimeDateTime" value="<?php echo $ACaseInfo['TimeDate']; ?>">
        <br><br>

        <label><b>Weapon :</b></label><br>    
        <input class="textBox" type="text" name="crimeWeapon" placeholder="weapon" value="<?php echo $ACaseInfo['Weapon']; ?>"> 
        <br><br>

        <label>Case Status : </label>  <br>
                     <select name="caseStatus" class="textBox">
                     <option value="" disabled selected>Select a option</option>
                     <option value="solved"
                     <?php if ($ACaseInfo['CaseStatus'] == 'solved') {
                         echo "selected";
                     }  ?>>Solved</option>
                     <option value="open"
                     <?php if ($ACaseInfo['CaseStatus'] == 'open') {
                         echo "selected";
                     }  ?>>Open</option>
                     <option value="closed"
                     <?php if ($ACaseInfo['CaseStatus'] == 'closed') {
                         echo "selected";
                     }  ?>>Closed</option> 
                     </select></label>
                     <br><br>

        <label>Case Privacy : </label>  <br>
                     <select name="casePrivacy" class="textBox">
                     <option value="" disabled selected>Select a option</option>
                     <option value="private"
                     <?php if ($ACaseInfo['Privacy'] == 'private') {
                         echo "selected";
                     }  ?>>Private</option>
                     <option value="public"
                     <?php if ($ACaseInfo['Privacy'] == 'public') {
                         echo "selected";
                     }  ?>>Public</option>
                     </select></label>
                     <br><br><br><hr>

        <label><b>ID (Victim ) :</b></label><br>    
        <input class="textBox textboxColor" type="text" name="vId" placeholder="victim Id" value="<?php echo $ACaseInfo['Victim_ID']; ?>" readonly> 
        <br><br>

        <label><b>NID (Victim ) :</b></label><br>    
        <input class="textBox textboxColor" type="text" name="vNid" placeholder="victim Id" value="<?php echo $ACaseInfo['vNID']; ?>" readonly> 
        <br><br>

        <label><b>Name (Victim ):</b></label><br>    
        <input class="textBox" type="text" name="vName" placeholder="victim Id" value="<?php echo $AVictimInfo['Name']; ?>"> 
        <br><br>

        <label> Gender (Victim ):</label>  <br>
                     <input type="radio" name="vGender" value="male"
                     <?php if ($AVictimInfo['Gender'] == 'male') {
                         echo "checked";
                     }  ?>>
                     <label for="male">Male</label>
                     <input type="radio" name="vGender" value="female"
                     <?php if ($AVictimInfo['Gender'] == 'female') {
                         echo "checked";
                     }  ?>>
                     <label for="female">Female</label>
                     <br><br>

        <label> Date Of Birth (Victim ) : </label> <br> 
        <input type="date"  class="textBox" name="vDob" value="<?php echo $AVictimInfo['DateOfBirth']; ?>"><br>
        <br>

        <label><b>Phone no (Victim ):</b></label><br>     
        <input class="textBox" type="text" name="vPhone" placeholder="Phone no" value="<?php echo $AVictimInfo['PhoneNo']; ?>"> 
        <br><br>   

        <label><b>Address (Victim ):</b></label><br>     
        <input class="textBox" type="text" name="vAddress" placeholder="Address" value="<?php echo $AVictimInfo['Address']; ?>"> 
        <br><br>

        <label><b>Victim's Description : </b></label><br>    
        <textarea name="vDescription" rows="5" cols="55"><?php echo $ACaseInfo['vDescription']; ?></textarea> 
        <br><br><hr>

        <label><b>ID (Suspect ) :</b></label><br>    
        <input class="textBox 
        <?php
        if(!$ACaseInfo['Suspect_ID'] == null & !$ACaseInfo['Suspect_ID'] == ''){
            echo "textboxColor";
        }?>" type="text" name="sId" placeholder="victim Id" value="<?php echo $ACaseInfo['Suspect_ID'];?>" 
        <?php
        if(!$ACaseInfo['Suspect_ID'] == null & !$ACaseInfo['Suspect_ID'] == ''){
            echo "readonly";
        }?>> 
        <br><br>

        <label><b>NID (Suspect ) :</b></label><br>    
        <input class="textBox 
        <?php
        if(!$ACaseInfo['sNID'] == null & !$ACaseInfo['sNID'] == ''){
            echo "textboxColor";
        }?>" type="text" name="sNid" placeholder="victim Id" value="<?php echo $ACaseInfo['sNID'];?>" 
        <?php
        if(!$ACaseInfo['sNID'] == null & !$ACaseInfo['sNID'] == ''){
            echo "readonly";
        }?>> 
        <br><br>

        <label><b>Name (Suspect ):</b></label><br>    
        <input class="textBox" type="text" name="sName" placeholder="victim Id" value="<?php echo $ASuspectInfo['Name']; ?>"> 
        <br><br>

        <label> Gender (Suspect ):</label>  <br>
                     <input type="radio" name="sGender" value="male"
                     <?php if ($ASuspectInfo['Gender'] == 'male') {
                         echo "checked";
                     }  ?>>
                     <label for="male">Male</label>
                     <input type="radio" name="sGender" value="female"
                     <?php if ($ASuspectInfo['Gender'] == 'male') {
                         echo "checked";
                     }  ?>>
                     <label for="female">Female</label>
                     <br><br>

        <label> Date Of Birth (Suspect ) : </label> <br> 
        <input type="date"  class="textBox" name="sDob" value="<?php echo $ASuspectInfo['DateOfBirth']; ?>"><br>
        <br>

        <label><b>Phone no (Suspect ):</b></label><br>     
        <input class="textBox" type="text" name="sPhone" placeholder="Phone no" value="<?php echo $ASuspectInfo['PhoneNo']; ?>"> 
        <br><br>   

        <label><b>Address (Suspect ):</b></label><br>     
        <input class="textBox" type="text" name="sAddress" placeholder="Address" value="<?php echo $ASuspectInfo['Address']; ?>"> 
        <br><br>

        <label><b>Suspect's Description : </b></label><br>    
        <textarea name="sDescription" rows="5" cols="55"><?php echo $ACaseInfo['sDescription']; ?></textarea> 
        <br><br><hr>

        <span class="red">Fill up cinvicted criminal field only for solved case...</span><br>
        <label><b>ID (Convicted Criminal) :</b></label><br>    
        <input class="textBox 
        <?php
        if(!$ACaseInfo['Criminal_ID'] == null & !$ACaseInfo['Criminal_ID'] == ''){
            echo "textboxColor";
        }?>" type="text" name="cId" placeholder="victim Id" value="<?php echo $ACaseInfo['Criminal_ID']; ?>" 
        <?php
        if(!$ACaseInfo['Criminal_ID'] == null & !$ACaseInfo['Criminal_ID'] == ''){
            echo "readonly";
        }?>> 
        <br><br>

        <label><b>NID (Convicted Criminal ) :</b></label><br>    
        <input class="textBox 
        <?php
        if(!$ACaseInfo['cNID'] == null & !$ACaseInfo['cNID'] == ''){
            echo "textboxColor";
        }?>" type="text" name="cNid" placeholder="victim Id" value="<?php echo $ACaseInfo['cNID']; ?> "
        <?php
        if(!$ACaseInfo['cNID'] == null & !$ACaseInfo['cNID'] == ''){
            echo "readonly";
        }?>> 
        <br><br>

        <label><b>Name (Convicted Criminal ):</b></label><br>    
        <input class="textBox" type="text" name="cName" placeholder="victim Id" value="<?php echo $ACaseInfo['Name']; ?> "> 
        <br><br>

        <label> Gender (Convicted Criminal ):</label>  <br>
                     <input type="radio" name="cGender" value="male"
                     <?php if ($ACaseInfo['Gender'] == 'male') {
                         echo "checked";
                     }  ?>>
                     <label for="male">Male</label>
                     <input type="radio" name="cGender" value="female"
                     <?php if ($ACaseInfo['Gender'] == 'male') {
                         echo "checked";
                     }  ?>>
                     <label for="female">Female</label>
                     <br><br>

        <label> Date Of Birth (Convicted Criminal ) : </label> <br> 
        <input type="date"  class="textBox" name="cDob" value="<?php echo $ACaseInfo['DateOfBirth']; ?> "><br>
        <br>

        <label><b>Phone no (Convicted Criminal ):</b></label><br>     
        <input class="textBox" type="text" name="cPhone" placeholder="Phone no" value="<?php echo $ACaseInfo['PhoneNo']; ?> "> 
        <br><br>   

        <label><b>Address (Convicted Criminal ):</b></label><br>     
        <input class="textBox" type="text" name="cAddress" placeholder="Address" value="<?php echo $ACaseInfo['Address']; ?> "> 
        <br><br>

        <label><b>Convicted Criminal's Description : </b></label><br>    
        <textarea name="cDescription" rows="5" cols="55"><?php echo $ACaseInfo['cDescription']; ?></textarea> 
        <br><br><hr>

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

