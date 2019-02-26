<?php
require "../database.inc.php";
session_start();

if(isset($_POST['update']) and isset($_SESSION['username'])){
    //selects the user where the ID's match
    $id = mysqli_real_escape_string($connect,trim($_POST['id']));
    $sql = "SELECT * FROM users WHERE user_id=$id";
    $query = mysqli_query($connect,$sql);
    $result = mysqli_fetch_assoc($query);
    //form for changing the users information
    echo "<form method=\"post\" action=\"editUser.inc.php\">
            <input type=\"hidden\" name=\"id\" value=\"$id\"><br>
            <label>Name</label>
            <input type=\"text\" name=\"name\" value=\"{$result['name']}\"><br>
            <label>Email</label>
            <input type=\"text\" name=\"email\" value=\"{$result['email']}\"><br>
            <label>Phone</label>
            <input type=\"text\" name=\"phone\" value=\"{$result['phone']}\"><br>  
            <label>Address</label>           
            <input type=\"text\" name=\"address\" value=\"{$result['address']}\"><br>
            <label>Free walk</label>
            <input type=\"checkbox\" name=\"status\" value=\"1\"> 
            <button type=\"submit\" name=\"submit\">Update</button>
          </form>
    ";
    exit();
}
elseif (isset($_POST['delete']) and isset($_SESSION['username'])){
    //deletes the user from the database where the ID's match
    $userID = $_POST['id'];
    $sql = "DELETE FROM users WHERE user_id = '$userID';";
    $query = mysqli_query ($connect,$sql);
    if(!$query){
        header ("Location: ../../admin.php?error=error");
        exit();
    }
    header ("Location: ../../admin.php?error=success");
    exit();
}elseif(isset($_POST['submit']) and isset($_SESSION['username'])){
    //inserts the new information into the database
    foreach ($_POST as $key => $value){
        ${$key} = mysqli_real_escape_string ($connect,trim($value));
    }
    $status = (int)$status;
    $sql = "UPDATE users SET name = '$name',email = '$email',phone = '$phone',address = '$address',status = $status WHERE user_id = $id;";
    $query = mysqli_query($connect,$sql);
    header("Location: ../../admin.php?error=success");
    exit();

}else{
    header ("Location: ../../index.php");
    exit();
}