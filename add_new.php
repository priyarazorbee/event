<?php
include "head.php";
include "sidebar.php";
include "navbar.php";
?>
   
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
             <h1 class="h3 mb-4 text-gray-800">Add New Stall</h1>
          <!-- Page Heading -->
         <form method="post" class="form-horizontal" id="upload" enctype="multipart/form-data">
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Name</label>
				<div class="col-sm-8">
				<input type="text" id="txt_name" name="txt_name" class="form-control" placeholder="enter name" />
				</div>
				</div>
				<div class="form-row">	
				<div class="form-group col-md-6">
				<label class="col-lg-3 control-label">Description</label>
				<div class="col-lg-6">
				<input type="text" id="description" name="description" class="form-control" placeholder="enter Description" />
				</div>
				</div>
             <div class="form-group col-md-6">
                 <label class="col-lg-3 control-label">Action</label>   
                
                  <div class="col-lg-6">  
                <select name="action" id="action" required="required">
                            <option value="1">Active</option>
                            <option value="2">In-Active</option>
                        </select>
                </div>   
                 </div>  
                  </div>  
             <div class="form-row">
                <div class="form-group col-md-6">
                <label class="col-sm-3 control-label">Start Date</label>
                   <div class="datepicker date input-group">
                    <input type="text" placeholder="Start-date" name="start" class="form-control" id="startDate">
                    <div class="input-group-append"><span class="input-group-text"><i class="fas fa-clock"></i></span></div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-sm-3 control-label">End Date</label>
                    <div class="datepicker date input-group">
                    <input type="text" placeholder="End-date" name="end" class="form-control" id="endDate">
                    <div class="input-group-append"><span class="input-group-text"><i class="fas fa-clock"></i></span></div>
                    </div>
                    </div>
             </div>        
              
             
                
				<div class="form-group">
				<label class="col-sm-3 control-label">File</label>
				<div class="col-sm-6">
				<input type="file" id="txt_file" name="txt_file" class="form-control" />
				</div>
				</div>
                <div class="form-group">
				<label class="col-sm-3 control-label">Floor</label>
				<div class="col-sm-6">
				<input type="file" id="txt_floor" name="txt_floor" class="form-control" />
				</div>
				</div>
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit" href="edit.php" name="btn_insert" class="btn btn-success " value="Insert">
				<a href="index.php" class="btn btn-danger">Cancel</a>
				</div>
				</div>
					
			</form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
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
  <?php include "logout1.php";?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
<script src="js/main.js"></script>
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
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
