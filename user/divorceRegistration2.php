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
    if (empty($_FILES['husbandId']['name'])) {
        $error = 'This field is required.';
    }
    elseif (empty($_FILES['husbandPhoto']['name'])) {
        $error = 'This field is required.';
    } else {

        if ($_FILES['husbandId']['size'] > 2097152) {
            $error = 'File should not be more than 2MB.';
        }
        elseif ($_FILES['husbandPhoto']['size'] > 2097152) {
            $error = 'File should not be more than 2MB.';
        } else {

            $_SESSION['husbandId'] = 'files/divorce/' . time() . $_FILES['husbandId']['name'];
            move_uploaded_file($_FILES['husbandId']['tmp_name'], "../" . $_SESSION['husbandId']);

            $_SESSION['husbandPhoto'] = 'files/divorce/' . time() . $_FILES['husbandPhoto']['name'];
            move_uploaded_file($_FILES['husbandPhoto']['tmp_name'], "../" . $_SESSION['husbandPhoto']);

            header('Location:divorceRegistration3.php');
        }
    }
}
?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Divorce Registration Husband Information</title>

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
            <h4>Husband Information</h4>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="HfirstName" value="<?= isset($_SESSION['divorceInfo']['HfirstName']) ? $_SESSION['divorceInfo']['HfirstName'] : ''; ?>" placeholder="First Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <input type="text" name="HfatherName" value="<?= isset($_SESSION['divorceInfo']['HfatherName']) ? $_SESSION['divorceInfo']['HfatherName'] : ''; ?>" placeholder="Father Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="HgrandFatherName" value="<?= isset($_SESSION['divorceInfo']['HgrandFatherName']) ? $_SESSION['divorceInfo']['HgrandFatherName'] : ''; ?>" placeholder="Grand Father Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="HfirstNameA" value="<?= isset($_SESSION['divorceInfo']['HfirstNameA']) ? $_SESSION['divorceInfo']['HfirstNameA'] : ''; ?>" placeholder="First Name (In Amharic)" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="HfatherNameA" value="<?= isset($_SESSION['divorceInfo']['HfatherNameA']) ? $_SESSION['divorceInfo']['HfatherNameA'] : ''; ?>" placeholder="Father Name (In Amharic)" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="HgrandFatherNameA" value="<?= isset($_SESSION['divorceInfo']['HgrandFatherNameA']) ? $_SESSION['divorceInfo']['HgrandFatherNameA'] : ''; ?>" placeholder="Grand Father Name (In Amharic)" class="form-control input-style" required>
            </div>




            <div class="col-lg-4 col-md-12 col-sm-12 input-group-lg">
                <label for="dateInGC" class="form-label">Date of Birth in G.C</label>
                <input id="dateInGC" type="date" name="DOBhusbandGC" min="1921-01-01" max ="<?php echo $currentDate?>" value="<?= isset($_SESSION['marriageInfo']['DOBhusbandGC']) ? $_SESSION['marriageInfo']['DOBhusbandGC'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 text-center d-none d-lg-block">
                <img class="mt-3" src="../Icons/switch.svg" alt="switch">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <label for="dateInEC" class="form-label">Date of Birth in E.C</label>
                <input id="dateInEC" type="date" name="DOBhusbandEC" min="1913-01-01" max ="<?php echo $currentDateEC?>" value="<?= isset($_SESSION['marriageInfo']['DOBhusbandEC']) ? $_SESSION['marriageInfo']['DOBhusbandEC'] : ''; ?>" class="form-control input-style" required>
            </div>

            <label for="placeOfBirth" class="form-label">Place of Birth</label>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="placeOfBirth" name="POBregionhus" value="<?= isset($_SESSION['marriageInfo']['POBregionhus']) ? $_SESSION['marriageInfo']['POBregionhus'] : ''; ?>" class="form-select input-style" onchange="countryChange(this);" required>
                    <option value="">Region/City</option>
                    <option value="Addis Ababa">Addis Ababa</option>
                    <option value="Afar">Afar</option>
                    <option value="Amhara">Amhara</option>
                    <option value="Benishangul-Gummuz">Benishangul-Gummuz</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="country" name="husZone" value="<?= isset($_SESSION['marriageInfo']['husZone']) ? $_SESSION['marriageInfo']['husZone'] : ''; ?>" class="form-select input-style" required>
                    <option value="0">Zone/City Administration</option>
                </select>

            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="huscity" value="<?= isset($_SESSION['divorceInfo']['huscity']) ? $_SESSION['divorceInfo']['huscity'] : ''; ?>" placeholder="City" class="form-control input-style text-uppercase">
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="number" name="Husworeda" min="1" value="<?= isset($_SESSION['divorceInfo']['Husworeda']) ? $_SESSION['divorceInfo']['Husworeda'] : ''; ?>" placeholder="Woreda" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style" name="Hoccupation" value="<?= isset($_SESSION['marriageInfo']['Hoccupation']) ? $_SESSION['marriageInfo']['Hoccupation'] : ''; ?>">
                    <option value=""> Occupational Type</option>
                    <option value="Employed">Employed</option>
                    <option value="Unemployed">Unemployed</option>
                    <option value="Student">Student</option>
                    <option value="Business Owner">Business Owner</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style" name="Heducation" value="<?= isset($_SESSION['marriageInfo']['Heducation']) ? $_SESSION['marriageInfo']['Heducation'] : ''; ?>">
                    <option value="">Educational Status</option>
                    <option value="High School Graduate">High School Graduate</option>
                    <option value="Some College">Some College</option>
                    <option value="Associate Degree">Associate Degree</option>
                    <option value="Bachelors Degree">Bachelor's Degree</option>
                    <option value="MBA masters">MBA, master's</option>
                    <option value="Doctorate">Doctorate</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style" name="relHus" value="<?= isset($_SESSION['marriageInfo']['relHus']) ? $_SESSION['marriageInfo']['relHus'] : ''; ?>">
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
                <input type="text" name="Hnationality" value="<?= isset($_SESSION['divorceInfo']['Hnationality']) ? $_SESSION['divorceInfo']['Hnationality'] : ''; ?>" placeholder="Nationality" class="form-control input-style text-uppercase">
            </div>




            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="husbandIdNum" value="<?= isset($_SESSION['divorceInfo']['husbandIdNum']) ? $_SESSION['divorceInfo']['husbandIdNum'] : ''; ?>" placeholder="Identification Number" class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg ">
                <label for="husbandId">Husband Identification Card</label>
                <input type="file" name="husbandId" id="husbandId" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf )</small>
                <?php echo $error; ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg ">
                <label for="husbandPhoto">Husband Photograph</label>
                <input type="file" name="husbandPhoto" id="husbandPhoto" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf )</small>
                <?php echo $error; ?>
            </div>



            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <a class="form-control btn btn-primary mt-5" href="divorceRegistration.php"> PREVIOUS</a>

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="submit" name="next" value="NEXT" class="form-control btn btn-primary mt-5">
            </div>

        </form>



    </div>









</body>

</html>