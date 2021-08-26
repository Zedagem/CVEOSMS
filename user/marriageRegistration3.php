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
<script src="../js/regionSelection.js"></script>

<title>Marriage Registration Information Regarding the Marriage</title>
  
</head>
<body>
    <?php include 'userTemplet.php'?>
    <h2 class="mt-5">Federal Democratic Republic of Ethiopia Marriage Registration</h2>

<div class="container-fluid">
    
    <div class="row text-center mt-5">
        <div class="col-lg-6 col-md-6 ">
             <a class="nav-active" href="birthRegistration.php"> New Application</a> 
         </div>
        <div class="col-lg-6"> <a href="lost.php"> Lost </a></div>
         
         
    </div>


    <form class="row g-3 mt-3 ">
    <h4> Information Regarding the Marriage</h4>
    
       

       
       

        <div class="col-lg-4 col-md-12 col-sm-12 input-group-lg">
        <label for="dateInGC" class="form-label">Date of Occurance in G.C</label>
            <input id="dateInGC" type="date"  class="form-control input-style" required >
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 text-center d-none d-lg-block">
            <img class="mt-3" src="../Icons/switch.svg" alt="switch">
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
        <label for="dateInEC" class="form-label">Date of Occurance in E.C</label>
            <input id="dateInEC"type="date"  class="form-control input-style" required >
        </div>

           
  
 <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
            <input type="text" name="officiatingInstitution" placeholder= "Officiating Institution" class="form-control input-style" required >
        </div>



        
    </form>

   
    
</div>





  



</body>
</html>