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
    <?php 
    require_once '../dbconnection.php'; 
    $userID = $_SESSION["userID"] ;

    try{
        $sql ="SELECT * FROM household where id='$userID'";
        $stmt = $pdo->prepare($sql);
        $stmt ->execute();
        $row2 = $stmt -> fetch();

    }
    catch (PDOException $e) {
		echo $e->getMessage();
    }
    ?>

    <div class="text-center mt-5" >
        <img class="rounded-circle"  src="<?php echo "http://localhost:8080/". $_SESSION['profile_pic'];?>" alt="profile picture" width="200vw" height="200vw">
        <h4 class="mt-4"> <?php echo $_SESSION["FirstName"] . " " .$_SESSION["MiddleName"] ." ". $_SESSION["LastName"]?></h4>    
    </div>
    <div>
        <p>Personal Information</p>
        <hr style="height: 5px;">
        <ul class="blue">
            <li>Member Type: <span> <?php echo strtoupper($row2['memberType']);?></span></li>
            <li>Full Name: <span> <?php echo $row2['fname'] . " ".$row2['mname'] . " ".$row2['lname'] ;?></span></li> 
            <li>Full Name (Amharic): <span> <?php echo $row2['fnameA'] . " ".$row2['mnameA'] . " ".$row2['lnameA'] ;?></span></li>
            <li>Date of Birth G.C: <span> <?php echo $row2['dobGC'] ?></span></li>
            <li>Date of Birth E.C: <span> <?php echo $row2['dobEC'] ?></span></li>
            <li>Father Last Name: <span> <?php echo $row2['fatherLastName'] ?></span></li>
            <li>Mother Name: <span> <?php echo $row2['motherName'] ?></span></li>
            <li>Mother Last Name : <span> <?php echo $row2['motherLastName'] ?></span></li>
        </ul>

    </div>
    <div>
        <p>Address</p>
        <hr style="height: 5px;">
        <ul class="blue">
            <li>Phone Number: <span> <?php echo "+251".$row2['phoneNumber'] ?></span></li> 
            <li>E-mail Address:<span> <?php echo $row2['email'] ?></span></li>
           
        </ul>

    </div>
 


   
</body>
</html> 



