<?php
//Initialize the session
session_start();

$id = trim($_SESSION["EmployeeID"]);
$cut = substr($id, 0, -6);



// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true  || strcmp($cut, 'man') != 0) {

    header("location: http://localhost/Employee/login.php");
    exit;
}
?>
include '../../header.php' ?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">

<title>Terminate Residents </title>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        color: #588c7e;
        font-family: monospace;
        font-size: 25px;
        text-align: left;
    }

    th {
        background-color: #55A9BE;
        color: black;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2
    }
</style>

</head>
</head>


<body>


    <?php include 'managerTemplet.php' ?>

    <h2 class="mt-5 text-center">Terminate Resident Account </h2>

    <div class="container-fluid">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="row g-3 mt-5">

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="houseNumber" placeholder="House Number " class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="phoneNumber" value="<?php isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?>" placeholder="Phone Number (9xx-xxx-xxx) " class="form-control input-style" required>
            </div>

            <div class="col-lg-2 col-md-2 col-sm-4 input-group-lg">
                <input type="submit" value="Search" name="submit" class="form-control btn btn-primary ">
            </div>

            <div class="col-lg-2 col-md-2 col-sm-4 input-group-lg">
                <input type="submit" value="Delete" name="delete" class="form-control btn btn-primary ">
            </div>



        </form>
        <table class="table mt-5 ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">House Number</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date of Birth</th>

                </tr>
            </thead>
            <?php

            require_once "../../dbconnection.php";

            // Define variables and initialize with empty values
            $search = $phone = $phoneNumber = $firstName = $middleName = $lastName = $houseNumber = $dateOfBirth = "";

            // Processing form data when form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $house = trim($_POST['houseNumber']);
                $phoneNumber = trim($_POST['phoneNumber']);
                $phoneNumber = $phoneNumber * 1;
                $_SESSION['phone'] = $phoneNumber;

                //if(isset($_POST["submit"])) {
                // Prepare a select statement
                $sql = "SELECT * FROM resident WHERE housenum = '$house' AND Phone='$phoneNumber'";

                $stmt = $pdo->prepare($sql);

                $stmt->execute();

                if ($stmt->rowCount() == 1) {
                    $row = $stmt->fetch();
                    $phone = $row["Phone"];


                    echo "<tr>";
                    echo "<td>" . $row["Housenum"] . "</td>";
                    echo "<td>" . $row["FirstName"] . " "  . $row["MiddleName"] . " " . $row["LastName"] . "</td>";
                    echo "<td> 0" . $row["Phone"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    // echo "<td>".$row["sex"]."</td>";               
                    echo "<td>" . $row["DOB"] . "</td>";
                } else {
                    echo '<script>alert(The information is wrong. please input the right information!) </script>';
                }
                //      }
                if (isset($_POST["delete"])) {
                    // $del=$_SESSION['del'] ;
                    // Prepare a select statement


                    // $stmt2->$pdo->prepare($sql2);
                    // $delexec =$stmt2->execute (array(":employeeid"=>$del));
                    try {
                        $sql2 = "DELETE FROM resident WHERE Phone='$phone'";
                        if ($stmt = $pdo->prepare($sql2)) {
                            // use exec() because no results are returned
                            $stmt->execute();

                            echo "<script>alert(the resident has been deleted) </script>";
                        }
                    } catch (PDOException $e) {
                        echo "<script>alert(the resident has not been deleted) </script>";
                        echo $sql2 . "<br>" . $e->getMessage();
                    }
                }
                $pdo = null;


                $pdo = null;
                //   unset( $_SESSION['delete']);
            }


            ?>
        </table>


    </div>



    </div>
</body>

</html>