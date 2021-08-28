<div class="container-fluid">
    <div class="sidenav text-center">
        <div class="pt-3 pb-5">
            <a id="logo" href="">CVEOSMS</a>
        </div>

        <div>
            <ul>
                <li class="mb-4"><img class="rounded-circle" src="../../img/profile.png" alt="profile picture" width="100vw" height="100vw"></li>
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
            <a href=".php">Birth Certificate</a>
        </div>

        <div class="mt-5">
            <a href=".php">Death Certificate</a>
        </div>

        <div class="mt-5">
            <a href=".php">Civil Registration</a>
        </div>

        <div class="mt-5 sidebar ">
            <a href=".php">Marriage Certificate</a>
        </div>


        <div class="mt-5">
            <a href=".php">Divorce Registration</a>
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