<?php
//Initialize the session
session_start();

$id=trim($_SESSION["EmployeeID"]);
$cut = substr($id, 0, -6);



// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true  || strcmp($cut,'cle') != 0) {
  
    header("location: http://localhost:8080/Employee/login.php");
    exit;

}
?>
<?php include '../../header.php'?>

<?php require_once "../../dbconnection.php" ?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">

<title>Edit Profile</title>

</head>

<body>
    <?php include 'clerkTemplet.php' ?>
   

   <?php  
   if(isset($_POST['submit'])){
   $Currentemail=$newEmail=$email=$submit=$id=$sql1=$sql="";
   

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $Currentemail= trim($_POST["currentEmail"]);
     if(isset($Currentemail)){
            echo "$Currentemail";
        }

        $newEmail= trim($_POST["newEmail"]);
    if(isset($newEmail)){
            echo "$newEmail";
        }

        $email=$_SESSION["email"];
        //$submit= trim($_POST["submit"]);
        
        $id = $_SESSION["EmployeeID"];     

     if ($Currentemail==$email){
         
        // Prepare a update statement
        $sql = "UPDATE employee SET email='$newEmail' WHERE EmployeeID = '$id'";

        $stmt = $pdo->prepare($sql);
            
        // Attempt to execute the prepared statement
        $stmt->execute();
        echo <<< EOF
        <script> alert('the email has been changed') </script>;
    EOF;
        
        }

    else {
        echo <<< EOF
                <script> alert('the email is not correct') </script>;
            EOF;
    }
}
unset($stmt);
unset($pdo);
}
elseif(isset($_POST['submit1'])){

require_once "../../dbconnection.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
$currentPW=$newPW=$confirmPW="";
$id=  $_SESSION["EmployeeID"];


$currentPW= trim($_POST["currentPassword"]);
if(isset($currentPW)){
    echo "$currentPW";
}
$newPW= trim($_POST["newPassword"]);
if(isset($newPW)){
    echo "$newPW";
}
$confirmPW=trim($_POST["confirmPassword"]);
if(isset($confirmPW)){
    echo "$confirmPW";
}


$sql1="SELECT Pword from employee WHERE EmployeeID = '$id'";
$stmt = $pdo->prepare($sql1);
$stmt->execute();   
if($stmt->rowCount() == 1){
        $row = $stmt->fetch();
        // $dehashPW =);
    } 
if( password_verify($currentPW,$row['Pword'])){
    // Prepare a update statement
    
           
        if($newPW==$confirmPW){
                $hash_password = password_hash($newPW, PASSWORD_DEFAULT);
                $sql2 = "UPDATE employee SET Pword='$hash_password' WHERE EmployeeID = '$id'";
                // if(password_verify($password,$hash_password)){

                // }
                $stmt2 = $pdo->prepare($sql2);
                
               
                    
                // Attempt to execute the prepared statement
                $stmt2->execute();
                    echo <<< EOF
                    <script> alert('the password has been changed : ') </script>;
                EOF;
                }
                else{
                    echo <<< EOF
                    <script> alert('make sure the new passwords are the same') </script>;

                EOF;
                } 
           }

    else {
        echo <<< EOF
                <script> alert('the password is not correct') </script>;
            EOF;
         }
    }
}
?>

    <h2 class="mt-5 text-center">Clerk Edit Profile </h2>
    <div class="container-fluid">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="row g-3 mt-5">


            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                <input type="email" name="currentEmail" placeholder="Current Email " required class="form-control input-style">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                <input type="email" name="newEmail" placeholder="New Email " required class="form-control input-style">
            </div>

            <div class="col-lg-2 col-md-2 col-sm-4 input-group-lg">
                <input type="submit" value="Change" name="submit" class="form-control btn btn-primary ">
            </div>
     
    


        </form>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="row g-3 mt-5">


            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                <input type="password" name="currentPassword" required placeholder="Current Password " class="form-control input-style">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                <input type="password" name="newPassword" required placeholder="New Password " class="form-control input-style">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                <input type="password" name="confirmPassword" required placeholder="Confirm Password " class="form-control input-style">
            </div>

            <div class="col-lg-2 col-md-2 col-sm-4 input-group-lg">
                <input type="submit" value="Change" name="submit1" class="form-control btn btn-primary ">
            </div>


        </form>





    </div>



    </div>
</body>

</html>