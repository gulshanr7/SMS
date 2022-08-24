<?php 

session_start();

session_destroy();
//session_unset($_SESSION['USER_NAME']);
header('location:../Admin_Login.php');
    






?>