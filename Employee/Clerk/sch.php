<?php
include "../../dbconnection.php"; 
$sch = $_POST['schedule'];
$id= $_POST['id'];
$phone = $_POST['phone'];
$requestType =$_POST['Rtype'];
$currentDate= date("Y-m-d");

if($_POST['schedule'])
{
    $sch = $_POST['schedule'];
    $sql="SELECT * from sch where schDate=$sch";
    $stmt = $pdo->prepare($sql);
    $stmt ->execute();
        if($stmt->rowCount() <= 5){
           
            $sql2= "INSERT INTO sch (requestType,currentDate,schDate) VALUES ('$requestType','$currentDate','$sch');";
            $descriiption = "You have been Scheduleded for : ".$sch;
            $stmt2 = $pdo->prepare($sql2);
            $stmt2 ->execute();

            $sql3 = "INSERT INTO cveosmstest.notification (ResPhone,notificationDate,notificationContent) VALUES ('$phone','$currentDate','$descriiption');";
            $stmt3 = $pdo->prepare($sql3);
            $stmt3 ->execute();

            $sql4 ="UPDATE  birthrequest SET schDate='$sch' , scheduled = 1 where id = $id";
            $stmt4 = $pdo->prepare($sql4);
            $stmt4 ->execute();
            
           
            echo <<< EOF

                            <script> alert('Scheduled Successfuly !!!') </script>
                            works
            EOF;

        }
        else{
            echo <<< EOF

                            <script> alert('Sorry the date you picked if Fully Booked !!!') </script>
                            sorry date booked
            EOF;
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