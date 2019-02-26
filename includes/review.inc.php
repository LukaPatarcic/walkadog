<?php
require 'database.inc.php';
require 'functions.inc.php';

if(isset($_POST['submit'])) {
    //insert the data from the form
    foreach ($_POST as $key => $value) {
        ${$key} = mysqli_real_escape_string($connect,trim($value));
    }
    //validation("/^[0-9]{10}$/",$code,0,"error=notValidCode");
    if(!preg_match("/^[0-9]{10}$/",$code)){
        header("Location: ../review.php?error=badFormat");
        exit();
    }
    if(!preg_match("/^[a-zA-Z0-9\.!?,@#:&%+$*:_\-\(\)\s]*$/",$comment) or strlen($comment) > 100){
        header("Location: ../review.php?error=badFormat");
        exit();
    }

    //checks if the code is valid
    $sql = "SELECT user_id,review_code,verification_code FROM users WHERE review_code = '$code';";
    $query = mysqli_query($connect,$sql);
    $result = mysqli_fetch_assoc($query);
    if($row = mysqli_num_rows($query) < 1){
        header("Location: ../review.php?error=notInDatabase");
        exit();
    }
    //checks if the code is already used
    $sql = "SELECT code_fk FROM reviews WHERE code_fk = '$result[review_code]';";
    $query = mysqli_query($connect,$sql);
    if($row = mysqli_num_rows($query) > 0){
        header("Location: ../review.php?error=codeUsed");
        exit();
    }
    //inserts the comment in the database
    $userID = getUserID($connect,$result['verification_code']);
    $sql = "INSERT INTO reviews(code_fk,comment) VALUES ('$code','$comment');";
    $query = mysqli_query($connect,$sql);

    header("Location: ../review.php?error=success");
    exit();
}else{
    header("Location: ../review.php?error=fatal");
    exit();
}