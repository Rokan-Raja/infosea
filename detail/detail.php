<?php

?>
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

		#text {
			display: none;
		}
	</style>
</head>

<body>
	<div class="container">
	    <div class="table-responsive">
		<table id="mytable" class="table table-bordered">
			<thead>
				<th>Lot Number</th>
				<th>College Name</th>
				<th>Department</th>
				<th>Staff Name</th>
				<th>Email</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
				include_once('../db/connect.php');
				$clg = "";
				$dept = "";
				$clg = $_POST['clg'];
				$dept = $_POST['dept'];
				if (!$clg=='0') {
					$sql = "SELECT * FROM clg_info where clg_name='$clg'";
				}
				else if(!$dept==0)
				{
				$sql = "SELECT * FROM clg_info where dept='$dept'";
				}
				else
				{
				 $sql = "SELECT * FROM clg_info";   
				}
				$query = $con->query($sql);
				while ($row = $query->fetch_assoc()) {
				?>
					<tr>
						<td><?php echo $row['lot_no']; ?></td>
						<td><?php echo $row['clg_name']; ?></td>
						<td><?php echo $row['dept']; ?></td>
						<td><?php echo $row['staff_name']; ?></td>
						<td><?php echo $row['mail']; ?></td>
						<td>
							<button class="btn btn-primary mb-2" onclick="print(<?php echo $row['lot_no']; ?>)">Print</button>
							<button class="btn btn-primary" onclick="remove(<?php echo $row['lot_no']; ?>)">Delete</button>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		</div>
	</div>
	<br>
	<br>
	<script src="../js/jquery.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../datatable/jquery.dataTables.min.js"></script>
	<script src="../datatable/dataTable.bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
		    $('#mytable').DataTable();
			$('#loading').hide();
		});

		function remove(lot) {
			if (confirm("Are You Sure to Delete !!")) {
				$('#loading').show();
				$.post("delete.php", {
					lot_no: lot
				}, function(data) {
					if (data == 'success') {
						$('#loading').hide();
						swal("Warning", "Delete Successfully", "success");
					} else {
						$('#loading').hide();
						swal("Information", "Delete Failed", "error");
					}
				})
			} else {
				$('#loading').hide();
				swal("Information", "Delete Cancelled", "success");
			}
		}

		function print(lot) {
			$.post("pdfcreate.php", {
				lotnumber: lot
			}, function(data) {
				swal("Information", "Pdf Created", "success");
				window.location.href='pdf.php';
			})
		}
	</script>
</body>

</html>