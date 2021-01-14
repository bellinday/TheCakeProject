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
						You are authorised to insert to the Menu if need be.</p><p> You must be the manager. </p>
					<a href="display1.php">Check form</a><br>					
				</div>

				<div class="col"-md-9 register-right>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<br><br><br>
							<h1 class="register-heading">Add cakes to Menu in Home-Page</h1>
							<form action="" method="POST">
								<div class="row register-form">

									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="enter cake name *" name="CakeName" value="" required/>
										</div>										
									

										<div class="form-group">
											<input type="text" class="form-control" placeholder="enter description of cake *" name="Description" value="" required/>											
										</div>	

										<div class="form-group">
											<input type="text" class="form-control" placeholder="enter link for the image in Images folder *" name="image" value="" required/>											
										</div>	

										<div class="form-group">
											<input type="text" class="form-control" placeholder="enter Cost of 1 kg *" name="Price" value="" required/>											
										</div>		

										<input type="submit" class="btnRegister" name="submit" value="Insert">

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
	include 'userinfo.php';

	if (isset($_POST['submit'])){
		$name=$_POST['CakeName'];
		$desc=$_POST['Description'];
		$piclink=$_POST['image'];
		$cost=$_POST['Price'];
		
		$insertquery="INSERT INTO cakes(CakeName, Description, Price, image) VALUES ('$name','$desc','$cost','$piclink')";
		$res=mysqli_query($con, $insertquery);
		if($res){
			?>
				<script>
					alert("Row Inserted");
				</script>
			<?php
		}else{
			?>
			<script>
				alert("Data not inserted");
			</script>
			<?php
		}
	}
?>