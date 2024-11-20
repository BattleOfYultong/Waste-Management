<?php
include_once '../php/connections.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
   if(isset($_GET['deleteID'])){
    $ComplaintID = $_GET['deleteID'];

    $sql = "DELETE FROM complaint_tbl WHERE complaintID = $ComplaintID";
    $result = mysqli_query($connections, $sql);
   
     if($result){
            echo "<script>window.location.href='residents.php';</script>";
        }
        else{
            echo "Error:" .$connections->error;
        }
}
}