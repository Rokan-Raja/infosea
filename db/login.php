<?php
session_start();

include('connect.php');

$name=$_POST['name'];
$pw=$_POST['pw'];
$sql="SELECT * FROM `login` WHERE name='$name' and password='$pw' and type='admin' ";
$sql2="SELECT * FROM `login` WHERE name='$name' and password='$pw' and type='user' ";
$sql3="SELECT * FROM `login` WHERE name='$name' and password='$pw' and type='student'";
$sql4="SELECT * FROM `login` WHERE name='$name' and password='$pw' and type='detail'";

$query=mysqli_query($con,$sql);
$query2=mysqli_query($con,$sql2);
$query3=mysqli_query($con,$sql3);
$query4=mysqli_query($con,$sql4);

if(mysqli_num_rows($query)>=1)
{
    $admin=sha1('admin');
    setcookie('admin',$admin,time()+360*60,"/");
    echo"admin";
}
else if(mysqli_num_rows($query2)>=1)
{
    $judge=sha1('judge');
    setcookie('judge',$judge,time()+360*60,"/");
    echo"user";
}
else if(mysqli_num_rows($query3)>=1)
{
    $_SESSION['register']="success";
    echo"register";
}
else if(mysqli_num_rows($query4)>=1)
{
    $student=sha1('detail');
    setcookie('detail',$student,time()+360*60,"/");
    echo"detail";
}
else
{
    echo"failed";
}
?>