<?php
//Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: http://localhost:8080/Employee/login.php");
    exit;
}
?>
<?php




// Include dbconnection file
require_once "../../dbconnection.php";

?>
<?php include '../../header.php' ?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<script src="../../js/regionSelection.js"></script>

<title>Schedule Page</title>

</head>

<body>
    <?php include 'clerkTemplet.php' ?>
    <h2 class="mt-5 text-center">Scheduling Page </h2>
    <div class="container-fluid">




    </div>


    </div>
</body>

</html>