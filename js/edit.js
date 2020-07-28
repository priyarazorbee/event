var rootURL = "http://localhost/event/api/";

var currentImage;


findAction();
function findAction() {
	console.log('findAll');
	$.ajax({
		type: 'GET',
		url: rootURL +'action',
		dataType: "json", // data type of response
		success: renderList
	});
}

function findById(id) {
	console.log('findById: ' + id);
	$.ajax({
		type: 'GET',
		url: rootURL + id,
		dataType: "json",
		success: function(data){
			
			console.log('findById success: ' + data.name);
		currentImage = data;
          renderDetails(currentImage);
          
		}
	});
}
function renderList(data) {
	
	var list = data == null ? [] : (data.image instanceof Array ? data.image : [data.image]);
console.log(list);
//	$('#imageList li').remove();
	$.each(list, function(index, data) {
		$('#imageList').append('<tr href="#" data-identity="' + data.id + '"><td style="width:400px!important;"><img class="img-thumbnail" style="width:100%;" src='+data.image+'></td><td class="center" id="names"><span><b>Name: </b> '+data.name+'</span><br/><span class="center"><b>Description:</b>'+data.description+'</span><br/><span class="center"><b>Action:</b>'+data.action+'</span><br/><span class="center"><b>Start Date</b>:'+data.start+'</span><br/><span class="center"><b>End date:</b>'+data.end+'</span></td></tr>');
	});
}
$('#imageList tr').on('click', function() {
	findById($(this).data('identity'));
});

  $("#viewForm").submit(function(e){
		var formData = new FormData($(this)[0]);

  $.ajax({
    url: rootURL +'view',
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
	$('#txt_file').attr('src', 'api/upload/' + image.txt_file);
	
}


function formToJSON() {
	return JSON.stringify({
		
		"username": $('#username').val(), 
		"email": $('#email').val(),
		"password": $('#password').val(),
		"confirm_password": $('#confirm_password').val(),
		
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
