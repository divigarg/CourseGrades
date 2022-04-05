<?php
require "partials/_dbconnect.php";
$gd = ['A' => 20, 'B' => 10, 'C' => 30];
$sql = "INSERT INTO teaching_session (academic_id, teacher_id, course_id, grade_distribution) VALUES ('1', '1', 'CS335A', '" . json_encode($gd) . "');";
$result = mysqli_query($conn, $sql);
?>