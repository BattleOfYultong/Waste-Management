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

        <a href="complaints.php" class="list-group-item bg-dark text-white">
         <i class="fas fa-calendar-alt">
         </i>
        Complaints
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
       
        <a href="feedback.php" class="list-group-item bg-transparent">
         <i class="fas fa-complaints-alt">
        </i>
        Feedback
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
        <h1>My Complaints</h1>
      </div>
    <div class="container">

    <!-- Button trigger modal -->
    <button
      type="button"
      class="btn btn-success"
      data-bs-toggle="modal"
      data-bs-target="#modalId"
    >
      Create Complaint
    </button>
    
   

   
    
        <table class="table table-hover text-white ">
          <?php
          $sqlFetchComplaint_user = "SELECT c.complaintID, c.accountID, c.Description, c.Address, a.Photo,
          a.accountID, a.Name FROM complaint_tbl c INNER JOIN account_tbl a ON c.accountID = a.accountID 
          WHERE c.accountID = $accountID";
          $sqlFetchComplaint_user_result = mysqli_query($connections, $sqlFetchComplaint_user);

          $sqlFetchComplaint_user_store = [];

          if($sqlFetchComplaint_user_result){
            if(mysqli_num_rows($sqlFetchComplaint_user_result) > 0){
              while($row = mysqli_fetch_assoc($sqlFetchComplaint_user_result)){
                $sqlFetchComplaint_user_store[] = $row;
              }
            }
          }
          
          ?>
          <?php foreach ($sqlFetchComplaint_user_store AS $complaint_user): ?>
            <div class="complaint mt-3"> 
            <h5>Complaint ID: <?php echo htmlspecialchars($complaint_user['complaintID']) ?> </h5> 
            <p>Details: <?php echo htmlspecialchars($complaint_user['Description']) ?></p> 
            <p>Address: <?php echo htmlspecialchars($complaint_user['Address']) ?></p>
            <p>Submitted by: <?php echo htmlspecialchars($complaint_user['Name']) ?></p> 
            <div class="buttons"> 
                <button onclick="deleteComplaint(<?php echo htmlspecialchars($complaint_user['complaintID']) ?>)" class="delete">Delete</button> 
            </div> 
            </div>
          <?php endforeach ?>
            
           
        
          
    </div> 
</div>
</div>
</div>
</table>

 <!-- Modal -->
    <form
    action="submit-complaint.php"
    method="POST"
      class="modal fade"
      id="modalId"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modalTitleId"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitleId">
              Submit Complaint
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
    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
    <textarea
      class="form-control"
      id="addressInput"
      placeholder="Description"
      aria-label="Address"
      rows="3" 
      style="resize: none;"
      name="Description"
    ></textarea>
</div>
               <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        <input name="Address" type="text" id="addressInput" class="form-control" placeholder="Address" aria-label="Address">
                    </div>
            </div>
          </div>

          <input hidden name="accountID" type="text" value="<?php echo "$accountID" ?>">
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button name="submitComplaint" type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </form>


 <script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>

 <script>
  function deleteComplaint(complaintID) {
    window.location.href = 'deleteComplaint.php?deleteID=' + complaintID;
}

 </script>
 </body>
</html>
