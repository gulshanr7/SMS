<?php

include '../Conn.php';

$Del_ID=$_GET['delete_id'];

$deleteRecord="DELETE FROM `classname` WHERE id=$Del_ID"; 
$imgSelect="select Class_Image from classname WHERE id=$Del_ID";
$res=mysqli_query($conn,$imgSelect);
if($res)
{   
    
    $row=mysqli_fetch_assoc($res);
    $ImageName=$row['Class_Image'];
  


   if(mysqli_query($conn,$deleteRecord))
    {     
          unlink("../images/$ImageName");
    header('location:AddClass.php');
    }
    
}
?>

