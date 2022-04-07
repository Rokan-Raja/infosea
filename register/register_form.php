<?php
session_start();
if (!isset($_SESSION['register'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registation Form</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="loader.css">
    <link rel="stylesheet" href="alert.css">
    <script src="alert.js"></script>
    <style>
        .disclaimer {
            display: none;
        }

        .bg {
            height: 8cm;
            width: 100%
        }

        @media screen and (max-width:756px) {
            .bg {
                height: unset;
            }
        }
    </style>
</head>

<img src="POSTER.png" class="img-fluid bg" alt=""><br>

<body class="bdy"><br>
    <div id="loading">

    </div>
    <div class="container" id="container">
        <center>
            <h4>Registration Form</h4>
        </center>
        <form class="form-inline" id="frm">
            <div class="container-fluid">
                <hr>
                <h2 id="h2">Meta</h2>
                <div class="row">
                    <div class="col-md-3">
                        <label>College Name:-</label><br>
                        <input type="text" id="college" autocomplete="off" name="clg" required>
                    </div>
                    <div class="col-md-3">
                        <label>Department:-</label><br>
                        <select autocomplete="off" class="form-control" id="dept" name="dept">
                            <option value="0">--select--</option>
                            <option value="Bca">BCA</option>
                            <option value="Cs">B.Sc(CS)</option>
                            <option value="It">B.SC(IT)</option>
                            <option value="Ca">B.Com(CA)</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Co-ordinater's Email:-</label><br>
                        <input type="email" id="mail" name="mail" autocomplete="off" required>
                    </div>
                    <div class="col-md-3">
                        <label>No of Participants:-</label><br>
                        <input type="number" id="tn" name="np" autocomplete="off" required>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-3">
                        <label>Staff Name:-</label><br>
                        <input type="text" id="staff" name="sn" autocomplete="off" required>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <label>Designation:-</label><br>
                        <input type="text" name="sd" autocomplete="off" required>
                    </div>
                </div>
                <hr>
                <!-- ------------------------------------EVENTS-------------------------------------- -->

                <div class="container">
                    <h2 id="h2">Events</h2>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Paper Presentation</label><br>
                            <input type="text" name="p1" autocomplete="off"><br><br>
                            <input type="text" name="p2" autocomplete="off"><br><br><br><br>

                            <label>Web Designing</label><br>
                            <input type="text" name="w1" autocomplete="off"><br><br>
                            <input type="text" name="w2" autocomplete="off"><br><br>


                        </div>
                        <div class="col-md-3" id="tdb">
                            <label>Technical Dubmash</label><br>
                            <input type="text" name="t1" autocomplete="off"><br><br>
                            <input type="text" name="t2" autocomplete="off"><br><br>
                            <input type="text" name="t3" autocomplete="off"><br><br>
                            <input type="text" name="t4" autocomplete="off"><br><br>
                            <input type="text" name="t5" autocomplete="off"><br>
                        </div>
                        <div class="col-md-3">
                            <label>Debugging</label><br>
                            <input type="text" name="d1" id="dbg-in" autocomplete="off"><br><br><br>
                            <label>E-poster</label><br>
                            <input type="text" name="e1" autocomplete="off"><br><br><br>
                            <label> Shortcut Tricks</label><br>
                            <input type="text" autocomplete="off" name="s1"><br>
                        </div>
                        <div class="col-md-3">
                            <label>Quiz </label><br>
                            <input type="text" name="q1" autocomplete="off"><br><br>
                            <input type="text" name="q2" autocomplete="off"><br><br><br><br>

                            <label>E-Advertisement</label><br>
                            <input type="text" name="ad1" autocomplete="off"><br><br>
                            <input type="text" name="ad2" autocomplete="off"><br><br>
                        </div>
                        <label class="col-md-5"></label>
                        <button class="col-md-2 btn btn-success" id="submit" type="button">Submit</button>
                    </div>
                </div>
                <hr>
        </form>
    </div>
    </div><br>
    <script src="../js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#loading').hide();
        });
        $('#submit').click(function() {
            var clg = $("#college").val();
            var mail = $("#mail").val();
            if (clg == "" || mail == "") {
                $('.bdy').css('opacity', '1');
                $("#submit").attr("disabled", false);
                swal("Warning", "Fill the College Details", "warning");
            } else {
                $("#submit").attr("disabled", true);
                $('.bdy').css('opacity', '0.4');
                var np = $('#tn').val();
                if (np < 16) {
                    if ($.isNumeric(np)) {
                        var dept = $("#dept").val();
                        if (dept == "0") {
                            $('.bdy').css('opacity', '1');
                            $("#submit").attr("disabled", false);
                            swal("Warning", "Choose the Department", "warning");
                        } else {
                            $('#loading').show();
                            $.ajax({
                                type: "post",
                                url: "register.php",
                                data: $("#frm").serialize(),
                                success: function(data) {
                                    $('.bdy').css('opacity', '1');
                                    $("#submit").attr("disabled", false);
                                    $('#loading').hide();
                                    if (data == 'exist') {
                                        swal("Warning", "Already Registered !", "warning");
                                    } else if (data == 'mail') {
                                        swal("Warning", "Already Registered Mail !", "warning");
                                    } else if (data == 'inmail') {
                                        swal("Warning", "Invaild Mail Id !", "warning");
                                    } else if (data == 'mail') {
                                        swal("Warning", "Already Registered Mail !", "warning");
                                    } else if (data == 'success') {
                                        swal("Welcome", "Registerd Successfully", "success");
                                        $("#frm")[0].reset();
                                        window.location.href = 'complete.php';
                                    } else if (data == 'failed') {
                                        swal("Warning", "Registered failed !!", "error");
                                    } else {
                                        swal("Warning", "Fill the All College Details !!", "warning");
                                    }
                                }
                            });
                        }
                    } else {
                        $('.bdy').css('opacity', '1');
                        $("#submit").attr("disabled", false);
                        swal("Warning", "No of Participants Number Only!", "warning");
                    }
                }
                else
                {
                    $('.bdy').css('opacity', '1');
                    $("#submit").attr("disabled", false);
                    swal("Warning", "Maximum 15 Participants Only!", "warning");
                }
            }
        });
    </script>
    <script src="../js/home.js"></script>
</body>

</html>