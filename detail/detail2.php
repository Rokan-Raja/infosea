<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="alert.css">
	<script src="alert.js"></script>
	<link rel="stylesheet" type="text/css" href="../datatable/dataTable.bootstrap.min.css">
	<title>Details</title>
	<style>
		.disclaimer {
			display: none;
		}
	</style>
</head>

<body>
	<div class="container text-center">
		<button type="button" class="btn btn-primary" id="print">Print</button>
	</div>
	<div class="container">
		<div class="row">
			<table id="mytable" class="table table-bordered">
				<thead>
					<th>Lot Number</th>
					<th>Participant_Name</th>
					<th>Event Name</th>
				</thead>
				<tbody>
					<?php
					include_once('../db/connect.php');
					$event = $_POST['event'];
					$sql = "SELECT * FROM register_form";
					if (!empty($event)) {
						$sql = "SELECT * FROM register_form where event_name='$event'";
					}
					$query = $con->query($sql);
					while ($row = $query->fetch_assoc()) {
					?>
						<tr>
							<td><?php echo $row['lot_no']; ?></td>
							<td style="text-transform: capitalize;" contenteditable="true" data-old_value="<?php echo $row["participant_name"]; ?>" onBlur="saveInlineEdit(this,'participant_name','<?php echo $row["id"]; ?>')"><?php echo $row['participant_name']; ?></td>
							<td><?php echo $row['event_name']; ?></td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../datatable/jquery.dataTables.min.js"></script>
	<script src="../datatable/dataTable.bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#loading').hide();
			$('#mytable').DataTable();
		});
		$("#print").click(function() {
			var e = $("#event").val();
			if (e != 0) {
				$.post("pdfcreate2.php", {
					event: e
				}, function(data) {
					swal("Information", "Pdf Created", "success");
					window.location.href = 'pdf2.php';
				})
			} else {
				swal("Information", "Choose the Event and Print", "warning");
			}
		});
	</script>
	<script src="functions.js"></script>
</body>

</html>