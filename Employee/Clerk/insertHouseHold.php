<?php
// Initialize the session
session_start();



// Include dbconnection file
require_once "../../dbconnection.php";

// Define variables and initialize with empty values
$memberType=$houseNumber = $phoneNumber = $dobEC = $dobGC = $gender = $photo = $titleCert = $fname = $mname = $lname = $fnameA = $mnameA = $lnameA =
    $fatherLastName = $mothername = $motherLastName = $email = $duplicate_account =$sucess_message= $household_error="";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $memberType =strtoupper(trim($_POST["memberType"]));
    $houseNumber = strtoupper(trim($_POST["houseNumber"]));
    $phoneNumber = strtoupper(trim($_POST["phoneNumber"]));
    $dobEC = strtoupper(trim($_POST["dobEC"]));
    $dobGC = strtoupper(trim($_POST["dobGC"]));
    $gender = strtoupper(trim($_POST["gender"]));
    $fname = strtoupper(trim($_POST["fname"]));
    $mname = strtoupper(trim($_POST["mname"]));
    $lname = strtoupper(trim($_POST["lname"]));
    $fnameA = strtoupper(trim($_POST["fnameA"]));
    $mnameA = strtoupper(trim($_POST["mnameA"]));
    $lnameA = strtoupper(trim($_POST["lnameA"]));
    $fatherLastName = strtoupper(trim($_POST["fatherLastName"]));
    $mothername = strtoupper(trim($_POST["mothername"]));
    $motherLastName = strtoupper(trim($_POST["motherLastName"]));
    $email = (trim($_POST["email"]));
    $photo = (trim($_POST["photo"]));

    //select statement for checking if that house number exist 
    $sql3 = "SELECT * from household WHERE houseNumber = :houseNumber ";
    $stmt3 = $pdo->prepare($sql3);
    $stmt3->bindParam(":houseNumber", $houseNumber, PDO::PARAM_INT);
    $stmt3->execute();
    if ($stmt3->rowCount() >= 1){

    


    // select statement for cross checking 
    $sql2 = "SELECT * from household WHERE phoneNumber = :phoneNumber ";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(":phoneNumber", $phoneNumber, PDO::PARAM_INT);
    $stmt2->execute();
    if ($stmt2->rowCount() >= 1) {
        $duplicate_account = "This person is already registered";
    } else {


        // Prepare a insert statement
        $sql = "INSERT INTO household (memberType,houseNumber,phoneNumber,dobEC,dobGC,sex,photo,titleCert,fname,mname,lname,fnameA,mnameA,lnameA,fatherLastName,mothername,motherLastName,email) 
                                values ('$memberType',:houseNumber,:phoneNumber,:dobEC,:dobGC,:gender,:photo,' ',:fname,:mname,:lname,:fnameA,:mnameA,:lnameA,:fatherLastName,:mothername,:motherLastName,:email);";

        // Prepare stmt
        $stmt = $pdo->prepare($sql);


        // Bind variables to the prepared statement as parameters
       // $stmt->bindParam(":memberType", $memberType, PDO::PARAM_STR);
        $stmt->bindParam(":houseNumber", $houseNumber, PDO::PARAM_INT);
        $stmt->bindParam(":phoneNumber", $phoneNumber, PDO::PARAM_INT);
        $stmt->bindParam(":dobEC", $dobEC, PDO::PARAM_STR);
        $stmt->bindParam(":dobGC", $dobGC, PDO::PARAM_STR);
        $stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
        $stmt->bindParam(":photo", $photo, PDO::PARAM_STR);
        // $stmt->bindParam(":titleCert", $titleCert, PDO::PARAM_STR);
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
        $sucess_message = "Inserted Into Household ";
    }
    unset($stmt);
    unset($stmt2);
}
}else{
    $household_error ="There is no recorded household by that house number!!";
}
unset($pdo);

?>
<?php include '../../header.php' ?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<script src="../../js/regionSelection.js"></script>

<title>Insert  New Household</title>

</head>

<body>
    <?php include 'clerkTemplet.php' ?>
    <h2 class="mt-5 text-center">Inserting Into a New HouseHold  </h2>
    <div class="container-fluid">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="row g-3 mt-5">

        <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="houseNumber" placeholder="House Number" class="form-control input-style">
            </div>
          

            <p>Personal Information</p>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select name="memberType" class="form-select input-style" required>
                    <option value="">Member Type</option>
                    <option value="Owner">Owner</option>
                    <option value="Dependent">Dependent</option>
                </select>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select name="gender" class="form-select input-style" required>
                    <option value="">Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-lg-4"></div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="fname" placeholder="First Name" class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <input type="text" name="mname" placeholder="Father Name" class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="lname" placeholder="Grand Father Name" class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="fnameA" placeholder=" Frst Name (In Amharic)" class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="mnameA" placeholder="Father Name (In Amharic)" class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="lnameA" placeholder="Grand Father Name (In Amharic)" class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="fatherLastName" placeholder=" Father Last Name " class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="mothername" placeholder=" Mother Name " class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="motherLastName" placeholder=" Mother Last Name " class="form-control input-style">
            </div>
   

            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                <input type="tel" name="phoneNumber" placeholder="Phone Number" pattern="[0-9]{10}" class="form-control input-style" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
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
                <input type="file" name="photo" id="photo" class="form-control input-style">
            </div>
        

            <div class="col-lg-2 col-md-2 col-sm-4 input-group-lg">
                <label for=""></label>
                <input type="submit" value="Create" name="submit" class="form-control btn btn-primary ">

                <div class="col-lg-6 col-md-6 col-sm-12">
                <strong style="color:red;"><?php echo $duplicate_account; echo $household_error ?></strong>
                <strong style="color: green;"><?php echo $sucess_message ?></strong>
            </div>
            </div>


        </form>




    </div>



    </div>
</body>

</html>