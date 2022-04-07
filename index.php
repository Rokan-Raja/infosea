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
    <script src="js/jquery.js"></script>
</head>
<body>
<?php
include('loader.php');
?>
<img src="POSTER.png" class="img-fluid"></img> 
<div class="container sm-container">
	<style>
    body {background-image: url(sun.jpg);}
    h1   {color: black;
          font-weight : bold;
          font-style : italic; 
	      font-family:'Cambria';}
    label {color: black;
           font-weight : bold;
           font-style : italic; 
	       font-family:'Times New Roman';
        }
      #textHelp{
        color: darkred;
        font-weight: bold;
      }
	</style>
    <h1  class="text-center">LOGIN<span id="name"></span></h1>
  <form class="form-inline" id="frm">
      <div class="mb-3 col-md-6 col-sm-12">
          <label for="exampleInputText1" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="name"autocomplete="off" placeholder="Enter the User Name" required autocomplete="off" aria-describedby="textHelp">
          <div id="textHelp" class="form-user"></div>
      </div>
    <div class="mb-3 col-md-6 col-sm-12">
        <label for="exampleInputText1" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="pw"autocomplete="off" placeholder="Enter the Password" required autocomplete="off" aria-describedby="textHelp">
        <div id="textHelp" class="form-pw"></div>
    </div>
    </div>
	<center>
      <button type="button" id="submit" class="btn btn-primary text-center">Submit</button>
	</center>  
  </form>
  <br>
</div>
<script src="js/jquery.js"></script>
<script>
  $("#submit").click(function(){
     var event=$('#event').val();
     $.ajax({
            url: "db/login.php",
            type: "post",
            data: $("#frm").serialize(),
            success: function (data) {
            if(data=="admin")
            {
              $(".form-user").html("");
              $(".form-pw").html("");
              window.location.href ="prizelist.php";
            }
            else if(data=="register")
            {
              $(".form-user").html("");
              $(".form-pw").html("");
              window.location.href ="./register/register_form.php";
            }
            else if(data=="detail")
            {
              $(".form-user").html("");
              $(".form-pw").html("");
              window.location.href ="./detail/index.php";
            }
            else if(data=="user")
            {
              $(".form-user").html("");
              $(".form-pw").html("");
              window.location.href ="home.php";
            }
            else
            {
              $(".form-user").html("Check your Username !!");
              $(".form-pw").html("Check your Password !!");
              $("#frm")[0].reset();
            }
            }
        });
    });
</script>
</body>
</html>