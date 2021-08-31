<?php
session_start();
$error = "";
$childPhoto =  $hospitalBirthCert = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
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
        if (empty($_FILES['hospitalBirthCert']['name']) && empty($_FILES['childPhoto']['name'])) {
            $error = 'This field is required.';
        } else {

            if ($_FILES['childPhoto']['size'] > 2097152) {
                $error = 'File should not be more than 2MB.';
            } elseif ($_FILES['hospitalBirthCert']['size'] > 2097152) {
                $error = 'File should not be more than 2MB.';
            } else {
              
                $_SESSION['childPhoto'] = 'files/birth/' . time() . $_FILES['childPhoto']['name'];
                move_uploaded_file($_FILES['childPhoto']['tmp_name'], "../" . $_SESSION['childPhoto']);

                $_SESSION['hospitalBirthCert'] = 'files/birth/' . time() . $_FILES['hospitalBirthCert']['name'];
                move_uploaded_file($_FILES['hospitalBirthCert']['tmp_name'], "../" . $_SESSION['hospitalBirthCert']);

                header('Location:birthRegistration2.php');

            }
        }
       
    }
}


?>
<?php include '../header.php' ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Birth Registration</title>

</head>

<body>
    <?php include 'userTemplet.php' ?>
    <h2 class="mt-5">Federal Democratic Republic of Ethiopia Birth Registration</h2>

    <div class="container-fluid">

        <div class="row text-center mt-5">
            <div class="col-lg-6 col-md-6 ">
                <a class="nav-active" href="birthRegistration.php"> New Application</a>
            </div>
            <div class="col-lg-6"> <a href="lost.php"> Lost </a></div>


        </div>


        <form action="" method="POST" enctype="multipart/form-data" class="row g-3 mt-3 ">
            <h4>Childs Information</h4>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="firstName" placeholder="First Name" value="<?= isset($_SESSION['birthInfo']['firstName']) ? $_SESSION['birthInfo']['firstName'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <input type="text" name="fatherName" placeholder="Father Name" value="<?= isset($_SESSION['birthInfo']['fatherName']) ? $_SESSION['birthInfo']['fatherName'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="grandFatherName" placeholder="Grand Father Name" value="<?= isset($_SESSION['birthInfo']['grandFatherName']) ? $_SESSION['birthInfo']['grandFatherName'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="firstNameA" placeholder=" Frst Name (In Amharic)" value="<?= isset($_SESSION['birthInfo']['firstNameA']) ? $_SESSION['birthInfo']['firstNameA'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="fatherNameA" placeholder="Father Name (In Amharic)" value="<?= isset($_SESSION['birthInfo']['fatherNameA']) ? $_SESSION['birthInfo']['fatherNameA'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="grandFatherNameA" placeholder="Grand Father Name (In Amharic)" value="<?= isset($_SESSION['birthInfo']['grandFatherNameA']) ? $_SESSION['birthInfo']['grandFatherNameA'] : ''; ?>" class="form-control input-style" required>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select name="gender" class="form-select input-style" required>
                    <option value="">Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 input-group-lg">
                <input type="number" name="weight" placeholder="Weight in KG" value="<?= isset($_SESSION['birthInfo']['weight']) ? $_SESSION['birthInfo']['weight'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="nationality" placeholder="Nationality" value="<?= isset($_SESSION['birthInfo']['nationality']) ? $_SESSION['birthInfo']['nationality'] : ''; ?>" class="form-control input-style" required>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 input-group-lg">
                <label for="dateInGC" class="form-label">Date of Birth in G.C</label>
                <input id="dateInGC" name="GC" type="date" value="<?= isset($_SESSION['birthInfo']['GC']) ? $_SESSION['birthInfo']['GC'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 text-center d-none d-lg-block">
                <img class="mt-3" src="../Icons/switch.svg" alt="switch">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <label for="dateInEC" class="form-label">Date of Birth in E.C</label>
                <input id="dateInEC" name="EC" type="date" value="<?= isset($_SESSION['birthInfo']['EC']) ? $_SESSION['birthInfo']['EC'] : ''; ?>" class="form-control input-style" required>
            </div>

            <label for="placeOfBirth" class="form-label">Place of Birth</label>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

                <select id="placeOfBirth" name="POBregion" value="<?= isset($_SESSION['birthInfo']['POBregion']) ? $_SESSION['birthInfo']['POBregion'] : ''; ?>" class="form-select input-style" onchange="countryChange(this);" required>
                    <option value="">Region/City</option>
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
                <input type="text" name="POBcity" placeholder="City" value="<?= isset($_SESSION['birthInfo']['POBcity']) ? $_SESSION['birthInfo']['POBcity'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="number" name="POBworeda" placeholder="Woreda" value="<?= isset($_SESSION['birthInfo']['POBworeda']) ? $_SESSION['birthInfo']['POBworeda'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="placeOccurrence" placeholder="Type of Place Occurrence / Institution" value="<?= isset($_SESSION['birthInfo']['placeOccurrence']) ? $_SESSION['birthInfo']['placeOccurrence'] : ''; ?>" class="form-control input-style" required>
                <small class="form-text text-muted">(Hospital, Home etc ..)</small>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="attendant" placeholder="Attendant at Birth" value="<?= isset($_SESSION['birthInfo']['attendant']) ? $_SESSION['birthInfo']['attendant'] : ''; ?>" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style" required>
                    <option>Type of Birth</option>
                    <option value="Single">Single</option>
                    <option value="Twins">Twins</option>
                    <option value="Triplet">Triplet</option>
                    <option value="others">Others</option>
                </select>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <label for="hospitalBirthCert"> Hospital Birth Certificate / Vaccine paper</label>
                <input type="file" name="hospitalBirthCert" id="hospitalBirthCert" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf)</small>
                <?php echo $error; ?>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <label for="childPhoto"> Child Photograph</label>
                <input type="file" name="childPhoto" id="childPhoto" accept=".jpeg,.png,.jpg" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg )</small>
                <?php echo $error; ?>
            </div>


            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="submit" name="next" value="NEXT" class="form-control btn btn-primary">
            </div>






        </form>



    </div>









</body>

</html>