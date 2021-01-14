<!DOCTYPE html>
<html>
	<head>
		<title></title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Dancing+Script" rel="stylesheet">
	</head>
	<body class="container-fluid">
		<br><br>
	
		<div class="row">	
	
		<?php
	
				$con=mysqli_connect('localhost', 'root', '');
				mysqli_select_db($con, 'belmic');
		
				if(!$con)
				{
					//echo "Connecction successful";
				//}else{
					echo "Connection unsuccessful";
				}
		
				$query="select CakeName, Description, image, price from cakes order by cakeID;";
				$queryfire=mysqli_query($con, $query);

				$query2="select * from Orders order by CustId;";
				$queryfire2=mysqli_query($con, $query2);
		
				$num = mysqli_num_rows($queryfire);
				if($num)
				{
					while($product=mysqli_fetch_array($queryfire))
					{
						$orderdata=mysqli_fetch_array($queryfire2);
						//print_r($product);
						?>
						<div class="col-lg-3	col-md-3	col-sm-12" >	

							<form>	
								<div class="card ">	

									<h6 class="card-title bg-info text-white p-2 ">  <?php echo $product['CakeName']; ?> </h6>
									<div class="card-body">	
										<img src="<?php echo $product['image']; ?>" alt="phone" class="img-fluid mb-2"/>						

										<!-- 
										<h6 class="card-body">  
												&#8377; <?php// echo $product['price'].".00"." | weight:"; ?>
										 
												<form method='post' action=''>
													<input type='hidden' name='CakeID' value="<?php echo $product["CakeID"]; ?>" />
													<input type='hidden' name='action' value="change" />
													<select name='quantity' class='quantity' onChange="this.form.submit()">
														<option <?php //if($orderdata["weight"]==1) echo "selected";?> value="1">1</option>
														<option <?php //if($orderdata["weight"]==2) echo "selected";?> value="2">2</option>
														<option <?php //if($orderdata["weight"]==3) echo "selected";?> value="3">3</option>
														<option <?php //if($orderdata["weight"]==4) echo "selected";?> value="4">4</option>
														<option <?php //if($orderdata["weight"]==5) echo "selected";?> value="5">5</option>
													</select>
												</form>
										</h6> 
										--> <br>



										<span>
											<?php echo $product['Description']; ?>
										</span>
									</div>
									<div class="">
										<button class="btn btn-success flex-fill">Add to Cart</button>
										<!-- <button class="btn btn-success">Add to Cart</button> -->
										
									</div>
									<br>
								</div>
							</form>
						</div>
						 <br>
						<?php			
					}
				}
		
			?>

		</div>
	</body>
</html>