<?php 
include '../connections.php';
include_once 'functions.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['createAnnouncement'])){
        $Description = $_POST['Description'];
        $Announcement = $_POST['Announcement'];

        createAnnouncement($Announcement, $Description);

    }

     if(isset($_POST['updateAnnouncement'])){
        $AnnouncementID = $_POST['AnnouncementID'];
        $Description = $_POST['Description'];
        $Announcement = $_POST['Announcement'];

        EditAnnouncement($Announcement, $Description, $AnnouncementID);

    }

    if(isset($_POST['editSchedule'])){
        $scheduleID = $_POST['scheduleID'];
        $Waste = $_POST['Waste'];
        $Time = $_POST['Time'];

        editSchedule($scheduleID, $Waste, $Time);
    }

    if(isset($_POST['createGuidelines'])){
        $Guidelines = $_POST['Guidelines'];

        createGuidelines($Guidelines);
    }
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['deleteAnnouncement'])){
        $AnnouncementID = $_GET['deleteAnnouncement'];

        deleteAnnouncement($AnnouncementID);
    }

    if(isset($_GET['deleteGuideline'])){
        $Guidelines = $_GET['deleteGuideline'];

        deleteguideLines($Guidelines);
    }

     if(isset($_GET['resolveComplaint'])){
        $ComplaintID = $_GET['resolveComplaint'];

        resolveComplaint($ComplaintID);
    }
}