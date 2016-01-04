<?php include 'config.php'; ?>
<?php 
if ($link = mysql_connect($Host, $Username, $Password)) {} else {
	echo "<br>DB CONNECT ... fail<br>";
}
if (mysql_select_db($DB_Name, $link)) { } else {
	echo "<br>DB SELECT ... fail<br>";
}

$search = $_GET["search"]; //substr($_SERVER['REQUEST_URI'], 1);
if($search == ""){
	header("Location: index.php");
	die();
}
$uuid = json_decode(file_get_contents("https://api.mojang.com/users/profiles/minecraft/".$search."?at=".time()), true)['id'];
?>
<html>
	<head>
		<title><?php echo $Title; ?></title>
		<link rel="shortcut icon" type="image/x-icon" href="img/ico.png">
		<link rel="stylesheet" href="style.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="language" content="deutsch, de">
		<meta name="viewport" content="initial-scale=0.5, width=device-width" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
		
	</head>
	<?php
	
	function calcTime($d1, $d2){
		$interval = $d2->diff($d1);
		if ( $v = $interval->d >= 1 ) return $interval->d.' d';
		if ( $v = $interval->h >= 1 ) return $interval->h.' h';
		if ( $v = $interval->i >= 1 ) return $interval->i.' min';
		return $interval->s.' sec';
	}
	
	?>
	<body>
		<div class="shadow" id="header">
			<span id="title" ><?php echo $msgTitle; ?></span>
			<form id="ban-search" method="get" action="search.php">
				<span><?php echo $msgSearch; ?> </span><input name="search" type="text" required><i onclick="document.getElementById('ban-search').submit();" class="whiteIco fa fa-search"></i>
			</form>
		</div>
		<br>
		<br>
		<br>
		<br>
		<div id="main">
			<div style="float: left;" id="borderd">
				<span style="font-size: 30px;">« <?php echo $search; ?> »</span><br/>
				<hr/>
				<img src="http://cravatar.eu/3d/<?php echo $search; ?>/200"/>
				<hr/>
				<?php 
					$sql="SELECT * FROM AdvancedBans WHERE name='".$uuid."' LIMIT 1";
					$result=mysql_query($sql,$link);
					if(mysql_num_rows($result)>0) {
						for($i=0;$i<mysql_num_rows($result);$i++) {
							$type = "";
							$d1 = new DateTime('NOW');
							$d2 = DateTime::createFromFormat('d.m.Y-H:i:s', mysql_result($result,$i,'until'));
							if(mysql_result($result,$i,'until') == "never"){
								$type = $msgPermaBanned;
							}else{
								$type = $msgTempBanned;
							}
							echo '<span style="color: red; font-size: 25px;">'.$type.'</span><br/>
								  <span style="font-size: 25px; color:orange;">'.$msgReason.'</span><br/>
								  <span style="font-size: 20px; color:#e5e5e5;">'.explode("#BannedBy#", mysql_result($result,$i,'reason'))[0].'</span><br/>';
								  
							if($BannedBy) echo '<span style="font-size: 25px; color:orange;">'.$msgBannedBy.'</span><br/>
								  <span style="font-size: 20px; color:#e5e5e5;">'.explode("#BannedBy#", mysql_result($result,$i,'reason'))[1].'</span><br/>';
							if($type == $msgTempBanned){
								echo '<span style="font-size: 25px; color:orange;">'.$msgRemaining.'</span><br/>
								  <span style="font-size: 20px; color:#e5e5e5;">'.calcTime($d1, $d2).'</span><br/>';
							}
						}
					}else{
						echo '
								<span style="color: green; font-size: 25px;">'.$msgNotBanned.'</span><br/>
							';
					} 
				?>
			</div>
			<div style="float: left;">
				<p id="borderd" width="400px" style="font-size:30px">Player-History </p>
				<style>
				th{
					font-size: 30px;
					text-align: left;
					width: 150px;
				}
				td{
					font-size: 20px;
				}
				</style>
				<table style="padding-top:0px; padding-left:20px;">
					<tr>
						<th><?php echo $msgTDate; ?></th>
						<th><?php echo $msgTType; ?></th>
						<th><?php echo $msgTEnding; ?></th>
						<?php if($BannedBy) echo '<th>'.$msgTBy.'</th>'; ?>
						<th><?php echo $msgTReason; ?></th>
					</tr>
					<?php 
					$sql="SELECT * FROM PlayerHistory WHERE uuid='".$uuid."' ORDER BY STR_TO_DATE(`PlayerHistory`.`start`, '%d.%m.%Y-%H:%i:%s') DESC LIMIT 50";
					$result=mysql_query($sql,$link);
					if(mysql_num_rows($result)>0) {
						for($i=0;$i<mysql_num_rows($result);$i++) {
							$type = "Temp-Ban";
							$ending = "-";
							$rlType = mysql_result($result,$i,'end');
							if($rlType == "BAN" OR $rlType == "KICK"){
								$type = $rlType;
							}else{
								$end = DateTime::createFromFormat('d.m.Y-H:i:s', mysql_result($result,$i,'end'));
								$ending = $end->format($DateFormat);
							}
						
							$date = DateTime::createFromFormat('d.m.Y-H:i:s', mysql_result($result,$i,'start'));
						
							echo '<tr>';
							echo '<td>'.$date->format($DateFormat).'</td>';
							echo '<td>'.$type.'</td>';
							echo '<td>'.$ending.'</td>';
							if($BannedBy) echo '<td>'.mysql_result($result,$i,'by').'</td>';
							echo '<td>'.mysql_result($result,$i,'reason').'</td>';
							echo '<tr>';
						}
					}else{
						echo '	</table>
								<span style="padding:20px; color:#FF6C59; font-size: 30px;">'.$msgNoHistory.'</span><br/>
								<table>';
					} 
				?>
				</table>
			</div>
		</div>
		
		<div id="footer" class="shadow">
			<span>Coded by <a href="http://contact.skamps.eu"  target="_blanc">LeokoTime</a> | © Copyright 2015</span>
		</div>
	</body>
</html>