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
    var nama = $("#nama").val().length;
    var nip = $("#nip").val().length;
    var username = $("#username").val().length;
    if (nama === 0 || nip === 0 || username === 0){
        $("#submitButton").attr('disabled', true);
    }
    else if(nama != 0 || nip != 0 || username != 0){
        $("#submitButton").attr('disabled', false);
    }
}

$(document).ready(function () {
    $("#nama").keyup(check);
    $("#nip").keyup(check);
    $("#username").keyup(check);
    $("#repassword").keyup(checkPasswordMatch);
    $("#password").keyup(checkPasswordMatch);
});
