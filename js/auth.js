
$(document).ready(function() { 
$("#register").submit(function(e){
    var formData = new FormData($(this)[0]);
    $("#loading").show();
    e.preventDefault();
$.ajax({
    url: rootURL +'register',
    type: "POST",
    data: formData,
    dataType : 'json', 
    success: function(data){
         setTimeout(function(){
        $("#loading").hide();
    }, 1000);
         $('#result').html(data.message);   
         $("#result").css("color", "green"); 
     },
    error:function(){
         setTimeout(function(){
        $("#loading").hide();
    }, 1000);
        $("#result").html('Already registered');
       $("#result").css("color", "red");
  } ,  
  cache: false,
 contentType: false,
  processData: false
});

});

$("#username").change(function(){
 $("#loading").show();
jQuery.ajax({
    url: rootURL +'usernameValid',
    data:'username='+$("#username").val(),
    type: "POST",
    dataType : 'json', 
success:function(data){
    setTimeout(function(){
        $("#loading").hide();
    }, 1000);
    $("#username-availability").html(data.message);
    $("#username-availability").css("color", "green");
    
    },
    error:function (data){
         setTimeout(function(){
        $("#loading").hide();
    }, 1000);
    $("#username-availability").html(data.message);  
    $("#username-availability").css("color", "red");
}
});
});



$("#email").change(function(){
 $("#loading").show();
   jQuery.ajax({
   url: rootURL +'emailValid',
   data:'email='+$("#email").val(),
   type: "POST",
   dataType : 'json', 
success:function(data){
     setTimeout(function(){
        $("#loading").hide();
        
    }, 1000);
    $("#email-availability-status").html(data.message);
    $("#email-availability").css("color", data.color);
},
error:function (){
     setTimeout(function(){
        $("#loading").hide();
    }, 1000);
     $("#email-availability-status").html(data.message);
    $("#email-availability").css("color",data.color);
}
});
});
$('#repassword').keyup(function(e){
            //get values 
            var pass = $('#password').val();
            var confpass = $(this).val();
            
            //check the strings
            if(pass == confpass){
                //if both are same remove the error and allow to submit
                $('#passwords').text('password match');
                $("#passwords").css("color", "green");
            }else{
                //if not matching show error and not allow to submit
                $('#passwords').text('Password not matching');
      $("#passwords").css("color", "red");
            }
        });
$("#login").submit(function(e){
    var formData = new FormData($(this)[0]);
    $("#loading").show();
    e.preventDefault();
$.ajax({
url: rootURL +'login',
type: "POST",
data: formData,
dataType : 'json', 
success: function(data){
    setTimeout(function(){
        $("#loading").hide();
    }, 1000);
        $('#result').html(data.message);   
         $("#result").css("color", data.color);  
     window.location.href = "home.php";
  },
error:function(){
       setTimeout(function(){
        $("#loading").hide();
    }, 1000);
      $("#result").html('Check your username/password');
      $("#result").css("color", data.color);
  } ,  
cache: false,
contentType: false,
processData: false
});

    });
});