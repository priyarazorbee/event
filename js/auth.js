$(document).ready(function() {
    

    $("#username").change(function() {
        $("#loading").show();
        jQuery.ajax({
            url: rootURL + 'usernameValid',
            data: 'username=' + $("#username").val(),
            type: "POST",
            dataType: 'json',
            success: function(data) {
                setTimeout(function() {
                    $("#loading").hide();
                }, 1000);
                if (data.status == "success") {
                    $("#username-availability").html(data.message);
                    $("#username-availability").css("color", "green");
                } else {
                    $("#username-availability").html(data.message);
                    $("#username-availability").css("color", "red");
                }
            },
            error: function(data) {
                setTimeout(function() {
                    $("#loading").hide();
                }, 1000);
                $("#username-availability").html("Please give valid username");
                $("#username-availability").css("color", "red");
            }
        });
    });



    $("#email").change(function() {
        $("#loading").show();
        jQuery.ajax({
            url: rootURL + 'emailValid',
            data: 'email=' + $("#email").val(),
            type: "POST",
            dataType: 'json',
            success: function(data) {
                setTimeout(function() {
                    $("#loading").hide();
                }, 1000);
                if (data.status == "success") {
                    $("#email-availability-status").html(data.message);
                    $("#email-availability-status").css("color", "green");
                } else {
                    $("#email-availability-status").html(data.message);
                    $("#email-availability-status").css("color", "red");
                }
            },
            error: function() {
                setTimeout(function() {
                    $("#loading").hide();
                }, 1000);
                $("#email-availability-status").html("Please give valid email-id");
                $("#email-availability-status").css("color", "red");
            }
        });
    });
    $('#repassword').keyup(function(e) {
        //get values 
        var pass = $('#password').val();
        var confpass = $(this).val();

        //check the strings
        if (pass == confpass) {
            //if both are same remove the error and allow to submit
            $('#passwords').text('Password match');
            $("#passwords").css("color", "green");
        } else {
            //if not matching show error and not allow to submit
            $('#passwords').text('Password not matching');
            $("#passwords").css("color", "red");
        }
    });
    $("#login").submit(function(e) {

        var formData = new FormData($(this)[0]);
        $("#loading").show();
        e.preventDefault();
        $.ajax({
            url: rootURL + 'login',
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
                    window.location.href = "home.php";
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
    });
});