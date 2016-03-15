$("#submitButton").attr('disabled', true);
$("#nip").keyup(function(){
    $("#username").val(this.value);
});

function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#repassword").val();

    if (password != confirmPassword){
        $("#checkpassword").html('<div class="red-text text-accent-1">Password tidak sama</div>');
        $("#submitButton").attr('disabled', true);
    }
    else if(password!="" && confirmPassword!=""){
        $("#checkpassword").html('');
        $("#submitButton").attr('disabled', false);
    }
    else if(password=="" && confirmPassword==""){
        $("#checkpassword").html('');
        $("#submitButton").attr('disabled', true);
    }
}

$(document).ready(function () {
    $("#repassword").keyup(checkPasswordMatch);
    $("#password").keyup(checkPasswordMatch);
});
