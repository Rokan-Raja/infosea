<?php
include("../db/connect.php");
$event=$_COOKIE['event'];
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
.disclaimer
{
    display:none;
}
</style>
<body>';

$html .= '<center><h1 style="color:darkred">Infosea Event Details</h1></center><br>
<center>
<h2>'.$event.'</h2><br>
    <table border="1" style="border-collapse:collapse;" cellpadding="10px" width="100%">
    <tr>
    <th>Lot_Number</th>
    <th>Participants Name</th>
    <th>Event_Name</th>
    </tr>';
if (!isset($_COOKIE["detail"])) {
    header("location:../index.php");
} else {
    $check = "select *from register_form where event_name='$event'";
    $query = mysqli_query($con, $check);
    while ($row = mysqli_fetch_assoc($query)) {
        $html .= '
    <tr align="center">
    <td>' . $row['lot_no'] . '</td>
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

$pdf = $event;

require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'potrait');

$dompdf->render();

$dompdf->stream($pdf, array("Attachment" => 1));

?>