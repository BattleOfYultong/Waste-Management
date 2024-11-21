<?php

function createCompliance($accountID, $Location, $Description, $Photo){
    global $connections;

    $sql = "INSERT INTO report_tbl (accountID, Location , Description, Photo) VALUES ($accountID, '$Location', 
    '$Description', '$Photo')";

    $result = mysqli_query($connections, $sql);

     if ($result) {
    echo "<script>alert('Report Submitted');</script>";
    echo "<script>window.location.href='../../../residents/reports.php';</script>";
    exit;
} else {
    echo "<script>alert('Error Submitting Report');</script>";
    echo "<script>window.location.href='../../../residents/reports.php';</script>";
}
}