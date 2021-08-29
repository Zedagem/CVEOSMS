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
    $sql = "SELECT * From birthrequest  WHERE readManager = 1 AND scheduled = 0 "; 
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
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
            while ($row = $stmt->fetch()) {
            ?>




                <tr>
                    <form method="POST" action="sch.php">

                        <td> <?php echo $row['firstName'] ?> </td>
                        <td><?php echo $row['Rtype'] ?> </td>
                        <input type="hidden" name="Rtype" value="<?php echo $row['Rtype'] ?>">
                        <td><?php echo $row['appliedDate'] ?> </td>
                        <td><input type="date" id="sch" class="input-style" name=schedule></td>
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <input type="hidden" name="phone" value="<?php echo $row['phoneNumber'] ?>">
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