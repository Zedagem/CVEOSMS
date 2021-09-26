<?php
//Initialize the session
session_start();

$id=trim($_SESSION["EmployeeID"]);
$cut = substr($id, 0, -6);



// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true  || strcmp($cut,'adm') != 0) {
  
    header("location: http://localhost/Employee/login.php");
    exit;

}
?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">

<title>List of Employees </title>

</head>
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

<body>
    <?php include 'adminTemplet.php' ?>
    <h2 class="mt-5 text-center">List of Employees </h2>
    <table class="table mt-5 ">
   <thead class="thead-dark">
    <tr>
        <th scope="col">Employee ID</th>
        <th scope="col">Employee Type</th>
        <th scope="col">FirstName</th>
        <th scope="col">MiddleName</th>
        <th scope="col">LastName</th>
        <th scope="col">Gender</th>
        <th scope="col">Date of Birth</th>
        <th scope="col">Email</th>
    </tr>
</thead>
  <?php
   require_once "../../dbconnection.php";
      $sql = "SELECT * FROM employee";
    $stmt = $pdo->query($sql);
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
     
if($stmt->rowCount() >0){
      while($row = $stmt->fetch()){
    
        echo "<tr>";
        echo "<td>".$row["EmployeeID"]."</td>";
        echo "<td>".$row["EmployeeType"]."</td>";
        echo "<td>".$row["FirstName"]."</td>";
        echo "<td>".$row["MiddleName"]."</td>";
        echo "<td>".$row["LastName"]."</td>";
        echo "<td>".$row["sex"]."</td>";                     
        echo "<td>".$row["DOB"]."</td>";
        echo "<td>".$row["Email"]."</td>";
        echo "</tr>";
     
      }
    }
?>


 </div>
</body>

</html>