<?php 
session_start();
include_once 'php/connections.php';


if(isset($_SESSION['Email'])){
    $Email = $_SESSION['Email'];

        $sqlfetchDetails = "SELECT *FROM account_tbl WHERE Email = '$Email'"; 
        $sqlfetchResult = mysqli_query($connections, $sqlfetchDetails);

        if($sqlfetchResult){
            if(mysqli_num_rows($sqlfetchResult) > 0){
                $row = mysqli_fetch_assoc($sqlfetchResult);
                $accountID = $row['accountID'];
                
            }
            else{
                echo "Cant fetch Account Details";
            }
        }




if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['registerPersonal'])){
        $Name = $_POST['Name'];
        $Gender = $_POST['Gender'];
        $BirthDay = $_POST['BirthDay'];
        $Address = $_POST['Address'];
        $Role = $_POST['Role'];

        $sql = "UPDATE account_tbl SET Name = '$Name', Gender = '$Gender', BirthDay = '$BirthDay', Address = '$Address',
        Account_Type = '$Role'
        WHERE accountID = $accountID";
        $result = mysqli_query($connections, $sql);

        if($result){
                echo "<script>window.location.href='register_photo.php';</script>";
            }
            else{
                echo "error" .$connections->error;
            }
    }
}

}
else{
    echo "You are not in Session";
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- CSS -->
    
    <link rel="stylesheet" href="assets/fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="assets//bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">


</head>
<body>
    <section>
        <form action="register2.php" method="POST">

            <div class="system-name">
                <h1>Barangay Waste Management</h1>
            </div>
            <div class="form-title">
                <h1>
                Register 
                </h1>
                <h2>
                    Personal Information
                </h2>
            </div>
            <!--  -->
            <div class="form-wrapper">

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input name="Name" type="text" class="form-control" placeholder="Full Name" aria-label="Full Name">
                </div>

                 <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                    <select name="Gender" class="form-select" aria-label="Gender">
                        <option selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                 <div class="input-group mb-3">
            <span class="input-group-text"><i id="roleIcon" class="fas fa-user"></i></span>
            <select name="Role" class="form-select" id="roleSelect" aria-label="Role">
                <option selected>Select Role</option>
                <option value="1">Admin</option>
                <option value="3">Resident</option>
                <option value="2">Staff</option>
            </select>
        </div>

                  <!-- Birthday -->
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                     <input name="BirthDay" type="date" class="form-control" aria-label="Birthday">
                </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    <input name="Address" type="text" class="form-control" placeholder="Address" aria-label="Address">
                 </div>

            </div>

            <div class="alternate">
                <a href="index.php">Already have An Account</a>
            </div>

            <div class="form-button">
                <button name="registerPersonal" type="submit">Next</button>
            </div>
            <!--  -->
        </form>
    </section>
</body>

<!-- js -->
 <script src="assets/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</html>