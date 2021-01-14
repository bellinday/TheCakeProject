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
			

			<h2>Registered Customers</h2>
			<div class="center-div">
				<div class="table-responsive">
					<table>
						<thead>
							<tr>
								<th>Customer ID</th>
								<th>Customer Name</th>
								<th>Customer Mail ID</th>
								<th>Phone number</th>
								<th>Delivery Date</th>
								<th>Delivery Address</th>
								<th colspan="2">Operation</th>
							</tr>
						</thead>

						<tbody>
							<?php
								include 'userinfo.php';
								$selectquery= "select * from Customer;";
								$query=mysqli_query($con, $selectquery);

								$nums=mysqli_num_rows($query); //no. of rows

								$res=mysqli_fetch_array($query); 
								//while($nums)
								$i=1;
								while($i<$nums)
								{
									$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
									//printf ("<br>%s (%s)\n", $row["CakeName"], $row["Price"]);
									?>

									<tr>
										<td><?php echo $row['CustID']; ?></td>
										<td><?php echo $row['CustName']; ?></td>
										<td><?php echo $row['CustMail_ID']; ?></td>
										<td><?php echo $row['CustPhone']; ?></td>
										<td><?php echo $row['DelDate']; ?></td>
										<td><?php echo $row['DelAddress']; ?></td>

										<td><i class="fa fa-edit" aria-hidden="true"></i></td>
										<td><i class="fa fa-trash" aria-hidden="true"></i></td>
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

								$res=mysqli_fetch_array($query); 
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
										<td><i class="fa fa-edit" aria-hidden="true"></i></td>
										<td><i class="fa fa-trash" aria-hidden="true"></i></td>
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

	</body>
</html>