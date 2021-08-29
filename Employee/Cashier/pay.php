<?php

    include "../../dbconnection.php"; 
    

    $id= $_POST['id'];
    $phone = $_POST['phone'];
    $requestType =$_POST['Rtype'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $currentDate= date("Y-m-d");


    if($_POST['id'])
    {
        $sql="UPDATE birthrequest SET readCash=1 where id=$id";
        $stmt = $pdo->prepare($sql);
        $stmt ->execute();

        $sql2 ="INSERT INTO report (fname,mname,lname,requestType,payedDate) VALUES ('$fname','$mname','$lname','$requestType','$currentDate')";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2 ->execute();

        echo <<< EOF

                                    <script> alert('Payment Successful !!!') </script>
                                    
                    EOF;


    }
    unset($stmt);
    unset($stmt2);
    header("location:pendingPayment.php");
    ?>
