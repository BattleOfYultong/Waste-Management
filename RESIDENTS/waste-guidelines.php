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

        <a href="residents.php" class="list-group-item bg-transparent">
         <i class="fas fa-calendar-alt">
         </i>
        Complaints
        </a>

         <a href="wastecollectsched.php" class="list-group-item bg-transparent">
         <i class="fas fa-comments">
         </i> 
         Waste Collection Schedule
        </a>

         <a href="waste-guidelines.php" class="list-group-item bg-dark text-white">
         <i class="fa-solid fa-book"></i>
         Waste Segregation Guidelines
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
    <div class="content">
    <div class="container">
       
         <div style="color: black; font-weight:bold"  class="header">
            <h2>Segregation Guidelines</h2>
        </div>
        <div class="guidelines">
            <h2>Guidelines</h2>
            <ul>
                <li>Separate wet and dry waste at the source.</li>
                <li>Use different bins for different types of waste.</li>
                <li>Do not mix hazardous waste with regular waste.</li>
                <li>Compost organic waste whenever possible.</li>
                <li>Recycle materials like paper, plastic, and glass.</li>
                <li>Dispose of electronic waste at designated centers.</li>
                <li>Follow local regulations for waste disposal.</li>
                <li>Educate others about the importance of waste segregation.</li>
                <li>Reduce the use of single-use plastics.</li>
                <li>Use reusable bags and containers.</li>
                <li>Properly label waste bins.</li>
                <li>Ensure waste bins are covered to prevent pests.</li>
                <li>Regularly clean waste bins to avoid odors.</li>
                <li>Report any non-compliance to local authorities.</li>
                <li>Participate in community clean-up drives.</li>
            </ul>
        </div>
    </div>
</div>
         </div>
        </div>
    </div>
</table>
 </body>
</html>