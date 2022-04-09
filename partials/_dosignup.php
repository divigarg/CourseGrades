<?php
$showError = false;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include '_dbconnect.php';

    $user_email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    $existSql = "SELECT * FROM teachers WHERE email_id = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows > 0){
        $teacher = mysqli_fetch_assoc($result);
        $teacherID = $teacher['teacher_id'];
    }
    else{
        $showError = "Email address was changed during the signup!";
    }
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO login_details (username, password, teacher_id, access_level) VALUES ('$username', '$hash', $teacherID, 'teacher' )";
    $result = mysqli_query($conn, $sql);
    
    if($result){
        
    }
    else{
        $showError = "Failed to create new user";
    }
    
    if($showError){
        $data = array( 'signupSuccess' => false, 'error' => $showError);
        // header("location: index.php?signupsuccess=false&error=$showError");
    }
    else{
        $data = array('signupSuccess' => true);   
        // header("location: index.php?signupsuccess=true");
    }

    echo json_encode($data);
}
?>