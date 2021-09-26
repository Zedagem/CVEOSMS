<?php

require_once "../dbconnection.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string



$sql = "SELECT * FROM civilrequest where id ='$id'";

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

        span {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-4">
                <h1>Civil Information</h1>
                <ul>

                    <li>First Name <span><?php echo " " . $row['firstName'] ?></span> </li>
                    <li>Middle Name <span><?php echo " " . $row['fatherName'] ?></span> </li>
                    <li>Last Name <span><?php echo " " . $row['grandFatherName'] ?></span> </li>
                    <li>First Name(Amharic) <span><?php echo " " . $row['firstNameA'] ?></span> </li>
                    <li>Middle Name(Amharic) <span><?php echo " " . $row['fatherNameA'] ?></span> </li>
                    <li>Last Name(Amharic) <span><?php echo " " . $row['grandFatherNameA'] ?></span> </li>
                    <li>Sex<span><?php echo " " . $row['sex'] ?></span> </li>
                    <li>Date of Birth G.C<span><?php echo " " . $row['dateGC'] ?></span> </li>
                    <li>Date of Birth E.C<span><?php echo " " . $row['dobEC'] ?></span> </li>
                    <li>Blood Group<span><?php echo " " . $row['bloodGroup'] ?></span> </li>
                    <li>Occupation<span><?php echo " " . $row['occupation'] ?></span> </li>
                    <li>Educational Status<span><?php echo " " . $row['education'] ?></span> </li>
                    <li>Nationality<span><?php echo " " . $row['nationality'] ?></span> </li>
                    <li>Religion<span><?php echo " " . $row['religion'] ?></span> </li>


                    <h4>Place of Usual Residence</h4>
                    <li>Region<span><?php echo " " . $row['PURregion'] ?></span> </li>
                    <li>Zone<span><?php echo " " . $row['PURzone'] ?></span> </li>
                    <li>City<span><?php echo " " . $row['PURcity'] ?></span> </li>
                    <li>Woreda<span><?php echo " " . $row['PURworeda'] ?></span> </li>

                </ul>


            </div>




            <div class="col-lg-4">
                <h1>Emergency Contact</h1>
                <ul>
                    <li>First Name <span><?php echo " " . $row['EfirstName'] ?></span> </li>
                    <li>Middle Name <span><?php echo " " . $row['EfatherName'] ?></span> </li>
                    <li>Last Name <span><?php echo " " . $row['EgrandFatherName'] ?></span> </li>
                    <li>First Name(Amharic) <span><?php echo " " . $row['EfirstNameA'] ?></span> </li>
                    <li>Middle Name(Amharic) <span><?php echo " " . $row['EfatherNameA'] ?></span> </li>
                    <li>Last Name(Amharic) <span><?php echo " " . $row['EgrandFatherNameA'] ?></span> </li>
                    <li>Blood Group <span><?php echo " " . $row['EbloodGroup'] ?></span> </li>
                    <li>Phone Number <span><?php echo " " . $row['EphoneNumber'] ?></span> </li>



                </ul>


            </div>


        </div>
    </div>





</body>

</html>