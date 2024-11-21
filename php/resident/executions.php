<?php include_once '../connections.php';
        include_once 'functions.php';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['reportCompliance'])){
                $Location = $_POST['Location'];
                $Description = $_POST['Description'];
                $accountID = $_POST['accountID'];

         $targetDirectory = "../../uploads/";
        $file = $_FILES['photo'];
        $originalFileName = basename($file['name']);
        $imageFileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

        // Generate a unique filename for the new photo
        $Photo = uniqid('compliance_', true) . '.' . $imageFileType;
        $targetFilePath = $targetDirectory . $Photo;

        // Initialize upload status
        $uploadOk = 1;

        // Check if the uploaded file is an image
        $check = getimagesize($file['tmp_name']);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($file['size'] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow only certain file formats
        $allowedFormats = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Proceed with file upload if validation passed
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                createCompliance($accountID, $Location, $Description, $Photo);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
            }
        