<?php
if (isset($_COOKIE['detail'])) {
    echo "";
} else {
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="loader.css">
    <link rel="stylesheet" type="text/css" href="../datatable/dataTable.bootstrap.min.css">
    <title>Infosea Register Details</title>
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
                        <a class="nav-link active" aria-current="page" href="event.php">Event Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="mail.php">Add Mail</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" aria-current="page" href="total.php">Total Participants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <center>
        <h1>Infosea Event Details</h1>
    </center>
    <div id="loading">
        
    </div>
    <center>
        <div class="mb-3 col-md-6 ">
            <label for="exampleInputText1" class="form-label">Event_name</label>
            <select name="event" class="form-control" id="event">
                <option value="0">--select--</option>
                <option value="Debugging">Software Debugging</option>
                <option value="Technical_Dubmash">Technical Dubmash</option>
                <option value="Web_Designing">Web Designing</option>
                <option value="Paper_Presentation">Paper Presentation</option>
                <option value="Quiz">Quiz</option>
                <option value="Shortcut_Key">ShortcutKey</option>
                <option value="E-Poster">E-Poster</option>
                <option value="E-Advertisement">E-Advertisement</option>
            </select>
        </div>
    </center>

    <div id="myTable">

    </div>
    <script src="../js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../datatable/jquery.dataTables.min.js"></script>
    <script src="../datatable/dataTable.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var e = '';
            $.post("detail2.php", {
                event: e,
            }, function(data) {
                $("#myTable").html(data);
            })
        });
        $("#event").change(function() {
            var e = $('#event').val();
            if (e != "0") {
                $.post("detail2.php", {
                    event: e,
                }, function(data) {
                    $("#myTable").html(data);
                })
            } else {
                $("#myTable").html("");
            }
        });
    </script>
    <script src="../js/home.js"></script>
    <script src="functions.js"></script>
</body>
</html>