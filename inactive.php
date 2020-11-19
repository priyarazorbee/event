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
<?php include "logout.php";?>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/inaction.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/jquery-1.7.1.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
</body>
</html>