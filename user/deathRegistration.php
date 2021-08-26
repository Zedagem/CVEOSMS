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

<title>Death Registration</title>
  
</head>
<body>
    <?php include 'userTemplet.php'?>
    <h2 class="mt-5">Federal Democratic Republic of Ethiopia Death Registration</h2>

<div class="container-fluid">
    
    <div class="row text-center mt-5">
        <div class="col-lg-6 col-md-6 ">
             <a class="nav-active" href="birthRegistration.php"> New Application</a> 
         </div>
        <div class="col-lg-6"> <a href="lost.php"> Lost </a></div>
         
         
    </div>


    <form class="row g-3 mt-3 ">
    <h4>Deceased Information</h4>
    
        <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
            <input type="text" name="firstName" placeholder= "First Name" class="form-control input-style" required >
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
            <input type="text" name="fatherName" placeholder= "Father Name" class="form-control input-style"required >
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
            <input type="text" name="grandFatherName" placeholder= "Grand Father Name" class="form-control input-style"required >
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
            <input type="text" name="firstNameA" placeholder= "First Name (In Amharic)" class="form-control input-style"required >
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
            <input type="text" name="fatherNameA" placeholder= "Father Name (In Amharic)" class="form-control input-style"required >
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
            <input type="text" name="grandFatherNameA" placeholder= "Grand Father Name (In Amharic)" class="form-control input-style"required >
        </div>

       
       

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
                <select class="form-select input-style">
                    <option>Occupational Type</option>
                    <option value="Employed">Employed</option>
                    <option value="Unemployed">Unemployed</option>
                    <option value="Student">Student</option>
                    <option value="Business Owner">Business Owner</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style">
                    <option>Educational Status</option>
                    <option value="High School Graduate">High School Graduate</option>
                    <option value="Some College">Some College</option>
                    <option value="Associate Degree">Associate Degree</option>
                    <option value="Bachelor's Degree">Bachelor's Degree</option>
                    <option value="MBA, master's">MBA, master's</option>
                    <option value="Doctorate">Doctorate</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style">
                    <option>Religion</option>
                    <option value="Christian">Christian</option>
                    <option value="Islam">Islam</option>
                    <option value="Jewish">Jewish</option>
                    <option value="Baháʼí Faith">Baháʼí Faith</option>
                    <option value="Atheist">Atheist</option>
                    <option value="other">Other</option>
                </select>
            </div>

             <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
            <input type="text" name="nationality" placeholder= "Nationality" class="form-control input-style" >
        </div>


           <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style">
                    <option>Marital-Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Separated">Separated</option>
                
                </select>
            </div>
 
 <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="id" placeholder="Identification Number" class="form-control input-style">
            </div>



        
    </form>

   
    
</div>





  



</body>
</html>