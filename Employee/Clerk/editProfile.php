<?php include '../../header.php' ?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">

<title>Edit Profile</title>

</head>

<body>
    <?php include 'clerkTemplet.php' ?>
    <h2 class="mt-5 text-center">Clerk Edit Profile </h2>
    <div class="container-fluid">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="row g-3 mt-5">


            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                <input type="email" name="currentEmail" placeholder="Current Email " required class="form-control input-style">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                <input type="email" name="newEmail" placeholder="New Email " required class="form-control input-style">
            </div>

            <div class="col-lg-2 col-md-2 col-sm-4 input-group-lg">
                <input type="submit" value="Change" name="submit" class="form-control btn btn-primary ">
            </div>


        </form>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="row g-3 mt-5">


            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                <input type="password" name="currentPassword" required placeholder="Current Password " class="form-control input-style">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                <input type="password" name="newPassword" required placeholder="New Password " class="form-control input-style">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                <input type="password" name="confirmPassword" required placeholder="Confirm Password " class="form-control input-style">
            </div>

            <div class="col-lg-2 col-md-2 col-sm-4 input-group-lg">
                <input type="submit" value="Change" name="submit" class="form-control btn btn-primary ">
            </div>


        </form>




    </div>



    </div>
</body>

</html>