<?php
//Initialize the session
session_start();

$id=trim($_SESSION["EmployeeID"]);
$cut = substr($id, 0, -6);



// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true  || strcmp($cut,'cle') != 0) {
  
    header("location: http://localhost:8080/Employee/login.php");
    exit;

}
?>
<?php 
$birth = "BIRTH";
$death = "DEATH";
$marriage = "MARRIAGE";
$divorce = "DIVORCE";
$civil ="CIVIL";
$requestType = $_POST['requestType'];
$_SESSION['userID']= $_POST['userID'];


    if (strcmp(trim($requestType),$death)==0){
        header("location:../../user/deathregistration.php");
      
    }
    elseif (strcmp(trim($requestType),$birth)==0){
        header("location:../../user/birthregistration.php");
    }
    elseif (strcmp(trim($requestType),$marriage)==0){
        header("location:../../user/marriageregistration.php");
    }
    elseif (strcmp(trim($requestType),$civil)==0){
        header("location:../../user/civilregistration.php");
    }
    elseif (strcmp(trim($requestType),$divorce)==0){
        header("location:../../user/divorceregistration.php");
    }


?>