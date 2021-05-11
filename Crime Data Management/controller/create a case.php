<?php  

session_start();
require_once '../model/model.php';

 $message = '';  
 $error = ''; 
 $con = ''; 
 $insert = 1;
 if(isset($_POST["submit"]))  
 {  
      
      if(empty($_POST["caseNo"]))  
      {  
           $error = "<span class='red'>Enter a caseno</span>";  
      }

      else if (getCaseNo($_POST["caseNo"]) == 1){
        $error = "<span class='red'>Case no already exists, enter another case no</span>";  
      }

      else if(empty($_POST["crimeCategory"]))  
      {  
           $error = "<span class='red'>Select a crime catagory</span>";  
      } 

      else if(empty($_POST["crimePlace"]))  
      {  
           $error = "<span class='red'>enter crime place</span>";  
      }

      else if(empty($_POST["crimeDateTime"]))  
      {  
           $error = "<span class='red'>enter crime place</span>";  
      }

      else if(empty($_POST["crimeWeapon"]))  
      {  
           $error = "<span class='red'>enter pid</span>";  
      }

      else if(empty($_POST["caseStatus"]))  
      {  
           $error = "<span class='red'>enter pid</span>";  
      }

      else if(empty($_POST["casePrivacy"]))  
      {  
           $error = "<span class='red'>enter cpcy</span>";  
      }

      else if(empty($_POST["vId"]))  
      {  
           $error = "<span class='red'>enter victim id</span>";  
      }

      else if(getVID($_POST['vId']) == 1)  
      {  
           $error = "<span class='red'> victim id already exists</span>";  
      }

      else if(empty($_POST["vNid"]))  
      {  
           $error = "<span class='red'>enter victim nid</span>";  
      } 

      else if(getSID($_POST['sId']) == 1)  
      {  
           $error = "<span class='red'> sus id already exists</span>";  
      }

      else if(getCID($_POST['cId']) == 1)  
      {  
           $error = "<span class='red'> criminal id already exists</span>";  
      }

      else  
      {  
          if ($insert == 1) {
            $data['caseNo'] = $_POST['caseNo'];
            $data['crimeCategory'] = $_POST['crimeCategory'];
            $data['crimeDescription'] = $_POST['crimeDescription'];
            $data['crimePlace'] = $_POST['crimePlace'];
            $data['crimeDateTime'] = $_POST['crimeDateTime'];
            $data['crimeWeapon'] = $_POST['crimeWeapon'];
            $data['caseStatus'] = $_POST['caseStatus'];
            $data['casePrivacy'] = $_POST['casePrivacy'];
            if (isset($_SESSION['policeID'])) {
              $data['policeID'] = $_SESSION['policeID'];
            }else if (isset($_SESSION['id'])) {
              $data['policeID'] = 'admin';
            }
            

            $data1['vId'] = $_POST['vId']; 
            $data1['nid'] = $_POST['vNid']; 
            $data1['name'] = $_POST['vName'];
            if (empty($_POST['vGender'])) {
              $data1['gender'] = '';
            }else{
              $data1['gender'] = $_POST['vGender'];
            }
            $data1['dob'] = $_POST['vDob'];
            $data1['phone'] = $_POST['vPhone']; 
            $data1['address'] = $_POST['vAddress'];
            $data1['vDescription'] = $_POST['vDescription']; 
            $data1['caseNo'] = $_POST['caseNo'];


            $data2['sId'] = $_POST['sId']; 
            $data2['nid'] = $_POST['sNid']; 
            $data2['name'] = $_POST['sName'];
            if (empty($_POST['sGender'])) {
              $data2['gender'] = '';
            }else{
              $data2['gender'] = $_POST['sGender'];
            }
            $data2['dob'] = $_POST['sDob'];
            $data2['phone'] = $_POST['sPhone']; 
            $data2['address'] = $_POST['sAddress'];
            $data2['sDescription'] = $_POST['sDescription'];
            $data2['caseNo'] = $_POST['caseNo'];


            $data3['cId'] = $_POST['cId']; 
            $data3['nid'] = $_POST['cNid']; 
            $data3['name'] = $_POST['cName'];
            if (empty($_POST['cGender'])) {
              $data3['gender'] = '-';
            }else{
              $data3['gender'] = $_POST['cGender'];
            }
            $data3['dob'] = $_POST['cDob'];
            $data3['phone'] = $_POST['cPhone']; 
            $data3['address'] = $_POST['cAddress'];
            $data3['cDescription'] = $_POST['cDescription'];
            $data3['caseNo'] = $_POST['caseNo'];

            if (insertCaseFile($data)) {
              if (getNID($_POST['vNid']) != 1){
                $con = insertPerson($data1);
              }
              $con = insertVictim($data1);
              if (getNID($_POST['sNid']) != 1 & !empty($_POST['sNid']) & !empty($_POST['sId'])){
                $con = insertPerson($data2); 
              }
              if (getNID($_POST['cNid']) != 1 & !empty($_POST['cNid']) & !empty($_POST['cId'])){
                $con = insertPerson($data3); 
              }
              if (!empty($_POST['sId']) & !empty($_POST['sNid'])) {
                $con = insertSuspect($data2);
              }
              if (!empty($_POST['cId']) & !empty($_POST['cNid'])) {
                $con = insertCriminal($data3);
              }
              $message = 'Successfully added!!';
              $insert = 0;
            }
          }
      }  
 }  

 ?>  