<?php
//Initialize the session
session_start();

$id=trim($_SESSION["EmployeeID"]);
$cut = substr($id, 0, -6);



// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true  || strcmp($cut,'cle') != 0) {
  
    header("location: http://localhost/Employee/login.php");
    exit;

}
?>

<?php include '../../header.php' ?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">

<title>Registration Page  </title>

</head>

<body>
    <?php include 'clerkTemplet.php' ?>
    <h2 class="mt-5 text-center">Certificate Registration Page </h2>

    
        <div style= "width:50%; margin:auto;text-align:center " >
            <form  class="mt-5" action="redirectPage.php" method="post">

            
                <input type="text" name="userID" placeholder="User ID" id="userID" class="form-control input-style" required >
            
            
                <select  name="requestType" class=" mt-3 form-select input-style" required>
                    <option value="">Type of Request</option>
                    <option value="BIRTH ">Birth </option>
                    <option value="DEATH">Death</option>
                    <option value="MARRIAGE">Marriage</option>
                    <option value="DIVORCE">Divorce</option>
                    <option value="CIVIL">Civil</option>
                </select>
                <input type="submit" name="next" value="NEXT" class="form-control btn btn-primary mt-4">
           

            </form>

        </div>







    </div>
</body>

</html>