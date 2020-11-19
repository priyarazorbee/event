<?php
   include "head.php";
   include "sidebar.php";
   include "navbar.php";
   ?>
<div class="container">
   <!-- The Modal -->
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Create Events</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <form class="needs-validation" method="post" id="uploads" novalidate>
               <div id="results"></div>
               <div id="loading">
                  <img id="loading-image" src="img/45.gif" alt="Loading..." />
               </div>
               <div class="form-group">
                  <label for="name">Event Title</label><span class="require">*</span>
                  <input type="text" class="form-control" id="txt_name" placeholder="Enter Title" name="txt_name" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
               </div>
               <div class="form-group">
                  <label for="pwd">Event Description</label>
                  <textarea class="form-control" id="description" rows="3"placeholder="Enter Description" name="editor"></textarea>
                  <!-- <textarea class="form-control" id="description" placeholder="Enter Description" name="editor" required></textarea >  -->
                  <script>
                     CKEDITOR.replace( 'editor' );
                  </script> 
               </div>
               <div class="form-group">
                  <label for="action">Action</label> <br/>
                  <select name="action" id="action">
                     <option>Choose a value</option>
                     <option value="1">Active</option>
                     <option value="2">In-Active</option>
                  </select>
                  <!-- <div class="valid-feedback">Valid.</div>
                     <div class="invalid-feedback">Please fill out this field.</div> -->
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6" >
                     <label for="startDate">Start Date</label><span class="require">*</span>
                     <div class="datepicker date input-group">
                        <input type="text" placeholder="Start-date" name="start" class="form-control" id="startDate" required>
                        <div class="input-group-append"><span class="input-group-text"><i class="fas fa-clock"></i></span></div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="endDate">End Date</label><span class="require">*</span>
                     <div class="datepicker date input-group">
                        <input type="text" placeholder="End-date" name="end" class="form-control" id="endDate"required >
                        <div class="input-group-append"><span class="input-group-text"><i class="fas fa-clock"></i></span></div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                     </div>
                  </div>
               </div>
               <div class="form-group" id="file">
                  <label for="file">Upload Event</label><span class="require">*</span>
                  <input type="file" id="txt_file" name="txt_file" class="form-control-file border" accept="image/*" required />
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
               </div>
               <div class="form-group">
                  <label for="floor">Upload Floor</label><span class="require">*</span>
                  <input type="file" id="txt_floor" name="txt_floor" class="form-control-file border" accept="image/*" required/>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
               </div>
               <!-- <a style="margin-left:450px!important;" href="index.php" class="btn btn-danger">Cancel</a> -->
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-tertiary">Submit</button>
         </div>
         </form>
      </div>
   </div>
</div>
<?php include "footer.php"; ?>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<!-- <script src="js/config.js"></script>  -->
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
                 event.preventDefault();
                 $("#loading").show();
           $.ajax({
           url: rootURL + 'image',
           type: "POST",
           data: formData,
           cache: false,
           dataType: "json", 
           contentType: false,
           processData: false,
           success: function(data) {
   			  setTimeout(function() {
   				$("#loading").hide();
   			}, 1000);
   		        $("#results").html("File added successfully");
   				    $("#results").css("color", "green");
               setInterval('location.reload()', 5000);
           },
           error: function() {
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
   
   });
</script>
</body>
</html>