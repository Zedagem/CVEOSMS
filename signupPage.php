<?php
// Initialize the session
session_start();



// Include dbconnection file
require_once "dbconnection.php";

// Define variables and initialize with empty values
$phoneNumber = $userName = $password = $hash_password = $houseNumber = $dateOfBirth = $firstName = $middleName = $lastName = $email = $photo = "";
$username_err = $duplicate_account = $dob = "";


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $hash_password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);
    $userName = trim($_POST['userName']);
    $houseNumber = strtoupper(trim($_POST["houseNumber"]));
    $dateOfBirth = strtoupper(trim($_POST["dateOfBirth"]));
    $firstName = strtoupper(trim($_POST["firstName"]));
    $middleName = strtoupper(trim($_POST["middleName"]));
    $lastName = strtoupper(trim($_POST["lastName"]));
    if (empty(trim($_POST["phoneNumber"]))) {
        $phoneNumber = 0;
    } else {
        $phoneNumber = trim($_POST["phoneNumber"]);
        $phoneNumber = $phoneNumber * 1;
    }
    if (empty(trim($_POST["email"]))) {
        $email = "";
    } else {
        $email = trim($_POST["email"]);
    }

    //  $hash_password = password_hash($password, PASSWORD_DEFAULT);



    // Prepare a select statement
    $sql = "SELECT * 
        FROM household 
        WHERE fname = :firstName AND mname = :middleName AND lname = :lastName AND dobGC = :dateOfBirth AND houseNumber = :houseNumber AND phoneNumber= :phoneNumber";

    $stmt = $pdo->prepare($sql);
    // Bind variables to the prepared statement as parameters
    $stmt->bindParam(":firstName", $firstName, PDO::PARAM_STR);
    $stmt->bindParam(":middleName", $middleName, PDO::PARAM_STR);
    $stmt->bindParam(":lastName", $lastName, PDO::PARAM_STR);
    $stmt->bindParam(":dateOfBirth", $dateOfBirth, PDO::PARAM_STR);
    $stmt->bindParam(":houseNumber", $houseNumber, PDO::PARAM_INT);
    $stmt->bindParam(":phoneNumber", $phoneNumber, PDO::PARAM_INT);



    // Attempt to execute the prepared statement
    $stmt->execute();
    // Check if that user is in the household information table
    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch();
        $_SESSION["userID"] = $row["id"];

        $sql3 = "SELECT FirstName, MiddleName,LastName,DOB,Housenum 
                        FROM resident 
                        WHERE FirstName = :firstName AND MiddleName = :middleName AND LastName = :lastName AND DOB = :dateOfBirth AND Housenum = :houseNumber";

        $stmt3 = $pdo->prepare($sql3);
        // binidng paramater
        $stmt3->bindParam(":firstName", $firstName, PDO::PARAM_STR);
        $stmt3->bindParam(":middleName", $middleName, PDO::PARAM_STR);
        $stmt3->bindParam(":lastName", $lastName, PDO::PARAM_STR);
        $stmt3->bindParam(":dateOfBirth", $dateOfBirth, PDO::PARAM_STR);
        $stmt3->bindParam(":houseNumber", $houseNumber, PDO::PARAM_INT);

        //execute
        $stmt3->execute();


        if ($stmt3->rowCount() == 1) {
            $duplicate_account = "<p> You already have an account <a href='loginPage.php'> LogIn here </a> <p> ";
        } else { // to check if there is user name duplication 
            $sql4 = "SELECT userName, DOB from resident where userName=:userName";
            $stmt4 = $pdo->prepare($sql4);
            $stmt4->bindParam(":userName", $userName, PDO::PARAM_STR);
            $stmt4->execute();
           


            if ($stmt4->rowCount() == 0) {
                $birthDate = trim($_POST['dateOfBirth']);
                $currentDate = date("d-m-Y");
                $age = date_diff(date_create($birthDate), date_create($currentDate));

                if (($age->format("%y")) < 18) {
                    echo "<script> alert('You have to be 18 to register'); </script>";
                } else {

                    //Inset into resident table for sign up

                    $sql2 = "INSERT INTO resident (id,Phone,Housenum,DOB,password,FirstName,MiddleName,LastName,email, Photo,userName) 
                                values (:id,:phoneNumber,:houseNumber,:dateOfBirth,:secretKey,:firstName,:middleName,:lastName,:email,:profile_pic,:userName);";

                    // Prepare stmt2
                    $stmt2 = $pdo->prepare($sql2);

                    $_SESSION['profile_pic'] = 'files/resident/' . time() . $_FILES['profile_pic']['name'];
                    move_uploaded_file($_FILES['profile_pic']['tmp_name'], $_SESSION['profile_pic']);

                    // Bind variables to the prepared statement as parameters
                    $stmt2->bindParam(":id", $_SESSION['userID'], PDO::PARAM_INT);
                    $stmt2->bindParam(":firstName", $firstName, PDO::PARAM_STR);
                    $stmt2->bindParam(":middleName", $middleName, PDO::PARAM_STR);
                    $stmt2->bindParam(":lastName", $lastName, PDO::PARAM_STR);
                    $stmt2->bindParam(":dateOfBirth", $dateOfBirth, PDO::PARAM_STR);
                    $stmt2->bindParam(":houseNumber", $houseNumber, PDO::PARAM_INT);
                    $stmt2->bindParam(":secretKey", $hash_password, PDO::PARAM_STR);
                    $stmt2->bindParam(":phoneNumber", $phoneNumber, PDO::PARAM_INT);
                    $stmt2->bindParam(":email", $email, PDO::PARAM_STR);
                    $stmt2->bindParam(":userName", $userName, PDO::PARAM_STR);
                    $stmt2->bindParam(":profile_pic", $_SESSION['profile_pic'], PDO::PARAM_STR);

                    //execute stmt2
                    $stmt2->execute();

                    // fetch row for setting session 
                    // $row = $stmt->fetch();
                    // $firstName = $row["FirstName"];
                    // $middleName = $row["MiddleName"];
                    // $lastName = $row["LastName"];
                    // $dateOfBirth = $row["DOB"];
                    // $houseNumber = $row["Housenum"];
                    // $email = $row["email"];
                    // $phoneNumber = $row["phoneNumber"];
                    // $profile_photo = $row["Photo"];

                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["FirstName"] = $firstName;
                    $_SESSION["MiddleName"] = $middleName;
                    $_SESSION["LastName"] = $lastName;
                    $_SESSION["DOB"] = $dateOfBirth;
                    $_SESSION["Housenum"] = $houseNumber;
                    $_SESSION["email"] = $email;
                    $_SESSION["phoneNumber"] = $phoneNumber;
                    $_SESSION["userName"] = $userName;
                    //$_SESSION["profile_photo"] =  $_SESSION["profile_photo"];

                    // Redirect user to welcome page
                    header("location: user/userDashboard.php");
                }
            } else {
                $username_err = "User Name already taken";
            }
        }
    } else {
        // Display an error message if username doesn't exist
        $username_err = "<strong style='color:red'>Sorry your file is not the household you can't creat an account</strong>";
    }


    // Close statement
    unset($stmt);
    unset($stmt2);
    unset($stmt3);
}


// Close connection
unset($pdo);

?>



<?php include 'header.php'; ?>
<title>Signup Page</title>
<style>
    body {
        background-color: #C4E8F1;
    }

    .btn {
        width: 20vw;
        height: 3vw;
        color: white;
        background-color: #090A4E;
        font-size: 1vw;
    }

    .v-center {
        margin-top: 5vw;
    }

    img {
        width: 500px;

    }

    input[type=tel],
    input[type=password],
    input[type=text],
    input[type=number],
    input[type=date],
    input[type=email] {
        width: 30vw;
        height: 3.5vw;
        background-color: #C4E8F1;
        border-color: #662D8D;
        border-radius: 12px;
        color: black;
        padding: 10px;
        margin-bottom: 10px;
        font-size: 1.5vw;
    }

    /* #profile{
        width: 30vw;
        height: 3.5vw;
        background-color: #C4E8F1;
        border-color: #662D8D;
        border-radius: 12px;
        color: black;
        padding: 10px;
        margin-bottom: 10px;
        font-size: 1.5vw;
    } */
</style>



</head>

<body>
    <div class="container">

        <div class="row ">
            <div class="col v-center">


                <div class=" m-5 text-center">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">

                        <h1 class="mb-4">SIGN UP </h1>

                        <div class="form-floating form-group mb-3">
                            <input type="text" name="userName" placeholder="User Name" required>
                        </div>
                        <div style="color:red" class="mt-3">
                            <?php
                            echo $duplicate_account;
                            echo $username_err;

                            ?>
                        </div>

                        <div class="form-floating form-group mb-3">
                            <input type="text" name="firstName" placeholder="First Name" required>
                        </div>
                        <div class="form-floating form-group mb-3">
                            <input type="text" name="middleName" placeholder="Father Name" required>
                        </div>
                        <div class="form-floating form-group mb-3">
                            <input type="text" name="lastName" placeholder="Grand Father Name" required>
                        </div>
                        <div class="form-floating form-group mb-3">
                            <input type="number" name="houseNumber" min="1" placeholder="House Number" required>
                        </div>
                        <div class="form-floating form-group mb-3">
                            <input type="date" name="dateOfBirth" max="<?php echo $currentDate ?>" id="dateOfBirth" placeholder="Date of Birth" required>
                        </div>

                        <div class="form-floating form-group mb-3">
                            <input type="tel" name="phoneNumber" placeholder="Phone Number" pattern="[0-9]{10}">
                        </div>
                        <div class="form-floating form-group mb-3">
                            <input type="email" name="email" placeholder="Email Address ">
                        </div>

                        <div class="form-floating form-group mb-3">
                            <input type="password" name="password" placeholder="Password" required>
                        </div>

                        <div class=" input-group-lg ">
                            <label for="profile"> Profile Picture</label>
                            <input type="file" name="profile_pic" id="profile" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style" required>
                            <small class="form-text text-muted">Supported type (.jpeg .png .jpg)</small>
                        </div>


                        <div class="form-floating form-group mt-5">
                            <input class="btn" type="submit" name="submit" value="SIGN UP">

                        </div>





                    </form>

                </div>
            </div>




            <?php include 'rightSideArt.php'; ?>

        </div>
    </div>
</body>

</html>