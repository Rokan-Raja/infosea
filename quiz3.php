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
    <h2 class="text-center">Logo Finding</h2>
    <form class="form-inline" id="frm">
      <div class="text-center" id="error"></div>
      <div class="row">
        <div class="col-6 mb-2">
          <label for="exampleInputText1" class="form-label">Lot Number</label>
          <input type="number" class="form-control" id="lotnumber1" name="lotno1" readonly value="<?php echo $_COOKIE['lot1'];  ?>" aria-describedby="textHelp">
          <div id="error" class="form-lot1"></div>
        </div>
        <div class="col-6 mb-2">
          <label for="exampleInputText1" class="form-label">Marks(10)</label>
          <input type="number" class="form-control" id="m1" name="m1" autocomplete="off" placeholder="0" required aria-describedby="textHelp">
          <div id="error" class="form-m1"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 mb-2">
          <label for="exampleInputText1" class="form-label">Lot Number</label>
          <input type="number" class="form-control" id="lotnumber2" name="lotno2" readonly value="<?php echo $_COOKIE['lot2']; ?>" aria-describedby="textHelp">
          <div id="error" class="form-lot2"></div>
        </div>
        <div class="col-6 mb-2">
          <label for="exampleInputText1" class="form-label">Marks(10)</label>
          <input type="number" class="form-control" id="m2" name="m2" autocomplete="off" placeholder="0" required aria-describedby="textHelp">
          <div id="error" class="form-m2"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 mb-2">
          <label for="exampleInputText1" class="form-label">Lot Number</label>
          <input type="number" class="form-control" id="lotnumber3" name="lotno3" readonly value="<?php echo $_COOKIE['lot3']; ?>" aria-describedby="textHelp">
          <div id="error" class="form-lot3"></div>
        </div>
        <div class="col-6 mb-2">
          <label for="exampleInputText1" class="form-label">Marks(10)</label>
          <input type="number" class="form-control" id="m3" name="m3" autocomplete="off" placeholder="0" required aria-describedby="textHelp">
          <div id="error" class="form-m3"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 mb-2">
          <label for="exampleInputText1" class="form-label">Lot Number</label>
          <input type="number" class="form-control" id="lotnumber4" name="lotno4" value="<?php echo $_COOKIE['lot4']; ?>" readonly aria-describedby="textHelp">
          <div id="error" class="form-lot"></div>
        </div>
        <div class="col-6 mb-2">
          <label for="exampleInputText1" class="form-label">Marks(10)</label>
          <input type="number" class="form-control" id="m4" name="m4" autocomplete="off" placeholder="0" required aria-describedby="textHelp">
          <div id="error" class="form-m4"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 mb-2">
          <label for="exampleInputText1" class="form-label">Lot Number</label>
          <input type="number" class="form-control" id="lotnumber5" name="lotno5" readonly value="<?php echo $_COOKIE['lot5']; ?>" aria-describedby="textHelp">
          <div id="error" class="form-lot"></div>
        </div>
        <div class="col-6 mb-2">
          <label for="exampleInputText1" class="form-label">Marks(10)</label>
          <input type="number" class="form-control" id="m5" name="m5" autocomplete="off" placeholder="0" required aria-describedby="textHelp">
          <div id="error" class="form-m5"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 mb-2">
          <label for="exampleInputText1" class="form-label">Lot Number</label>
          <input type="number" class="form-control" id="lotnumber6" name="lotno6" readonly value="<?php echo $_COOKIE['lot6']; ?>" aria-describedby="textHelp">
          <div id="error" class="form-lot"></div>
        </div>
        <div class="col-6 mb-2">
          <label for="exampleInputText1" class="form-label">Marks(10)</label>
          <input type="number" class="form-control" id="m6" name="m6" autocomplete="off" placeholder="0" required aria-describedby="textHelp">
          <div id="error" class="form-m6"></div>
        </div>
      </div>
      <center>
        <button type="button" id="total" class="btn btn-primary text-center">Result</button>
        <button type="button" id="submit" class="btn btn-primary text-center">Submit</button>
        <button type="button" id="next" class="btn btn-primary text-center">Next</button>
      </center>
    </form>
    <br>
  </div>
  <script src="js/jquery.js"></script>
  <script>
    $("#submit").click(function() {
      var event = $('#event').val();
      $.ajax({
        url: "db/mark3.php",
        type: "post",
        data: $("#frm").serialize(),
        success: function(data) {
          if (data == "success") {
            $("#frm")[0].reset();
            window.location.href = "quiz4.php";
          }
        }
      });
    });
    $("#next").click(function() {
      window.location.href = "quiz4.php";
    });
    $("#total").click(function() {
      window.location.href = "db/result.php";
    });
  </script>
  <script src="js/quiz.js"></script>
</body>
<?php
include('footer.php');
?>

</html>