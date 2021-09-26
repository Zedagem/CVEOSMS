<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	header("location: ../loginPage.php");
}
?>
<?php


$message = "";
$appliedDate = date("Y-m-d");
$certFromInst = $_SESSION['certFromInst'];
$photo= $_SESSION['photo'];
$userID = $_SESSION['userID'];


if ($_SESSION['deathInfo']) {

	try {
		require_once "../dbconnection.php";
		extract($_SESSION['deathInfo']);

		if (isset($_SESSION["EmployeeID"])) {
			$clerkId = $_SESSION["EmployeeID"];
			$sql2 = "INSERT INTO request (applierId,requestType,appliedDate,readEmp,clerkId) VALUES('$userID','DEATH','$appliedDate',1,'$clerkId') ";
			$stmt2 = $pdo->prepare($sql2);
			$stmt2->execute();
		} else {
			$sql2 = "INSERT INTO request (applierId,requestType,appliedDate) VALUES('$userID','DEATH','$appliedDate') ";
			$stmt2 = $pdo->prepare($sql2);
			$stmt2->execute();
		}
		$sql3 = "SELECT * FROM request ORDER BY id DESC LIMIT 1";
		$stmt3 = $pdo->prepare($sql3);
		$stmt3->execute();
		$row3 = $stmt3->fetch();
		$requestId = $row3['id'];

		$sql = "INSERT INTO deathrequest (id,deceasedFirstname,deceasedMiddlename,deceasedlastname,deceasedFNamharic,deceasedMNamharic,
			deceasedLNamharic,DOBgc,DOBec,DPORregion,DPORzone,DPORcity,DPORworeda,Doccupation,Educationalstatus,
			religion,Nationality,maritalStatus,DIDnum,dateofdeath,sex,dodgc,dodec,POOregion,POOzone,POOcity,POOworeda,cause,
			placeofburial,ProofOfCause,certFromInst,photo,applierId)
			Values('$requestId','$firstName','$fatherName','$grandFatherName','$firstNameA','$fatherNameA','$grandFatherNameA','$dateInGC','$dateInEC',
			'$POBregion','$POBzone','$city','$woreda','$occupation','$educational','$religion','$nationality','$marital','$id','$DODGC','$sex','$DODGC','$DODEC',
			'$PlaceBirthRegion','$Zone','$Pcity','$Pworeda','$cause','$placeofburial','$proofOfDeath','$certFromInst','$photo','$userID');";


		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$message = "You have Successfully Registered!!!";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}
unset($_SESSION['deathInfo']);
unset($_SESSION['certFromInst']);
unset($_SESSION['photo']);
unset($stmt);
unset($stmt2);
unset($stmt3);
unset($pdo);


?>

<?php include '../header.php' ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Death Registration</title>

</head>

<body>
	<?php //include 'userTemplet.php' 
	?>
	<h2 class="mt-5">Federal Democratic Republic of Ethiopia Registration</h2>

	<div class="container-fluid">

		<div class="row text-center mt-5">

			<h1 style="color:green;"><?php echo $message; ?></h1>
			<?php
			if (isset($_SESSION["EmployeeID"])) {
				echo "<a href='../Employee/Clerk/request.php'>Go Back</a>";
			} else {
				echo "<a href='userDashboard.php'>Go Back</a>";
			}
			?>



		</div>






	</div>

</body>

</html>