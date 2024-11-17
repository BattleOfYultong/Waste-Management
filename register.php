<?php 
session_start();
include_once 'php/connections.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['registerEmail'])){
            $Email = $_POST['Email'];
            $Password = $_POST['Password'];

            $sql = "INSERT INTO account_tbl (Email, Password) VALUES ('$Email', '$Password')";
            $result = mysqli_query($connections, $sql);

            if($result){
                $_SESSION['Email'] = $Email;
                echo "<script>window.location.href='register2.php';</script>";
            }
            else{
                echo "error" .$connections->error;
            }
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
        <form action="register.php" method="POST">

            <div class="system-name">
                <h1>Barangay Waste Management</h1>
            </div>
            <div class="form-title">
                <h1>
                Register
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
                <a href="index.php">Don't Have An Account</a>
            </div>

            <div class="form-button">
                <button name="registerEmail" type="submit">Next</button>
            </div>
            <!--  -->
        </form>
    </section>
</body>

<!-- js -->
 <script src="assets/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</html>