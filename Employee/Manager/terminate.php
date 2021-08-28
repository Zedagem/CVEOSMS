<?php 
 // Initialize the session
 session_start();
 
 // Check if the user is logged in, if not then redirect him to login page
 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
     header("location: login.php");
     exit;
 }
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
    tr:nth-child(even) {background-color: #f2f2f2}
    </style>

</head>
</head>


<body>
  

    <?php include 'managerTemplet.php' ?>
  
    <h2 class="mt-5 text-center">Terminate Resident Account </h2>

    <div class="container-fluid">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="row g-3 mt-5">


            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="firstName" placeholder="First Name " class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="middleName" placeholder="Middle Name " class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="lastName" placeholder="Last Name " class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="houseNumber" placeholder="House Number " class="form-control input-style">
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
     <th scope="col">Full name(In amharic)</th>
     <th scope="col">Phone</th>
     <th scope="col">Email</th>
     <th scope="col">Gender</th>
     <th scope="col">Date of Birth</th>
         
 </tr>
      </thead>
      <?php
    
    require_once "../../dbconnection.php";

    // Define variables and initialize with empty values
    $search= $del=$phoneNumber= $firstName=$middleName=$lastName=$houseNumber=$dateOfBirth="";
    $iderror = "<strong style='color:red'> ID error ! </strong>";
        
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            $fn= trim($_POST['firstName']);
            $ln= trim($_POST['lastName']);
            $house= trim($_POST['houseNumber']);

        
        if(isset($_POST["submit"])) {
     // Prepare a select statement
     $sql = "SELECT * FROM resident WHERE housenum = '$house' AND FirstName='$fn' AND LastName='$ln'"; 
       
         $stmt = $pdo->prepare($sql);
      
         $stmt->execute();
    
                    if($stmt->rowCount() == 1){
                                $row = $stmt->fetch();
    
                                echo "<tr>";
                                echo "<td>".$row["Housenum"]."</td>";
                                echo "<td>".$row["FirstName"]." "  .$row["MiddleName"]." ".$row["LastName"]."</td>";
                                echo "<td>".$row["FNamharic"]." ".$row["MNamharic"]." ".$row["LNamharic"]."</td>";
                                echo "<td>".$row["Phone"]."</td>";
                                echo "<td>".$row["email"]."</td>";
                                echo "<td>".$row["sex"]."</td>";               
                                echo "<td>".$row["DOB"]."</td>";
                    }
                else{
                        echo '$iderror';
                    }
      
    
                    if(isset($_POST["delete"])) {
                        // $del=$_SESSION['del'] ;
                        // Prepare a select statement
                      
                    
                // $stmt2->$pdo->prepare($sql2);
                // $delexec =$stmt2->execute (array(":employeeid"=>$del));
                        try {
                            $sql2 = "DELETE FROM employee WHERE EmployeeID='$search'";
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
}
    
    
    ?>
</table>


    </div>



    </div>
</body>

</html>