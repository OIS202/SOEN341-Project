<?php 
	session_start();
	if(!isset($_SESSION['user'])){
		header("location: loginpage.php");	exit();
	}

	if(isset($_GET['logout'])){
		unset($_SESSION['user']);
		header("location: loginpage.php");	exit();
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link rel="stylesheet" href="styles.css">
	<title>User account</title>
</head>
<body>

	<div class="content">
		<header>
			<h2>Welcome <?php echo $_SESSION['user']; ?><h2>
			<a href="?logout">Log out</a>	
		</header>

		<main>
			<h3>Some user actions ......</h3>
		</main>
	</div>

</body>
</html>