<div class="container-fluid"> 
    <div class="sidenav text-center">
            <div class="pt-3 pb-5"> 
                <a id="logo" href="">CVEOSMS</a>
            </div>

            <div>
                <ul>
                    <li class="mb-4"><img class="rounded-circle"  src="../../img/profile.png" alt="profile picture" width="100vw" height="100vw"></li>
                    <li><?php echo $_SESSION["EmployeeID"]?></li>
                    <li><?php echo $_SESSION["firstName"]." " .$_SESSION["middleName"]?></li>
                    <li><?php echo $_SESSION["email"]?></li>
                    <li>Ethiopia</li>
                   

                   
                </ul>
            </div>

            <div class="mt-5">
            <a href="adminAddEmployee.php">Add Employee</a>
            </div>

            <div class="mt-5">
            <a href="adminDeleteEmployee.php">Delete Employee</a>
            </div>

            <div class="mt-5">
            <a href="listOfEmployees.php">View List of Employee</a>
            </div>


            <div class="mt-5 mb-5">
            
            <a href="../sessionDestroy.php">LogOut</a>
     
            </div>
            
            
        </div>

    <div class="main mt-5" >
        
      
       