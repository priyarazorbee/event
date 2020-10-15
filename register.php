<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title> Register</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <script src="js/jquery-1.10.2.js"></script> 
  <script src="js/config.js"></script>
  <script>
    var url = "js/config.js";
    
    $.getScript(url, function(){
        $(document).ready(function(){
            console.log(rootURL); // Prints: Hi there!
            
        });
    });
    </script>
  
    
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form id="register" name="forms" class="needs-validation" novalidate>
                <div id ="result"></div>
                  <div id="loading">
                    <img id="loading-image" src="img/45.gif" alt="Loading..." />
                  </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control" name="firstname"  placeholder="First Name" required>
                    <div id ="fname-status"></div>
                   </div>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                    <div id ="lname-status"></div>
                  </div>
                </div>
                  <div class="form-group">
                  <input type="text" class="form-control" id= "username"  name="username" placeholder="Username" required>
                    <div id="username-availability"  style="font-size:12px;"></div>  
                  </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email address" required>
                 <span id="email-availability-status" style="font-size:12px;"></span> 
                  </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" name="repassword" id="repassword"  placeholder="Repeat Password" required>
                     <span id="passwords" style="font-size:12px;"></span>  
                  </div>
                </div>
                <input type="submit" class="btn btn-primary form-control" name="register">

              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  
  <!-- Bootstrap core JavaScript-->
   
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/auth.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
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
            url: rootURL + 'register',
            type: "POST",
            data: formData,
            dataType: 'json',
            success: function(data) {
                setTimeout(function() {
                    $("#loading").hide();
                }, 1000);
                if (data.status == "success") {
                    $('#result').html(data.message);
                    $("#result").css("color", "green");
                    window.location.href = "login.php";
                } else {
                    $('#result').html(data.message);
                    $("#result").css("color", "red");
                    window.location.href = "register.php";
                }
            },
            error: function() {
                setTimeout(function() {
                    $("#loading").hide();
                }, 1000);
                $("#result").html('Check your username/password');
                $("#result").css("color", "red");
                window.location.href = "register.php";
            },
            cache: false,
            contentType: false,
            processData: false
        });
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>
</body>

</html>
