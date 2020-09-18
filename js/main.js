var currentImage;
 findAll();  
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
        url: rootURL +'username',
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
       url: rootURL +'email',
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
         //window.location.href = "home.php";
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

 

	$("#btnSave").click(function(e){
		e.preventDefault();
        console.log('addUser');
        debugger;
    $.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: rootURL +'file',
		dataType: "json",
		data: formToJSON(),
		success: function(data, textStatus, jqXHR){
			alert('User created successfully');
		      debugger;
			$('#userName').val(data.username);
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('addUser error: ' + textStatus);
		}
	});
	});
 //   $("#viewForm").submit(function(e){
//		e.preventDefault();
//        console.log('addUser');
//    $.ajax({
//		type: 'POST',
//		contentType: 'application/json',
//		url: rootURL +'view',
//		dataType: "json",
//		data: formToJS(),
//		success: function(data, textStatus, jqXHR){
//			alert('User created successfully');
//		      debugger;
//			$('#username').val(data.username);
//		},
//		error: function(jqXHR, textStatus, errorThrown){
//			alert('addUser error: ' + textStatus);
//		}
//	});
//	});
   $("#loginForm").submit(function(e){
		e.preventDefault();
        console.log('seeUser'); 
       debugger;
   $.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: rootURL +'logins',
		dataType: "json",
		data: formToJSON(),
		success: function(data, textStatus, jqXHR){
			alert('User logged in successfully');
		      debugger;
			
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('seeUser error: ' + textStatus);
		}
	});
	}); 
});



function addUser() {
	console.log('addUser');
   $.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: 'http://localhost/event/api/getUsers',
		dataType: "json",
		data: JSON.stringify({
		
		"firstname": $('#firstName').val(), 
		"email": $('#email').val(),
		"password": $('#password').val(),
		}),
		success: function(data, textStatus, jqXHR){
			alert('User created successfully');
		      debugger;
			
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('addUser error: ' + textStatus);
		}
	});
}

$("#upload").submit(function(e){
		var formData = new FormData($(this)[0]);
e.preventDefault();
  $.ajax({
    url: rootURL +'image',
    type: "POST",
    data: formData,
    success: function (msg) {
      alert(msg)
    },
    cache: false,
    contentType: false,
    processData: false
  });

});

function findAction() {
	console.log('findAll');
	$.ajax({
		type: 'GET',
		url: rootURL +'login',
		dataType: "json", // data type of response
		success: renderList
	});
}



function findAll() {
	console.log('findAll');
	$.ajax({
		type: 'GET',
		url: rootURL,
		dataType: "json", // data type of response
		success: renderList
	});
}
function findById(id) {
//	console.log('findById: ' + id);
	$.ajax({
		type: 'GET',
		url: rootURL +'getId'+'/' + id,
		dataType: "json",
		success: function(data){
			
			console.log('findById success: ' + data.name);
		currentImage = data;
          renderDetails(currentImage);
          
		}
	});
}
$("#deleteForm").submit(function(e){
	debugger;
	console.log('deleteImage');
	$.ajax({
		type: 'DELETE',
		url: rootURL +'delete'+'/' +  $('#id').val(),
		success: function(data){
			alert('Image deleted successfully');
		},
		error: function(textStatus){
			alert('deleteImage error');
		}
	});
});
function renderList(data) {

	var list = data == null ? [] : (data.image instanceof Array ? data.image : [data.image]);

//	$('#imageList li').remove();

    	$.each(list, function(index, data) {
		$('#imageList').append(' <div class="card mb-3" style="max-width: 1140px;"><div class="row no-gutters" href="#" data-identity="' + data.id + '"><div class="col-md-4">'+
   ( data.image !="" ? 
        '<img  src='+data.image+' class="card-img" id="img-base"> '
   :
        '<p id="base"> Image not available' +
        '</p>' 
    ) +'</div><div class="col-md-6"><div class="card-body"><h5 class="card-title"> '+data.name+'</h5><p class="card-text">'+data.description+'</p><p class="card-text"><small class="text-muted">'+data.start+' to </small><small class="text-muted">'+data.end+'</small></p>'+
   ( data.action >1 ? 
        '<p >In-active <br/> <span class="inactive">Stall is not available</span>' +
        '</p>' 
   :
        '<p> Active <br/> <span class="active">Stall is available</span>' +
        '</p>' 
    ) +'</p></div></div><div id ="buttons" class="col-md-2"><button class="btn btn-primary" id="btn-edit"><a href="edit.php?id='+data.id+'">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a></button><br/><button class="btn btn-danger" data-toggle="modal" data-target="#myModal2" >Delete</button></div></div></div>');
    
	}); 
//    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" onClick="findById('+data.id+');">&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
    
}
$('#imageList tr').on('click', function() {
	findById($(this).data('identity'));
});

$("#updateForm").submit(function(e){
		var formData = new FormData($(this)[0]);
debugger;
    console.log('update');
  $.ajax({
    url: rootURL +'update'+'/'+  $('#id').val(),
    type: "POST",
    data: formData,
    success: function (msg) {
      alert(msg)
    },
    cache: false,
    contentType: false,
    processData: false
  });

  e.preventDefault();
});

function renderDetails(image) {
	$('#id').val(image.id);
	$('#txt_name').val(image.name);
	$('#description').val(image.description);
	$('#action').val(image.action);
    $('#start').val(image.start);
    $('#end').val(image.end);
	$('#txt_file').attr('src', 'api/upload/' + image.txt_file);
	
}


function formToJSON() {
	return JSON.stringify({
		
		"username": $('#userName').val(),
        "lname": $('#lastName').val(),
		"email": $('#email').val(),
		"password": $('#password').val(),
		
		
		});
}
function formToJS() {
	return JSON.stringify({
		
		"username": $('#username').val(), 
		"email": $('#email').val(),
		"password": $('#password').val(),
		"confirm_password": $('#confirm_password').val(),
		"phone":$('#phone').val(),
		});
}