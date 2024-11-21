<?php 
session_start();
  include_once '../php/connections.php';
  include_once 'account_verification.php';

?>


<html>
 <head>
  <title>
   Barangay Staff Dashboard Schedule
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
        <a href="wastecollectsched.php" class="list-group-item bg-dark text-white">
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
<div class="card">
    <div class="card-header">
     <h5>
      Waste Collection Schedule
     </h5>
    </div>
    <div class="card-body">
        <table>
          <?php include_once '../php/staff/functions.php';
          $fetchSchedule = fetchSchedule();
           ?>
            <thead>
                <tr>
                  <th>
                      Day
                  </th>

                  <th>
                      Type Of Waste
                  </th>

                  <th>
                      Time
                  </th>

                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($fetchSchedule AS $schedule): ?>
              <tr>
                <td>
                    <?php echo htmlspecialchars($schedule['Day']) ?>
                </td>

                 <td>
                    <?php echo htmlspecialchars($schedule['Waste']) ?>
                </td>

                 <td>
                    <?php echo htmlspecialchars($schedule['Time']) ?>
                </td>

                 <td>
                    <!-- Button trigger modal -->
                    <button
                      type="button"
                      class="btn btn-primary  "
                      data-bs-toggle="modal"
                      data-bs-target="#modalId"
                      data-id = "<?php echo htmlspecialchars($schedule['scheduleID']) ?>"
                      data-day= "<?php echo htmlspecialchars($schedule['Day']) ?>"
                      data-waste = " <?php echo htmlspecialchars($schedule['Waste']) ?>"
                      data-time = "<?php echo htmlspecialchars($schedule['Time']) ?>"
                    >
                      Edit
                    </button>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
        </table>
    </div>
   </div>
</div>
</div>
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
                              Edit Schedule
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

                              <!-- Announcement ID -->
                              <div hidden class="input-group mb-3">
                                  <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                  <input  id="scheduleID" type="text" id="" class="form-control" placeholder="Day" name="scheduleID" readonly>
                              </div>
                              <!--  -->
                                 <!-- Announcement ID -->
                              <div class="input-group mb-3">
                                  <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                  <input  id="Day" type="text" id="" class="form-control" placeholder="Day" name="Day" readonly>
                              </div>
                              <!--  -->

                                

                                  <!-- Announcement ID -->
                              <div class="input-group mb-3">
                                  <span class="input-group-text"><i class="fa-solid fa-trash"></i></span>
                                  <input id="Waste" type="text" id="" class="form-control" placeholder="Day" name="Waste" >
                              </div>
                              <!--  -->

                                <!--  -->
                              <div class="input-group mb-3">
                                  <span class="input-group-text"><i class="fa-solid fa-clock"></i></span>
                                  <input id="Time" type="text" id="" class="form-control" placeholder="Day" name="Time" >
                              </div>
                              <span style="color:black">Eg. 10:00 AM - 9:00 AM</span>
                              <!--  -->
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
                            <button type="submit" name="editSchedule" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </div>
                    </form>
                    

<script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
 <script src="../assets/Jquery/jquery.js"></script>

 <script>
   function populateUserModal(button) {
    // Retrieve data from button's attributes
    const id = $(button).data('id');
    const day = $(button).data('day')
     const waste = $(button).data('waste')
      const time = $(button).data('time')
    // Populate modal fields
    $('#scheduleID').val(id);
    $('#Day').val(day);
    $('#Waste').val(waste);
     $('#Time').val(time);

}

// Event listener to open modal and populate data
$(document).on('click', '[data-bs-target="#modalId"]', function () {
    populateUserModal(this);
});
</script>
</body>
   </html>