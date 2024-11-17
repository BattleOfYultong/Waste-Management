<?php 
session_start();
  include_once '../php/connections.php';
  include_once 'account_verification.php';

?>

<html>
 <head>
  <title>
   Admin Dashboard
  </title>
<link crossorigin="anonymous" href="bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="all.min.css" rel="stylesheet"/>
   <link href="dashboard.css" rel="stylesheet"/>
   <link rel="stylesheet" href="../assets/fontawesome-free-6.5.2-web/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
 </head>
 <body>
    <h1 style="text-align: center; color: black;">Barangay Waste Management System</h1>
  <div class="container mt-5">
   <div class="row">
    <div class="col-md-3">
     <div class="card">
      <div class="card-header text-center">
       <img alt="Profile picture of barangay staff member" class="rounded-circle" height="100" src="<?php echo "$Photo" ?>" width="100"/>
       <h4 class="mt-2">
        <?php echo "$Role" ?>
       </h4>
       <h5>
        <?php echo "$Name" ?>
       </h5>

      </div>
      <nav class="card-body">
       <ul class="list-group list-group-flush">
        <a href="collections-stats.php" class="list-group-item bg-transparent">
         <i class="fas fa-home">
         </i>
         Dashboard
        </a>
        <a href="resident-management.php" class="list-group-item bg-transparent">
         <i class="fas fa-bullhorn">
         </i>
         Residents Management
        </a>
        <a href="staff-management.php" class="list-group-item bg-transparent">
         <i class="fas fa-comments">
         </i> 
         Staff Management
        </a>
        <a href="pickup-sched.php" class="list-group-item bg-transparent">
         <i class="fas fa-cog">
         </i>
         Waste Pickup Scheduling
        </a>
        <a href="collections-stats.php" class="list-group-item bg-transparent">
         <i class="fas fa-cog">
         </i>
         Collection Status Management
        </a>
        <a href="notification.php" class="list-group-item bg-transparent">
         
       Notifications
        </a>
        <a href="reports.php" class="list-group-item bg-dark text-white">
         <i class="fas fa-bell-alt">
        </i>
         Reports
        </a>
        <a href="rules.php" class="list-group-item bg-transparent">
         <i class="fas fa-cog">
         </i>  
         Rules & Policies
        </a>
        <a href="---" class="list-group-item bg-transparent">
         Settings
        </a>
        <a href= "../php/logout.php" class="list-group-item bg-transparent">
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
        <div class="notifications">
            <div class="notification">
                <div class="icon"><i class="fas fa-trash-alt"></i></div>
                <div class="details">
                    <div class="title">Zone 1 - General Waste Collection</div>
                    <div class="time">2024-11-14 08:00 AM</div>
                </div>
            </div>
            <div class="notification">
                <div class="icon"><i class="fas fa-recycle"></i></div>
                <div class="details">
                    <div class="title">Zone 2 - Recyclables Collection</div>
                    <div class="time">2024-11-10 09:00 AM</div>
                </div>
            </div>
            <div class="notification">
                <div class="icon"><i class="fas fa-trash-alt"></i></div>
                <div class="details">
                    <div class="title">Zone 3 - General Waste Collection</div>
                    <div class="time">2024-11-09 07:30 AM</div>
                </div>
            </div>
            <div class="notification">
                <div class="icon"><i class="fas fa-recycle"></i></div>
                <div class="details">
                    <div class="title">Zone 1 - Recyclables Collection</div>
                    <div class="time">2024-11-08 08:30 AM</div>
                </div>
            </div>
            <div class="notification">
                <div class="icon"><i class="fas fa-trash-alt"></i></div>
                <div class="details">
                    <div class="title">Zone 2 - General Waste Collection</div>
                    <div class="time">2024-11-07 09:00 AM</div>
                </div>
            </div>
            <div class="notification">
                <div class="icon"><i class="fas fa-recycle"></i></div>
                <div class="details">
                    <div class="title">Zone 3 - Recyclables Collection</div>
                    <div class="time">2024-11-06 07:00 AM</div>
                </div>
    </div>
        </div>
        </div>
    </div>
    </div>
</table>
 </body>
</html>
