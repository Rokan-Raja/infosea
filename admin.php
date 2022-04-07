<?php
include('db/log_admin.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
  <link rel="stylesheet" href="customs/custom.css">
  <style>
    body {
      background-image: url(SUN1.png);
    }

    h1 {
      color: white;
      font-weight: bold;
      font-style: italic;
      font-family: 'Cambria';
    }

    .dataTables_filter,
    label {
      color: black;
      margin: 5px;
      font-weight: bold;
      font-family: Arial, Helvetica, sans-serif;
    }

    .dataTables_info {
      color: black;
      margin: 5px;
      font-weight: bold;
      font-family: 'Times New Roman', Times, serif;
    }

    table,
    th,
    td {
      color: darkred;
      font-size: 10px;
      text-transform: capitalize;
    }
  </style>
  <title>Infosea</title>
</head>

<body>
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
            <a class="nav-link active" aria-current="page" href="admin.php">Judge Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="marksheet.php">Mark List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="prizelist.php">Prize List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container sm-container-fluid">
    <h1 class="text-center">Judge Details</h1>
    <div class="mb-3 col-md-6 col-sm-12">
      <div class="row">
        <table id="mytable" class="table table-light">
          <thead>
            <th>Judge Name</th>
            <th>Department</th>
            <th>Event_name</th>
          </thead>
          <tbody>
            <?php
            include('db/connect.php');
            $sql = "SELECT * FROM judge_details";
            $query = $con->query($sql);
            while ($rows = $query->fetch_assoc()) {
            ?>
              <tr>
                <td contenteditable="true" data-old_value="<?php echo $rows["name"]; ?>" onBlur="saveInlineEdit3(this,'name','<?php echo $rows["id"]; ?>')"><?php echo $rows["name"]; ?></td>
                <td contenteditable="true" data-old_value="<?php echo $rows["dept"]; ?>" onBlur="saveInlineEdit3(this,'dept','<?php echo $rows["id"]; ?>')"><?php echo $rows["dept"]; ?></td>
                <td><?php echo $rows["event_name"]; ?></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="datatable/jquery.dataTables.min.js"></script>
  <script src="datatable/dataTable.bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#mytable").DataTable();
    });
  </script>
  <script type="text/javascript" src="js/function3.js"></script>
  <br>
  <?php
  include('footer.php');
  ?>
</body>

</html>