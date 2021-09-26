<?php

    include "../../dbconnection.php";
    $employeeId = $_SESSION['EmployeeID'];
    $sqll = "SELECT * FROM employee where EmployeeID = '$employeeId' ";
    $stmtt = $pdo->prepare($sqll);
    $stmtt->execute();
    $roww = $stmtt->fetch();
    $_SESSION['profile_pic'] = $roww['Photo'];

unset($sqll);
unset($stmtt);
unset($roww);

?>
<div class="container-fluid">
    <div class="sidenav text-center">
        <div class="pt-3 pb-5">
            <a id="logo" href="">CVEOSMS</a>
        </div>

        <div>
            <ul>
                <li class="mb-4"><img class="rounded-circle" src="<?php echo "http://localhost:8080/" . $_SESSION['profile_pic']; ?>" alt="profile picture" width="100vw" height="100vw"></li>
                <li><?php echo $_SESSION["EmployeeID"] ?></li>
                <li><?php echo $_SESSION["firstName"] . " " . $_SESSION["middleName"] ?></li>
                <li><?php echo $_SESSION["email"] ?></li>
                <li>Ethiopia</li>

            </ul>
        </div>

        <div class="mt-5">
            <a href="request.php">Request</a>
        </div>

        <div class="mt-5">
            <a href="pending.php">Pending</a>
        </div>

        <div class="mt-5">
            <a href="schedule.php">Schedule</a>
        </div>

        <div class="mt-5">
            <a href="registration.php">Registration</a>
        </div>

        <div class="mt-5">
            <a href="viewHousehold.php"> View Residents</a>
        </div>

        <div class="mt-5">
            <a href="newHouseHold.php">Add New HouseHold Information</a>
        </div>
        <div class="mt-5">
            <a href="insertHouseHold.php">Insert Into HouseHold Information</a>
        </div>



        <div class="mt-5 mb-5">
            <a href="../sessionDestroy.php">LogOut</a>
        </div>


    </div>

    <div class="main mt-5">