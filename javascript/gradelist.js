function addGrade() {
    var new_grade_no = parseInt($('#total_grades').val()) + 1;

    var new_grade_input = "<div class='d-flex my-2' id='grade_div_" + new_grade_no + "'><input type='text' id='grade_symbol_" + new_grade_no + "' name='grade_symbol_" + new_grade_no + "' class='me-2' placeholder='Grade Symbol'> <input type='text' id='no_st_grade_" + new_grade_no + "' name='no_st_grade_" + new_grade_no + "' placeholder='Number of students'> </div>";
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

