<?php

require_once "../dbconnection.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string



$sql = "SELECT * FROM marriagerequest where id ='$id'";

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
                <h1>Wife Information</h1>
                <ul>
                    <li>First Name <span><?php echo" ". $row['wifeFirstname'] ?></span> </li>
                    <li>Middle Name <span><?php echo" ". $row['WifeMiddlename'] ?></span></li>
                    <li>Last Name <span><?php echo" ". $row['wifelastname'] ?></span></li>
                    <li>First Name(Amharic) <span><?php echo" ". $row['wifeFNamharic'] ?></span></li>
                    <li>Middle Name(Amharic) <span><?php echo" ". $row['wifeMNamharic'] ?></span></li>
                    <li>Last Name<(Amharic)  <span><?php echo " ".$row['wifeLNamharic'] ?></span></li>
                    <li>Date of Birth G.C <span><?php echo" ". $row['DOBwifeGC'] ?></span></li>
                    <li>Date of Birth E.c <span><?php echo" ". $row['DOBwifeEC'] ?></span></li>
                    <li>Occupation Type <span><?php echo" ". $row['occupationalstatuswife'] ?></span></li>
                    <li>Educational Status <span><?php echo" ". $row['educationalstatuswife'] ?></span></li>
                    <li>Religion <span><?php echo" ". $row['ReligionWife'] ?></span></li>
                    <li>Nationality <span><?php echo" ". $row['Wnationality'] ?></span></li>
                    <li>Premarial Status <span><?php echo" ". $row['premaritalstatuswife'] ?></span></li>
                    <li>Identification Number <span><?php echo" ". $row['WifeID'] ?></span></li>
                    <h4>Place of Birth</h4>
                    <li>Region <span><?php echo" ". $row['POBWiferegion'] ?></span></li>
                    <li>Zone <span><?php echo" ". $row['POBWifeZone'] ?></span></li>
                    <li>City <span><?php echo" ". $row['POBWifeCity'] ?></span></li>
                    <li>Woreda <span><?php echo" ". $row['POBWifeWoreda'] ?></span></li>

                </ul>


            </div>


            <div class="col-lg-4">
                <h1>Husband Information</h1>
                <ul>
                    <li>First Name <span><?php echo" ". $row['husbandFirstname'] ?></span></li>
                    <li>Middle Name <span><?php echo " ".$row['husbandmiddlename'] ?></span></li>
                    <li>Last Name <span><?php echo " ".$row['husbandlastname'] ?></span></li>
                    <li>First Name(Amharic) <span><?php echo" ". $row['husbandFNamharic'] ?></span></li>
                    <li>Middle Name(Amharic) <span><?php echo " ".$row['husbandMNamharic'] ?></span></li>
                    <li>Last Name<(Amharic) <span><?php echo " ".$row['husbandLNamharic'] ?></span></li>
                    <li>Date of Birth G.C <span><?php echo " ".$row['DOBhusbandGC'] ?></span></li>
                    <li>Date of Birth E.c <span><?php echo " ".$row['DOBhusbandEC'] ?></span></li>
                    <li>Occupation Type <span><?php echo " ".$row['occupationalStatushusband'] ?></span></li>
                    <li>Educational Status <span><?php echo " ".$row['educationalstatushusband'] ?></span></li>
                    <li>Religion <span><?php echo " ".$row['religionhusband'] ?></span></li>
                    <li>Nationality <span><?php echo" ". $row['Hnationality'] ?></span></li>
                    <li>Premarial Status <span><?php echo" ". $row['Hnationality'] ?></span></li>
                    <li>Identification Number <span><?php echo" ". $row['premaritalstatushusband'] ?></span></li>
                    <h4>Place of Birth</h4>
                    <li>Region <span><?php echo" ". $row['POBHusbandRegion'] ?></span></li>
                    <li>Zone <span><?php echo" ". $row['POBHusbandZone'] ?></span></li>
                    <li>City <span><?php echo" ". $row['POBHusbandCity'] ?></span></li>
                    <li>Woreda <span><?php echo" ". $row['POBHusbandWoreda'] ?></span></li>

                </ul>


            </div>


            <div class="col-lg-4">
                <h1>Information about the Divorce</h1>
                <ul>
                    <li>Date of occurance in GC<span><?php echo" ". $row['dateofoccurance'] ?></span> </li>
                    <li>Date of occurance in EC<span><?php echo" ". $row['dateOccuranceEC'] ?></span> </li>
                    <li>Officiating Institution<span><?php echo" ". $row['officiatingInstitution'] ?></span>  </li>
               

                </ul>


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