<?php session_start();
include '../header.php';
require_once "../dbconnection.php";


// Define variables and initialize with empty values
$id = $phoneNumber = $password = $email = $hash_password = $firstName = $middleName = $lastName = $houseNumber = $dateOfBirth = $cut = "";
$username_err = $error = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = trim($_POST["idNumber"]);
    $password = trim($_POST["password"]);
    // Prepare a select statement
    $sql = "SELECT * FROM employee WHERE EmployeeID = :employeeID";

    if ($stmt = $pdo->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":employeeID", $id, PDO::PARAM_STR);

        // Attempt to execute the prepared statement
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            $hash_password = $row['Pword'];

            if (password_verify($password, $hash_password)) {
                $iddisplay = $row["EmployeeID"];
                $firstName = $row["FirstName"];
                $middleName = $row["MiddleName"];
                $lastName = $row["LastName"];
                $dateOfBirth = $row["DOB"];
                $houseNumber = $row["HouseNumber"];
                $email = $row["Email"];
                //  $hash_password=$row["Pword"];

                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["EmployeeID"] = $iddisplay;
                $_SESSION["firstName"] = $firstName;
                $_SESSION["middleName"] = $middleName;
                $_SESSION["lastName"] = $lastName;
                $_SESSION["dateOfBirth"] = $dateOfBirth;
                $_SESSION["houseNumber"] = $houseNumber;
                $_SESSION["phoneNumber"] = $phoneNumber;
                $_SESSION["email"] = $email;
                //  $_SESSION["password"]=$hash_password;

                $cut = substr($id, 0, -6);
                if ($cut == "adm") {
                    header("location: http://localhost:8080:8080/Employee/Admin/adminAddEmployee.php");
                } elseif ($cut == "cas") {
                    header("location: http://localhost:8080/Employee/Cashier/pendingPayment.php");
                } elseif ($cut == "cle") {
                    header("location: http://localhost:8080/Employee/Clerk/request.php");
                } elseif ($cut == "man") {
                    header("location: http://localhost:8080/Employee/Manager/signOff.php");
                }
            } else {
                $username_err = "<strong style='color:red'> ID or Password error ! </strong>";
            }
        } else {
            $error = "<strong style='color:red'> No ID found </strong>";
        }
        
    }



    // Close statement
    unset($stmt);
    // Close connection
    unset($pdo);
}

?>
<title>Login Page</title>
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

    input[type=text],
    input[type=password] {
        width: 30vw;
        height: 3.5vw;
        background-color: #C4E8F1;
        border-color: #662D8D;
        border-radius: 12px;
        color: black;
        padding: 10px;
        margin-bottom: 10px;
        font-size: 1.5vw;
        box-sizing: border-box;
    }
</style>



</head>

<body>
    <div class="container">

        <div class="row ">
            <div class="col v-center">


                <div class="form-signin m-5 text-center">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                        <h1 class="mb-4">SIGN IN </h1>

                        <div class="form-floating mb-3">
                            <input type="text" name="idNumber" placeholder="ID Number" required>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <?php echo $username_err; echo $error;?>
                        <div>
                            <input class="btn" type="submit" name="submit" value="SIGN IN">

                        </div>






                    </form>

                </div>
            </div>


            <div class="col v-center">
                <div class="row">

                    <div class="position-absolute m-5">
                        <img class="overlay" src="../img/LandingArts@2x.png" alt="LandingArts ">
                    </div>

                    <div class="text-center ">
                        <img src="../img/ethiopia.svg" alt="ethiopia">
                    </div>

                </div>
            </div>



        </div>
    </div>
</body>

</html>