<?php
require "../database.inc.php";
session_start();

if(isset($_POST['submit']) and isset($_SESSION['username'])){
    //setting all variables from the newsletter form
    $mailFrom = mysqli_real_escape_string($connect,trim($_POST['email']));
    $hashedMail = md5($mailFrom);
    //if the input is empty display error
    if(empty($mailFrom)){
        header("Location: ../../admin.php?error=error");
        exit();
    }
    //inserting the email into the database
    $sql = "INSERT INTO newsletter(mail,hashedMail) VALUES ('$mailFrom','$hashedMail');";
    $query = mysqli_query($connect,$sql);

    header("Location: ../../admin.php?error=success");
    exit();

}else{
    header("Location: ../../index.php");
    exit();
}