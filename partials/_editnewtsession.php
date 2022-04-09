<!-- Modal -->
<script src="javascript/gradelist.js"></script>

<div class="modal fade" id="addNewTSModal" tabindex="-1" aria-labelledby="addNewTSModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewTSModalLabel">Add new Teaching Session!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- <div class="alert alert-danger" id="loginAlert" role="alert" hidden> -->
            <!-- </div> -->


            <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="AcademicYear" class="form-label">Academic Year</label>
                        <!-- <input type="email" maxlength="30" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp"> -->
                        <input type="text" maxlength="7" class="form-control" id="AcademicYear" name="AcademicYear" aria-describedby="AcademicYearHelp" placeholder="2021-22">
                    </div>
                    <div class="mb-3">
                        <label for="Semester" class="form-label">Semester</label>
                        <input type="text" maxlength="255" class="form-control" id="Semester" name="Semester" placeholder="1, 2 or 3">
                    </div>
                    <div class="mb-3">
                        <label for="courseId" class="form-label">Course Id</label>
                        <input type="text" list="courseIdOptions" maxlength="10" class="form-control" id="courseId" name="courseId">
                        <datalist id="courseIdOptions">
                            <?php 

                                // can show course_id according to the teacher department
                                $sql = "SELECT course_id FROM courses";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<option value="' . $row['course_id'] . '">';
                                }
                            ?>
                        </datalist>
                    </div>
                    
                    <button type="button" onclick="addGrade()" class="btn btn-outline-dark">Add a grade field</button>
                    <button type="button" onclick="removeGrade()" class="btn btn-outline-dark">Remove a grade field</button>
                    <div id="gradesList">

                    </div>
                    <input type="hidden" value="0" id="total_grades" name="total_grades">

                    <button type="button" onclick="submitForm()" class="btn my-2 btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>