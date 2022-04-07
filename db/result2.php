<?php
include('log_judge.php')
?>
<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../customs/custom.css">
	<link rel="stylesheet" href="../customs/loader.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../datatable/dataTable.bootstrap.min.css">
	<title>Infosea</title>
</head>

<body>
	<center>
		<div class="loader"></div>
	</center>
	<style>
		body {
			background-image: url(../SUN1.png);
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
	include('../loader.php');
	?>
	<img src="../POSTER.png" class="img-fluid"></img>
	<?php
	include("connect.php");
	?>
	<div class="container sm-container-fluid">
		<h2>View Results</h2>
		<?php
		$event = 'quiz';
		$sql = "SELECT * FROM finalmark WHERE event_name='$event'";
		$resultset = mysqli_query($con, $sql) or die("database error:" . mysqli_error($con));
		?>
		<div class="mb-3 col-md-6 col-sm-12">
			<div class="row">
				<table id="mytable" class="table table-light">
					<thead>
						<tr>
							<th>Lot No</th>
							<th>Event_name</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($rows = mysqli_fetch_assoc($resultset)) {
						?>
							<tr>
								<td contenteditable="true" data-old_value="<?php echo $rows["lotno"]; ?>" onBlur="saveInlineEdit4(this,'lotno','<?php echo $rows["id"]; ?>')"><?php echo $rows["lotno"]; ?></td>
								<td contenteditable="true" data-old_value="<?php echo $rows["event_name"]; ?>" onBlur="saveInlineEdit4(this,'event_name','<?php echo $rows["id"]; ?>')"><?php echo $rows["event_name"]; ?></td>
								<td contenteditable="true" data-old_value="<?php echo $rows["total"]; ?>" onBlur="saveInlineEdit4(this,'total','<?php echo $rows["id"]; ?>')"><?php echo $rows["total"]; ?></td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<center>
		<button id="exit" class="btn btn-primary">Finish</button>
	</center>
	<br>
	<footer>
		<div class="container-fluid">
			<h1 class="text-center">Department of Computer Applications</h1>
			<center>
				<img class="img-fluid" src="../bcalogo2.png"></img>
				<p>© Copyrights Reserved in 2021-<?php echo date('Y'); ?></p>
			</center>
			<marquee scrollamount='4'>Department of Computer Applications App Created By Students.</marquee>
		</div>
	</footer>
	<script src="../js/jquery.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../datatable/jquery.dataTables.min.js"></script>
	<script src="../datatable/dataTable.bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#mytable").DataTable();
			$(".loader").remove();
		});
		$("#exit").click(function() {
			if (confirm('Are you sure to Complete')) {
				$.ajax({
					url: "exit.php",
					type: 'post',
					success: function(data) {
						if (data == "success") {
							window.location.href = "../index.php";
						}
					}
				});
			} else {
				alert('Continue');
			}
		});
	</script>
	<script type="text/javascript" src="../js/function4.js"></script>
</body>

</html>