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
<title>User Dashboard</title>

  
</head>
<body>
<?php include 'userTemplet.php'?>

<div class="row"> 

<div class="text-center mt-5 mb-5 col-lg-12">
    <h2> WELCOME  <?php echo $_SESSION["FirstName"] . " ". $_SESSION["MiddleName"]. " ". $_SESSION["LastName"] ?></h2>
</div>


</div >
<div class="container-fluid text-center">
<div class="row">

<div class=" col-lg-6 col-md-6">
    <button onclick="location.href='birthRegistration.php'" class="border">
        <div class="svg">
            <img src="../Icons/baby.svg" alt="baby svg file">
        </div>
        <h3>Birth Registration & Certification</h3>
       
        <p>This is a vital record that documents the birth of a person. You can fill out a form to register the birth and obtain a certification for it.     </p>
    </button>
</div>

<div class=" col-lg-6 col-md-6 ">
<button onclick="location.href='marriageRegistration.php'" class="border">
        <div class="svg">
       
            <img src="../Icons/ring.svg" alt="ring svg file">
        </div>
        <h3>Marriage Registration & Certification</h3>
        <p> This is an official statement of your marriage. You can fill out a form to register your marriage and obtain a certification for it.     </p>
</button>
</div>


</div>

<div class="row">

<div class=" col-lg-6 col-md-6 ">
<button onclick="location.href='civilRegistration.php'" class="border">
    
        <div class="svg">
        
            <img src="../Icons/idCard.svg" alt="Id Card svg file">
        </div>
        <h3>Civil Registration & Certification</h3>
        <p>  This is the system by which a government records its citizens and residents. By filling out the forms you can obtain an Identification Card  </p>
</button>
</div>

<div class=" col-lg-6 col-md-6 ">
<button onclick="location.href='deathRegistration.php'"class="border">
        <div class="svg">
        
            <img src="../Icons/tombStone.svg" alt="Tomb Stone svg file">
        </div>
        <h3>Death Registration & Certification</h3>
        <p> This is a legal document issued by a the government civil registration office. Applying to this you can obtain a death certification and registrar your dead</p>
</button>
</div>


</div>

</div>



   
</body>
</html> 


