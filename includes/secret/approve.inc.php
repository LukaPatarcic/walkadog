<?php
require '../database.inc.php';
session_start();

if(isset($_POST['approve']) and isset($_SESSION['username'])){
    //updates the comment to be displayed on main page
	$reviewID =mysqli_real_escape_string ($connect,$_POST['approve']);
	$sql = "UPDATE reviews SET verified=1 WHERE review_id='$reviewID';";
	$query = mysqli_query($connect,$sql);
	if(!$query){
		header("Location: ../../admin.php?error=error");
		exit();
	}
	header("Location: ../../admin.php?error=success");
	exit();

}elseif(isset($_POST['delete']) and isset($_SESSION['username'])){
    //deletes the comment if it is not appropriate
	$reviewID = $_POST['delete'];
	$sql = "DELETE FROM reviews WHERE review_id='$reviewID';";
	$query = mysqli_query($connect,$sql);
	if(!$query){
		header("Location: ../../admin.php?error=error");
		exit();
	}
	header("Location: ../../admin.php?error=success");
	exit();
}else{

	header("Location: ../../index.php");
	exit();
}