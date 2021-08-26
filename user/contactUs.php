<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../loginPage.php");
    
}
?>
<?php include '../header.php' ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<title>Contact Us Page Profile</title>


</head>

<body>
    <?php include 'userTemplet.php' ?>


    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5 ">
                <form class="text-center p-5 form-floating " action="#!">
                    <h1 class="mt-4 mb-4">Contact Us</h1>

                    <div class="input-group-lg">
                        <input type="text" class="form-control input-style mb-4 " name="name" placeholder="Name" required>
                    </div>

                    <div class="input-group-lg">
                        <input type="email" class="form-control input-style mb-4 " name="email" placeholder="Email" required>
                    </div>
                    <div class="input-group-lg">
                        <input type="text" class="form-control input-style mb-4 " name="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control input-style" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px"></textarea>
                        <label class=" pt-0" for="floatingTextarea2">Comments</label>
                    </div>



                    <div class="d-grid mt-2 ">
                        <button class="btn btn-lg btn-primary" type="button">Button</button>

                    </div>
                </form>

            </div>
        </div>
    </div>



</body>

</html>