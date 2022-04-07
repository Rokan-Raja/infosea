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
    <h1 class="text-right">Paper Presentation<span id="name"></span></h1>
    <form class="form-inline" id="frm">
      <div class="text-center" id="error"></div>
      <div class="mb-3 col-md-6 col-sm-12">
        <label for="exampleInputText1" class="form-label">Lot Number</label>
        <input type="number" class="form-control" id="lotnumber" name="lotno" placeholder="Enter the Lot number" required autocomplete="off" aria-describedby="textHelp">
        <div id="error" class="form-lot"></div>
      </div>
      <div class="mb-3 col-md-6 col-sm-12">
        <label for="exampleInputText1" class="form-label">Communication Marks(10)</label>
        <input type="number" class="form-control" id="m1" pattern="\d*" maxlength="4" name="m1" placeholder="0" required autocomplete="off" aria-describedby="textHelp">
        <div id="error" class="form-m1"></div>
      </div>
      <div class="mb-3 col-md-6 col-sm-12">
        <label for="exampleInputText1" class="form-label">Presentation Marks(10)</label>
        <input type="number" class="form-control" pattern="\d*" maxlength="4" id="m2" name="m2" placeholder="0" autocomplete="off" aria-describedby="textHelp">
        <div id="error" class="form-m2"></div>
      </div>
      <div class="mb-3 col-md-6 col-sm-12">
        <label for="exampleInputText1" class="form-label">Query Marks(10)</label>
        <input type="number" class="form-control" id="m3" pattern="\d*" maxlength="4" name="m3" placeholder="0" autocomplete="off" aria-describedby="textHelp">
        <div id="error" class="form-m3"></div>
      </div>
      <div class="mb-3 col-md-6 col-sm-12">
        <label for="exampleInputText1" class="form-label">Total</label>
        <input type="number" class="form-control" id="tot" pattern="\d*" maxlength="4" name="tot" readonly value="0" autocomplete="off" aria-describedby="textHelp">
        <div id="error" class="form-text"></div>
      </div>
      <center>
        <button type="button" id="submit" class="btn btn-primary">Submit</button>
        <button type="button" id="total" class="btn btn-primary">Result</button>
      </center>
    </form>
    <br>
  </div>
  <script src="js/jquery.js"></script>
  <script>
    $("#submit").click(function() {
      var lot = $("#lotnumber").val();
      if (parseInt(lot) < 100) {
        $.ajax({
          url: "db/mark.php",
          type: "post",
          data: $("#frm").serialize(),
          success: function(data) {
            if (data == "success") {
              $("#frm")[0].reset();
              $("#error").html("");
              $(".form-lot").html("");
            } else if (data == 'notlot') {
              $("#frm")[0].reset();
              $("#error").html("Check your details !!!");
              $(".form-lot").html("Invaild Lot Number !!!");
            } else {
              $("#frm")[0].reset();
              $("#error").html("Check your details !!!");
              $(".form-lot").html("Already Mark Entered !!!");
            }
          }
        });
      } else {
        $("#error").html("Check your details !!!");
        $(".form-lot").html("Invaild Lotnumber !!!");
      }
    });
    $("#total").click(function() {
      window.location.href = "db/result.php";
    });
  </script>
  <script src="js/lot.js"></script>
  <script src="js/ppt.js"></script>
</body>
<?php
include('footer.php');
?>

</html>