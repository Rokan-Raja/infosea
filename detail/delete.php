<?php

include('../db/connect.php');

$lotno=$_POST['lot_no'];

$q1="delete from register_form where lot_no=$lotno";
$s1=mysqli_query($con,$q1);
$q1="delete from clg_info where lot_no=$lotno";
$s2=mysqli_query($con,$q1);

if($s1 && $s2)
{
    echo"success";
}
?>