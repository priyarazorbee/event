<?php
   ini_set("max_execution_time", 0);
   $search = $_SERVER['REQUEST_URI'] ;
   $url_components = parse_url($search); 
      parse_str($url_components['query'], $params); 
        $id= $params['id'];
     $url="http://localhost/event/api/getId/".$id;
   $variableee = json_decode(file_get_contents($url));
  //  echo "<pre>";
  //  print_r($variableee->id);
  //  echo "</pre>";
   
   include "head.php"; 
   include "sidebar.php";
   include "navbar.php";
   ?>
<!-- End of Sidebar -->
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
   <h1 class="h3 mb-4 text-gray-800">Edit Stall</h1>
   <!-- Page Heading -->
   <form method="post" class="form-horizontal" id="updateForm" enctype="multipart/form-data">
       <div id="loading">
         <img id="loading-image" src="img/45.gif" alt="Loading..." />
      </div>
      <div id ="results"></div>
      <input type="hidden" id="<?php echo $variableee->id ?>" name="id" value="<?php echo $variableee->id ?>" class="form-control edit" />	
      <div class="form-group">
         <label class="col-sm-3 control-label">Name</label>
         <div class="col-sm-6">
            <input type="text" id="txt_name" name="txt_name" class="form-control" placeholder="<?php echo $variableee->name ?>" value="<?php echo $variableee->name ?>" />
         </div>
      </div>
      <div class="form-group">
         <label class="col-sm-3 control-label">Description</label>
         <div class="col-sm-6">
            <input type="text" id="description"name="description" class="form-control" placeholder="<?php echo $variableee->description ?>" value="<?php echo $variableee->description ?>"/>
         </div>
      </div>
      <div class="form-row">
         <div class="form-group col-md-6">
            <label class="col-sm-3 control-label">Start Date</label>
            <div class="datepicker date input-group">
               <input type="text" placeholder="Start-date" value="<?php echo $variableee->start ?>" name="start" class="form-control" id="startDate">
               <div class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></div>
            </div>
         </div>
         <div class="form-group col-md-6">
            <label class="col-sm-3 control-label">End Date</label>
            <div class="datepicker date input-group">
               <input type="text" placeholder="End-date" value="<?php echo $variableee->end ?>" name="end" class="form-control" id="endDate">
               <div class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></div>
            </div>
         </div>
      </div>
      <div class="form-group">
         <label class="col-sm-3 control-label">Action</label>   
         <div class="col-sm-6">
            <select name="action" id="action" value="<?php echo $variableee->action ?>" required="required">
               <option value="1">Active</option>
               <option value="2">In-Active</option>
            </select>
         </div>
      </div>
      <div class="form-group">
         <label class="col-sm-3 control-label">File</label>
         <div class="col-sm-6">
            <div class="row">
               <div class="col-sm-6">  
                  <img class="img-thumbnail" src="http://localhost/admin/api/upload/<?php echo $variableee->image ?>"/> 
               </div>
               <div class="col-sm-6"> 
                  <input type="file" id="txt_file" name="txt_file" value="<?php echo $variableee->image ?>" class="form-control" accept="image/*"/>
               </div>
            </div>
         </div>
      </div>
      <div class="form-group">
         <label class="col-sm-3 control-label">Floor</label>
         <div class="col-sm-6">
            <div class="row">
               <div class="col-sm-6">  
                  <img class="img-thumbnail" src="http://localhost/admin/api/floor_upload/<?php echo $variableee->floor ?>"/> 
               </div>
               <div class="col-sm-6"> 
                  <input type="file" id="txt_floor" name="txt_floor" value="<?php echo $variableee->floor ?>" class="form-control" accept="image/*"/>
               </div>
            </div>
         </div>
      </div>
      <div class="form-group">
         <div class="col-sm-offset-3 col-sm-9 m-t-15">
            <input type="hidden" name="_METHOD" value="PUT"/>
            <input type="submit"  name="btn_insert" class="btn btn-success" value="Edit">
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
<?php include "logout.php";?>
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