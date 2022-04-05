
function updateInputs(data){
    var alert = document.getElementById("signUpAlert");
    alert.hidden = true;
    console.log(data);
    if(data.emailSuccess == true){
        console.log("True");
        document.getElementById("verifyButton").hidden = true;
        var firstnameField = document.getElementById("firstnameField");
        firstnameField.removeAttribute('hidden');
        document.getElementById("firstnameEntry").setAttribute('value', data.firstname);

        var lastnameField = document.getElementById("lastnameField");
        lastnameField.removeAttribute('hidden');
        document.getElementById("lastnameEntry").setAttribute('value', data.lastname);

        document.getElementById("usernameField").removeAttribute('hidden');
        document.getElementById("passField").removeAttribute('hidden');
        document.getElementById("cpassField").removeAttribute('hidden');
        document.getElementById("signupButton").removeAttribute('hidden');


    }
    else{
        console.log("False");
        // alert.removeAttribute("hidden");
        alert.hidden = false;
        alert.innerHTML = data.error;
    }
}

function signupProcess(email_id){
    console.log(email_id);
    $.ajax('./partials/_handleSignup.php',{
        type: 'POST',
        dataType: 'json',
        data: { email_id: email_id },
        success: function (data, status, xhr){
            // console.log(data);
            // console.log(data['error']);
            updateInputs(data);

        },
        error: function (jqxhr, textStatus, errorMessage){
        } 
    });

};



function doSignUp(email, username, password, cpassword){
    var alert = document.getElementById("signUpAlert");
    alert.hidden = true;
    if(password.value != cpassword.value){
        console.log("password mismatch");
        alert.hidden = false;
        alert.innerHTML = "Password do not match!";
    }
    else{
        console.log("passwords match");
        $.ajax('partials/_validateUsername.php',{
            type: 'POST',
            dataType: 'json',
            data: { username: username.value },
            success: function (data, status, xhr) {
                console.log(data);
                if(data.usernameExists){
                    username.setCustomValidity("Username not available!");
                    username.reportValidity();
                }
                else{
                    console.log("Create user");
                    $.ajax('partials/_dosignup.php',{
                        type: 'POST',
                        dataType: 'json',
                        data: {email: email.value, username: username.value, password: password.value},
                        success: function (data, status, xhr){
                            if(data.signupSuccess == true){
                                window.location.href = "index.php?signupsuccess=true";
                            } else{
                                window.location.href = "index.php?signupsuccess=false&error=" + data.error;
                            }
                        },
                        error: function (jqxhr, textStatus, errorMessage){
                        }
                    });
                }
            },
            error: function (jqxhr, textStatus, errorMessage){
            } 
        });
    }
}