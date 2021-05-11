<?php  

session_start();
require_once '../model/model.php';

 $message = '';  
 $error = ''; 
 $con = ''; 
 $insert = 1;
 if(isset($_POST["submit"]))  
 {  
      
      if(empty($_POST["name"]))  
      {  
           $error = "<span class='red'>Enter a name</span>";  
      }

      else if(empty($_POST["pid"]))  
      {  
           $error = "<span class='red'>enter pid</span>";  
      }

      else if (getPID($_POST["pid"]) == 1){
        $error = "<label class='text-danger'>Id already exists, select another id</label>";  
      }

      else if(empty($_POST["gender"]))  
      {  
           $error = "<span class='red'>Select a Gender</span>";  
      }  

      else if(empty($_POST["nid"]))  
      {  
           $error = "<span class='red'>Enter nid</span>";  
      }

      else if(empty($_POST["rank"]))  
      {  
           $error = "<span class='text-danger'>Enter rank</span>";  
      } 

      else if ($_POST["dob"] > date("Y-m-d")) {
          $error = "<span class='red'>Enter valid date</span>"; 
      }

      else if(empty($_POST["phone"]))  
      {  
           $error = "<span class='red'>Enter Phone no</span>";  
      } 

      else if(!preg_match("/^[0-9]*$/",$_POST["phone"]))  
      {  
           $error = "<span class='red'>Enter valid Phone no</span>";  
      } 

      else if (strlen($_POST["phone"]) < 8  || strlen($_POST["phone"]) > 11){
           $error = "<span class='red'>Phone number can not be less than eight (8) digits and more than 11 digits </span>";           
      }

      else if(empty($_POST["address"]))  
      {  
           $error = "<span class='red'>Enter a Address</span>";  
      }

      else if(empty($_POST["password"]))  
      {  
           $error = "<span class='red'>Enter Password</span>";  
      }
      else if (strlen($_POST["password"]) < 8 ){
           $error = "<span class='red'>Password must not be less than eight (8) characters</span>";           
      }
      
      else if(empty($_POST["confirmPassword"]))  
      {  
           $error = "<span class='text-danger'>Enter Confirm password</span>";  
      } 
      else if($_POST["password"] != $_POST["confirmPassword"])  
      {  
           $error = "<span class='red'>Password and confirm password didn't match</span>";  
      } 
      
      else  
      {  
          if ($insert == 1) {
            $data['name'] = $_POST['name'];
            $data['pid'] = $_POST['pid'];
            $data['gender'] = $_POST['gender'];
            $data['nid'] = $_POST['nid'];
            $data['rank'] = $_POST['rank'];
            $data['dob'] = $_POST['dob'];
            $data['phone'] = $_POST['phone'];
            $data['address'] = $_POST['address']; 
            $data['password'] = $_POST['password']; 

            if (getNID($data['nid']) != 1){
              $con = insertPerson($data);  
            }
            if (insertPolice($data)) {
              $message = 'Successfully added!!';
              $insert = 0;
            }  

          }
      }  
 }  

 ?>  