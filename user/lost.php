<?php
// Initialize the session
session_start();

//Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../loginPage.php");
}
?>
<?php include '../header.php';

$error = $policeReport=$photo="";
$userID = $_SESSION['userID'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['next'])) {
       
        if (empty($_FILES['policeReport']['name'])) {
            $error = 'This field is required.';
        }else {

            if ($_FILES['policeReport']['size'] > 2097152) {
                $error = 'File should not be more than 2MB.';
            } else {

                $_SESSION['policeReport'] = 'files/civil/' . time() . $_FILES['policeReport']['name'];
                move_uploaded_file($_FILES['policeReport']['tmp_name'], "../" . $_SESSION['policeReport']);
            
                header('Location:displaylost.php');
            }
        }
    }
}

?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Civil Lost Registration Information</title>

</head>

<body>
    <?php include 'userTemplet.php' ?>
    <h2 class="mt-5">Federal Democratic Republic of Ethiopia Civil Lost Registration</h2>

    <div class="container-fluid">

        <div class="row text-center mt-5">
            <div class="col-lg-6 col-md-6 ">
                <a href="civilRegistration.php"> New Application</a>
            </div>
            <div class="col-lg-6 nav-active"> <a href="lost.php"> Lost </a></div>


        </div>


        <form class="row g-3 mt-3 " enctype="multipart/form-data" method="POST">
            <h4> Information Regarding the Civilian</h4>

          
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg ">
                <label for="Police Report"> Police Report Certificate</label>
                <input type="file" name="policeReport" id="Police Report" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style mt-1" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf )</small>
                <?php echo $error; ?>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="submit" name="next" value="NEXT" class="form-control btn btn-primary mt-5" >
            </div>


        </form>




    </div>









</body>

</html>