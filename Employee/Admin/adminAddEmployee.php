<?php include '../../header.php' ?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">

<title>Add Employee </title>

</head>

<body>
    <?php include 'adminTemplet.php' ?>
    <h2 class="mt-5 text-center">Create Employee Account </h2>

    <div class="container-fluid">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="row g-3 mt-3 ">
            <h4>Personal Information</h4>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="firstName" placeholder="First Name" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <input type="text" name="fatherName" placeholder="Father Name" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="grandFatherName" placeholder="Grand Father Name" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
        <select class="form-select input-style"  required>
            <option selected>Sex</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="houseNumber" placeholder="House Number" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="tel" name="phoneNumber" pattern="[0-9]{10}" placeholder="Phone Number" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="email" name="email" placeholder="Email " class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="password" name="password" placeholder="Password " class="form-control input-style" required>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
        <select class="form-select input-style"  required>
            <option selected>Employee Type</option>
            <option value="Admin">Admin</option>
            <option value="Clerk">Clerk</option>
            <option value="Cashier">Cashier</option>
            <option value="Manager">Manager</option>
        </select>
        </div>

            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                <label for="dateInGC" class="form-label">Date of Birth in G.C</label>
                <input id="dateInGC" type="date" class="form-control input-style" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                <label for="photoUpload" class="form-label">Photograph</label>
                <input type="file" name="photoUpload" id="photoUpload" class="form-control input-style" required>
            </div>  
            <div class="col-lg-2 col-md-2 col-sm-4 input-group-lg">
            <input type="submit" value="Create" name="submit" class="form-control btn btn-primary ">
            </div>
    </form>

    </div>



    </div>
</body>

</html>