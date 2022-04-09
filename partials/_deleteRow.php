<?php
    require "_dbconnect.php";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['delete'])){
            $sno = $_POST['delete'];
            $sql = "DELETE FROM teaching_session WHERE sno = $sno";
            $result = mysqli_query($conn, $sql);
            if($result){
                $delete = true;
            } else {
                $delete_failed = true;
            }
        }
        echo "True";
    }
    else{
        echo "False";
    }
?>