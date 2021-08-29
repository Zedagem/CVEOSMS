<?php

include "../../dbconnection.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$sql="UPDATE birthrequest SET readManager = true where id ='$id'";
$stmt = $pdo->prepare($sql);


if($stmt->execute()) {
    echo "<script> alert('Sent to Scheduling')</script>";
    header("location:signOff.php");
}
else{
    echo "error sending to clerk";
}

