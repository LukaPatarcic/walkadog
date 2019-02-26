<?php
require "database.inc.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<!--head start-->
<head>
    <!--meta tag start -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="walk·a·dog">
    <meta name="keywords" content="dogs, walking dogs, service for walking dogs,dog walking,walking dogs,dogs,dog services">
    <meta name="description" content="service for walking your dog">
    <meta name="author" content="Linolada">
    <meta name="copyright" content="Linolada">
    <meta name="robots" content="index,no follow">
    <!-- meta tag end -->

    <title>walk·a·dog</title>
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Kalam:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<!--head end-->
<body>
    <!--header start-->
    <header class="main-header" id="home">

        <!-- Start Navigation -->
        <div id="masthead" class="site-header menu">
            <div class="container">
                <div class="site-branding">
                    <a href="index.php" class="logo"><img src="images/logo.svg" alt="logo"></a>
                </div>
                <div class="header-nav-search">
                    <div class="toggle-button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div id="main-navigation">
                        <nav class="main-navigation">
                            <div class="close-icon">
                                <i class="fa fa-close"></i>
                            </div>
                            <form action="includes/logout.inc.php" method="post">
                            <ul>
                                <li><a href="index.php#home">Home</a></li>
                                <li><a href="index.php#about">About</a> </li>
                                <li><a href="index.php#pricing">Pricing</a></li>
                                <li><a href="index.php#booking">Booking</a></li>
                                <li><a href="index.php#contact">Contact</a></li>
                                <?php
                                if(isset($_SESSION['username'])){
                                    //displaying the logout button and the Admin link if the session has started
                                    $logout = "<li><button class=\"btn btn-primary\" type=\"submit\" name=\"submit\">Logout</button></li>";
                                    $admin = "<li><a href=\"admin.php\">Admin</a></li>";
                                                echo $admin;
                                                echo $logout;
                                }
                                ?>
                            </ul>
                            </form>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Navigation -->
    
    </header>
    <!--header end-->

