<?php
session_start();
include 'php/connections.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Email"])) {
        echo "<script>history.back();</script>";
         echo "<script>window.location.href='index.php?email_empty=true';</script>";
    } else {
        $Email = $_POST["Email"];
    }

    if (empty($_POST["Password"])) {
       echo "<script>history.back();</script>";
       echo "<script>window.location.href='index.php?password_empty=true';</script>";
    } else {
        $password1 = $_POST["Password"];
    }

    if ($Email && $password1) {
        include("php/connections.php");

        $check_Email = mysqli_query($connections, "SELECT * FROM account_tbl WHERE Email='$Email'");
        $check_Email_row = mysqli_num_rows($check_Email);

        if ($check_Email_row > 0) {
            while ($row = mysqli_fetch_assoc($check_Email)) {
                $db_password1 = $row["Password"];
                $db_account_type = $row["Account_Type"];
                if ($password1 == $db_password1) {
                if ($db_account_type == "1") {
                   $_SESSION['Email'] = $Email;
                    echo "<script>window.location.href='ADMIN-UI/collections-stats.php';</script>";
                    exit(); 
                }
                elseif($db_account_type == "2"){
                     $_SESSION['Email'] = $Email;
                     echo "<script>window.location.href='STAFF/brgystaff.php';</script>";
                }        
                else {
                      $_SESSION['Email'] = $Email;
                    echo "<script>window.location.href='residents/residents.php';</script>";
                }
            } else {
                /*Password incorrect */
                 echo "<script>window.location.href='index.php?password_empty=true';</script>";
            }
            }
         }
        
        else {
            /*Email is not registered */
           echo "<script>window.location.href='index.php?Invalid_Account=true';</script>";
        }
    }
    // Reset error messages when the page is loaded initially
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $EmailErr = $password1Err = "";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- CSS -->
    
    <link rel="stylesheet" href="assets/fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="assets//bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">


</head>
<body>
    <section>
        <form action="index.php" method = "POST">

            <div class="system-name">
                <h1>Barangay Waste Management</h1>
            </div>
            <div class="form-title">
                <h1>
                LOGIN
                </h1>
            </div>
            <!--  -->
            <div class="form-wrapper">

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input name="Email" type="email" class="form-control" placeholder="Email" aria-label="Email">
                </div>

                 <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input name="Password" type="password" class="form-control" placeholder="Password" aria-label="Password">
                 </div>
            </div>

            <div class="alternate">
                <a href="register.php">Don't Have An Account</a>
            </div>

            <div class="form-button">
                <button type="submit">Login</button>
            </div>
            <!--  -->
        </form>
    </section>
</body>

<!-- js -->
 <script src="assets/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</html>