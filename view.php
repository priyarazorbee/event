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
   <h1 class="h3 mb-4 text-gray-800"></h1>
   <!-- Page Heading -->
 
      <div class="card">
  <img src="api/upload/<?php echo $variableee->image ?>" alt="John" style="width:100%">
  <h1><?php echo $variableee->name ?></h1>
  <p class="title"><?php echo $variableee->description ?></p>
  <p>Starts on <?php echo $variableee->start ?> Ends on <?php echo $variableee->end ?></p>
  
  <p class="card-value"><button class="card-button">Contact</button></p>
</div>
<!-- /.container-fluid -->
</div>
<div class="footer-new"><?php include "footer.php"; ?></div>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
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