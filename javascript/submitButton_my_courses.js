
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
            if(data == "teacher dept not matching"){
                document.getElementById('TSAlert').hidden = false;
                document.getElementById('TSAlert').innerText = "You cannot add the course of other departments!";
            }
            else if(data == "a_s insertion error"){
                document.getElementById('TSAlert').hidden = false;
                document.getElementById('TSAlert').innerText = "New academic session insertion failed!";
            }
            else if(data == "a_s aid selection error"){
                document.getElementById('TSAlert').hidden = false;
                document.getElementById('TSAlert').innerText = "Academic Session doesnot exist!";
            }
            else if(data == "t_s already exist"){
                document.getElementById('TSAlert').hidden = false;
                document.getElementById('TSAlert').innerText = "The teaching session already exists!";
            }
            else if(data == "t_s insert error"){
                document.getElementById('TSAlert').hidden = false;
                document.getElementById('TSAlert').innerText = "New teaching session creation failed!";
            }
            else if(data == "login error"){
                document.getElementById('TSAlert').hidden = false;
                document.getElementById('TSAlert').innerText = "Login error!";
            }
            else{
                window.location.href = './my_courses.php';
            }
            //TODO: Error Handling
        }
    });


}



function editForm(){
    console.log("Editing the form");
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

    $.ajax('./partials/_editTeachingSessiontodb.php',{
        type: "POST",
        dataType: "text",
        data: {academic_year: academic_year, semester: semester, courseId: courseId, gradeDistribution: JSON.stringify(gradeDistribution)},
        success: function(data, status, xhr){
            console.log(data);
            if(data == "a_s extraction error"){
                document.getElementById('TSAlert').hidden = false;
                document.getElementById('TSAlert').innerText = "Academic Session doesnot exist!";
            }
            else if(data == "t_s update error"){
                document.getElementById('TSAlert').hidden = false;
                document.getElementById('TSAlert').innerText = "Teaching Session could not be updated!";
            }
            else if(data == "login error"){
                document.getElementById('TSAlert').hidden = false;
                document.getElementById('TSAlert').innerText = "Login error!";
            }
            else{
                window.location.href = './my_courses.php';
            }
            
            //TODO: Error Handling
            // window.location.href = './my_courses.php';
        }
    });
}