<?php
// Include config file
require_once "dbconnection.php";
 
// Define variables and initialize with empty values
$phoneNumber = $password = $hash_password= $firstName=$middleName=$lastName=$houseNumber=$dateOfBirth=$photo=$email="";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $phoneNumber = trim($_POST["phoneNumber"]);
    $password = trim($_POST["password"]);


        // Prepare a select statement
        $sql = "SELECT *
         FROM resident WHERE Phone = :phoneNumber";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":phoneNumber", $phoneNumber, PDO::PARAM_STR);
            
            // Attempt to execute the prepared statement
            $stmt->execute();

                if($stmt->rowCount() == 1){
                            $row = $stmt->fetch();
                            $hash_password = $row['password'];

                        if(password_verify($password,$hash_password)){
                            $firstName = $row["FirstName"];
                            $middleName = $row["MiddleName"];
                            $lastName = $row["LastName"];
                            $dateOfBirth = $row["DOB"];
                            $houseNumber = $row["Housenum"];
                            $phoneNumber=$row["Phone"];
                            $photo=$row["Photo"];
                            $email=$row["email"];
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["FirstName"] = $firstName;
                            $_SESSION["MiddleName"] = $middleName;
                            $_SESSION["LastName"] = $lastName;
                            $_SESSION["DOB"] = $dateOfBirth;
                            $_SESSION["houseNumber"] = $houseNumber;
                            $_SESSION["phoneNumber"] = $phoneNumber;
                            $SESSION["profile_photo"]=$photo;
                            $_SESSION["email"]=$email;
                            header("location: user/userDashboard.php");

                        }
                    
                        else{
                            $username_err = "<strong style='color:red'> Phone Number or Password error ! </strong>";
                        }
                    
                }
                else{
                    echo 'nothing on the row';
                }
            }
            else{
                echo 'nothing prepared';
            } 

          
    // Close statement
unset($stmt);
// Close connection
unset($pdo);    
}



?>

<?php include 'header.php'; ?>

        <title>Login Page</title>
        <style>
            body{
                background-color: #C4E8F1;
            }
            .btn{
                width:20vw;
                height:3vw;
                color: white;
                background-color: #090A4E;
                font-size: 1vw;
            }
            .v-center{
                margin-top: 5vw;
            }
            img{
                width: 500px;
                
            }

            input[type=tel], input[type=password],input[type=text]{
                width:30vw;
                height:3.5vw;
                background-color:#C4E8F1;
                border-color:#662D8D;
                border-radius:12px;
                color: black;
                padding:10px;
                margin-bottom:10px;
                font-size: 1.5vw;
                box-sizing: border-box;
            }
          

        </style>


       
    </head>
    
    <body>
        <div class="container">

                <div class="row ">
                    <div class="col v-center">
                        

                        <div class="form-signin m-5 text-center">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                           
                            <h1 class="mb-4">SIGN IN </h1>

                                <div class="form-floating mb-3">
                                    <input type="tel" name="phoneNumber" placeholder="Phone Number" 
                                    
                                    required>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" name="password" placeholder="Password" required>
                                </div>

                                <?php echo $username_err;?>

                                <div > 
                                    <input class = "btn"type="submit" name="submit" value="SIGN IN">
                                    <p class="mt-3">Don't have an account? <a href='signupPage.php'> Sinup</a></p>
                                </div>
                           
                            
                           

                    
                        
                            </form>

                        </div>
                 </div>
        



                <?php include 'rightSideArt.php';?>

        	</div>
		</div>
    </body>
</html>
