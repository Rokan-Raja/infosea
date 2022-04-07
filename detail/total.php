<?php
include('../db/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infocia Marksheet</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../datatable/dataTable.bootstrap.min.css">
    <link rel="stylesheet" href="alert.css">
    <link rel="stylesheet" href="log.css">
    <script src="alert.js"></script>
    <style>
        .disclaimer {
            display: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #d14a15;">
        <div class="container sm-container-fluid">
            <a class="navbar-brand" href="#">Infosea</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Registered College Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="event.php">Event Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="mail.php">Add Mail</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="total.php">Total Participants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>
    <div class="container">
        <center>
            <h1>Total Participants</h1>
        </center>
        <table class='table table-bordered'>
            <tr>
                <th>Total No Of Participants</th>
                <th>Amount</th>
            </tr>
            <?php
            $sql = "Select SUM(no_student)from clg_info";
            $q1 = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($q1)) {
                echo "<tr><td>" . $row['SUM(no_student)'] . "</td>";
            }
            $sql = "Select SUM(amt)from clg_info";
            $q1 = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($q1)) {
                echo "<td>" . $row['SUM(amt)'] . "</td></tr>";
            }
            ?>
        </table>
        <br>
        <center>
            <h1>Lot No Wise Participants</h1>
        </center>
        <table id='myTable' class='table table-bordered'>
            <thead>
                <tr>
                    <th>Lot No</th>
                    <th>College Name</th>
                    <th>No Of Participants</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "Select *from clg_info";
                $q1 = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($q1)) {
                    echo "<tr><td>" . $row['lot_no'] . "</td>";
                    echo "<td>" . $row['clg_name'] . "</td>";
                    echo "<td>" . $row['no_student'] . "</td>";
                    echo "<td>" . $row['amt'] . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <br><br>
    <script src="../js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../datatable/jquery.dataTables.min.js"></script>
    <script src="../datatable/dataTable.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>