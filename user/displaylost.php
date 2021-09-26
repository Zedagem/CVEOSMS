<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	header("location: ../loginPage.php");
}
?>
<?php
$appliedDate = date("Y-m-d");
$policeReport = $_SESSION['policeReport'];
$userID = $_SESSION["userID"];
$messageNotLost = $message = $id="";
try {
	require_once "../dbconnection.php";

	$sql2 = "SELECT * FROM request WHERE applierId = '$userID' AND requestType = 'CIVIL' OR requestType= 'CIVIL_LOST'";
	$stmt2 = $pdo->prepare($sql2);
	$stmt2->execute();
	$row2 = $stmt2->fetch();
	$id =$row2 ['id'];

	if ($stmt2->rowCount() == 0) {
		$messageNotLost = "You have never requeted for Civil Registration Please apply for a new one ";
	} 
	
	elseif (($row2['requestType'] == 'CIVIL_LOST') && ($row2['stat'] == 0)) {
		$message = "Your Request is being processed please wait for a notification";
	} 
	elseif (($row2['requestType'] == 'CIVIL') && ($row2['stat'] == 0)) {
		$message = "Your Request is being processed please wait for a notification";
	} 
	
	else {
		if (isset($_SESSION["EmployeeID"])) {
			$clerkId = $_SESSION["EmployeeID"];
			$sql3 = "UPDATE request SET requestType = 'CIVIL_LOST', appliedDate = '$appliedDate' ,readEmp = 1,clerkId ='$clerkId',stat =0, readCash=0, readManager=0, scheduled=0 
				WHERE id ='$id'";
			$stmt3 = $pdo->prepare($sql3);
			$stmt3->execute();
		}
		
		else {
			$sql3 = "UPDATE request SET requestType = 'CIVIL_LOST', appliedDate = '$appliedDate' ,readEmp = 0,clerkId ='',stat =0, readCash=0, readManager=0, scheduled=0 
				WHERE id ='$id' ";
			$stmt3 = $pdo->prepare($sql3);
			$stmt3->execute();
		}

		$sql = "UPDATE civilrequest SET policeReport = '$policeReport'  WHERE id ='$id' ";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$message = "You have Successfully Registered!!!";
	}
} catch (PDOException $e) {
	echo $e->getMessage();
}

unset($_SESSION['policeReport']);
unset($stmt);
unset($stmt2);
unset($stmt3);
unset($pdo);

?>


<?php include '../header.php' ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Civil Lost Registration</title>

</head>

<body>
	<?php //include 'userTemplet.php' 
	?>
	<h2 class="mt-5">Federal Democratic Republic of Ethiopia Registration</h2>

	<div class="container-fluid">

		<div class="row text-center mt-5">

			<h1 style="color:green;"><?php echo $message; ?></h1>

			<?php 
				if($messageNotLost){
					echo "<p>".$messageNotLost."<p>";
					echo "<a href='civilRegistration.php'>Apply For New Application </a>";
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