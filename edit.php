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
<div class="container">
   <!-- The Modal -->
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Edit Events</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <form method="post" class="form-horizontal" id="updateForm" enctype="multipart/form-data">
               <div id="results"></div>
               <div id="loading">
                  <img id="loading-image" src="img/45.gif" alt="Loading..." />
               </div>
               <input type="hidden" id="<?php echo $variableee->id ?>" name="id" value="<?php echo $variableee->id ?>" class="form-control edit" />	
               <div class="form-group">
                  <label for="name">Event Title</label><span class="require">*</span>
                  <input type="text" id="txt_name" name="txt_name" class="form-control" placeholder="<?php echo $variableee->name ?>" value="<?php echo $variableee->name ?>"/>
               </div>
               <div class="form-group">
                  <label for="pwd">Event Description</label>
                  <textarea type="text" class="form-control ckeditor" id="description"  name="editor" ><?php echo $variableee->description ?></textarea>
                  <script>
                     CKEDITOR.on('instanceReady', function(){
                     $.each( CKEDITOR.instances, function(instance) {
                     CKEDITOR.instances[instance].on("change", function(e) {
                       for ( instance in CKEDITOR.instances )
                       CKEDITOR.instances[instance].updateElement();
                     });
                     });
                     });
                     
                               
                  </script> 
               </div>
               <div class="form-group">
                  <label for="action">Action</label> <br/>
                  <select name="action" id="action" value="<?php echo $variableee->action ?>"  style="width:500px;border-radius:5px;height:35px;">
                     <option value="1" <?php if($variableee->action[0] == "1") echo "selected";?>>Active</option>
                     <option value="2" <?php if($variableee->action[0] == "2") echo "selected";?>>In-Active</option>
                  </select>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6" >
                     <label for="startDate">Start Date</label><span class="require">*</span>
                     <div class="datepicker date input-group">
                        <input type="text" placeholder="Start-date" value="<?php echo $variableee->start ?>" name="start" class="form-control" id="startDate">
                        <div class="input-group-append"><span class="input-group-text"><i class="fas fa-clock"></i></span></div>
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="endDate">End Date</label><span class="require">*</span>
                     <div class="datepicker date input-group">
                        <input type="text" placeholder="End-date" value="<?php echo $variableee->end ?>" name="end" class="form-control" id="endDate">
                        <div class="input-group-append"><span class="input-group-text"><i class="fas fa-clock"></i></span></div>
                     </div>
                  </div>
               </div>
               <div class="form-group" id="file">
                  <label for="file">Upload Event</label><span class="require">*</span>
                  <div class="col-sm-6">  
                     <img class="img-thumbnail" id="image/api/upload/" src="api/upload/<?php echo $variableee->image ?>"/> 
                  </div>
                  <div class="col-sm-6"> 
                     <input type="file" id="txt_file" name="txt_file" value="<?php echo $variableee->image ?>" class="form-control" accept="image/*"/>
                  </div>
               </div>
               <div class="form-group">
                  <label for="floor">Upload Floor</label><span class="require">*</span>
                  <div class="col-sm-6"> 
                     <img class="img-thumbnail" id="image/api/floor_upload/" src="api/floor_upload/<?php echo $variableee->floor ?>"/> 
                  </div>
                  <div class="col-sm-6"> 
                     <input type="file" id="txt_floor" name="txt_floor" value="<?php echo $variableee->floor ?>" class="form-control" accept="image/*"/>
                  </div>
               </div>
               <!-- <a style="margin-left:450px!important;" href="index.php" class="btn btn-danger">Cancel</a> -->
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         <input type="hidden" name="_METHOD" value="PUT"/>
         <input type="submit"  name="btn_insert" class="btn btn-success" value="Edit">
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
   
      $(function () {
   
       // INITIALIZE DATEPICKER PLUGIN
       $('.datepicker').datepicker({
           clearBtn: true,
           format: "yyyy/mm/dd"
       });
   
   });
   
   $("#updateForm").submit(function(e) {
      e.preventDefault(); 
      var formData = new FormData($(this)[0]);
      $("#loading").show();
      debugger;
      $.ajax({
        url: rootURL + 'update' + '/' + $(".edit").val(),
        type: "POST",
        data: formData,
        cache: false,
        dataType: "json", 
        contentType: false,
        processData: false, 
        success: function(data) {
        $("#loading").hide();
        $("#results").html(data.message);
   	  $("#results").css("color", "green");
        setInterval('location.reload()', 5000);
        },
   error: function() {
         $("#loading").hide();
         $("#result").html('Something went wrong');
         $("#result").css("color", "red");
   },
        cache: false,
        contentType: false,
        processData: false
    });
   
   
   }); 
</script>  
</body>
</html>
