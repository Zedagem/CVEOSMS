<?php
// Initialize the session
session_start();



// Include dbconnection file
require_once "dbconnection.php";

// Define variables and initialize with empty values
$phoneNumber = $password = $hash_password = $houseNumber = $dateOfBirth = $firstName = $middleName = $lastName = $email=$photo = "";
$username_err = $duplicate_account="";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $phoneNumber = strtoupper(trim($_POST["phoneNumber"]));
    $hash_password = password_hash(trim($_POST["password"]),PASSWORD_DEFAULT );
    $houseNumber = strtoupper(trim($_POST["houseNumber"]));
    $dateOfBirth = strtoupper(trim($_POST["dateOfBirth"]));
    $firstName = strtoupper(trim($_POST["firstName"]));
    $middleName = strtoupper(trim($_POST["middleName"]));
    $lastName = strtoupper(trim($_POST["lastName"]));
    $email = trim($_POST["email"]);
    $profile_photo = "";
  //  $hash_password = password_hash($password, PASSWORD_DEFAULT);

    

    // Prepare a select statement
    $sql = "SELECT fname, mname,lname,dobGC,houseNumber 
        FROM household 
        WHERE fname = :firstName AND mname = :middleName AND lname = :lastName AND dobGC = :dateOfBirth AND houseNumber = :houseNumber";

            $stmt = $pdo->prepare($sql);
                // Bind variables to the prepared statement as parameters
                $stmt->bindParam(":firstName", $firstName, PDO::PARAM_STR);
                $stmt->bindParam(":middleName", $middleName, PDO::PARAM_STR);
                $stmt->bindParam(":lastName", $lastName, PDO::PARAM_STR);
                $stmt->bindParam(":dateOfBirth", $dateOfBirth, PDO::PARAM_STR);
                $stmt->bindParam(":houseNumber", $houseNumber, PDO::PARAM_INT);

                

                // Attempt to execute the prepared statement
                $stmt->execute();
                    // Check if that user is in the household information table
                    if ($stmt->rowCount() == 1) {

                        $sql3 = "SELECT FirstName, MiddleName,LastName,DOB,Housenum 
                        FROM resident 
                        WHERE FirstName = :firstName AND MiddleName = :middleName AND LastName = :lastName AND DOB = :dateOfBirth AND Housenum = :houseNumber";
                    
                        $stmt3 =$pdo->prepare($sql3);
                        // binidng paramater
                            $stmt3->bindParam(":firstName", $firstName, PDO::PARAM_STR);
                            $stmt3->bindParam(":middleName", $middleName, PDO::PARAM_STR);
                            $stmt3->bindParam(":lastName", $lastName, PDO::PARAM_STR);
                            $stmt3->bindParam(":dateOfBirth", $dateOfBirth, PDO::PARAM_STR);
                            $stmt3->bindParam(":houseNumber", $houseNumber, PDO::PARAM_INT);

                            //execute
                            $stmt3->execute();
                    

                            if($stmt3->rowCount() == 1){
                                $duplicate_account= "<p> You already have an account <a href='loginPage.php'> LogIn here </a> <p> ";
                                }

                                else{

                                //Inset into resident table for sign up

                                $sql2 = "INSERT INTO resident (Phone, Housenum,DOB,password,FirstName,MiddleName,LastName,email, Photo) 
                                values (:phoneNumber,:houseNumber,:dateOfBirth,:secretKey,:firstName,:middleName,:lastName,:email,:profile_photo);";
                            
                                // Prepare stmt2
                                $stmt2 = $pdo->prepare($sql2);

                                // Bind variables to the prepared statement as parameters

                                $stmt2->bindParam(":firstName", $firstName, PDO::PARAM_STR);
                                $stmt2->bindParam(":middleName", $middleName, PDO::PARAM_STR);
                                $stmt2->bindParam(":lastName", $lastName, PDO::PARAM_STR);
                                $stmt2->bindParam(":dateOfBirth", $dateOfBirth, PDO::PARAM_STR);
                                $stmt2->bindParam(":houseNumber", $houseNumber, PDO::PARAM_INT);
                                $stmt2->bindParam(":secretKey", $hash_password, PDO::PARAM_STR);
                                $stmt2->bindParam(":phoneNumber", $phoneNumber, PDO::PARAM_INT);
                                $stmt2->bindParam(":email", $email, PDO::PARAM_STR);
                                $stmt2->bindParam(":profile_photo", $profile_photo, PDO::PARAM_STR);
                
                                    //execute stmt2
                                    $stmt2->execute();
                                    
                                    // fetch row for setting session 
                                    $row = $stmt->fetch();
                                        $firstName = $row["FirstName"];
                                        $middleName = $row["MiddleName"];
                                        $lastName = $row["LastName"];
                                        $dateOfBirth = $row["DOB"];
                                        $houseNumber = $row["Housenum"];
                                        $email =$row["email"];
                                        $phoneNumber=$row["phoneNumber"];
                                        $profile_photo=$row["Photo"];
                                        session_start();
            
                                        // Store data in session variables
                                        $_SESSION["loggedin"] = true;
                                        $_SESSION["FirstName"] = $firstName;
                                        $_SESSION["MiddleName"] = $middleName;
                                        $_SESSION["LastName"] = $lastName;
                                        $_SESSION["DOB"] = $dateOfBirth;
                                        $_SESSION["Housenum"] = $houseNumber;
                                        $_SESSION["email"] = $email;
                                        $_SESSION["phoneNumebr"]=$phoneNumber;
                                        $_SESSION["profile_photo"]=$profile_photo;
            
                                        // Redirect user to welcome page
                                        header("location: user/userDashboard.php");
                                
                            

                        }

                        
                    } else {
                        // Display an error message if username doesn't exist
                        $username_err= "<strong style='color:red'>Sorry your file is not the household you can't creat an account</strong>";
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
</style>



</head>

<body>
    <div class="container">

        <div class="row ">
            <div class="col v-center">


                <div class=" m-5 text-center">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                        <h1 class="mb-4">SIGN UP </h1>

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
                            <input type="number" name="houseNumber" placeholder="House Number" required>
                        </div>
                        <div class="form-floating form-group mb-3">
                            <input type="date" name="dateOfBirth" id="dateOfBirth" placeholder="Date of Birth" required>
                        </div>

                        <div class="form-floating form-group mb-3">
                            <input type="tel" name="phoneNumber" placeholder="Phone Number" pattern="[0-9]{10}" required>
                        </div>
                        <div class="form-floating form-group mb-3">
                            <input type="email" name="email" placeholder="Email Address " required>
                        </div>

                        <div class="form-floating form-group mb-3">
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-floating form-group mb-3">
                            <label for="profile">Profile Picture</label>
                            <input type="file" name="profile_pic" id="profile" >
                        </div>


                        <div class="form-floating form-group">
                            <input class="btn" type="submit" name="submit" value="SIGN UP">

                        </div>
                      
                        <div class="mt-3">
                            <?php 
                            echo $duplicate_account;
                            echo $username_err;
                            
                            ?>
                        </div>

                      



                    </form>

                </div>
            </div>




            <?php include 'rightSideArt.php'; ?>

        </div>
    </div>
</body>

</html>