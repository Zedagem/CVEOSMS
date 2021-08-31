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
$phoneNumber = $_SESSION['phoneNumber'];
$hospitalBirthCert=$_SESSION['hospitalBirthCert'];
// $yellowCard=$_SESSION['yellowCard'];
$childPhoto=$_SESSION["childPhoto"];
$motherId=$_SESSION['motherId'];
$fatherId=$_SESSION['fatherId'];

if($_SESSION['birthInfo']){

	try {
		require_once "../dbconnection.php";
		extract($_SESSION['birthInfo']);
		$sql = "INSERT INTO birthrequest(Rtype,firstName,fatherName,grandfatherName,firstNameA,fatherNameA,grandFatherNameA,gender,weight,nationality,GC,EC,POBregion,POBzone,POBcity,POBworeda,placeOccurrence,attendant,hospitalBirthCert,childPhoto,MfirstName,MfatherName,MgrandFatherName,MfirstNameA,MfatherNameA,MgrandFatherNameA,MGC,MEC,MPOBregion,MPOBzone,MPOBcity,MPOBworeda,MURregion,MURzone,MURcity,MURworeda,MoccupationType,MeducationalStatus,Mreligion,Mnationality,MidNumber,motherId,FfirstName,FfatherName,FgrandFatherName,FfirstNameA,FfatherNameA,FgrandFatherNameA,FGC,FEC,FPOBregion,FPOBzone,FPOBcity,FPOBworeda,FURregion,FURzone,FURcity,FURworeda,FoccupationType,FeducationalStatus,Freligion,Fnationality,Fidnumber,fatherId,appliedDate,phoneNumber,readEmp,readManager,readCash,stat,scheduled)
		Values('BIRTH','$firstName','$fatherName','$grandFatherName','$firstNameA','$fatherNameA','$grandFatherNameA','$gender','$weight','$nationality','$GC','$EC','$POBregion','$POBzone','$POBcity','$POBworeda','$placeOccurrence','$attendant','$hospitalBirthCert','$childPhoto','$MfirstName','$MfatherName','$MgrandFatherName','$MfirstNameA','$MfatherNameA','$MgrandFatherNameA','$MGC','$MEC','$MPOBregion','$MPOBzone','$MPOBcity','$MPOBworeda','$MURregion','$MURzone','$MURcity','$MURworeda','$MoccupationType','$MeducationalStatus','$Mreligion','$Mnationality','$Mid','$motherId','$FfirstName','$FfatherName','$FgrandFatherName','$FfirstNameA','$FfatherNameA','$FgrandFatherNameA','$FGC','$FEC','$FPOBregion','$FPOBzone','$FPOBcity','$FPOBworeda','$FURregion','$FURzone','$FURcity','$FURworeda','$FoccupationType','$FeducationalStatus','$Freligion','$Fnationality','$Fid','$fatherId','$appliedDate','$phoneNumber','false','false','false','false',0);";
		
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$message= "You have Successfully Registered!!!";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}


}
unset($_SESSION['birthInfo']);
unset($stmt);
unset($pdo);

?>

<?php include '../header.php' ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Birth Registration</title>

</head>

<body>
<?php //include 'userTemplet.php' ?>
	<h2 class="mt-5">Federal Democratic Republic of Ethiopia Registration</h2>

	<div class="container-fluid">
	
		<div class="row text-center mt-5">
			
			<h1 style="color:green;"><?php echo $message; ?></h1>
			<?php ?>
			<a href="userDashboard.php">Go Back</a>
			

		</div>


	



	</div>

</body>

</html>