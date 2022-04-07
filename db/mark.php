<?php
include("connect.php");
$lotno=$_POST['lotno'];
$tot=$_POST['tot'];
$id=$_COOKIE['judge_id'];
$event=$_COOKIE['event'];

$s1="select *from register_form where lot_no=$lotno and event_name='$event'";
$check=mysqli_query($con,$s1);
if(mysqli_num_rows($check)>0)
{
$search="select *from marksheet where judge_id=$id and lot_number=$lotno";
$sql="insert into marksheet(judge_id,lot_number,Total,event_name) values($id,$lotno,$tot,'$event')";
$query=mysqli_query($con,$search);
if($tot!=0)
{
if(mysqli_num_rows($query)>0)
{
    echo"failed";
}
else if(mysqli_query($con,$sql))
{
    $a=1;
}
else
{
    echo"failed";
}
}
else
{
    echo"failed";
}
if($a==1)
{
$add="INSERT INTO finalmark(lotno,event_name,total) VALUES($lotno,'$event',$tot)";
$query2="select *from finalmark where lotno=$lotno and event_name='$event'";
$sql2=mysqli_query($con,$query2);
$row=mysqli_fetch_assoc($sql2);
$tot2=$row['total'];
$total=$tot+$tot2;
$add2="update finalmark set total=$total where lotno=$lotno and event_name='$event'";
if(mysqli_num_rows($sql2)<1)
{
if(mysqli_query($con,$add))
{
    echo"success";
}
else
{
    echo"failed";
}
}
else
{
    if(mysqli_query($con,$add2))
    {
        echo"success";
    }
    else
    {
        echo"failed";
    }
}
}
}
else
{
    echo"notlot";
}
?>