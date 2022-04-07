<?php
include("../db/connect.php");
$lot = $_COOKIE['lot_no'];
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infosea</title>
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.css">
</head>
<style>
.pagebrake
{
page-break-after: always;   
}
.box
{
    text-transform:uppercase;
    border:1px solid red;
    padding:5%
}
.data
{
    color:blue;
}
.mail
{
    text-transform:lowercase;  
}
.disclaimer
{
    display:none;
}
</style>
<body>';

$check = "select *from clg_info where lot_no=$lot";
$query = mysqli_query($con, $check);
$row = mysqli_fetch_assoc($query);


$html .= '<center><h1 style="color:darkred">Infosea Registered College Details</h1></center><br>
<div class="box"><h1 style="text-align:center">College Details.</h1><br>
<h3>College Name        :<span class="data"> ' . $row['clg_name'] . '</span> </h3><br>
<h3>Staff Name          :<span class="data"> ' . $row['staff_name'] . '</span> </h3><br>
<h3>Staff Designation   :<span class="data"> ' . $row['staff_des'] . '</span> </h3><br>
<h3>Lot Number          :<span class="data"> ' . $row['lot_no'] . '</span> </h3><br>
<h3>Total Participant   :<span class="data"> ' . $row['no_student'] . '</span> </h3><br>
<h3>Co-ordinater Email  :<span class="data mail"> ' . $row['mail'] . '</span> </h3><br>
<h3>Total Amount Paid   :<span class="data"> ' . $row['amt'] . '</span> </h3><br><br><br></div>

<div class="pagebrake"></div>
<div class="box">
<center>
    <h1>Participants Detail</h1><br>
</center>
<center>
    <table border="1" style="border-collapse:collapse;" cellpadding="10px" width="100%">
    <tr>
    <th>Participants Name</th>
    <th>Event_Name</th>
    </tr>';
if (!isset($_COOKIE["detail"])) {
    header("location:../index.php");
} else {
    $check = "select *from register_form where lot_no=$lot";
    $query = mysqli_query($con, $check);
    while ($row = mysqli_fetch_assoc($query)) {
        $html .= '
    <tr align="center">
    <td style="text-transform:uppercase">' . $row['participant_name'] . '</td>
    <td>' . $row['event_name'] . '</td>
    </tr>';
    }
}
$html .= '</table>
</center>
</div>
</body>
</html>';
?>
<?php

$pdf = 'lotnumber' . $lot;

require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'potrait');

$dompdf->render();

$dompdf->stream($pdf, array("Attachment" => 1));

?>