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

<title>Civil Registration Information Regarding Emergency Contact</title>
  
</head>
<body>
    <?php include 'userTemplet.php'?>
    <h2 class="mt-5">Federal Democratic Republic of Ethiopia civil Registration</h2>

<div class="container-fluid">
    
    <div class="row text-center mt-5">
        <div class="col-lg-6 col-md-6 ">
             <a class="nav-active" href="birthRegistration.php"> New Application</a> 
         </div>
        <div class="col-lg-6"> <a href="lost.php"> Lost </a></div>
         
         
    </div>


    <form class="row g-3 mt-3 ">
    <h4> Information Regarding Emergency Contact</h4>
    
       
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
       
       

     

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <select class="form-select input-style">
                    <option>Blood Group</option>
                    <option value="A-">A-</option>
                    <option value="A+">A+</option>
                    <option value="B-">B-</option>
                    <option value="B+">B+</option>
                    <option value="AB-">AB-</option>
                    <option value="AB+">AB+</option>
                    <option value="O-">O-</option>
                    <option value="O+">O+</option>
                </select>
            </div>
<div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
<input type="tel" name="phoneNumber" placeholder="Phone Number" 
                                    pattern="[0-9]{10}"
                                    class="form-control input-style" required>           



        
    </form>

   
    
</div>





  



</body>
</html>