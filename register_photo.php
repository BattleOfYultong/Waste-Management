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
                 $Account_Type = $row['Account_Type'];
            }
            else{
                echo "Cant fetch Account Details";
            }
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if file is an actual image
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["photo"]["size"] > 5000000) { // Adjusted to 5MB
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (!in_array($imageFileType, array("jpg", "png", "jpeg", "gif"))) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Generate a unique filename and set the target file path
            $uniqueFilename = uniqid() . "." . $imageFileType;
            $targetFilePath = $targetDirectory . $uniqueFilename;

            // Attempt to move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
                // Update the user profile with the new photo filename
                $updateQuery = "UPDATE account_tbl SET Photo = '$uniqueFilename' WHERE accountID = $accountID";
                if (mysqli_query($connections, $updateQuery)) {
                    if($Account_Type == 1){
                    $_SESSION['Email'] = $Email;
                    echo "<script>window.location.href='ADMIN-UI/collections-stats.php';</script>";
                    exit(); 
                    }
                    elseif($Account_Type == 2){
                         $_SESSION['Email'] = $Email;
                     echo "<script>window.location.href='STAFF/brgystaff.php';</script>";
                    exit(); 
                    }
                    else{
                         $_SESSION['Email'] = $Email;
                    echo "<script>window.location.href='residents/residents.php';</script>";
                    }
                    
                } else {
                    echo "Error updating record: " . mysqli_error($connections);
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        }
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
        <form action="register_photo.php" method = "POST" enctype="multipart/form-data">

            <div class="system-name">
                <h1>Barangay Waste Management</h1>
            </div>
            <div class="form-title">
                <h1>
                Register 
                </h1>
                <h2>
                    Photo
                </h2>
            </div>
            <!--  -->
            <div class="form-wrapper">
                    <div class="form-photo">
                        <img id="photoPreview" src="uploads/sample photo.jpg" alt="Preview">
                    </div>

                    <div class="form-photo-input">
                        <div class="mb-3">
                            <input name = "photo" class="form-control" type="file" id="formFile" name="photo" accept="image/*">
                        </div>
                    </div>
              
            </div>

            <div class="alternate">
                <a href="index.php">Already have An Account</a>
            </div>

            <div class="form-button">
                <button type="submit">Submit</button>
            </div>
            <!--  -->
        </form>
    </section>
</body>

<!-- js -->

 <script>
        // Get DOM elements
        const formFile = document.getElementById('formFile');
        const photoPreview = document.getElementById('photoPreview');

        // Add event listener for file input
        formFile.addEventListener('change', function () {
            const file = this.files[0]; // Get the selected file
            if (file) {
                const reader = new FileReader();

                // Load the image file into the preview element
                reader.onload = function (e) {
                    photoPreview.src = e.target.result;
                };

                reader.readAsDataURL(file); // Convert file to Data URL
            } else {
                // Reset to default image if no file is selected
                photoPreview.src = 'uploads/sample photo.jpg';
            }
        });
    </script>
 <script src="assets/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</html>