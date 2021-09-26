<?php
//Initialize the session
session_start();

$id=trim($_SESSION["EmployeeID"]);
$cut = substr($id, 0, -6);



// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true  || strcmp($cut,'cas') != 0) {
  
    header("location: http://localhost:8080/Employee/login.php");
    exit;

}
?>
<?php
    include "../../dbconnection.php"; 
    
     
    $id= $_POST['id'];
    $applierId= $_POST['applierId'];
    $requestType =$_POST['Rtype'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $currentDate= date("Y-m-d");
    $EmployeeID=$_SESSION["EmployeeID"];


    if($_POST['id'])
    {
        $sql="UPDATE request SET readCash=1, cashID = '$EmployeeID' where id=$id ";
        $stmt = $pdo->prepare($sql);
       

        $sql2 ="INSERT INTO report (fname,mname,lname,reqtype,paiddate,empid,applierID) VALUES ('$fname','$mname','$lname','$requestType','$currentDate','$EmployeeID',' $applierId')";
        $stmt2 = $pdo->prepare($sql2);
       if( $stmt2 ->execute()){
        $stmt ->execute();
                     echo <<< EOF

                                    <script> alert('Payment Successful !!!') </script>
                                    
                      EOF;
       }


    }
    unset($stmt);
    unset($stmt2);
    header("location:pendingPayment.php");
    ?>
