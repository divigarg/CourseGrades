<!-- Modal -->
<script src="javascript/signup.js"></script>

<script src="javascript/emailValidation.js"></script>

<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup for a CourseGrades Teacher Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="alert alert-danger" id="signUpAlert" role="alert" hidden>
            </div>

            <form id="signupForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="signupEmail" class="form-label">Email Id</label>
                        <input type="email" maxlength="30" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3" id="firstnameField" hidden>
                        <label for="signupUsername" class="form-label">Firstname</label>
                        <input type="text" maxlength="30" class="form-control" id="firstnameEntry" readonly>
                    </div>
                    <div class="mb-3" id="lastnameField" hidden>
                        <label for="signupUsername" class="form-label">Lastname</label>
                        <input type="text" maxlength="30" class="form-control" id="lastnameEntry" readonly>
                    </div>
                    <div class="mb-3" id="usernameField" hidden>
                        <label for="signupUsername" class="form-label">Username</label>
                        <input type="text" maxlength="30" class="form-control" id="signupUsername" name="signupUsername" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3" id="passField" hidden>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" maxlength="255" class="form-control" id="signupPassword" name="signupPassword">
                    </div>
                    <div class="mb-3" id="cpassField" hidden>
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="signupcPassword" name="signupcPassword">
                    </div>
                    <!-- <input type="submit" name="submit" value="Submit" onclick="ValidateEmail(document.signupForm.signupEmail)"> -->
                    <!-- <button type="button" onclick="signupProcess()" class="btn btn-primary">Get OTP</button> -->
                    <button type="button" id="verifyButton" onclick="ValidateEmail(document.getElementById('signupEmail'))" class="btn btn-primary">Verify</button>
                    <button type="button" id="signupButton" onclick="doSignUp(document.getElementById('signupEmail'), document.getElementById('signupUsername'), document.getElementById('signupPassword'), document.getElementById('signupcPassword'))" class="btn btn-primary" hidden>Signup</button>

                </div>
            </form>
        </div>
    </div>
</div>