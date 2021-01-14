<!-- reaches here using the Home link on navigation bar/ after login -->
<?php
	session_start();
	//here u can access $_SESSION['CustName']... any session variables from index.php

	if(!isset($_SESSION['CustName'])){
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html>

	<head>

		<title>Just Cakes </title>
		<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	
        <link rel="stylesheet" type="text/css" href="style.css">
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	  	
        <meta name="description" content="This is the description">
        <script src="javastuff.js" async></script>
	  
	</head>

	<body>
		<?php include 'menu.php'  ?>
        <br>

        <?php include 'shopcart.php'  ?>
		


        <br>
        <footer class="main-footer">
            <div class="container main-footer-container">
                <h3 class="band-name">JUST CAKES</h3>
                <p1>Please visit the ABOUT page for more details about the Custom cakes</p1>
                <ul class="nav footer-nav">
                    <li>
                        <a href="https://www.instagram.com" target="_blank">
                            <img src="Images/tr-ig.png">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com" target="_blank">
                            <img src="Images/twt.png">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com" target="_blank">
                            <img src="Images/logo-facebook-512.png">
                        </a>
                    </li>
                </ul>
            </div>
        </footer>

	</body>

</html>