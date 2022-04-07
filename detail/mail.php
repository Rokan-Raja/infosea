<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Infocia Marksheet</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="log.css">
  <link rel="stylesheet" href="alert.css">
  <script src="alert.js"></script>
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
            <a class="nav-link" aria-current="page" href="index.php">Registered College Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="event.php">Event Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="mail.php">Add Mail</a>
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
  <br><br>
  <center>
    <h2>Infosea Portal</h2>
  </center>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card shadow">
          <div class="card-title text-center border-bottom">
            <h2 class="p-3">Add Mail</h2>
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
                <button type="button" id="submit" class="btn text-light main-bg mb-5">Add</button>
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
            swal('Success', 'Added Successfully', 'success');
          } else {
            swal('Warning', 'Added Failed', 'warning');
            $(".form-user").html("Already Exist Email !!");
            $("#frm")[0].reset();
          }
        }
      });
    });
  </script>
</body>

</html>