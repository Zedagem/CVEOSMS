<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../loginPage.php");
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
        if (empty($_FILES['photo']['name'])) {
            $error = 'This field is required.';
        } else {

            if ($_FILES['photo']['size'] > 2097152) {
                $error = 'File should not be more than 2MB.';
            } else {

                $_SESSION['photo'] = 'files/death/' . time() . $_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']['tmp_name'], "../" . $_SESSION['photo']);
                header('Location:deathRegistration2.php');
            }
        }
    }
}


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


        <form class="row g-3 mt-3 " method="POST" enctype="multipart/form-data">
            <h4>Deceased Information</h4>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="firstName" value="<?= isset($_SESSION['deathInfo']['firstName']) ? $_SESSION['deathInfo']['firstName'] : ''; ?>" placeholder="First Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <input type="text" name="fatherName" placeholder="Father Name" value="<?= isset($_SESSION['deathInfo']['fatherName']) ? $_SESSION['deathInfo']['fatherName'] : ''; ?>" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="grandFatherName" placeholder="Grand Father Name" value="<?= isset($_SESSION['deathInfo']['grandFatherName']) ? $_SESSION['deathInfo']['grandFatherName'] : ''; ?>" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="firstNameA" placeholder="First Name (In Amharic)" value="<?= isset($_SESSION['deathInfo']['firstNameA']) ? $_SESSION['deathInfo']['firstNameA'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="fatherNameA" placeholder="Father Name (In Amharic)" value="<?= isset($_SESSION['deathInfo']['fatherNameA']) ? $_SESSION['deathInfo']['fatherNameA'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="grandFatherNameA" placeholder="Grand Father Name (In Amharic)" value="<?= isset($_SESSION['deathInfo']['grandFatherNameA']) ? $_SESSION['deathInfo']['grandFatherNameA'] : ''; ?>" class="form-control input-style" required>
            </div>




            <div class="col-lg-4 col-md-12 col-sm-12 input-group-lg">
                <label for="dateInGC" class="form-label">Date of Birth in G.C</label>
                <input id="dateInGC" name="dateInGC" min="1921-01-01" max ="<?php echo $currentDate?>" value="<?= isset($_SESSION['deathInfo']['dateInGC']) ? $_SESSION['deathInfo']['dateInGC'] : ''; ?>" type="date" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 text-center d-none d-lg-block">
                <img class="mt-3" src="../Icons/switch.svg" alt="switch">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <label for="dateInEC" class="form-label">Date of Birth in E.C</label>
                <input id="dateInEC" type="date" name="dateInEC" min="1913-01-01" max ="<?php echo $currentDateEC?>" value="<?= isset($_SESSION['deathInfo']['dateInEC']) ? $_SESSION['deathInfo']['dateInEC'] : ''; ?>" class="form-control input-style" required>
            </div>

            <label for="placeOfBirth" class="form-label">Place of Birth</label>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="placeOfBirth" name="POBregion" class="form-select input-style" onchange="countryChange(this);" value="<?= isset($_SESSION['deathInfo']['POBregion']) ? $_SESSION['deathInfo']['POBregion'] : ''; ?>" required>
                    <option value="">Region/City </option>
                    <option value="Addis Ababa">Addis Ababa</option>
                    <option value="Afar">Afar</option>
                    <option value="Amhara">Amhara</option>
                    <option value="Benishangul-Gummuz">Benishangul-Gummuz</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="country" name="POBzone" class="form-select input-style" required>
                    <option value="0">Zone/City Administration</option>
                </select>

            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="city" value="<?= isset($_SESSION['deathInfo']['city']) ? $_SESSION['deathInfo']['city'] : ''; ?>" placeholder="City" class="form-control input-style text-uppercase">
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="number" name="woreda" min ="1" value="<?= isset($_SESSION['deathInfo']['woreda']) ? $_SESSION['deathInfo']['woreda'] : ''; ?>" placeholder="Woreda" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style" name="occupation" value="<?= isset($_SESSION['deathInfo']['occupation']) ? $_SESSION['deathInfo']['occupation'] : ''; ?>">
                    <option value="">Occupational Type</option>
                    <option value="Employed">Employed</option>
                    <option value="Unemployed">Unemployed</option>
                    <option value="Student">Student</option>
                    <option value="Business Owner">Business Owner</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style" name="educational" value="<?= isset($_SESSION['deathInfo']['educational']) ? $_SESSION['deathInfo']['educational'] : ''; ?>">
                    <option value="">Educational Status</option>
                    <option value="High School Graduate">High School Graduate</option>
                    <option value="Some College">Some College</option>
                    <option value="Associate Degree">Associate Degree</option>
                    <option value="Bachelor Degree">Bachelor's Degree</option>
                    <option value="MBA masters">MBA, master's</option>
                    <option value="Doctorate">Doctorate</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style" name="religion" value="<?= isset($_SESSION['deathInfo']['religion']) ? $_SESSION['deathInfo']['religion'] : ''; ?>">
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
                <input type="text" name="nationality" value="<?= isset($_SESSION['deathInfo']['nationality']) ? $_SESSION['deathInfo']['nationality'] : ''; ?>" placeholder="Nationality" class="form-control input-style">
            </div>


            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style" name='marital' value="<?= isset($_SESSION['deathInfo']['marital']) ? $_SESSION['deathInfo']['marital'] : ''; ?>">
                    <option value="">Marital-Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Separated">Separated</option>

                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="id" placeholder="Identification Number" value="<?= isset($_SESSION['deathInfo']['id']) ? $_SESSION['deathInfo']['id'] : ''; ?>" class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <label for="photo"> Photograph</label>
                <input type="file" name="photo" id="photo" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf )</small>
                <?php echo $error; ?>
            </div>
            <div class="col-lg-4">

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="submit" name="next" value="NEXT" class="form-control btn btn-primary mt-5">
            </div>



        </form>



    </div>









</body>

</html>