<?php
    $showError = false;

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        include '_dbconnect.php';
    
        $username = $_POST['username'];
    
        $existSql = "SELECT * FROM login_details WHERE username = '$username'";
        $result = mysqli_query($conn, $existSql);
        $numRows = mysqli_num_rows($result);
        if($numRows > 0){
            $showError = true;
        }

        $data = array('usernameExists' => $showError);
        echo json_encode($data);
    
    }

?>