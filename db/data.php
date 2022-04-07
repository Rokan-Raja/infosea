<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Construction Management</title>
	<style>
		.disclaimer{
			display: none;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container sm-container">
<div class="mb-3 col-md-6 col-sm-12">
<div class="container">
	<div class="row">
				<table class="table table-bordered">
					<thead>
						<th>Lot_No</th>
						<th>Event_name</th>
						<th>Total</th>
						<th>Price</th>
					</thead>
					<tbody>
						<?php
							include('connect.php');
                            $event=$_POST['event'];
							$sql = "SELECT * FROM finalmark WHERE event_name='$event' ORDER BY total DESC";
							$query = $con->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['lotno']."</td>
									<td>".$row['event_name']."</td>
									<td>".$row['total']."</td>
									<td id='pic'></td>
								</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<br>
</body>
</html>