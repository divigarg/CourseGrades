<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    session_start();
    require "_dbconnect.php";
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['isteacher'] == true){

        $teacher_id = $_SESSION['teacherId'];
        $course_id = $_POST['course_id'];
        $academic_year = $_POST['academic_year'];
        $semester = $_POST['semester'];

        $sql = "SELECT * FROM academic_session WHERE academic_year='$academic_year' and semester='$semester'";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);
        if($numRows > 0){
            $row = mysqli_fetch_array($result);
            $academic_id = $row['academic_id'];
        }
        else{
            echo "a_s extract error";
            exit(0);
        }

        $sql = "SELECT * FROM `teaching_session` WHERE course_id='$course_id' AND academic_id='$academic_id' AND teacher_id='$teacher_id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo mysqli_fetch_assoc($result)['grade_distribution'];
        }
        else
            echo "extraction error";
    }
    else{
        echo "login error";
    }

}

?>