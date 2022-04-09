function addGrade() {
    var new_grade_no = parseInt($('#total_grades').val()) + 1;

    var new_grade_input = "<div class='d-flex my-2' id='grade_div_" + new_grade_no + "'> <input type='text' id='grade_symbol_" + new_grade_no + "' name='grade_symbol_" + new_grade_no + "' class='me-2' placeholder='Grade Symbol'> <input type='text' id='no_st_grade_" + new_grade_no + "' name='no_st_grade_" + new_grade_no + "' placeholder='Number of students'> </div>";
    $('#gradesList').append(new_grade_input);

    $('#total_grades').val(new_grade_no);
}

function removeGrade() {
    var last_grade_no = $('#total_grades').val();

    if (last_grade_no > 0) {
        $('#grade_div_' + last_grade_no).remove();
        $('#total_grades').val(last_grade_no - 1);
    }
}


function submitForm(){
    var total_grades = parseInt($('#total_grades').val());
    var academic_year = $('#AcademicYear').val();
    var semester = $('#Semester').val();
    var courseId = $('#courseId').val();
    var gradeDistribution = {};
    for(var i = 1; i <= total_grades; i++){
        gradeDistribution[($('#grade_symbol_' + i).val()).trim()] = parseInt($('#no_st_grade_' + i).val());
    }

    console.log(total_grades);
    console.log(academic_year);
    console.log(semester);
    console.log(courseId);
    console.log(gradeDistribution);

    $.ajax('./partials/_addTeachingSessiontodb.php',{
        type: "POST",
        dataType: "text",
        data: {academic_year: academic_year, semester: semester, courseId: courseId, gradeDistribution: JSON.stringify(gradeDistribution)},
        success: function(data, status, xhr){
            console.log(data);
            //TODO: Error Handling
            // window.location.href = './my_courses.php';
        }
    });


}