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
$userID = $_SESSION['userID'];
$certFromInst = $_SESSION['certFromInst'];
$husbandId = $_SESSION['husbandId'];
$wifeId = $_SESSION['wifeId'];
$husbandPhoto = $_SESSION['husbandPhoto'];
$wifePhoto = $_SESSION['wifePhoto'];



if ($_SESSION['marriageInfo']) {
	try {
		require_once "../dbconnection.php";
		extract($_SESSION['marriageInfo']);

		if (isset($_SESSION["EmployeeID"])) {
			$clerkId = $_SESSION["EmployeeID"];

			$sql2 = "INSERT INTO request (applierId,requestType,appliedDate,readEmp,clerkId) VALUES('$userID','MARRIAGE','$appliedDate',1,'$clerkId') ";
			$stmt2 = $pdo->prepare($sql2);
			$stmt2->execute();
		} else {
			$sql2 = "INSERT INTO request (applierId,requestType,appliedDate) VALUES('$userID','MARRIAGE','$appliedDate') ";
			$stmt2 = $pdo->prepare($sql2);
			$stmt2->execute();
		}
		$sql3 = "SELECT * FROM request ORDER BY id DESC LIMIT 1";
		$stmt3 = $pdo->prepare($sql3);
		$stmt3->execute();
		$row3 = $stmt3->fetch();
		$requestId = $row3['id'];


		$sql = "INSERT INTO marriagerequest(id, wifeFirstname, WifeMiddlename, wifelastname, wifeFNamharic, wifeMNamharic, wifeLNamharic, Wnationality, DOBwifeGC, DOBwifeEC, POBWiferegion, POBWifeZone, POBWifeCity, POBWifeWoreda, occupationalstatuswife, educationalstatuswife, ReligionWife, WifeID, husbandFirstname, husbandmiddlename, husbandlastname, husbandFNamharic, husbandMNamharic, husbandLNamharic, DOBhusbandGC, DOBhusbandEC, POBHusbandRegion, POBHusbandZone, POBHusbandCity, POBHusbandWoreda, occupationalStatushusband, educationalstatushusband, religionhusband, HusbandID, dateofoccurance, dateOccuranceEC, officiatingInstitution,Hnationality,wifeIdPhoto,husbandIdPhoto,wifePhoto,husbandPhoto,certificatefrominstitution,applierId) 
		VALUES ('$requestId','$WfirstName','$WfatherName','$WgrandFatherName','$WfirstNameA','$WfatherNameA','$WgrandFatherNameA','$Wnationality','$dateInGC','$dateInEC','$POBWiferegion','$POBWifeZone','$POBWifeCity','$POBWifeWoreda','$occupation','$education','$religion','$Wid','$husbandFirstname','$husbandmiddlename','$husbandlastname','$husbandFNamharic','$husbandMNamharic','$grandFatherNameA','$DOBhusbandGC','$DOBhusbandEC','$POBHusbandRegion','$POBHusbandZone','$POBHusbandCity','$POBHusbandWoreda','$Hoccupation','$educationhusband','$religionhusband','$husid','$occurancedate','$dateOccuranceEC','$officiatingInstitution','$nationality','$wifeId','$husbandId','$wifePhoto','$husbandPhoto','$certFromInst','$userID');";


		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$message = "You have Successfully Registered!!!";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}
unset($_SESSION['marriageInfo']);
unset($_SESSION['certFromInst']);
unset($_SESSION['husbandId']);
unset($_SESSION['wifeId']);
unset($_SESSION['husbandPhoto']);
unset($_SESSION['wifePhoto']);
unset($stmt);
unset($pdo);

?>

<?php include '../header.php' ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Marriage Registration</title>

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