<?php
session_start();
require"connect.php";
$sql = "SELECT post_title, post_author, post_id FROM forum_post";
if($query = $db->prepare($sql)){
	$query->bind_result($p_title, $p_auth, $p_id);
	$query->execute();
	$query->store_result();
}else{
	echo $db->error;
}
?>

<html>
<head>
	<title>Forum/Web - Home</title>
	<meta name="description" content="Forum/Web test">
	<meta name="keywords" content=" ">
	<meta name="Author" content="CodedGuy and alexanderjoe">
		
	<link rel="stylesheet" href="../css/index.css" type="text/css" media="screen">
	<link rel="stylesheet" href="./inc/css/bootstrap.min.css">
	<link rel="stylesheet" href="./inc/css/work.css">
		
	<link rel="stylesheet" href="http://dreamcraft56.com/over/css/font-awesome/css/font-awesome.css" type="text/css" media="screen">
	<link rel="stylesheet" href="http://dreamcraft56.com/over/css/font-awesome/css/font-awesome.min.css" type="text/css" media="screen">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
</head>
<body>
	<div class="container">
	<!-- NAVBAR START -->
		<div class="navbar">
			<a href="#" id="logo">
				Forum/Web
			</a>
			<div id="right">
			<a href="/Forum-Web">
				<i class="fa fa-home"></i>
					Home
				</a>
				<a href="/Forum-Web/forums">
					<i class="fa fa-comments"></i>
					Forums
				</a>
			</div>
		</div>
	<!-- NAVBAR END -->
	<!-- CONTENT START -->
	<h3 align="center"><b>Recent posts</b></h3>
		<div class="well" style="float:right; width:85%;">
			<?php 
			if($query->num_rows !==0);
			while($row = $query->fetch());?>
		
			<div class="post"><a href="forum.php?id=<?php echo $p_id?>"> <?php echo $p_title?></a><span style="color: red;"> 
			<br><?php echo "posted by:";?></span> <?php echo $p_auth?></div><hr>

		</div>
		<div class="sidebar" style="float: left;">
			<?php include"sidebar.php"; ?>
		</div>
	<!-- CONTENT END -->
	<!-- START FOOTER -->
		<br>
		<div class="footer"><b>Forum/Web INC. &copy; 2016</b></div>
		<br>
	<!-- END FOOTER-->
	</div>
</body>
</html>