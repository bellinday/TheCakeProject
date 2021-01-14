<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	
        <link rel="stylesheet" type="text/css" href="style.css">
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	  	<!--font awesome -->
	  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<title>	Just Cakes</title>
</head>

<body>
	<?php include 'menu.php'  ?>
    <br>
    <style>
    	.center-div{
				width:90%; height: 80vh;
				background: -webkit-linear-gradient(left, powderblue, #00c6ff);
				padding: 20px 0 0 0;
				box-shadow: 0 10px 20px 0 rgba(0,0,0,.03);
				border-radius: 10px;
			}
		.main-div{
				width:100%; 
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				min-height: 0px;
				max-height: 300px;
			}
	</style>

    <h1 class="text-center text-danger mb-5" 
			style="font-family: 'Abril Fatface', cursive;"> CART Data</h1>


    <div class="main-div">
			
		<div class="center-div">
			<div class="table-responsive">
				<table>
					<thead>
						<tr>
							<th>Cake Name</th>
							<th>Cost(1kg)</th>
							<th>weight</th>
							<th>Delete Item</th>
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
									<td><?php echo $row['CakeName']; ?></td>
									<td><?php echo $row['Description']; ?></td>
									<td><?php echo $row['Price']; ?></td>
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

		<div class="main-div">			
			<div class="center-div">
			</div>
		</div>

	</div>

	

		<script>
			$(document).ready(function(){
					$('[data-toggle="tooltip"]').tooltip();
			});
		</script> 








    


    <br>
    <button type="submit" class="btn btn-success" name="PayNow">Pay Now</button>    	
    <?php include 'insert2db.php' ;
    	if(isset($_POST['PayNow']))
    	{
    		?>
	    		<script>
					alert("Payment Complete! order will be delivered to you.");
				</script>
	    	<?php
	    	include 'logout.php';
    	}
	?>
		
</body>

</html>
<?php

?>