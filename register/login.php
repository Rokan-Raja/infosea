<?php
session_start();
include('../db/connect.php');

$mail=$_POST['mail'];
$pw=$_POST['pw'];

$sql="SELECT *FROM`login` WHERE name='$mail', and password='$pw' and type='in'";

$query=mysqli_query($con,$sql);

if(mysqli_num_rows($query)>0)
{
     setcookie('mail',$mail,time()+360*10)
    $_SESSION['register']="success";
    echo "register";
}
else
{
    echo"failed";
}
?>