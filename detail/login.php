<?php
include('../db/connect.php');

$mail=$_POST['mail'];
$pw=$_POST['pw'];

$sql="INSERT INTO `login`(name,password,type) Values('$mail','$pw','in')";

if(mysqli_query($con,$sql))
{
    echo "register";
}
else
{
    echo"failed";
}
?>