<?php
$servername = "localhost";
$port = 3308;
$username = "root";
$password = "";
$database = "coursegrades";

$conn = mysqli_connect($servername, $username, $password, $database, $port);
if(!$conn){
    die("Unable to connect to Database: ". mysqli_connect_error());
}
// else{
//     echo "Success! connected to database";
// }


?>