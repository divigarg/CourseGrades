<?php
$showError = false;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include '_dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login_details WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['teacherId'] = $row['teacher_id'];
            // header("location: ../index.php");
            // exit();
            
        }
        else{
            $showError = "Invalid Credentials";
        }
    }
    else{
        $showError = "Invalid Credentials";
    }

    if($showError)
        $data = array('loginSuccess' => false, 'error' => $showError);
    else
        $data = array('loginSuccess' => true);
    echo json_encode($data);
    // header("location: ../index.php?loginsuccess=false&error=$showError");
}
?>