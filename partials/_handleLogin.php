<?php
// $showError = false;
// if($_SERVER['REQUEST_METHOD'] == "POST"){
//     include '_dbconnect.php';
//     $email = $_POST['loginEmail'];
//     $password = $_POST['loginPassword'];

//     $sql = "SELECT * FROM users WHERE user_email='$email'";
//     $result = mysqli_query($conn, $sql);
//     $numRows = mysqli_num_rows($result);
//     if($numRows == 1){
//         $row = mysqli_fetch_assoc($result);
//         if(password_verify($password, $row['user_password'])){
//             session_start();
//             $_SESSION['loggedin'] = true;
//             $_SESSION['userid'] = $row['user_id'];
//             $_SESSION['useremail'] = $email;
//             header("location: ../index.php");
//             exit();
//         }
//         else{
//             $showError = "Invalid Credentials";
//         }
//     }
//     else{
//         $showError = "Invalid Credentials";
//     }
//     header("location: ../index.php?loginsuccess=false&error=$showError");
// }
?>