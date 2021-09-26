
<?php

require_once "../../dbconnection.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string
$EmployeeID =  $_GET['EmployeeID'];

$sql="UPDATE request SET readManager = 1, managerId = '$EmployeeID ' where id ='$id'";
$stmt = $pdo->prepare($sql);


if($stmt->execute()) {
    echo "<script> alert('Sent to Manager')</script>";
    header("location:signOff.php");
}
else{
    echo "error sending to manager";
}
?>
