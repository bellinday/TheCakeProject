<!DOCTYPE html>
<html>
	<head>
		<title> JustCakes Admin</title>
		<meta charset="utf-8">
		  <meta name="viewport" content="width=device-width" initial-scale="1.0">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" crossorigin="anonymous">

		  <link rel="stylesheet" href="styling.css">

	</head>

	<body>
		<div class="main-div">
			<h2> Cakes Menu Table</h2>
			<div class="center-div">
				<div class="table-responsive">
					<table>
						<thead>
							<tr>
								<th>id</th>
								<th>Cake Name</th>
								<th>Description</th>
								<th>Cost(1kg)</th>
								<th>Image Link</th>
								<th colspan="2">Operation</th>
							</tr>
						</thead>
						<tbody>

							<?php
								include 'userinfo.php';
								$selectquery= "select * from cakes;";
								$query=mysqli_query($con, $selectquery);

								$nums=mysqli_num_rows($query); //no. of rows
								$i=1;
								while($i<$nums)
								{
									$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
									//printf ("<br>%s (%s)\n", $row["CakeName"], $row["Price"]);
									?>

									<tr>
										<td><?php echo $row['CakeID']; ?></td>
										<td><?php echo $row['CakeName']; ?></td>
										<td><?php echo $row['Description']; ?></td>
										<td><?php echo $row['Price']; ?></td>
										<td><?php echo $row['image']; ?></td>
										<td><a href="updates.php?id=<?php echo $row['CakeID']; ?>" data-toggle="tooltip" data-placement="top" title="Update"> <i class="fa fa-edit" aria-hidden="true"></i></a></td>
										<td><a href="deletes.php?id=<?php echo $row['CakeID']; ?>" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="fa fa-trash" aria-hidden="true"></i></a></td>
									</tr>

									<?php

									$i++;
								}
							?>							
						</tbody>						
					</table>				
				</div>
			</div>
			<br>


			<h2>Price Increase with weight of Cake</h2>
			<div class="center-div">
				<div class="table-responsive">
					<table>
						<thead>
							<tr>
								<th>Weight</th>
								<th>Added Cost</th>
								<th colspan="2">Operation</th>
							</tr>
						</thead>

						<tbody>
							<?php
								include 'userinfo.php';
								$selectquery= "select * from priceinc;";
								$query=mysqli_query($con, $selectquery);

								$nums=mysqli_num_rows($query); //no. of rows

								//$res=mysqli_fetch_array($query); 
								//while($nums)
								$i=1;
								while($i<$nums)
								{
									$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
									//printf ("<br>%s (%s)\n", $row["CakeName"], $row["Price"]);
									?>
									<tr>
										<td><?php echo $row['Weight']; ?></td>
										<td><?php echo $row['Incr']; ?></td>	
										<!-- <td> <a href="#" data-toggle="tooltip" data-placement="top" title="Update">  <i class="fa fa-edit" aria-hidden="true"></i> </a> 
										</td>
										<td> <a href="#" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="fa fa-trash" aria-hidden="true"></i> </a> </td> -->
									</tr>

									<?php

									$i++;
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<script>
			$(document).ready(function(){
					$('[data-toggle="tooltip"]').tooltip();
			});
		</script> 

	</body>
	<footer>
		  	<button type="button"><a href="admin.php">Form Insertion</a></button>
		  	<button type="button"><a href="display1.php">Cakes data</a></button>
		  	<button type="button"><a href="display2.php">Customer data</a></button>
		  	<button type="button" name="logout"><a href="logout.php">Log Out</a></button>
	</footer>
</html>