<?php

require_once "../../dbconnection.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string
$applierId = $_GET['applierId'];
$requestType = $_GET['requestType'];
$EmployeeID =  $_GET['EmployeeID'];
$notificationDate = date("Y-m-d");
$birth = "BIRTH";
$death = "DEATH";
$marriage = "MARRIAGE";
$divorce = "DIVORCE";
$civilLost ="CIVIL_LOST";
$civil = "CIVIL";
$type = "";


 if (strcmp(trim($requestType),$death)==0){
    $type = "deathrequest";
 }
 elseif (strcmp(trim($requestType),$birth)==0){
    $type = "birthrequest";
}
elseif (strcmp(trim($requestType),$marriage)==0){
    $type = "marriagerequest";
}
elseif (strcmp(trim($requestType),$divorce)==0){
    $type = "divorcerequest";
}
elseif (strcmp(trim($requestType),$civil)==0){
    $type = "civilrequest";
}
elseif (strcmp(trim($requestType),$civilLost)==0){
    $sql4 = "UPDATE request SET requestType = 'CIVIL' ,readEmp =1,clerkId='$EmployeeID',stat=1,scheduled=1, readManager=1,readCash=1
    WHERE id ='$id' ";
    $stmt4 = $pdo ->prepare($sql4);
    $stmt4 ->execute();
    
}
else{
    echo" <script> alert('Unable to decline due to request type')</script>";
    header("location:request.php");
}

if($type){

$sql = "DELETE FROM  $type where id ='$id' ";
$stmt = $pdo->prepare($sql);
if ($stmt->execute()) { //deleting files from Xrequest table
    $sql3 = "DELETE FROM request where id = '$id'";
    $stmt3 = $pdo->prepare($sql3);
    $stmt3->execute(); //deleting file from request table
}
}
        $sql2 = "INSERT INTO notification(id,notificationDate,notificationContent,sender) 
                     values('$applierId','$notificationDate','Message: Your Request has been denied due to incorrect Information','$EmployeeID');";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute(); // sending notification to the user 
        echo "<script> alert('request has been succesfuly declined')</script>";
        header("location:request.php");
    


