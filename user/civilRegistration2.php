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
    header('Location:displaycivil.php');
}


?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Civil Registration Information Regarding Emergency Contact</title>

</head>

<body>
    <?php include 'userTemplet.php' ?>
    <h2 class="mt-5">Federal Democratic Republic of Ethiopia civil Registration</h2>

    <div class="container-fluid">

        <div class="row text-center mt-5">
            <div class="col-lg-6 col-md-6 ">
                <a class="nav-active" href="birthRegistration.php"> New Application</a>
            </div>
            <div class="col-lg-6"> <a href="lost.php"> Lost </a></div>


        </div>


        <form class="row g-3 mt-3 " enctype="multipart/form-data" method="POST">
            <h4> Information Regarding Emergency Contact</h4>


            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="EfirstName" value="<?= isset($_SESSION['civilInfo']['EfirstName']) ? $_SESSION['civilInfo']['EfirstName'] : ''; ?>" placeholder="First Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <input type="text" name="EfatherName" value="<?= isset($_SESSION['civilInfo']['EfatherName']) ? $_SESSION['civilInfo']['EfatherName'] : ''; ?>" placeholder="Father Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="EgrandFatherName" value="<?= isset($_SESSION['civilInfo']['EgrandFatherName']) ? $_SESSION['civilInfo']['EgrandFatherName'] : ''; ?>" placeholder="Grand Father Name" class="form-control input-style text-uppercase" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="EfirstNameA" value="<?= isset($_SESSION['civilInfo']['EfirstNameA']) ? $_SESSION['civilInfo']['EfirstNameA'] : ''; ?>" placeholder="First Name (In Amharic)" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="EfatherNameA" value="<?= isset($_SESSION['civilInfo']['EfatherNameA']) ? $_SESSION['civilInfo']['EfatherNameA'] : ''; ?>" placeholder="Father Name (In Amharic)" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="EgrandFatherNameA" value="<?= isset($_SESSION['civilInfo']['EgrandFatherNameA']) ? $_SESSION['civilInfo']['EgrandFatherNameA'] : ''; ?>" placeholder="Grand Father Name (In Amharic)" class="form-control input-style" required>
            </div>





            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select name="EbloodGroup" class="form-select input-style" required>
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
                <input type="tel" name="EphoneNumber" placeholder="Phone Number" pattern="[0-9]{10}" class="form-control input-style" required>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-12" >

            </div>

                <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                    <a class="form-control btn btn-primary" href="civilRegistration.php"> PREVIOUS</a>

                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                    <input type="submit" name="next" value="NEXT" class="form-control btn btn-primary">
                </div>
        </form>




    </div>









</body>

</html>