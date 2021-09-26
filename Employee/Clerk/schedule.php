
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
include "../../dbconnection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
                       echo " <script> alert('Sorry the date you picked if Fully Booked !!!'); </script>";
                             
           
        }

}
unset($stmt);
unset($stmt2);
unset($stmt3);
unset($stmt4);
}


?>

<?php
$EmployeeID=$_SESSION["EmployeeID"];
try {
    
    $sqlSearch="SELECT * FROM household INNER JOIN request on household.id = request.applierId
    WHERE readManager = 1 AND scheduled = 0";
    $stmtSearch = $pdo->prepare($sqlSearch);
    $stmtSearch->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<?php include '../../header.php' ?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<style>
    .input-style {
        background-color: #C4E8F1;
        border: 3px solid white;
        color: black;
    }
</style>

<title>Schedule Page</title>

</head>

<body>
    <?php include 'clerkTemplet.php' ?>
    <h2 class="mt-5 text-center">Schedule </h2>
    <!-- <div class="container"> -->
    <table class="table mt-5 ">
        <thead class="thead-dark">
            <tr>
                <th>Requester Name</th>
                <th>Request Type</th>
                <th>Request Date</th>
                <th>Schedule Date</th>
                <th></th>


            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $stmtSearch->fetch()) {
            ?>


                <tr>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                        <td> <?php echo $row['fname']. " ". $row['mname']  ?> </td>
                        <td><?php echo $row['requestType'] ?> </td>
                        <input type="hidden" name="Rtype" value="<?php echo $row['requestType'] ?>">
                        <td><?php echo $row['appliedDate'] ?> </td>
                        <td><input type="date" id="sch" class="input-style" name=schedule></td>
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <input type="hidden" name="applierId" value="<?php echo $row['applierId'] ?>">
                        <input type="hidden" name="requestType" value="<?php echo $row['requestType'] ?>">
                        <td><input class='form-control btn btn-primary' type="submit" name="submit" value="submit"></td>


                    </form>



                </tr>




            <?php } ?>



        </tbody>

    </table>






    <!-- </div> -->



    </div>
</body>

</html>