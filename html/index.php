<!DOCTYPE html>
<html>
<head>
	<title>OverrideNetwork - Home</title>
	<meta name="description" content="OverrideNetwork Home">
	<meta name="keywords" content=" ">
	<meta name="Author" content="CodedGuy and alexanderjoe">
	<meta name="viewport" content="width=800">
		
	<link rel="stylesheet" href="./css/index.css" type="text/css" media="screen">
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		
	<link rel="stylesheet" href="./css/font-awesome.css" type="text/css" media="screen">
	<link rel="stylesheet" href="./css/font-awesome.min.css" type="text/css" media="screen">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
</head>
<body>
	<div class="container">
		<!-- NAV -->
			<?php include"./inc/nav.php"; ?>
		<!-- END NAV -->
		<div class="silder"> </div>
		
		<!-- SERVER STATUS -->
		<div class="right-box">
			<div class="box">
				<div id="title">Server status</div>
					<p>
					<?php
						include_once 'inc/status.class.php'; //include the class
						$status = new MinecraftServerStatus(); // call the class
						$response = $status->getStatus('mc.overridenetwork.net');
						if(!$response) {
    						echo"The Server is offline!";
						} else {
   							echo "Server name: OverrideNetwork";
   							echo "<br>Version: ".$response['version'];
   							echo "<br>IP: mc.overridenetwork.net";
   							echo "<br>Online: ".$response['players']."/".$response['maxplayers'];
						}
					?>
					</p>
					<!-- Server status by https://github.com/FunnyItsElmo/PHP-Minecraft-Server-Status-Query/ -->	
			</div>	
			<br>	
		</div>
		<!-- END SERVER STATUS -->
		<!-- FOOTER -->
			<?php include"./inc/footer.php"; ?>
		<!-- END FOOTER -->
	</div>
</body>
</html>