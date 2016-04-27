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
	<title>Fourm System</title>
	<link rel="stylesheet" href="./inc/css/bootstrap.min.css">
	<link rel="stylesheet" href="./inc/css/work.css">
</head>

<body>
<div class="container">

	<br><div class="jumbotron">
	<h1><span color="fdfdfdfd">Forums</span></h1>
	</div>
	<h3 align="center"><b>Recent posts</b></h3>
	<div class="well" style="float:right; width:85%;">
	<?php 
	if($query->num_rows !==1);
	while($row = $query->fetch());?>
		
		<?php include"post.php" ?>

	</div>
		<div class="sidebar" style="float: left;">
		<?php include"sidebar.php"; ?>
		</div>
</div>
</body>
</html>