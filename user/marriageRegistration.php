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
        if (empty($_FILES['wifeId']['name'])) {
            $error = 'This field is required.';
        }
        elseif (empty($_FILES['wifePhoto']['name'])) {
            $error = 'This field is required.';
        } 
        else {

            if ($_FILES['wifeId']['size'] > 2097152) {
                $error = 'File should not be more than 2MB.';
            } 
            elseif ($_FILES['wifePhoto']['size'] > 2097152) {
                $error = 'File should not be more than 2MB.';
            }
            else {

                $_SESSION['wifeId'] = 'files/marriage/' . time() . $_FILES['wifeId']['name'];
                move_uploaded_file($_FILES['wifeId']['tmp_name'], "../" . $_SESSION['wifeId']);

                $_SESSION['wifePhoto'] = 'files/marriage/' . time() . $_FILES['wifePhoto']['name'];
                move_uploaded_file($_FILES['wifePhoto']['tmp_name'], "../" . $_SESSION['wifePhoto']);

                header('Location:marriageRegistration2.php');
            }
        }
    }
}
?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Marriage Registration Wife Information</title>

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
            <h4>Wife Information</h4>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="WfirstName" value="<?= isset($_SESSION['marriageInfo']['WfirstName']) ? $_SESSION['marriageInfo']['WfirstName'] : ''; ?>" placeholder="First Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <input type="text" name="WfatherName" value="<?= isset($_SESSION['marriageInfo']['WfatherName']) ? $_SESSION['marriageInfo']['WfatherName'] : ''; ?>" placeholder="Father Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="WgrandFatherName" value="<?= isset($_SESSION['marriageInfo']['WgrandFatherName']) ? $_SESSION['marriageInfo']['WgrandFatherName'] : ''; ?>" placeholder="Grand Father Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="WfirstNameA" value="<?= isset($_SESSION['marriageInfo']['WfirstNameA']) ? $_SESSION['marriageInfo']['WfirstNameA'] : ''; ?>" placeholder="First Name (In Amharic)" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="WfatherNameA" value="<?= isset($_SESSION['marriageInfo']['WfatherNameA']) ? $_SESSION['marriageInfo']['WfatherNameA'] : ''; ?>" placeholder="Father Name (In Amharic)" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="WgrandFatherNameA" value="<?= isset($_SESSION['marriageInfo']['WgrandFatherNameA']) ? $_SESSION['marriageInfo']['WgrandFatherNameA'] : ''; ?>" placeholder="Grand Father Name (In Amharic)" class="form-control input-style" required>
            </div>




            <div class="col-lg-4 col-md-12 col-sm-12 input-group-lg">
                <label for="dateInGC" class="form-label">Date of Birth in G.C</label>
                <input id="dateInGC" name="dateInGC" type="date" min="1921-01-01" max ="<?php echo $currentDate?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 text-center d-none d-lg-block">
                <img class="mt-3" src="../Icons/switch.svg" alt="switch">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <label for="dateInEC" class="form-label">Date of Birth in E.C</label>
                <input id="dateInEC" type="date" name="dateInEC" min="1913-01-01" max ="<?php echo $currentDateEC?>" class="form-control input-style" required>
            </div>

            <label for="placeOfBirth" class="form-label">Place of Birth</label>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="placeOfBirth" name="POBWiferegion" value="<?= isset($_SESSION['marriageInfo']['occupation']) ? $_SESSION['marriageInfo']['occupation'] : ''; ?>" class="form-select input-style" onchange="countryChange(this);" required>
                    <option value="">Region/City</option>
                    <option value="Addis Ababa">Addis Ababa</option>
                    <option value="Afar">Afar</option>
                    <option value="Amhara">Amhara</option>
                    <option value="Benishangul-Gummuz">Benishangul-Gummuz</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="country" name="POBWifeZone" value="<?= isset($_SESSION['marriageInfo']['POBWifeZone']) ? $_SESSION['marriageInfo']['POBWifeZone'] : ''; ?>" class="form-select input-style" required>
                    <option value="0">Zone/City Administration</option>
                </select>

            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="POBWifeCity" value="<?= isset($_SESSION['marriageInfo']['POBWifeCity']) ? $_SESSION['marriageInfo']['POBWifeCity'] : ''; ?>" placeholder="City" class="form-control input-style text-uppercase">
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="number" name="POBWifeWoreda" min = "1" value="<?= isset($_SESSION['marriageInfo']['POBWifeWoreda']) ? $_SESSION['marriageInfo']['POBWifeWoreda'] : ''; ?>" placeholder="Woreda" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style" name="occupation" value="<?= isset($_SESSION['marriageInfo']['occupation']) ? $_SESSION['marriageInfo']['occupation'] : ''; ?>">
                    <option value="">Occupational Type</option>
                    <option value="Employed">Employed</option>
                    <option value="Unemployed">Unemployed</option>
                    <option value="Student">Student</option>
                    <option value="Business Owner">Business Owner</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style" name="education" value="<?= isset($_SESSION['marriageInfo']['education']) ? $_SESSION['marriageInfo']['education'] : ''; ?>">
                    <option value="">Educational Status</option>
                    <option value="High School Graduate">High School Graduate</option>
                    <option value="Some College">Some College</option>
                    <option value="Associate Degree">Associate Degree</option>
                    <option value="Bachelor Degree">Bachelors Degree</option>
                    <option value="MBA masters">MBA, masters</option>
                    <option value="Doctorate">Doctorate</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style" name="religion" value="<?= isset($_SESSION['marriageInfo']['religion']) ? $_SESSION['marriageInfo']['religion'] : ''; ?>">
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
                <input type="text" name="Wnationality" value="<?= isset($_SESSION['marriageInfo']['Wnationality']) ? $_SESSION['marriageInfo']['Wnationality'] : ''; ?>" placeholder="Nationality" class="form-control input-style text-uppercase">
            </div>



            
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="Wid" value="<?= isset($_SESSION['marriageInfo']['Wid']) ? $_SESSION['marriageInfo']['Wid'] : ''; ?>" placeholder="Identification Number" class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                
                </div>

            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg ">
                <label for="wifeId">Wife ID Card </label>
                <input type="file" name="wifeId" id="wifeId" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf )</small>
                <?php echo $error; ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg ">
                <label for="wifePhoto">Wife Photograph  </label>
                <input type="file" name="wifePhoto" id="wifePhoto" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf )</small>
                <?php echo $error; ?>
            </div>
            

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="submit" name="next" value="NEXT" class="form-control btn btn-primary mt-4">
            </div>




        </form>



    </div>









</body>

</html>