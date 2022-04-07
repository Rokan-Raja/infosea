<?php
include("../db/connect.php");
$sql = "UPDATE register_form set ".$_REQUEST["column"]."='".$_REQUEST["value"]."' WHERE  id='".$_REQUEST["id"]."'";
mysqli_query($con,$sql) or die("database error:". mysqli_error($con));
echo "saved";
?>