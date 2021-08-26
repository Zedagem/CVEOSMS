<?php
try {
		require_once "../../dbconnection.php";
        $sql="SELECT * From birthrequest  WHERE readEmp = false ";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
?>
<?php include '../../header.php' ?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">

<title>Request Page</title>

</head>

<body>
    <?php include 'clerkTemplet.php' ?>
    <h2 class="mt-5 text-center">Clerk Request Page </h2>
    <div class="container-fluid">
    <table class="table mt-5 ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Requester Name</th>
                        <th scope="col">Request Type</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">Hospital Certificate</th>
                        <th scope="col">Vaccine Card</th>
                        <th scope="col">Child Photo</th>
                        <th scope="col">Mother ID</th>
                        <th scope="col">Father ID</th>
                        <th scope="col"></th>
                        <th scope="col"> </th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row=$stmt->fetch()){
                  
                        echo" <tr>";
                                    
                            echo"<td>".$row['firstName']."</td>";
                            echo "<td>".$row['Rtype'] ."</td>";
                            echo"<td>".$row['appliedDate']."</td>";
                            echo"<td>".$row['hospitalBirthCert']."</td>";
                            echo "<td>".$row['yellowCard'] ."</td>";
                            echo"<td>".$row['childPhoto']."</td>";
                            echo "<td>".$row['motherId'] ."</td>";
                            echo"<td>".$row['fatherId']."</td>";
                            echo" <td><button class='form-control btn btn-primary'>Send</button></td>";
                            echo" <td><button class='form-control btn btn-primary'>Decline</button></td>";

                                    
                        echo"</tr>";
                     
                    }
                  
                    ?>

                </tbody>

            </table>
       
     




    </div>



    </div>
</body>

</html>