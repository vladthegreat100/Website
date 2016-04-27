<?php
session_start();
require"connect.php";
$sql = "SELECT post_title, post_author, post_id, post_body FROM forum_post";
if($query = $db->prepare($sql)){
	$query->bind_result($p_title, $p_auth, $p_id, $p_body);
	$query->execute();
	$query->store_result();
}else{
	echo $db->error;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Post <?php echo $_GET['id']?></title>
	<link rel="stylesheet" href="./inc/css/bootstrap.min.css">
</head>

<body>

<br><div class="container">
	<div class="jumbotron"><h3>Author: <?php echo $p_auth?></h3> </div>
</div>
<?php 
$sql = "SELECT ";
?>
</body>
</html>