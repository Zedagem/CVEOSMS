<?php
//Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
?>
<?php
$report = "report";
try {
    require_once "../../dbconnection.php";
    $sql = "SELECT * From $report"; 
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<?php include '../../header.php' ?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">

<title>Report Page </title>

</head>

<body>
    <?php include 'cashierTemplet.php' ?>
    <h2 class="mt-5 text-center">List of All Reports </h2>

    <div class="container-fluid">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Full Name</th>
      <th scope="col">Request Type</th>
      <th scope="col">Payed Date</th>
      
    </tr>
  </thead>
  <?php
            while ($row = $stmt->fetch()) {
            ?>

  <tbody>
    <tr>
      <th><?php echo $row['fname'] ." ". $row['mname']." ". $row['lname']?></th>
      <td><?php echo $row['requestType'] ?></td>
      <td><?php echo $row['payedDate'] ?></td>
    </tr>
    
  </tbody>
            <?php } ?>
</table>

    </div>



    </div>
</body>

</html>