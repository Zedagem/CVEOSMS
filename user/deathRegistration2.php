<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../loginPage.php");
}
?>
<?php
extract($_SESSION['deathInfo']);
$error = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['next'])) {
    // code...
    foreach ($_POST as $key => $value) {
        // code...
        $_SESSION['deathInfo'][$key] = $value;
    }
    $key = array_keys($_SESSION['deathInfo']);
    if (in_array('next', $key)) {
        // code...
        unset($_SESSION['deathInfo']['next']);
    }
    if (empty($_FILES['certFromInst']['name'])) {
        $error = 'This field is required.';
    } else {

        if ($_FILES['certFromInst']['size'] > 2097152) {
            $error = 'File should not be more than 2MB.';
        } else {

            $_SESSION['certFromInst'] = 'files/death/' . time() . $_FILES['certFromInst']['name'];
            move_uploaded_file($_FILES['certFromInst']['tmp_name'], "../" . $_SESSION['certFromInst']);

            header('Location:displaydeath.php');
        }
    }
}
// }
?>
<?php include '../header.php' ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Death Registration</title>

</head>

<body>
    <?php include 'userTemplet.php' ?>
    <h2 class="mt-5">Federal Democratic Republic of Ethiopia Death Registration</h2>

    <div class="container-fluid">

        <!-- <div class="row text-center mt-5">
            <div class="col-lg-6 col-md-6 ">
                <a class="nav-active" href="deathRegistration.php"> New Application</a>
            </div>
            <div class="col-lg-6"> <a href="lost.php"> Lost </a></div>


        </div> -->


        <form class="row g-3 mt-3 " enctype="multipart/form-data" method="POST">
            <h4>Information Regarding The Death</h4>

        



            <div class="col-lg-4 col-md-12 col-sm-12 input-group-lg">
                <label for="dateInGC" class="form-label">Date of Death in G.C</label>
                <input id="dateInGC" type="date" name='DODGC' max ="<?php echo $currentDate?>" value="<?= isset($_SESSION['deathInfo']['DODGC']) ? $_SESSION['deathInfo']['DODGC'] : ''; ?>" class="form-control input-style" required>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12  text-center d-none d-lg-block">
                <img class="mt-5" src="../Icons/switch.svg" alt="switch">
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <label for="dateInEC" class="form-label">Date of Death in E.C</label>
                <input id="dateInEC" type="date" name='DODEC' max ="<?php echo $currentDateEC?>" value="<?= isset($_SESSION['deathInfo']['DODEC']) ? $_SESSION['deathInfo']['DODEC'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select name="sex" class="form-select input-style" value="<?= isset($_SESSION['deathInfo']['sex']) ? $_SESSION['deathInfo']['sex'] : ''; ?>" required>
                    <option value="">Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>


            <label for="placeOccurance" class="form-label">Place of Occurance</label>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="placeOccurance" name='PlaceBirthRegion' value="<?= isset($_SESSION['deathInfo']['PlaceBirthRegion']) ? $_SESSION['deathInfo']['PlaceBirthRegion'] : ''; ?>" class="form-select input-style" onchange="countryChange(this);" required>
                    <option value="">Region/City</option>
                    <option value="Addis Ababa">Addis Ababa</option>
                    <option value="Afar">Afar</option>
                    <option value="Amhara">Amhara</option>
                    <option value="Benishangul-Gummuz">Benishangul-Gummuz</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="country" name='Zone' class="form-select input-style" required>
                    <option value="0">Zone/City Administration</option>
                </select>

            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="Pcity" placeholder="City" value="<?= isset($_SESSION['deathInfo']['Pcity']) ? $_SESSION['deathInfo']['Pcity'] : ''; ?>" class="form-control input-style text-uppercase">
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="number" name="Pworeda" placeholder="Woreda" min="1" value="<?= isset($_SESSION['deathInfo']['Pworeda']) ? $_SESSION['deathInfo']['Pworeda'] : ''; ?>" class="form-control input-style" required>
            </div>


            <div class="col-lg-12 col-md-6 col-sm-12 input-group-lg">
                <input type="text" value="<?= isset($_SESSION['deathInfo']['cause']) ? $_SESSION['deathInfo']['cause'] : ''; ?>" name="cause" placeholder="Reason of Death" class="form-control input-style text-uppercase">
            </div>


            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="placeofburial" value="<?= isset($_SESSION['deathInfo']['placeofburial']) ? $_SESSION['deathInfo']['placeofburial'] : ''; ?>" placeholder="Cemetery / Place of Burial" class="form-control input-style text-uppercase">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="proofOfDeath" value="<?= isset($_SESSION['deathInfo']['proofOfDeath']) ? $_SESSION['deathInfo']['proofOfDeath'] : ''; ?>" placeholder="Type of Proof For Cause of Death" class="form-control input-style text-uppercase">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <label for="certFromInst"> Certificate From Institution</label>
                <input type="file" name="certFromInst" id="certFromInst" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf )</small>
                <?php echo $error; ?>
            </div>




            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <a class="form-control btn btn-primary mt-5" href="deathRegistration.php"> PREVIOUS</a>

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="submit" name="next" value="NEXT" class="form-control btn btn-primary mt-5">
            </div>

        </form>



    </div>









</body>

</html>