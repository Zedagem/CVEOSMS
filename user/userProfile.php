<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../loginPage.php");
    
}
?>
<?php include '../header.php'?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<title>User Profile</title>

  
</head>
<body>
    <?php include 'userTemplet.php'?>

    <div class="text-center mt-5" >
        <img class="rounded-circle"  src="../img/profile.png" alt="profile picture" width="200vw" height="200vw">
        <h4 class="mt-4">Full Name</h4>    
    </div>
    <div>
        <p>Personal Information</p>
        <hr style="height: 5px;">
        <ul class="blue">
            <li>Full Name: <span> Information from Database</span></li> 
            <li>Date of Birth: <span> Information from Database</span></li>
            <li>Place of Birth: <span> Information from Database</span></li>
            <li>Father Full Name:<span> Information from Database</span> </li>
            <li>Mother Full Name: <span> Information from Database</span> </li>
            <li>Marital Status: <span> Information from Database</span> </li>
            <li>Spouse Name: <span> Information from Database</span> </li>
            <li>Education Level: <span> Information from Database</span> </li>
        </ul>

    </div>
    <div>
        <p>Address</p>
        <hr style="height: 5px;">
        <ul class="blue">
            <li>Residence Address: <span> Information from Database</span></li> 
            <li>Residence Address II: <span> Information from Database</span></li>
           
        </ul>

    </div>
    <div>
        <p>Emergency Contact</p>
        <hr style="height: 5px;">
        <ul class="blue">
            <li>Full Name: <span> Information from Database</span></li> 
            <li>Phone Number: <span> Information from Database</span></li>
            <li>Residence Address: <span> Information from Database</span></li>
           
        </ul>

    </div>


   
</body>
</html> 



