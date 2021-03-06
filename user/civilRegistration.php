<?php
// Initialize the session
session_start();

//Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../loginPage.php");
}
?>
<?php include '../header.php';


 
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['next'])) {
        // code...
        foreach ($_POST as $key => $value) {
            // code...
            $_SESSION['civilInfo'][$key] = $value;
        }
        $key = array_keys($_SESSION['civilInfo']);
        if (in_array('next', $key)) {
            // code...
            unset($_SESSION['civilInfo']['next']);
        }
        if (empty($_FILES['Blood_Group_Certification']['name'])) {
            $error = 'This field is required.';
        } elseif (empty($_FILES['photo']['name'])) {
            $error = 'This field is required.';
        } else {

            if ($_FILES['Blood_Group_Certification']['size'] > 2097152) {
                $error = 'File should not be more than 2MB.';
            } elseif ($_FILES['photo']['size'] > 2097152) {
                $error = 'File should not be more than 2MB.';
            } else {

                $_SESSION['Blood_Group_Certification'] = 'files/civil/' . time() . $_FILES['Blood_Group_Certification']['name'];
                move_uploaded_file($_FILES['Blood_Group_Certification']['tmp_name'], "../" . $_SESSION['Blood_Group_Certification']);

                $_SESSION['photo'] = 'files/civil/' . time() . $_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']['tmp_name'], "../" . $_SESSION['photo']);

                header('Location:civilRegistration2.php');
            }
        }
    }
}

?>

<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Civil Registration Information</title>

</head>

<body>
    <?php include 'userTemplet.php' ?>
    <h2 class="mt-5">Federal Democratic Republic of Ethiopia civil Registration</h2>

    <div class="container-fluid">

        <div class="row text-center mt-5">
            <div class="col-lg-6 col-md-6 ">
                <a class="nav-active" href="civilRegistration.php"> New Application</a>
            </div>
            <div class="col-lg-6"> <a href="lost.php"> Lost </a></div>


        </div>
        


        <form class="row g-3 mt-3 " enctype="multipart/form-data" method="POST">
            <h4> Information Regarding the Civilian</h4>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="firstName" value="<?= isset($_SESSION['civilInfo']['firstName']) ? $_SESSION['civilInfo']['firstName'] : ''; ?>" placeholder="First Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <input type="text" name="fatherName" value="<?= isset($_SESSION['civilInfo']['fatherName']) ? $_SESSION['civilInfo']['fatherName'] : ''; ?>" placeholder="Father Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="grandFatherName" value="<?= isset($_SESSION['civilInfo']['grandFatherName']) ? $_SESSION['civilInfo']['grandFatherName'] : ''; ?>" placeholder="Grand Father Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="firstNameA" value="<?= isset($_SESSION['civilInfo']['firstNameA']) ? $_SESSION['civilInfo']['firstNameA'] : ''; ?>" placeholder="First Name (In Amharic)" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="fatherNameA" value="<?= isset($_SESSION['civilInfo']['fatherNameA']) ? $_SESSION['civilInfo']['fatherNameA'] : ''; ?>" placeholder="Father Name (In Amharic)" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="grandFatherNameA" value="<?= isset($_SESSION['civilInfo']['grandFatherNameA']) ? $_SESSION['civilInfo']['grandFatherNameA'] : ''; ?>" placeholder="Grand Father Name (In Amharic)" class="form-control input-style" required>
            </div>



            <div class="col-lg-4 col-md-12 col-sm-12 input-group-lg">
                <label for="dateInGC" class="form-label">Date of Birth in G.C</label>
                <input id="dateInGC" name="dobGC" type="date" min="1921-01-01" max ="<?php echo $currentDate?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 text-center d-none d-lg-block">
                <img class="mt-3" src="../Icons/switch.svg" alt="switch">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <label for="dateInEC" class="form-label">Date of Birth in E.C</label>
                <input id="dateInEC" name="dobEC" type="date" min="1913-01-01" max ="<?php echo $currentDateEC?>" class="form-control input-style" required>
            </div>



            <label for="placeOfBirth" class="form-label">Place of Usual Residence</label>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="placeOfBirth" name="PURregion" class="form-select input-style" onchange="countryChange(this);" required>
                    <option value="">Region/City</option>
                    <option value="Addis Ababa">Addis Ababa</option>
                    <option value="Afar">Afar</option>
                    <option value="Amhara">Amhara</option>
                    <option value="Benishangul-Gummuz">Benishangul-Gummuz</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="country" name="PURzone" class="form-select input-style" required>
                    <option value="0">Zone/City Administration</option>
                </select>

            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="PURcity" placeholder="City" class="form-control input-style text-uppercase">
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="number" name="PURworeda" min="1" max="10" placeholder="Woreda" class="form-control input-style" required>
            </div>



            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select name="occupation" class="form-select input-style">
                    <option value="">Occupational Type</option>
                    <option value="Employed">Employed</option>
                    <option value="Unemployed">Unemployed</option>
                    <option value="Student">Student</option>
                    <option value="Business Owner">Business Owner</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select name="education" class="form-select input-style">
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
                <select name="religion" class="form-select input-style">
                    <option value="">Religion</option>
                    <option value="Christian">Christian</option>
                    <option value="Islam">Islam</option>
                    <option value="Jewish">Jewish</option>
                    <option value="Bahai Faith">Bah?????? Faith</option>
                    <option value="Atheist">Atheist</option>
                    <option value="other">Other</option>
                </select>
            </div>






            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="nationality" value="<?= isset($_SESSION['civilInfo']['nationality']) ? $_SESSION['civilInfo']['nationality'] : ''; ?>" placeholder="Nationality" class="form-control input-style" required>
            </div>



            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select name="bloodGroup" class="form-select input-style">
                    <option value="">Blood Group</option>
                    <option value="A-">A-</option>
                    <option value="A+">A+</option>
                    <option value="B-">B-</option>
                    <option value="B+">B+</option>
                    <option value="AB-">AB-</option>
                    <option value="AB+">AB+</option>
                    <option value="O-">O-</option>
                    <option value="O+">O+</option>
                </select>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select name="gender" class="form-select input-style" required>
                    <option value="">Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg ">
                <label for="Blood_Group_Certification"> Blood Group Certificate From Hospital</label>
                <input type="file" name="Blood_Group_Certification" id="Blood_Group_Certification" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf )</small>
                <?php echo $error; ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg ">
                <label for="photo"> Passport size photo</label>
                <input type="file" name="photo" id="photo" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf )</small>
                <?php echo $error; ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">

            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="submit" name="next" value="NEXT" class="form-control btn btn-primary">
            </div>


        </form>




    </div>









</body>

</html>