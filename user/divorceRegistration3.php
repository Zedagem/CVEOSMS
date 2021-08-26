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

<title>Divorce Registration Wife Information</title>
  
</head>
<body>
    <?php include 'userTemplet.php'?>
    <h2 class="mt-5">Federal Democratic Republic of Ethiopia Divorce Registration</h2>

<div class="container-fluid">
    
    <div class="row text-center mt-5">
        <div class="col-lg-6 col-md-6 ">
             <a class="nav-active" href="birthRegistration.php"> New Application</a> 
         </div>
        <div class="col-lg-6"> <a href="lost.php"> Lost </a></div>
         
         
    </div>


    <form class="row g-3 mt-3 ">
       
       

        <div class="col-lg-4 col-md-12 col-sm-12 input-group-lg">
        <label for="dateInGC" class="form-label">Date of Birth in G.C</label>
            <input id="dateInGC" type="date"  class="form-control input-style" required >
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 text-center d-none d-lg-block">
            <img class="mt-3" src="../Icons/switch.svg" alt="switch">
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
        <label for="dateInEC" class="form-label">Date of Birth in E.C</label>
            <input id="dateInEC"type="date"  class="form-control input-style" required >
        </div>

            <label for="placeOfBirth" class="form-label">Place of Birth</label>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
           
                <select id="placeOfBirth" class="form-select input-style" onchange="countryChange(this);" required>
                    <option >Region/City</option>
                    <option value="Addis Ababa">Addis Ababa</option>
                    <option value="Afar">Afar</option>
                    <option value="Amhara">Amhara</option>
                    <option value="Benishangul-Gummuz">Benishangul-Gummuz</option>
                </select>
            </div>
            
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                
                <select id="country" class="form-select input-style" required>
                    <option value="0">Zone/City Administration</option>
                </select>
                
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="city" placeholder="City" class="form-control input-style" >
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 input-group-lg">
                <input type="number" name="woreda" placeholder="Woreda" class="form-control input-style"required >
            </div>
          
 <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="nameOfCourt" placeholder="Name of the Court that Approved the Divorce" class="form-control input-style">
            </div>
<div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="courtRegistration" placeholder="Court Registration number" class="form-control input-style">
            </div>
<div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="numberOfChildren" placeholder="Number of the Children that were Dependent Before the Divorce" class="form-control input-style">
            </div>


        
    </form>

   
    
</div>





  



</body>
</html>