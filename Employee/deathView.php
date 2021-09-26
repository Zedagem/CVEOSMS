<?php

require_once "../dbconnection.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string



$sql = "SELECT * FROM deathrequest where id ='$id'";

// $sql2 = "SELECT * FROM marriagerequest where id ='$id'";
// $sql3 = "SELECT * FROM divorcerequest where id ='$id'";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$row = $stmt->fetch();

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

    <div class="container-fluid">
        <div class="row mt-5" >
            <div class="col-lg-4">
                <h1>Deceased Information</h1>
                <ul>
                    <li>Id number<span><?php echo " ".$row['DIDnum'] ?></span> </li>
                    <li>First Name <span><?php echo " ".$row['deceasedFirstname'] ?></span> </li>
                    <li>Middle Name <span><?php echo " ".$row['deceasedMiddlename'] ?></span>  </li>
                    <li>Last Name <span><?php echo " ".$row['deceasedlastname'] ?></span> </li>
                    <li>First Name(Amharic) <span><?php echo" ". $row['deceasedFNamharic'] ?></span> </li>
                    <li>Middle Name(Amharic) <span><?php echo " ".$row['deceasedMNamharic'] ?></span> </li>
                    <li>Last Name(Amharic) <span><?php echo " ".$row['deceasedLNamharic'] ?></span> </li>
                    <li>Sex<span><?php echo " ".$row['sex'] ?></span> </li>
                    <li>Date of Birth G.C<span><?php echo" ". $row['DOBgc'] ?></span> </li>
                    <li>Date of Birth E.C<span><?php echo " ".$row['DOBec'] ?></span> </li>
                    <pre>

    </pre>
                    
                    
                    <h4>Place of Birth</h4>
                    <li>Region<span><?php echo" ". $row['DPORregion'] ?></span> </li>
                    <li>Zone<span><?php echo" ". $row['DPORzone'] ?></span> </li>
                    <li>City<span><?php echo " ".$row['DPORcity'] ?></span> </li>
                    <li>Woreda<span><?php echo" ". $row['DPORworeda'] ?></span> </li>
                    <li>Occupation<span><?php echo " ".$row['Doccupation'] ?></span> </li>
                    <li>Educational Status<span><?php echo " ".$row['Educationalstatus'] ?></span> </li>
                    <li>Marital Status<span><?php echo " ".$row['maritalStatus'] ?></span> </li>
                    <li>Nationality<span><?php echo " ".$row['Nationality'] ?></span> </li>
                    <li>Religion<span><?php echo " ".$row['religion'] ?></span> </li>
                   
                         

                    

                </ul>


            </div>

        


            <div class="col-lg-4">
                <h1>Information Regarding The Death</h1>
                <ul>
                    <li>Date of death G.C<span><?php echo" ". $row['dateofdeath'] ?></span> </li>
                    <li>Date of Birth E.C<span><?php echo " ".$row['dodec'] ?></span> </li>
                    <li>Cause of death<span><?php echo " ".$row['cause'] ?></span> </li>                    
                    <li>Proof Of Cause<span><?php echo" ". $row['ProofOfCause'] ?></span> </li>
                    <!-- <li>Certifier<span><?php //echo $row['certifier'] ?></span> </li> -->
                    <li>Place of Burial<span><?php echo " ".$row['placeofburial'] ?></span> </li>
                    
                    <li>Place of Burial<span><?php echo " ".$row['placeofburial'] ?></span> </li>
                    


                </ul>


            </div>
           

            </div>
        </div>
<!-- 
        <div class="col-lg-4">
                <h1>Requestor Information</h1>
                <ul>
                    <li>First Name <span><?php  //echo $row['FfirstName'] ?></span></li>
                    <li>Middle Name <span><?php // echo $row['FfatherName'] ?></span></li>
                    <li>Last Name <span><?php // echo $row['FgrandFatherName'] ?></span></li>
                    <li>Region <span><?php // echo $row['FPOBregion'] ?></span></li>
                    <li>Zone <span><?php //echo $row['FPOBzone'] ?></span></li>
                    <li>City <span><?php // echo $row['FPOBcity'] ?></span></li>
                    <li>Woreda <span><?php // echo $row['FPOBworeda'] ?></span></li>

                </ul>


            </div> -->
   
   
   
   
        </div>



</body>

</html>