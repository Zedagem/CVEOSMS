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
$childPhoto =  $hospitalBirthCert = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['next'])) {
        // code...
        foreach ($_POST as $key => $value) {
            // code...
            $_SESSION['marriageInfo'][$key] = $value;
        }
        $key = array_keys($_SESSION['marriageInfo']);
        if (in_array('next', $key)) {
            // code...
            unset($_SESSION['marriageInfo']['next']);
        }
        if (empty($_FILES['husbandId']['name'])) {
            $error = 'This field is required.';
        } 
        elseif (empty($_FILES['husbandPhoto']['name'])) {
            $error = 'This field is required.';
        }else {

            if ($_FILES['husbandId']['size'] > 2097152) {
                $error = 'File should not be more than 2MB.';
            } 
            if ($_FILES['husbandPhoto']['size'] > 2097152) {
                $error = 'File should not be more than 2MB.';
            }else {

                $_SESSION['husbandId'] = 'files/marriage/' . time() . $_FILES['husbandId']['name'];
                move_uploaded_file($_FILES['husbandId']['tmp_name'], "../" . $_SESSION['husbandId']);

                $_SESSION['husbandPhoto'] = 'files/marriage/' . time() . $_FILES['husbandPhoto']['name'];
                move_uploaded_file($_FILES['husbandPhoto']['tmp_name'], "../" . $_SESSION['husbandPhoto']);

                header('Location:marriageRegistration3.php');
            }
        }
        
    }
}


?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Marriage Registration Husband Information</title>

</head>

<body>
    <?php include 'userTemplet.php' ?>
    <h2 class="mt-5">Federal Democratic Republic of Ethiopia Marriage Registration</h2>

    <div class="container-fluid">

        <!-- <div class="row text-center mt-5">
            <div class="col-lg-6 col-md-6 ">
                <a class="nav-active" href="marriageRegistration.php"> New Application</a>
            </div>
            <div class="col-lg-6"> <a href="lost.php"> Lost </a></div>


        </div> -->


        <form class="row g-3 mt-3 " enctype="multipart/form-data" method="POST">
            <h4>Husband Information</h4>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="husbandFirstname" value="<?= isset($_SESSION['birthInfo']['husbandFirstname']) ? $_SESSION['birthInfo']['husbandFirstname   '] : ''; ?>" placeholder="First Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <input type="text" name="husbandmiddlename" value="<?= isset($_SESSION['birthInfo']['husbandmiddlename']) ? $_SESSION['birthInfo']['husbandmiddlename'] : ''; ?>" placeholder="Father Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="husbandlastname" value="<?= isset($_SESSION['birthInfo']['husbandlastname']) ? $_SESSION['birthInfo']['husbandlastname'] : ''; ?>" placeholder="Grand Father Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="husbandFNamharic" value="<?= isset($_SESSION['birthInfo']['husbandFNamharic']) ? $_SESSION['birthInfo']['husbandFNamharic'] : ''; ?>" placeholder="First Name (In Amharic)" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="husbandMNamharic" value="<?= isset($_SESSION['birthInfo']['husbandMNamharic']) ? $_SESSION['birthInfo']['husbandMNamharic'] : ''; ?>" placeholder="Father Name (In Amharic)" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="grandFatherNameA" value="<?= isset($_SESSION['birthInfo']['grandFatherNameA']) ? $_SESSION['birthInfo']['husbandLNamharic'] : ''; ?>" placeholder="Grand Father Name (In Amharic)" class="form-control input-style" required>
            </div>




            <div class="col-lg-4 col-md-12 col-sm-12 input-group-lg">
                <label for="dateInGC" class="form-label">Date of Birth in G.C</label>
                <input id="dateInGC" name="DOBhusbandGC" min="1921-01-01" max ="<?php echo $currentDate?>" value="<?= isset($_SESSION['marriageInfo']['DOBhusbandGC']) ? $_SESSION['marriageInfo']['DOBhusbandGC'] : ''; ?>" type="date" class="form-control input-style" required>
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

                <select id="placeOfBirth" name="POBHusbandRegion" value="<?= isset($_SESSION['marriageInfo']['POBHusbandRegion']) ? $_SESSION['marriageInfo']['POBHusbandRegion'] : ''; ?>" class="form-select input-style" onchange="countryChange(this);" required>
                    <option value="">Region/City</option>
                    <option value="Addis Ababa">Addis Ababa</option>
                    <option value="Afar">Afar</option>
                    <option value="Amhara">Amhara</option>
                    <option value="Benishangul-Gummuz">Benishangul-Gummuz</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="country" name="POBHusbandZone" value="<?= isset($_SESSION['marriageInfo']['POBHusbandZone']) ? $_SESSION['marriageInfo']['POBHusbandZone'] : ''; ?>" class="form-select input-style" required>
                    <option value="0">Zone/City Administration</option>
                </select>

            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="POBHusbandCity" value="<?= isset($_SESSION['birthInfo']['POBHusbandCity']) ? $_SESSION['birthInfo']['POBHusbandCity'] : ''; ?>" placeholder="City" class="form-control input-style text-uppercase">
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="number" name="POBHusbandWoreda" min="1" value="<?= isset($_SESSION['birthInfo']['POBHusbandWoreda']) ? $_SESSION['birthInfo']['POBHusbandWoreda'] : ''; ?>" placeholder="Woreda" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style" name="Hoccupation" value="<?= isset($_SESSION['marriageInfo']['Hoccupation']) ? $_SESSION['marriageInfo']['Hoccupation'] : ''; ?>">
                    <option value="">Occupational Type</option>
                    <option value="Employed">Employed</option>
                    <option value="Unemployed">Unemployed</option>
                    <option value="Student">Student</option>
                    <option value="Business Owner">Business Owner</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style" name="educationhusband" value="<?= isset($_SESSION['marriageInfo']['educationhusband']) ? $_SESSION['marriageInfo']['educationhusband'] : ''; ?>">
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
                <select class="form-select input-style" name="religionhusband" value="<?= isset($_SESSION['marriageInfo']['religionhusband']) ? $_SESSION['marriageInfo']['religionhusband'] : ''; ?>">
                    <option value="">Religion</option>
                    <option value="Christian">Christian</option>
                    <option value="Islam">Islam</option>
                    <option value="Jewish">Jewish</option>
                    <option value="Baháí Faith">Baháʼí Faith</option>
                    <option value="Atheist">Atheist</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="nationality" value="<?= isset($_SESSION['birthInfo']['nationality']) ? $_SESSION['birthInfo']['nationality'] : ''; ?>" placeholder="Nationality" class="form-control input-style text-uppercase">
            </div>


           
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="husid" value="<?= isset($_SESSION['marriageInfo']['husid']) ? $_SESSION['marriageInfo']['husid'] : ''; ?>" placeholder="Identification Number" class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg ">
                <label for="husbandId">Husband ID Card </label>
                <input type="file" name="husbandId" id="husbandId" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf )</small>
                <?php echo $error; ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg ">
                <label for="husbandPhoto">Husband Photo </label>
                <input type="file" name="husbandPhoto" id="husbandPhoto" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf )</small>
                <?php echo $error; ?>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <a class="form-control btn btn-primary" href="marriageRegistration.php"> PREVIOUS</a>

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="submit" name="next" value="NEXT" class="form-control btn btn-primary mb-5">
            </div>

        </form>



    </div>









</body>

</html>