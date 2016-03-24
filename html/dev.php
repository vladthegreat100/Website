<!DOCTYPE html>
<html>
<head>
	<title>404 - Error</title>
	<meta name="description" content="OverrideNetwork Test">
	<meta name="keywords" content=" ">
	<meta name="Author" content="CodedGuy and alexanderjoe">
		
	<link rel="stylesheet" href="http://dreamcraft56.com/over/css/style.css" type="text/css" media="screen">
		
	<link rel="stylesheet" href="http://dreamcraft56.com/over/css/font-awesome/css/font-awesome.css" type="text/css" media="screen">
	<link rel="stylesheet" href="http://dreamcraft56.com/over/css/font-awesome/css/font-awesome.min.css" type="text/css" media="screen">

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
				<a href="#">
					<i class="fa fa-home"></i>
					Inicio
				</a>
				<a href="#">
					<i class="fa fa-comments"></i>
					Foro
				</a>
				<a href="#">
					<i class="fa fa-shopping-cart"></i>
					Tienda
				</a>
				<a href="#">
					<i class="fa fa-user"></i>
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
					<?php
						include_once 'inc/status.class.php'; //include the class
						$status = new MinecraftServerStatus(); // call the class
						$response = $status->getStatus('mc.overridenetwork.net');
						if(!$response) {
    						echo"The Server is offline!";
						} else {
   							echo "<b>Server name: OverrideNetwork</b>";
   							echo "<br><b>Version: ".$response['version']."</b>";
   							echo "<br><b>IP: mc.overridenetwork.net</b>";
   							echo "<br><b>Online: ".$response['players']."/".$response['maxplayers']."</b>";
   							echo "<br><b>PING: ".$response['ping']."</b>";
						}
					?>
					<!-- Server status by https://github.com/FunnyItsElmo/PHP-Minecraft-Server-Status-Query/ -->	
			</div>	
		</div>
		<!-- END SERVER STATUS -->
	</div>
</body>
</html>