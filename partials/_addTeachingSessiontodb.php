<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    session_start();
    require "_dbconnect.php";
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['isteacher'] == true){

        $teacher_id = $_SESSION['teacherId'];
        $grade_distribution = $_POST['gradeDistribution'];
        $course_id = $_POST['courseId'];
        $academic_year = $_POST['academic_year'];
        $semester = $_POST['semester'];

        $sqlTD = "SELECT * from teacher_in_dept WHERE teacher_id='$teacher_id'";
        $sqlCD = "SELECT * from courses WHERE course_id='$course_id'";
        $resultTD = mysqli_query($conn, $sqlTD);
        $resultCD = mysqli_query($conn, $sqlCD);
        if(mysqli_fetch_array($resultTD)['dept_id'] == mysqli_fetch_array($resultCD)['course_dept_id']){

        }
        else{
            echo "teacher dept not matching";
            exit(0);
        }

        
        $sql = "SELECT * FROM academic_session WHERE academic_year='$academic_year' and semester='$semester'";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);
        if($numRows > 0){
            $row = mysqli_fetch_array($result);
            $academic_id = $row['academic_id'];
        }
        else{
            $sql = "INSERT INTO academic_session (`academic_year`, `semester`) VALUES ('$academic_year', '$semester')";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                echo "a_s insertion error";
                exit(0);
            }

            $sql = "SELECT academic_id FROM academic_session WHERE academic_year='$academic_year' and semester='$semester'";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                echo "a_s aid selection error";
                exit(0);
            }
            $academic_id = mysqli_fetch_assoc($result)['academic_id'];
        }

        $sql = "SELECT * FROM teaching_session WHERE academic_id='$academic_id' AND course_id='$course_id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            echo "t_s already exist";
            exit(0);
        }

        $sql = "INSERT INTO `teaching_session` (`academic_id`, `teacher_id`, `course_id`, `grade_distribution`) VALUES ('$academic_id', '$teacher_id', '$course_id', '$grade_distribution')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "true";
        }
        else
            echo "t_s insert error";
    }
    else{
        echo "login error";
    }

}
?>