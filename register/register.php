<?php
include('../db/connect.php');

$clg=$_POST['clg'];
$dept=$_POST['dept'];
$np=$_POST['np'];
$mail=$_POST['mail'];
$sn=$_POST['sn'];
$sd=$_POST['sd'];
$amt=$np*150;

$p1=$_POST['p1'];
$p2=$_POST['p2'];

$w1=$_POST['w1'];
$w2=$_POST['w2'];

$q1=$_POST['q1'];
$q2=$_POST['q2'];

$d1=$_POST['d1'];

$s1=$_POST['s1'];

$e1=$_POST['e1'];

$ad1=$_POST['ad1'];
$ad2=$_POST['ad2'];

$t1=$_POST['t1'];
$t2=$_POST['t2'];
$t3=$_POST['t3'];
$t4=$_POST['t4'];
$t5=$_POST['t5'];

$step1="";
$step2="";


if($step1='')
{
$check="SELECT *from clg_info where clg_name='$clg' and dept='$dept'";
$sql=mysqli_query($con,$check);
if(mysqli_num_rows($sql)>0)
{
echo "exist";
$step1=1;
exit;
}
}

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://emailvalidation.abstractapi.com/v1/?api_key=7fa7f7fe6f634dd4aae80e83d868eeb4&email='.$mail.'');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$response = curl_exec($ch);

curl_close($ch);

$data =json_decode($response,true);

if($data['deliverability'] === 'DELIVERABLE')
{
    $step1="";
}
else
{
    echo "inmail";
    $step1=1;
    exit;
}


if($step1=="")
{
$add="INSERT INTO clg_info(clg_name,dept,mail,staff_des,staff_name,no_student,amt) VALUES('$clg','$dept','$mail','$sd','$sn',$np,$amt)";
if(mysqli_query($con,$add))
{
    $check="SELECT *from clg_info where clg_name='$clg' and dept='$dept'";
    $sql=mysqli_query($con,$check);
    if(mysqli_num_rows($sql)==1)
    {
    $row=mysqli_fetch_assoc($sql);
    $lot_no=$row['lot_no'];
    $amt=$row['amt'];
    $step2=1;
    }
}
else
{
    echo"mail";
}

if($step2==1)
{
if(!empty($p1))
{
    $event="Paper_Presentation";    
    $query="INSERT INTO register_form(lot_no,participant_name,event_name) VALUES($lot_no,'$p1','$event')";
    mysqli_query($con,$query);
}

if(!empty($p2))
{
    $event="Paper_Presentation";    
    $query="INSERT INTO register_form(lot_no,participant_name,event_name) VALUES($lot_no,'$p2','$event')";
    mysqli_query($con,$query);
}

if(!empty($w1))
{
    $event="Web_Designing";    
    $query="INSERT INTO register_form(lot_no,participant_name,event_name) VALUES($lot_no,'$w1','$event')";
    mysqli_query($con,$query);
}
if(!empty($w2))
{
    $event="Web_Designing";    
    $query="INSERT INTO register_form(lot_no,participant_name,event_name) VALUES($lot_no,'$w2','$event')";
    mysqli_query($con,$query);
}

if(!empty($q1) && !empty($q2))
{
    $event="Quiz";    
    $query1="INSERT INTO register_form(lot_no,participant_name,event_name) VALUES($lot_no,'$q1','$event')";
    mysqli_query($con,$query1);  
    $query2="INSERT INTO register_form(lot_no,participant_name,event_name) VALUES($lot_no,'$q2','$event')";
    mysqli_query($con,$query2);
}

if(!empty($d1))
{
    $event="Debugging";    
    $query="INSERT INTO register_form(lot_no,participant_name,event_name) VALUES($lot_no,'$d1','$event')";
    mysqli_query($con,$query);
}

if(!empty($s1))
{
    $event="Shortcut_Key";    
    $query="INSERT INTO register_form(lot_no,participant_name,event_name) VALUES($lot_no,'$s1','$event')";
    mysqli_query($con,$query);
}

if(!empty($e1))
{
    $event="E-Poster";    
    $query="INSERT INTO register_form(lot_no,participant_name,event_name) VALUES($lot_no,'$e1','$event')";
    mysqli_query($con,$query);
}

if(!empty($ad1))
{
    $event="E-Advertisement";    
    $query="INSERT INTO register_form(lot_no,participant_name,event_name) VALUES($lot_no,'$ad1','$event')";
    mysqli_query($con,$query);
}
if(!empty($ad2))
{
    $event="E-Advertisement";    
    $query="INSERT INTO register_form(lot_no,participant_name,event_name) VALUES($lot_no,'$ad2','$event')";
    mysqli_query($con,$query);
}

if(!empty($t1))
{
    $event="Technical_Dubmash";    
    $query="INSERT INTO register_form(lot_no,participant_name,event_name) VALUES($lot_no,'$t1','$event')";
    mysqli_query($con,$query);
}
if(!empty($t2))
{
    $event="Technical_Dubmash";    
    $query="INSERT INTO register_form(lot_no,participant_name,event_name) VALUES($lot_no,'$t2','$event')";
    mysqli_query($con,$query);
}
if(!empty($t3))
{
    $event="Technical_Dubmash";    
    $query="INSERT INTO register_form(lot_no,participant_name,event_name) VALUES($lot_no,'$t3','$event')";
    mysqli_query($con,$query);
}
if(!empty($t4))
{
    $event="Technical_Dubmash";    
    $query="INSERT INTO register_form(lot_no,participant_name,event_name) VALUES($lot_no,'$t4','$event')";
    mysqli_query($con,$query);
}
if(!empty($t5))
{
    $event="Technical_Dubmash";    
    $query="INSERT INTO register_form(lot_no,participant_name,event_name) VALUES($lot_no,'$t5','$event')";
    mysqli_query($con,$query);
}

    $check="SELECT *from register_form where lot_no=$lot_no";
    $sql=mysqli_query($con,$check);

    $from_email= 'infosea2k22@gmail.com'; 
	$to = $mail; 
	$subject = "Welcome to Infosea\r\nDepartment of Computer Application"; 
	
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "From: Infosea 2k22 ".$from_email."\r\n";
	$headers .= "Reply-To: ".$from_email."\r\n";
    $headers .= "To: ".$mail."\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
    $body ="<center><h1 style='background-color:darkorange;'>Registration Details</h1></center><br/>";
    $body .="<center><h2>Welcome to Infosea</h2></center>";
    $body .="<p style='font-weight:bold;'>Your Lot_number: ".$lot_no."</p>";
    $body .="<p style='text-transform:capitalize;'>Staff Name: ".$sn."</p>";
    $body .="<p>Payable Amount: ".$amt."</p>";
    $body .="<p>Total Contestant & Event Details Below:- </p>";
    $body .="<center><table border='1'style='border-collapse: collapse;'cellpadding='10'><tr style='background-color:yellow;'><th>Contestant Name</th><th>Event Name</th></tr>";

    while($row=mysqli_fetch_assoc($sql))
    {
    $body .='<tr><td>'.$row['participant_name'].'</td><td>'.$row['event_name'].'</td></tr>';
    }

    $body .="</table><h2>All the Best !!!</h2></center>";

    $body .="<center>
    <h1>Venue</h1>
    </center>
    <table style='border-collapse:collapse; font-size:12px;' border='1' cellpadding='10'><tr><th>Event</th><th>Place</th><th>Time</th></tr>
    <tr><td>Inaugration</td><td>Auditorium</td><td>9 AM-10Am</td></tr>
    <tr><td>Tea Break</td><td>GDH(Girls Dinning Hall)</td><td>10 -10.30 Am</td></tr>
    <tr><td>Quiz-prelims</td><td>LB4-Lab</td><td>11 - 11.30 Am</td></tr>
    <tr><td>PaperPresentation</td><td>Conference Hall</td><td>11 Am-12.30 Pm</td></tr>
    <tr><td>Debugging</td><td>LB3-Lab</td><td>11 - 11.45 Am</td></tr>
    <tr><td>WebDesigning</td><td>LB3-Lab</td><td>11.45 -12.30 Pm</td></tr>
    <tr><td>Shortcut Trick</td><td>Lb4-Lab</td><td>12.30 -1 Pm</td></tr>
    <tr><td>Quiz</td><td>Auditorium</td><td>12.30 -1.30 Pm</td></tr>
    <tr><td>Lunch</td><td>GDH(Girls Dinning Hall)</td><td>1.30 -2.30 Pm</td></tr>
    <tr><td>Tech-Dubmash</td><td>Auditorium</td><td>2.30 -3.30 Pm</td></tr>
    <tr><td>Valedictory</td><td>Auditorium</td><td>3.30 -4 Pm</td></tr>
    </table>
    ";

    $body .="</body></html>";

	$sentMailResult = mail($mail, $subject, $body, $headers);

	if($sentMailResult)
	{
	echo "success";
	}

	else
	{
	echo "failed";
	}

}
}
?>