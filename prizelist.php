<?php
include('db/log_admin.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PrizeList</title>
</head>

<body>
  <style>
    .disclaimer {
      display: none;
    }

    body {
      background-image: url(SUN1.png);
    }

    h1 {
      color: white;
      font-weight: bold;
      font-style: italic;
      font-family: 'Cambria';
    }

    table,
    th,
    td {
      color: darkred;
      background-color: white;
      text-transform: capitalize;
    }

    tbody>tr:nth-child(1) {
      background-color: darkorange;
      text-transform: capitalize;
    }

    tbody>tr:nth-child(2) {
      background-color: darkorange;
      text-transform: capitalize;
    }

    tbody>tr:nth-child(3) {
      background-color: darkorange;
      text-transform: capitalize;
    }

    #pic {
      background-image: url('4p.png');
      background-size: contain;
      background-repeat: no-repeat;
    }

    tbody>tr:nth-child(1)>#pic {
      background-image: url('1p.png');
      background-size: contain;
      background-repeat: no-repeat;
    }

    tbody>tr:nth-child(2)>#pic {
      background-image: url('2p.png');
      background-size: contain;
      background-repeat: no-repeat;
    }

    tbody>tr:nth-child(3)>#pic {
      background-image: url('3p.png');
      background-size: contain;
      background-repeat: no-repeat;
    }

    footer {
      background-color: darkorange;
      padding: 8px;
    }
  </style>
  <?php
  include('loader.php')
  ?>
  <img src="POSTER.png" class="img-fluid"></img>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #d14a15;">
    <div class="container sm-container-fluid">
      <a class="navbar-brand" href="#">Infosea</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="admin.php">Judge Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="marksheet.php">Mark List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="prizelist.php">Prize List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container sm-container-fluid">
    <h1>Prize List</h1>
    <br>
    <form class="form-inline col-md-6 col-sm-12" id="frm">
      <select class="form-control" id="event">
        <option value="0">--select--</option>
        <option value="Debugging">Software Debugging</option>
        <option value="Technical_Dubmash">Technical Dubmash</option>
        <option value="Web_Design">Web Designing</option>
        <option value="Paper_presentation">Paper Presentation</option>
        <option value="Quiz">Quiz</option>
        <option value="Shortcut_Key">ShortcutKey</option>
        <option value="E-Advertisement">E-Advertisement</option>
        <option value="E-Poster">E-Poster</option>
      </select>
    </form>
    <br>
    <div id="table">

    </div>
  </div>
  <script src="js/jquery.js"></script>
  <script>
    $("#event").change(function() {
      var e = $('#event').val();
      if (e != "0") {
        $.post("db/data.php", {
          event: e
        }, function(data) {
          $("#table").html(data);
        })
      } else {
        $("#table").html("");
      }
    });
  </script>
  <script src="js/home.js"></script>
</body>
<?php
include('footer.php');
?>

</html>