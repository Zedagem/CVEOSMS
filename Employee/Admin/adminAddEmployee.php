<?php
//Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
?>

<?php
 include '../../dbconnection.php';
    $emp="";
    $ept1='adm/';
    $ept2='cle/';
    $ept3='cas/';
    $ept4='man/';
    $empID= "";
    $Emptype= "";
    $fname="";
    $mname="";
	$lname="";
	$sex="";
	$DOB="";
	$housenum="";
    $phone="";
    $newFileName="";
	$email="";
	$hashpas="";
    $photo="";
    $random=rand(10000,99999);

   
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $fname=$_POST['firstName'];
        $mname=$_POST['fatherName'];
        $lname=$_POST['grandFatherName'];
            switch($_POST['sex']){
                case 'Male':
                $sex="male";
                break;
                case 'Female':
                $sex="female";
                break;
                default:
                echo "You must input Gender of the employee";
                break;
            }
                $DOB=$_POST['dateInGC'];
                $housenum=$_POST['houseNumber'];
                $phone=$_POST['phoneNumber'];
                $email=$_POST['email'];
        
            if(empty($_FILES['photoUpload'])){
                    $error = 'This field is required.';
            }
            else{
                    $file_ext=strtolower(end(explode('.',$_FILES['photoUpload']['name'])));
                    
                    if(!in_array($file_ext,array('jpeg','gif','png','jpg','pdf'))){
                            $error = 'JPG, JPEG, PNG and GIF are only supported.';
                        }
                    elseif($_FILES['photoUpload']['size']>2097152){
                            $error = 'File should not be more than 2MB.';
                        }
                    else{
                        //time() is added below to make the filename unique
                        //change the folder directory according to your directory organization
                        $newFileName = '/CVEOSMS/employee/profile/'.time().$_FILES['photoUpload']['name'];
                        move_uploaded_file($files['photoUpload']['tmp_name'],$newFileName);
                        //file uploaded
                        //panda you will just store the $newFileName to the database and when you retrieve you will put this filename in the <img src="fileNameFromDatabase"> to display

                    }
    }
     
    if(isset($_POST['employeeType']))
    {
            echo "this is working";
            $emp= $_POST['employeeType'];
    }
    else{
            echo "its not working";
    }
	$pas=password_hash(trim($_POST["password"]),PASSWORD_DEFAULT );
   

    switch($emp){
        case 'Admin':
        $Emptype="Admin";
        break;
        
        case 'Clerk':
        $Emptype="Clerk";
        break;
        
        case 'Cashier':
        $Emptype="Cashier";
        break;
        
        case 'Manager':
        $Emptype="Manager";
        break;

        default:
        break;

    }
   
    switch($Emptype){
        case 'Admin':
        $empID=$ept1.$random;
        break;
        case 'Clerk':
        $empID=$ept2.$random;
        break;
        case 'Cashier':
        $empID=$ept3.$random;
        break;
        case 'Manager':
        $empID=$ept4.$random;
        break;
        default:
        echo "You must input employee type";
        break;

    }
    $sql = "INSERT INTO Employee (EmployeeID,EmployeeType,Phone,Email,FirstName,MiddleName,LastName,sex,DOB,photo,HouseNumber,Pword)
    VALUES ('$empID', '$Emptype', '$phone', '$email', '$fname', '$mname', '$lname','$sex', '$DOB', '$newFileName','$housenum','$pas')";
  
   try{ $pdo->exec($sql);
    echo <<< EOF
    <script> alert('Employee Successfully Added ') </script>;
EOF;
    }
   catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
}
 

//$pdo = close;
?>
<!DOCTYPE html>
<html>
<head>
<?php include '../../header.php' ?>
<?php include 'adminTemplet.php' ?>

<link rel="stylesheet" type="text/css" href="../../css/style.css">

<title>Add Employee </title>

</head>

<body>
  
    
    <h2 class="mt-5 text-center">Create Employee Account </h2>

    <div class="container-fluid">
    <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="row g-3 mt-3 ">
            <h4>Personal Information</h4>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="firstName" placeholder="First Name" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg ">
                <input type="text" name="fatherName" placeholder="Father Name" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="grandFatherName" placeholder="Grand Father Name" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
        <select class="form-select input-style"  required name="sex">
            <option selected>Sex</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="text" name="houseNumber" placeholder="House Number" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="tel" name="phoneNumber" pattern="[0-9]{10}" placeholder="Phone Number" class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="email" name="email" placeholder="Email " class="form-control input-style" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
                <input type="password" name="password" placeholder="Password " class="form-control input-style" required>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 input-group-lg">
            <select class="form-select input-style" name="employeeType" required > 
            <option value="">Employee_Type</option>
                <option value="Admin">Admin</option>
                <option value="Clerk">Clerk</option>
                <option value="Cashier">Cashier</option>
                <option value="Manager">Manager</option>
            </select>
 <?php  
 
 
 ?>
    </div>

            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                <label for="dateInGC" class="form-label">Date of Birth in G.C</label>
                <input id="dateInGC" name='dateInGC' type="date" class="form-control input-style" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 input-group-lg">
                <label for="photoUpload" class="form-label">Photograph</label>
                <input type="file" name="photoUpload" id="photoUpload" class="form-control input-style" required>
            </div>  
            <div class="col-lg-2 col-md-2 col-sm-4 input-group-lg">
            <input type="submit" value="Create" name="submit" class="form-control btn btn-primary ">
            </div>
    </form>
    
</body>
</html>
