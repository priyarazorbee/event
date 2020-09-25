findAll();


$("#upload").submit(function(e) {
	var formData = new FormData($(this)[0]);
	$("#loading").show();
    e.preventDefault();
    $.ajax({
        url: rootURL + 'image',
        type: "POST",
        data: formData,
        success: function(data) {
			setTimeout(function() {
				$("#loading").hide();
			}, 1000);
		        $("#results").html("File added successfully");
				$("#results").css("color", "green");
                setInterval('location.reload()', 5000);
        },
        error: function() {
			setTimeout(function() {
				$("#loading").hide();
			}, 1000);
			$("#results").html('Something went wrong');
			$("#results").css("color", "red");
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
        url: rootURL + 'login',
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
        url: rootURL + 'getId' + '/' + id,
        dataType: "json",
        success: function(data) {

            console.log('findById success: ' + data.name);
            currentImage = data;
            renderDetails(currentImage);

        }
    });
}
function renderList(data) {

    var list = data == null ? [] : (data.image instanceof Array ? data.image : [data.image]);

    //	$('#imageList li').remove();

    $.each(list, function(index, data) {
        $('#imageList').append(' <div class="card mb-3" style="max-width: 1140px;"><div class="row no-gutters" href="#" data-identity="' + data.id + '"><div class="col-md-4">' +
            (data.image != "" ?
                '<img  src= api/upload/' + data.image + ' class="card-img" id="img-base"> ' :
                '<p id="base"> Image not available' +
                '</p>'
            ) + '</div><div class="col-md-6"><div class="card-body"><h5 class="card-title"> ' + data.name + '</h5><p class="card-text">' + data.description + '</p><p class="card-text"><small class="text-muted">' + data.start + ' to </small><small class="text-muted">' + data.end + '</small></p>' +
            (data.action > 1 ?
                '<p >In-active <br/> <span class="inactive">Stall is not available</span>' +
                '</p>' :
                '<p> Active <br/> <span class="active">Stall is available</span>' +
                '</p>'
            ) + '</p></div></div><div id ="buttons" class="col-md-2"><button class="btn btn-primary" id="btn-edit"><a href="edit.php?id=' + data.id + '">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a></button><br/><button class="btn btn-danger passDelete" onClick="findById('+data.id+');" id='+data.id+'  data-toggle="modal" data-target="#myModal2">Delete</button></div></div></div>');

    });
    //    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" onClick="findById('+data.id+');">&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>

}
$('#imageList tr').on('click', function() {
    findById($(this).data('identity'));
});

$("#deleteForm").submit(function(e) {
    debugger;
    console.log('deleteImage');
    $.ajax({
		type: 'DELETE',
		url: rootURL + 'delete'+'/' + $('#id').val(),
		success: function(data, textStatus, jqXHR){
			alert('data deleted successfully');
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('delete data error');
		}
	});
});        
    
$("#updateForm").submit(function(e) {
    var formData = new FormData($(this)[0]);
	$("#loading").show();
    console.log('update');
    $.ajax({
        url: rootURL + 'update' + '/' + $(".edit").val(),
        type: "POST",
        data: formData,
        success: function(data) {
			setTimeout(function() {
				$("#loading").hide();
			}, 1000);
		        $("#results").html("File uploaded successfully");
				$("#results").css("color", "green");
                setInterval('location.reload()', 5000);
        },
		error: function() {
			setTimeout(function() {
				$("#loading").hide();
			}, 1000);
			$("#result").html('Something went wrong');
			$("#result").css("color", "red");
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
        "phone": $('#phone').val(),
    });
}