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

$add1="INSERT INTO finalmark(lotno,event_name,total) VALUES($lotno1,'$event',$tot1)";
$add2="INSERT INTO finalmark(lotno,event_name,total) VALUES($lotno2,'$event',$tot2)";
$add3="INSERT INTO finalmark(lotno,event_name,total) VALUES($lotno3,'$event',$tot3)";
$add4="INSERT INTO finalmark(lotno,event_name,total) VALUES($lotno4,'$event',$tot4)";
$add5="INSERT INTO finalmark(lotno,event_name,total) VALUES($lotno5,'$event',$tot5)";
$add6="INSERT INTO finalmark(lotno,event_name,total) VALUES($lotno6,'$event',$tot6)";

if(mysqli_query($con,$add1) && mysqli_query($con,$add2) && mysqli_query($con,$add3) && mysqli_query($con,$add4) && mysqli_query($con,$add5) && mysqli_query($con,$add6))
{
    $a=1;
}
else
{
    echo"failed";
}
$total=array();
$lot=array();
$i="";
if($a==1)
{
    $s="SELECT *FROM finalmark ORDER BY total DESC";
    $search=mysqli_query($con,$s);
    while($row=mysqli_fetch_assoc($search))
    {   
        $i++;
        if($i==5)
        {
        break;
        }
        $total[$i]=$row['total'];
        $lot[$i]=$row['lotno'];
    }
}
if($total[1] == $total[2])
{
    setcookie('lotno1',$lot[1],time()+360*60,"/");
    setcookie('lotno2',$lot[2],time()+360*60,"/");
    echo"tie";
}
elseif($total[2] == $total[3])
{
    setcookie('lotno1',$lot[2],time()+360*60,"/");
    setcookie('lotno2',$lot[3],time()+360*60,"/");
    echo"tie";
}
elseif($total[4] == $total[3])
{
    setcookie('lotno1',$lot[3],time()+360*60,"/");
    setcookie('lotno2',$lot[4],time()+360*60,"/");
    echo"tie";
}
else
{
    echo"success";
}
?>