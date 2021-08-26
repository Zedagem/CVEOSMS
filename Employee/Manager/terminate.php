<?php include '../../header.php' ?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">

<title>Terminate Residents </title>

</head>

<body>
    <?php include 'managerTemplet.php' ?>
    <h2 class="mt-5 text-center">Terminate Resident Account </h2>

    <div class="container-fluid">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="row g-3 mt-5">


            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="firstName" placeholder="First Name " class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="middleName" placeholder="Middle Name " class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="lastName" placeholder="Last Name " class="form-control input-style">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="houseNumber" placeholder="House Number " class="form-control input-style">
            </div>

            <div class="col-lg-2 col-md-2 col-sm-4 input-group-lg">
                <input type="submit" value="Search" name="submit" class="form-control btn btn-primary ">
            </div>

            <table class="table mt-5 ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">House Number </th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">80415</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>lakew</td>
                    </tr>

                </tbody>

            </table>
            <div class="col-lg-2 col-md-2 col-sm-4 input-group-lg">
                <input type="submit" value="Delete" name="delete" class="form-control btn btn-primary ">
            </div>



        </form>




    </div>



    </div>
</body>

</html>