<?php
session_start();
//Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../loginPage.php");
}
$error="";
if (isset($_POST['next'])) {
    // code...
    foreach ($_POST as $key => $value) {
        // code...
        $_SESSION['birthInfo'][$key] = $value;
    }
    $key = array_keys($_SESSION['birthInfo']);
    if (in_array('next', $key)) {
        // code...
        unset($_SESSION['birthInfo']['next']);
    }
    if (empty($_FILES['motherId']['name'])) {
        $error = 'This field is required.';
    } else {
    
    
        if ($_FILES['motherId']['size'] > 2097152) {
            $error = 'File should not be more than 2MB.';
        } else {
           
            $_SESSION['motherId'] = 'files/birth/' . time() . $_FILES['motherId']['name'];
            move_uploaded_file($_FILES['motherId']['tmp_name'], "../" . $_SESSION['motherId']);
            // $_SESSION['motherId']=$motherId;
            header('Location:birthRegistration3.php');
            
        }
    }
    
    
   
}

?>
<?php include '../header.php' ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Birth Registration Mother Information</title>

</head>

<body>
    <?php include 'userTemplet.php' ?>
    <h2 class="mt-5">Federal Democratic Republic of Ethiopia Birth Registration</h2>

    <div class="container-fluid">




        <form action="" method="POST" enctype="multipart/form-data" class="row g-3 mt-3 ">
            <h4>Mothers Information</h4>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="MfirstName" placeholder="First Name" value="<?= isset($_SESSION['birthInfo']['MfirstName']) ? $_SESSION['birthInfo']['MfirstName'] : ''; ?>" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <input type="text" name="MfatherName" placeholder="Father Name" value="<?= isset($_SESSION['birthInfo']['MfatherName']) ? $_SESSION['birthInfo']['MfatherName'] : ''; ?>" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="MgrandFatherName" placeholder="Grand Father Name" value="<?= isset($_SESSION['birthInfo']['MgrandFatherName']) ? $_SESSION['birthInfo']['MgrandFatherName'] : ''; ?>" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="MfirstNameA" placeholder="First Name (In Amharic)" value="<?= isset($_SESSION['birthInfo']['MfirstNameA']) ? $_SESSION['birthInfo']['MfirstNameA'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="MfatherNameA" placeholder="Father Name (In Amharic)" value="<?= isset($_SESSION['birthInfo']['MfatherNameA']) ? $_SESSION['birthInfo']['MfatherNameA'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="MgrandFatherNameA" placeholder="Grand Father Name (In Amharic)" value="<?= isset($_SESSION['birthInfo']['MgrandFatherNameA']) ? $_SESSION['birthInfo']['MgrandFatherNameA'] : ''; ?>" class="form-control input-style" required>
            </div>


            <div class="col-lg-4 col-md-12 col-sm-12 input-group-lg">
                <label for="dateInGC" class="form-label">Date of Birth in G.C</label>
                <input id="dateInGC" type="date" name="MGC" min="1921-01-01" max ="<?php echo $currentDate?>" value="<?= isset($_SESSION['birthInfo']['MGC']) ? $_SESSION['birthInfo']['MGC'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 text-center d-none d-lg-block">
                <img class="mt-3" src="../Icons/switch.svg" alt="switch">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <label for="dateInEC" class="form-label">Date of Birth in E.C</label>
                <input id="dateInEC" type="date" name="MEC"  min="1913-01-01" max ="<?php echo $currentDateEC?>" value="<?= isset($_SESSION['birthInfo']['MEC']) ? $_SESSION['birthInfo']['MEC'] : ''; ?>" class="form-control input-style" required>
            </div>

            <label for="placeOfBirth" class="form-label">Place of Birth</label>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="placeOfBirth" name="MPOBregion" value="<?= isset($_SESSION['birthInfo']['MPOBregion']) ? $_SESSION['birthInfo']['MPOBregion'] : ''; ?>" class="form-select input-style" onchange="countryChange(this);" required>
                    <option value="">Region/City</option>
                    <option value="Addis Ababa">Addis Ababa</option>
                    <option value="Afar">Afar</option>
                    <option value="Amhara">Amhara</option>
                    <option value="Benishangul-Gummuz">Benishangul-Gummuz</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="country" name="MPOBzone" class="form-select input-style" required>
                    <option value="0">Zone/City Administration</option>
                </select>

            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="MPOBcity" placeholder="City" value="<?= isset($_SESSION['birthInfo']['MPOBcity']) ? $_SESSION['birthInfo']['MPOBcity'] : ''; ?>" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="number" name="MPOBworeda" min ="1" placeholder="Woreda" value="<?= isset($_SESSION['birthInfo']['MPOBworeda']) ? $_SESSION['birthInfo']['MPOBworeda'] : ''; ?>" class="form-control input-style" required>
            </div>

            <label for="usualResidence" class="form-label">Place of Usual Residence</label>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="usualResidence" name="MURregion" value="<?= isset($_SESSION['birthInfo']['MURregion']) ? $_SESSION['birthInfo']['MURregion'] : ''; ?>" class="form-select input-style" onchange="countryChange2(this);" required>
                    <option value="">Region/City</option>
                    <option value="Addis Ababa">Addis Ababa</option>
                    <option value="Afar">Afar</option>
                    <option value="Amhara">Amhara</option>
                    <option value="Benishangul-Gummuz">Benishangul-Gummuz</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="country2" name="MURzone" class="form-select input-style" required>
                    <option value="0">Zone/City Administration</option>
                </select>

            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="MURcity" placeholder="City" value="<?= isset($_SESSION['birthInfo']['MURcity']) ? $_SESSION['birthInfo']['MURcity'] : ''; ?>" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="number" name="MURworeda" min ="1" placeholder="Woreda" value="<?= isset($_SESSION['birthInfo']['MURworeda']) ? $_SESSION['birthInfo']['MURworeda'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select name="MoccupationType" class="form-select input-style" required>
                    <option value="">Occupational Type</option>
                    <option value="Employed">Employed</option>
                    <option value="Unemployed">Unemployed</option>
                    <option value="Student">Student</option>
                    <option value="Business Owner">Business Owner</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select name="MeducationalStatus" class="form-select input-style" required>
                    <option value="">Educational Status</option>
                    <option value="High School Graduate">High School Graduate</option>
                    <option value="Some College">Some College</option>
                    <option value="Associate Degree">Associate Degree</option>
                    <option value="Bachelors Degree">Bachelors Degree</option>
                    <option value="MBA Master">MBA Masters</option>
                    <option value="Doctorate">Doctorate</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select name="Mreligion" class="form-select input-style" required>
                    <option value="">Religion</option>
                    <option value="Christian">Christian</option>
                    <option value="Islam">Islam</option>
                    <option value="Jewish">Jewish</option>
                    <option value="Bahai Faith">Baháí Faith</option>
                    <option value="Atheist">Atheist</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="Mnationality" placeholder="Nationality" value="<?= isset($_SESSION['birthInfo']['Mnationality']) ? $_SESSION['birthInfo']['Mnationality'] : ''; ?>" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="Mid" placeholder="Identification Number" value="<?= isset($_SESSION['birthInfo']['Mid']) ? $_SESSION['birthInfo']['Mid'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg ">
                <label for="motherId"> Mother Identification Card</label>
                <input type="file" name="motherId" id="motherId" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf)<strong style="color:red"> <?php echo $error?></strong></small>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">


            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <a class="form-control btn btn-primary" href="birthRegistration.php"> PREVIOUS</a>

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="submit" name="next" value="NEXT" class="form-control btn btn-primary">
            </div>






        </form>



    </div>









</body>

</html>