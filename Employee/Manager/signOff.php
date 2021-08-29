<?php
//Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: http://localhost:8080/Employee/login.php");
    exit;
}
?>
<?php
try {
    require_once "../../dbconnection.php";
    $sql = "SELECT * From birthrequest  WHERE readEmp = 1 & readManager=false";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<?php include '../../header.php' ?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">

<title>SIGN OFF Page</title>

</head>

<body>
    <?php include 'managerTemplet.php' ?>
    <h2 class="mt-5 text-center">SIGN OFF </h2>
    <!-- <div class="container"> -->
        <table class="table mt-5 ">
            <thead class="thead-dark">
                <tr>
                    <th>Requester Name</th>
                    <th>Request Type</th>
                    <th>Request Date</th>
                    <th>View Full Informaiton</th>
                    <th>Hospital Certificate</th>
                    <th>Vaccine Card</th>
                    <th>Child Photo</th>
                    <th>Mother ID</th>
                    <th>Father ID</th>
                    <th></th>
                    <th> </th>

                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $stmt->fetch()) {
                ?>

                    <tr>

                        <td> <?php echo $row['firstName'] ?> </td>
                        <td><?php echo $row['Rtype'] ?> </td>
                        <td><?php echo $row['appliedDate'] ?> </td>
                        <td> <a target="_blank" href="viewInformation.php?id=<?php echo $row['id']; ?>">View</a>
                        <td> <a target="_blank" href="<?php echo 'http://localhost:8080/' . $row['hospitalBirthCert'] ?>">View</a>
                        <td> <a target="_blank" href="<?php echo 'http://localhost:8080/' . $row['yellowCard'] ?>">View</a></td>
                        <td> <a target="_blank" href="<?php echo 'http://localhost:8080/' . $row['childPhoto'] ?>">View</a></td>
                        <td> <a target="_blank" href="<?php echo 'http://localhost:8080/' . $row['motherId'] ?>">View</a>
                        <td> <a target="_blank" href="<?php echo 'http://localhost:8080/' . $row['fatherId'] ?>">View</a></td>
                        <td><a class='form-control btn btn-primary' href="sign.php?id=<?php echo $row['id']; ?>">Sign</a></td>
                        <td><a class='form-control btn btn-primary' href="declineM.php?id=<?php echo $row['id']; ?>&phoneNumber=<?php echo $row['phoneNumber']; ?>">Decline</a></td>




                    </tr>

                <?php } ?>



            </tbody>

        </table>






    <!-- </div> -->



    </div>
</body>

</html>