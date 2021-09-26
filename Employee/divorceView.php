<?php

require_once "../dbconnection.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string



$sql = "SELECT * FROM divorcerequest where id ='$id'";

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
                <h1>Wife Information</h1>
                <ul>
                    <li>First Name <span><?php echo" ". $row['FNWife'] ?></span> </li>
                    <li>Middle Name <span><?php echo" ". $row['MNwife'] ?></span></li>
                    <li>Last Name <span><?php echo" ". $row['LNWife'] ?></span></li>
                    <li>First Name(Amharic) <span><?php echo" ". $row['wifeFNamharic'] ?></span></li>
                    <li>Middle Name(Amharic) <span><?php echo" ". $row['wifeMNamharic'] ?></span></li>
                    <li>Last Name<(Amharic)  <span><?php echo " ".$row['wifeLNamharic'] ?></span></li>
                    <li>Date of Birth G.C <span><?php echo" ". $row['DOBGCwife'] ?></span></li>
                    <li>Date of Birth E.c <span><?php echo" ". $row['DOBECwife'] ?></span></li>
                    <li>Occupation Type <span><?php echo" ". $row['OccupationWife'] ?></span></li>
                    <li>Educational Status <span><?php echo" ". $row['EducationWife'] ?></span></li>
                    <li>Religion <span><?php echo" ". $row['RelWife'] ?></span></li>
                    <li>Nationality <span><?php echo" ". $row['Wnationality'] ?></span></li>
                    <li>Identification Number <span><?php echo" ". $row['IDNumWife'] ?></span></li>
                    <h4>Place of Birth</h4>
                    <li>Region <span><?php echo" ". $row['POBregionwife'] ?></span></li>
                    <li>Zone <span><?php echo" ". $row['POBzonewife'] ?></span></li>
                    <li>City <span><?php echo" ". $row['POBcitywife'] ?></span></li>
                    <li>Woreda <span><?php echo" ". $row['POBworedawife'] ?></span></li>

                </ul>


            </div>


            <div class="col-lg-4">
                <h1>Husband Information</h1>
                <ul>
                    <li>First Name <span><?php echo" ". $row['FNHusband'] ?></span></li>
                    <li>Middle Name <span><?php echo " ".$row['MNHusband'] ?></span></li>
                    <li>Last Name <span><?php echo " ".$row['LNHusband'] ?></span></li>
                    <li>First Name(Amharic) <span><?php echo" ". $row['husbandFNamharic'] ?></span></li>
                    <li>Middle Name(Amharic) <span><?php echo " ".$row['husbandMNamharic'] ?></span></li>
                    <li>Last Name<(Amharic) <span><?php echo " ".$row['husbandLNamharic'] ?></span></li>
                    <li>Date of Birth G.C <span><?php echo " ".$row['DOBGChusband'] ?></span></li>
                    <li>Date of Birth E.c <span><?php echo " ".$row['DOBEChusband'] ?></span></li>
                    <li>Occupation Type <span><?php echo " ".$row['OccupationHusband'] ?></span></li>
                    <li>Educational Status <span><?php echo " ".$row['EducationHusband'] ?></span></li>
                    <li>Religion <span><?php echo " ".$row['RelHusband'] ?></span></li>
                    <li>Nationality <span><?php echo" ". $row['Hnationality'] ?></span></li>
                    <li>Identification Number <span><?php echo" ". $row['IDNumHusband'] ?></span></li>
                    <h4>Place of Birth</h4>
                    <li>Region <span><?php echo" ". $row['POBregionhusband'] ?></span></li>
                    <li>Zone <span><?php echo" ". $row['POBzonehusband'] ?></span></li>
                    <li>City <span><?php echo" ". $row['POBcityhusband'] ?></span></li>
                    <li>Woreda <span><?php echo" ". $row['POBworedahusband'] ?></span></li>

                </ul>


            </div>


            <div class="col-lg-4">
                <h1>Information about the Divorce</h1>
                <ul>
                    <li>Court that approved the divorce <span><?php echo" ". $row['CourtName'] ?></span> </li>
                    <li>Court Registration Number<span><?php echo" ". $row['CourtRegNum'] ?></span>  </li>
               

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