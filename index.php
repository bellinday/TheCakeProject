<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name=”viewport” content="width=device-width", initial-scale="1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<title>Just Cakes</title> 
	<style>
		.button {
		  background-color: #4CAF50; /* Green */
		  border: none;
		  color: white;
		  padding: 10px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
		  margin: 4px 2px;
		  cursor: pointer;
		}
		.button1 {border-radius: 4px;}
	</style>	
	<style>
		body {
		  margin: 0;
		}

		/* Style the header */
		.header {
		  background-color: #f1f1f1;
		  padding: 20px;
		  text-align: center;
		}
		
		.topnav a {
		  float: left;
		  display: block;
		  color: black;
		  text-align: center;
		  padding: 15px 25px;
		  text-decoration: none;
		}	
		table {
			  border-collapse: separate;
			  border-spacing: 50px 30px;
		}

		.transbox {
			opacity: 0.3;
			color: black;
		}

		td {
			padding: 30px 0;
			color: black;
		}	
	</style>
</head>

<body style="background-image: url('Images/Background2.png'); "> 
	<!-- <div class="topnav">
	  <a href="Page2.php"><button class="button button1">Log In</button></a>
	  <a href="homepg.html"><button class="button button1">Sign Up</button></a>
	</div> -->

		<br>		<br>

	<?php
		include 'userinfo.php';
		if(isset($_POST['signup'])) //checking if SIGN UP has been clicked
		{
			$user=$_POST['user'];
			$email=$_POST['email'];
			$mobile=$_POST['mobile'];
			$password=$_POST['password'];

			$emailquery="select * from customer where CustMail_ID='$email'";
			$query=mysqli_query($con, $emailquery);

			$emailcount=mysqli_num_rows($query); 
		
			if($emailcount>0)
			{
				?>
				<script>
					alert("email already exists. Log In.");
				</script>
				<?php

			} else{
				$insertquery="insert into Customer(CustName, CustMail_ID, CustPhone, Password) values ('$user', '$email', '$mobile', '$password');";
				$iquery=mysqli_query($con, $insertquery);
			}
		}
		
	?>

	<?php
		include 'userinfo.php';
		if(isset($_POST['login'])) //checking if LOG IN has been clicked 
		{
			$emailid=$_POST['logemail'];
			$password=$_POST['logpassword'];

			$email_search="select CustName, password from customer where CustMail_ID='$emailid';";
			$query=mysqli_query($con, $email_search);

			$emailcount=mysqli_num_rows($query); //will be 0 if mailID is not found, else 1 		

			if($emailcount){
				$email_pass=mysqli_fetch_assoc($query);

				$realpassword=$email_pass["password"];

				$_SESSION['CustName']=email_pass['CustName'];

				$pass_check=password_verify($password, $realpassword);

				if($password==$realpassword){
					echo "login successful";
					?>
					<script>
						location.replace("homepg.php");
					</script>
					<?php
					

				}else{
					?>
					<script>
						alert("Wrong Password");
					</script>
					<?php
				}
				
			} 
			else
			{
					$admin_search="select AdName, AdPword from admin where admin_ID=1;";
					$query2=mysqli_query($con, $admin_search);
					$adcount=mysqli_num_rows($query2);
					if($adcount)
					{
						$ad_pass=mysqli_fetch_assoc	($query2);
						$root_pass=$ad_pass["AdPword"];
						$_SESSION['AdPword']=$ad_pass['AdPword'];
						$pass_check=password_verify($password, $root_pass);
						if($password==$root_pass){
							echo "login successful";
							?>
							<script>
								location.replace("admin.php");
							</script>
							<?php
						}
					}
					else{





					?>
					<script>
						alert("Wrong Email ID");
					</script>
					<?php
					}
			}

		}
	?>

	<div class="w-50 m-auto">
	<table>
		<tbody>

			<!--Sign In Form Code-->
			<td>
				<div> <!--to make the text input box in the center of the pg-->
					<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
						<div class="form-group">
							<label><strong>Username</strong></label>
							<div class= transbox><input type="text" name="user" autocomplete="off" class="form-control"></div>
						</div>
						<div class="form-group">
							<label><strong>Email ID</strong></label>
							<div class= transbox><input type="text" name="email" autocomplete="off" class="form-control" type="email"></div>
						</div>
						<div class="form-group">
							<label><strong>Phone Number</strong></label>
							<div class= transbox><input type="text" name="mobile" autocomplete="off" class="form-control"></div>
						</div>
						<div class="form-group">
							<label><strong>Password</strong></label>
							<div class= transbox><input type="text" name="password" autocomplete="off" class="form-control"></div>
						</div>

						<button type="submit" class="btn btn-success" name="signup">Sign Up</button>
					</form>
				</div>
			</td>
			<td></td>

			<!--Log In Form Code-->
			<td>
				<div > <!--to make the text input box in the center of the pg-->
					<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">						
						<div class="form-group">
							<label><strong>Email ID</strong></label>
							<div class= transbox><input name="logemail" type="text" placeholder="enter mail ID" autocomplete="off" type="email" class="form-control" required></div>
						</div>
						
						<div class="form-group">
							<label><strong>Password</strong></label>
							<div class= transbox><input type="text" placeholder="enter password" autocomplete="off" name="logpassword" class="form-control"></div>
						</div>

						<!-- <a href= "homepg.php"><button type="submit" class="btn btn-success" name="login">Log in</button></a> -->
						<button type="submit" class="btn btn-success" name="login">Log in</button>
					</form>
				</div>
			</td>
		</tbody>
	</table>
	</div>
	
	
</body>
</html>