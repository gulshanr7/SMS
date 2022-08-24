<?php
session_start();
include("../conn.php");
$_SESSION['now'] = time();
// OR $_SESSION['now'] > $_SESSION['expire'] 
if (!isset($_SESSION['USER_NAME']) ) {
    session_destroy();
    header("location:../Admin_login.php");
}
//echo $_SESSION['USER_NAME'];

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Admin Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../images/logo.jpg">
        <!-- font awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="../images/logo.jpg" height="35px" > Student Management System</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="AddClass.php">Add Class </a>
                </li>
                          
            </ul>
            <ul class="navbar-nav"><li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout </a>
            </li></ul>
            
           
        </div>
    </nav>