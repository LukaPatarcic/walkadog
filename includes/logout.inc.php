<?php
if(isset($_POST['submit'])){
    //ends the session for the admin user
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../admin.php");
    exit();
}else{
    header("Location: ../index.php");
    exit();
}