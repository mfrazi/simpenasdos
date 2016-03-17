function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#repassword").val();

    if (password != confirmPassword){
        $("#checkpassword").html('<div class="red-text text-accent-1">Password tidak sama</div>');
        $("#submitButton").attr('disabled', true);
    }
    else{
        $("#checkpassword").html('');
        $("#submitButton").attr('disabled', false);
    }
}

function check(id) {
    var name = $("#name").val().length;
    var nip = $("#nip").val().length;
    var username = $("#username").val().length;
    if (name === 0 || nip === 0 || username === 0){
        $("#submitButton").attr('disabled', true);
    }
    else if(name != 0 || nip != 0 || username != 0){
        $("#submitButton").attr('disabled', false);
    }
}

$(document).ready(function () {
    $("#name").keyup(check);
    $("#nip").keyup(check);
    $("#username").keyup(check);
    $("#repassword").keyup(checkPasswordMatch);
    $("#password").keyup(checkPasswordMatch);
});
