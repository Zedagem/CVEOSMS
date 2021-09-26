<?php

include "../../dbconnection.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$sql = "SELECT * FROM household where houseNumber ='$id'";
$stmt = $pdo->prepare($sql);
$stmt->execute();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>View Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
    <style>
        ul {
            text-decoration: none;
            list-style: none;
        }
        span{
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Household table </h1>
    <Table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">H.No</th>
      <th scope="col">Member Type</th>
      <th scope="col">Full Name</th>
      <th scope="col">Full Name(Amharic)</th>
      <th scope="col">Gender </th>
      <th scope="col">Date of Birth(G.C) </th>
      <th scope="col">Date of Birth(E.C) </th>
      <th scope="col">Email </th>
      <th scope="col">Phone Number </th>
      <th scope="col">FatherLastName </th>
      <th scope="col">Mother Name </th>
      <th scope="col">Mother Last Name </th>
      <th scope="col">Photo </th>
      <th scope="col">Tittle Cert </th>

      
    </tr>
  </thead>
<?php  
if($stmt->rowCount() >0){
   while($row = $stmt->fetch()){?>


  <tbody>
    <tr>
      <th> <?php echo $row['houseNumber'] ?></th>
      <td><?php echo $row['memberType'] ?></td>
      <td><?php echo $row["fname"]." ".$row["mname"]." ".$row["lname"]?></td>
      <td><?php echo $row["fnameA"]." ".$row["mnameA"]." ".$row["lnameA"]?></td>
      <td><?php echo $row['sex'] ?></td>
      <td><?php echo $row['dobGC'] ?></td>
      <td><?php echo $row['dobEC'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['phoneNumber'] ?></td>
      <td><?php echo $row['fatherLastName'] ?></td>
      <td><?php echo $row['motherName'] ?></td>
      <td><?php echo $row['motherLastName'] ?></td>
      <td> <a target="_blank" href="<?php echo 'http://localhost/' . $row['photo'] ?>">View</a></td>
      <td> <?php
      if($row['titleCert']== " ")
      {
        echo "---";
      }
      else{?>
        <a target="_blank" href="<?php echo 'http://localhost/' . $row['titleCert'] ?>">
        View</a></td>
      <?php } ?>

      
    </tr>
   
  </tbody>
  
   <?php }
}
   ?>
   </Table>



</body>

</html>