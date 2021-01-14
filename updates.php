<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>

<html lang="en">
	<head>

	  <title>JustCakes Admin</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width" initial-scale="1.0">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	  <link rel="stylesheet" href="styling.css">
	  	
	</head>

	<body>

		<div class="container register">
			<div class="row">
				<div class="col-md-3 register-left">
					<img src="Images/Logo.png" alt=""/>
					<h3>Welcome</h3>
					<p>
						You are authorised to edit the tables if need be.</p><p> You must be the manager. </p>
					<a href="display1.php">Check form</a><br>					
				</div>

				<div class="col"-md-9 register-right>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<br><br><br>
							<h1 class="register-heading">Add cakes to Menu in Home-Page</h1>
							<form action="" method="POST">
								<div class="row register-form">

									<?php
											include 'userinfo.php';

											$ids=$_GET['id'];
											$showquery= "select * from cakes where CakeID=$ids;";
											$showdata=mysqli_query($con, $showquery); //returns in array form
											$arrdata=mysqli_fetch_array($showdata);	

											if (isset($_POST['submit']))
											{
												$idupdate=$_GET['id'];

												$name=$_POST['CakeName'];
												$desc=$_POST['Description'];
												$piclink=$_POST['image'];
												$cost=$_POST['Price'];

												$updatequery="update cakes set CakeID='$ids', CakeName='$name', description='$desc', price='$cost' where CakeID='$idupdate';";


												$res=mysqli_query($con, $updatequery);
												if($res){
													?>
														<script>
															alert("Row Updated");
														</script>
													<?php
												}
												else{
													?>
													<script>
														alert("Row not updated");
													</script>
													<?php
												}
											}
									?>

									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="enter cake name *" name="CakeName" value="<?php echo $arrdata['CakeName'];?>" required/>
										</div>										
									

										<div class="form-group">
											<input type="text" class="form-control" placeholder="enter description of cake *" name="Description" value="<?php echo $arrdata['Description']; ?>" required/>											
										</div>	

										<div class="form-group">
											<input type="text" class="form-control" placeholder="enter link for the image in Images folder *" name="image" value="<?php echo $arrdata['image']; ?>" required/>											
										</div>	

										<div class="form-group">
											<input type="text" class="form-control" placeholder="enter Cost of 1 kg *" name="Price" value="<?php echo $arrdata['Price']; ?>" required/>											
										</div>		

										<input type="submit" class="btnRegister" name="submit" value="Update">

									</div>
									
								</div>
								
							</form>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
		</div>

	</body>
	<footer>
		  	<button type="button"><a href="admin.php">Form Insertion</a></button>
		  	<button type="button"><a href="display1.php">Cakes data</a></button>
		  	<button type="button"><a href="display2.php">Customer data</a></button>
		  	<button type="button" name="logout"><a href="logout.php">Log Out</a></button>
	</footer>
</html>



<?php

?>