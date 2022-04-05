<!-- Modal -->

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login to CourseGrades!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="partials/_handleLogin.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="loginUsername" class="form-label">Username</label>
                        <!-- <input type="email" maxlength="30" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp"> -->
                        <input type="text" maxlength="30" class="form-control" id="loginUsername" name="loginUsername" aria-describedby="usernameHelp">
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" maxlength="255" class="form-control" id="loginPassword"  name="loginPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>