<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../loginPage.php");
    
}
?>
<?php

$message="";
$appliedDate=date("Y-m-d");
$userID = $_SESSION['userID'];
$courtCert = $_SESSION['courtCert'];
$husbandId = $_SESSION['husbandId'];
$wifeId = $_SESSION['wifeId'];
$husbandPhoto = $_SESSION['husbandPhoto'];
$wifePhoto = $_SESSION['wifePhoto'];

if($_SESSION['divorceInfo']){

	try {
		require_once "../dbconnection.php";
		extract($_SESSION['divorceInfo']);

		if (isset($_SESSION["EmployeeID"])) {
			$clerkId = $_SESSION["EmployeeID"];

			$sql2 = "INSERT INTO request (applierId,requestType,appliedDate,readEmp,clerkId) VALUES('$userID','DIVORCE','$appliedDate',1,'$clerkId') ";
			$stmt2 = $pdo->prepare($sql2);
			$stmt2->execute();
	
		}
		else{
			$sql2 = "INSERT INTO request (applierId,requestType,appliedDate) VALUES('$userID','DIVORCE','$appliedDate') ";
		$stmt2 = $pdo->prepare($sql2);
		$stmt2->execute();


		}
		$sql3 = "SELECT * FROM request ORDER BY id DESC LIMIT 1";
			$stmt3 = $pdo->prepare($sql3);
			$stmt3->execute();
			$row3 = $stmt3->fetch();
			$requestId = $row3['id'];
		$sql = "INSERT INTO divorcerequest(id,FNWife,MNwife,LNWife,wifeFNamharic,wifeMNamharic,wifeLNamharic,DOBGCwife,DOBECwife,POBregionwife,POBzonewife,
		POBcitywife,POBworedawife,OccupationWife,RelWife,EducationWife,Wnationality,IDNumWife,FNHusband,MNHusband,LNHusband,husbandFNamharic,husbandMNamharic,
		husbandLNamharic,DOBGChusband,DOBEChusband,POBregionhusband,POBzonehusband,POBcityhusband,POBworedahusband,OccupationHusband,EducationHusband,RelHusband,
		Hnationality,IDNumHusband,CourtName,CourtRegNum,husbandIdPhoto,wifeIdPhoto,husbandPhoto,wifePhoto,courtCert,applierId,dateofoccurance,dateOccuranceEC)
		Values('$requestId','$firstName','$fatherName','$grandFatherName','$firstNameA','$fatherNameA','$grandFatherNameA','$dateInGC','$dateInEC','$POBWiferegion','$POBWifeZone',
		'$POBWifeCity','$POBWifeWoreda','$OccupationWife','$EducationWife','$RelWife','$Wnationality','$wifeID','$HfirstName','$HfatherName','$HgrandFatherName','$HfirstNameA',
		'$HfatherNameA','$HgrandFatherNameA','$DOBhusbandGC','$DOBhusbandEC','$POBregionhus','$husZone','$huscity','$Husworeda','$Hoccupation','$Heducation','$relHus','$Hnationality',
		'$husbandIdNum','$nameOfCourt','$courtRegistration','$husbandId','$wifeId','$husbandPhoto','$wifePhoto','$courtCert','$userID','$dateofoccurance','$dateOccuranceEC');";
		
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$message= "You have Successfully Registered!!!";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}


}
unset($_SESSION['divorceInfo']);
unset($_SESSION['courtCert']);
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

<title>Divorce Registration</title>

</head>

<body>
<?php //include 'userTemplet.php' ?>
	<h2 class="mt-5">Federal Democratic Republic of Ethiopia Registration</h2>

	<div class="container-fluid">
	
		<div class="row text-center mt-5">
			
			<h1 style="color:green;"><?php echo $message; ?></h1>
			<?php
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