<?php
if(isset($_COOKIE['admin']))
{
   echo""; 
}
else
{
    header("location: ./index.php");
}
?>