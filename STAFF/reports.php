<?php 
session_start();
  include_once '../php/connections.php';
  include_once 'account_verification.php';

?>

<html>
 <head>
  <title>
   Barangay Staff Dashboard
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
       

           <a href="waste-guidelines.php" class="list-group-item bg-transparent">
         <i class="fa-solid fa-book"></i>
         Waste Segregation Guidelines
        </a>
        
        <a href="complaints.php" class="list-group-item bg-transparent">
         <i class="fas fa-calendar">
         </i>
        Complaints
        </a>
        <a href="feedback.php" class="list-group-item bg-transparent">
        <i class="fa-solid fa-comment"></i>
        Feedback
        </a>
        <a href="reports.php" class="list-group-item bg-dark text-white">
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
        <i class="fa-solid fa-gears"></i>
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
    <div class="content">
    <div class="container">
      <?php include_once '../php/staff/functions.php';
        $fetchReports = fetchReports();
      ?>
      
      <div class="report-staff-boxes">
      
         <h2> Non-Compliance Reports</h2>
  <?php foreach ($fetchReports AS $reports): ?>
            <div style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;"  class="complaint"> 
                <div style=" padding: 10px; display: flex; justify-content: center; align-items: center;" class="compliance-img">
                      <img id="photoPreview" style="width: 250px; height: 250px; border: 2px solid black;" src="<?php echo htmlspecialchars('../uploads/' .$reports['reportPhoto']) ?>" alt="">
                  </div>
            <h5><?php echo htmlspecialchars($reports['reportID']) ?></h5> 
            <p>Details: <?php echo htmlspecialchars($reports['Description']) ?> </p> 
            <p>Address: <?php echo htmlspecialchars($reports['Location']) ?> </p>
            <div style="display: flex; gap:10px; align-items: center; justify-content: flex-start; padding: 10px" class="user-photo-complaint">
               <p>Submitted by: User </p> 
               <img style="width: 50px; height:50px; border-radius: 50%; border: 2px solid black;" src="<?php echo htmlspecialchars('../uploads/' .$reports['Photo']) ?>" alt="">
               <span style="font-weight:bold"><?php echo htmlspecialchars($reports['Name']) ?></span>
            </div>

            
            </div>
            <?php endforeach ?>
           
            

           
            

            
      </div>
       
    </div>
</div>
         </div>
        </div>
    </div>
</table>
 </body>
</html>
