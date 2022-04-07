<?php
include("connect.php");
$id=$_COOKIE['judge_id'];
$event=$_COOKIE['event'];

setcookie('id',$id,time()+360*60);

$lotno1=$_POST['lotno1'];
$lotno2=$_POST['lotno2'];
$lotno3=$_POST['lotno3'];
$lotno4=$_POST['lotno4'];
$lotno5=$_POST['lotno5'];
$lotno6=$_POST['lotno6'];

setcookie('lot1',$lotno1,time()+360*60,"/");
setcookie('lot2',$lotno2,time()+360*60,"/");
setcookie('lot3',$lotno3,time()+360*60,"/");
setcookie('lot4',$lotno4,time()+360*60,"/");
setcookie('lot5',$lotno5,time()+360*60,"/");
setcookie('lot6',$lotno6,time()+360*60,"/");

$tot1=$_POST['m1'];
$tot2=$_POST['m2'];
$tot3=$_POST['m3'];
$tot4=$_POST['m4'];
$tot5=$_POST['m5'];
$tot6=$_POST['m6'];

if($tot1=="")
{
    $tot1=0;
}
if($tot2=="")
{
    $tot2=0;
}
if($tot3=="")
{
    $tot3=0;
}
if($tot4=="")
{
    $tot4=0;
}
if($tot5=="")
{
    $tot5=0;
}
if($tot6=="")
{
    $tot6=0;
}

$search="select *from register_form where lot_no=$lotno1 and event_name='$event'";
$check1=mysqli_query($con,$search);

$search="select *from register_form where lot_no=$lotno2 and event_name='$event'";
$check2=mysqli_query($con,$search);

$search="select *from register_form where lot_no=$lotno3 and event_name='$event'";
$check3=mysqli_query($con,$search);

$search="select *from register_form where lot_no=$lotno4 and event_name='$event'";
$check4=mysqli_query($con,$search);

$search="select *from register_form where lot_no=$lotno5 and event_name='$event'";
$check5=mysqli_query($con,$search);

$search="select *from register_form where lot_no=$lotno6 and event_name='$event'";
$check6=mysqli_query($con,$search);

if(mysqli_num_rows($check1)>0 && mysqli_num_rows($check2)>0 && mysqli_num_rows($check3)>0 && mysqli_num_rows($check4)>0 && mysqli_num_rows($check5)>0 && mysqli_num_rows($check6)>0 )
{
    
$sql1="insert into marksheet(judge_id,lot_number,Total,event_name) values($id,$lotno1,$tot1,'$event')";
$sql2="insert into marksheet(judge_id,lot_number,Total,event_name) values($id,$lotno2,$tot2,'$event')";
$sql3="insert into marksheet(judge_id,lot_number,Total,event_name) values($id,$lotno3,$tot3,'$event')";
$sql4="insert into marksheet(judge_id,lot_number,Total,event_name) values($id,$lotno4,$tot4,'$event')";
$sql5="insert into marksheet(judge_id,lot_number,Total,event_name) values($id,$lotno5,$tot5,'$event')";
$sql6="insert into marksheet(judge_id,lot_number,Total,event_name) values($id,$lotno6,$tot6,'$event')";

if(mysqli_query($con,$sql1) && mysqli_query($con,$sql2) && mysqli_query($con,$sql3) && mysqli_query($con,$sql4) &&mysqli_query($con,$sql5) &&mysqli_query($con,$sql6))
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
    echo"notlot";
}
?>