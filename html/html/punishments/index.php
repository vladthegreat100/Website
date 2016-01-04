<?php include 'config.php'; ?>
<?php
if ($link = mysql_connect($Host, $Username, $Password)) {
	
} else {
	echo "<br>DB CONNECT ... fail<br>";
}


if (mysql_select_db($DB_Name, $link)) {
//echo "<br>DB SELECT ... ok <br>";
} else {
	echo "<br><br><br>MySQL connection FAILED...<br>";
}
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
		include 'config.php';
		$interval = $d2->diff($d1);
		if ( $v = $interval->d >= 1 ) return $interval->d.' d';
		if ( $v = $interval->h >= 1 ) return $interval->h.' h';
		if ( $v = $interval->i >= 1 ) return $interval->i.' min';
		return $interval->s.' sec';
	}
	
	function getBanOrKick($id, $time, $name, $reason, $by, $end){	
		include 'config.php';
		$addition = "";
		if($end != ""){
			$addition = '<tr class="hide-'.$id.'" >
							<td align="right" style="color:#9EFF30;">'.$msgDuration.'</td> <td class="color2">"'.$end.'"</td>
						</tr>';
		}
		echo'
			<tr class="name-'.$id.'" style="cursor: pointer;">
				<td class="color2" width="100px" align="right" style="font-size:20px;">
					'.$time.'
				</td>
				<td>
					<span class="reason-entry" >'.$name.'</span> <i style="font-size:15px;" class="fa fa-mouse-pointer"></i>
				</td>
			</tr>
			<tr class="hide-'.$id.'" >
				<td align="right" style="color:orange;">'.$msgReason.'</td> <td class="color2">"'.$reason.'"</td>
			</tr>';
		if($BannedBy){
		    echo '<tr class="hide-'.$id.'" >
				<td align="right" style="color:#3194CE;">'.$msgBannedBy.'</td> <td class="color2"">"'.$by.'"</td>
			</tr>';
		}
			
		echo $addition.'
			
			<style>
			.hide-'.$id.'{
				font-size: 0px;
				
				transition-timing-function: ease-out;
				-webkit-transition-timing-function: ease-out;
				
				-webkit-transition: 0.5s;
				transition: 0.5s;
			}

			#main .name-'.$id.':hover ~ .hide-'.$id.'{
				font-size: 25px;
			}
			</style>
			';
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
		<div id="main">
			<table width="400px">
				<tr>
					<th align="right"> <i class="fa fa-lock"></i> </th>
					<th align="left">
						<?php echo $msgLastBans; ?>
					</th>
				</tr>
				<?php
					//BAN
					$sql="SELECT * FROM PlayerHistory WHERE end='BAN' ORDER BY STR_TO_DATE(`PlayerHistory`.`start`, '%d.%m.%Y-%H:%i:%s') DESC LIMIT ".$MaxEntries;
					$result=mysql_query($sql,$link);
					if(mysql_num_rows($result)>0) {
						for($i=0;$i<mysql_num_rows($result);$i++) {
						//07.10.2015-14:25:46
							$date = DateTime::createFromFormat('d.m.Y-H:i:s', mysql_result($result,$i,'start'));
							getBanOrKick(($i."b"),
										$date->format($DateFormat),
										mysql_result($result,$i,'name'),
										mysql_result($result,$i,'reason'),
										mysql_result($result,$i,'by'), '');
						}
					}else{
						echo '
								<tr><td></td><td style="color:#FF6C59; font-size: 25px;">'.$msgNoBans.'</td></tr>
							';
					}
				?>
			</table>
			
			<table width="400px">
				<tr>
					<th align="right" > <i class="fa fa-ban"></i> </th>
					<th align="left">
						<?php echo $msgLastKicks; ?>
					</th>
				</tr>
				<?php
					//KICK
					$sql="SELECT * FROM PlayerHistory WHERE end='KICK' ORDER BY STR_TO_DATE(`PlayerHistory`.`start`, '%d.%m.%Y-%H:%i:%s') DESC LIMIT ".$MaxEntries;
					$result=mysql_query($sql,$link);
					if(mysql_num_rows($result)>0) {
						for($i=0;$i<mysql_num_rows($result);$i++) {
						//07.10.2015-14:25:46
							$date = DateTime::createFromFormat('d.m.Y-H:i:s', mysql_result($result,$i,'start'));
							getBanOrKick(($i."k"),
										$date->format($DateFormat),
										mysql_result($result,$i,'name'),
										mysql_result($result,$i,'reason'),
										mysql_result($result,$i,'by'), '');
						}
					}else{
						echo '
								<tr><td></td><td style="color:#FF6C59; font-size: 25px;">'.$msgNoKicks.'</td></tr>
							';
					}
				?>
			</table>
			
			<table width="400px">
				<tr>
					<th align="right"> <i class="fa fa-clock-o"></i> </th>
					<th align="left">
						<?php echo $msgLastTempBans; ?>
					</th>
				</tr>
				<?php
					//TEMP-BAN
					$sql="SELECT * FROM PlayerHistory WHERE end NOT IN ('BAN', 'KICK') ORDER BY STR_TO_DATE(`PlayerHistory`.`start`, '%d.%m.%Y-%H:%i:%s') DESC LIMIT ".$MaxEntries;
					$result=mysql_query($sql,$link);
					if(mysql_num_rows($result)>0) {
						for($i=0;$i<mysql_num_rows($result);$i++) {
						//07.10.2015-14:25:46
							$date = DateTime::createFromFormat('d.m.Y-H:i:s', mysql_result($result,$i,'start'));
							$end = DateTime::createFromFormat('d.m.Y-H:i:s', mysql_result($result,$i,'end'));
							getBanOrKick(($i."t"),
										$date->format($DateFormat),
										mysql_result($result,$i,'name'),
										mysql_result($result,$i,'reason'),
										mysql_result($result,$i,'by'), 
										calcTime($date ,$end));
						}
					}else{
						echo '
								<tr><td></td><td style="color:#FF6C59; font-size: 25px;">'.$msgNoTempBans.'</td></tr>
							';
					}
				?>
			</table>
		</div>
		<div id="footer" class="shadow">
			<span>Coded by <a href=""  target="_blanc">LeokoTime</a> | © Copyright 2015</span>
		</div>
	</body>
</html>