<?php
if(isset($_COOKIE['judge']))
{
   echo""; 
}
else
{
    header("location: ./index.php");
}
?>