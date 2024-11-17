<?php
include_once '../php/connections.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['submitComplaint'])){
        $Complaint = $_POST['Description'];
        $Address = $_POST['Address'];
        $AccountID = $_POST['accountID'];

        $sql = "INSERT INTO complaint_tbl (accountID, Description, Address) VALUES 
        ($AccountID, '$Complaint' ,'$Address')";
        $result = mysqli_query($connections, $sql);

        if($result){
            echo "<script>window.location.href='complaints.php';</script>";
        }
        else{
            echo "Error:" .$connections->error;
        }
    }
}