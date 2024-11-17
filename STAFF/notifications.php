<?php 
session_start();
  include_once '../php/connections.php';
  include_once 'account_verification.php';

?>

<html>
 <head>
  <title>
   Barangay Staff Notifications
  </title>
<link crossorigin="anonymous" href="bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="all.min.css" rel="stylesheet"/>
  <link href="dashboard.css" rel="stylesheet"/>
   <link rel="stylesheet" href="../assets/fontawesome-free-6.5.2-web/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
 </head>
 <body>
  <div class="container mt-5">
   <div class="row">
    <div class="col-md-3">
     <div class="card">
      <div class="card-header text-center">
       <img alt="Profile picture of barangay staff member" class="rounded-circle" height="100"  src="<?php echo "$Photo" ?>" width="100"/>
       <h4 class="mt-2">
        <?php echo "$Role" ?>
       </h4>
       <h5>
        <?php echo "$Name" ?>
       </h5>


      </div>
       <nav class="card-body">
       <ul class="list-group list-group-flush">
        <a href="brgystaff.php" class="list-group-item bg-transparent">
         <i class="fas fa-home">
         </i>
         Dashboard
        </a>
        <a href="residents-profile.php" class="list-group-item bg-transparent">
         <i class="fas fa-bullhorn">
         </i>
         Residents Profile
        </a>
        <a href="wastecollectsched.php" class="list-group-item bg-transparent">
         <i class="fas fa-comments">
         </i> 
         Waste Collection Schedule
        </a>
        <a href="monitoring.php" class="list-group-item bg-transparent">
         <i class="fas fa-cog">
         </i>
         Waste Segregation Monitoring
        </a>
        <a class="list-group-item bg-transparent">
         <i class="fas fa-cog">
         </i>
         Announcements
        </a>
        <a href="complaints.php" class="list-group-item bg-transparent">
         <i class="fas fa-calendar-alt">
         </i>
        Complaints
        </a>
        <a href="feedback.php" class="list-group-item bg-transparent">
         <i class="fas fa-complaints-alt">
        </i>
        Feedback
        </a>
        <a href="reports.php" class="list-group-item bg-transparent">
         <i class="fas fa-comments">
         </i> 
         Reports
        </a>
        <a href="notifications.php" class="list-group-item bg-dark text-white">
         <i class="fas fa-cog">
         </i>
         
         Notifications
        </a>
        <a class="list-group-item bg-transparent">
         <i class="fas fa-bell">
        </i>
         Settings
        </a>
        <a href="../php/logout.php" class="list-group-item bg-transparent">
         <i class="fas fa-sign-out-alt">
         </i>
         Logout
        </a>
       </ul>
      </nav>
      </div>
     </div>
    <div class="content">
    <div class="col-md-9">
     <div class="card mb-4">
      <div class="card-header">
        <h1>Notifications</h1>
      </div>
    <div class="container">
        <table  class="table table-hover text-white">
                
                <div class="card">
                    <h3>Notification 1</h3>
                    <p>Details: Waste collection schedule updated for Barangay 1.</p>
                    <p>Date: 2024-11-13</p>
                </div>
                <div class="card">
                    <h3>Notification 2</h3>
                    <p>Details: New recycling program introduced.</p>
                    <p>Date: 2024-11-12</p>
                </div>
                <div class="card">
                    <h3>Notification 3</h3>
                    <p>Details: Community clean-up event on 2024-11-11.</p>
                    <p>Date: 2024-11-11</p>
                </div>
            </div>
    </div> 
</div>
</div>
</div>
</table>
 </body>
</html>
