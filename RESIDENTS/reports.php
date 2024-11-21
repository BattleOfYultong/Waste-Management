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

         <a href="Announcements.php" class="list-group-item bg-transparent">
         <i class="fa-solid fa-bullhorn"></i>
         </i>
         Announcements
        </a>

         <a href="wastecollectsched.php" class="list-group-item bg-transparent">
         <i class="fas fa-comments">
         </i> 
         Waste Collection Schedule
        </a>

         <a href="waste-guidelines.php" class="list-group-item bg-transparent">
         <i class="fa-solid fa-book"></i>
         Waste Segregation Guidelines
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
       
        <div class="report-form">
            <h2>Report Non-Compliance</h2>
            <form action="../php/resident//executions.php" method="POST" enctype="multipart/form-data">
                  <div style=" padding: 10px; display: flex; justify-content: center; align-items: center;" class="compliance-img">
                      <img id="photoPreview" style="width: 250px; height: 250px; border: 2px solid black;" src="../uploads/sample photo.jpg" alt="">
                  </div>

                <label for="location">Location</label>
                <input required name ="Location" type="text" id="location" name="location" placeholder="Enter the location of non-compliance">
                <input hidden name ="accountID" value="<?php echo "$accountID" ?>" type="text" id="location" name="location" placeholder="Enter the location of non-compliance">
                <label for="description">Description</label>
                <textarea required style="resize: none;" id="description" name="Description" rows="4" placeholder="Describe the issue"></textarea>

                <div class="mb-3">
                  <label for="formFile" class="form-label">Upload File</label>
                  <input required name="photo" class="form-control" type="file" id="formFile">
                </div>

                <button type="submit" name="reportCompliance">Submit Report</button>
            </form>
        </div>
    </div>
</div>
         </div>
        </div>
    </div>
</table>

 <script>
        // Get DOM elements
        const formFile = document.getElementById('formFile');
        const photoPreview = document.getElementById('photoPreview');

        // Add event listener for file input
        formFile.addEventListener('change', function () {
            const file = this.files[0]; // Get the selected file
            if (file) {
                const reader = new FileReader();

                // Load the image file into the preview element
                reader.onload = function (e) {
                    photoPreview.src = e.target.result;
                };

                reader.readAsDataURL(file); // Convert file to Data URL
            } else {
                // Reset to default image if no file is selected
                photoPreview.src = 'uploads/sample photo.jpg';
            }
        });
    </script>
 </body>


</html>
