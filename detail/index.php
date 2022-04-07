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
  <link rel="stylesheet" href="log.css">
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
            <a class="nav-link active" aria-current="page" href="index.php">Registered College Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="event.php">Event Details</a>
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
    <h1>Infosea Registered College</h1>
  </center>
  <br>
  <div id="loading">

  </div>
  <div class="container">
    <form class="form-inline row" id="frm"><br>
      <div class="col-md-6">
        <h3>Select the College:-</h3>
        <select class="form-control" name="clg" id="clg">
          <option value="0">--select--</option>
          <?php
          include('../db/connect.php');
          $sql = "SELECT * FROM clg_info";
          $query = $con->query($sql);
          while ($rows = $query->fetch_assoc()) {
            echo "<option>" . $rows['clg_name'] . "</option>";
          }
          ?>
        </select>
      </div>
      <div class="col-md-5">
        <h3>Select the Department:-</h3>
        <select class="form-control" name="dept" id="dept">
          <option value="0">--select--</option>
          <option value="Bca">BCA</option>
          <option value="Cs">B.CS</option>
          <option value="It">B.IT</option>
          <option value="Ca">B.Com(CA)</option>
        </select>
      </div>
    </form>
  </div>
  <br>
  <br>
  <div id="myTable">

  </div>
  <script src="../js/jquery.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../datatable/jquery.dataTables.min.js"></script>
  <script src="../datatable/dataTable.bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      var e = '';
      var c = '';
      $.post("detail.php", {
        dept: e,
        clg: c
      }, function(data) {
        $("#myTable").html(data);
        $('#mytable').DataTable();
      })
    });
    $("#dept").change(function() {
      var e = $('#dept').val();
      var c = $('#clg').val();
      $.post("detail.php", {
        dept: e,
        clg: c
      }, function(data) {
        $("#myTable").html(data);
      })
    });

    $("#clg").change(function() {
      var c = $('#clg').val();
      var e = $('#dept').val();
      $.post("detail.php", {
        clg: c,
        dept: e
      }, function(data) {
        $("#myTable").html(data);
      })

    });
  </script>
  <script src="../js/home.js"></script>
</body>

</html>