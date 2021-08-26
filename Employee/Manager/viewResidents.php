<?php include '../../header.php' ?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">

<title>View Residents </title>

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

            <table class="table mt-5 ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Member Type</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Date of Birth</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Owner(Husband)</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>Fera</td>
                        <td>June 08 1999</td>
                    </tr>

                </tbody>

            </table>



        </form>




    </div>



    </div>
</body>

</html>