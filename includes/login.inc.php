<?php
//starts the session for the admin
include "database.inc.php";
session_start();

if(isset($_POST['submit'])){
    //gets the username and password from the admin form
    foreach ($_POST as $key => $value){
        ${$key} = mysqli_real_escape_string ($connect,trim($value));

    }
    //checks if the fields are empty
    if(empty($username) or empty($password)){
            header("Location: ../admin.php?login=empty");
            exit();
    }
    //checks if only numbers and letters are entered
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username) or !preg_match("/^[a-zA-Z0-9]*$/", $password)){
        header("Location: ../admin.php?login=error");
        exit();
    }
    //gets the password if the user is present
    $sql = "SELECT password FROM admin WHERE username = '$username';";
    $query = mysqli_query ($connect,$sql);
    $result = mysqli_fetch_assoc ($query);
    //verifies if the passwords match
    $hashedPassword = password_verify ($password,$result['password']);
    //if not redirects with an error
    if(!$hashedPassword){
        header("Location: ../admin.php?login=error");
        exit();
    //if they match starts the session
    }elseif ($hashedPassword){
        $_SESSION['username'] = $username;
        header("Location: ../admin.php?login=success");
        exit();
    }
}else{
    header("Location ../admin.php?login=fatal");
    exit();
}