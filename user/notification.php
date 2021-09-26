<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../loginPage.php");
}
?>

<?php include '../header.php' ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<style>
    .my-container {
        position: relative;
    }

    .topright {
        position: absolute;
        top: 8px;
        right: 16px;
        font-size: 18px;
    }
</style>
<title>Notification Page</title>


</head>

<body>
    <?php include 'userTemplet.php' ?>
    <div class="container">
        <div class="row  ">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
                <!-- <img class="rounded-circle" src="<?php echo "http://localhost/" . $_SESSION['profile_pic']; ?>" alt="profile picture" width="200vw" height="200vw"> -->
                <h4 class="mt-4"> Here is your Notification @ <?php echo $_SESSION["FirstName"] . " " . $_SESSION["MiddleName"] . " " . $_SESSION["LastName"] ?></h4>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
                <button type="button" onclick="notify()" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                    </svg>
                    Notification
                </button>
            </div>
            <?php
            $userID=$_SESSION["userID"];
            require_once '../dbconnection.php';
            $sql = "SELECT * from notification WHERE id = '$userID' AND is_read=0";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(); ?>

<div class="toast-container">
        <?php
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch()) { ?>

                    <div class="toast enable" role="alert" aria-live="assertive" aria-atomic="true" >
                        <div class="toast-header">
                            
                            <strong class="me-auto"><?php echo $row['notificationDate'] ?></strong>
                            <small class="text-muted"><?php echo $row['sender']; ?></small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <?php echo $row['notificationContent'] ?>
                        </div>
                    </div>
            
                    <?php } ?>

                </div>
                <?php
            } else {
                echo "no new notifications";
            } ?>




        </div>
    </div>


    <script>
        var option = {
            animation: true,
            delay: 8000
        };
        // var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        // var toastList = toastElList.map(function(toastEl) {
        //     return new bootstrap.Toast(toastEl, option)
        // })


        function notify() {
            var toastHTMLElement = document.getElementsByClassName("enable");
            for (const element of toastHTMLElement){
                var toastElement = new bootstrap.Toast(element, option);

                toastElement.show();
            }
            

        }
    </script>


</body>

</html>