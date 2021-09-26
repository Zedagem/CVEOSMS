<?php

require_once "../dbconnection.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string
$id = trim($id);

$sql = "UPDATE NOTIFICATION SET is_read=1 WHERE Nid='$id'";
$stmt = $pdo->prepare($sql);
if($stmt->execute()){
    header("location:userDashboard.php");
    
}
else{
    echo "error";
}
?>