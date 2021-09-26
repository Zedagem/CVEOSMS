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
try {
    require_once "../../dbconnection.php";
    $sql = "SELECT * FROM household INNER JOIN request on household.id = request.applierId WHERE scheduledDate<=CURDATE() AND readCash=1 AND stat = 0 "  ;  //change the greater than sign if you want it every thing for today
 
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<?php include '../../header.php' ?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">

<title>Pending Page </title>

</head>

<body>
    <?php include 'clerkTemplet.php' ?>
    <h2 class="mt-5 text-center"> Pending Payment </h2>

    <div class="container-fluid">
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
            while ($row = $stmt->fetch()) {
            ?>




                <tr>
                    <form method="POST" action="printpage.php">

                        <td> <?php echo $row['fname'] ?> </td>
                        <td><?php echo $row['requestType'] ?> </td>
                        <td><?php echo $row['appliedDate'] ?> </td>
                        <td><?php echo $row['scheduledDate'] ?> </td>
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <input type="hidden" name="applierId" value="<?php echo $row['applierId'] ?>">
                        <input type="hidden" name="Rtype" value="<?php echo $row['requestType'] ?>">
                        <td><input class='form-control btn btn-primary' type="submit" name="submit" value="Print"></td>
                        <td><input class='form-control btn btn-primary' type="submit" name="done" value="DONE"></td>


                    </form>



                </tr>




            <?php } ?>



        </tbody>

    </table>




    </div>



    </div>
</body>

</html>