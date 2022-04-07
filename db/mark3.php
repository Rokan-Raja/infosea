<?php
include("connect.php");
$id=$_COOKIE['judge_id'];
$event=$_COOKIE['event'];

$lotno1=$_POST['lotno1'];
$lotno2=$_POST['lotno2'];
$lotno3=$_POST['lotno3'];
$lotno4=$_POST['lotno4'];
$lotno5=$_POST['lotno5'];
$lotno6=$_POST['lotno6'];

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

$query1="select *from marksheet where lot_number=$lotno1 and event_name='$event'";
$sql1=mysqli_query($con,$query1);
$row=mysqli_fetch_assoc($sql1);
$tot1+=$row['Total'];

$query2="select *from marksheet where lot_number=$lotno2 and event_name='$event'";
$sql2=mysqli_query($con,$query2);
$row=mysqli_fetch_assoc($sql2);
$tot2+=$row['Total'];

$query3="select *from marksheet where lot_number=$lotno3 and event_name='$event'";
$sql3=mysqli_query($con,$query3);
$row=mysqli_fetch_assoc($sql3);
$tot3+=$row['Total'];

$query4="select *from marksheet where lot_number=$lotno4 and event_name='$event'";
$sql4=mysqli_query($con,$query4);
$row=mysqli_fetch_assoc($sql4);
$tot4+=$row['Total'];

$query5="select *from marksheet where lot_number=$lotno5 and event_name='$event'";
$sql5=mysqli_query($con,$query5);
$row=mysqli_fetch_assoc($sql5);
$tot5+=$row['Total'];

$query6="select *from marksheet where lot_number=$lotno6 and event_name='$event'";
$sql6=mysqli_query($con,$query6);
$row=mysqli_fetch_assoc($sql6);
$tot6+=$row['Total'];

$add1="update marksheet set Total=$tot1 where lot_number=$lotno1 and event_name='$event'";
$add2="update marksheet set Total=$tot2 where lot_number=$lotno2 and event_name='$event'";
$add3="update marksheet set Total=$tot3 where lot_number=$lotno3 and event_name='$event'";
$add4="update marksheet set Total=$tot4 where lot_number=$lotno4 and event_name='$event'";
$add5="update marksheet set Total=$tot5 where lot_number=$lotno5 and event_name='$event'";
$add6="update marksheet set Total=$tot6 where lot_number=$lotno6 and event_name='$event'";

if(mysqli_query($con,$add1) && mysqli_query($con,$add2) && mysqli_query($con,$add3) && mysqli_query($con,$add4) && mysqli_query($con,$add5) && mysqli_query($con,$add6))
{
    echo"success";
}
else
{
    echo"failed";
}
?>