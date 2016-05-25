<?php 
session_start();

if(isset($_SESSION['id'])) {
	$username = $_SESSION['username'];
} else {
	header('Location: index.php');
	die();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Secret</title>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<div class="container"><br>
		<div class="well">

			<!-- Logout -->
			<form action="logout.php">
				<input class="btn btn-lg btn-primary btn-block" type="submit" value="Logout"> </input>
			</form>
			<!-- End Logout -->
		</div>
	

	</div>
</body>
</html>