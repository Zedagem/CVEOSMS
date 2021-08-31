<?php

require_once "../../dbconnection.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$sql="UPDATE birthrequest SET readEmp = true where id ='$id'";
$stmt = $pdo->prepare($sql);


if($stmt->execute()) {
    echo "<script> alert('Sent to Manager')</script>";
    header("location:request.php");
}
else{
    echo "error sending to manager";
}
?>
