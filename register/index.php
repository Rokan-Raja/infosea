<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Infocia Marksheet</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="log.css">
  <style>
    .disclaimer {
      display: none;
    }
  </style>
</head>
<body>
  <br><br>
  <center>
    <h2 style="background-color: orangered;">Infosea Portal</h2>
  </center>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card shadow">
          <div class="card-title text-center border-bottom">
            <h2 class="p-3">Login</h2>
          </div>
          <div class="card-body">
            <form id="frm">
              <div class="mb-4">
                <label for="username" class="form-label">Email</label>
                <input type="text" name="mail" class="form-control mb-1" id="username" />
                <span class="form-user"></span>
              </div>
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="pw" class="form-control mb-1" id="password" />
                <span class="form-pw"></span>
              </div>
              <div class="d-grid">
                <button type="button" id="submit" class="btn text-light main-bg mb-5">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  </div>
  <script src="../js/jquery.js"></script>
  <script>
    $("#submit").click(function() {
      $.ajax({
        url: "login.php",
        type: "post",
        data: $("#frm").serialize(),
        success: function(data) {
          if (data == "register") {
            $(".form-user").html("");
            $(".form-pw").html("");
            window.location.href = "register_form.php";
          } else {
            $(".form-user").html("Check your Email !!");
            $(".form-pw").html("Check your Password !!");
            $("#frm")[0].reset();
          }
        }
      });
    });
  </script>
</body>
</html>