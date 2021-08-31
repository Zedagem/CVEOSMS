<?php
session_start();
$error = "";
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
    if (empty($_FILES['fatherId']['name'])) {
        $error = 'This field is required.';
    } else {
    
    
        if ($_FILES['fatherId']['size'] > 2097152) {
            $error = 'File should not be more than 2MB.';
        } else {
           
            $_SESSION['fatherId'] = 'files/birth/' . time() . $_FILES['fatherId']['name'];
            move_uploaded_file($_FILES['fatherId']['tmp_name'], "../" .  $_SESSION['fatherId']);
           // $_SESSION['fatherId']=$fatherId;
           header('Location:displayPage.php');
            
        }
    }
    
    
   
}

?>

<?php include '../header.php' ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Birth Registration Father Information</title>

</head>

<body>
    <?php include 'userTemplet.php' ?>
    <h2 class="mt-5">Federal Democratic Republic of Ethiopia Birth Registration</h2>

    <div class="container-fluid">




        <form action="" method="POST" enctype="multipart/form-data" class="row g-3 mt-3 ">
            <h4>Father Information</h4>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="FfirstName" placeholder="First Name" value="<?= isset($_SESSION['birthInfo']['FfirstName']) ? $_SESSION['birthInfo']['FfirstName'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <input type="text" name="FfatherName" placeholder="Father Name" value="<?= isset($_SESSION['birthInfo']['FfatherName']) ? $_SESSION['birthInfo']['FfatherName'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="FgrandFatherName" placeholder="Grand Father Name" value="<?= isset($_SESSION['birthInfo']['FgrandFatherName']) ? $_SESSION['birthInfo']['FgrandFatherName'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="FfirstNameA" placeholder="First Name (In Amharic)" value="<?= isset($_SESSION['birthInfo']['FfirstNameA']) ? $_SESSION['birthInfo']['FfirstNameA'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="FfatherNameA" placeholder="Father Name (In Amharic)" value="<?= isset($_SESSION['birthInfo']['FfatherNameA']) ? $_SESSION['birthInfo']['FfatherNameA'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="FgrandFatherNameA" placeholder="Grand Father Name (In Amharic)" value="<?= isset($_SESSION['birthInfo']['FgrandFatherNameA']) ? $_SESSION['birthInfo']['FgrandFatherNameA'] : ''; ?>" class="form-control input-style" required>
            </div>


            <div class="col-lg-4 col-md-12 col-sm-12 input-group-lg">
                <label for="dateInGC" class="form-label">Date of Birth in G.C</label>
                <input id="dateInGC" type="date" name="FGC" value="<?= isset($_SESSION['birthInfo']['FGC']) ? $_SESSION['birthInfo']['FGC'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 text-center d-none d-lg-block">
                <img class="mt-3" src="../Icons/switch.svg" alt="switch">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <label for="dateInEC" class="form-label">Date of Birth in E.C</label>
                <input id="dateInEC" type="date" name="FEC" value="<?= isset($_SESSION['birthInfo']['FEC']) ? $_SESSION['birthInfo']['FEC'] : ''; ?>" class="form-control input-style" required>
            </div>

            <label for="placeOfBirth" class="form-label">Place of Birth</label>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="placeOfBirth" name="FPOBregion" value="<?= isset($_SESSION['birthInfo']['FPOBregion']) ? $_SESSION['birthInfo']['FPOBregion'] : ''; ?>" class="form-select input-style" onchange="countryChange(this);" required>
                    <option value="">Region/City</option>
                    <option value="Addis Ababa">Addis Ababa</option>
                    <option value="Afar">Afar</option>
                    <option value="Amhara">Amhara</option>
                    <option value="Benishangul-Gummuz">Benishangul-Gummuz</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="country" name="FPOBzone" class="form-select input-style" required>
                    <option value="0">Zone/City Administration</option>
                </select>

            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="FPOBcity" placeholder="City" value="<?= isset($_SESSION['birthInfo']['FPOBcity']) ? $_SESSION['birthInfo']['FPOBcity'] : ''; ?>" class="form-control input-style">
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="number" name="FPOBworeda" placeholder="Woreda" value="<?= isset($_SESSION['birthInfo']['FPOBworeda']) ? $_SESSION['birthInfo']['FPOBworeda'] : ''; ?>" class="form-control input-style" required>
            </div>

            <label for="usualResidence" class="form-label">Place of Usual Residence</label>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="usualResidence" name="FURregion" value="<?= isset($_SESSION['birthInfo']['FURregion']) ? $_SESSION['birthInfo']['FURregion'] : ''; ?>" class="form-select input-style" onchange="countryChange2(this);" required>
                    <option value="">Region/City</option>
                    <option value="Addis Ababa">Addis Ababa</option>
                    <option value="Afar">Afar</option>
                    <option value="Amhara">Amhara</option>
                    <option value="Benishangul-Gummuz">Benishangul-Gummuz</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="country2" name="FURzone" class="form-select input-style" required>
                    <option value="0">Zone/City Administration</option>
                </select>

            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="FURcity" placeholder="City" value="<?= isset($_SESSION['birthInfo']['FURcity']) ? $_SESSION['birthInfo']['FURcity'] : ''; ?>" class="form-control input-style">
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="number" name="FURworeda" placeholder="Woreda" value="<?= isset($_SESSION['birthInfo']['FURworeda']) ? $_SESSION['birthInfo']['FURworeda'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select name="FoccupationType" class="form-select input-style">
                    <option value="">Occupational Type</option>
                    <option value="Employed">Employed</option>
                    <option value="Unemployed">Unemployed</option>
                    <option value="Student">Student</option>
                    <option value="Business Owner">Business Owner</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select name="FeducationalStatus" class="form-select input-style" required>
                    <option value="">Educational Status</option>
                    <option value="High School Graduate">High School Graduate</option>
                    <option value="Some College">Some College</option>
                    <option value="Associate Degree">Associate Degree</option>
                    <option value="Bachelors Degree">Bachelors Degree</option>
                    <option value="MBA Masters">MBA Masters</option>
                    <option value="Doctorate">Doctorate</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg" required>
                <select name="Freligion" class="form-select input-style">
                    <option value="">Religion</option>
                    <option value="Christian">Christian</option>
                    <option value="Islam">Islam</option>
                    <option value="Jewish">Jewish</option>
                    <option value="Bahai Faith">Baháí Faith</option>
                    <option value="Atheist">Atheist</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg" required>
                <input type="text" name="Fnationality" placeholder="Nationality" value="<?= isset($_SESSION['birthInfo']['Fnationality']) ? $_SESSION['birthInfo']['Fnationality'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg" required>
                <input type="text" name="Fid" placeholder="Identification Number" value="<?= isset($_SESSION['birthInfo']['Fid']) ? $_SESSION['birthInfo']['Fid'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg " >
                <label for="fatherId"> Father Identification Card</label>
                <input type="file" name="fatherId" accept=".jpeg,.png,.jpg,.pdf" id="fatherId" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf) <strong style="color:red"> <?php echo $error?></strong></small>
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