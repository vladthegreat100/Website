<!DOCTYPE html>
<html>
<head>
	<title>OverrideNetwork - Home</title>
	<meta name="description" content="OverrideNetwork Home">
	<meta name="keywords" content=" ">
	<meta name="Author" content="CodedGuy and alexanderjoe">
		
	<link rel="stylesheet" href="./css/index.css" type="text/css" media="screen">
		
	<link rel="stylesheet" href="./css/font-awesome.css" type="text/css" media="screen">
	<link rel="stylesheet" href="./css/font-awesome.min.css" type="text/css" media="screen">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
</head>
<body>
	<div class="container">
		<!-- NAV -->
		<div class="navbar">
			<a href="#" id="logo">
				OverrideNetwork
			</a>
			<div id="right">
				<a href="http://overridenetwork.net/">
					<i class="glyphicon glyphicon-home"></i>
					Home
				</a>
				<a href="http://overridenetwork.net/forums/">
					<i class="glyphicon glyphicon-book"></i>
					Forums
				</a>
				<a href="http://shop.overridenetwork.net/">
					<i class="glyphicon glyphicon-shopping-cart"></i>
					Shop
				</a>
				<a href="http://overridenetwork.net/404.php">
					<i class="glyphicon glyphicon-stats"></i>
					Stats
				</a>
			</div>
		</div>
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
			<div class="footer"><span style="color:#27303a;font-size: 12pt;"> Override Network &copy; 2016</span></div>
		<!-- END FOOTER -->
	</div>
</body>
</html>