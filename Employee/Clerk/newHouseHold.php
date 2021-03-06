<?php
//Initialize the session
session_start();

$id=trim($_SESSION["EmployeeID"]);
$cut = substr($id, 0, -6);



// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true  || strcmp($cut,'cle') != 0) {
  
    header("location: http://localhost:8080/Employee/login.php");
    exit;

}
?>
<?php 

// Include dbconnection file
require_once "../../dbconnection.php";

// Define variables and initialize with empty values
$houseNumber = $phoneNumber = $dobEC = $dobGC = $gender = $photo = $titleCert = $fname = $mname = $lname = $fnameA = $mnameA = $lnameA =
    $fatherLastName = $mothername = $motherLastName = $email = $duplicate_account = $sucess_message = $error = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $houseNumber = trim($_POST["houseNumber"]);
    $phoneNumber = strtoupper(trim($_POST["phoneNumber"]));
    $dobEC = trim($_POST["dobEC"]);
    $dobGC = trim($_POST["dobGC"]);
    $gender = strtoupper(trim($_POST["gender"]));
    $fname = strtoupper(trim($_POST["fname"]));
    $mname = strtoupper(trim($_POST["mname"]));
    $lname = strtoupper(trim($_POST["lname"]));
    $fnameA = trim($_POST["fnameA"]);
    $mnameA = trim($_POST["mnameA"]);
    $lnameA = trim($_POST["lnameA"]);
    $fatherLastName = strtoupper(trim($_POST["fatherLastName"]));
    $mothername = strtoupper(trim($_POST["mothername"]));
    $motherLastName = strtoupper(trim($_POST["motherLastName"]));
    if (empty(trim($_POST["email"]))) {
        $email = "";
    } else {
        $email = trim($_POST["email"]);
    }

    // select statement for cross checking 
    $sql2 = "SELECT * from household WHERE houseNumber = :houseNumber ";
    $stmt2 = $pdo->prepare($sql2);
    //$stmt2->bindParam(":phoneNumber", $phoneNumber, PDO::PARAM_INT);
    $stmt2->bindParam(":houseNumber", $houseNumber, PDO::PARAM_INT);
    // $stmt2->bindParam(":fname", $fname, PDO::PARAM_STR);
    // $stmt2->bindParam(":mname", $mname, PDO::PARAM_STR);
    // $stmt2->bindParam(":lname", $lname, PDO::PARAM_STR);
    $stmt2->execute();
    if ($stmt2->rowCount() >= 1) {
       // $duplicate_account = "This household is already registered";
        echo "<script>alert('This household is already registered');</script>";
        
    } else {


        // Prepare a insert statement
        $sql = "INSERT INTO household (memberType,houseNumber,phoneNumber,dobEC,dobGC,sex,photo,titleCert,fname,mname,lname,fnameA,mnameA,lnameA,fatherLastName,mothername,motherLastName,email) 
                                values ('OWNER',:houseNumber,:phoneNumber,:dobEC,:dobGC,:gender,:photo,:titleCert,:fname,:mname,:lname,:fnameA,:mnameA,:lnameA,:fatherLastName,:mothername,:motherLastName,:email);";

        // Prepare stmt
        $stmt = $pdo->prepare($sql);
        if ($_FILES['photo']['size'] > 2097152) {
            $error = 'File should not be more than 2MB.';
        } elseif ($_FILES['titleCert']['size'] > 2097152) {
            $error = 'File should not be more than 2MB.';
        } else {


            // Bind variables to the prepared statement as parameters

            $_SESSION['photo'] = 'files/household/' . time() . $_FILES['photo']['name'];
            move_uploaded_file($_FILES['photo']['tmp_name'], "../../" . $_SESSION['photo']);


            $_SESSION['titleCert'] = 'files/household/' . time() . $_FILES['titleCert']['name'];
            move_uploaded_file($_FILES['titleCert']['tmp_name'], "../../" . $_SESSION['titleCert']);

            $stmt->bindParam(":houseNumber", $houseNumber, PDO::PARAM_INT);
            $stmt->bindParam(":phoneNumber", $phoneNumber, PDO::PARAM_INT);
            $stmt->bindParam(":dobEC", $dobEC, PDO::PARAM_STR);
            $stmt->bindParam(":dobGC", $dobGC, PDO::PARAM_STR);
            $stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
            $stmt->bindParam(":photo", $_SESSION['photo'], PDO::PARAM_STR);
            $stmt->bindParam(":titleCert", $_SESSION['titleCert'], PDO::PARAM_STR);
            $stmt->bindParam(":fname", $fname, PDO::PARAM_STR);
            $stmt->bindParam(":mname", $mname, PDO::PARAM_STR);
            $stmt->bindParam(":lname", $lname, PDO::PARAM_STR);
            $stmt->bindParam(":fnameA", $fnameA, PDO::PARAM_STR);
            $stmt->bindParam(":mnameA", $mnameA, PDO::PARAM_STR);
            $stmt->bindParam(":lnameA", $lnameA, PDO::PARAM_STR);
            $stmt->bindParam(":fatherLastName", $fatherLastName, PDO::PARAM_STR);
            $stmt->bindParam(":mothername", $mothername, PDO::PARAM_STR);
            $stmt->bindParam(":motherLastName", $motherLastName, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);


            //execute stmt
            $stmt->execute();
            //$sucess_message = "New Household Created";
            echo "<script>alert('New Household Created');</script>";
        }
    }
    unset($stmt);
    unset($stmt2);
    unset($_SESSION['photo']);
    unset($_SESSION['titleCert']);
}
unset($pdo);

?>
<?php include '../../header.php' ?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<script src="../../js/regionSelection.js"></script>

<title>Add New Household</title>

</head>

<body>
    <?php include 'clerkTemplet.php' ?>
    <h2 class="mt-5 text-center">Creating a New HouseHold Information </h2>
    <div class="container-fluid">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data" class="row g-3 mt-5">

            <p>Resoponsible Person</p>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="fname" placeholder="First Name" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <input type="text" name="mname" placeholder="Father Name" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="lname" placeholder="Grand Father Name" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="fnameA" placeholder=" Frst Name (In Amharic)" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="mnameA" placeholder="Father Name (In Amharic)" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="lnameA" placeholder="Grand Father Name (In Amharic)" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="fatherLastName" placeholder=" Father Last Name " class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="mothername" placeholder=" Mother Name " class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="motherLastName" placeholder=" Mother Last Name " class="form-control input-style" required>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select name="gender" class="form-select input-style" required>
                    <option value="">Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <p>General Informaiton</p>



            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="houseNumber" placeholder="House Number" class="form-control input-style" required>
            </div>

            <div class="col-lg-5 col-md-6 col-sm-12 input-group-lg">
                <input type="tel" name="phoneNumber" placeholder="Phone Number" pattern="[0-9]{10}" class="form-control input-style" required>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12 input-group-lg">
                <input type="email" name="email" placeholder="Email Address" class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 input-group-lg">
                <label for="dateInGC" class="form-label">Date of Birth in G.C</label>
                <input id="dateInGC" name="dobGC" type="date" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 text-center d-none d-lg-block">
                <img class="mt-3" src="../../Icons/switch.svg" alt="switch">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <label for="dateInEC" class="form-label">Date of Birth in E.C</label>
                <input id="dateInEC" name="dobEC" type="date" class="form-control input-style" required>
            </div>



            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg ">
                <label for="photo"> Photograph</label>
                <input type="file" name="photo" id="photo" accept=".jpeg,.jpg,.png,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf)</small>
            </div>



            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg ">
                <label for="titleCert"> Title Certificate</label>

                <input type="file" name="titleCert" id="titleCert" accept=".jpeg,.jpg,.png,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf)</small>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <strong style="color:red;"><?php echo $duplicate_account; echo $error; ?></strong>
                
            </div>

            <div class="col-lg-2 col-md-2 col-sm-4 input-group-lg">
                <label for=""></label>
                <input type="submit" value="Create" name="submit" class="form-control btn btn-primary ">
            </div>

            <?php
                    if ($sucess_message) {
                        echo <<< EOF
                        <script> alert('$sucess_message')</script>
            EOF;
                    }

                    ?>
        </form>




    </div>



    </div>
</body>

</html>