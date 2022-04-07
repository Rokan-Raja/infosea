<?php

include("connect.php");
$id=$_COOKIE['judge_id'];
$event=$_COOKIE['event'];

$lotno1=$_POST['lotno1'];
$lotno2=$_POST['lotno2'];

$tot1=$_POST['m1'];
$tot2=$_POST['m2'];

if($tot1=="")
{
    $tot1=0;
}
if($tot2=="")
{
    $tot2=0;
}

$query1="select *from finalmark where lotno=$lotno1 and event_name='$event'";
$sql1=mysqli_query($con,$query1);
$row=mysqli_fetch_assoc($sql1);
$tot1+=$row['total'];

$query2="select *from finalmark where lotno=$lotno2 and event_name='$event'";
$sql2=mysqli_query($con,$query2);
$row=mysqli_fetch_assoc($sql2);    
$tot2+=$row['total'];

$add1="UPDATE  finalmark SET total=$tot1 WHERE lotno=$lotno1 ";
$add2="UPDATE  finalmark SET total=$tot2 WHERE lotno=$lotno2 ";

if(mysqli_query($con,$add1) && mysqli_query($con,$add2))
{
    echo"success";
}
else
{
    echo"failed";
}
?>