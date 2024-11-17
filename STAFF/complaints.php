<?php 
session_start();
  include_once '../php/connections.php';
  include_once 'account_verification.php';

?>

<html>
 <head>
  <title>
   Barangay Staff Complaints
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
        <a href="complaints.php" class="list-group-item bg-dark text-white">
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
        <a href="notifications.php" class="list-group-item bg-transparent">
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
        <h1>Complaints</h1>
      </div>
    <div class="container">
        <table  class="table table-hover text-white">
            <div class="complaint"> 
            <h5>Complaint 1</h5> 
            <p>Details: Overflowing garbage bins at 123 Main St.</p> 
            <p>Submitted by: John</p> 
            <div class="buttons"> 
                <button>Resolve</button> 
                <button class="delete">Delete</button> 
            </div> 
        </div> 
        <div class="complaint"> 
            <h5>Complaint 2</h5> 
            <p>Details: Uncollected waste at 456 Elm St.</p> 
            <p>Submitted by: Maria Christina</p>
             <div class="buttons"> 
                <button>Resolve</button> 
                <button class="delete">Delete</button> 
            </div> 
        </div> 
        <div class="complaint"> 
            <h5>Complaint 3</h5> 
            <p>Details: Illegal dumping at 789 Oak St.</p> 
            <p>Submitted by: Michael</p> 
            <div class="buttons"> <button>Resolve</button> 
                <button class="delete">Delete</button> 
        </div> 
    </div> 
</div>
</div>
</div>
</table>
 </body>
</html>
