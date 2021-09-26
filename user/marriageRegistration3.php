<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../loginPage.php");
    
}
?>
<?php include '../header.php';


$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['next'])) {
        // code...
        foreach ($_POST as $key => $value) {
            // code...
            $_SESSION['marriageInfo'][$key] = $value;
        }
        $key = array_keys($_SESSION['marriageInfo']);
        if (in_array('next', $key)) {
            // code...
            unset($_SESSION['marriageInfo']['next']);
   
        }
        if (empty($_FILES['certFromInst']['name'])) {
            $error = 'This field is required.';
        } else {

            if ($_FILES['certFromInst']['size'] > 2097152) {
                $error = 'File should not be more than 2MB.';
            } else {

                $_SESSION['certFromInst'] = 'files/marriage/' . time() . $_FILES['certFromInst']['name'];
                move_uploaded_file($_FILES['certFromInst']['tmp_name'], "../" . $_SESSION['certFromInst']);

                header('Location:displaymarriage.php');
            }
        }
        
    }
}




?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script src="../js/regionSelection.js"></script>

<title>Marriage Registration Information Regarding the Marriage</title>
  
</head>
<body>
    <?php include 'userTemplet.php'?>
    <h2 class="mt-5">Federal Democratic Republic of Ethiopia Marriage Registration</h2>

<div class="container-fluid">
    
    <!-- <div class="row text-center mt-5">
        <div class="col-lg-6 col-md-6 ">
             <a class="nav-active" href="marriageRegistration.php"> New Application</a> 
         </div>
        <div class="col-lg-6"> <a href="lost.php"> Lost </a></div>
         
         
    </div> -->


    <form class="row g-3 mt-3 "enctype="multipart/form-data" method="POST">
    <h4> Information Regarding the Marriage</h4>
    


        <div class="col-lg-4 col-md-12 col-sm-12 input-group-lg">
        <label for="dateInGC" class="form-label">Date of Occurance in G.C</label>
            <input id="dateInGC" type="date"  name="occurancedate" min="1921-01-01" max ="<?php echo $currentDate?>" value="<?= isset($_SESSION['marriageInfo']['occurancedate']) ? $_SESSION['marriageInfo']['occurancedate'] : ''; ?>" class="form-control input-style" required >
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 text-center d-none d-lg-block">
            <img class="mt-3" src="../Icons/switch.svg" alt="switch">
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
        <label for="dateInEC" class="form-label">Date of Occurance in E.C</label>
            <input id="dateInEC"type="date"  name="dateOccuranceEC" min="1913-01-01" max ="<?php echo $currentDateEC?>" value="<?= isset($_SESSION['marriageInfo']['dateOccuranceEC']) ? $_SESSION['marriageInfo']['dateOccuranceEC'] : ''; ?>" class="form-control input-style" required >
        </div>

           
  
 <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
     <label> </label>
            <input type="text" name="officiatingInstitution" value="<?= isset($_SESSION['marriageInfo']['officiatingInstitution']) ? $_SESSION['marriageInfo']['officiatingInstitution'] : ''; ?>"  placeholder= "Officiating Institution" class="form-control input-style text-uppercase" required >
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
            
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <label for="certFromInst"> Officiating Institution </label>
                <input type="file" name="certFromInst" id="certFromInst" accept=".jpeg,.png,.jpg,.pdf" class="form-control input-style" required>
                <small class="form-text text-muted">Supported type (.jpeg .png .jpg .pdf )</small>
                <?php echo $error; ?>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
            
            </div>
    
        <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <a class="form-control btn btn-primary " href="marriageRegistration2.php "> PREVIOUS</a>

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="submit" name="next" value="NEXT" class="form-control btn btn-primary ">
            </div>
   

        
    </form>
  
    
</div>





  



</body>
</html>