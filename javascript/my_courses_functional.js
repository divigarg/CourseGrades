edits = document.getElementsByClassName('edit');
Array.from(edits).forEach((element) => {
    element.addEventListener("click", (e) => {
    console.log("edit ");
    tr = e.target.parentNode.parentNode;
    // academic_year = tr.getElementsByTagName("td")[0].innerText;
    // semester = tr.getElementsByTagName("td")[1].innerText;
    // course_id = tr.getElementsByTagName("td")[2].innerText;
    // console.log(title, desc);
    // descriptionEdit.value = desc;
    // titleEdit.value = title;
    // snoEdit.value = e.target.id;
    // console.log("snoValue: ", snoEdit.value);

    $('#editModal').modal('toggle');
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
