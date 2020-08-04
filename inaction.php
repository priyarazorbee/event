<?php include "head.php";
include "sidebar.php";
include "navbar.php";
?>


    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
 <h1 class="h3 mb-4 text-gray-800">In-Active Stall</h1>
          <!-- Page Heading -->
         <div id="imageList">
       </div> 
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update file</h4>
        </div>
        <form method="post" class="form-horizontal"  id="viewForm">
	
       <input type="hidden" id="id" name="event_id" class="form-control" />	
            
       <div class="form-group">
				<label class="col-sm-3 control-label">Name</label>
				<div class="col-sm-6">
        <input type="text" id="username" name="username" class="form-control" required>
            </div>
    </div>         
       <div class="form-group">
				<label class="col-sm-3 control-label">Phone Number</label>
				<div class="col-sm-6">
        <input type="number" id="phone" name="phone" class="form-control" />
            </div>
    </div>          
        <div class="form-group">
				<label class="col-sm-3 control-label">Details</label>
				<div class="col-sm-6">
        <input type="text" id="details" class="form-control"  name="details"/>
       
        </div>
            
    </div> 
    <input type="submit"  id="btnSave" class="btn btn-success" value="Add">
</form>
        <div class="modal-footer">
           
       
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div> 
</div>
    </div>

        
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
        <?php include("footer.php");?>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/inaction.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="js/jquery-1.7.1.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
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
</script>
</body>

</html>
