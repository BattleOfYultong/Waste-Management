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
        <a href="brgystaff.php" class="list-group-item bg-transparent ">
         <i class="fas fa-home">
         </i>
         Dashboard
        </a>
        <a href="residents-profile.php" class="list-group-item bg-dark text-white">
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
                        <h1>Residents Profile</h1>
                    </div>
                    <div class="container">
                        <?php 
                            $sqlFetchResidents = "SELECT *FROM account_tbl WHERE Account_Type = 3";
                            $sqlFetchResidentsResult = mysqli_query($connections, $sqlFetchResidents);

                            $sqlFetchResidentsGet = [];
                            if($sqlFetchResidentsResult){
                                if(mysqli_num_rows($sqlFetchResidentsResult) > 0){
                                    while($row = mysqli_fetch_assoc($sqlFetchResidentsResult)){
                                         $sqlFetchResidentsGet[] = $row;
                                    }
                                 }
                            }
                        ?>
                        <div class="profile-dashboard">
                            <?php foreach ($sqlFetchResidentsGet AS $residents): ?>
                            <div class="profile-card">
                                <img class="rounded-circle" height="100" src="<?php echo htmlspecialchars('../uploads/' .($residents['Photo'])) ?>" width="100"/>
                                <div class="info">
                                    <h3><?php echo htmlspecialchars($residents['Name']) ?></h3>
                                    <p>Address: <?php echo htmlspecialchars($residents['Address']) ?></p>
                                    <p>Email: <?php echo htmlspecialchars($residents['Email']) ?></p>
                                </div>
                                <div class="actions">
                                   <!-- Button trigger modal -->
                                  <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalId"
                                    data-name="<?php echo htmlspecialchars($residents['Name']) ?>"
                                    data-photo="<?php echo htmlspecialchars('../uploads/' . ($residents['Photo'])) ?>"
                                    data-address="<?php echo htmlspecialchars($residents['Address']) ?>"
                                    data-email="<?php echo htmlspecialchars($residents['Email']) ?>"
                                    data-gender="<?php echo htmlspecialchars($residents['Gender']) ?>"
                                    data-birthday="<?php echo htmlspecialchars($residents['BirthDay']) ?>"
                                >
                                    View
                                </button>
                                   
                
                                    <button type="button" class="btn btn-danger">Delete</button>

                                </div>
                            </div>
                            <?php endforeach ?>


                        </div>
                    </div>
                </div>
    </div>

    <!-- View Modal -->

    <!-- Modal -->
<div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-md">
                    <!-- Photo -->
                    <div class="form-photo mb-3 d-flex justify-content-center align-items-center">
                        <img id="photoPreview" src="../uploads/sample photo.jpg" style="border-radius: 50%; width: 150px; height:150px;" alt="Preview">
                    </div>

                    <!-- Email -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" id="emailInput" class="form-control" placeholder="Email" aria-label="Email">
                    </div>

                    <!-- Gender -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                        <select id="genderInput" class="form-select" aria-label="Gender">
                            <option selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <!-- Birthday -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        <input type="date" id="birthdateInput" class="form-control" aria-label="Birthday">
                    </div>

                    <!-- Address -->
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        <input type="text" id="addressInput" class="form-control" placeholder="Address" aria-label="Address">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
            


 <script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>




   </div>
</table>


<script src ="../assets/Jquery/jquery.js"></script>


 <script>
// Function to populate modal with data attributes from the button
function populateUserModal(button) {
    // Retrieve data from button's attributes
    const name = $(button).data('name');
    const photo = $(button).data('photo');
    const email = $(button).data('email');
    const birthday = $(button).data('birthday');
    const address = $(button).data('address');
    const gender = $(button).data('gender');

    // Populate modal fields
    $('#emailInput').val(email);
    $('#genderInput').val(gender);
    $('#birthdateInput').val(birthday);
    $('#addressInput').val(address);

    // Update photo preview
    $('#photoPreview').attr('src', photo || '../uploads/sample photo.jpg');
}

// Event listener to open modal and populate data
$(document).on('click', '[data-bs-target="#modalId"]', function () {
    populateUserModal(this);
});
</script>
 </body>
</html>
