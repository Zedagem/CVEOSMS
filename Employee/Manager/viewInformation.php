<?php

include "../../dbconnection.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$sql = "SELECT * FROM birthrequest where id ='$id'";
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
                <h1>Child Information</h1>
                <ul>
                    <li>First Name <span><?php echo $row['firstName'] ?></span> </li>
                    <li>Middle Name <span><?php echo $row['fatherName'] ?></span>  </li>
                    <li>Last Name <span><?php echo $row['grandFatherName'] ?></span> </li>
                    <li>First Name(Amharic) <span><?php echo $row['firstNameA'] ?></span> </li>
                    <li>Middle Name(Amharic) <span><?php echo $row['fatherNameA'] ?></span> </li>
                    <li>Last Name<(Amharic) <span><?php echo $row['grandFatherNameA'] ?></span> </li>
                    <li>Sex<span><?php echo $row['gender'] ?></span> </li>
                    <li>Weight<span><?php echo $row['weight'] ?></span> </li>
                    <li>Date of Birth G.C<span><?php echo $row['GC'] ?></span> </li>
                    <li>Date of Birth E.C<span><?php echo $row['EC'] ?></span> </li>
                    <li>Type of Place Occurrence<span><?php echo $row['placeOccurrence'] ?></span> </li>
                    <li>Attendant at Birth<span><?php echo $row['attendant'] ?></span> </li>
                    <h4>Place of Birth</h4>
                    <li>Region<span><?php echo $row['POBregion'] ?></span> </li>
                    <li>Zone<span><?php echo $row['POBzone'] ?></span> </li>
                    <li>City<span><?php echo $row['POBcity'] ?></span> </li>
                    <li>Woreda<span><?php echo $row['POBworeda'] ?></span> </li>

                </ul>


            </div>

            <div class="col-lg-4">
                <h1>Mother Information</h1>
                <ul>
                    <li>First Name <span><?php echo $row['MfirstName'] ?></span> </li>
                    <li>Middle Name <span><?php echo $row['MfatherName'] ?></span></li>
                    <li>Last Name <span><?php echo $row['MgrandFatherName'] ?></span></li>
                    <li>First Name(Amharic) <span><?php echo $row['MfirstNameA'] ?></span></li>
                    <li>Middle Name(Amharic) <span><?php echo $row['MfatherNameA'] ?></span></li>
                    <li>Last Name<(Amharic)<  span><?php echo $row['MgrandFatherName'] ?></span></li>
                    <li>Date of Birth G.C <span><?php echo $row['MGC'] ?></span></li>
                    <li>Date of Birth E.c <span><?php echo $row['MEC'] ?></span></li>
                    <li>Occupation Type <span><?php echo $row['MoccupationType'] ?></span></li>
                    <li>Educational Status <span><?php echo $row['MeducationalStatus'] ?></span></li>
                    <li>Religion <span><?php echo $row['Mreligion'] ?></span></li>
                    <li>Nationality <span><?php echo $row['Mnationality'] ?></span></li>
                    <li>Identification Number <span><?php echo $row['MidNumber'] ?></span></li>
                    <h4>Place of Birth</h4>
                    <li>Region <span><?php echo $row['MPOBregion'] ?></span></li>
                    <li>Zone <span><?php echo $row['MPOBzone'] ?></span></li>
                    <li>City <span><?php echo $row['MPOBcity'] ?></span></li>
                    <li>Woreda <span><?php echo $row['MPOBworeda'] ?></span></li>

                </ul>


            </div>
            <div class="col-lg-4">
                <h1>Father Information</h1>
                <ul>
                    <li>First Name <span><?php echo $row['FfirstName'] ?></span></li>
                    <li>Middle Name <span><?php echo $row['FfatherName'] ?></span></li>
                    <li>Last Name <span><?php echo $row['FgrandFatherName'] ?></span></li>
                    <li>First Name(Amharic) <span><?php echo $row['FfirstNameA'] ?></span></li>
                    <li>Middle Name(Amharic) <span><?php echo $row['FfatherNameA'] ?></span></li>
                    <li>Last Name<(Amharic) <span><?php echo $row['MgrandFatherNameA'] ?></span></li>
                    <li>Date of Birth G.C <span><?php echo $row['FGC'] ?></span></li>
                    <li>Date of Birth E.c< span><?php echo $row['FEC'] ?></span></li>
                    <li>Occupation Type <span><?php echo $row['FoccupationType'] ?></span></li>
                    <li>Educational Status <span><?php echo $row['FeducationalStatus'] ?></span></li>
                    <li>Religion <span><?php echo $row['Freligion'] ?></span></li>
                    <li>Nationality <span><?php echo $row['Fnationality'] ?></span></li>
                    <li>Identification Number <span><?php echo $row['FidNumber'] ?></span></li>
                    <h4>Place of Birth</h4>
                    <li>Region <span><?php echo $row['FPOBregion'] ?></span></li>
                    <li>Zone <span><?php echo $row['FPOBzone'] ?></span></li>
                    <li>City <span><?php echo $row['FPOBcity'] ?></span></li>
                    <li>Woreda <span><?php echo $row['FPOBworeda'] ?></span></li>

                </ul>


            </div>
        </div>

    </div>



</body>

</html>