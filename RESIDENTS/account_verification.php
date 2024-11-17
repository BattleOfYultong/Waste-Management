<?php
    if(isset($_SESSION['Email'])){
        $Email = $_SESSION['Email'];

        $sqlfetch = "SELECT *FROM account_tbl WHERE Email = '$Email'";
        $sqlResult = mysqli_query($connections, $sqlfetch);

        if($sqlResult){
            if(mysqli_num_rows($sqlResult) > 0){
                $row = mysqli_fetch_assoc($sqlResult);
                $Name = $row['Name'];
                $Account_Type = $row['Account_Type'];
                $accountID = $row['accountID'];

                if($Account_Type == 1){
                    $Role = "Admin";
                }
                elseif($Account_Type == 2){
                    $Role = "Barangay Staff";
                }
                else{
                    $Role = "Resident";
                }

                $Photo = "../uploads/" .$row['Photo'];
            }
        }
    }
    else{
        echo "You are not in Session";
    }

