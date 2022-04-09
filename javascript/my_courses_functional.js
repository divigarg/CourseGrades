edits = document.getElementsByClassName('edit');
Array.from(edits).forEach((element) => {
    element.addEventListener("click", (e) => {
    console.log("edit ");
    tr = e.target.parentNode.parentNode;
    academic_year = tr.getElementsByTagName("th")[0].innerText;
    semester = tr.getElementsByTagName("td")[0].innerText;
    course_id = tr.getElementsByTagName("td")[1].innerText;
    
    document.getElementById('addNewTSModalLabel').innerText = "Edit Teaching Session!";

    document.getElementById('TSAlert').hidden = true;
    document.getElementById('TSAlert').innerText = '';

    document.getElementById('AcademicYear').disabled = true;
    $('#AcademicYear').val(academic_year);
    document.getElementById('Semester').disabled = true;
    $('#Semester').val(semester);
    document.getElementById('courseId').disabled = true;
    $('#courseId').val(course_id);
    
    document.getElementById('gradesList').innerHTML = '';
    $('#total_grades').val(0);
    document.getElementById('submitButton').onclick = editForm;
    // document.getElementById('')
    var grade_distribution = {};
    $.ajax('partials/_extractGDforEdit.php',{
        type: "POST",
        dataType: "text",
        data: {academic_year: academic_year, semester: semester, course_id: course_id},
        success: function(data, status, xhr){
            console.log(data);
            if(data.charAt(0) == '{'){
                grade_distribution = JSON.parse(data);
            }
            var count = 0;
            for(var key in grade_distribution){
                count++;
                addGrade();
                // console.log(A);
                $('#grade_symbol_' + count).val(key);
                $('#no_st_grade_' + count).val(grade_distribution[key]);
            }
    
        }
    });
    
    $('#addNewTSModal').modal('toggle');
    
  });
});


deletes = document.getElementsByClassName('delete');
Array.from(deletes).forEach((element) => {
    element.addEventListener("click", (e) => {
    console.log("delete ");
    sno = e.target.id.substr(1,);
    if(confirm("Are you sure you want to delete this course?")){
        console.log("yes");
        $.ajax('partials/_deleteRow.php',
        {
        type: "POST",
        dataType: "text",
        data: {delete: sno},
        success: function(data, status, xhr){
            console.log(data);
            window.location.href = `my_courses.php`;
        },
        error: function (jqxhr, textStatus, errorMessage){
        } 
        });
        //use post request to submit the form
    }
    else{
        console.log("no");
    }
    });
});


function addNewCourse(){
    document.getElementById('addNewTSModalLabel').innerText = "Add new Teaching Session!";

    document.getElementById('TSAlert').hidden = true;
    document.getElementById('TSAlert').innerText = '';


    document.getElementById('AcademicYear').disabled = false;
    $('#AcademicYear').val('');
    document.getElementById('Semester').disabled = false;
    $('#Semester').val('');
    document.getElementById('courseId').disabled = false;
    $('#courseId').val('');

    document.getElementById('gradesList').innerHTML = '';
    $('#total_grades').val(0);
    document.getElementById('submitButton').onclick = submitForm;
    $('#addNewTSModal').modal('toggle');
}