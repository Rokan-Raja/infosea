<?php
include("../db/connect.php");
$mail='';

if(isset($_COOKIE['mail']))
{
$mail=$_COOKIE['mail'];
$query="UPDATE login SET type='out' WHERE name='$mail' and type='in'";
if(mysqli_query($con,$query))
{
    session_start();
    session_destroy();
}
}
?>