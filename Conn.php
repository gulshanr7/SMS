<?php
$host="localhost";
$username="root";
$password="";
$database="sms";

$conn=mysqli_connect($host,$username,$password,$database);
if(!$conn){
    echo "Not connected";
}

?>