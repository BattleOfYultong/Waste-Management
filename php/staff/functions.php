<?php

function createAnnouncement($Announcement, $Description){
    global $connections;

    $sql = "INSERT INTO announcement_tbl (Announcement, Description) VALUES ('$Announcement', '$Description')";
    $result = mysqli_query($connections, $sql);

    if($result){
        echo "<script>window.location.href='../../staff/brgystaff.php';</script>";
    }
    else{
        echo "Error:" .$connections->error;
    }
}

function fetchAnnouncement(){
    global $connections;

    $sql = "SELECT * FROM announcement_tbl";
    $result = mysqli_query($connections, $sql);

    $fetchAnnouncement = [];

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $fetchAnnouncement[] = $row; // Populate the array properly
            }
        }
    }

    return $fetchAnnouncement; // Return the populated array
}

function deleteAnnouncement($announcementID){
    global $connections;

    $sql = "DELETE FROM announcement_tbl WHERE announcementID = $announcementID";
    $result = mysqli_query($connections, $sql);

    if($result){
        echo "<script>window.location.href='../../staff/brgystaff.php';</script>";
    }
    else{
        echo "Error:" .$connections->error;
    }
}

 function EditAnnouncement($Announcement, $Description, $AnnouncementID){
         global $connections;

          $sql = "UPDATE announcement_tbl SET Announcement = '$Announcement', Description = '$Description' 
          WHERE announcementID = $AnnouncementID";
    $result = mysqli_query($connections, $sql);

    if($result){
        echo "<script>window.location.href='../../staff/brgystaff.php';</script>";
    }
    else{
        echo "Error:" .$connections->error;
    }

 }
   

function fetchSchedule (){
    global $connections;

    $sql = "SELECT *FROM schedule_tbl";
    $result = mysqli_query($connections, $sql);

    $fetchSchedule = [];

    if($result){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $fetchSchedule[] = $row;
            }
        }
    }
    return $fetchSchedule;
}

function editSchedule($scheduleID, $Waste, $Time){
    global $connections;

    $sql = "UPDATE schedule_tbl SET Waste = '$Waste', Time = '$Time' WHERE scheduleID = $scheduleID";
    $result = mysqli_query($connections, $sql);

    
    if($result){
        echo "<script>window.location.href='../../staff/wastecollectsched.php';</script>";
    }
    else{
        echo "Error:" .$connections->error;
    }
}