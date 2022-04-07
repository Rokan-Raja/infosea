<?php
$event='';
$event=$_POST['event'];
if(!empty($event))
{
setcookie('event',$event,time()+360*60,"/");
}
?>