<?php
    //not online just to input the admin into the database
    /*require "database.inc.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = password_hash ($password,PASSWORD_DEFAULT);
    $sql = "INSERT INTO admin(username,password) VALUES ('$username','$hashedPassword');";
    $query = mysqli_query ($connect,$sql);
    $temp = "
    <form action=\"admin.inc.php\" method=\"post\">
    <label>Username</label>
    <input type=\"text\" name=\"username\">
    <label>Password</label>
    <input type=\"text\" name=\"password\">
    <button type=\"submit\">SEND</button>
    </form>";*/
    header ("Location: ../../index.php");
    exit();

