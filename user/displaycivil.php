<?php
// Initialize the session
session_start();
 
//Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../loginPage.php");
    
}
?>
<?php

$message=$messageLost="";
$appliedDate=date("Y-m-d");
$userID = $_SESSION['userID'];
$Blood_Group_Certification = $_SESSION['Blood_Group_Certification'];
$photo=$_SESSION['photo'];




if($_SESSION['civilInfo']){

	try {
		require_once "../dbconnection.php";
		extract($_SESSION['civilInfo']);

		$sql4 ="SELECT * FROM request WHERE applierId = '$userID' AND requestType= 'CIVIL' ";
		$stmt4 = $pdo->prepare($sql4);
		$stmt4->execute();
		$row4 = $stmt4->fetch();
		if($stmt4->rowCount() == 0 ){ // this person has never applied for CIVIL
			
		if (isset($_SESSION["EmployeeID"])) {
			$clerkId = $_SESSION["EmployeeID"];
			$sql2 = "INSERT INTO request (applierId,requestType,appliedDate,readEmp,clerkId) VALUES('$userID','CIVIL','$appliedDate',1,'$clerkId') ";
			$stmt2 = $pdo->prepare($sql2);
			$stmt2->execute();
		} else {
			$sql2 = "INSERT INTO request (applierId,requestType,appliedDate) VALUES('$userID','CIVIL','$appliedDate') ";
			$stmt2 = $pdo->prepare($sql2);
			$stmt2->execute();
		}


		$sql3 = "SELECT * FROM request ORDER BY id DESC LIMIT 1";
		$stmt3 = $pdo->prepare($sql3);
		$stmt3->execute();
		$row3 = $stmt3->fetch();
		$requestId = $row3['id'];

		
		
		$sql = "INSERT INTO civilrequest (id, firstName, fatherName, grandFatherName, firstNameA, fatherNameA, grandFatherNameA,sex, dobEC, dateGC, PURregion,  PURzone, PURcity, PURworeda, occupation, education, religion, nationality, bloodGroup , Blood_Group_Certification, photo, EfirstName, EfatherName, EgrandFatherName, EfirstNameA, EfatherNameA, EgrandFatherNameA, EbloodGroup, EphoneNumber,applierId)
			
		Values('$requestId', '$firstName', '$fatherName', '$grandFatherName', '$firstNameA', '$fatherNameA', '$grandFatherNameA','$gender', '$dobEC', '$dobGC', '$PURregion',  '$PURzone', '$PURcity', '$PURworeda', '$occupation', '$education', '$religion', '$nationality', '$bloodGroup' , '$Blood_Group_Certification', '$photo', '$EfirstName', '$EfatherName', '$EgrandFatherName', '$EfirstNameA', '$EfatherNameA', '$EgrandFatherNameA', '$EbloodGroup', '$EphoneNumber','$userID')";
			
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$message= "You have Successfully Registered!!!";
		}
		elseif($row4['stat'] == 1){
			$messageLost= "Your have already applied for an ID Card. If you have lost it please apply for lost !";

		}
		else{
			$message= "Your application is being proccessed Please wait until you get a notification!";
		}

	} catch (PDOException $e) {
		echo $e->getMessage();
	}


}
unset($_SESSION['civilInfo']);
unset($_SESSION['Blood_Group_Certification']);
unset($_SESSION['photo']);
unset($stmt);
unset($stmt2);
unset($stmt3);
unset($pdo);


?>

<?php include '../header.php' ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Civil Registration</title>

</head>

<body>
<?php //include 'userTemplet.php' ?>
	<h2 class="mt-5">Federal Democratic Republic of Ethiopia Registration</h2>

	<div class="container-fluid">
	
		<div class="row text-center mt-5">
			
			<h1 style="color:green;"><?php echo $message; ?></h1>
			
			<?php 
				if($messageLost){
					echo "<p>". $messageLost."</p>";
					echo "<a href='lost.php'>Apply For Lost</a>";
					echo "<p>OR</p>";
				}
			
				if(isset($_SESSION["EmployeeID"])){
					echo "<a href='../Employee/Clerk/request.php'>Go Back</a>";
				}
				else{
					echo "<a href='userDashboard.php'>Go Back</a>";
				}

			
			?>
			
			

		</div>


	



	</div>

</body>

</html>