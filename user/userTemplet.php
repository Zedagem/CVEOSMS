
<?php 
if(isset( $_SESSION["EmployeeID"]))
{
   
}

else{
 if(include "../dbconnection.php"){
 $phoneNumber = $_SESSION['phoneNumber'];
    $sql = "SELECT * FROM resident where Phone = '$phoneNumber' ";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();
    $row = $stmt->fetch();
    $_SESSION['profile_pic']=$row['Photo'];

    $sql2 = "SELECT * FROM household where phoneNumber = '$phoneNumber' ";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2 -> execute();
    $row2 = $stmt2->fetch();
 }
 unset($sql);
 unset($stmt);
 unset($sql2);
 unset($stmt2);
 unset($row);
 unset($row2);
 ?>
 <div class="container-fluid"> 
    <div class="sidenav text-center">
            <div class="pt-3 pb-3 "> 
                <a id="logo" href="userDashboard.php">CVEOSMS</a>
            </div>

            <div>
                <ul>
                    <li class="mb-4"><img class="rounded-circle"  src="<?php echo "http://localhost/". $_SESSION['profile_pic'];?>" alt="profile picture" width="100vw" height="100vw"></li>
                    <li><?php echo $_SESSION["FirstName"] . " " .$_SESSION["MiddleName"] ?></li>
                    <li><?php echo $_SESSION["email"] ?></li>
                    <li><?php echo "+251".$_SESSION["phoneNumber"] ?></li>
                    <li>Ethiopia</li>

                </ul>
            </div>

            <div class="mt-5">
            <a href="userDashboard.php">Services</a>
            </div>

            <div class="mt-5">
            <a href="userProfile.php">Profile</a>
            </div>

            <!-- <div class="mt-5">
            <a href="notification.php">Notification</a>
            </div> -->

            <div class="mt-5">
            <a href="../sessionDestroy.php">LogOut</a>
            </div>
            
            
        </div>

    <div class="main mt-5" >
        
       <div>
           <ul class="nav col-lg-6 col-md-6">
                <li class="nav-item me-5">
                    <a href="userDashboard.php">Home</a>
                </li>
                
                    <li class="nav-item me-5">
                    <div class="dropdown" >
                        <a class="text-decoration-none dropdown-toggle"href="#" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false" >Services</a>
                        <ul id="dropdownSize" class="dropdown-menu shadow" aria-labelledby="dropdownUser2">
                            <li><a class="dropdown-item" href="birthRegistration.php">Birth Registration</a></li>
                            <li><a class="dropdown-item" href="marriageRegistration.php">Marriage Registration</a></li>
                            <li><a class="dropdown-item" href="divorceRegistration.php">Divorce Registration</a></li>
                            <li><a class="dropdown-item" href="civilRegistration.php">Civil Registration</a></li>
                            <li><a class="dropdown-item" href="deathRegistration.php">Death Registration</a></li>
                            
                        </ul>
                    </div>    
                    </li>
                
                <li class="nav-item me-5 ">
                    <a href="contactUs.php">Contact Us</a>
                </li>

            </ul>

       </div>
<?php } ?>