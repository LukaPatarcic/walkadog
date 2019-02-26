<?php
//database variables
/*
$database= "169.254.0.2:3306";
$user="spolnici_linolada";
$password="linolada123";
$dbname="spolnici_walkadog";
*/

$database= "localhost";
$user="root";
$password="";
$dbname="spolnici_walkadog";

//connects to the database
$connect = mysqli_connect($database,$user,$password,$dbname);
//if the connection was not successful redirect the user
if(!$connect){
    header("Location: https://walkadog.secondsection.in.rs/error404.php");
    die();
}
