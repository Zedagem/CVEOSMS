<?php
//Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
?>
<?php
try {
    require_once "../../dbconnection.php";
    $sql = "SELECT * From birthrequest  WHERE schDate<=CURDATE() AND readCash='false'"  ;  //change the greater than sign if you want it every thing for today
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<?php include '../../header.php' ?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">

<title>Pending Payment </title>

</head>

<body>
    <?php include 'cashierTemplet.php' ?>
    <h2 class="mt-5 text-center">Cashier Dashboard / Pending Payment </h2>

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
                    <form method="POST" action="pay.php">

                        <td> <?php echo $row['firstName'] ?> </td>
                        <td><?php echo $row['Rtype'] ?> </td>
                        <td><?php echo $row['appliedDate'] ?> </td>
                        <td><?php echo $row['schDate'] ?> </td>
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <input type="hidden" name="phone" value="<?php echo $row['phoneNumber'] ?>">
                        <input type="hidden" name="fname" value="<?php echo $row['firstName'] ?>">
                        <input type="hidden" name="mname" value="<?php echo $row['fatherName'] ?>">
                        <input type="hidden" name="lname" value="<?php echo $row['grandFatherName'] ?>">
                        <input type="hidden" name="Rtype" value="<?php echo $row['Rtype'] ?>">

                        <td><input class='form-control btn btn-primary' type="submit" name="submit" value="PAY"></td>


                    </form>



                </tr>




            <?php } ?>



        </tbody>

    </table>




    </div>



    </div>
</body>

</html>