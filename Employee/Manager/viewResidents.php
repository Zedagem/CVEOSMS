<?php
//Initialize the session
session_start();

$id=trim($_SESSION["EmployeeID"]);
$cut = substr($id, 0, -6);



// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true  || strcmp($cut,'man') != 0) {
  
    header("location: http://localhost:8080/Employee/login.php");
    exit;

}
?>
<?php
include '../../header.php'; 
require_once "../../dbconnection.php";?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">

<title>View Residents </title>
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

<body>
    <?php include 'managerTemplet.php' ?>
    <h2 class="mt-5 text-center">Search View of Residents </h2>

    <div class="container-fluid">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="row g-3 mt-5">


            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="search" placeholder="House Number" class="form-control input-style">
            </div>

            <div class="col-lg-2 col-md-2 col-sm-4 input-group-lg">
                <input type="submit" value="Search" name="submit" class="form-control btn btn-primary ">
            </div>
        </form>
 <h2 class="mt-5 text-center">Resident info </h2>
 <table class="table mt-5 ">
<thead class="thead-dark">
 <tr>
     <th scope="col">ID</th>
     <th scope="col">Member Type</th>
     <th scope="col">Full Name</th>
     <th scope="col">Phone</th>
     <th scope="col">Email</th>
     <th scope="col">Gender</th>
     <th scope="col">Date of Birth(GC)</th>
     <th scope="col">More Informaiton</th>
     
     
 </tr>
</thead>
<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $search= trim($_POST["search"]);
    // $del=$search;

  
   // $delete_exec= trim($_POST["delete"]);
    
    if(isset($_POST["submit"])) {
 // Prepare a select statement
 
require_once "../../dbconnection.php";
   $sql = "SELECT * FROM household where houseNumber='$search' ";
 $stmt = $pdo->query($sql);
 $stmt = $pdo->prepare($sql);
 $stmt->execute();
  
if($stmt->rowCount() >0){
   while($row = $stmt->fetch()){?>
 
     <tr>
     <td> <?php echo $row["id"]?> </td>
     <td> <?php echo $row["memberType"]?> </td>
     <td> <?php echo $row["fname"]." ".$row["mname"]." ".$row["lname"]?> </td>
     <td> <?php echo $row["phoneNumber"]?> </td>
     <td> <?php echo $row["email"]?> </td>
     <td> <?php echo $row["sex"]?> </td>
     <td> <?php echo $row["dobGC"]?> </td>
     <td> <a target="_blank" href="viewFullInfo.php?id=<?php echo $row['houseNumber']; ?>">View</a>
    
  
    </tr>
  
   <?php }
 }
}
}
?>




    </div>



    </div>
</body>

</html>
