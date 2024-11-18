<?php 
session_start();
  include_once '../php/connections.php';
  include_once 'account_verification.php';

?>

<html>
 <head>
  <title>
   Barangay Staff Monitoring
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
        <a href="monitoring.php" class="list-group-item bg-dark text-white">
         <i class="fas fa-cog">
         </i>
         Waste Segregation Monitoring
        </a>
       

           <a href="waste-guidelines.php" class="list-group-item bg-transparent">
         <i class="fa-solid fa-book"></i>
         Waste Segregation Guidelines
        </a>
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
        <h2> Waste Segregation Monitoring</h2>
      </div>
        <div class="card">
         
         <div class="waste-segregation">
          <div class="item">
           <img  height="200" src="waste-1.png" width="300"/>
           <h5>
            Biodegradable
           </h5>
           <p>
            Collected: 150 kg
           </p>
          </div>
          <div class="item">
           <img  height="200" src="waste-2.png" width="300"/>
           <h5>
            Non-Biodegradable
           </h5>
           <p>
            Collected: 200 kg
           </p>
          </div>
          <div class="item">
           <img height="200" src="waste-1.png" width="300"/>
           <h5>
            Recyclable
           </h5>
           <p>
            Collected: 100 kg
           </p>
          </div>
          <div class="item">
           <img  src="waste-3.png" width="300"/>
           <h5>
            Hazardous
           </h5>
           <p>
            Collected: 50 kg
           </p>
          </div>
          
          
         </div>
        </div>
       </div>
</table>
 </body>
</html>
