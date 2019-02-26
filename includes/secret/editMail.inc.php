<?php
require "../database.inc.php";
//if the form has been submitted by the update button
session_start();

if(isset($_POST['update']) and isset($_SESSION['username'])){
    //enterer and a new email adress
    $id = mysqli_real_escape_string($connect,trim($_POST['id']));
    $sql = "SELECT * FROM newsletter WHERE id=$id";
    $query = mysqli_query($connect,$sql);
    $result = mysqli_fetch_assoc($query);
    //sending to the same page where the new email will be sent to the database
        echo "<form method='post' action='editMail.inc.php'>
                <input type='hidden' name='id' value='$id'>
                <input type='text' name='mail' value='{$result['mail']}'>
                <button type='submit' name='submit'>Update</button>
              </form>
        ";
    exit();
}elseif(isset($_POST['delete']) and isset($_SESSION['username'])){
    //if the form has been submitted bt the delete button
    $delete = $_POST['delete'];
    $id = mysqli_real_escape_string($connect,trim($_POST['id']));
    //deleting the email from the database
    if($delete == 'delete'){
        $sql = "DELETE FROM newsletter WHERE id=$id;";
        $query = mysqli_query($connect,$sql);
        header("Location: ../../admin.php?error=success");
        exit();
    }
    header("Location: ../../admin.php?error=error");
    exit();
}elseif(isset($_POST['submit']) and isset($_SESSION['username'])){
    //updating the newsletter from the form above
    $id = mysqli_real_escape_string($connect,trim($_POST['id']));
    $mail = mysqli_real_escape_string($connect,trim($_POST['mail']));
    $hashedMail = md5($mail);
    $sql = "UPDATE newsletter SET mail='$mail',hashedMail='$hashedMail' WHERE id='$id';";
    $query = mysqli_query($connect,$sql);
    header("Location: ../../admin.php?error=success");
    exit();

}else{
    header("Location: ../../index.php");
    exit();
}