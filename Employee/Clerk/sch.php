<?php
require_once "../../dbconnection.php"; 
$sch = trim($_POST['schedule']);
$id= trim($_POST['id']);
$applierId = trim($_POST['applierId']);
$requestType = trim($_POST['requestType']);
$empId =  $_SESSION["EmployeeID"];

$requestType =trim($_POST['Rtype']);
$currentDate= date("Y-m-d");

if($_POST['schedule'])
{
    $sch = trim($_POST['schedule']);
    $sql="SELECT * from sch where schDate='$sch'";
    $stmt = $pdo->prepare($sql);
    $stmt ->execute();
        if($stmt->rowCount() < 5){
           
            $sql2= "INSERT INTO sch (requestType,currentDate,schDate) VALUES ('$requestType','$currentDate','$sch');";
            $description = "For your ".$requestType." requst ,you have been Scheduleded for : ".$sch;
            $stmt2 = $pdo->prepare($sql2);
            $stmt2 ->execute();

            $sql3 = "INSERT INTO cveosmstest.notification (id,notificationDate,notificationContent,sender) VALUES ('$applierId','$currentDate','$description','Clerk');";
            $stmt3 = $pdo->prepare($sql3);
            $stmt3 ->execute();

            $sql4 ="UPDATE  request SET scheduledDate='$sch' , scheduled = 1 where id = $id";
            $stmt4 = $pdo->prepare($sql4);
            $stmt4 ->execute();
            
           
            echo <<< EOF

                            <script> alert('Scheduled Successfuly !!!'); </script>
                            
            EOF;

        }
        else{
                       echo"  <script> alert('Sorry the date you picked if Fully Booked !!!'); </script>";
                             
           
        }

}
else{
    echo <<< EOF

                            <script> alert('Not working!!!')</script>
                            not working
            EOF;
}
unset($stmt);
unset($stmt2);
unset($stmt3);
unset($stmt4);
header("location:schedule.php");


?>