<?php
//Initialize the session
session_start();

$id = trim($_SESSION["EmployeeID"]);
$cut = substr($id, 0, -6);



// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true  || strcmp($cut, 'cle') != 0) {

	header("location: http://localhost:8080/Employee/login.php");
	exit;
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Certificate Templete</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/civil.css">
	<style>
		span {
			font-weight: normal;
		}

		/* .col-lg-4{
			border: 1px solid black;
		} */
		@page {
			size: landscape;
			margin: 0;

		}

		.mediaViewInfo {
			--web-view-name: Page 1;
			--web-view-id: Page_1;
			--web-scale-on-resize: true;
			--web-enable-deep-linking: true;
		}

		:root {
			--web-view-ids: Page_1;
		}

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			border: none;
		}

		#Page_1 {
			position: absolute;
			width: 1920px;
			height: 2443px;
			background-color: rgba(255, 255, 255, 1);
			overflow: hidden;
			--web-view-name: Page 1;
			--web-view-id: Page_1;
			--web-scale-on-resize: true;
			--web-enable-deep-linking: true;
		}

		#Rectangle_1 {
			fill: rgba(255, 255, 255, 1);
			stroke: rgba(112, 112, 112, 1);
			stroke-width: 1px;
			stroke-linejoin: miter;
			stroke-linecap: butt;
			stroke-miterlimit: 4;
			shape-rendering: auto;
		}

		.Rectangle_1 {
			position: absolute;
			overflow: visible;
			width: 636px;
			height: 297px;
			left: 103px;
			top: 89px;
		}

		#The-Addis-Ababa-City-Administr {
			position: absolute;
			width: 147.5px;
			height: 98.5px;
			left: 112px;
			top: 96px;
			overflow: visible;
		}

		#Addis_Ababa_City_Resident_ID_c {
			left: 299px;
			top: 133px;
			position: absolute;
			overflow: visible;
			width: 329px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: bold;
			font-size: 20px;
			color: rgba(63, 99, 157, 1);
		}

		#Reg_No_AA000624421 {
			left: 128px;
			top: 191px;
			position: absolute;
			overflow: visible;
			width: 206px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: normal;
			font-size: 20px;
			color: rgba(63, 99, 157, 1);
		}

		#Full_Name_Amharic {
			left: 247px;
			top: 241px;
			position: absolute;
			overflow: visible;
			width: 155px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: bold;
			font-size: 16px;
			color: rgba(63, 99, 157, 1);
		}

		#ZEDAGEM_SHIFERAW_DEMELASH {
			left: 407px;
			top: 242px;
			position: absolute;
			overflow: visible;
			width: 254px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: normal;
			font-size: 16px;
			color: rgba(0, 0, 0, 1);
		}

		#ZEDAGEM_SHIFERAW_DEMELASH_n {
			left: 339px;
			top: 268px;
			position: absolute;
			overflow: visible;
			width: 254px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: normal;
			font-size: 16px;
			color: rgba(0, 0, 0, 1);
		}

		#ID1999-24-09 {
			left: 339px;
			top: 293px;
			position: absolute;
			overflow: visible;
			width: 85px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: normal;
			font-size: 16px;
			color: rgba(0, 0, 0, 1);
		}

		#ID1999-24-09_p {
			left: 337px;
			top: 321px;
			position: absolute;
			overflow: visible;
			width: 85px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: normal;
			font-size: 16px;
			color: rgba(0, 0, 0, 1);
		}

		#Blood_Group {
			left: 462px;
			top: 293px;
			position: absolute;
			overflow: visible;
			width: 97px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: bold;
			font-size: 16px;
			color: rgba(63, 99, 157, 1);
		}

		#Sex_ {
			left: 462px;
			top: 319px;
			position: absolute;
			overflow: visible;
			width: 34px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: bold;
			font-size: 16px;
			color: rgba(63, 99, 157, 1);
		}

		#Male {
			left: 527px;
			top: 320px;
			position: absolute;
			overflow: visible;
			width: 36px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: normal;
			font-size: 16px;
			color: rgba(0, 0, 0, 1);
		}

		#ID2021-01-01 {
			left: 485px;
			top: 354px;
			position: absolute;
			overflow: visible;
			width: 85px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: normal;
			font-size: 16px;
			color: rgba(0, 0, 0, 1);
		}

		#O {
			left: 605px;
			top: 294px;
			position: absolute;
			overflow: visible;
			width: 23px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: normal;
			font-size: 16px;
			color: rgba(0, 0, 0, 1);
		}

		#Issue_Date {
			left: 391px;
			top: 354px;
			position: absolute;
			overflow: visible;
			width: 77px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: normal;
			font-size: 16px;
			color: rgba(63, 99, 157, 1);
		}

		#Full_Name_ {
			left: 247px;
			top: 267px;
			position: absolute;
			overflow: visible;
			width: 82px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: bold;
			font-size: 16px;
			color: rgba(63, 99, 157, 1);
		}

		#DOB_EC {
			left: 247px;
			top: 294px;
			position: absolute;
			overflow: visible;
			width: 63px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: bold;
			font-size: 16px;
			color: rgba(63, 99, 157, 1);
		}

		#DOB_GC {
			left: 247px;
			top: 320px;
			position: absolute;
			overflow: visible;
			width: 65px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: bold;
			font-size: 16px;
			color: rgba(63, 99, 157, 1);
		}

		#Rectangle_2 {
			position: absolute;
			width: 103px;
			height: 125px;
			left: 128px;
			top: 229px;
			overflow: visible;
		}

		#Rectangle_1_ {
			fill: rgba(255, 255, 255, 1);
			stroke: rgba(112, 112, 112, 1);
			stroke-width: 1px;
			stroke-linejoin: miter;
			stroke-linecap: butt;
			stroke-miterlimit: 4;
			shape-rendering: auto;
		}

		.Rectangle_1_ {
			position: absolute;
			overflow: visible;
			width: 636px;
			height: 299px;
			left: 51px;
			top: 1637px;
		}

		#Resident_Address_ {
			left: 70px;
			top: 1664px;
			position: absolute;
			overflow: visible;
			width: 140px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: bold;
			font-size: 16px;
			color: rgba(63, 99, 157, 1);
		}

		#Phone_Number {
			left: 70px;
			top: 1700px;
			position: absolute;
			overflow: visible;
			width: 115px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: bold;
			font-size: 16px;
			color: rgba(63, 99, 157, 1);
		}

		#Phone_Number_ {
			left: 70px;
			top: 1861px;
			position: absolute;
			overflow: visible;
			width: 115px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: bold;
			font-size: 16px;
			color: rgba(63, 99, 157, 1);
		}

		#House_No_ {
			left: 427px;
			top: 1700px;
			position: absolute;
			overflow: visible;
			width: 85px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: bold;
			font-size: 16px;
			color: rgba(63, 99, 157, 1);
		}

		#Emergency_Contact_ {
			left: 69px;
			top: 1743px;
			position: absolute;
			overflow: visible;
			width: 147px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: normal;
			font-size: 16px;
			color: rgba(63, 99, 157, 1);
		}

		#ZEDAGEM_SHIFERAW_DEMELASH_ {
			left: 161px;
			top: 1825px;
			position: absolute;
			overflow: visible;
			width: 254px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: normal;
			font-size: 16px;
			color: rgba(0, 0, 0, 1);
		}

		#ID0933713899 {
			left: 221px;
			top: 1700px;
			position: absolute;
			overflow: visible;
			width: 90px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: normal;
			font-size: 16px;
			color: rgba(0, 0, 0, 1);
		}

		#ID0933713899_ {
			left: 221px;
			top: 1861px;
			position: absolute;
			overflow: visible;
			width: 90px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: normal;
			font-size: 16px;
			color: rgba(0, 0, 0, 1);
		}

		#ARADAWOREDA_7 {
			left: 220px;
			top: 1668px;
			position: absolute;
			overflow: visible;
			width: 142px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: normal;
			font-size: 16px;
			color: rgba(0, 0, 0, 1);
		}

		#Blood_Group_ba {
			left: 406px;
			top: 1862px;
			position: absolute;
			overflow: visible;
			width: 97px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: bold;
			font-size: 16px;
			color: rgba(63, 99, 157, 1);
		}

		#ID1871 {
			left: 529px;
			top: 1701px;
			position: absolute;
			overflow: visible;
			width: 37px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: normal;
			font-size: 16px;
			color: rgba(0, 0, 0, 1);
		}

		#O_bc {
			left: 549px;
			top: 1863px;
			position: absolute;
			overflow: visible;
			width: 23px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: normal;
			font-size: 16px;
			color: rgba(0, 0, 0, 1);
		}

		#Full_Name__bd {
			left: 69px;
			top: 1824px;
			position: absolute;
			overflow: visible;
			width: 82px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: bold;
			font-size: 16px;
			color: rgba(63, 99, 157, 1);
		}

		#Full_Name_Amharic_be {
			left: 69px;
			top: 1787px;
			position: absolute;
			overflow: visible;
			width: 155px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: bold;
			font-size: 16px;
			color: rgba(63, 99, 157, 1);
		}

		#ZEDAGEM_SHIFERAW_DEMELASH_bf {
			left: 229px;
			top: 1788px;
			position: absolute;
			overflow: visible;
			width: 254px;
			white-space: nowrap;
			text-align: left;
			font-family: Helvetica Neue;
			font-style: normal;
			font-weight: normal;
			font-size: 16px;
			color: rgba(0, 0, 0, 1);
		}

		#Line_1 {
			fill: transparent;
			stroke: rgba(63, 99, 157, 1);
			stroke-width: 1px;
			stroke-linejoin: miter;
			stroke-linecap: butt;
			stroke-miterlimit: 4;
			shape-rendering: auto;
		}

		.Line_1 {
			overflow: visible;
			position: absolute;
			width: 406px;
			height: 1px;
			left: 69.5px;
			top: 1771.399px;
			transform: matrix(1, 0, 0, 1, 0, 0);
		}
	</style>
</head>

<body>




	<?php
	include "../../dbconnection.php";


	$id = $_POST['id'];
	$applierId = $_POST['applierId'];
	$requestType = trim($_POST['Rtype']);
	$EmployeeID =  $_SESSION['EmployeeID'];
	$currentDate = date("Y-m-d");
	$birth = "BIRTH";
	$death = "DEATH";
	$marriage = "MARRIAGE";
	$divorce = "DIVORCE";
	$civil = "CIVIL";
	$civilLost = "CIVIL_LOST";
	$type = "";

	if (isset($_POST['submit'])) {

		if (strcmp(trim($requestType), $birth) == 0) {
			$type = "birthrequest";
			try {

				$sql = "SELECT * From birthrequest  WHERE id='$id' ";
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				$row = $stmt->fetch();
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
	?>
			<div style="position: absolute; right: 0; top:20px; margin-right:30px ;">
				<p>Issued Date <span><?php echo $currentDate; ?></span></p>
				<p> Unique ID Number <span><?php echo $id; ?></span></p>

			</div>
			<div style="position: absolute; left: 0; top:20px; margin-left:30px ;">
				<img src="<?php echo 'http://localhost:8080/' . $row['childPhoto']; ?>" alt="child photo" width="120px" height="120px">
			</div>

			<div class="container-fluid">

				<div class="text-center mt-5">
					<img src="../../img/ethiopiaFlag.svg">
					<h4 class="pt-3">Federal Democratic Republic of Ethiopia Vital Event Registration </h4>
					<h4 class="pt-3"> Birth Certficate</h4>
				</div>
				<div class=" ">
					<table class="table table-borderless">

						<tr>
							<th scope="col" style="font-size: 20px;">Child Information </th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
							<tbody>
						</tr>
						<tr style="border: 1px black solid; width:100%">

						</tr>


						<tr>
							<th>Full Name: <span><?php echo $row['firstName'] . " " . $row['fatherName'] . " " .  $row['grandFatherName']; ?></span></th>
							<th>Full Name (In Amharic): <span><?php echo $row['firstNameA'] . " " . $row['fatherNameA'] . " " .  $row['grandFatherNameA']; ?></span></th>
							<th>Sex: <span><?php echo $row['gender']; ?></span></th>
						</tr>





						<tr>

							<th>Date of Birth GC : <span> <?php echo $row['GC']; ?></span></th>
							<th>Date of Birth EC : <span><?php echo $row['EC']; ?></span></th>

						</tr>
						<tr>
							<th>Place of Birth Region : <span><?php echo $row['POBregion']; ?></span></th>
							<th>Zone: <span><?php echo $row['POBzone']; ?></span></th>
							<th>City <span><?php echo $row['POBcity']; ?></span></th>
							<th>Woreda <span><?php echo $row['POBworeda']; ?></span></th>

						</tr>
						<tr>
							<th>Nationality <span><?php echo $row['Fnationality']; ?></span></th>

						</tr>
						<tr>
							<th scope="col" style="font-size: 20px;">Mother Information </th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>
						<tr style="border: 1px black solid; width:100%">

						</tr>


						<tr>
							<th>Full Name: <span><?php echo $row['MfirstName'] . " " . $row['MfatherName'] . " " .  $row['MgrandFatherName']; ?></span></th>
							<th>Full Name (In Amharic): <span><?php echo $row['MfirstNameA'] . " " . $row['MfatherNameA'] . " " .  $row['MgrandFatherNameA']; ?></span></th>

						</tr>


						<tr>
							<th>Nationality <span><?php echo $row['Mnationality']; ?></span></th>

						</tr>

						<tr>
							<th scope="col" style="font-size: 20px;">Father Information </th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>
						<tr style="border: 1px black solid; width:100%">

						</tr>


						<tr>
							<th>Full Name: <span><?php echo $row['FfirstName'] . " " . $row['FfatherName'] . " " .  $row['FgrandFatherName']; ?></span></th>
							<th>Full Name (In Amharic): <span><?php echo $row['FfirstNameA'] . " " . $row['FfatherNameA'] . " " .  $row['FgrandFatherNameA']; ?></span></th>

						</tr>


						<tr>
							<th>Nationality <span><?php echo $row['Fnationality']; ?></span></th>

						</tr>
						<tr>
							<th scope="col" style="font-size: 20px;">Civil Registerar Information </th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>
						<tr style="border: 1px black solid; width:100%">

						</tr>


						<tr>
							<th>Name: <span><?php echo $_SESSION["firstName"]; ?></span></th>
							<th>Father's Name: <span><?php echo $_SESSION["middleName"]; ?></span></th>
							<th>Grand Father's Name: <span><?php echo $_SESSION["lastName"]; ?></span></th>

						</tr>


						<tr>
							<th>Signature <span>_________________________</span></th>
							<th> <button onclick=" document.getElementById('print-btn').style.display ='none'; window.print(); " class="btn btn-primary " id="print-btn">Print</button> </th>
							<th> SEAL </th>

						</tr>
						</tbody>
					</table>
				</div>


			</div>




		<?php  } elseif (strcmp(trim($requestType), $death) == 0) {
			try {

				$sql = "SELECT * From deathrequest  WHERE id='$id' ";
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				$row = $stmt->fetch();
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		?>
			<div style="position: absolute; right: 0; top:20px; margin-right:30px ;">
				<p>Issued Date <span><?php echo $currentDate; ?></span></p>
				<p> Unique ID Number <span><?php echo $id; ?></span></p>

			</div>
			<div style="position: absolute; left: 0; top:20px; margin-left:30px ;">
				<img src="<?php echo 'http://localhost:8080/' . $row['photo']; ?>" alt="deceased photo" width="120px" height="120px">
			</div>

			<div class="container-fluid">

				<div class="text-center mt-5">
					<img src="../../img/ethiopiaFlag.svg">
					<h4 class="pt-3">Federal Democratic Republic of Ethiopia Vital Event Registration </h4>
					<h4 class="pt-3"> Death Certficate</h4>
				</div>
				<div class=" ">
					<table class="table table-borderless">

						<tr>
							<th scope="col" style="font-size: 20px;">Deceased Information </th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
							<tbody>
						</tr>
						<tr style="border: 1px black solid; width:100%">

						</tr>


						<tr>
							<th>Deceased's Full Name: <span><?php echo $row['deceasedFirstname'] . " " . $row['deceasedMiddlename'] . " " .  $row['deceasedlastname']; ?></span></th>
							<th>Full Name (In Amharic): <span><?php echo $row['deceasedFNamharic'] . " " . $row['deceasedMNamharic'] . " " .  $row['deceasedLNamharic']; ?></span></th>

						</tr>
						<tr>
							<th>Sex: <span>Male</span></th>
							<th>Date of Birth GC : <span> <?php echo $row['DOBgc']; ?></span></th>
							<th>Date of Birth EC : <span><?php echo $row['DOBec']; ?></span></th>

						</tr>

						<tr>
							<th>Nationality <span><?php echo $row['Nationality']; ?></span></th>

						</tr>
						<tr>
							<th scope="col" style="font-size: 20px;">Deceased's Information </th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>
						<tr style="border: 1px black solid; width:100%">

						</tr>


						<tr>
							<th>Sex: <span><?php echo $row['sex']; ?></span></th>
							<th>Date of Death GC : <span> <?php echo $row['dodgc']; ?></span></th>
							<th>Date of Death EC : <span><?php echo $row['dodec']; ?></span></th>

						</tr>

						<tr>
							<th>Place of Death Region : <span><?php echo $row['DPORregion']; ?></span></th>
							<th>Zone: <span><?php echo $row['DPORzone']; ?></span></th>
							<th>City <span><?php echo $row['DPORcity']; ?></span></th>
							<th>Woreda <span><?php echo $row['DPORworeda']; ?></span></th>

						</tr>


						<tr>
							<th scope="col" style="font-size: 20px;">Civil Registerar Information </th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>
						<tr style="border: 1px black solid; width:100%">

						</tr>


						<tr>
							<th>Name: <span><?php echo $_SESSION["firstName"]; ?></span></th>
							<th>Father's Name: <span><?php echo $_SESSION["middleName"]; ?></span></th>
							<th>Grand Father's Name: <span><?php echo $_SESSION["lastName"]; ?></span></th>

						</tr>


						<tr>
							<th>Signature <span>_________________________</span></th>
							<th> <button onclick=" document.getElementById('print-btn').style.display ='none'; window.print(); " class="btn btn-primary " id="print-btn">Print</button> </th>
							<th> SEAL </th>

						</tr>
						</tbody>
					</table>
				</div>


			</div>




		<?php
		} elseif (strcmp(trim($requestType), $marriage) == 0) {
			try {

				$sql = "SELECT * From marriagerequest  WHERE id='$id' ";
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				$row = $stmt->fetch();
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		?>
			<div style="position: absolute; left: 30px; top:20px; margin-right:30px ;">
				<p>Issued Date <span><?php echo $currentDate; ?></span></p>
				<div style="position: relative; left: 0; top:20px; margin-left:25px ;">
					<img src="<?php echo 'http://localhost:8080/' . $row['wifePhoto']; ?>" alt="child photo" width="120px" height="120px">
				</div>
			</div>
			<div style="position: absolute; right: 0; top:20px; margin-right:30px ;">
				<p> Unique ID Number <span><?php echo $id; ?></span></p>
				<div style="position: relative; right: 0; top:20px; margin-left:30px ;">
					<img src="<?php echo 'http://localhost:8080/' . $row['husbandPhoto']; ?>" width="120px" height="120px">
				</div>
			</div>




			<div class="container-fluid">

				<div class="text-center mt-5">
					<img src="../../img/ethiopiaFlag.svg">
					<h4 class="pt-3">Federal Democratic Republic of Ethiopia Vital Event Registration </h4>
					<h4 class="pt-3"> Marriage Certficate</h4>
				</div>
				<div>

					<table class="table table-borderless">

						<tr>
							<th scope="col" style="font-size: 20px;">Wife Information </th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
							<tbody>
						</tr>

						<tr>
							<th>Full Name: <span><?php echo $row['wifeFirstname'] . " " . $row['WifeMiddlename'] . " " .  $row['wifelastname']; ?></span></th>
							<th>Full Name (In Amharic): <span><?php echo $row['wifeFNamharic'] . " " . $row['wifeMNamharic'] . " " .  $row['wifeLNamharic']; ?></span></th>

						</tr>

						<tr>
							<th>Date of Birth GC : <span> <?php echo $row['DOBwifeGC']; ?></span></th>
							<th>Date of Birth EC : <span><?php echo $row['DOBwifeEC']; ?></span></th>

						</tr>

						<tr>
							<th>Nationality <span><?php echo $row['Wnationality']; ?></span></th>

						</tr>
						<tr>
							<th scope="col" style="font-size: 20px;">Husband Information </th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>
						<tr>
							<th>Full Name: <span><?php echo $row['husbandFirstname'] . " " . $row['husbandmiddlename'] . " " .  $row['husbandlastname']; ?></span></th>
							<th>Full Name (In Amharic): <span><?php echo $row['husbandFNamharic'] . " " . $row['husbandMNamharic'] . " " .  $row['husbandLNamharic']; ?></span></th>

						</tr>

						<tr>
							<th>Date of Birth GC : <span> <?php echo $row['DOBhusbandGC']; ?></span></th>
							<th>Date of Birth EC : <span><?php echo $row['DOBhusbandEC']; ?></span></th>

						</tr>

						<tr>
							<th>Nationality <span><?php echo $row['Hnationality']; ?></span></th>

						</tr>


						<tr>
							<th scope="col" style="font-size: 20px;">Information Regarding the Marriage </th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
							<tbody>
						</tr>
						<tr>
							<th>Date of Marriage GC : <span> <?php echo $row['dateofoccurance']; ?></span></th>
							<th>Date of Marriage EC : <span><?php echo $row['dateOccuranceEC']; ?></span></th>

						</tr>

						<tr>
							<th scope="col" style="font-size: 20px;">Civil Registerar Information </th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>


						<tr>
							<th>Name: <span><?php echo $_SESSION["firstName"]; ?></span></th>
							<th>Father's Name: <span><?php echo $_SESSION["middleName"]; ?></span></th>
							<th>Grand Father's Name: <span><?php echo $_SESSION["lastName"]; ?></span></th>

						</tr>


						<tr>
							<th>Signature <span>_________________________</span></th>
							<th> <button onclick=" document.getElementById('print-btn').style.display ='none'; window.print(); " class="btn btn-primary " id="print-btn">Print</button> </th>
							<th> SEAL </th>

						</tr>
						</tbody>
					</table>
				</div>


			</div>


		<?php } elseif (strcmp(trim($requestType), $divorce) == 0) {
			try {

				$sql = "SELECT * From divorcerequest  WHERE id='$id' ";
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				$row = $stmt->fetch();
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		?>
			<div style="position: absolute; left: 30px; top:20px; margin-right:30px ;">
				<p>Issued Date <span><?php echo $currentDate; ?></span></p>
				<div style="position: relative; left: 0; top:20px; margin-left:25px ;">
					<img src="<?php echo 'http://localhost:8080/' . $row['wifePhoto']; ?>" alt="child photo" width="120px" height="120px">
				</div>
			</div>
			<div style="position: absolute; right: 0; top:20px; margin-right:30px ;">
				<p> Unique ID Number <span><?php echo $id; ?></span></p>
				<div style="position: relative; right: 0; top:20px; margin-left:30px ;">
					<img src="<?php echo 'http://localhost:8080/' . $row['husbandPhoto']; ?>" width="120px" height="120px">
				</div>
			</div>




			<div class="container-fluid">

				<div class="text-center mt-5">
					<img src="../../img/ethiopiaFlag.svg">
					<h4 class="pt-3">Federal Democratic Republic of Ethiopia Vital Event Registration </h4>
					<h4 class="pt-3"> Divorce Certficate</h4>
				</div>
				<div>

					<table class="table table-borderless">

						<tr>
							<th scope="col" style="font-size: 20px;">Wife Information </th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
							<tbody>
						</tr>

						<tr>
							<th>Full Name: <span><?php echo $row['FNWife'] . " " . $row['MNwife'] . " " .  $row['LNWife']; ?></span></th>
							<th>Full Name (In Amharic): <span><?php echo $row['wifeFNamharic'] . " " . $row['wifeMNamharic'] . " " .  $row['wifeLNamharic']; ?></span></th>

						</tr>

						<tr>
							<th>Date of Birth GC : <span> <?php echo $row['DOBGCwife']; ?></span></th>
							<th>Date of Birth EC : <span><?php echo $row['DOBECwife']; ?></span></th>

						</tr>

						<tr>
							<th>Nationality <span><?php echo $row['Wnationality']; ?></span></th>

						</tr>
						<tr>
							<th scope="col" style="font-size: 20px;">Husband Information </th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>
						<tr>
							<th>Full Name: <span><?php echo $row['FNHusband'] . " " . $row['MNHusband'] . " " .  $row['LNHusband']; ?></span></th>
							<th>Full Name (In Amharic): <span><?php echo $row['husbandFNamharic'] . " " . $row['husbandMNamharic'] . " " .  $row['husbandLNamharic']; ?></span></th>

						</tr>

						<tr>
							<th>Date of Birth GC : <span> <?php echo $row['DOBGChusband']; ?></span></th>
							<th>Date of Birth EC : <span><?php echo $row['DOBEChusband']; ?></span></th>

						</tr>

						<tr>
							<th>Nationality <span><?php echo $row['Hnationality']; ?></span></th>

						</tr>


						<tr>
							<th scope="col" style="font-size: 20px;">Information Regarding the Divorce </th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
							<tbody>
						</tr>
						<tr>
							<th>Date of Divorce GC : <span> <?php echo $row['dateofoccurance']; ?></span></th>
							<th>Date of Divorce EC : <span><?php echo $row['dateOccuranceEC']; ?></span></th>

						</tr>

						<tr>
							<th scope="col" style="font-size: 20px;">Civil Registerar Information </th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>


						<tr>
							<th>Name: <span><?php echo $_SESSION["firstName"]; ?></span></th>
							<th>Father's Name: <span><?php echo $_SESSION["middleName"]; ?></span></th>
							<th>Grand Father's Name: <span><?php echo $_SESSION["lastName"]; ?></span></th>

						</tr>


						<tr>
							<th>Signature <span>_________________________</span></th>
							<th> <button onclick=" document.getElementById('print-btn').style.display ='none'; window.print(); " class="btn btn-primary " id="print-btn">Print</button> </th>
							<th> SEAL </th>

						</tr>
						</tbody>
					</table>
				</div>


			</div>


		<?php

		} else {
			try {

				$sql = "SELECT household.houseNumber,household.phoneNumber,civilrequest.* From civilrequest INNER JOIN household on household.id = civilrequest.applierid  WHERE civilrequest.id='$id' ";
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				$row = $stmt->fetch();
			} catch (PDOException $e) {
				echo $e->getMessage();
			}


		?>
			<div>
				<button onclick=" document.getElementById('print-btn').style.display ='none'; window.print(); " class="btn btn-primary " id="print-btn">Print</button>
			</div>

			<div id="Page_1">
				<svg class="Rectangle_1">
					<rect id="Rectangle_1" rx="0" ry="0" x="0" y="0" width="636" height="297">
					</rect>
				</svg>
				<img id="The-Addis-Ababa-City-Administr" src="../../img/The-Addis-Ababa-City-Administr.png">

				<div id="Addis_Ababa_City_Resident_ID_c">
					<span>Addis Ababa City Resident ID card</span>
				</div>
				<div id="Reg_No_AA000624421">
					<span>Reg. No <span><?php echo $row['id']; ?></span></span>
				</div>
				<div id="Full_Name_Amharic">
					<span>Full Name (Amharic)</span>
				</div>
				<div id="ZEDAGEM_SHIFERAW_DEMELASH">
					<span><?php echo $row['firstNameA'] . " " . $row['fatherNameA'] . " " . $row['grandFatherNameA']; ?></span>
				</div>
				<div id="ZEDAGEM_SHIFERAW_DEMELASH_n">
					<span><?php echo $row['firstName'] . " " . $row['fatherName'] . " " . $row['grandFatherName']; ?></span>
				</div>
				<div id="ID1999-24-09">
					<span><?php echo $row['dobEC']; ?></span>
				</div>
				<div id="ID1999-24-09_p">
					<span><?php echo $row['dateGC']; ?></span>
				</div>
				<div id="Blood_Group">
					<span>Blood Group</span>
				</div>
				<div id="Sex_">
					<span>Sex </span>
				</div>
				<div id="Male">
					<span><?php echo $row['sex']; ?></span>
				</div>
				<div id="ID2021-01-01">
					<span><?php echo $currentDate ?></span>
				</div>
				<div id="O">
					<span><?php echo $row['bloodGroup']; ?></span>
				</div>
				<div id="Issue_Date">
					<span>Issue Date</span>
				</div>
				<div id="Full_Name_">
					<span>Full Name </span>
				</div>
				<div id="DOB_EC">
					<span>DOB EC</span>
				</div>
				<div id="DOB_GC">
					<span>DOB GC</span>
				</div>
				<img id="Rectangle_2" src="<?php echo 'http://localhost:8080/' . $row['photo']; ?>">

				<svg class="Rectangle_1_">
					<rect id="Rectangle_1_" rx="0" ry="0" x="0" y="0" width="636" height="299">
					</rect>
				</svg>
				<div id="Resident_Address_">
					<span>Resident Address </span>
				</div>
				<div id="Phone_Number">
					<span>Phone Number</span>
				</div>
				<div id="Phone_Number_">
					<span>Phone Number</span>
				</div>
				<div id="House_No_">
					<span>House No. </span>
				</div>
				<div id="Emergency_Contact_">
					<span>Emergency Contact </span>
				</div>
				<div id="ZEDAGEM_SHIFERAW_DEMELASH_">
				<span><?php echo $row['EfirstName'] . " " . $row['EfatherName'] . " " . $row['EgrandFatherName']; ?></span>
				</div>
				<div id="ID0933713899">
				<span><?php echo "0".$row['phoneNumber']; ?></span>
				</div>
				<div id="ID0933713899_">
				<span><?php echo $row['EphoneNumber']; ?></span>
				</div>
				<div id="ARADAWOREDA_7">
					<span><?php echo $row['PURregion'] . "/" . $row['PURzone'] . "/" . $row['PURcity']. "/W" . $row['PURworeda']; ?></span>
				</div>
				<div id="Blood_Group_ba">
					<span>Blood Group</span>
				</div>
				<div id="ID1871">
					<span><?php echo $row['houseNumber']; ?></span>
				</div>
				<div id="O_bc">
					<span><?php echo $row['EbloodGroup']; ?></span>
				</div>
				<div id="Full_Name__bd">
					<span>Full Name </span>
				</div>
				<div id="Full_Name_Amharic_be">
					<span>Full Name (Amharic)</span>
				</div>
				<div id="ZEDAGEM_SHIFERAW_DEMELASH_bf">
				<span><?php echo $row['EfirstNameA'] . " " . $row['EfatherNameA'] . " " . $row['EgrandFatherNameA']; ?></span>
				</div>
				<svg class="Line_1" viewBox="0 0 406 1">
					<path id="Line_1" d="M 0 0 L 406 0">
					</path>
				</svg>
			</div>


	<?php
		}

		unset($stmt);
		unset($stmt2);
	}
	if (isset($_POST['done'])) {
		if (strcmp(trim($requestType), $civilLost) == 0) {
			$sql3 = "UPDATE request SET stat=1, requestType='CIVIL' WHERE id='$id'";
			$stmt3 = $pdo->prepare($sql3);
			if ($stmt3->execute()) {
				$sql4 = "UPDATE civilrequest SET lost = lost + 1 WHERE id='$id'";
				$stmt4 = $pdo->prepare($sql4);
				if ($stmt4->execute()) {
					header("location:pending.php");
				}
			}
		} else {
			$sql3 = "UPDATE request SET stat=1 WHERE id='$id'";
			$stmt3 = $pdo->prepare($sql3);
			if ($stmt3->execute()) {
				header("location:pending.php");
			}
		}
	}
	unset($stmt3);
	unset($sql3);
	?>
</body>

</html>