<?php	

		include 'userinfo.php';
		$id= $_GET['id'];
		$deletequery="delete * from cakes where CakeID='$id';";
		$query=mysqli_query($con, $deletequery);
		if($query){
			?>
			<script>
				alert("Row successfully Deleted");
			</script>
			<?php
		}
		header('location:display1.php');

?>