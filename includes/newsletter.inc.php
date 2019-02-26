<?php
require "database.inc.php";
require "functions.inc.php";
require "../mail_template.php";


if(isset($_POST['submit'])) {
    //setting all variables from the newsletter form
    $mailFrom = mysqli_real_escape_string($connect,trim($_POST['email']));
    $empty = $_POST['hidden'];
    $hashedMail = md5($mailFrom);
    //getting the if the is a same mail from the database
    $sql = "SELECT * FROM newsletter WHERE mail='$mailFrom';";
    $query = mysqli_query($connect,$sql);
    $result = mysqli_fetch_assoc($query);
    $mailCheck = $result['mail'];

    $location = $_POST['formLocation'];

    if($location =='section'){
        $locationPoint = "newsletter_anchor";
        mailValidation($empty,$mailFrom,$mailCheck,$locationPoint);
    }
    elseif ($location =='footer') {
        $locationPoint = "newsletter";
        mailValidation($empty,$mailFrom,$mailCheck,$locationPoint);
    }
    //inserting the email into the database
    $sql = "INSERT INTO newsletter(mail,hashedMail) VALUES ('$mailFrom','$hashedMail');";
    $query = mysqli_query($connect,$sql);


    $txt = $mailTemplate;
    $txt .= "<a href=\"https://walkadog.secondsection.in.rs/unsubscribe.inc.php?key=$hashedMail\" target=\"_blank\" style=\"color: #ffffff; font-weight: 700;\">unsubscribe</a>";
    $txt .= $mailTemplate2;
    $subject = "Newsletter";
    $to = $mailFrom;
    $headers = "From:  walk·a·dog <walkadog@secondsection.in.rs>" . " \r\n" .
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    mail($to, $subject, $txt, $headers);

    header("Location: ../index.php?mail{$locationPoint}=success#{$locationPoint}");
    exit();
}else{

    header("Location: ../index.php?mailnewsletter=fatal#newsletter");
    exit();

}