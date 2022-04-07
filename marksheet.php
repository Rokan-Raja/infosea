<?php
include('db/log_admin.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="customs/custom.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
  <title>Infosea</title>
</head>

<body>
  <style>
    body {
      background-image: url(SUN1.png);
    }

    h2 {
      color: white;
      font-weight: bold;
      font-style: italic;
      text-align: center;
      font-family: 'Times New Roman', Times, serif;
    }

    table,
    th,
    td {
      color: darkred;
      text-transform: capitalize;
    }

    .dataTables_filter,
    label {
      color: black;
      margin: 5px;
      font-weight: bold;
      font-size: 20px;
      font-family: Arial, Helvetica, sans-serif;
    }

    .dataTables_info {
      color: black;
      margin: 5px;
      font-weight: bold;
      font-size: 17px;
      font-family: 'Times New Roman', Times, serif;
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
            <a class="nav-link active" href="marksheet.php">Mark List</a>
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
  <?php
  include("db/connect.php");
  ?>
  <div class="container sm-container-fluid">
    <h2>List of Marks</h2>
    <?php
    $sql = "SELECT * FROM finalmark";
    $resultset = mysqli_query($con, $sql) or die("database error:" . mysqli_error($conn));
    ?>
    <div class="mb-3 col-md-6 col-sm-12">
      <div class="row">
        <table id="mytable" class="table table-light">
          <thead>
            <tr>
              <th>LotNo</th>
              <th>Event_name</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($rows = mysqli_fetch_assoc($resultset)) {
            ?>
              <tr>
                <td contenteditable="true" data-old_value="<?php echo $rows["lotno"]; ?>" onBlur="saveInlineEdit(this,'lotno','<?php echo $rows["id"]; ?>')"><?php echo $rows["lotno"]; ?></td>
                <td contenteditable="true" data-old_value="<?php echo $rows["event_name"]; ?>" onBlur="saveInlineEdit(this,'event_name','<?php echo $rows["id"]; ?>')"><?php echo $rows["event_name"]; ?></td>
                <td contenteditable="true" data-old_value="<?php echo $rows["total"]; ?>" onBlur="saveInlineEdit(this,'total','<?php echo $rows["id"]; ?>')"><?php echo $rows["total"]; ?></td>
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
  <script type="text/javascript" src="js/functions.js"></script>
</body>
<?php
include('footer.php');
?>

</html>