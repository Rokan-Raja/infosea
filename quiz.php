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
    <h2 class="text-center">Word Hunt</h2>
    <form class="form-inline" id="frm">
      <div class="text-center" id="error"></div>
      <div class="row">
        <div class="col-6 mb-2">
          <label for="exampleInputText1" class="form-label">Lot Number</label>
          <input type="number" class="form-control" id="lotnumber1" name="lotno1" placeholder="Lotnumber" required autocomplete="off" aria-describedby="textHelp">
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
          <input type="number" class="form-control" id="lotnumber2" name="lotno2" placeholder="Lotnumber" required autocomplete="off" aria-describedby="textHelp">
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
          <input type="number" class="form-control" id="lotnumber3" name="lotno3" placeholder="Lotnumber" required autocomplete="off" aria-describedby="textHelp">
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
          <input type="number" class="form-control" id="lotnumber4" name="lotno4" placeholder="Lotnumber" required autocomplete="off" aria-describedby="textHelp">
          <div id="error" class="form-lot4"></div>
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
          <input type="number" class="form-control" id="lotnumber5" name="lotno5" placeholder="Lotnumber" required autocomplete="off" aria-describedby="textHelp">
          <div id="error" class="form-lot5"></div>
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
          <input type="number" class="form-control" id="lotnumber6" name="lotno6" placeholder="Lotnumber" required autocomplete="off" aria-describedby="textHelp">
          <div id="error" class="form-lot6"></div>
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

      var lot1 = $("#lotnumber1").val();
      var lot2 = $("#lotnumber2").val();
      var lot3 = $("#lotnumber3").val();
      var lot4 = $("#lotnumber4").val();
      var lot5 = $("#lotnumber5").val();
      var lot6 = $("#lotnumber6").val();
      if (parseInt(lot1) < 100 && parseInt(lot2) < 100 && parseInt(lot3) < 100 && parseInt(lot4) < 100 && parseInt(lot5) < 100 && parseInt(lot6) < 100) {
        var lot6 = $("#lotnumber6").val();
        var event = $('#event').val();
        $.ajax({
          url: "db/mark2.php",
          type: "post",
          data: $("#frm").serialize(),
          success: function(data) {
            if (data == "success") {
              $("#frm")[0].reset();
              window.location.href = "quiz2.php";
            } else if (data == 'notlot') {
              $("#error").html("Fill the Correct Number in All fields!!!");
            } else {
              $("#error").html("Check Your Details !!!");
            }
          }
        });
      } else {
        $("#error").html("Check the Lot Number !!!");
      }
    });
    $("#next").click(function() {
      window.location.href = "quiz2.php";
    });
    $("#total").click(function() {
      window.location.href = "db/result.php";
    });
  </script>
  <script src="js/lot.js"></script>
  <script src="js/quiz.js"></script>
</body>
<?php
include('footer.php');
?>

</html>