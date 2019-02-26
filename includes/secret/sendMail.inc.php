<?php
require "../database.inc.php";
session_start();

if(isset($_POST['submit']) and isset($_SESSION['username'])) {
    $comment = mysqli_real_escape_string ($connect,trim ($_POST['comment']));
    $subject =mysqli_real_escape_string ($connect,trim($_POST['subject']));

    if(empty($comment) or empty($subject)){
        header("Location: ../../admin.php?error=error");
        exit();
    }
    $sql = "SELECT mail,hashedMail FROM newsletter";
    $query = mysqli_query($connect, $sql);
    //sending everyone that is subscribed the newsletter mail that was filled out in the admin panel
    while ($result = mysqli_fetch_assoc($query)) {
        $txt = $comment;
        $txt .= "<br><a href=\"https://walkadog.secondsection.in.rs/unsubscribe.inc.php?key={$result['hashedMail']}\">Unsubscribe</a>";
        $subject = $_POST['subject'];
        $to = $result['mail'];

        $headers = "From:  walk·a·dog <walkadog@secondsection.in.rs>" . " \r\n" .
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        mail($to, $subject, $txt, $headers);

        $to = '';
        $subject = '';
        $txt = '';
        $headers = '';

    }
    header("Location: ../../admin.php?error=success");
    exit();

}else{
    header ("Location: ../../index.php");
    exit();
}

