<?php
$showError = false;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include '_dbconnect.php';

    $user_email = $_POST['email_id'];

    $existSql = "SELECT * FROM teachers WHERE email_id = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows > 0){
        $teacher = mysqli_fetch_assoc($result);
        $teacherID = $teacher['teacher_id'];
        $firstname = $teacher['first_name'];
        $lastname = $teacher['last_name'];
        $sql = "SELECT * FROM login_details WHERE teacher_id = $teacherID";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $showError = "User Already Exists! Try to login";
        }
    }
    else{
        $showError = "Email address is not in our records!";
    }

        

    if($showError)
        $data = array('emailSuccess' => false , 'error' => $showError);
    else   
        $data = array('emailSuccess' => true, 'email' => $user_email, 'teacher_id' => $teacherID, 'firstname' => $firstname, 'lastname' => $lastname);

    echo json_encode($data);


    //TODO: TO add opt authentication
    // require "_otpVerification.php";

}
?>