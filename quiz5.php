<?php
include('db/log_judge.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Infocia Marksheet</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="customs/custom.css">
</head>

<body>
  <?php
  include('loader.php')
  ?>
  <img src="POSTER.png" class="img-fluid"></img>
  <div class="container sm-container-fluid form-design">
    <h1 class="text-center">Quiz<span id="name"></span></h1>
    <h2 class="text-center">TIE BREAK</h2>
    <form class="form-inline" id="frm">
      <div class="text-center" id="error"></div>
      <div class="row">
        <div class="col-6 mb-2">
          <label for="exampleInputText1" class="form-label">Lot Number</label>
          <input type="number" class="form-control" id="lotnumber1" name="lotno1" readonly value="<?php echo $_COOKIE['lotno1'];  ?>" aria-describedby="textHelp">
          <div id="error" class="form-lot1"></div>
        </div>
        <div class="col-6 mb-2">
          <label for="exampleInputText1" class="form-label">Marks(5)</label>
          <input type="number" class="form-control" id="m1" name="m1" autocomplete="off" placeholder="0" required aria-describedby="textHelp">
          <div id="error" class="form-m1"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 mb-2">
          <label for="exampleInputText1" class="form-label">Lot Number</label>
          <input type="number" class="form-control" id="lotnumber2" name="lotno2" readonly value="<?php echo $_COOKIE['lotno2']; ?>" aria-describedby="textHelp">
          <div id="error" class="form-lot2"></div>
        </div>
        <div class="col-6 mb-2">
          <label for="exampleInputText1" class="form-label">Marks(5)</label>
          <input type="number" class="form-control" id="m2" name="m2" autocomplete="off" placeholder="0" required aria-describedby="textHelp">
          <div id="error" class="form-m2"></div>
        </div>
      </div>
  </div>
  <center>
    <button type="button" id="total" class="btn btn-primary text-center">Result</button>
    <button type="button" id="submit" class="btn btn-primary text-center">Submit</button>
  </center>
  </form>
  <br>
  </div>
  <script src="js/jquery.js"></script>
  <script>
    $("#submit").click(function() {
      var event = $('#event').val();
      $.ajax({
        url: "db/tie.php",
        type: "post",
        data: $("#frm").serialize(),
        success: function(data) {
          if (data == "success") {
            $("#frm")[0].reset();
            window.location.href = "db/result2.php";
          }
        }
      });
    });
    $("#total").click(function() {
      window.location.href = "db/result.php";
    });
  </script>
  <script src="js/tie.js"></script>
</body>
<?php
include('footer.php');
?>

</html>