<?php

$con = mysqli_connect('localhost', 'root', '', 'belmic');

if($con){
	//echo "Connection successful";
}
else{
	?>
	<script>
		alert("Connection Failed");
	</script>
	<?php
}

mysqli_select_db($con, "belmic");

/*$user=$_POST['user'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];

$query = "insert into Customer(CustName, CustMail_ID, CustPhone, Password) values ('$user', '$email', '$mobile', '$password');";
mysqli_query($con, $query);*/
//header('location:index.php')


?>