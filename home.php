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
  <link rel="stylesheet" href="customs/custom.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
  <?php
  include('loader.php')
  ?>
  <img src="POSTER.png" class="img-fluid"></img>
  <div class="container sm-container form-design">
    <h1 class="text-right">Judge Details<span id="name"></span></h1>
    <form class="form-inline" id="frm">
      <div class="text-center" id="error"></div>
      <div class="mb-3 col-md-6 col-sm-12">
        <label for="exampleInputText1" class="form-label">Judge name</label>
        <select class="form-control" name="name" id="user">
          <option value=0>--select--</option>
          <?php
          include('db/connect.php');
          $sql = "SELECT * FROM judge_details";
          $query = $con->query($sql);
          while ($rows = $query->fetch_assoc()) {
            echo "<option value=" . $rows['name'] . ">", $rows['name'], "</option>";
          }
          ?>
        </select>
      </div>
      <div class="mb-3 col-md-6 col-sm-12">
        <label for="exampleInputText1" class="form-label">Department</label>
        <select name="dept" class="form-control" id="dept">
          <option value=0>--select--</option>
          <option value="Cs">BSC(CS)</option>
          <option value="It">BSC(IT)</option>
          <option value="Maths">BSC(Maths)</option>
          <option value="Ca">B.COM(CA)</option>
          <option value="Mcom">M.COM</option>
        </select>
        <div style="color:red;font-weight:bold" id="dept1"></div>
      </div>
      <div class="mb-3 col-md-6 col-sm-12">
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
        <div style="color:red;font-weight:bold" id="event1"></div>
      </div>
      <center>
        <button type="button" id="submit" class="btn btn-primary text-center">Submit</button>
      </center>
      <br>
    </form>
  </div>
  <script src="js/jquery.js"></script>
  <script>
    $("#submit").click(function() {
      var event = $('#event').val();
      $.ajax({
        url: "db/judge.php",
        type: "post",
        data: $("#frm").serialize(),
        success: function(data) {
          if (data == "success") {
            if (event == 'Web_Designing') {
              window.location.href = "webdesign.php";
            } else if (event == 'Debugging') {
              window.location.href = "softdebug.php";
            } else if (event == 'Technical_Dubmash') {
              window.location.href = "techmash.php";
            } else if (event == 'Paper_Presentation') {
              window.location.href = "ppt.php";
            } else if (event == 'Shortcut_Key') {
              window.location.href = "shortcut.php";
            } else if (event == 'Quiz') {
              window.location.href = "quiz.php";
            } else if (event == 'E-Advertisement') {
              window.location.href = "online_video.php";
            } else if (event == 'E-Poster') {
              window.location.href = "online_poster.php";
            } else {
              window.location.href = "home.php";
            }
            $("#error").html("");
            $("#event1").html("");
            $("#dept1").html("");
          } else {
            $("#error").html("Check your details !!!");
            $("#event1").html("Check Your Event !!!");
            $("#dept1").html("Check Your Department !!!");
            $("#frm")[0].reset();
          }
        }
      });
    });
  </script>
  <script src="js/home.js"></script>
</body>
<?php
include("footer.php");
?>
</html>