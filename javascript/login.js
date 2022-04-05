

function loginProcess(username, password){
    var alert = document.getElementById("loginAlert");
    alert.hidden = true;
    $.ajax('partials/_handleLogin.php', {
        type: 'POST',
        dataType: 'json',
        data: { username: username.value, password: password.value },
        success: function(data, status, xhr){
            if(data.loginSuccess){
                //TODO: to transfer to the place where according to user
                window.location.href = "index.php";
            }
            else{
                alert.hidden = false;
                alert.innerHTML = data.error;
            }

        }
    });

}