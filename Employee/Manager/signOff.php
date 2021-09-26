<?php
//Initialize the session
session_start();

$id=trim($_SESSION["EmployeeID"]);
$cut = substr($id, 0, -6);



// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true  || strcmp($cut,'man') != 0) {
  
    header("location: http://localhost/Employee/login.php");
    exit;

}
?>

<?php include '../../header.php' ?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">

<title>SIGN OFF Page</title>

</head>

<body>
    <?php include 'managerTemplet.php' ?>
    <h2 class="mt-5 text-center">SIGN OFF </h2>
    
    <?php
   $EmployeeID= $_SESSION["EmployeeID"];
    try {

        $sql = "SELECT * From request  WHERE readEmp = 1 AND readManager = 0 ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    while ($row = $stmt->fetch()) {

        if ($row['requestType'] == 'BIRTH') {
            $rowID= $row['id'];
            $birthsql="SELECT household.houseNumber, household.fname, household.mname ,birthrequest.*,request.* FROM household 
            INNER JOIN request ON household.id = request.applierId INNER JOIN birthrequest ON request.id = birthrequest.id
            where '$rowID' = birthrequest.id AND request.readEmp = 1 ";
            $birthstmt = $pdo->prepare($birthsql);
            $birthstmt ->execute();
            $brow =$birthstmt->fetch();
            ?>
            
            <div class="row " style="height:120px; padding-top:25px; background-color:#A7CDED">
                 <div>
                    
                 </div>
                 <div class="col">
                     <?php echo $brow['fname'] ." ".$brow['mname'] ?>
                     <p><small>House Number. <?php echo $brow['houseNumber']  ?></small></p>
                 </div>
                <div class="col">
                <?php echo $brow['requestType'] . " Request" ?>
                </div>
                <div class="col">
                <?php echo $brow['appliedDate'] ?>
                </div>
                <div class="col">
                <a target="_blank" href="../birthView.php?id=<?php echo $brow['id']; ?>">View Full Request</a>      
                </div>
            </div>
            <div class="row pb-3">
                
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    </div>
                <div class="col">
                    Hospital Certificate
                </div>
                <div class="col">
                <a target="_blank" href="<?php echo 'http://localhost/' . $brow['hospitalBirthCert'] ?>">View</a>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    </div>
                
                <div class="col">
                Child Photo
                </div>
                <div class="col">
                <a target="_blank" href="<?php echo 'http://localhost/' . $brow['childPhoto'] ?>"> View </a>
                </div>
            </div>
            <div class="row pb-3">
                
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    </div>
                <div class="col">
                    Mother ID
                </div>
                <div class="col">
                <a target="_blank" href="<?php echo 'http://localhost/' . $brow['motherId'] ?>">View</a>
                </div>
            </div>
            <div class="row pb-3">
                
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    </div>
                <div class="col">
                    Father ID
                </div>
                <div class="col">
                <a target="_blank" href="<?php echo 'http://localhost/' . $brow['fatherId'] ?>">View</a></td>
                </div>
            </div>
            <div class="row pb-3">
                
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    </div>
                <div class="col">
                <a class='form-control btn btn-primary' href="sign.php?id=<?php echo $row['id']; ?> &EmployeeID=<?php echo $EmployeeID; ?>">Approve</a>   
                </div>
                <div class="col">
                <a class='form-control btn btn-primary' href="declineM.php?id=<?php echo $row['id']; ?>&applierId=<?php echo $row['applierId']; ?> &requestType=<?php echo $row['requestType']; ?>  &EmployeeID=<?php echo $EmployeeID; ?>">Decline</a>
                </div>
            </div>
        
        
        <?php } elseif ($row['requestType'] == 'DEATH') {

              $rowID= $row['id'];
              $deathsql="SELECT household.houseNumber, household.fname, household.mname ,deathrequest.*,request.* FROM household 
              INNER JOIN request ON household.id = request.applierId INNER JOIN deathrequest ON request.id = deathrequest.id
              where '$rowID' = deathrequest.id AND request.readEmp = 1 ";
              $deathstmt = $pdo->prepare($deathsql);
              $deathstmt ->execute();
              $drow =$deathstmt->fetch();
              ?>
              
              <div class="row " style="height:120px; padding-top:25px; background-color:#A7CDED">
                 
                  <div class="col">
                      <?php echo $drow['fname'] ." ".$drow['mname'] ?>
                      <p><small>House Number. <?php echo $drow['houseNumber']  ?></small></p>
                  </div>
                  <div class="col">
                  <?php echo $drow['requestType'] . " Request" ?>
                  </div>
                  <div class="col">
                  <?php echo $drow['appliedDate'] ?>
                  </div>
                  <div class="col">
                  <a target="_blank" href="../deathView.php?id=<?php echo $drow['id']; ?>">View Full Request</a>      
                  </div>
              </div>
              <div class="row pb-3">
                  
                  <div class="col">
                      
                  </div>
                  <div class="col">
                      
                      </div>
                  <div class="col">
                     Photograph
                  </div>
                  <div class="col">
                  <a target="_blank" href="<?php echo 'http://localhost/' . $drow['photo'] ?>">View</a>
                  </div>
              </div>
              <div class="row pb-3">
                  
                  <div class="col">
                      
                  </div>
                  <div class="col">
                      
                      </div>
                  <div class="col">
                     Certificate From Institution
                  </div>
                  <div class="col">
                  <a target="_blank" href="<?php echo 'http://localhost/' . $drow['certFromInst'] ?>">View</a>
                  </div>
              </div>
             
              <div class="row pb-3">
                  
                  <div class="col">
                      
                  </div>
                  <div class="col">
                      
                      </div>
                  <div class="col">
                  <a class='form-control btn btn-primary' href="sign.php?id=<?php echo $row['id']; ?> &EmployeeID=<?php echo $EmployeeID; ?>">Approve</a>   
                  </div>
                  <div class="col">
                  <a class='form-control btn btn-primary' href="declineM.php?id=<?php echo $row['id']; ?>&applierId=<?php echo $row['applierId']; ?> &requestType=<?php echo $row['requestType']; ?>  &EmployeeID=<?php echo $EmployeeID; ?>">Decline</a>
                  </div>
              </div>
              
       <?php } elseif ($row['requestType'] == 'DIVORCE') {
                 $rowID= $row['id'];
                 $divorcesql="SELECT household.houseNumber, household.fname, household.mname ,divorcerequest.*,request.* FROM household 
                 INNER JOIN request ON household.id = request.applierId INNER JOIN divorcerequest ON request.id = divorcerequest.id
                 where '$rowID' = divorcerequest.id AND request.readEmp = 1 ";
                 $divorcestmt = $pdo->prepare($divorcesql);
                 $divorcestmt ->execute();
                 $dirow =$divorcestmt->fetch();
                 ?>
                 
                 <div class="row " style="height:120px; padding-top:25px; background-color:#A7CDED">
                 
                 <div class="col">
                     <?php echo $dirow['fname'] ." ".$dirow['mname'] ?>
                     <p><small>House Number. <?php echo $dirow['houseNumber']  ?></small></p>
                 </div>
                     <div class="col">
                     <?php echo $dirow['requestType'] . " Request" ?>
                     </div>
                     <div class="col">
                     <?php echo $dirow['appliedDate'] ?>
                     </div>
                     <div class="col">
                     <a target="_blank" href="../divorceView.php?id=<?php echo $dirow['id']; ?>">View Full Request</a>      
                     </div>
                 </div>
                 <div class="row pb-3">
                     
                     <div class="col">
                         
                     </div>
                     <div class="col">
                         
                         </div>
                     <div class="col">
                       Husband ID
                     </div>
                     <div class="col">
                     <a target="_blank" href="<?php echo 'http://localhost/' . $dirow['husbandIdPhoto'] ?>">View</a>
                     </div>
                 </div>
                 <div class="row pb-3">
                     
                     <div class="col">
                         
                     </div>
                     <div class="col">
                         
                         </div>
                     <div class="col">
                       Husband Photo
                     </div>
                     <div class="col">
                     <a target="_blank" href="<?php echo 'http://localhost/' . $dirow['husbandPhoto'] ?>">View</a>
                     </div>
                 </div>
                 <div class="row pb-3">
                     
                     <div class="col">
                         
                     </div>
                     <div class="col">
                         
                         </div>
                     <div class="col">
                       Wife ID
                     </div>
                     <div class="col">
                     <a target="_blank" href="<?php echo 'http://localhost/' . $dirow['wifeIdPhoto'] ?>">View</a>
                     </div>
                 </div>
                 <div class="row pb-3">
                     
                     <div class="col">
                         
                     </div>
                     <div class="col">
                         
                         </div>
                     <div class="col">
                       Wife Photo
                     </div>
                     <div class="col">
                     <a target="_blank" href="<?php echo 'http://localhost/' . $dirow['wifePhoto'] ?>">View</a>
                     </div>
                 </div>
                 <div class="row pb-3">
                     
                     <div class="col">
                         
                     </div>
                     <div class="col">
                         
                         </div>
                     <div class="col">
                       Court Issued Certificate 
                     </div>
                     <div class="col">
                     <a target="_blank" href="<?php echo 'http://localhost/' . $dirow['courtCert'] ?>">View</a>
                     </div>
                 </div>
                 <div class="row pb-3">
                     
                     <div class="col">
                         
                     </div>
                     <div class="col">
                         
                         </div>
                     <div class="col">
                     <a class='form-control btn btn-primary' href="sign.php?id=<?php echo $row['id']; ?> &EmployeeID=<?php echo $EmployeeID; ?>">Approve</a>   
                     </div>
                     <div class="col">
                     <a class='form-control btn btn-primary' href="declineM.php?id=<?php echo $row['id']; ?>&applierId=<?php echo $row['applierId']; ?> &requestType=<?php echo $row['requestType']; ?>  &EmployeeID=<?php echo $EmployeeID; ?>">Decline</a>
                     </div>
                 </div>
                 
          <?php
            
        } elseif ($row['requestType'] == 'MARRIAGE') {
            $rowID= $row['id'];

            $marriagesql="SELECT household.houseNumber, household.fname, household.mname ,marriagerequest.*,request.* FROM household 
            INNER JOIN request ON household.id = request.applierId INNER JOIN marriagerequest ON request.id = marriagerequest.id
            where '$rowID' = marriagerequest.id AND request.readEmp = 1 ";
            $marriagestmt = $pdo->prepare($marriagesql);
            $marriagestmt ->execute();
            $mrow =$marriagestmt->fetch();
            ?>
            
            <div class="row " style="height:120px; padding-top:25px; background-color:#A7CDED">
                 
                  <div class="col">
                      <?php echo $mrow['fname'] ." ".$mrow['mname'] ?>
                      <p><small>House Number. <?php echo $mrow['houseNumber']  ?></small></p>
                  </div>
                <div class="col">
                <?php echo $mrow['requestType'] . " Request" ?>
                </div>
                <div class="col">
                <?php echo $mrow['appliedDate'] ?>
                </div>
                <div class="col">
                <a target="_blank" href="../marriageView.php?id=<?php echo $mrow['id']; ?>">View Full Request</a>      
                </div>
            </div>
            <div class="row pb-3">
                
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    </div>
                <div class="col">
                  Husband ID
                </div>
                <div class="col">
                <a target="_blank" href="<?php echo 'http://localhost/' . $mrow['husbandIdPhoto'] ?>">View</a>
                </div>
            </div>
            <div class="row pb-3">
                
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    </div>
                <div class="col">
                  Husband Photo
                </div>
                <div class="col">
                <a target="_blank" href="<?php echo 'http://localhost/' . $mrow['husbandPhoto'] ?>">View</a>
                </div>
            </div>
            <div class="row pb-3">
                
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    </div>
                <div class="col">
                  Wife ID
                </div>
                <div class="col">
                <a target="_blank" href="<?php echo 'http://localhost/' . $mrow['wifeIdPhoto'] ?>">View</a>
                </div>
            </div>
            <div class="row pb-3">
                
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    </div>
                <div class="col">
                  Wife Photo
                </div>
                <div class="col">
                <a target="_blank" href="<?php echo 'http://localhost/' . $mrow['wifePhoto'] ?>">View</a>
                </div>
            </div>
            <div class="row pb-3">
                
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    </div>
                <div class="col">
                  Certificate From the Institution 
                </div>
                <div class="col">
                <a target="_blank" href="<?php echo 'http://localhost/' . $mrow['certificatefrominstitution'] ?>">View</a>
                </div>
            </div>
            <div class="row pb-3">
                
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    </div>
                <div class="col">
                <a class='form-control btn btn-primary' href="sign.php?id=<?php echo $row['id']; ?> &EmployeeID=<?php echo $EmployeeID; ?>">Approve</a>   
                </div>
                <div class="col">
                <a class='form-control btn btn-primary' href="declineM.php?id=<?php echo $row['id']; ?>&applierId=<?php echo $row['applierId']; ?> &requestType=<?php echo $row['requestType']; ?>  &EmployeeID=<?php echo $EmployeeID; ?>">Decline</a>
                </div>
            </div>
            
     <?php 
        }
        elseif ($row['requestType'] == 'CIVIL_LOST'){
            $rowID= $row['id'];

            $civilLostSql="SELECT  resident.Housenum, resident.FirstName, resident.MiddleName ,civilrequest.*,request.* FROM resident 
            INNER JOIN request ON resident.id = request.applierId INNER JOIN civilrequest ON request.id = civilrequest.id
            where '$rowID' = civilrequest.id ";
            $civilLostStmt = $pdo->prepare($civilLostSql);
            $civilLostStmt ->execute();
            $clrow =$civilLostStmt->fetch();
            ?>
             <div class="row " style="height:120px; padding-top:25px; background-color:#A7CDED">
                 
                 <div class="col">
                     <?php echo $clrow['FirstName'] ." ".$clrow['MiddleName'] ?>
                     <p><small>House Number. <?php echo $clrow['Housenum']  ?></small></p>
                 </div>
                <div class="col">
                <?php echo $clrow['requestType'] . " Request" ?>
                </div>
                <div class="col">
                <?php echo $clrow['appliedDate'] ?>
                </div>
                <div class="col">
                <a target="_blank" href="../civilView.php?id=<?php echo $clrow['id']; ?>">View Full Request</a>      
                </div>
            </div>
            <div class="row pb-3">
                
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    </div>
                <div class="col">
                Police Report
                </div>
                <div class="col">
                <a target="_blank" href="<?php echo 'http://localhost/' . $clrow['policeReport'] ?>">View</a>
                </div>
            </div>
            <div class="row pb-3">
                
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    </div>
                <div class="col">
                  Photograph
                </div>
                <div class="col">
                <a target="_blank" href="<?php echo 'http://localhost/' . $clrow['photo'] ?>">View</a>
                </div>
            </div>
           
            <div class="row pb-3">
                
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    </div>
                <div class="col">
                <a class='form-control btn btn-primary' href="sign.php?id=<?php echo $row['id']; ?> &EmployeeID=<?php echo $EmployeeID; ?>">Send</a>   
                </div>
                <div class="col">
                <a class='form-control btn btn-primary' href="declineM.php?id=<?php echo $row['id']; ?>&applierId=<?php echo $row['applierId']; ?> &requestType=<?php echo $row['requestType']; ?>  &EmployeeID=<?php echo $EmployeeID; ?>">Decline</a>
                </div>
            </div>
           
     <?php 

        }
        else{
            $rowID= $row['id'];

            $civilsql="SELECT household.houseNumber, household.fname, household.mname ,civilrequest.*,request.* FROM household 
            INNER JOIN request ON household.id = request.applierId INNER JOIN civilrequest ON request.id = civilrequest.id
            where '$rowID' = civilrequest.id AND request.readEmp = 1";
            $civilstmt = $pdo->prepare($civilsql);
            $civilstmt ->execute();
            $crow =$civilstmt->fetch();
            ?>
            
            <div class="row " style="height:120px; padding-top:25px; background-color:#A7CDED">
                 
                  <div class="col">
                      <?php echo $crow['fname'] ." ".$crow['mname'] ?>
                      <p><small>House Number. <?php echo $crow['houseNumber']  ?></small></p>
                  </div>
                <div class="col">
                <?php echo $crow['requestType'] . " Request" ?>
                </div>
                <div class="col">
                <?php echo $crow['appliedDate'] ?>
                </div>
                <div class="col">
                <a target="_blank" href="../civilView.php?id=<?php echo $crow['id']; ?>">View Full Request</a>      
                </div>
            </div>
            <div class="row pb-3">
                
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    </div>
                <div class="col">
                Blood Group Certificate
                </div>
                <div class="col">
                <a target="_blank" href="<?php echo 'http://localhost/' . $crow['Blood_Group_Certification'] ?>">View</a>
                </div>
            </div>
            <div class="row pb-3">
                
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    </div>
                <div class="col">
                  Photograph
                </div>
                <div class="col">
                <a target="_blank" href="<?php echo 'http://localhost/' . $crow['photo'] ?>">View</a>
                </div>
            </div>
           
            <div class="row pb-3">
                
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    </div>
                    <div class="col">
                <a class='form-control btn btn-primary' href="sign.php?id=<?php echo $row['id']; ?> &EmployeeID=<?php echo $EmployeeID; ?>">Approve</a>   
                </div>
                <div class="col">
                <a class='form-control btn btn-primary' href="declineM.php?id=<?php echo $row['id']; ?>&applierId=<?php echo $row['applierId']; ?> &requestType=<?php echo $row['requestType']; ?>  &EmployeeID=<?php echo $EmployeeID; ?>">Decline</a>
                </div>
            </div>
           
     <?php   }
    }

    ?>
    </div>

    </div>
</body>

</html>