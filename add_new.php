<?php
   include "head.php";
   include "sidebar.php";
   include "navbar.php";
   ?>
<!-- End of Topbar -->
<!-- Begin Page Content -->

<div class="container">

  <form class="needs-validation" method="post" id="uploads" novalidate>
  <div id="results"></div>
  <div id="loading">
         <img id="loading-image" src="img/45.gif" alt="Loading..." />
      </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="txt_name" placeholder="Enter username" name="txt_name" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="pwd">Description:</label>
      <input type="text" class="form-control" id="description" placeholder="Enter Description" name="description" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
            <label for="action">Action</label>   
                <select name="action" id="action" >
                <option>Choose a value</option>
                  <option value="1">Active</option>
                  <option value="2">In-Active</option>
               </select>
               <!-- <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div> -->
      </div>
      <div class="form-group">
            <label for="startDate">Start Date</label>
            <div class="datepicker date input-group">
               <input type="text" placeholder="Start-date" name="start" class="form-control" id="startDate" required>
               <div class="input-group-append"><span class="input-group-text"><i class="fas fa-clock"></i></span></div>
               <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
            </div>
         </div>
         <div class="form-group">
            <label for="endDate">End Date</label>
            <div class="datepicker date input-group">
               <input type="text" placeholder="End-date" name="end" class="form-control" id="endDate"required >
               <div class="input-group-append"><span class="input-group-text"><i class="fas fa-clock"></i></span></div>
               <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div> 
            </div>
         
      </div>
      
      <div class="form-group" id="file">
         <label for="file">Upload Stall</label>
            <input type="file" id="txt_file" name="txt_file" class="form-control" accept="image/*" required />
            <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
         
      </div>
      <div class="form-group">
         <label for="floor">Upload Floor</label>
         
            <input type="file" id="txt_floor" name="txt_floor" class="form-control" accept="image/*" required/>
            <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
         </div>
         <a href="index.php" class="btn btn-danger">Cancel</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<?php include "footer.php"; ?>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<?php include "logout.php";?>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<!-- <script src="js/config.js"></script> -->
<script>
(function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            debugger;
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
               debugger;   
            }else {
              var formData = new FormData($(this)[0]);
              $("#loading").show();
        $.ajax({
        url: rootURL + 'image',
        type: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            debugger;
			setTimeout(function() {
				$("#loading").hide();
			}, 1000);
		        $("#results").html("File added successfully");
				$("#results").css("color", "green");
                setInterval('location.reload()', 50000);
        },
        error: function() {
            debugger;
			setTimeout(function() {
				$("#loading").hide();
			}, 1000);
			$("#results").html('Something went wrong');
			$("#results").css("color", "red");
		},
        });
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    $(function () {
   
   // INITIALIZE DATEPICKER PLUGIN
   $('.datepicker').datepicker({
       clearBtn: true,
       format: "yyyy/mm/dd"
   });


   // FOR DEMO PURPOSE
   $('#reservationDate').on('change', function () {
       var pickedDate = $('input').val();
       $('#pickedDate').html(pickedDate);
   });
});
</script>

</body>
</html>
