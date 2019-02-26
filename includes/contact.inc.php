<?php
require "database.inc.php";
require "functions.inc.php";
if(isset($_POST['submit'])) {
    //enters values of form variables and checks if they are empty
    foreach ($_POST as $key => $value) {
        ${$key} = mysqli_real_escape_string($connect, trim($value));
    }
    //checks if fields are empty
    if (empty($name) or empty($email) or empty($message)) {
        header("Location: ../index.php?contactError=empty#contact");
        exit();
    }
    //validates the name
    validation("/^[a-zA-Z\s]*$/", $name, 2, "contactError=notValid#contact");
    //validates the email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?contactError=notValid#contact");
        exit();
    }
    //validates the message
    validation("/^[a-zA-Z0-9\.!?,@#:&%+$*:_'\-\(\)\s]*$/", $message, 2, "error=notValid#contact");
    //sends the email to our e-mail address
    $txt = "$name said: ";
    $txt .= $message;
    $subject = "walk·a·dog contact";
    $to = "walkadog@secondsection.in.rs";
    $headers = "From:  $email <$email>";
    //if the mail was not sent redirects the user with a fatal error
    if (!mail($to, $subject, $txt, $headers)){
    header("Location: ../index.php?contactError=fatal#contact");
    exit();
    }
    //redirects the user with a success
    header("Location: ../index.php?contactError=success#contact");
}else{
    header("Location ../index.php?contactError=fatal#contact");
    exit();
}