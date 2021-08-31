<?php

include "../../dbconnection.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string
$phoneNumber = $_GET['phoneNumber'];
$notificationDate=date("Y-m-d");




if($phoneNumber){
    $sql="DELETE FROM birthrequest where id ='$id'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $sql2="INSERT INTO notification(ResPhone,notificationDate,notificationContent) 
    values('$phoneNumber','$notificationDate','Message from Manager : Your Request has been denied due to Fradulent aactivity');";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute();
    echo "<script> alert('request has been succesfuly declined')</script>";
    header("location:signOff.php");
    
}
   

?>
