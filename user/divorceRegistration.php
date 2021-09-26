<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../loginPage.php");
}
?>
<?php include '../header.php';

$error = "";
if (isset($_POST['next'])) {
    // code...
    foreach ($_POST as $key => $value) {
        // code...
        $_SESSION['divorceInfo'][$key] = $value;
    }
    $key = array_keys($_SESSION['divorceInfo']);
    if (in_array('next', $key)) {
        // code...
        unset($_SESSION['divorceInfo']['next']);
    }
    if (empty($_FILES['wifeId']['name'])) {
        $error = 'This field is required.';
    }
    elseif(empty($_FILES['wifePhoto']['name'])){
        $error = 'This field is required.';
    }
     else {

        if ($_FILES['wifeId']['size'] > 2097152) {
            $error = 'File should not be more than 2MB.';
        }
        elseif ($_FILES['wifePhoto']['size'] > 2097152) {
            $error = 'File should not be more than 2MB.';
        } else {

            $_SESSION['wifeId'] = 'files/divorce/' . time() . $_FILES['wifeId']['name'];
            move_uploaded_file($_FILES['wifeId']['tmp_name'], "../" . $_SESSION['wifeId']);

            $_SESSION['wifePhoto'] = 'files/divorce/' . time() . $_FILES['wifePhoto']['name'];
            move_uploaded_file($_FILES['wifePhoto']['tmp_name'], "../" . $_SESSION['wifePhoto']);

            header('Location:divorceRegistration2.php');
        }
    }
    
}



?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Divorce Registration Wife Information</title>

</head>

<body>
    <?php include 'userTemplet.php' ?>
    <h2 class="mt-5">Federal Democratic Republic of Ethiopia Divorce Registration</h2>

    <div class="container-fluid">

        <!-- <div class="row text-center mt-5">
            <div class="col-lg-6 col-md-6 ">
                <a class="nav-active" href="birthRegistration.php"> New Application</a>
            </div>
            <div class="col-lg-6"> <a href="lost.php"> Lost </a></div>


        </div> -->


        <form class="row g-3 mt-3 " enctype="multipart/form-data" method="POST">
            <h4>Wife Information</h4>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="firstName" value="<?= isset($_SESSION['divorceInfo']['firstName']) ? $_SESSION['divorceInfo']['firstName'] : ''; ?>" placeholder="First Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <input type="text" name="fatherName" value="<?= isset($_SESSION['divorceInfo']['fatherName']) ? $_SESSION['divorceInfo']['fatherName'] : ''; ?>" placeholder="Father Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="grandFatherName" value="<?= isset($_SESSION['divorceInfo']['grandFatherName']) ? $_SESSION['divorceInfo']['grandFatherName'] : ''; ?>" placeholder="Grand Father Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="firstNameA" value="<?= isset($_SESSION['divorceInfo']['firstNameA']) ? $_SESSION['divorceInfo']['firstNameA'] : ''; ?>" placeholder="First Name (In Amharic)" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="fatherNameA" value="<?= isset($_SESSION['divorceInfo']['fatherNameA']) ? $_SESSION['divorceInfo']['fatherNameA'] : ''; ?>" placeholder="Father Name (In Amharic)" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="grandFatherNameA" value="<?= isset($_SESSION['divorceInfo']['grandFatherNameA']) ? $_SESSION['divorceInfo']['grandFatherNameA'] : ''; ?>" placeholder="Grand Father Name (In Amharic)" class="form-control input-style" required>
            </div>




            <div class="col-lg-4 col-md-12 col-sm-12 input-group-lg">
                <label for="dateInGC" class="form-label">Date of Birth in G.C</label>
                <input id="dateInGC" name="dateInGC" min="1921-01-01" max ="<?php echo $currentDate?>" value="<?= isset($_SESSION['divorceInfo']['dateInGC']) ? $_SESSION['divorceInfo']['dateInGC'] : ''; ?>" type="date" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 text-center d-none d-lg-block">
                <img class="mt-3" src="../Icons/switch.svg" alt="switch">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <label for="dateInEC" class="form-label">Date of Birth in E.C</label>
                <input id="dateInEC" type="date" name="dateInEC" min="1913-01-01" max ="<?php echo $currentDateEC?>" value="<?= isset($_SESSION['divorceInfo']['occupation']) ? $_SESSION['divorceInfo']['dateInEC'] : ''; ?>" class="form-control input-style" required>
            </div>

            <label for="placeOfBirth" class="form-label">Place of Birth</label>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="placeOfBirth" name="POBWiferegion" class="form-select input-style" onchange="countryChange(this);" required>
                    <option value="">Region/City</option>
                    <option value="Addis Ababa">Addis Ababa</option>
                    <option value="Afar">Afar</option>
                    <option value="Amhara">Amhara</option>
                    <option value="Benishangul-Gummuz">Benishangul-Gummuz</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="country" name="POBWifeZone"class="form-select input-style" required>
                    <option value="0">Zone/City Administration</option>
                </select>

            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="POBWifeCity"  placeholder="City" class="form-control input-style text-uppercase">
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="number" name="POBWifeWoreda"  placeholder="Woreda" min="1" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style" name="OccupationWife">
                    <option value="">Occupational Type</option>
                    <option value="Employed">Employed</option>
                    <option value="Unemployed">Unemployed</option>
                    <option value="Student">Student</option>
                    <option value="Business Owner">Business Owner</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style" name="EducationWife">
                    <option value="">Educational Status</option>
                    <option value="High School Graduate">High School Graduate</option>
                    <option value="Some College">Some College</option>
                    <option value="Associate Degree">Associate Degree</option>
                    <option value="Bachelors Degree">Bachelors Degree</option>
                    <option value="MBA masters">MBA, masters</option>
                    <option value="Doctorate">Doctorate</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style" name="RelWife" >
                    <option value="">Religion</option>
                    <option value="Christian">Christian</option>
                    <option value="Islam">Islam</option>
                    <option value="Jewish">Jewish</option>
                    <option value="Bahai Faith">Baháʼí Faith</option>
                    <option value="Atheist">Atheist</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="Wnationality" value="<?= isset($_SESSION['divorceInfo']['Wnationality']) ? $_SESSION['divorceInfo']['Wnationality'] : ''; ?>" placeholder="Nationality" class="form-control input-style text-uppercase">
            </div>




            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="wifeID" value="<?= isset($_SESSION['divorceInfo']['wifeID']) ? $_SESSION['divorceInfo']['wifeID'] : ''; ?>" placeholder="Identification Number" class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg ">
                <label for="wifeId">Wife Identification Card</label>
                <input type="file" name="wifeId" id="wifeId" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf )</small>
                <?php echo $error; ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg ">
                <label for="wifePhoto">Wife Photograph </label>
                <input type="file" name="wifePhoto" id="wifePhoto" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf )</small>
                <?php echo $error; ?>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="submit" name="next" value="NEXT" class="form-control btn btn-primary mt-5">
            </div>



        </form>



    </div>









</body>

</html>