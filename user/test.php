<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="/Users/z/Desktop/CVEOSMS/css/userCss.css"> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>

    <body>
    <?php

// define('DB_SERVER', 'localhost');     
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'cveosmstest');
$DB_SERVER = '127.0.0.1';
$DB_USERNAME = 'root';
$DB_PASSWORD = '';
$DB_NAME ='amharic';
$name="";
 
/* Attempt to connect to MySQL database */
// try{
//     $pdo = new PDO("mysql:host=" . $DB_SERVER . ";dbname=" . $DB_NAME, $DB_USERNAME, $DB_PASSWORD);
//     // Set the PDO error mode to exception
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
  
// } catch(PDOException $e){
//     die("ERROR: Could not connect. " . $e->getMessage());
// }
// if(isset($_POST['submit'])){
// $name = $_POST['name'];
// $sql = "INSERT INTO info(fname) values ('$name')";
// $stmt = $pdo->prepare($sql);
// $stmt->execute();
// }
// else{
//   echo "error executing";
// }
$currentDate= date("Y-m-d");
$dob = '2003-09-24';
$diff= date_diff(date_create($currentDate), date_create($dob));
if($diff->format('%y')>=18){
    echo " above 18";
}
else{
    echo " Not 18";
}

?>

<form method="post">
  <input type="text" name="name" placeholder="name">

<input type="submit" name="submit">
</form>
    </body>
</html>