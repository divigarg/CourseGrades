<?php

function generateNumericOTP($n){
    $generator = "1357902468";

    $result = "";

    for($i = 1; $i <= $n; $i++){
        $result .= substr($generator, (rand() % (strlen($generator))), 1);
    }

    return $result;
}

$len_otp = 6;
print_r(generateNumericOTP($len_otp));
require "_mailOTP.php";
?>