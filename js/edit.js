var currentImage;


findAction();

function findAction() {
    console.log('findAll');
    $.ajax({
        type: 'GET',
        url: rootURL + 'action',
        dataType: "json", // data type of response
        success: renderList
    });
}

function findById(id) {
    console.log('findById: ' + id);
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
    console.log(list);
    //	$('#imageList li').remove();
    $.each(list, function(index, data) {
        $('#imageList').append(' <div class="card mb-3" style="max-width: 1140px;"><div class="row no-gutters" href="#" data-identity="' + data.id + '"><div class="col-md-4">' +
            (data.image != "" ?
                '<img  src = api/upload/' + data.image + ' class="card-img" id="img-base" onClick="findById(' + data.id + ');"> ' :
                '<img  src = img/download.png class="card-img" id="img-base">'
            ) + '</div><div class="col-md-8"><div class="card-body"><h5 class="card-title"> ' + data.name + '</h5><p class="card-text">' + data.description + '</p><p class="card-text"><small class="text-muted">' + data.start + ' to </small><small class="text-muted">' + data.end + '</small></p><p class="card-text"><span class="active">Stall is available</span></p></div></div></div>');
    });
}
$('#imageList tr').on('click', function() {
    findById($(this).data('identity'));
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
        "phone": $('#phone').val(),
    });
}