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
<title>User Dashboard</title>
<style>
    .abs {
        position: absolute;
        top: 250px;
        right: 0;


    }

    .enable {

        background-color: white;
    }
</style>

</head>

<body>
    <?php include 'userTemplet.php' ?>

    <div class="row">

        <div class="text-center mt-5 mb-5 col-lg-12">
            <h3 style="color:black;"> WELCOME <?php echo $_SESSION["FirstName"] . " " . $_SESSION["MiddleName"] ?></h3>
            <div class="text-end rel" style="position: relative;">
                <button type="button" onclick="notify()" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                    </svg>
                    Notification
                </button>
            </div>
        </div>
        <?php
        $userID = $_SESSION["userID"];
        require_once '../dbconnection.php';
        $sql = "SELECT * from notification WHERE id = '$userID' AND is_read=0 ORDER BY notificationDate DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(); ?>

        <div class="toast-container  abs">
            <?php
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch()) { ?>

                    <div class="toast enable" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">

                            <strong class="me-auto"><?php echo $row['notificationDate'] ?></strong>
                            <small class="text-muted"><?php echo $row['sender']; ?></small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                           

                        </div>
                        <div class="toast-body">
                            <?php echo $row['notificationContent'] ?>
                            <div class="text-end">
                            <a href="read.php?id=<?php echo $row['Nid']; ?>" class="btn btn-primary btn-sm "> Read</a>
                            </div>
                            
                        </div>
                                
                            
                    </div>

                <?php } ?>

        </div>
    <?php
            } ?>





    </div>
    <div class="container-fluid text-center">
        <div class="row">

            <div class=" col-lg-6 col-md-6">
                <button onclick="location.href='birthRegistration.php'" class="border">
                    <div class="svg">
                        <img src="../Icons/baby.svg" alt="baby svg file">
                    </div>
                    <h3>Birth Registration & Certification</h3>

                    <p>This is a vital record that documents the birth of a person. You can fill out a form to register the birth and obtain a certification for it. </p>
                </button>
            </div>

            <div class=" col-lg-6 col-md-6 ">
                <button onclick="location.href='marriageRegistration.php'" class="border">
                    <div class="svg">

                        <img src="../Icons/ring.svg" alt="ring svg file">
                    </div>
                    <h3>Marriage Registration & Certification</h3>
                    <p> This is an official statement of your marriage. You can fill out a form to register your marriage and obtain a certification for it. </p>
                </button>
            </div>


        </div>

        <div class="row">

            <div class=" col-lg-6 col-md-6 ">
                <button onclick="location.href='civilRegistration.php'" class="border">

                    <div class="svg">

                        <img src="../Icons/idCard.svg" alt="Id Card svg file">
                    </div>
                    <h3>Civil Registration & Certification</h3>
                    <p> This is the system by which a government records its citizens and residents. By filling out the forms you can obtain an Identification Card </p>
                </button>
            </div>

            <div class=" col-lg-6 col-md-6 ">
                <button onclick="location.href='deathRegistration.php'" class="border">
                    <div class="svg">

                        <img src="../Icons/tombStone.svg" alt="Tomb Stone svg file">
                    </div>
                    <h3>Death Registration & Certification</h3>
                    <p> This is a legal document issued by a the government civil registration office. Applying to this you can obtain a death certification </p>
                </button>
            </div>


        </div>

    </div>




</body>

</html>
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
        for (const element of toastHTMLElement) {
            var toastElement = new bootstrap.Toast(element, option);

            toastElement.show();
        }


    }
</script>