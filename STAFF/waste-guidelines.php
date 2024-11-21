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
       

           <a href="waste-guidelines.php" class="list-group-item bg-dark text-white">
         <i class="fa-solid fa-book"></i>
         Waste Segregation Guidelines
        </a>
        
        <a href="complaints.php" class="list-group-item bg-transparent">
         <i class="fas fa-calendar">
         </i>
        Complaints
        </a>
        <a href="feedback.php" class="list-group-item bg-transparent">
         <i class="fas fa-complaints">
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
       
         <div style="color: black; font-weight:bold"  class="header">
            <h2>Segregation Guidelines</h2>
        </div>

        <div class="guidelines">
            <!-- Button trigger modal -->
            <button
              type="button"
              class="btn btn-success "
              data-bs-toggle="modal"
              data-bs-target="#modalId"
            >
              Create Guideline
            </button>
            
            
            <?php include_once '../php/staff/functions.php';
              $fetchGuidelines = fetchGuidelines();
             ?>
            <ul>
              <?php foreach ($fetchGuidelines AS $Guidelines): ?>
              <div style="display: flex; align-items: center; justify-content: space-between" class="guidelines-container">
                <div style="padding: 10px; margin-top: 10px; margin-bottom: 10px; width: 100%; font-weight: bold" ><?php echo htmlspecialchars($Guidelines['Description']) ?></div>
                <button onclick="deleteGuideline(<?php echo htmlspecialchars($Guidelines['guidelinesID']) ?>)" class="btn btn-danger">
                  <i class="fa-solid fa-trash"></i>
                </button>
                </div>
               <?php endforeach ?> 
            </ul>
        </div>
    </div>
</div>
         </div>
        </div>
    </div>
</table>


<!-- Modal -->
            <form
              class="modal fade"
              id="modalId"
              tabindex="-1"
              role="dialog"
              aria-labelledby="modalTitleId"
              aria-hidden="true"
              action="../php/staff/executions.php"
              method="POST"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                      Create Guideline
                    </h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                        <div class="input-group mb-3">
                          <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                           <textarea class="form-control" placeholder="Description" name="Guidelines" rows="3" required></textarea>
                       </div>

                    </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                    <button type="submit" name="createGuidelines" class="btn btn-primary">Create</button>
                  </div>
                </div>
              </div>
            </form>
            

          <script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>


          <script>
            function deleteGuideline(guidelineID){
              console.log(guidelineID);

              window.location.href='../php/staff/executions.php?deleteGuideline=' + guidelineID;
            }
          </script>
 </body>
</html>
