<?php
$lot='';

$lot=$_POST['lotnumber'];

if(!empty($lot))
{
setcookie('lot_no',$lot,time()+360*60,"/");
}
?>