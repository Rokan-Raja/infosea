<?php
include("connect.php");
$id=$_COOKIE['judge_id'];
$query="UPDATE judge_details SET type='out' WHERE id=$id";
if(mysqli_query($con,$query))
{
    echo"success";
}
?>