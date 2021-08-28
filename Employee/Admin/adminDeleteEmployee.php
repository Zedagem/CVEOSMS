<?php
 // Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}

?>
       <?php  
    require_once "../../dbconnection.php";

// Define variables and initialize with empty values
$search= $id=$delete_exec=$delexec=$phoneNumber= $firstName=$middleName=$lastName=$houseNumber=$dateOfBirth="";
$iderror = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $search= trim($_POST["search"]);
    // $del=$search;
    
    echo <<< EOF
    <script> alert('$search') </script>;
EOF;
   // $delete_exec= trim($_POST["delete"]);
    
  // if(isset($_POST["search"])) {
            // Prepare a select statement
            $sql = "SELECT * FROM employee WHERE EmployeeID = '$search'";

            if($stmt = $pdo->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                // $stmt->bindParam(":employeeID", $search, PDO::PARAM_STR);
                
                // Attempt to execute the prepared statement
                $stmt->execute();

                if($stmt->rowCount() == 1){
                            $row = $stmt->fetch();
                            $id = $row["EmployeeID"];
                            $firstName = $row["FirstName"];
                            $middleName = $row["MiddleName"];
                            $lastName = $row["LastName"];
                            $dateOfBirth = $row["DOB"];
                            $houseNumber = $row["HouseNumber"];
            
                }
            else{
                    $iderror = "<strong style='color:red'> ID error ! </strong>";
                    }
        }else{
            echo "error in input";
        }


    //}

                if(isset($_POST["delete"])) {
                    echo "<script> alert('$id'.'this is my')</script>";
                    // $del=$_SESSION['del'] ;
                    // Prepare a select statement
                    
                
            // $stmt2->$pdo->prepare($sql2);
            // $delexec =$stmt2->execute (array(":employeeid"=>$del));
                    try {
                        $sql2 = "DELETE FROM employee WHERE EmployeeID='$id'";
                        if($stmt = $pdo->prepare($sql2)){
                        // use exec() because no results are returned
                        $stmt->execute();
                        
                        echo "<script>alert(the employee has been deleted) </script>";
                   }
                 } catch(PDOException $e) {
                        echo "<script>alert(the employee has not been deleted) </script>";
                        echo $sql2 . "<br>" . $e->getMessage();
                    }
        
}
$pdo = null;
}  
  
  $pdo = null;
//   unset( $_SESSION['delete']);
    
?>
<?php include '../../header.php' ?> 

<link rel="stylesheet" type="text/css" href="../../css/style.css">

<title>Delete Employee </title>

</head>

<body>
    <?php include 'adminTemplet.php' ?>
    <h2 class="mt-5 text-center">Delete Employee Account </h2>

    <div class="container-fluid">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="row g-3 mt-5">


            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="search" placeholder="Employee ID " class="form-control input-style">
            </div>

            <div class="col-lg-2 col-md-2 col-sm-4 input-group-lg">
                <input type="submit" value="Search" name="submit" class="form-control btn btn-primary ">
</div>
<!--

// } catch(PDOException $e) {
// echo $sql . "<br>" . $e->getMessage();
// }
// if($stmt2 = $pdo->prepare($sql2)){
//                 //     // Bind variables to the prepared statement as parameters
//                 //  $stmt2->bindParam(":employeeID", $del, PDO::PARAM_STR);
//                 //     // Attempt to execute the prepared statement
//                  $stmt2->execute();
//                   }
        // else{
        // echo "its not working";
        // }
   }
}
// Close statement
unset($stmt);
// Close connection
unset($pdo);
    
-->

            <table class="table mt-5 ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">FirstName</th>
                        <th scope="col">MiddleName</th>
                        <th scope="col">LastName</th>
                        <th scope="col">HouseNumber</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      
                        <td><?php echo $firstName;?></td>
                        <td><?php echo $middleName;?></td>
                        <td><?php echo $lastName;?></td>
                        <td><?php echo $houseNumber;?></td>
                    </tr>

                </tbody>

            </table>
            <div class="col-lg-2 col-md-2 col-sm-4 input-group-lg">
                <input type="submit" value="Delete" name="delete" class="form-control btn btn-primary ">
            </div>



        </form>




    </div>



    </div>
</body>

</html>