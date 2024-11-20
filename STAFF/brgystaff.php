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
        <a href="brgystaff.php" class="list-group-item bg-dark text-white">
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
      <div class="card-header">
       <h5>
        Announcements
       </h5>
      </div>
     
      <div class="card-body">
        <!-- Button trigger modal -->
        <button
          type="button"
          class="btn btn-success "
          data-bs-toggle="modal"
          data-bs-target="#announcement"
        >
          Create Announcement
        </button>
        
        
        
      
        
        <div class="announcement-card-wrapper">
          <?php include_once '../php/staff/functions.php';
            $fetchAnnouncement = fetchAnnouncement();
            
          ?>
          <!--  -->
            <?php foreach ($fetchAnnouncement AS $Announcement): ?>
          <div class="annoucement-card-box">
          
             <h1><?php echo htmlspecialchars($Announcement['Announcement']) ?></h1>
             <p>Details: <?php echo htmlspecialchars($Announcement['Description']) ?></p>
             <div class="annoucement-card-actions">
              <!-- Button trigger modal -->
              <button
                type="button"
                class="btn btn-primary "
                data-bs-toggle="modal"
                data-bs-target="#modalId"
                data-id = "<?php echo htmlspecialchars($Announcement['announcementID']) ?>"
                data-announcement = "<?php echo htmlspecialchars($Announcement['Announcement']) ?>"
                data-description = "<?php echo htmlspecialchars($Announcement['Description']) ?>"
              >
                Edit
              </button>

              <button
                type="button"
                class="btn btn-danger "
                onclick="deleteAnnouncement(<?php echo htmlspecialchars($Announcement['announcementID']) ?>)"
              >
                Delete
              </button>
              
              
            
              </div>

             
           </div>
           <?php endforeach ?>

            <!--  -->

           
         
      </div>

        <!-- create modal -->

              <!-- Modal -->
        <form
          class="modal fade"
          id="announcement"
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
                  Create Announcement
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
                    <!--About -->
                   <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-bullhorn"></i></span>
                        <input type="text" class="form-control" placeholder="Annoucement" name="Announcement" required>
                  </div>

                   <!-- Description -->
                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                     <textarea class="form-control" placeholder="Description" name="Description" rows="3" required></textarea>
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
                <button type="submit" name="createAnnouncement" class="btn btn-primary">Create</button>
              </div>
            </div>
          </div>
        </form>
              
              

        <!--View  Modal -->
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
                        View Annoucement
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

                        <div hidden class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-bullhorn"></i></span>
                        <input id="announcementID" type="text" class="form-control" placeholder="Annoucement" name="AnnouncementID" required>
                       </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-bullhorn"></i></span>
                        <input type="text" id="Announcement" class="form-control" placeholder="Annoucement" name="Announcement" required>
                  </div>

                   <!-- Description -->
                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                     <textarea class="form-control" id="Description" placeholder="Description" name="Description" rows="3" required></textarea>
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
                      <button type="submit" name="updateAnnouncement" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
              </fo>

            
              

      <script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
      <script src="../assets/Jquery/jquery.js"></script>


      <script>
        function deleteAnnouncement(announcementID){
          console.log(announcementID);
          
         window.location.href = '../php/staff/executions.php?deleteAnnouncement=' + announcementID;


        }
      </script>
      
      <script>
   function populateUserModal(button) {
    // Retrieve data from button's attributes
    const name = $(button).data('name');
    const description = $(button).data('description')
     const announcementID = $(button).data('id')
      const announcement = $(button).data('announcement')
    // Populate modal fields
    $('#announcementID').val(announcementID);
    $('#Announcement').val(announcement);
    $('#Description').val(description);

}

// Event listener to open modal and populate data
$(document).on('click', '[data-bs-target="#modalId"]', function () {
    populateUserModal(this);
});
</script>
   

      </script>

 </body>
</html>
