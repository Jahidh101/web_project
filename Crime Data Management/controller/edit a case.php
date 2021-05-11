<?php  

session_start();
require_once '../model/model.php';
 $ACaseInfo = getACaseInfo($_GET['CaseNumber']);
 $AVictimInfo = getAPersonInfo($ACaseInfo['vNID']);
 $ASuspectInfo = getAPersonInfo($ACaseInfo['sNID']);
 if ($ACaseInfo['sNID'] == '' & $ACaseInfo['sNID'] == null) {
  $ASuspectInfo = getAPersonInfo('0');
  $ASuspectInfo['Name'] = null;
  $ASuspectInfo['DateOfBirth'] = null;
  $ASuspectInfo['Gender'] = null;
  $ASuspectInfo['Address'] = null;
  $ASuspectInfo['PhoneNo'] = null;
 }


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
           $error = "<span class='red'>enter cpvy</span>";  
      }

      else if(empty($_POST["vId"]))  
      {  
           $error = "<span class='red'>enter victim id</span>";  
      }

      else if(empty($_POST["vNid"]))  
      {  
           $error = "<span class='red'>enter victim nid</span>";  
      } 

      else if(getSID($_POST['sId']) == 1 & $ACaseInfo['Suspect_ID'] == null & $ACaseInfo['Suspect_ID'] == '')  
      {  
           $error = "<span class='red'> sus id already exists</span>";  
      }

      else if(getCID($_POST['cId']) == 1 & $ACaseInfo['Criminal_ID'] == null & $ACaseInfo['Criminal_ID'] == '')  
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

            if (updateCaseFile($_POST['caseNo'], $data)) {
              $con = updatePerson($_POST['vNid'], $data1);
              $con = updateVictim($_POST['vId'], $data1);
              if (getNID($_POST['sNid']) != 1 & !empty($_POST['sNid']) & !empty($_POST['sId'])){
                $con = insertPerson($data2); 
              }
              if (getNID($_POST['cNid']) != 1 & !empty($_POST['cNid']) & !empty($_POST['cId'])){
                $con = insertPerson($data3); 
              }
              if (!empty($_POST['sId']) & !empty($_POST['sNid']) & $ACaseInfo['Suspect_ID'] == null & $ACaseInfo['Suspect_ID'] == '') {
                $con = insertSuspect($data2);
              }
              if (!empty($_POST['cId']) & !empty($_POST['cNid']) & $ACaseInfo['Criminal_ID'] == null & $ACaseInfo['Criminal_ID'] == '') {
                $con = insertCriminal($data3);
              }
              if ($ACaseInfo['Suspect_ID'] != null & $ACaseInfo['Suspect_ID'] != '') {
                $con = updateSuspect($_POST['sId'], $data2);
              }
              if ($ACaseInfo['Criminal_ID'] != null & $ACaseInfo['Criminal_ID'] != '') {
                $con = updateCriminal($_POST['cId'], $data3);
              }
              $message = 'Successfully updated!!';
              $insert = 0;
            }
          }
      }  
 }  

 ?>  