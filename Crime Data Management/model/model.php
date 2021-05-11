<?php 

require_once 'db_connect.php';

function adminLogin($id, $password){
	$conn = db_conn();
	$selectQuery = "SELECT COUNT(*) FROM `admin` where Admin_ID = '$id' and Password = '$password'";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetchColumn();

    return $row;
}

function policeLogin($id, $password){
    $conn = db_conn();
    $selectQuery = "SELECT COUNT(*) FROM `police` where Police_ID = '$id' and Password = '$password'";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetchColumn();

    return $row;
}

function getPID($pid){
    $conn = db_conn();
    $selectQuery = "SELECT COUNT(*) FROM `police` where Police_ID = '$pid' ";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetchColumn();

    return $row;
}

function getNID($nid){
    $conn = db_conn();
    $selectQuery = "SELECT COUNT(*) FROM `person` where NID = '$nid' ";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetchColumn();

    return $row;
}

function getVID($vid){
    $conn = db_conn();
    $selectQuery = "SELECT COUNT(*) FROM `victim` where Victim_ID = '$vid' ";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetchColumn();

    return $row;
}

function getSID($sid){
    $conn = db_conn();
    $selectQuery = "SELECT COUNT(*) FROM `suspect` where Suspect_ID = '$sid' ";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetchColumn();

    return $row;
}

function getCID($cid){
    $conn = db_conn();
    $selectQuery = "SELECT COUNT(*) FROM `convicted_criminal` where Criminal_ID = '$cid' ";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetchColumn();

    return $row;
}

function getCaseNo($caseNo){
    $conn = db_conn();
    $selectQuery = "SELECT COUNT(*) FROM `case_file` where CaseNumber = '$caseNo' ";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetchColumn();

    return $row;
}

function insertPerson($data){
    $conn = db_conn();
    $selectQuery = "INSERT into person (NID, Name, DateOfBirth, Gender, Address, PhoneNo)
VALUES (:nid, :name, :dob, :gender, :address, :phone)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':nid' => $data['nid'],
            ':name' => $data['name'],
            ':dob' => $data['dob'],
            ':gender' => $data['gender'],
            ':address' => $data['address'],
            ':phone' => $data['phone'],
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function insertCaseFile($data){
    $conn = db_conn();
    $selectQuery = "INSERT into case_file (CaseNumber, CrimeCategory, Description, CrimePlace, TimeDate, Weapon, CaseStatus, ReportingPoliceID, Privacy)
VALUES (:caseNo, :crimeCategory, :crimeDescription, :crimePlace, :crimeDateTime, :crimeWeapon, :caseStatus, :policeID, :casePrivacy)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':caseNo' => $data['caseNo'],
            ':crimeCategory' => $data['crimeCategory'],
            ':crimeDescription' => $data['crimeDescription'],
            ':crimePlace' => $data['crimePlace'],
            ':crimeDateTime' => $data['crimeDateTime'],
            ':crimeWeapon' => $data['crimeWeapon'],
            ':caseStatus' => $data['caseStatus'],
            ':policeID' => $data['policeID'],
            ':casePrivacy' => $data['casePrivacy'],
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function insertVictim($data){
    $conn = db_conn();
    $selectQuery = "INSERT into victim (Victim_ID, NID, Description, CaseNumber)
VALUES (:vId, :nid, :vDescription, :caseNo)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':vId' => $data['vId'],
            ':nid' => $data['nid'],
            ':vDescription' => $data['vDescription'],
            ':caseNo' => $data['caseNo'],
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function insertSuspect($data){
    $conn = db_conn();
    $selectQuery = "INSERT into suspect (Suspect_ID, NID, Description, CaseNumber)
VALUES (:sId, :nid, :sDescription, :caseNo)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':sId' => $data['sId'],
            ':nid' => $data['nid'],
            ':sDescription' => $data['sDescription'],
            ':caseNo' => $data['caseNo'],
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function insertCriminal($data){
    $conn = db_conn();
    $selectQuery = "INSERT into convicted_criminal (Criminal_ID, NID, Description, CaseNumber)
VALUES (:cId, :nid, :cDescription, :caseNo)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':cId' => $data['cId'],
            ':nid' => $data['nid'],
            ':cDescription' => $data['cDescription'],
            ':caseNo' => $data['caseNo'],
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function insertExternalPolice($caseNumber, $policeID){
    $conn = db_conn();
    $selectQuery = "INSERT into case_access (CaseNumber, Police_ID)
VALUES (:caseNumber, :policeID)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':caseNumber' => $caseNumber,
            ':policeID' => $policeID,
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function insertPermissionRequest($caseNumber, $policeID){
    $conn = db_conn();
    $selectQuery = "INSERT into permission_request (CaseNumber, Police_ID, Type)
VALUES (:caseNumber, :policeID, :type)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':caseNumber' => $caseNumber,
            ':policeID' => $policeID,
            ':type' => 'p',
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function getExistingExternal($caseNumber, $policeID){
    $conn = db_conn();
    $selectQuery = "SELECT COUNT(*) FROM `case_access` where CaseNumber = '$caseNumber' AND Police_ID = '$policeID'";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetchColumn();

    return $row;
}

function getExistingRequest($caseNumber, $policeID){
    $conn = db_conn();
    $selectQuery = "SELECT COUNT(*) FROM `permission_request` where CaseNumber = '$caseNumber' AND Police_ID = '$policeID'";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetchColumn();

    return $row;
}

function insertPolice($data){
    $conn = db_conn();
    $selectQuery = "INSERT into police (Police_ID, NID, Password, Rank)
VALUES (:pid, :nid, :password, :rank)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':pid' => $data['pid'],
            ':nid' => $data['nid'],
            ':password' => $data['password'],
            ':rank' => $data['rank'],
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function getAllPolice(){
    $conn = db_conn();
    $selectQuery = "SELECT Police_ID, Name, Gender, person.NID, Rank, DateOfBirth, PhoneNo, Address, Password from person, police WHERE person.NID = police.NID ";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllPendingRequest(){
    $conn = db_conn();
    $selectQuery = "SELECT * from permission_request WHERE Type = 'p'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllRequest(){
    $conn = db_conn();
    $selectQuery = "SELECT * from permission_request ";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getARequest($id){
    $conn = db_conn();
    $selectQuery = "SELECT * from permission_request WHERE ID = '$id'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    return $rows;
}

function getMyAllCase($policeID){
    $conn = db_conn();
    $selectQuery = "SELECT case_file.CaseNumber, CrimeCategory, case_file.Description, CrimePlace, TimeDate, Weapon, CaseStatus, Victim_ID, victim.NID as 'vNID', victim.Description as 'vDescription', Suspect_ID, suspect.NID as 'sNID', suspect.Description as 'sDescription', Criminal_ID, convicted_criminal.NID as 'cNID', convicted_criminal.Description as 'cDescription', Name, DateOfBirth, Gender, Address, PhoneNo FROM case_file LEFT JOIN convicted_criminal ON case_file.CaseNumber = convicted_criminal.CaseNumber LEFT JOIN suspect ON case_file.CaseNumber = suspect.CaseNumber LEFT JOIN victim ON case_file.CaseNumber = victim.CaseNumber LEFT JOIN person ON person.NID = convicted_criminal.NID WHERE ReportingPoliceID = '$policeID'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllCase_CaseNo($caseNumber){
    $conn = db_conn();
    $selectQuery = "SELECT case_file.CaseNumber, CrimeCategory, case_file.Description, CrimePlace, TimeDate, Weapon, CaseStatus, Victim_ID, victim.NID as 'vNID', victim.Description as 'vDescription', Suspect_ID, suspect.NID as 'sNID', suspect.Description as 'sDescription', Criminal_ID, convicted_criminal.NID as 'cNID', convicted_criminal.Description as 'cDescription', Name, DateOfBirth, Gender, Address, PhoneNo FROM case_file LEFT JOIN convicted_criminal ON case_file.CaseNumber = convicted_criminal.CaseNumber LEFT JOIN suspect ON case_file.CaseNumber = suspect.CaseNumber LEFT JOIN victim ON case_file.CaseNumber = victim.CaseNumber LEFT JOIN person ON person.NID = convicted_criminal.NID WHERE case_file.CaseNumber = '$caseNumber'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllCase_CriminalID($criminalID){
    $conn = db_conn();
    $selectQuery = "SELECT case_file.CaseNumber, CrimeCategory, case_file.Description, CrimePlace, TimeDate, Weapon, CaseStatus, Victim_ID, victim.NID as 'vNID', victim.Description as 'vDescription', Suspect_ID, suspect.NID as 'sNID', suspect.Description as 'sDescription', Criminal_ID, convicted_criminal.NID as 'cNID', convicted_criminal.Description as 'cDescription', Name, DateOfBirth, Gender, Address, PhoneNo FROM case_file LEFT JOIN convicted_criminal ON case_file.CaseNumber = convicted_criminal.CaseNumber LEFT JOIN suspect ON case_file.CaseNumber = suspect.CaseNumber LEFT JOIN victim ON case_file.CaseNumber = victim.CaseNumber LEFT JOIN person ON person.NID = convicted_criminal.NID WHERE Criminal_ID = '$criminalID'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllCase_VictimID($victimID){
    $conn = db_conn();
    $selectQuery = "SELECT case_file.CaseNumber, CrimeCategory, case_file.Description, CrimePlace, TimeDate, Weapon, CaseStatus, Victim_ID, victim.NID as 'vNID', victim.Description as 'vDescription', Suspect_ID, suspect.NID as 'sNID', suspect.Description as 'sDescription', Criminal_ID, convicted_criminal.NID as 'cNID', convicted_criminal.Description as 'cDescription', Name, DateOfBirth, Gender, Address, PhoneNo FROM case_file LEFT JOIN convicted_criminal ON case_file.CaseNumber = convicted_criminal.CaseNumber LEFT JOIN suspect ON case_file.CaseNumber = suspect.CaseNumber LEFT JOIN victim ON case_file.CaseNumber = victim.CaseNumber LEFT JOIN person ON person.NID = convicted_criminal.NID WHERE Victim_ID = '$victimID'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllCase_CrimeCategory($crimeCategory){
    $conn = db_conn();
    $selectQuery = "SELECT case_file.CaseNumber, CrimeCategory, case_file.Description, CrimePlace, TimeDate, Weapon, CaseStatus, Victim_ID, victim.NID as 'vNID', victim.Description as 'vDescription', Suspect_ID, suspect.NID as 'sNID', suspect.Description as 'sDescription', Criminal_ID, convicted_criminal.NID as 'cNID', convicted_criminal.Description as 'cDescription', Name, DateOfBirth, Gender, Address, PhoneNo FROM case_file LEFT JOIN convicted_criminal ON case_file.CaseNumber = convicted_criminal.CaseNumber LEFT JOIN suspect ON case_file.CaseNumber = suspect.CaseNumber LEFT JOIN victim ON case_file.CaseNumber = victim.CaseNumber LEFT JOIN person ON person.NID = convicted_criminal.NID WHERE CrimeCategory = '$crimeCategory'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllCase_CrimeDate($crimeDate){
    $conn = db_conn();
    $selectQuery = "SELECT case_file.CaseNumber, CrimeCategory, case_file.Description, CrimePlace, TimeDate, Weapon, CaseStatus, Victim_ID, victim.NID as 'vNID', victim.Description as 'vDescription', Suspect_ID, suspect.NID as 'sNID', suspect.Description as 'sDescription', Criminal_ID, convicted_criminal.NID as 'cNID', convicted_criminal.Description as 'cDescription', Name, DateOfBirth, Gender, Address, PhoneNo FROM case_file LEFT JOIN convicted_criminal ON case_file.CaseNumber = convicted_criminal.CaseNumber LEFT JOIN suspect ON case_file.CaseNumber = suspect.CaseNumber LEFT JOIN victim ON case_file.CaseNumber = victim.CaseNumber LEFT JOIN person ON person.NID = convicted_criminal.NID WHERE TimeDate LIKE '%$crimeDate%' ";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllCase_CaseStatus($caseStatus){
    $conn = db_conn();
    $selectQuery = "SELECT case_file.CaseNumber, CrimeCategory, case_file.Description, CrimePlace, TimeDate, Weapon, CaseStatus, Victim_ID, victim.NID as 'vNID', victim.Description as 'vDescription', Suspect_ID, suspect.NID as 'sNID', suspect.Description as 'sDescription', Criminal_ID, convicted_criminal.NID as 'cNID', convicted_criminal.Description as 'cDescription', Name, DateOfBirth, Gender, Address, PhoneNo FROM case_file LEFT JOIN convicted_criminal ON case_file.CaseNumber = convicted_criminal.CaseNumber LEFT JOIN suspect ON case_file.CaseNumber = suspect.CaseNumber LEFT JOIN victim ON case_file.CaseNumber = victim.CaseNumber LEFT JOIN person ON person.NID = convicted_criminal.NID WHERE CaseStatus = '$caseStatus' ";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAdminAllCase(){
    $conn = db_conn();
    $selectQuery = "SELECT case_file.CaseNumber, CrimeCategory, case_file.Description, CrimePlace, TimeDate, Weapon, CaseStatus, Victim_ID, victim.NID as 'vNID', victim.Description as 'vDescription', Suspect_ID, suspect.NID as 'sNID', suspect.Description as 'sDescription', Criminal_ID, convicted_criminal.NID as 'cNID', convicted_criminal.Description as 'cDescription', Name, DateOfBirth, Gender, Address, PhoneNo FROM case_file LEFT JOIN convicted_criminal ON case_file.CaseNumber = convicted_criminal.CaseNumber LEFT JOIN suspect ON case_file.CaseNumber = suspect.CaseNumber LEFT JOIN victim ON case_file.CaseNumber = victim.CaseNumber LEFT JOIN person ON person.NID = convicted_criminal.NID ";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getACaseInfo($caseNumber){
    $conn = db_conn();
    $selectQuery = "SELECT case_file.CaseNumber, CrimeCategory, case_file.Description, CrimePlace, TimeDate, Weapon, CaseStatus, Privacy, Victim_ID, victim.NID as 'vNID', victim.Description as 'vDescription', Suspect_ID, suspect.NID as 'sNID', suspect.Description as 'sDescription', Criminal_ID, convicted_criminal.NID as 'cNID', convicted_criminal.Description as 'cDescription', Name, DateOfBirth, Gender, Address, PhoneNo FROM case_file LEFT JOIN convicted_criminal ON case_file.CaseNumber = convicted_criminal.CaseNumber LEFT JOIN suspect ON case_file.CaseNumber = suspect.CaseNumber LEFT JOIN victim ON case_file.CaseNumber = victim.CaseNumber LEFT JOIN person ON person.NID = convicted_criminal.NID WHERE case_file.CaseNumber = '$caseNumber'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllExternalCase($policeID){
    $conn = db_conn();
    $selectQuery = "SELECT case_file.CaseNumber, CrimeCategory, case_file.Description, CrimePlace, TimeDate, Weapon, CaseStatus, Victim_ID, victim.NID as 'vNID', victim.Description as 'vDescription', Suspect_ID, suspect.NID as 'sNID', suspect.Description as 'sDescription', Criminal_ID, convicted_criminal.NID as 'cNID', convicted_criminal.Description as 'cDescription', Name, DateOfBirth, Gender, Address, PhoneNo FROM case_file LEFT JOIN convicted_criminal ON case_file.CaseNumber = convicted_criminal.CaseNumber LEFT JOIN suspect ON case_file.CaseNumber = suspect.CaseNumber LEFT JOIN victim ON case_file.CaseNumber = victim.CaseNumber LEFT JOIN person ON person.NID = convicted_criminal.NID WHERE case_file.CaseNumber in (SELECT CaseNumber FROM case_access where Police_ID = '$policeID')";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllOtherCase($policeID){
    $conn = db_conn();
    $selectQuery = "SELECT case_file.CaseNumber, CrimeCategory, case_file.Description, CrimePlace, TimeDate, Weapon, CaseStatus, Victim_ID, victim.NID as 'vNID', victim.Description as 'vDescription', Suspect_ID, suspect.NID as 'sNID', suspect.Description as 'sDescription', Criminal_ID, convicted_criminal.NID as 'cNID', convicted_criminal.Description as 'cDescription', Name, DateOfBirth, Gender, Address, PhoneNo FROM case_file LEFT JOIN convicted_criminal ON case_file.CaseNumber = convicted_criminal.CaseNumber LEFT JOIN suspect ON case_file.CaseNumber = suspect.CaseNumber LEFT JOIN victim ON case_file.CaseNumber = victim.CaseNumber LEFT JOIN person ON person.NID = convicted_criminal.NID WHERE case_file.CaseNumber not in (SELECT CaseNumber FROM case_access where Police_ID = '$policeID') and ReportingPoliceID != '$policeID' and Privacy = 'public'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllOtherCase_CaseNo($policeID, $caseNo){
    $conn = db_conn();
    $selectQuery = "SELECT case_file.CaseNumber, CrimeCategory, case_file.Description, CrimePlace, TimeDate, Weapon, CaseStatus, Victim_ID, victim.NID as 'vNID', victim.Description as 'vDescription', Suspect_ID, suspect.NID as 'sNID', suspect.Description as 'sDescription', Criminal_ID, convicted_criminal.NID as 'cNID', convicted_criminal.Description as 'cDescription', Name, DateOfBirth, Gender, Address, PhoneNo FROM case_file LEFT JOIN convicted_criminal ON case_file.CaseNumber = convicted_criminal.CaseNumber LEFT JOIN suspect ON case_file.CaseNumber = suspect.CaseNumber LEFT JOIN victim ON case_file.CaseNumber = victim.CaseNumber LEFT JOIN person ON person.NID = convicted_criminal.NID WHERE case_file.CaseNumber not in (SELECT CaseNumber FROM case_access where Police_ID = '$policeID') and ReportingPoliceID != '$policeID' and Privacy = 'public' and case_file.CaseNumber = '$caseNo'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllOtherCase_CriminalID($policeID, $criminalID){
    $conn = db_conn();
    $selectQuery = "SELECT case_file.CaseNumber, CrimeCategory, case_file.Description, CrimePlace, TimeDate, Weapon, CaseStatus, Victim_ID, victim.NID as 'vNID', victim.Description as 'vDescription', Suspect_ID, suspect.NID as 'sNID', suspect.Description as 'sDescription', Criminal_ID, convicted_criminal.NID as 'cNID', convicted_criminal.Description as 'cDescription', Name, DateOfBirth, Gender, Address, PhoneNo FROM case_file LEFT JOIN convicted_criminal ON case_file.CaseNumber = convicted_criminal.CaseNumber LEFT JOIN suspect ON case_file.CaseNumber = suspect.CaseNumber LEFT JOIN victim ON case_file.CaseNumber = victim.CaseNumber LEFT JOIN person ON person.NID = convicted_criminal.NID WHERE case_file.CaseNumber not in (SELECT CaseNumber FROM case_access where Police_ID = '$policeID') and ReportingPoliceID != '$policeID' and Privacy = 'public' and Criminal_ID = '$criminalID'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllOtherCase_VictimID($policeID, $victimID){
    $conn = db_conn();
    $selectQuery = "SELECT case_file.CaseNumber, CrimeCategory, case_file.Description, CrimePlace, TimeDate, Weapon, CaseStatus, Victim_ID, victim.NID as 'vNID', victim.Description as 'vDescription', Suspect_ID, suspect.NID as 'sNID', suspect.Description as 'sDescription', Criminal_ID, convicted_criminal.NID as 'cNID', convicted_criminal.Description as 'cDescription', Name, DateOfBirth, Gender, Address, PhoneNo FROM case_file LEFT JOIN convicted_criminal ON case_file.CaseNumber = convicted_criminal.CaseNumber LEFT JOIN suspect ON case_file.CaseNumber = suspect.CaseNumber LEFT JOIN victim ON case_file.CaseNumber = victim.CaseNumber LEFT JOIN person ON person.NID = convicted_criminal.NID WHERE case_file.CaseNumber not in (SELECT CaseNumber FROM case_access where Police_ID = '$policeID') and ReportingPoliceID != '$policeID' and Privacy = 'public' and Victim_ID = '$victimID'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllOtherCase_CrimeCategory($policeID, $crimeCategory){
    $conn = db_conn();
    $selectQuery = "SELECT case_file.CaseNumber, CrimeCategory, case_file.Description, CrimePlace, TimeDate, Weapon, CaseStatus, Victim_ID, victim.NID as 'vNID', victim.Description as 'vDescription', Suspect_ID, suspect.NID as 'sNID', suspect.Description as 'sDescription', Criminal_ID, convicted_criminal.NID as 'cNID', convicted_criminal.Description as 'cDescription', Name, DateOfBirth, Gender, Address, PhoneNo FROM case_file LEFT JOIN convicted_criminal ON case_file.CaseNumber = convicted_criminal.CaseNumber LEFT JOIN suspect ON case_file.CaseNumber = suspect.CaseNumber LEFT JOIN victim ON case_file.CaseNumber = victim.CaseNumber LEFT JOIN person ON person.NID = convicted_criminal.NID WHERE case_file.CaseNumber not in (SELECT CaseNumber FROM case_access where Police_ID = '$policeID') and ReportingPoliceID != '$policeID' and Privacy = 'public' and CrimeCategory = '$crimeCategory'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllOtherCase_CrimeDate($policeID, $crimeDate){
    $conn = db_conn();
    $selectQuery = "SELECT case_file.CaseNumber, CrimeCategory, case_file.Description, CrimePlace, TimeDate, Weapon, CaseStatus, Victim_ID, victim.NID as 'vNID', victim.Description as 'vDescription', Suspect_ID, suspect.NID as 'sNID', suspect.Description as 'sDescription', Criminal_ID, convicted_criminal.NID as 'cNID', convicted_criminal.Description as 'cDescription', Name, DateOfBirth, Gender, Address, PhoneNo FROM case_file LEFT JOIN convicted_criminal ON case_file.CaseNumber = convicted_criminal.CaseNumber LEFT JOIN suspect ON case_file.CaseNumber = suspect.CaseNumber LEFT JOIN victim ON case_file.CaseNumber = victim.CaseNumber LEFT JOIN person ON person.NID = convicted_criminal.NID WHERE case_file.CaseNumber not in (SELECT CaseNumber FROM case_access where Police_ID = '$policeID') and ReportingPoliceID != '$policeID' and Privacy = 'public' and TimeDate LIKE '%$crimeDate%'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllOtherCase_CaseStatus($policeID, $caseStatus){
    $conn = db_conn();
    $selectQuery = "SELECT case_file.CaseNumber, CrimeCategory, case_file.Description, CrimePlace, TimeDate, Weapon, CaseStatus, Victim_ID, victim.NID as 'vNID', victim.Description as 'vDescription', Suspect_ID, suspect.NID as 'sNID', suspect.Description as 'sDescription', Criminal_ID, convicted_criminal.NID as 'cNID', convicted_criminal.Description as 'cDescription', Name, DateOfBirth, Gender, Address, PhoneNo FROM case_file LEFT JOIN convicted_criminal ON case_file.CaseNumber = convicted_criminal.CaseNumber LEFT JOIN suspect ON case_file.CaseNumber = suspect.CaseNumber LEFT JOIN victim ON case_file.CaseNumber = victim.CaseNumber LEFT JOIN person ON person.NID = convicted_criminal.NID WHERE case_file.CaseNumber not in (SELECT CaseNumber FROM case_access where Police_ID = '$policeID') and ReportingPoliceID != '$policeID' and Privacy = 'public' and CaseStatus = '$caseStatus'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAPersonInfo($NID){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM person WHERE NID = '$NID'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    return $rows;
}

function getAPolice($nid){
    $conn = db_conn();
    $selectQuery = "SELECT Police_ID, Name, Gender, person.NID, Rank, DateOfBirth, PhoneNo, Address, Password from person, police WHERE person.NID = police.NID and person.NID = '$nid'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    return $rows;
}

function getPoliceInfo($pid){
    $conn = db_conn();
    $selectQuery = "SELECT Police_ID, Name, Gender, person.NID, Rank, DateOfBirth, PhoneNo, Address, Password from person, police WHERE person.NID = police.NID and Police_ID = $pid";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    return $rows;
}

function updatePerson($nid, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE person set Name = ?, DateOfBirth = ?, Gender = ?, Address = ?, PhoneNo = ? where NID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['dob'], $data['gender'], $data['address'], $data['phone'], $nid
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updateCaseFile($caseNumber, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE case_file set CrimeCategory = ?, Description = ?, CrimePlace = ?, TimeDate = ?, Weapon = ?, CaseStatus = ?, Privacy = ? where CaseNumber = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['crimeCategory'], $data['crimeDescription'], $data['crimePlace'], $data['crimeDateTime'], $data['crimeWeapon'], $data['caseStatus'], $data['casePrivacy'], $caseNumber
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updateVictim($vId, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE victim set Description = ? where Victim_ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['vDescription'], $vId
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updateSuspect($sId, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE suspect set Description = ? where Suspect_ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['sDescription'], $sId
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updateCriminal($cId, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE convicted_criminal set Description = ? where Criminal_ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['cDescription'], $cId
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updatePolice($nid, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE police set Password = ?, Rank = ? where NID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['password'], $data['rank'], $nid
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updatePolicePass($pid, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE police set Password = ? where Police_ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['password'], $pid
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updatePermissionRequest($id, $type){
    $conn = db_conn();
    $selectQuery = "UPDATE permission_request set Type = ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $type, $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteAPolice($nid){
    $conn = db_conn();
    $selectQuery = "DELETE FROM police WHERE NID = '$nid'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deletePermissionRequest($id){
    $conn = db_conn();
    $selectQuery = "DELETE FROM permission_request WHERE ID = '$id'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function deleteACase($caseNumber){
    $conn = db_conn();
    $selectQuery = "DELETE FROM case_file WHERE CaseNumber = '$caseNumber'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteACaseAccess($caseNumber){
    $conn = db_conn();
    $selectQuery = "DELETE FROM case_access WHERE CaseNumber = '$caseNumber'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteACasePolice($policeID){
    $conn = db_conn();
    $selectQuery = "DELETE FROM case_access WHERE Police_ID = '$policeID'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteAVictim($vId){
    $conn = db_conn();
    $selectQuery = "DELETE FROM victim WHERE Victim_ID = '$vId'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteASuspect($sId){
    $conn = db_conn();
    $selectQuery = "DELETE FROM suspect WHERE Suspect_ID = '$sId'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteACriminal($cId){
    $conn = db_conn();
    $selectQuery = "DELETE FROM convicted_criminal WHERE Criminal_ID = '$cId'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}





?>