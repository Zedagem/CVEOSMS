<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
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
    if (empty($_FILES['courtCert']['name'])) {
        $error = 'This field is required.';
    } else {

        if ($_FILES['courtCert']['size'] > 2097152) {
            $error = 'File should not be more than 2MB.';
        } else {

            $_SESSION['courtCert'] = 'files/divorce/' . time() . $_FILES['courtCert']['name'];
            move_uploaded_file($_FILES['courtCert']['tmp_name'], "../" . $_SESSION['courtCert']);

            header('Location:displaydivorce.php');
        }
    }
    
}



?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Divorce Registration Regarding the Marriage </title>

</head>

<body>
    <?php include 'userTemplet.php' ?>
    <h2 class="mt-5">Federal Democratic Republic of Ethiopia Divorce Registration</h2>

    <div class="container-fluid">

        <!-- <div class="row text-center mt-5">
            <div class="col-lg-6 col-md-6 ">
                <a class="nav-active" href="DivorceRegistration.php"> New Application</a>
            </div>
            <div class="col-lg-6"> <a href="lost.php"> Lost </a></div>


        </div> -->

        <form class="row g-3 mt-3 " enctype="multipart/form-data" method="POST">



        
        <div class="col-lg-4 col-md-12 col-sm-12 input-group-lg">
        <label for="dateInGC" class="form-label">Date of Occurance in G.C</label>
            <input id="dateInGC" type="date"  name="dateofoccurance" min="1921-01-01" max ="<?php echo $currentDate?>" value="<?= isset($_SESSION['marriageInfo']['occurancedate']) ? $_SESSION['marriageInfo']['occurancedate'] : ''; ?>" class="form-control input-style" required >
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 text-center d-none d-lg-block">
            <img class="mt-3" src="../Icons/switch.svg" alt="switch">
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
        <label for="dateInEC" class="form-label">Date of Occurance in E.C</label>
            <input id="dateInEC"type="date"  name="dateOccuranceEC" min="1913-01-01" max ="<?php echo $currentDateEC?>" value="<?= isset($_SESSION['marriageInfo']['dateOccuranceEC']) ? $_SESSION['marriageInfo']['dateOccuranceEC'] : ''; ?>" class="form-control input-style" required >
        </div>



            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="nameOfCourt" value="<?= isset($_SESSION['divorceInfo']['nameOfCourt']) ? $_SESSION['divorceInfo']['nameOfCourt'] : ''; ?>" placeholder="Name of the Court that Approved the Divorce" class="form-control input-style text-uppercase">
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="courtRegistration" value="<?= isset($_SESSION['divorceInfo']['courtRegistration']) ? $_SESSION['divorceInfo']['courtRegistration'] : ''; ?>" placeholder="Court Registration number" class="form-control input-style">
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg ">
                <label for="courtCert"> Court Issued Divorce Paper</label>
                <input type="file" name="courtCert" id="courtCert" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf )</small>
                <?php echo $error; ?>
            </div>
            
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
            </div>  


            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <a class="form-control btn btn-primary" href="divorceRegistration2.php"> PREVIOUS</a>

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="submit" name="next" value="NEXT" class="form-control btn btn-primary">
            </div>


        </form>



    </div>


</body>

</html>